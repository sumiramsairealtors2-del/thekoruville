<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title')</title>
<meta name="description" content="@yield('description')">
<link rel="canonical" href="{{ url()->current() }}" />

<meta name="robots" content="index, follow">
<meta name="msvalidate.01" content="629DA6236EFBD3CFE9B3F874F77B5D4B" />

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<!-- Google tag (gtag.js) 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DEGGH2DRR3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-DEGGH2DRR3');
</script>-->


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MSV6W3KVFF"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MSV6W3KVFF');
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P769HDDG');</script>
<!-- End Google Tag Manager -->






@yield('head')
@if(isset($pageSchema)) <script type="application/ld+json"> {!! json_encode($pageSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!} </script> @endif
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Jost:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="assets/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="assets/favicon.svg" />
<link rel="shortcut icon" href="assets/favicon.ico" />
<link rel="apple-touch-icon" sizes="180x180" href="assets/apple-touch-icon.png" />
<link rel="manifest" href="assets/site.webmanifest" />
<meta name="google-site-verification" content="NTbewVqKnoXRAyOncXeBZtJkTpbRBiqv84wcSpli99M" />
<style>
/* ============ TOKENS — OLIVE / KHAKI PALETTE ============ */
:root{
  --c-main:#EBE4CC;
  --c-soft-cream:#E3DCC2;
  --c-light-beige:#DAD4B7;
  --c-warm-sand:#D0CAAD;
  --c-muted-khaki:#C6C2A3;
  --c-olive-beige:#BCB998;
  --c-sage-olive:#B1B08D;
  --c-sage-green:#A6A681;
  --c-muted-olive:#999B75;
  --c-olive-green:#8A8F69;
  --c-moss-green:#7B825D;
  --c-deep-olive:#6B7451;
  --c-forest-olive:#5C6644;
  --c-dark-moss:#485335;
  --c-deep-forest:#313922;

  --maroon:var(--c-deep-forest);
  --maroon-deep:var(--c-deep-forest);
  --maroon-soft:var(--c-forest-olive);
  --gold:var(--c-olive-green);
  --gold-light:var(--c-muted-khaki);
  --ink:var(--c-deep-forest);
  --ivory:var(--c-main);
  --sand:var(--c-light-beige);
  --white:var(--c-soft-cream);
  --success:var(--c-moss-green);
  --error:var(--c-dark-moss);
  --font-display:'Cormorant Garamond', serif;
  --font-body:'Jost', sans-serif;
  --container:1240px;
}
*{box-sizing:border-box;margin:0;padding:0;}
html{scroll-behavior:smooth;}
body{
  font-family:var(--font-body);
  color:var(--ink);
  background:var(--ivory);
  overflow-x:hidden;
  -webkit-font-smoothing:antialiased;
}
img{max-width:100%;display:block;}
a{text-decoration:none;color:inherit;}
ul{list-style:none;}
button{font-family:inherit;cursor:pointer;border:none;background:none;}
input,textarea{font-family:inherit;}
.container{max-width:var(--container);margin:0 auto;padding:0 28px;}
.eyebrow{
  font-family:var(--font-body);
  text-transform:uppercase;
  letter-spacing:.28em;
  font-size:12px;
  color:var(--gold);
  font-weight:500;
}
.h2{
  font-family:var(--font-display);
  font-size:clamp(30px,4.5vw,50px);
  font-weight:600;
  line-height:1.1;
  color:var(--maroon);
  margin-top:10px;
}
.section-intro{max-width:660px;margin-bottom:52px;}

.section-intro.center{margin-left:auto;margin-right:auto;text-align:center;}
.lede{
  font-size:16px;
  line-height:1.7;
  color:#5a5a45;
  margin-top:18px;
  font-weight:300;
}
.gold-btn{
  display:inline-flex;
  align-items:center;
  gap:10px;
  padding:15px 32px;
  background:var(--gold);
  color:var(--c-main);
  font-size:13px;
  letter-spacing:.14em;
  text-transform:uppercase;
  font-weight:600;
  border-radius:2px;
  transition:.3s;
}
.gold-btn:hover{background:var(--gold-light);color:var(--maroon-deep);transform:translateY(-2px);}
.outline-btn{
  display:inline-flex;
  align-items:center;
  gap:10px;
  padding:14px 30px;
  border: 1px solid rgb(49 57 34);
  color: #313922;
  font-size:13px;
  letter-spacing:.14em;
  text-transform:uppercase;
  font-weight:500;
  border-radius:2px;
  transition:.3s;
}
.outline-btn:hover{border-color:var(--gold);color:var(--gold);}

.koru{stroke:var(--gold);fill:none;stroke-width:1.4;}

/* ============ TEXTURE PATTERNS ============ */
.texture-mountain{position:relative;}
.texture-mountain::before{
  content:"";
  position:absolute;inset:0;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='90' viewBox='0 0 400 90'%3E%3Cpath d='M0 80 L40 30 L70 60 L110 15 L150 55 L190 25 L230 65 L270 20 L310 58 L350 35 L400 70' fill='none' stroke='%238A8F69' stroke-opacity='0.18' stroke-width='1'/%3E%3C/svg%3E");
  background-repeat:repeat-x;
  background-position:bottom;
  opacity:.7;
  pointer-events:none;
}
.texture-leaf{
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='180' height='180' viewBox='0 0 180 180'%3E%3Cg fill='none' stroke='%23313922' stroke-opacity='0.05' stroke-width='1.1'%3E%3Cpath d='M90 10 C130 40 150 90 90 170 C30 90 50 40 90 10 Z'/%3E%3Cpath d='M90 15 L90 165 M90 60 L60 45 M90 60 L120 45 M90 100 L55 90 M90 100 L125 90 M90 135 L65 128 M90 135 L115 128'/%3E%3C/g%3E%3C/svg%3E");
  background-size:180px 180px;
}

/* ============ HEADER ============ */
header{
  position:fixed;top:0;left:0;right:0;
  z-index:500;
  display:flex;align-items:center;justify-content:space-between;
  padding:18px 32px;
  transition:.35s;
  background:linear-gradient(180deg,rgba(49,57,34,.55),rgba(49,57,34,0));
}
header.scrolled{
  background:var(--maroon-deep);
  padding:12px 32px;
  box-shadow:0 6px 24px rgba(49,57,34,.25);
}
.logo{display:flex;align-items:center;gap:10px;}
.logo-mark{width:34px;height:34px;flex-shrink:0;}
.logo-word{
  font-family:var(--font-display);
  font-size:22px;
  font-weight:700;
  letter-spacing:.02em;
  color:var(--ivory);
}
nav.main-nav{display:flex;gap:28px;}
nav.main-nav a{
  color:var(--ivory);
  font-size:13px;
  letter-spacing:.1em;
  text-transform:uppercase;
  font-weight:400;
  position:relative;
  padding-bottom:4px;
  white-space:nowrap;
}
nav.main-nav a::after{
  content:"";position:absolute;left:0;bottom:0;width:0;height:1px;background:var(--gold);transition:.3s;
}
nav.main-nav a:hover::after{width:100%;}
.header-cta{display:flex;align-items:center;gap:18px;}
.hamburger{display:none;flex-direction:column;gap:5px;background:none;}
.hamburger span{width:24px;height:2px;background:var(--ivory);display:block;}

/* ============ MARQUEE ============ */
.marquee-wrap{
  background:var(--gold);
  overflow:hidden;
  white-space:nowrap;
  padding:11px 0;
  position:relative;
  z-index:400;
}
.marquee-track{
  display:inline-block;
  animation:scroll-left 26s linear infinite;
}
/* Pause bottom marquee on hover */
.marquee-wrap:hover .marquee-track{
  animation-play-state: paused;
}
.marquee-track span{
  display:inline-block;
  padding:0 26px;
  font-family:var(--font-body);
  font-size:13px;
  letter-spacing:.18em;
  text-transform:uppercase;
  font-weight:600;
  color:var(--maroon-deep);
}
.marquee-track span::after{content:"◆";margin-left:26px;color:var(--maroon-deep);opacity:.5;}
@keyframes scroll-left{
  0%{transform:translateX(0);}
  100%{transform:translateX(-50%);}
}

/* ============ HERO ============ */
.hero{
  position:relative;
  min-height:100vh;
  display:flex;align-items:center;
  background:linear-gradient(160deg, #1c2013 0%, #313922 100%);
  overflow:hidden;
}
.hero::before{
  content:"";position:absolute;inset:0;
  background:url('/assets/img/thekoruville.jpg') center/cover;
  opacity:.32;
}
.hero::after{
  content:"";position:absolute;inset:0;
  background:radial-gradient(ellipse at 70% 30%,rgba(138,143,105,.14),transparent 60%);
}
.hero-inner{position:relative;z-index:2;padding-top:70px;}
.hero-inner .eyebrow{color:var(--gold-light);}
.hero h1{
  font-family:var(--font-display);
  font-size:clamp(38px,7vw,86px);
  color:#faffc0;
  line-height:1.03;
  font-weight:600;
  margin-top:14px;
  letter-spacing:.01em;
}
.hero .hero-sub{
  font-family:var(--font-display);
  font-size:clamp(18px,2.4vw,26px);
  color:#faffc0;
  margin-top:16px;
  font-weight:500;
}
.hero p.lede{color:#dcd6c0;max-width:580px;font-size:17px;}
.hero-actions{display:flex;gap:16px;margin-top:36px;flex-wrap:wrap;}
.hero-stats{
  display:flex;gap:44px;margin-top:70px;flex-wrap:wrap;
}
.hero-stats div{padding-left:16px;}
.hero-stats div:first-child{border-left:none;padding-left:0;}
.hero-stats div:not(:first-child){border-left:1px solid rgba(198,194,163,.3);}
.hero-stats b{font-family:var(--font-display);font-size:28px;color:#faffc0;display:block;}
.hero-stats span{font-size:12px;letter-spacing:.1em;text-transform:uppercase;color:#faffc0;}
.scroll-cue{
  position:absolute;bottom:32px;left:50%;transform:translateX(-50%);
  color:var(--gold-light);font-size:11px;letter-spacing:.2em;text-transform:uppercase;
  display:flex;flex-direction:column;align-items:center;gap:8px;
}
.scroll-cue .line{width:1px;height:34px;background:linear-gradient(var(--gold),transparent);animation:pulse-line 1.8s ease-in-out infinite;}
@keyframes pulse-line{0%,100%{opacity:.3;}50%{opacity:1;}}

/* ============ ABOUT ============ */
.about{padding:120px 0;background:var(--ivory);position:relative;}
.about-grid{display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center;}
.about-media{position:relative;}
.about-media img{border-radius:2px;}
.about-media .img-main{width:100%;height:460px;object-fit:cover;}
.about-media .img-float{
  position:absolute;bottom:-40px;left:-40px;width:56%;
  border:8px solid var(--ivory);box-shadow:0 20px 50px rgba(49,57,34,.25);
}
.about-media .img-float img{height:220px;object-fit:cover;}
.about-copy .lede{font-size:17px;}
.about-list{margin-top:28px;display:flex;flex-direction:column;gap:14px;}
.about-list li{display:flex;gap:12px;align-items:flex-start;font-size:15px;color:#4a4a37;}
.about-list svg{flex-shrink:0;margin-top:3px;}

/* ============ PLOTS / STAT BAND ============ */
.why-corbett{padding:120px 0;background:var(--maroon);color:var(--ivory);position:relative;}
.why-corbett .eyebrow{color:var(--gold-light);}
.why-corbett .h2{color:var(--ivory);}
.why-corbett .lede{color:#d5d2ba;}
.why-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;margin-top:20px;background:rgba(198,194,163,.14);border:1px solid rgba(198,194,163,.14);}
.why-card{background:var(--maroon);padding:34px 28px;transition:.3s;}
.why-card:hover{background:var(--maroon-soft);}
.why-card h4{font-family:var(--font-display);font-size:20px;font-weight:600;margin-bottom:10px;color:var(--gold-light);}
.why-card p{font-size:14px;color:#d5d2ba;line-height:1.7;font-weight:300;}

/* ============ AMENITIES ============ */
.amenities{padding:120px 0;background:var(--ivory);position:relative;}
.amen-grid{
  display:grid;grid-template-columns:repeat(4,1fr);gap:1px;
  background:rgba(49,57,34,.1);
  border:1px solid rgba(49,57,34,.1);
}
.amen-card{
  background:var(--white);
  padding:38px 26px;
  transition:.3s;
}
.amen-card:hover{background:var(--sand);}
.amen-card svg{width:34px;height:34px;stroke:var(--maroon);margin-bottom:18px;}
.amen-card h4{font-family:var(--font-display);font-size:20px;font-weight:600;margin-bottom:8px;color:var(--maroon-deep);}
.amen-card p{font-size:13px;color:#6b6b52;line-height:1.6;font-weight:300;}

/* ============ LOCATION INTELLIGENCE TABLES ============ */
.location-intel{padding:120px 0;background:var(--sand);position:relative;}
.loc-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:28px;margin-top:20px;}
.loc-card{background:var(--white);border-radius:2px;box-shadow:0 14px 40px rgba(49,57,34,.08);overflow:hidden;}
.loc-card-head{display:flex;align-items:center;gap:10px;padding:20px 24px;background:var(--maroon);color:var(--ivory);}
.loc-card-head svg{stroke:var(--gold);width:22px;height:22px;flex-shrink:0;}
.loc-card-head h4{font-family:var(--font-display);font-size:19px;font-weight:600;}
.loc-table{width:100%;border-collapse:collapse;}
.loc-table td{padding:13px 24px;font-size:14px;color:#4a4a37;border-bottom:1px solid rgba(49,57,34,.08);}
.loc-table tr:last-child td{border-bottom:none;}
.loc-table td:last-child{text-align:right;color:var(--maroon-deep);font-weight:500;white-space:nowrap;padding-left:12px;}

/* ============ WHO INVESTS ============ */
.who-invests{padding:120px 0;background:var(--ivory);position:relative;}
.who-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;margin-top:20px;}
.who-card{padding:30px 26px;border:1px solid rgba(49,57,34,.14);border-radius:2px;transition:.3s;}
.who-card:hover{border-color:var(--gold);box-shadow:0 14px 34px rgba(49,57,34,.08);}
.who-card h4{font-family:var(--font-display);font-size:19px;color:var(--maroon-deep);margin-bottom:8px;}
.who-card p{font-size:14px;color:#6b6b52;line-height:1.65;font-weight:300;}

/* ============ LAYOUT + PRICE (merged, unlock-only) ============ */
.locked-section{padding:120px 0;background:var(--ivory);position:relative;}
.locked-section.alt{background:var(--sand);}
.locked-grid{display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:start;}
.unlock-card{
  border:1px solid rgba(49,57,34,.16);
  border-radius:3px;
  padding:40px 34px;
  background:var(--white);
  box-shadow:0 20px 50px rgba(49,57,34,.1);
  position:relative;
  overflow:hidden;
}
.unlock-card .lock-icon-wrap{
  width:54px;height:54px;border-radius:50%;
  background:var(--c-muted-khaki);
  display:flex;align-items:center;justify-content:center;
  margin-bottom:20px;
}
.unlock-card .lock-icon-wrap svg{stroke:var(--maroon-deep);width:24px;height:24px;}
.unlock-card h3{font-family:var(--font-display);font-size:24px;color:var(--maroon-deep);margin-bottom:10px;}
.unlock-card p{font-size:14px;color:#6b6b52;line-height:1.65;margin-bottom:22px;}
.locked-copy .amenity-mini{display:flex;gap:12px;margin-top:26px;flex-wrap:wrap;}
.locked-copy .amenity-mini span{
  font-size:12px;letter-spacing:.08em;text-transform:uppercase;color:var(--maroon-deep);
  border:1px solid rgba(49,57,34,.25);padding:7px 14px;border-radius:20px;
}
.price-note{font-size:12px;color:#8a8a68;margin-top:14px;font-style:italic;}

/* ============ VIRTUAL TOUR ============ */
.tour{padding:120px 0;background:var(--maroon-deep);position:relative;}
.tour .eyebrow{color:var(--gold-light);}
.tour .h2{color:var(--ivory);}
.tour-frame{
  margin-top:40px;border-radius:2px;overflow:hidden;height:460px;
  border:1px solid rgba(198,194,163,.25);position:relative;
}
.tour-frame iframe{width:100%;height:100%;border:0;filter:grayscale(.15) sepia(.08);}
.tour-badges{display:flex;gap:16px;margin-top:26px;flex-wrap:wrap;}
.tour-badges span{
  font-size:12px;color:var(--gold-light);letter-spacing:.08em;text-transform:uppercase;
  border:1px solid rgba(198,194,163,.25);padding:8px 16px;border-radius:20px;
}

/* ============ GALLERY ============ */
.gallery{padding:0;position:relative;}
.gallery-strip{display:grid;grid-template-columns:repeat(5,1fr);}
.gallery-strip a{position:relative;height:280px;overflow:hidden;}
.gallery-strip img{width:100%;height:100%;object-fit:cover;transition:.5s;}
.gallery-strip a:hover img{transform:scale(1.08);}
.gallery-strip a::after{
  content:"";position:absolute;inset:0;background:linear-gradient(180deg,transparent 50%,rgba(49,57,34,.55));
}


/* ============ TOP RERA MARQUEE ============ */
.top-marquee{
  position:fixed;top:0;left:0;right:0;z-index:600;
  background:var(--maroon-deep);
  overflow:hidden;white-space:nowrap;
  padding:8px 0;
  transition:transform .35s ease, opacity .3s ease;
}
.top-marquee.hide{
  transform:translateY(-100%);
  opacity:0;
  pointer-events:none;
}
.top-marquee-track{
  display:inline-flex;
  animation:top-marquee-scroll 22s linear infinite;
}
/* Pause marquee on hover */
.top-marquee:hover .top-marquee-track{
  animation-play-state: paused;
}
.top-marquee-track span{
  display:inline-block;
  padding:0 22px;
  font-size:12px;
  letter-spacing:.14em;
  text-transform:uppercase;
  font-weight:500;
  color:var(--gold-light);
}
@keyframes top-marquee-scroll{
  0%{transform:translateX(0);}
  100%{transform:translateX(-50%);}
}
/* push the sticky header down to sit under the marquee, and let it slide
   back up flush with the top once the marquee hides on scroll */
header#siteHeader{
  top:var(--marquee-h, 34px);
  transition:top .35s ease, background .35s ease, padding .35s ease;
}

@media(max-width:720px){
  .top-marquee{padding:6px 0;}
  .top-marquee-track span{font-size:10.5px;padding:0 14px;}
}
/* ============ FAQ ============ */
.faq{padding:120px 0;background:var(--ivory);position:relative;}
.faq-list{margin-top:20px;max-width:100%;}
.faq-item{border-bottom:1px solid rgba(49,57,34,.15);}
.faq-q{
  width:100%;display:flex;justify-content:space-between;align-items:center;gap:20px;
  padding:22px 4px;text-align:left;font-family:var(--font-display);font-size:19px;color:var(--maroon-deep);font-weight:600;
}
.faq-q .plus{font-size:22px;color:var(--gold);transition:.3s;flex-shrink:0;}
.faq-item.open .faq-q .plus{transform:rotate(45deg);}
.faq-a{max-height:0;overflow:hidden;transition:max-height .35s ease;}
.faq-item.open .faq-a{max-height:280px;}
.faq-a p{padding:0 4px 22px;font-size:14.5px;color:#5a5a45;line-height:1.7;font-weight:300;max-width:720px;}

/* ============ CONTACT ============ */
.contact{padding:120px 0;background:var(--ivory);position:relative;}
.contact-grid{display:grid;grid-template-columns:.9fr 1.1fr;gap:64px;}
.contact-info h3{font-family:var(--font-display);font-size:26px;color:var(--maroon);margin-bottom:16px;}
.contact-info .lede{margin-top:0;}
.contact-rows{margin-top:30px;display:flex;flex-direction:column;gap:20px;}
.contact-rows div{display:flex;gap:14px;align-items:flex-start;}
.contact-rows svg{stroke:var(--gold);flex-shrink:0;margin-top:2px;}
.contact-rows b{display:block;font-size:14px;color:var(--maroon-deep);}
.contact-rows span{font-size:14px;color:#5a5a45;}
.contact-form-card{
  background:var(--white);padding:44px;border-radius:2px;box-shadow:0 20px 50px rgba(49,57,34,.1);
}
.field{margin-bottom:18px;}
.field label{font-size:12px;letter-spacing:.08em;text-transform:uppercase;color:#8a8a68;display:block;margin-bottom:7px;}
.field input,.field textarea{
  width:100%;padding:13px 14px;border:1px solid #ded8bd;border-radius:2px;font-size:14px;background:var(--ivory);
  transition:.25s;
}
.field input:focus,.field textarea:focus{outline:none;border-color:var(--gold);background:var(--white);}
.field input.error,.field textarea.error{border-color:var(--error);}
.field .err-msg{display:none;color:var(--error);font-size:11px;margin-top:5px;}
.field .err-msg.show{display:block;}
.field-row{display:grid;grid-template-columns:1fr 1fr;gap:16px;}

/* ============ FOOTER ============ */
footer{background:var(--maroon-deep);color:#c6c2a3;padding:70px 0 30px;}
.footer-grid{display:grid;grid-template-columns:1.4fr 1fr 1fr 1fr;gap:44px;}
.footer-logo{display:flex;align-items:center;gap:10px;margin-bottom:16px;}
.footer-logo .logo-word{color:var(--ivory);}
footer p{font-size:14px;line-height:1.7;font-weight:300;max-width:280px;}
footer h5{font-size:12px;letter-spacing:.12em;text-transform:uppercase;color:var(--gold-light);margin-bottom:16px;}
footer ul li{margin-bottom:10px;font-size:14px;}
footer ul li a:hover{color:var(--gold);}
.footer-bottom{
  margin-top:60px;padding-top:24px;border-top:1px solid rgba(198,194,163,.12);
  display:flex;justify-content:space-between;flex-wrap:wrap;gap:12px;font-size:12px;color:#a6a681;
}

/* ============ SIDEBAR STICKY CTA ============ */
.sidebar-cta{
  position:fixed;right:0;top:50%;transform:translateY(-50%) rotate(0);
  z-index:450;
  background:var(--gold);color:var(--c-main);
  padding:16px 20px;
  writing-mode:vertical-rl;text-orientation:mixed;
  font-size:13px;letter-spacing:.14em;text-transform:uppercase;font-weight:600;
  border-radius:6px 0 0 6px;
  box-shadow:-6px 0 20px rgba(49,57,34,.25);
  display:flex;align-items:center;gap:8px;
  transition:.3s;
}
.sidebar-cta:hover{padding-right:26px;background:var(--gold-light);color:var(--maroon-deep);}

/* ============ MODALS ============ */
.modal-overlay{
  position:fixed;inset:0;background:rgba(49,57,34,.72);
  display:none;align-items:center;justify-content:center;z-index:900;padding:20px;
  backdrop-filter:blur(3px);
}
.modal-overlay.show{display:flex;}
.modal-box{
  background:var(--white);width:100%;max-width:440px;border-radius:3px;
  position:relative;overflow:hidden;box-shadow:0 30px 80px rgba(20,20,10,.4);
  animation:modal-in .35s ease;
  max-height:92vh;overflow-y:auto;
}
@keyframes modal-in{from{opacity:0;transform:translateY(18px) scale(.98);}to{opacity:1;transform:translateY(0) scale(1);}}
.modal-head{
  background:var(--maroon);color:var(--ivory);padding:26px 28px;position:relative;
}
.modal-head .eyebrow{color:var(--gold-light);}
.modal-head h3{font-family:var(--font-display);font-size:24px;margin-top:6px;}
.modal-close{position:absolute;top:18px;right:20px;color:var(--ivory);font-size:20px;line-height:1;opacity:.7;z-index:5;}
.modal-close:hover{opacity:1;color:var(--gold);}

/* ---- split modal: portrait image (left) + form (right) ---- */
.modal-box.modal-box-split{
  max-width:800px;
  display:grid;
  grid-template-columns:42% 58%;
  padding:0;
}
.modal-split-media{
  position:relative;
  min-height:100%;
  background:var(--c-deep-forest);
}
.modal-split-media img{
  width:100%;height:100%;
  min-height:460px;
  object-fit:cover;
  object-position:center;
  display:block;
}
.modal-split-media .modal-split-tag{
  position:absolute;left:18px;bottom:18px;
  color:var(--gold-light);
  font-size:11px;letter-spacing:.16em;text-transform:uppercase;
  background:rgba(49,57,34,.55);
  padding:8px 14px;border-radius:20px;
  border:1px solid rgba(198,194,163,.3);
}
.modal-split-content{display:flex;flex-direction:column;min-width:0;}
.modal-box.modal-box-split .modal-head{position:relative;}
.modal-box.modal-box-split .modal-body{flex:1;}

@media(max-width:640px){
  .modal-box.modal-box-split{
    grid-template-columns:1fr;
    max-width:440px;
  }
  .modal-split-media{min-height:0;}
  .modal-split-media img{min-height:170px;height:170px;}
}

.modal-body{padding:28px;}
.modal-body .field:last-of-type{margin-bottom:22px;}
.modal-submit{width:100%;padding:15px;background:var(--maroon);color:var(--ivory);letter-spacing:.1em;text-transform:uppercase;font-size:13px;font-weight:600;border-radius:2px;transition:.3s;}
.modal-submit:hover{background:var(--gold);color:var(--maroon-deep);}
.modal-disclaimer{font-size:11px;color:#a6a681;text-align:center;margin-top:14px;line-height:1.5;}

.progress-step{padding:44px 28px;text-align:center;display:none;}
.progress-step .koru-spin{width:52px;height:52px;margin:0 auto 22px;animation:spin 2.6s linear infinite;}
@keyframes spin{to{transform:rotate(360deg);}}
.progress-bar-track{width:100%;height:6px;background:var(--c-muted-khaki);border-radius:6px;overflow:hidden;margin-top:20px;}
.progress-bar-fill{height:100%;width:0%;background:var(--maroon);border-radius:6px;transition:width .1s linear,background .3s;}
.progress-pct{font-size:12px;color:#8a8a68;margin-top:8px;letter-spacing:.05em;}
.progress-status{font-size:14px;color:var(--maroon-deep);margin-top:14px;font-weight:500;min-height:20px;}

.success-step{padding:44px 28px;text-align:center;display:none;}
.success-step .check-circle{
  width:60px;height:60px;border-radius:50%;background:var(--success);
  display:flex;align-items:center;justify-content:center;margin:0 auto 18px;
}
.success-step .check-circle svg{stroke:#fff;width:28px;height:28px;}
.success-step h4{font-family:var(--font-display);font-size:22px;color:var(--maroon);margin-bottom:8px;}
.success-step p{font-size:14px;color:#5a5a45;line-height:1.6;}
.success-actions{display:flex;gap:12px;justify-content:center;margin-top:22px;flex-wrap:wrap;}

.viewer-overlay{
  position:fixed;inset:0;background:rgba(20,20,10,.9);z-index:950;
  display:none;align-items:center;justify-content:center;padding:24px;
}
.viewer-overlay.show{display:flex;}
.viewer-box{
  background:var(--white);width:100%;max-width:780px;max-height:88vh;border-radius:3px;
  display:flex;flex-direction:column;overflow:hidden;
}
.viewer-head{
  display:flex;justify-content:space-between;align-items:center;
  padding:16px 22px;background:var(--maroon);color:var(--ivory);
}
.viewer-head h4{font-family:var(--font-display);font-size:19px;}
.viewer-head button{color:var(--ivory);font-size:20px;opacity:.8;}
.viewer-head button:hover{opacity:1;color:var(--gold);}
.viewer-content{overflow:auto;padding:20px;background:var(--ivory);}
.viewer-content img{width:100%;border-radius:2px;}

/* ============ SCROLL REVEAL ============ */
/*.reveal{opacity:0;transition:opacity .8s ease,transform .8s ease;}*/
/*.reveal.in{opacity:1;}*/
.reveal {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity .6s ease, transform .6s ease;
}
.reveal.is-visible {
    opacity: 1;
    transform: translateY(0);
}
/* ============ RESPONSIVE ============ */
@media(max-width:1080px){
  nav.main-nav{gap:18px;}
  nav.main-nav a{font-size:12px;}
  .why-grid,.who-grid{grid-template-columns:repeat(2,1fr);}
}
@media(max-width:980px){
  .about-grid,.locked-grid,.contact-grid,.loc-grid{grid-template-columns:1fr;}
  .about-media{margin-bottom:60px;}
  .amen-grid{grid-template-columns:repeat(2,1fr);}
  .gallery-strip{grid-template-columns:repeat(2,1fr);}
  .footer-grid{grid-template-columns:1fr 1fr;}
  .why-grid,.who-grid{grid-template-columns:repeat(2,1fr);}
}
@media(max-width:720px){
  nav.main-nav{
    position:fixed;top:0;right:-100%;height:100vh;width:80%;max-width:320px;
    background:var(--maroon-deep);flex-direction:column;padding:100px 34px;gap:26px;
    transition:.4s;z-index:600;overflow-y:auto;
  }
  nav.main-nav.open{right:0;}
  nav.main-nav a{font-size:14px;}
  .hamburger{display:flex;}
  .header-cta .gold-btn{display:none;}
  .about-media .img-float{position:static;width:100%;margin-top:16px;border:none;box-shadow:none;}
  .amen-grid{grid-template-columns:1fr;}
  .gallery-strip{grid-template-columns:1fr 1fr;}
  .field-row{grid-template-columns:1fr;}
  .footer-grid{grid-template-columns:1fr;}
  .hero-stats{gap:26px;}
  .sidebar-cta{padding:12px 14px;font-size:11px;}
  .contact-form-card{padding:28px 22px;}
  .why-grid,.who-grid{grid-template-columns:1fr;}
  .locked-grid{grid-template-columns:1fr !important;}
  .loc-table td{padding:12px 16px;font-size:13px;}
  .loc-card-head{padding:16px 18px;}
  section{padding-left:0;padding-right:0;}
  .about,.why-corbett,.amenities,.location-intel,.who-invests,.locked-section,.tour,.faq,.contact{padding:80px 0;}
  .h2{font-size:clamp(26px,7vw,38px);}
}
@media(max-width:480px){
  .gallery-strip{grid-template-columns:1fr;}
  .tour-frame{height:320px;}
  .hero{min-height:auto;padding:130px 0 90px;}
}
/* ============ SIDE VINE DECOR (per-section, clipped/bleeding) ============ */
/* every section gets its own window onto the vine art; the art itself
   is bigger than the window on every side, so it's cropped by the
   section's own overflow:hidden clip layer — "some part overhidden" */
.section-vine-clip{
  position:absolute;
  inset:0;
  overflow:hidden;
  pointer-events:none;
  z-index:1;
}
.section-vine{
  position:absolute;
  top:-18%;
  height:136%;
  width:30%;
  max-width:380px;
}
.section-vine-left{left:-7%;}
.section-vine-right{right:-7%;}
.section-vine svg{width:100%;height:100%;display:block;}
.section-vine svg path{
  fill:var(--c-forest-olive);
  fill-opacity:0;
  stroke:var(--c-forest-olive);
  stroke-width:1;
  vector-effect:non-scaling-stroke;
  transition:fill-opacity .4s ease;
}
.container,.amen-grid,.tour-frame,.tour-badges,.gallery-strip{position:relative;z-index:2;}
@media(max-width:980px){
  .section-vine{width:42%;}
  .section-vine svg path{fill-opacity:.18;}
}
@media(max-width:720px){
  .section-vine{width:56%;}
}


/* bloog///////////////////// */


/* ---------- shared container ---------- */
.blog-container{
  max-width:var(--container);
  margin:0 auto;
  padding:0 28px;
}

.eyebrow{
  font-family:var(--font-body);
  text-transform:uppercase;
  letter-spacing:.28em;
  font-size:12px;
  color:var(--gold);
  font-weight:500;
}

/* ---------- hero ---------- */
.blog-hero{
  padding:160px 0 90px;
  background:linear-gradient(160deg, #1c2013 0%, #313922 100%);
  text-align:center;
  position:relative;
  overflow:hidden;
}
.blog-hero::after{
  content:"";
  position:absolute;inset:0;
  background:radial-gradient(ellipse at 70% 30%,rgba(138,143,105,.14),transparent 60%);
}
.blog-hero .blog-container{position:relative;z-index:2;}
.blog-hero .eyebrow{color:var(--gold-light);}
.blog-h1{
  font-family:var(--font-display);
  font-size:clamp(34px,5.5vw,60px);
  font-weight:600;
  line-height:1.1;
  color:var(--ivory);
  margin-top:14px;
}
.blog-h1 em{color:var(--gold);font-style:normal;}
.blog-lede{
  font-family:var(--font-body);
  font-weight:300;
  font-size:16px;
  line-height:1.7;
  color:#dcd6c0;
  max-width:560px;
  margin:18px auto 0;
}

/* ---------- listing section ---------- */
.blog-listing{
  padding:80px 0 120px;
  background:var(--ivory);
}

/* ---------- filter / search bar ---------- */
.blog-filter-bar{
  display:flex;
  justify-content:flex-end;
  margin-bottom:44px;
}
.blog-search-form{
  display:flex;
  align-items:center;
  width:100%;
  max-width:340px;
  background:var(--white);
  border:1px solid rgba(49,57,34,.16);
  border-radius:2px;
  overflow:hidden;
}
.blog-search-input{
  flex:1;
  border:none;
  background:transparent;
  padding:13px 16px;
  font-family:var(--font-body);
  font-size:14px;
  color:var(--ink);
}
.blog-search-input:focus{outline:none;}
.blog-search-btn{
  display:flex;
  align-items:center;
  justify-content:center;
  width:44px;
  height:44px;
  background:var(--gold);
  color:var(--c-main);
  flex-shrink:0;
  transition:.25s;
}
.blog-search-btn:hover{background:var(--gold-light);color:var(--maroon-deep);}
.blog-search-btn svg{width:17px;height:17px;}

/* ---------- two-column layout: posts + sidebar form ---------- */
.blog-layout-grid{
  display:grid;
  grid-template-columns:1fr 340px;
  gap:48px;
  align-items:start;
}
.blog-main{min-width:0;}

/* ---------- grid ---------- */
.blog-grid{
  display:grid;
  grid-template-columns:repeat(2, 1fr);
  gap:32px;
}

/* ---------- card ---------- */
.blog-card{
  display:flex;
  flex-direction:column;
  background:var(--white);
  border:1px solid rgba(49,57,34,.1);
  border-radius:3px;
  overflow:hidden;
  transition:transform .35s ease, box-shadow .35s ease, border-color .35s ease;
}
.blog-card:hover{
  transform:translateY(-6px);
  box-shadow:0 24px 50px rgba(49,57,34,.14);
  border-color:rgba(138,143,105,.4);
}

.blog-card-media{
  position:relative;
  display:block;
  width:100%;
  height:220px;
  overflow:hidden;
  background:var(--sand);
}
.blog-card-media img{
  width:100%;
  height:100%;
  object-fit:cover;
  transition:transform .5s ease;
}
.blog-card:hover .blog-card-media img{transform:scale(1.06);}
.blog-card-media-fallback{
  width:100%;
  height:100%;
  display:flex;
  align-items:center;
  justify-content:center;
  color:var(--c-sage-olive);
}
.blog-card-media-fallback svg{width:44px;height:44px;}
.blog-card-tag{
  position:absolute;
  top:14px;left:14px;
  background:var(--maroon-deep);
  color:var(--gold-light);
  font-family:var(--font-body);
  font-size:11px;
  letter-spacing:.1em;
  text-transform:uppercase;
  padding:6px 12px;
  border-radius:20px;
}

.blog-card-body{
  padding:24px 24px 16px;
  flex:1;
  display:flex;
  flex-direction:column;
}
.blog-card-date{
  font-family:var(--font-body);
  font-size:11px;
  letter-spacing:.1em;
  text-transform:uppercase;
  color:var(--gold);
  font-weight:500;
}
.blog-card-title{
  font-family:var(--font-display);
  font-size:23px;
  font-weight:600;
  line-height:1.25;
  color:var(--maroon-deep);
  margin-top:8px;
}
.blog-card-title a{transition:color .25s;}
.blog-card-title a:hover{color:var(--gold);}
.blog-card-excerpt{
  font-family:var(--font-body);
  font-weight:300;
  font-size:14px;
  line-height:1.7;
  color:#6b6b52;
  margin-top:10px;
}

.blog-card-footer{
  padding:16px 24px 24px;
  border-top:1px solid rgba(49,57,34,.08);
  margin-top:auto;
}
.blog-read-more{
  display:inline-flex;
  align-items:center;
  gap:8px;
  font-family:var(--font-body);
  font-size:13px;
  font-weight:600;
  letter-spacing:.04em;
  text-transform:uppercase;
  color:var(--maroon-deep);
  transition:.25s;
}
.blog-read-more svg{width:15px;height:15px;transition:transform .25s;}
.blog-read-more:hover{color:var(--gold);}
.blog-read-more:hover svg{transform:translateX(4px);}

/* ---------- empty state ---------- */
.blog-empty{
  grid-column:1 / -1;
  text-align:center;
  padding:80px 20px;
  color:var(--c-sage-olive);
}
.blog-empty svg{width:44px;height:44px;margin:0 auto 16px;}
.blog-empty p{
  font-family:var(--font-body);
  font-weight:300;
  font-size:15px;
  color:#8a8a68;
}

/* ---------- pagination ---------- */
.blog-pagination{
  margin-top:56px;
  display:flex;
  justify-content:center;
}
.blog-pagination nav{
  font-family:var(--font-body);
}
.blog-pagination .pagination{
  display:flex;
  gap:8px;
  list-style:none;
  padding:0;
  margin:0;
}
.blog-pagination .page-link{
  display:flex;
  align-items:center;
  justify-content:center;
  min-width:38px;
  height:38px;
  padding:0 10px;
  border:1px solid rgba(49,57,34,.16);
  border-radius:2px;
  font-size:13px;
  color:var(--maroon-deep);
  transition:.25s;
}
.blog-pagination .page-link:hover{border-color:var(--gold);color:var(--gold);}
.blog-pagination .active .page-link{
  background:var(--maroon-deep);
  border-color:var(--maroon-deep);
  color:var(--ivory);
}

/* ============================================================
   SIDEBAR ENQUIRY FORM — fixed/sticky on desktop
   ============================================================ */
.blog-sidebar{
  position:sticky;
  top:110px; /* sits below the fixed site header */
  align-self:start;
  max-height:calc(100vh - 130px);
  /*overflow-y:auto;*/
}

.blog-form-card{
  background:var(--white);
  border:1px solid rgba(49,57,34,.12);
  border-radius:3px;
  padding:30px 26px;
  box-shadow:0 20px 50px rgba(49,57,34,.08);
  position:relative;
}
.blog-form-title{
  font-family:var(--font-display);
  font-size:24px;
  font-weight:600;
  color:var(--maroon-deep);
  margin-top:8px;
}
.blog-form-sub{
  font-family:var(--font-body);
  font-weight:300;
  font-size:13.5px;
  line-height:1.6;
  color:#6b6b52;
  margin-top:8px;
  margin-bottom:22px;
}

.blog-enquiry-form .blog-field{margin-bottom:16px;}
.blog-enquiry-form label{
  font-family:var(--font-body);
  font-size:11px;
  letter-spacing:.08em;
  text-transform:uppercase;
  color:#8a8a68;
  display:block;
  margin-bottom:7px;
}
.blog-enquiry-form input,
.blog-enquiry-form textarea{
  width:100%;
  padding:12px 13px;
  border:1px solid #ded8bd;
  border-radius:2px;
  font-family:var(--font-body);
  font-size:14px;
  background:var(--ivory);
  color:var(--ink);
  resize:vertical;
  transition:.25s;
}
.blog-enquiry-form input:focus,
.blog-enquiry-form textarea:focus{
  outline:none;
  border-color:var(--gold);
  background:var(--white);
}
.blog-enquiry-form input.error,
.blog-enquiry-form textarea.error{border-color:var(--c-dark-moss);}
.blog-err-msg{
  display:none;
  color:var(--c-dark-moss);
  font-size:11px;
  margin-top:5px;
  font-family:var(--font-body);
}
.blog-err-msg.show{display:block;}

.blog-form-submit{
  width:100%;
  padding:14px;
  background:var(--maroon-deep);
  color:var(--ivory);
  font-family:var(--font-body);
  letter-spacing:.1em;
  text-transform:uppercase;
  font-size:13px;
  font-weight:600;
  border-radius:2px;
  transition:.3s;
}
.blog-form-submit:hover{background:var(--gold);color:var(--maroon-deep);}

.blog-form-disclaimer{
  font-family:var(--font-body);
  font-size:11px;
  color:#a6a681;
  text-align:center;
  margin-top:14px;
  line-height:1.5;
}

/* ---------- progress + success states ---------- */
.blog-form-progress,
.blog-form-success{
  display:none;
  text-align:center;
  padding:20px 4px 6px;
}
.blog-spin{
  width:44px;height:44px;
  margin:0 auto 16px;
  color:var(--maroon-deep);
  animation:blog-spin 2.6s linear infinite;
}
@keyframes blog-spin{to{transform:rotate(360deg);}}
.blog-progress-status{
  font-family:var(--font-body);
  font-size:13.5px;
  color:var(--maroon-deep);
  font-weight:500;
  margin-bottom:14px;
}
.blog-progress-track{
  width:100%;height:6px;
  background:var(--c-muted-khaki);
  border-radius:6px;
  overflow:hidden;
}
.blog-progress-fill{
  height:100%;width:0%;
  background:var(--maroon-deep);
  border-radius:6px;
  transition:width .1s linear, background .3s;
}

.blog-check-circle{
  width:52px;height:52px;
  border-radius:50%;
  background:var(--c-moss-green);
  display:flex;align-items:center;justify-content:center;
  margin:0 auto 14px;
}
.blog-check-circle svg{width:24px;height:24px;}
.blog-form-success h4{
  font-family:var(--font-display);
  font-size:20px;
  color:var(--maroon-deep);
  margin-bottom:6px;
}
.blog-form-success p{
  font-family:var(--font-body);
  font-weight:300;
  font-size:13.5px;
  color:#5a5a45;
  line-height:1.6;
}

/* ---------- scroll reveal ---------- */
.reveal{opacity:0;transform:translateY(0px);transition:opacity .8s ease, transform .8s ease;}
.reveal.in{opacity:1;}

/* ============ RESPONSIVE ============ */
@media(max-width:1080px){
  .blog-layout-grid{grid-template-columns:1fr 300px;gap:32px;}
}

@media(max-width:980px){
  .blog-grid{grid-template-columns:repeat(2, 1fr);gap:24px;}
  .blog-hero{padding:140px 0 70px;}

  /* form drops below the listing and is no longer sticky/fixed */
  .blog-layout-grid{
    grid-template-columns:1fr;
    gap:44px;
  }
  .blog-sidebar{
    position:static;
    max-height:none;
    overflow:none;
  }
  .blog-form-card{max-width:480px;margin:0 auto;}
}

@media(max-width:720px){
  .blog-grid{grid-template-columns:1fr;}
  .blog-hero{padding:120px 0 60px;}
  .blog-listing{padding:60px 0 90px;}
  .blog-filter-bar{justify-content:stretch;}
  .blog-search-form{max-width:100%;}
  .blog-card-media{height:200px;}
  .blog-form-card{padding:26px 22px;max-width:100%;}
}

@media(max-width:480px){
  .blog-container{padding:0 18px;}
  .blog-card-body{padding:20px 20px 14px;}
  .blog-card-footer{padding:14px 20px 20px;}
  .blog-card-title{font-size:20px;}
}


/* ============================================================
   POST / PROJECT DETAIL PAGE
   Shares the site's olive/khaki + maroon/gold system
   Fonts: Cormorant Garamond (display) + Jost (body)
   ============================================================ */


.pd-container{
  max-width:var(--container);
  margin:0 auto;
  padding:0 28px;
}

.eyebrow{
  font-family:var(--font-body);
  text-transform:uppercase;
  letter-spacing:.28em;
  font-size:12px;
  color:var(--gold);
  font-weight:500;
}

/* ---------- hero / title block ---------- */
.pd-hero{
  padding:150px 0 60px;
  background:linear-gradient(160deg, #1c2013 0%, #313922 100%);
  position:relative;
  overflow:hidden;
}
.pd-hero::after{
  content:"";
  position:absolute;inset:0;
  background:radial-gradient(ellipse at 70% 30%,rgba(138,143,105,.14),transparent 60%);
}
.pd-hero .pd-container{position:relative;z-index:2;}
.pd-hero .eyebrow{color:var(--gold-light);}

.pd-back-link{
  display:inline-flex;
  align-items:center;
  gap:8px;
  font-family:var(--font-body);
  font-size:13px;
  letter-spacing:.04em;
  color:var(--gold-light);
  margin-bottom:22px;
  transition:.25s;
}
.pd-back-link svg{width:15px;height:15px;}
.pd-back-link:hover{color:var(--gold);}

.pd-h1{
  font-family:var(--font-display);
  font-size:clamp(30px,5vw,48px);
  font-weight:600;
  line-height:1.15;
  color:var(--ivory);
  margin-top:12px;
  max-width:820px;
}
.pd-meta-row{
  font-family:var(--font-body);
  font-weight:300;
  font-size:14px;
  color:#c6c2a3;
  margin-top:14px;
}

/* ---------- body section / layout grid ---------- */
.pd-body-section{
  padding:70px 0 120px;
  background:var(--ivory);
}
.pd-layout-grid{
  display:grid;
  grid-template-columns:1fr 340px;
  gap:48px;
  align-items:start;
}
.pd-main{min-width:0;}

/* ---------- article ---------- */
.pd-article{
  background:var(--white);
  border:1px solid rgba(49,57,34,.1);
  border-radius:3px;
  padding:36px;
}
.pd-article-image{
  width:100%;
  max-height:420px;
  object-fit:cover;
  border-radius:2px;
  margin-bottom:28px;
}
.pd-article-content{
  font-family:var(--font-body);
  font-weight:300;
  font-size:16px;
  line-height:1.85;
  color:#3f3f2f;
  white-space:pre-line;
}
.pd-article-content p{margin-bottom:1.2em;}

/* ---------- prev / next navigation ---------- */
.pd-prevnext{
  display:grid;
  grid-template-columns:1fr 1fr;
  gap:20px;
  margin-top:32px;
}
.pd-nav-card{
  display:flex;
  flex-direction:column;
  gap:8px;
  background:var(--white);
  border:1px solid rgba(49,57,34,.12);
  border-radius:3px;
  padding:20px 22px;
  transition:.3s;
}
.pd-nav-card:not(.pd-nav-empty):hover{
  border-color:var(--gold);
  box-shadow:0 14px 34px rgba(49,57,34,.1);
  transform:translateY(-3px);
}
.pd-nav-empty{
  background:transparent;
  border:1px dashed rgba(49,57,34,.12);
}
.pd-nav-next{text-align:right;align-items:flex-end;}
.pd-nav-dir{
  display:flex;
  align-items:center;
  gap:6px;
  font-family:var(--font-body);
  font-size:11px;
  letter-spacing:.12em;
  text-transform:uppercase;
  color:var(--gold);
  font-weight:600;
}
.pd-nav-dir svg{width:14px;height:14px;}
.pd-nav-title{
  font-family:var(--font-display);
  font-size:17px;
  font-weight:600;
  color:var(--maroon-deep);
  line-height:1.3;
}

/* ============================================================
   SIDEBAR — fixed/sticky enquiry form + recent posts
   ============================================================ */
.pd-sidebar{
  position:sticky;
  top:90px; /* sits below the fixed site header */
  align-self:start;
  max-height:calc(100vh - 130px);
  /*overflow-y:auto;*/
  display:flex;
  flex-direction:column;
  gap:24px;
}

/* ---------- enquiry form card ---------- */
.pd-form-card{
  background:var(--white);
  border:1px solid rgba(49,57,34,.12);
  border-radius:3px;
  padding:30px 26px;
  box-shadow:0 20px 50px rgba(49,57,34,.08);
  flex-shrink:0;
}
.pd-form-title{
  font-family:var(--font-display);
  font-size:24px;
  font-weight:600;
  color:var(--maroon-deep);
  margin-top:8px;
}
.pd-form-sub{
  font-family:var(--font-body);
  font-weight:300;
  font-size:13.5px;
  line-height:1.6;
  color:#6b6b52;
  margin-top:8px;
  margin-bottom:22px;
}

.pd-enquiry-form .pd-field{margin-bottom:16px;}
.pd-enquiry-form label{
  font-family:var(--font-body);
  font-size:11px;
  letter-spacing:.08em;
  text-transform:uppercase;
  color:#8a8a68;
  display:block;
  margin-bottom:7px;
}
.pd-enquiry-form input,
.pd-enquiry-form textarea{
  width:100%;
  padding:12px 13px;
  border:1px solid #ded8bd;
  border-radius:2px;
  font-family:var(--font-body);
  font-size:14px;
  background:var(--ivory);
  color:var(--ink);
  resize:vertical;
  transition:.25s;
}
.pd-enquiry-form input:focus,
.pd-enquiry-form textarea:focus{
  outline:none;
  border-color:var(--gold);
  background:var(--white);
}
.pd-enquiry-form input.error,
.pd-enquiry-form textarea.error{border-color:var(--c-dark-moss);}
.pd-err-msg{
  display:none;
  color:var(--c-dark-moss);
  font-size:11px;
  margin-top:5px;
  font-family:var(--font-body);
}
.pd-err-msg.show{display:block;}

.pd-form-submit{
  width:100%;
  padding:14px;
  background:var(--maroon-deep);
  color:var(--ivory);
  font-family:var(--font-body);
  letter-spacing:.1em;
  text-transform:uppercase;
  font-size:13px;
  font-weight:600;
  border-radius:2px;
  transition:.3s;
}
.pd-form-submit:hover{background:var(--gold);color:var(--maroon-deep);}

.pd-form-disclaimer{
  font-family:var(--font-body);
  font-size:11px;
  color:#a6a681;
  text-align:center;
  margin-top:14px;
  line-height:1.5;
}

/* ---------- progress + success states ---------- */
.pd-form-progress,
.pd-form-success{
  display:none;
  text-align:center;
  padding:20px 4px 6px;
}
.pd-spin{
  width:44px;height:44px;
  margin:0 auto 16px;
  color:var(--maroon-deep);
  animation:pd-spin 2.6s linear infinite;
}
@keyframes pd-spin{to{transform:rotate(360deg);}}
.pd-progress-status{
  font-family:var(--font-body);
  font-size:13.5px;
  color:var(--maroon-deep);
  font-weight:500;
  margin-bottom:14px;
}
.pd-progress-track{
  width:100%;height:6px;
  background:var(--c-muted-khaki);
  border-radius:6px;
  overflow:hidden;
}
.pd-progress-fill{
  height:100%;width:0%;
  background:var(--maroon-deep);
  border-radius:6px;
  transition:width .1s linear, background .3s;
}

.pd-check-circle{
  width:52px;height:52px;
  border-radius:50%;
  background:var(--c-moss-green);
  display:flex;align-items:center;justify-content:center;
  margin:0 auto 14px;
}
.pd-check-circle svg{width:24px;height:24px;}
.pd-form-success h4{
  font-family:var(--font-display);
  font-size:20px;
  color:var(--maroon-deep);
  margin-bottom:6px;
}
.pd-form-success p{
  font-family:var(--font-body);
  font-weight:300;
  font-size:13.5px;
  color:#5a5a45;
  line-height:1.6;
}

/* ---------- recent posts widget ---------- */
.pd-recent-card{
  background:var(--white);
  border:1px solid rgba(49,57,34,.12);
  border-radius:3px;
  padding:26px 24px;
  flex-shrink:0;
}
.pd-recent-title{
  font-family:var(--font-display);
  font-size:20px;
  font-weight:600;
  color:var(--maroon-deep);
  padding-bottom:14px;
  border-bottom:1px solid rgba(49,57,34,.1);
  margin-bottom:16px;
}
.pd-recent-list{display:flex;flex-direction:column;gap:16px;}
.pd-recent-item{list-style:none;}
.pd-recent-link{
  display:flex;
  gap:12px;
  align-items:center;
}
.pd-recent-thumb{
  width:56px;height:56px;
  flex-shrink:0;
  border-radius:2px;
  overflow:hidden;
  background:var(--sand);
  display:flex;align-items:center;justify-content:center;
  color:var(--c-sage-olive);
}
.pd-recent-thumb img{width:100%;height:100%;object-fit:cover;}
.pd-recent-thumb svg{width:22px;height:22px;}
.pd-recent-meta{display:flex;flex-direction:column;gap:3px;min-width:0;}
.pd-recent-post-title{
  font-family:var(--font-body);
  font-size:13.5px;
  font-weight:500;
  color:var(--maroon-deep);
  line-height:1.35;
  overflow:hidden;
  text-overflow:ellipsis;
  display:-webkit-box;
  -webkit-line-clamp:2;
  -webkit-box-orient:vertical;
  transition:.25s;
}
.pd-recent-link:hover .pd-recent-post-title{color:var(--gold);}
.pd-recent-date{
  font-size:11px;
  letter-spacing:.04em;
  text-transform:uppercase;
  color:#9a9a7a;
}

/* ---------- scroll reveal ---------- */
.reveal{opacity:0;transition:opacity .8s ease, transform .8s ease;}
.reveal.in{opacity:1;}

/* ============ RESPONSIVE ============ */
@media(max-width:1080px){
  .pd-layout-grid{grid-template-columns:1fr 300px;gap:32px;}
}

@media(max-width:980px){
  .pd-hero{padding:130px 0 50px;}
  .pd-article{padding:28px 24px;}

  /* sidebar drops below the article and is no longer sticky/fixed */
  .pd-layout-grid{
    grid-template-columns:1fr;
    gap:40px;
  }
  .pd-sidebar{
    position:static;
    max-height:none;
    overflow:visible;
  }
  .pd-form-card,
  .pd-recent-card{max-width:480px;margin:0 auto;width:100%;}
}

@media(max-width:720px){
  .pd-body-section{padding:50px 0 80px;}
  .pd-article{padding:22px 18px;}
  .pd-article-image{max-height:260px;}
  .pd-prevnext{grid-template-columns:1fr;}
  .pd-nav-next{text-align:left;align-items:flex-start;}
  .pd-form-card,
  .pd-recent-card{padding:24px 20px;}
}

@media(max-width:480px){
  .pd-container{padding:0 18px;}
  .pd-h1{font-size:clamp(26px,7vw,34px);}
}


.footer-social {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 20px;
}

.footer-social a {
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    color: inherit;
    text-decoration: none;
    transition: all 0.3s ease;
}

.footer-social a:hover {
    transform: translateY(-3px);
    background: rgba(255, 255, 255, 0.1);
    border-color: currentColor;
}

.footer-social i {
    font-size: 16px;
}


</style>


<!-- Open Graph -->
<meta property="og:title" content="The Koru Ville Kilawali | Resort-Themed Plots Near Jim Corbett" />
<meta property="og:description" content="The Koru Ville brings resort-themed residential plots to Kilawali, Uttarakhand — just 15 min from Phato Gate, Jim Corbett. Explore The Koru Ville plots today." />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://thekoruville.com/" />
<meta property="og:image" content="https://thekoruville.com/assets/img/thekoruville.jpg" />
<meta property="og:image:width" content="1200" />
<meta property="og:image:height" content="630" />
<meta property="og:locale" content="en_IN" />
<meta property="og:site_name" content="The Koru Ville" />
<!-- X (Twitter) Card -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="The Koru Ville Kilawali | Resort-Themed Plots Near Jim Corbett" />
<meta name="twitter:description" content="Resort-themed residential plots in Kilawali, Uttarakhand, just 15 minutes from Phato Gate, Jim Corbett. Plots from 111 sq. yd. Enquire today." />
<meta name="twitter:image" content="https://thekoruville.com/assets/img/thekoruville.jpg" />
<meta name="twitter:site" content="@thekoruville" />


</head>
<body>

    <!-- HEADER -->
    
<!-- ============ SIDE VINE DECOR SOURCE (hidden defs, reused per-section via <use>) ============ -->

<!-- ============ TOP RERA MARQUEE ============ -->
<div class="top-marquee" id="topMarquee">
  <div class="top-marquee-track">
    <span>&#127807; COMING SOON</span><span>&#9670;</span>
    <span>&#127968; The Koru Ville &ndash; Resort-Themed Residential Township</span><span>&#9670;</span>
    <span>&#128205; Kilawali, Uttarakhand</span><span>&#9670;</span>
    <span>&#128005; Just 15 Minutes from Phato Gate, Jim Corbett</span><span>&#9670;</span>
    <span>&#128167; Near Tumaria Dam</span><span>&#9670;</span>
    <span>&#128226; RERA Registration: Upcoming</span><span>&#9670;</span>
    <span>&#128640; Grand Launch Coming Soon</span><span>&#9670;</span>

    <!-- Duplicate for seamless infinite scrolling -->
    <span>&#127807; COMING SOON</span><span>&#9670;</span>
    <span>&#127968; The Koru Ville &ndash; Resort-Themed Residential Township</span><span>&#9670;</span>
    <span>&#128205; Kilawali, Uttarakhand</span><span>&#9670;</span>
    <span>&#128005; Just 15 Minutes from Phato Gate, Jim Corbett</span><span>&#9670;</span>
    <span>&#128167; Near Tumaria Dam</span><span>&#9670;</span>
    <span>&#128226; RERA Registration: Upcoming</span><span>&#9670;</span>
    <span>&#128640; Grand Launch Coming Soon</span><span>&#9670;</span>
  </div>
</div>

<!-- ============ HEADER ============ -->
<header id="siteHeader">
  <a href="https://thekoruville.com/" class="logo">
  <img src="{{ asset('assets/img/Logo.webp') }}" alt="The Koru Ville Logo" width="85">
  </a>
  <nav class="main-nav" id="mainNav">
    <a href="https://thekoruville.com/" onclick="closeNav()">Home</a>
    <a href="https://thekoruville.com/#about" onclick="closeNav()">About</a>
    <a href="https://thekoruville.com/blog" onclick="closeNav()">Blog</a>
    <a href="https://thekoruville.com/#amenities" onclick="closeNav()">Amenities</a>
    <!-- <a href="#why-this-location" onclick="closeNav()">why-this-location</a> -->
    <a href="https://thekoruville.com/#layout-price" onclick="closeNav()">Layout &amp; Price</a>
    <a href="https://thekoruville.com/#faq" onclick="closeNav()">FAQ</a>
    <a href="https://thekoruville.com/#contact" onclick="closeNav()">Contact</a>
  </nav>
  <div class="header-cta">
    <a href="tel:+918377000300" class="gold-btn">
  <i class="fas fa-phone"></i>
  <span>+91 8377 000300</span>
</a>
    <button class="hamburger" id="hamburgerBtn" onclick="toggleNav()"><span></span><span></span><span></span></button>
  </div>
</header>

    <!-- MAIN CONTENT AREA -->
    <main class="flex-grow max-w-6xl w-full mx-auto px-4 py-8">
        @yield('content')
    </main>

<!-- ============ FOOTER ============ -->
<!--<footer>-->
<!--  <div class="container footer-grid">-->
<!--    <div>-->
<!--      <div class="footer-logo">-->
<!--         <img src="{{ asset('assets/img/Logo.webp') }}" alt="The Koru Ville Logo" width="100">-->
<!--      </div>-->
<!--      <p>An upcoming resort-themed residential plotted township in Kilawali, Uttarakhand &mdash; built at the gateway to Jim Corbett National Park.</p>-->
<!--    </div>-->
<!--    <div>-->
<!--      <h5>Explore</h5>-->
<!--      <ul>-->
<!--        <li><a href="https://thekoruville.com/#about">About</a></li>-->
<!--        <li><a href="https://thekoruville.com/blog">Blogs</a></li>-->
<!--        <li><a href="https://thekoruville.com/#amenities">Amenities</a></li>-->
<!--        <li><a href="https://thekoruville.com/#why-this-location">Why This Location</a></li>-->
<!--        <li><a href="https://thekoruville.com/#layout-price">Layout &amp; Price</a></li>-->
<!--      </ul>-->
<!--    </div>-->
<!--    <div>-->
<!--      <h5>Connect</h5>-->
<!--      <ul>-->
<!--        <li><a href="https://thekoruville.com/#map">Map</a></li>-->
<!--        <li><a href="https://thekoruville.com/#faq">FAQ</a></li>-->
<!--        <li><a href="https://thekoruville.com/#contact">Contact Us</a></li>-->
<!--        <li><a href="#" onclick="openModal('brochure');return false;">Download Brochure</a></li>-->
<!--      </ul>-->
<!--    </div>-->
<!--    <div>-->
<!--      <h5>Legal</h5>-->
<!--      <ul>-->
        <!--<li><a href="#">RERA Details</a></li>-->
<!--        <li><a href="https://thekoruville.com/privacy-policy">Privacy Policy</a></li>-->
<!--        <li><a href="https://thekoruville.com/terms-and-conditions">Terms & Conditions</a></li>-->
<!--      </ul>-->
<!--    </div>-->
<!--  </div>-->
<!--  <div class="container footer-bottom">-->
<!--    <span>&copy; 2026 The Koru Ville. All rights reserved. &mdash; Land of New Beginnings.</span>-->
<!--    <span>RERA Reg. No. &mdash; Upcoming</span>-->
<!--  </div>-->
<!--</footer>-->

<footer>
    <div class="container footer-grid">

        <div>
            <div class="footer-logo">
                <img src="{{ asset('assets/img/Logo.webp') }}"
                     alt="The Koru Ville Logo"
                     width="100">
            </div>

            <p>
             <a href="/">  The Koru Ville </a> is the sole official website for The Koru Ville, developed by Sumiram Sai Realtors Group. Any third-party website, landing page, or listing is not authorized and does not represent The Koru Ville.


            </p>
            <div class="footer-social">
                <a href="https://www.youtube.com/@TheKoruVilleOfficial"
                   target="_blank"
                   rel="noopener noreferrer"
                   aria-label="The Koru Ville on YouTube"
                   title="YouTube">
                    <i class="fab fa-youtube"></i>
                </a>

                <a href="https://www.linkedin.com/company/the-koru-ville"
                   target="_blank"
                   rel="noopener noreferrer"
                   aria-label="The Koru Ville on LinkedIn"
                   title="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>

                <a href="https://www.facebook.com/TheKoruVille"
                   target="_blank"
                   rel="noopener noreferrer"
                   aria-label="The Koru Ville on Facebook"
                   title="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>

                <a href="https://www.instagram.com/thekoruville/"
                   target="_blank"
                   rel="noopener noreferrer"
                   aria-label="The Koru Ville on Instagram"
                   title="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>

                <a href="https://in.pinterest.com/thekoruville/"
                   target="_blank"
                   rel="noopener noreferrer"
                   aria-label="The Koru Ville on Pinterest"
                   title="Pinterest">
                    <i class="fab fa-pinterest-p"></i>
                </a>
            </div>
        </div>


        <div>
            <h5>Explore</h5>
            <ul>
                <li>
                    <a href="https://thekoruville.com/#about">About</a>
                </li>

                <li>
                    <a href="https://thekoruville.com/blog">Blogs</a>
                </li>

                <li>
                    <a href="https://thekoruville.com/#amenities">Amenities</a>
                </li>

                <li>
                    <a href="https://thekoruville.com/#why-this-location">
                        Why This Location
                    </a>
                </li>

                <li>
                    <a href="https://thekoruville.com/#layout-price">
                        Layout & Price
                    </a>
                </li>
            </ul>
        </div>


        <div>
            <h5>Connect</h5>

            <ul>
                <li>
                    <a href="https://thekoruville.com/#map">Map</a>
                </li>

                <li>
                    <a href="https://thekoruville.com/#faq">FAQ</a>
                </li>

                <li>
                    <a href="https://thekoruville.com/#contact">
                        Contact Us
                    </a>
                </li>

                <li>
                    <a href="#"
                       onclick="openModal('brochure');return false;">
                        Download Brochure
                    </a>
                </li>
            </ul>


            <!-- Social Media -->
            
        </div>


        <div>
            <h5>Legal</h5>

            <ul>
                <!--
                <li>
                    <a href="#">RERA Details</a>
                </li>
                -->

                <li>
                    <a href="https://thekoruville.com/privacy-policy">
                        Privacy Policy
                    </a>
                </li>

                <li>
                    <a href="https://thekoruville.com/terms-and-conditions">
                        Terms & Conditions
                    </a>
                </li>
            </ul>
        </div>

    </div>


    <div class="container footer-bottom">
        <span>
            ©️ 2026 The Koru Ville. All rights reserved. — Land of New Beginnings.     
        </span>

        <span>
            RERA Reg. No. — Upcoming
        </span>
    </div>
</footer>

<!-- ============ STICKY SIDEBAR CTA ============ -->
<button class="sidebar-cta" onclick="openModal('offer')">Enquiry Now</button>

<!-- ============ MODAL: OFFER / UNLOCK / BROCHURE (shared markup, reused per target) ============ -->
<div class="modal-overlay" id="modal-offer">
  <div class="modal-box modal-box-split">
    <div class="modal-split-media">
      <img src="{{ asset('assets/img/popup.webp') }}" alt="The Koru Ville — resort-themed residence at Kilawali">
      <span class="modal-split-tag">The Koru Ville &middot; Kilawali</span>
    </div>
    <div class="modal-split-content">
      <div class="modal-head">
        <button class="modal-close" onclick="closeModal('offer')">&times;</button>
        <span class="eyebrow">Limited Time</span>
        <h3>Get in Touch</h3>
      </div>
      <div class="modal-body">
        <form id="form-offer" class="lp-form" data-prefix="of" onsubmit="submitGenericForm(event,'offer')" novalidate>
          <div class="field"><label>Full Name</label><input type="text" id="ofFirst"><span class="err-msg" id="ofFirstErr">Please enter your full name</span></div>
          <div class="field"><label>Email</label><input type="email" id="ofEmail"><span class="err-msg" id="ofEmailErr">Please enter a valid email</span></div>
          <div class="field"><label>Phone</label><input type="tel" id="ofPhone"><span class="err-msg" id="ofPhoneErr">Please enter a valid phone number</span></div>
          <button type="submit" class="modal-submit">Claim My Offer</button>
          <p class="modal-disclaimer">By submitting, you agree to be contacted about The Koru Ville. No spam, ever.</p>
        </form>
        <div class="progress-step" id="progress-offer">
          <svg class="koru-spin" viewBox="0 0 60 60" fill="none"><path class="koru" stroke-width="1.6" d="M30 52 C30 32 18 27 18 37 C18 45 27 46 27 39 C27 33 21 30 21 30"/></svg>
          <div class="progress-status" id="status-offer">Verifying your details&hellip;</div>
          <div class="progress-bar-track"><div class="progress-bar-fill" id="bar-offer"></div></div>
          <div class="progress-pct" id="pct-offer">0%</div>
        </div>
        <div class="success-step" id="success-offer">
          <div class="check-circle"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.4"><path d="M20 6L9 17l-5-5"/></svg></div>
          <h3>Offer Unlocked</h3>
          <p>A member of our team will call you shortly with your exclusive pricing.</p>
          <div class="success-actions"><button class="outline-btn" style="color:var(--maroon);border-color:var(--maroon);" onclick="closeModal('offer')">Close</button></div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal-overlay" id="modal-unlock">
  <div class="modal-box">
    <div class="modal-head">
      <button class="modal-close" onclick="closeModal('unlock')">&times;</button>
      <span class="eyebrow">Unlock Content</span>
      <h3 id="unlockTitle">Unlock Layout Plan</h3>
    </div>
    <div class="modal-body">
      <form id="form-unlock" class="lp-form" onsubmit="submitGenericForm(event,'unlock')" novalidate>
        <div class="field"><label>Full Name</label><input type="text" id="lpFirst"><span class="err-msg" id="lpFirstErr">Please enter your Full name</span></div>
        <div class="field"><label>Email</label><input type="email" id="lpEmail"><span class="err-msg" id="lpEmailErr">Please enter a valid email</span></div>
        <div class="field"><label>Phone</label><input type="tel" id="lpPhone"><span class="err-msg" id="lpPhoneErr">Please enter a valid phone number</span></div>
        <button type="submit" class="modal-submit">Unlock Now</button>
        <p class="modal-disclaimer">By submitting, you agree to be contacted about The Koru Ville. No spam, ever.</p>
      </form>
      <div class="progress-step" id="progress-unlock">
        <svg class="koru-spin" viewBox="0 0 60 60" fill="none"><path class="koru" stroke-width="1.6" d="M30 52 C30 32 18 27 18 37 C18 45 27 46 27 39 C27 33 21 30 21 30"/></svg>
        <div class="progress-status" id="status-unlock">Verifying your details&hellip;</div>
        <div class="progress-bar-track"><div class="progress-bar-fill" id="bar-unlock"></div></div>
        <div class="progress-pct" id="pct-unlock">0%</div>
      </div>
      <div class="success-step" id="success-unlock">
        <div class="check-circle"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.4"><path d="M20 6L9 17l-5-5"/></svg></div>
        <h3 id="unlockSuccessTitle">Unlocked</h3>
        <p>Our team has received your request and will share the document shortly. You can also preview it below.</p>
        <div class="success-actions">
          <button class="gold-btn" onclick="viewUnlockedDoc()">View Full Screen</button>
          <button class="outline-btn" style="color:var(--maroon);border-color:var(--maroon);" onclick="closeModal('unlock')">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal-overlay" id="modal-brochure">
  <div class="modal-box">
    <div class="modal-head">
      <button class="modal-close" onclick="closeModal('brochure')">&times;</button>
      <span class="eyebrow">Download</span>
      <h3>Get the Koru Ville Brochure</h3>
    </div>
    <div class="modal-body">
      <form id="form-brochure" class="lp-form" onsubmit="submitGenericForm(event,'brochure')" novalidate>
        <div class="field"><label>Full Name</label><input type="text" id="brFirst"><span class="err-msg" id="brFirstErr">Please enter your full name</span></div>
        <div class="field"><label>Email</label><input type="email" id="brEmail"><span class="err-msg" id="brEmailErr">Please enter a valid email</span></div>
        <div class="field"><label>Phone</label><input type="tel" id="brPhone"><span class="err-msg" id="brPhoneErr">Please enter a valid phone number</span></div>
        <button type="submit" class="modal-submit">Download Brochure</button>
        <p class="modal-disclaimer">By submitting, you agree to be contacted about The Koru Ville. No spam, ever.</p>
      </form>
      <div class="progress-step" id="progress-brochure">
        <svg class="koru-spin" viewBox="0 0 60 60" fill="none"><path class="koru" stroke-width="1.6" d="M30 52 C30 32 18 27 18 37 C18 45 27 46 27 39 C27 33 21 30 21 30"/></svg>
        <div class="progress-status" id="status-brochure">Verifying your details&hellip;</div>
        <div class="progress-bar-track"><div class="progress-bar-fill" id="bar-brochure"></div></div>
        <div class="progress-pct" id="pct-brochure">0%</div>
      </div>
      <div class="success-step" id="success-brochure">
        <div class="check-circle"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.4"><path d="M20 6L9 17l-5-5"/></svg></div>
        <h3>Brochure Ready</h3>
        <p>Your brochure has been generated. View it below or check your inbox.</p>
        <div class="success-actions">
          <button class="gold-btn" onclick="openPdfViewer('brochure')">View Brochure</button>
          <button class="outline-btn" style="color:var(--maroon);border-color:var(--maroon);" onclick="closeModal('brochure')">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ============ DOCUMENT / PDF VIEWER MODAL ============ -->
<div class="viewer-overlay" id="pdfViewer">
  <div class="viewer-box">
    <div class="viewer-head">
      <h3 id="pdfViewerTitle">Document</h3>
      <button onclick="closePdfViewer()">&times;</button>
    </div>
    <div class="viewer-content" id="pdfViewerContent"></div>
  </div>
</div>

<script>
/* ============================================================
   THE KORU VILLE — shared submission logic
   Client-side validation -> FormData -> fetch to CRM (fails
   silently) -> animated progress bar -> success state -> unlock.
   Replace CRM_ENDPOINT below with your real form-handler URL.
   ============================================================ */
const CRM_ENDPOINT = "https://sumiramsairealtors.in/public/c/the-koruville-0b3hk/submit"; // TODO: replace with real endpoint

let _lpTarget = 'layout'; // 'layout' | 'price' — set right before opening the unlock modal

/* ---------- validation helpers ---------- */
function isValidEmail(v){ return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test((v||'').trim()); }
function isValidPhone(v){ return /^[0-9+\-\s()]{7,15}$/.test((v||'').trim()); }
function setError(input, errEl, hasError){
  if(!input) return;
  input.classList.toggle('error', !!hasError);
  if(errEl) errEl.classList.toggle('show', !!hasError);
}

/* ---------- header scroll state + mobile nav ---------- */
const header = document.getElementById('siteHeader');
window.addEventListener('scroll', () => {
  header.classList.toggle('scrolled', window.scrollY > 40);
});
function toggleNav(){ document.getElementById('mainNav').classList.toggle('open'); }
function closeNav(){ document.getElementById('mainNav').classList.remove('open'); }

/* ---------- scroll reveal ---------- */
// const revealEls = document.querySelectorAll('.reveal');
// const io = new IntersectionObserver((entries) => {
//   entries.forEach(e => { if(e.isIntersecting){ e.target.classList.add('in'); io.unobserve(e.target); } });
// }, { threshold: 0.15 });
// revealEls.forEach(el => io.observe(el));

/* ---------- FAQ accordion ---------- */
function toggleFaq(btn){
  const item = btn.closest('.faq-item');
  const wasOpen = item.classList.contains('open');
  document.querySelectorAll('.faq-item.open').forEach(i => i.classList.remove('open'));
  if(!wasOpen) item.classList.add('open');
}

/* ---------- generic modal open/close ---------- */
function openModal(key){
  resetModalForm(key);
  if(key === 'unlock'){
    document.getElementById('unlockTitle').textContent =
      _lpTarget === 'price' ? 'Unlock Price List' : 'Unlock Layout Plan';
  }
  document.getElementById('modal-' + key).classList.add('show');
  document.body.style.overflow = 'hidden';
}
function closeModal(key){
  document.getElementById('modal-' + key).classList.remove('show');
  document.body.style.overflow = '';
}
function resetModalForm(key){
  const form = document.getElementById('form-' + key);
  if(form){
    form.reset();
    form.querySelectorAll('input').forEach(i => i.classList.remove('error'));
    form.querySelectorAll('.err-msg').forEach(e => e.classList.remove('show'));
    form.style.display = 'block';
  }
  const progress = document.getElementById('progress-' + key);
  const success = document.getElementById('success-' + key);
  if(progress) progress.style.display = 'none';
  if(success) success.style.display = 'none';
}

/* ---------- shared field maps per modal key ---------- */
const FIELD_PREFIX = { offer: 'of', unlock: 'lp', brochure: 'br' };

/* ---------- generic submit handler (validation + progress + fetch) ---------- */
function submitGenericForm(e, key){
  e.preventDefault();
  const p = FIELD_PREFIX[key];
  const first = document.getElementById(p + 'First');
  const last  = document.getElementById(p + 'Last');
  const email = document.getElementById(p + 'Email');
  const phone = document.getElementById(p + 'Phone');

  let valid = true;
  setError(first, document.getElementById(p + 'FirstErr'), !first.value.trim());
  if(!first.value.trim()) valid = false;

  setError(email, document.getElementById(p + 'EmailErr'), !isValidEmail(email.value));
  if(!isValidEmail(email.value)) valid = false;

  setError(phone, document.getElementById(p + 'PhoneErr'), !isValidPhone(phone.value));
  if(!isValidPhone(phone.value)) valid = false;

  if(!valid) return;

  const formData = new FormData();
  formData.append('name', (first.value.trim() + ' ' + (last ? last.value.trim() : '')).trim());
  formData.append('email', email.value.trim());
  formData.append('mobile', phone.value.trim());
  formData.append('source', 'The Koru Ville Website');
  formData.append('message',
    key === 'unlock'
      ? (_lpTarget === 'price' ? 'Requested Price List via website unlock form.' : 'Requested Layout Plan via website unlock form.')
      : key === 'brochure'
        ? 'Requested Brochure via website download form.'
        : 'Requested exclusive offer via popup form.'
  );

  runProgressAndSubmit(key, formData);
}

function submitContactForm(e){
  e.preventDefault();
  const first = document.getElementById('cFirst');
  const email = document.getElementById('cEmail');
  const phone = document.getElementById('cPhone');
  const message = document.getElementById('cMessage');

  let valid = true;
  setError(first, document.getElementById('cFirstErr'), !first.value.trim());
  if(!first.value.trim()) valid = false;
  setError(email, document.getElementById('cEmailErr'), !isValidEmail(email.value));
  if(!isValidEmail(email.value)) valid = false;
  setError(phone, document.getElementById('cPhoneErr'), !isValidPhone(phone.value));
  if(!isValidPhone(phone.value)) valid = false;
  if(!valid) return;

  const formData = new FormData();
  formData.append('name', first.value.trim());
  formData.append('email', email.value.trim());
  formData.append('mobile', phone.value.trim());
  formData.append('message', message.value.trim() || 'General enquiry via contact form.');
  formData.append('source', 'The Koru Ville Website — Contact Section');

  document.getElementById('contactForm').style.display = 'none';
  document.getElementById('contactProgress').style.display = 'block';
  animateProgress('contact', formData, () => {
    document.getElementById('contactProgress').style.display = 'none';
    document.getElementById('contactSuccess').style.display = 'block';
  });
}

/* ---------- shared progress animation + fetch ---------- */
function runProgressAndSubmit(key, formData){
  document.getElementById('form-' + key).style.display = 'none';
  document.getElementById('progress-' + key).style.display = 'block';
  animateProgress(key, formData, () => {
    document.getElementById('progress-' + key).style.display = 'none';
    document.getElementById('success-' + key).style.display = 'block';

    if(key === 'unlock'){
      document.getElementById('unlockSuccessTitle').textContent =
        _lpTarget === 'price' ? 'Price List Unlocked' : 'Layout Plan Unlocked';
    }
  });
}

function animateProgress(key, formData, onDone){
  const bar = document.getElementById('bar-' + key) || document.getElementById(key + 'ProgressBar');
  const pct = document.getElementById('pct-' + key) || document.getElementById(key + 'ProgressText');
  const status = document.getElementById('status-' + key) || document.getElementById(key + 'ProgressStatus');

  const statuses = [
    { at: 0,  msg: 'Verifying your details…' },
    { at: 25, msg: 'Submitting your request…' },
    { at: 55, msg: 'Preparing document…' },
    { at: 80, msg: 'Almost ready…' },
    { at: 95, msg: 'Finalising…' },
  ];
  function updateStatus(v){
    const matched = statuses.filter(s => v >= s.at).pop();
    if(matched && status) status.textContent = matched.msg;
  }

  let progress = 0;
  const interval = setInterval(() => {
    if(progress < 90){
      progress += (90 - progress) * 0.045;
      if(bar) bar.style.width = progress + '%';
      if(pct) pct.textContent = Math.floor(progress) + '%';
      updateStatus(Math.floor(progress));
    }
  }, 60);

  fetch(CRM_ENDPOINT, { method: 'POST', body: formData, headers: { 'Accept': 'application/json' } })
    .catch(() => {}) // fail silently — always complete the flow for the user
    .finally(() => {
      clearInterval(interval);
      if(bar){ bar.style.width = '100%'; bar.style.background = 'var(--success)'; }
      if(pct) pct.textContent = '100%';
      if(status) status.textContent = 'Done!';
      setTimeout(() => {
        if(bar){ bar.style.width = '0%'; bar.style.background = ''; }
        if(pct) pct.textContent = '0%';
        onDone();
      }, 650);
    });
}

/* ---------- document / PDF viewer modal ---------- */
function openPdfViewer(type){
  const title = document.getElementById('pdfViewerTitle');
  const content = document.getElementById('pdfViewerContent');
  if(type === 'brochure'){
    title.textContent = 'The Koru Ville Brochure';
    content.innerHTML = '<img src="https://images.unsplash.com/photo-1602491453631-e2a5ad90a131?auto=format&fit=crop&w=1000&q=80" alt="The Koru Ville brochure cover">' +
      '<p style="margin-top:16px;font-size:13px;color:#8a8a68;">Replace this preview with your real brochure PDF — e.g. swap this block for an &lt;iframe src="brochure.pdf"&gt;.</p>';
  }
  document.getElementById('pdfViewer').classList.add('show');
}
function viewUnlockedDoc(){
  const title = document.getElementById('pdfViewerTitle');
  const content = document.getElementById('pdfViewerContent');
  if(_lpTarget === 'price'){
    title.textContent = 'Price List';
    content.innerHTML = '<p style="font-size:14px;color:#4a4a37;line-height:1.7;">Thank you — your plot-wise price list request has been received. Our team will share the current rate card with you shortly by email and phone.</p>';
  } else {
    title.textContent = 'Layout Plan';
    content.innerHTML = '<p style="font-size:14px;color:#4a4a37;line-height:1.7;">Thank you — your layout plan request has been received. Our team will share the full site layout and plot numbering with you shortly by email and phone.</p>';
  }
  document.getElementById('pdfViewer').classList.add('show');
}
function closePdfViewer(){ document.getElementById('pdfViewer').classList.remove('show'); }

/* close any modal when clicking outside its box */
document.querySelectorAll('.modal-overlay').forEach(ov => {
  ov.addEventListener('click', (e) => {
    if(e.target === ov) ov.classList.remove('show');
  });
});
document.getElementById('pdfViewer').addEventListener('click', (e) => {
  if(e.target.id === 'pdfViewer') closePdfViewer();
});

/* ---------- auto popup after 8 seconds ---------- */
let _autoPopupShown = false;
window.addEventListener('load', () => {
  setTimeout(() => {
    if(!_autoPopupShown && !document.querySelector('.modal-overlay.show')){
      _autoPopupShown = true;
      openModal('offer');
    }
  }, 8000);
});


/* ---------- top RERA marquee: hides once you scroll, shows near the top ---------- */
(function(){
  const marquee = document.getElementById('topMarquee');
  if(!marquee) return;

  function syncMarqueeHeight(){
    const h = marquee.classList.contains('hide') ? 0 : marquee.offsetHeight;
    document.documentElement.style.setProperty('--marquee-h', h + 'px');
  }

  let ticking = false;
  function onScroll(){
    marquee.classList.toggle('hide', window.scrollY > 20);
    syncMarqueeHeight();
    ticking = false;
  }
  window.addEventListener('scroll', () => {
    if(!ticking){ requestAnimationFrame(onScroll); ticking = true; }
  }, { passive: true });

  window.addEventListener('load', syncMarqueeHeight);
  window.addEventListener('resize', syncMarqueeHeight);
  syncMarqueeHeight();
})();

/* ---------- section vine SVGs: draw in + fill fade as each section scrolls through view ---------- */
(function(){
  const clips = Array.from(document.querySelectorAll('.section-vine-clip'));
  if(!clips.length) return;

  const items = clips.map(clip=>{
    const section = clip.closest('section');
    const paths = Array.from(clip.querySelectorAll('svg path')).map(p=>{
      const len = p.getTotalLength();
      p.style.strokeDasharray = len;
      p.style.strokeDashoffset = len;
      return { el:p, len };
    });
    return { section, paths };
  });

  function clamp(v, min, max){ return Math.max(min, Math.min(max, v)); }

  function updateSectionVines(){
    const vh = window.innerHeight;
    items.forEach(({ section, paths })=>{
      if(!section) return;
      const rect = section.getBoundingClientRect();
      const raw = (vh - rect.top) / (vh + rect.height);
      const progress = clamp(raw, 0, 1);
      const drawProgress = clamp(progress / 0.7, 0, 1);

      paths.forEach(({ el, len }, i)=>{
        const stagger = (i / paths.length) * 0.5;
        const localProgress = clamp((drawProgress - stagger) / (1 - stagger), 0, 1);
        el.style.strokeDashoffset = len * (1 - localProgress);

        const fillProgress = clamp((drawProgress - 0.85) / 0.15, 0, 1);
        el.style.fillOpacity = fillProgress * 0.32;
      });
    });
  }

  let ticking = false;
  window.addEventListener('scroll', () => {
    if(!ticking){ requestAnimationFrame(() => { updateSectionVines(); ticking = false; }); ticking = true; }
  }, { passive: true });
  window.addEventListener('resize', updateSectionVines);
  window.addEventListener('load', updateSectionVines);
  updateSectionVines();
})();





// blog?????????????
/* ============================================================
   BLOG PAGE — scroll reveal + sidebar enquiry form
   ============================================================ */

/* TODO: point this at your real Laravel route, e.g. route('blog.enquiry') */
var BLOG_FORM_ENDPOINT = 'https://sumiramsairealtors.in/public/c/the-koruville-0b3hk/submit';

(function () {
  document.addEventListener('DOMContentLoaded', function () {
    initScrollReveal();
    initEnquiryForm();
  });

  /* ---------- scroll reveal for hero, filter bar, cards, pagination, form ---------- */
  function initScrollReveal() {
    var revealEls = document.querySelectorAll('.reveal');
    if (!revealEls.length) return;

    // stagger the card grid slightly so cards don't all pop at once
    var cards = document.querySelectorAll('.blog-card.reveal');
    cards.forEach(function (card, i) {
      card.style.transitionDelay = Math.min(i * 60, 360) + 'ms';
    });

    if (!('IntersectionObserver' in window)) {
      revealEls.forEach(function (el) { el.classList.add('in'); });
      return;
    }

    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('in');
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12 }
    );

    revealEls.forEach(function (el) { io.observe(el); });
  }

  /* ---------- sidebar enquiry form: validate -> progress -> submit -> success ---------- */
  function isValidEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test((v || '').trim()); }
  // Enforces exactly 10 digits
  function isValidPhone(v) { return /^\d{10}$/.test((v || '').replace(/\D/g, '')); }

  function setError(input, errEl, hasError) {
    if (!input) return;
    input.classList.toggle('error', !!hasError);
    if (errEl) errEl.classList.toggle('show', !!hasError);
  }

  function initEnquiryForm() {
    var form = document.getElementById('blogEnquiryForm');
    if (!form) return;

    var progress = document.getElementById('blogFormProgress');
    var success = document.getElementById('blogFormSuccess');
    var fill = document.getElementById('blogProgressFill');
    var status = document.getElementById('blogProgressStatus');

    var name = document.getElementById('bgName');
    var email = document.getElementById('bgEmail');
    var phone = document.getElementById('bgPhone');
    var message = document.getElementById('bgMessage');

    // Enforce 10-digit number-only restriction in real-time
    if (phone) {
      phone.setAttribute('maxlength', '10');
      phone.addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 10);
        setError(phone, document.getElementById('bgPhoneErr'), false);
      });
    }

    // Clear errors on typing
    if (name) name.addEventListener('input', function () { setError(name, document.getElementById('bgNameErr'), false); });
    if (email) email.addEventListener('input', function () { setError(email, document.getElementById('bgEmailErr'), false); });

    form.addEventListener('submit', function (e) {
      e.preventDefault();

      var valid = true;

      setError(name, document.getElementById('bgNameErr'), !name.value.trim());
      if (!name.value.trim()) valid = false;

      setError(email, document.getElementById('bgEmailErr'), !isValidEmail(email.value));
      if (!isValidEmail(email.value)) valid = false;

      setError(phone, document.getElementById('bgPhoneErr'), !isValidPhone(phone.value));
      if (!isValidPhone(phone.value)) valid = false;

      if (!valid) return;

      var formData = new FormData();
      formData.append('name', name.value.trim());
      formData.append('email', email.value.trim());
      formData.append('mobile', phone.value.trim());
      formData.append('message', message.value.trim() || 'General enquiry via blog sidebar form.');
      formData.append('source', 'Blog Page — Sidebar Form');

      var csrfMeta = document.querySelector('meta[name="csrf-token"]');
      if (csrfMeta) formData.append('_token', csrfMeta.getAttribute('content'));

      form.style.display = 'none';
      progress.style.display = 'block';

      var statuses = [
        { at: 0, msg: 'Verifying your details…' },
        { at: 30, msg: 'Submitting your enquiry…' },
        { at: 70, msg: 'Almost there…' },
      ];
      function updateStatus(v) {
        var matched = statuses.filter(function (s) { return v >= s.at; }).pop();
        if (matched && status) status.textContent = matched.msg;
      }

      var pct = 0;
      var interval = setInterval(function () {
        if (pct < 90) {
          pct += (90 - pct) * 0.06;
          if (fill) fill.style.width = pct + '%';
          updateStatus(Math.floor(pct));
        }
      }, 60);

      fetch(BLOG_FORM_ENDPOINT, {
        method: 'POST',
        body: formData,
        headers: { 'Accept': 'application/json' }
      })
        .catch(function () { /* fail silently — always complete the flow for the user */ })
        .finally(function () {
          clearInterval(interval);
          if (fill) { fill.style.width = '100%'; fill.style.background = 'var(--c-moss-green)'; }
          if (status) status.textContent = 'Done!';
          setTimeout(function () {
            progress.style.display = 'none';
            success.style.display = 'block';
          }, 500);
        });
    });
  }
})();


/* ============================================================
   POST / PROJECT DETAIL PAGE — scroll reveal + sidebar form
   ============================================================ */

/* TODO: point this at your real Laravel route, e.g. route('blog.enquiry') */
var PD_FORM_ENDPOINT = 'https://sumiramsairealtors.in/public/c/the-koruville-0b3hk/submit';

(function () {
  document.addEventListener('DOMContentLoaded', function () {
    initScrollReveal();
    initEnquiryForm();
  });

  /* ---------- scroll reveal ---------- */
  function initScrollReveal() {
    var revealEls = document.querySelectorAll('.reveal');
    if (!revealEls.length) return;

    if (!('IntersectionObserver' in window)) {
      revealEls.forEach(function (el) { el.classList.add('in'); });
      return;
    }

    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('in');
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12 }
    );

    revealEls.forEach(function (el) { io.observe(el); });
  }

  /* ---------- sidebar enquiry form: validate -> progress -> submit -> success ---------- */
  function isValidEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test((v || '').trim()); }
  // Enforces exactly 10 digits
  function isValidPhone(v) { return /^\d{10}$/.test((v || '').replace(/\D/g, '')); }

  function setError(input, errEl, hasError) {
    if (!input) return;
    input.classList.toggle('error', !!hasError);
    if (errEl) errEl.classList.toggle('show', !!hasError);
  }

  function initEnquiryForm() {
    var form = document.getElementById('pdEnquiryForm');
    if (!form) return;

    var progress = document.getElementById('pdFormProgress');
    var success = document.getElementById('pdFormSuccess');
    var fill = document.getElementById('pdProgressFill');
    var status = document.getElementById('pdProgressStatus');

    var name = document.getElementById('pdName');
    var email = document.getElementById('pdEmail');
    var phone = document.getElementById('pdPhone');
    var message = document.getElementById('pdMessage');

    // Enforce 10-digit number-only restriction in real-time
    if (phone) {
      phone.setAttribute('maxlength', '10');
      phone.addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 10);
        setError(phone, document.getElementById('pdPhoneErr'), false);
      });
    }

    // Clear errors on typing
    if (name) name.addEventListener('input', function () { setError(name, document.getElementById('pdNameErr'), false); });
    if (email) email.addEventListener('input', function () { setError(email, document.getElementById('pdEmailErr'), false); });

    form.addEventListener('submit', function (e) {
      e.preventDefault();

      var valid = true;

      setError(name, document.getElementById('pdNameErr'), !name.value.trim());
      if (!name.value.trim()) valid = false;

      setError(email, document.getElementById('pdEmailErr'), !isValidEmail(email.value));
      if (!isValidEmail(email.value)) valid = false;

      setError(phone, document.getElementById('pdPhoneErr'), !isValidPhone(phone.value));
      if (!isValidPhone(phone.value)) valid = false;

      if (!valid) return;

      var formData = new FormData();
      formData.append('name', name.value.trim());
      formData.append('email', email.value.trim());
      formData.append('mobile', phone.value.trim());
      formData.append('message', message.value.trim() || 'General enquiry via post detail sidebar form.');
      formData.append('source', 'Post Detail Page — Sidebar Form');
      formData.append('page_url', window.location.href);

      var csrfMeta = document.querySelector('meta[name="csrf-token"]');
      if (csrfMeta) formData.append('_token', csrfMeta.getAttribute('content'));

      form.style.display = 'none';
      progress.style.display = 'block';

      var statuses = [
        { at: 0, msg: 'Verifying your details…' },
        { at: 30, msg: 'Submitting your enquiry…' },
        { at: 70, msg: 'Almost there…' },
      ];
      function updateStatus(v) {
        var matched = statuses.filter(function (s) { return v >= s.at; }).pop();
        if (matched && status) status.textContent = matched.msg;
      }

      var pct = 0;
      var interval = setInterval(function () {
        if (pct < 90) {
          pct += (90 - pct) * 0.06;
          if (fill) fill.style.width = pct + '%';
          updateStatus(Math.floor(pct));
        }
      }, 60);

      fetch(PD_FORM_ENDPOINT, {
        method: 'POST',
        body: formData,
        headers: { 'Accept': 'application/json' }
      })
        .catch(function () { /* fail silently — always complete the flow for the user */ })
        .finally(function () {
          clearInterval(interval);
          if (fill) { fill.style.width = '100%'; fill.style.background = 'var(--c-moss-green)'; }
          if (status) status.textContent = 'Done!';
          setTimeout(function () {
            progress.style.display = 'none';
            success.style.display = 'block';
          }, 500);
        });
    });
  }
})();

document.addEventListener('DOMContentLoaded', function () {
    const revealEls = document.querySelectorAll('.reveal');

    if (!revealEls.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    revealEls.forEach((el) => observer.observe(el));
});
</script>
</body>
</html>