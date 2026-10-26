@extends('layouts.kv')

@section('title', 'Terms & Conditions | The Koru Ville')
@section('description', 'Terms and conditions for thekoruville.com — please read carefully before using or interacting with our digital platform.')

@section('content')

<section class="kv-pagehead">
  <div class="kv-shell">
    <span class="kv-eyebrow">Legal</span>
    <h1>Terms &amp; Conditions</h1>
    <div class="kv-pagehead__meta"><span>Last updated: June 2026</span><span>The Koru Ville</span></div>
  </div>
</section>

<section class="kv-subsection">
  <div class="kv-shell">
    <div class="kv-prose">
      <p>Thank you for visiting <a href="{{ url('/') }}">thekoruville.com</a>. Please read the following legal frameworks, disclaimers and terms carefully before using or interacting with our digital platform.</p>

      <h2>1. Informational Purpose Only</h2>
      <p>The content including brochures, floor plans, layouts, pricing and marketing collateral displayed on this website is solely for informational purposes and does not constitute an offer or solicitation of sales. Any disclosure, copying, distribution or reliance on this material without explicit written approval is strictly prohibited.</p>

      <h2>2. Artistic Impressions &amp; Imagery</h2>
      <p>All visuals, 3D renderings, walkthrough videos and illustrations are artistic impressions or schematic representations meant only for reference and may not reflect the precise architectural metrics of the actual product. Furniture, interior decor, fittings and landscape accessories shown are mockups and are not included with the standard asset unit.</p>

      <h2>3. Regulatory &amp; Contractual Framework</h2>
      <p>This material does not constitute any component of a formal contractual agreement. All property details, development timelines and bookings are subject to final contracts and are dynamically governed by the mandates of the Real Estate (Regulation and Development) Act, 2016 (RERA).</p>

      <h2>4. Limitation of Liability</h2>
      <p>Nothing on this website should be construed as advertising or an active offer for sale. The company, its directors, developers and field representatives shall not be held liable for any direct or consequential transactional action taken by users based completely on the information compiled here.</p>

      <div class="kv-legal-note">Users are strongly advised not to rely on any pricing or layout calculations until official infrastructure updates and physical property audits are formally completed.</div>

      <h2>5. Communication Consent (DND Override)</h2>
      <div class="kv-legal-card">
        <div>
          <b>Consent to Contact</b>
          <span>By submitting your personal details through our inquiry forms or email links, you provide express consent to being contacted by our sales and customer care teams via Call, SMS, Email or WhatsApp, even if your contact number is registered under national DND (Do Not Disturb) or NDNC registries.</span>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
