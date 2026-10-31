#!/usr/bin/env python3
"""
Generate the placeholder images used by the welcome page.

Every slot gets two files in public/assets/img/slots/:
    <slot>-desktop-<W>x<H>.webp
    <slot>-mobile-<W>x<H>.webp

Replace those files with real artwork of the *same dimensions* (same name)
and the page picks them up - no Blade or CSS change needed.

Run:  python3 tools/make-slot-dummies.py
"""
from pathlib import Path
from PIL import Image, ImageDraw, ImageFont

OUT = Path(__file__).resolve().parent.parent / "public/assets/img/slots"
OUT.mkdir(parents=True, exist_ok=True)

# slot, label, (desktop W,H), (mobile W,H)
SLOTS = [
    ("hero-01", "Hero slide 1 — township",        (1920, 1080), (900, 1600)),
    ("hero-02", "Hero slide 2 — dusk",            (1920, 1080), (900, 1600)),
    ("hero-03", "Hero slide 3 — clubhouse",       (1920, 1080), (900, 1600)),
    ("location", "Why this location",             (1400, 1020), (900, 765)),
    ("plot-01", "Plot 111 sq.yd",                 (900, 1013),  (760, 836)),
    ("plot-02", "Plot 125 sq.yd",                 (900, 1013),  (760, 836)),
    ("plot-03", "Plot 139 sq.yd",                 (900, 1013),  (760, 836)),
    ("gallery", "Gallery — Jim Corbett",          (1920, 820),  (900, 1125)),
]

BOLD = "/System/Library/Fonts/Supplemental/Arial Bold.ttf"
REG = "/System/Library/Fonts/Supplemental/Arial.ttf"

INK = (58, 68, 42)
PAPER = (238, 235, 226)
LINE = (176, 178, 158)


def make(slot, label, size, variant):
    w, h = size
    img = Image.new("RGB", (w, h), PAPER)
    d = ImageDraw.Draw(img)

    # diagonal hatch so it is obviously a placeholder
    step = max(18, w // 28)
    for x in range(-h, w, step * 2):
        d.line([(x, h), (x + h, 0)], fill=(232, 229, 218), width=max(2, step // 4))

    # safe-area guide, inset like the rounded frame on the site
    pad = int(min(w, h) * 0.06)
    d.rectangle([pad, pad, w - pad, h - pad], outline=LINE, width=max(2, w // 500))

    big = max(28, int(min(w, h) * 0.115))
    mid = max(14, int(min(w, h) * 0.036))
    small = max(11, int(min(w, h) * 0.026))

    f_big = ImageFont.truetype(BOLD, big)
    f_mid = ImageFont.truetype(BOLD, mid)
    f_small = ImageFont.truetype(REG, small)

    dims = f"{w} × {h}"
    sub = f"{slot}  ·  {variant}"

    def center(text, font, y):
        box = d.textbbox((0, 0), text, font=font)
        d.text(((w - (box[2] - box[0])) / 2 - box[0], y), text, font=font, fill=INK)

    center(sub.upper(), f_mid, h * 0.40)
    center(dims, f_big, h * 0.44)
    center(label, f_small, h * 0.56)
    center(f"replace this file with a {w}×{h} image — keep the name", f_small, h * 0.60)

    # corner ticks
    t = max(10, int(min(w, h) * 0.02))
    for cx, cy, dx, dy in ((pad, pad, 1, 1), (w - pad, pad, -1, 1),
                           (pad, h - pad, 1, -1), (w - pad, h - pad, -1, -1)):
        d.line([(cx, cy), (cx + dx * t * 3, cy)], fill=INK, width=max(2, w // 600))
        d.line([(cx, cy), (cx, cy + dy * t * 3)], fill=INK, width=max(2, w // 600))

    name = f"{slot}-{variant}-{w}x{h}.webp"
    img.save(OUT / name, "WEBP", quality=82, method=6)
    return name


for slot, label, desk, mob in SLOTS:
    print(make(slot, label, desk, "desktop"))
    print(make(slot, label, mob, "mobile"))
