<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A&T Media Sdn. Bhd. provides one-stop signboard, signage, printing, design, production, and installation services in Malaysia.">
    <title>A&T Media Sdn. Bhd. | Signboard, Signage & Printing KL</title>
    <link rel="preconnect" href="https://stackpath.bootstrapcdn.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
      :root {
        --brand-red: #d71920;
        --brand-red-dark: #a91117;
        --ink: #111111;
        --graphite: #2c2c2c;
        --muted: #747474;
        --soft-grey: #f3f4f6;
        --line: #dddddd;
      }

      html {
        scroll-behavior: smooth;
      }

      body {
        color: var(--ink);
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: 0;
      }

      .navbar {
        border-bottom: 1px solid var(--line);
        background: #ffffff;
      }

      .navbar-brand {
        color: var(--ink);
        font-weight: 800;
        letter-spacing: 0;
        display: inline-flex;
        align-items: center;
        padding-top: 0.2rem;
        padding-bottom: 0.2rem;
      }

      .navbar-brand img {
        width: 58px;
        height: 58px;
        object-fit: contain;
        display: block;
      }

      .navbar-light .navbar-nav .nav-link {
        color: var(--graphite);
        font-weight: 600;
      }

      .navbar-light .navbar-nav .nav-link:hover {
        color: var(--brand-red);
      }

      .btn-red {
        background: var(--brand-red);
        border-color: var(--brand-red);
        color: #ffffff;
        font-weight: 700;
      }

      .btn-red:hover,
      .btn-red:focus {
        background: var(--brand-red-dark);
        border-color: var(--brand-red-dark);
        color: #ffffff;
      }

      .btn-outline-dark {
        font-weight: 700;
      }

      .hero {
        position: relative;
        min-height: 620px;
        display: flex;
        align-items: center;
        overflow: hidden;
        background: var(--ink);
      }

      .hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background:
          linear-gradient(90deg, rgba(0, 0, 0, 0.88) 0%, rgba(0, 0, 0, 0.66) 44%, rgba(0, 0, 0, 0.12) 100%),
          url("assets/signboardkl-hero.png") center right / cover no-repeat;
      }

      .hero::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 7px;
        background: var(--brand-red);
      }

      .hero-content {
        position: relative;
        z-index: 1;
        color: #ffffff;
        max-width: 650px;
        padding: 86px 0 96px;
      }

      .eyebrow {
        color: #ffffff;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 0.82rem;
        font-weight: 800;
        letter-spacing: 0;
        margin-bottom: 18px;
        text-transform: uppercase;
      }

      .eyebrow::before {
        content: "";
        width: 38px;
        height: 3px;
        background: var(--brand-red);
      }

      .hero h1 {
        font-size: clamp(2.4rem, 6vw, 4.75rem);
        font-weight: 900;
        line-height: 0.98;
        margin-bottom: 24px;
      }

      .hero h1 span {
        color: var(--brand-red);
      }

      .hero p {
        color: #f1f1f1;
        font-size: 1.14rem;
        line-height: 1.75;
        max-width: 560px;
      }

      .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 32px;
      }

      .quick-strip {
        background: #ffffff;
        border-bottom: 1px solid var(--line);
      }

      .quick-item {
        min-height: 96px;
        display: flex;
        align-items: center;
        border-right: 1px solid var(--line);
      }

      .quick-item:last-child {
        border-right: 0;
      }

      .quick-item i {
        color: var(--brand-red);
        font-size: 1.7rem;
        width: 42px;
      }

      .quick-item strong {
        display: block;
      }

      .quick-item span {
        color: var(--muted);
        font-size: 0.93rem;
      }

      section {
        padding: 76px 0;
      }

      .section-kicker {
        color: var(--brand-red);
        font-weight: 800;
        text-transform: uppercase;
      }

      .section-title {
        font-size: 2.2rem;
        font-weight: 850;
        margin-bottom: 16px;
      }

      .section-copy {
        color: var(--muted);
        font-size: 1.02rem;
        line-height: 1.75;
      }

      .service-card,
      .process-step {
        height: 100%;
        border: 1px solid var(--line);
        border-radius: 8px;
        background: #ffffff;
        transition: transform 180ms ease, box-shadow 180ms ease;
      }

      .service-card:hover,
      .process-step:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 32px rgba(17, 17, 17, 0.1);
      }

      .service-card {
        padding: 28px;
      }

      .service-icon {
        width: 52px;
        height: 52px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background: var(--brand-red);
        color: #ffffff;
        font-size: 1.45rem;
        margin-bottom: 22px;
      }

      .service-card h3,
      .process-step h3 {
        font-size: 1.2rem;
        font-weight: 800;
      }

      .service-card p,
      .process-step p {
        color: var(--muted);
        line-height: 1.65;
        margin-bottom: 0;
      }

      .product-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 18px;
      }

      .product-tags span {
        border: 1px solid var(--line);
        border-radius: 999px;
        color: var(--graphite);
        font-size: 0.82rem;
        font-weight: 700;
        line-height: 1.2;
        padding: 7px 10px;
      }

      .work-band {
        background: var(--soft-grey);
      }

      .project-card {
        height: 100%;
        border: 1px solid var(--line);
        border-radius: 8px;
        overflow: hidden;
        background: #ffffff;
      }

      .project-card img {
        width: 100%;
        aspect-ratio: 4 / 3;
        object-fit: cover;
        display: block;
        background: var(--soft-grey);
      }

      .project-card-body {
        padding: 18px;
      }

      .project-card-body h3 {
        font-size: 1.05rem;
        font-weight: 800;
        margin-bottom: 6px;
      }

      .project-card-body p {
        color: var(--muted);
        line-height: 1.55;
        margin-bottom: 0;
      }

      .work-photo {
        min-height: 390px;
        border-radius: 8px;
        background:
          linear-gradient(135deg, rgba(215, 25, 32, 0.9), rgba(17, 17, 17, 0.72)),
          url("assets/signboardkl-hero.png") center / cover no-repeat;
      }

      .check-list {
        list-style: none;
        padding: 0;
        margin: 24px 0 0;
      }

      .check-list li {
        display: flex;
        align-items: flex-start;
        margin-bottom: 14px;
        color: var(--graphite);
      }

      .check-list i {
        color: var(--brand-red);
        margin-right: 12px;
        margin-top: 4px;
      }

      .process-step {
        padding: 28px;
      }

      .step-number {
        width: 42px;
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 2px solid var(--brand-red);
        border-radius: 8px;
        color: var(--brand-red);
        font-weight: 900;
        margin-bottom: 20px;
      }

      .cta {
        background: var(--ink);
        color: #ffffff;
      }

      .cta .section-copy {
        color: #dedede;
      }

      .contact-box {
        border: 1px solid rgba(255, 255, 255, 0.22);
        border-radius: 8px;
        padding: 26px;
        background: rgba(255, 255, 255, 0.05);
      }

      .contact-box a {
        color: #ffffff;
        font-weight: 700;
      }

      footer {
        background: #ffffff;
        border-top: 1px solid var(--line);
        color: var(--muted);
        padding: 24px 0;
      }

      .whatsapp-float {
        position: fixed;
        right: 24px;
        bottom: 24px;
        z-index: 1040;
        width: 60px;
        height: 60px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #25d366;
        color: #ffffff;
        font-size: 2rem;
        box-shadow: 0 12px 28px rgba(17, 17, 17, 0.24);
        transition: transform 180ms ease, box-shadow 180ms ease, background 180ms ease;
      }

      .whatsapp-float:hover,
      .whatsapp-float:focus {
        background: #1ebe5d;
        color: #ffffff;
        text-decoration: none;
        transform: translateY(-3px);
        box-shadow: 0 16px 34px rgba(17, 17, 17, 0.28);
      }

      @media (max-width: 991.98px) {
        .hero {
          min-height: auto;
        }

        .hero::before {
          background:
            linear-gradient(180deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.64) 64%, rgba(0, 0, 0, 0.36) 100%),
            url("assets/signboardkl-hero.png") center / cover no-repeat;
        }

        .quick-item {
          border-right: 0;
          border-bottom: 1px solid var(--line);
        }
      }

      @media (max-width: 575.98px) {
        .navbar-brand img {
          width: 50px;
          height: 50px;
        }

        section {
          padding: 58px 0;
        }

        .hero-content {
          padding: 72px 0 82px;
        }

        .hero-actions .btn {
          width: 100%;
        }

        .whatsapp-float {
          right: 18px;
          bottom: 18px;
          width: 54px;
          height: 54px;
          font-size: 1.8rem;
        }
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
      <div class="container">
        <a class="navbar-brand" href="#" aria-label="A&T Media Sdn. Bhd.">
          <img src="assets/ant-signage-logo.png" alt="A&T Media Sdn. Bhd. logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="navbar-nav ml-auto align-items-lg-center">
            <li class="nav-item"><a class="nav-link" href="#services">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
            <li class="nav-item"><a class="nav-link" href="#work">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#process">Process</a></li>
            <li class="nav-item ml-lg-3"><a class="btn btn-red px-4" href="#contact"><i class="fas fa-phone-alt mr-2"></i>Get Quote</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="hero">
      <div class="container">
        <div class="hero-content">
          <div class="eyebrow">Signboard | Signage | Printing</div>
          <h1>Professional signage with stronger <span>impact.</span></h1>
          <p>A&T Media Sdn. Bhd. provides reliable one-stop support for consulting, design, production, printing, on-site installation, and evaluation of quality signage products.</p>
          <div class="hero-actions">
            <a class="btn btn-red btn-lg px-4" href="#contact"><i class="fas fa-paper-plane mr-2"></i>Request a Quote</a>
            <a class="btn btn-outline-light btn-lg px-4" href="#services"><i class="fas fa-th-large mr-2"></i>View Products</a>
          </div>
        </div>
      </div>
    </header>

    <div class="quick-strip">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-md-4 quick-item px-3">
            <i class="fas fa-drafting-compass"></i>
            <div><strong>Consulting to Installation</strong><span>Reliable one-stop signage support</span></div>
          </div>
          <div class="col-md-4 quick-item px-3">
            <i class="fas fa-map-marker-alt"></i>
            <div><strong>KL, Klang Valley & Selangor</strong><span>Serving Kuala Lumpur, Selangor and Seremban</span></div>
          </div>
          <div class="col-md-4 quick-item px-3">
            <i class="fas fa-bolt"></i>
            <div><strong>Signage & Printing</strong><span>In-house production and finishing</span></div>
          </div>
        </div>
      </div>
    </div>

    <section id="services">
      <div class="container">
        <div class="row mb-4">
          <div class="col-lg-7">
            <div class="section-kicker">What we provide</div>
            <h2 class="section-title">Signboard, signage, and printing solutions for commercial brands.</h2>
          </div>
          <div class="col-lg-5">
            <p class="section-copy">From first consultation to final installation, every project is planned around visibility, material choice, production quality, and practical on-site requirements.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="service-card">
              <div class="service-icon"><i class="fas fa-store"></i></div>
              <h3>Signboard</h3>
              <p>Custom signboard solutions for shops, commercial units, construction sites, and business frontage.</p>
              <div class="product-tags">
                <span>3D Lighting</span>
                <span>Back-Lit</span>
                <span>Front-Lit</span>
                <span>Lightbox</span>
                <span>Aluminium Strip Base</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="service-card">
              <div class="service-icon"><i class="fas fa-lightbulb"></i></div>
              <h3>Signage</h3>
              <p>Indoor and outdoor signage designed for clear brand visibility, direction, promotion, and display.</p>
              <div class="product-tags">
                <span>Billboard & Hoarding</span>
                <span>Indoor Signage</span>
                <span>LED Display</span>
                <span>Pylon & Directional</span>
                <span>Road Sign</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="service-card">
              <div class="service-icon"><i class="fas fa-font"></i></div>
              <h3>3D Box Up Lettering</h3>
              <p>Dimensional lettering for storefronts, offices, and branded environments that need strong presence.</p>
              <div class="product-tags">
                <span>Acrylic Lettering</span>
                <span>Aluminium / Acrylic</span>
                <span>Aluminium Lettering</span>
                <span>Stainless Steel</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="service-card">
              <div class="service-icon"><i class="fas fa-print"></i></div>
              <h3>Printing</h3>
              <p>Commercial printing support for promotional displays, banners, decals, and business graphics.</p>
              <div class="product-tags">
                <span>Display Set</span>
                <span>Wood Easel Stand</span>
                <span>Exhibition Booth</span>
                <span>Backdrop Display</span>
                <span>Sticker Service</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
            <div class="service-card">
              <div class="service-icon"><i class="fas fa-tools"></i></div>
              <h3>Fabric Lightbox</h3>
              <p>Clean illuminated display systems for retail, exhibition, showroom, and high-visibility brand spaces.</p>
              <div class="product-tags">
                <span>Soft Fabric Lightbox</span>
                <span>Double Sided</span>
                <span>Retail Display</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="service-card">
              <div class="service-icon"><i class="fas fa-ruler-combined"></i></div>
              <h3>Standee Signage</h3>
              <p>Portable display signage for events, retail floors, campaigns, wayfinding, and product promotions.</p>
              <div class="product-tags">
                <span>Roll Up Bunting</span>
                <span>Campaign Display</span>
                <span>Floor Standee</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="projects" class="work-band">
      <div class="container">
        <div class="row mb-4">
          <div class="col-lg-7">
            <div class="section-kicker">Featured work</div>
            <h2 class="section-title">A few product examples from A&T Media.</h2>
          </div>
          <div class="col-lg-5">
            <p class="section-copy">The products page highlights practical signage work across 3D lettering, lightbox displays, billboard and construction boards, stickers, and frontlit or backlit box-up signs.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4">
            <div class="project-card">
              <img src="https://cdn1.npcdn.net/images/177738497442354ac61cc738419713a28888d159d0.jpeg?md5id=e0070f4adceee3ac92c8eb8b95ad84a7&amp;new_width=1000&amp;new_height=1000&amp;size=max&amp;w=1767862603&amp;type=10" alt="3D lettering signboard project">
              <div class="project-card-body">
                <h3>3D Lettering Signboard</h3>
                <p>Dimensional signage for retail frontage and brand visibility.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4">
            <div class="project-card">
              <img src="https://cdn1.npcdn.net/images/17764159982820dcc8a06a571cf2952691e13b56fc.jpeg?md5id=e0070f4adceee3ac92c8eb8b95ad84a7&amp;new_width=1000&amp;new_height=1000&amp;size=max&amp;w=1767862603&amp;type=10" alt="Fabric lightbox signage project">
              <div class="project-card-body">
                <h3>Fabric Lightbox Double Sided</h3>
                <p>Illuminated display signage for stronger visibility.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4">
            <div class="project-card">
              <img src="https://cdn1.npcdn.net/images/17696822084c54c9100cb46dca4750c3abdfa7f106.png?md5id=e0070f4adceee3ac92c8eb8b95ad84a7&amp;new_width=1000&amp;new_height=1000&amp;size=max&amp;w=1767862603&amp;type=10" alt="Billboard and construction board signage project">
              <div class="project-card-body">
                <h3>Billboard & Construction Board</h3>
                <p>Outdoor site signage for project and hoarding needs.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4">
            <div class="project-card">
              <img src="https://cdn1.npcdn.net/images/17678593425339d9a33b7e1e5bee720bf584f280c2.png?md5id=e0070f4adceee3ac92c8eb8b95ad84a7&amp;new_width=1000&amp;new_height=1000&amp;size=max&amp;w=1767862603&amp;type=10" alt="Acrylic 3D lettering and sticker signage project">
              <div class="project-card-body">
                <h3>Acrylic 3D Lettering & Sticker</h3>
                <p>Mixed material signage for branded interior spaces.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="work">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-4 mb-lg-0">
            <div class="work-photo" role="img" aria-label="A&T Media signboard installation"></div>
          </div>
          <div class="col-lg-5 offset-lg-1">
            <div class="section-kicker">About A&T Media</div>
            <h2 class="section-title">A reliable one-stop partner for signage and printing.</h2>
            <p class="section-copy">A&T Media Sdn. Bhd. focuses on dependable service from consulting, design, production, installation, and evaluation, helping customers complete signage projects with clear coordination.</p>
            <ul class="check-list">
              <li><i class="fas fa-check-circle"></i><span>In-house support for production, design, marketing, on-site installation, and evaluation.</span></li>
              <li><i class="fas fa-check-circle"></i><span>Products covering signboard, signage, printing, fabric lightbox, standee signage, and 3D lettering.</span></li>
              <li><i class="fas fa-check-circle"></i><span>Service coverage highlighted for Kuala Lumpur (KL), Klang Valley, Selangor, and Seremban.</span></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section id="process">
      <div class="container">
        <div class="row mb-4">
          <div class="col-lg-7">
            <div class="section-kicker">How it works</div>
            <h2 class="section-title">A practical path from consultation to completed signage.</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-4 mb-md-0">
            <div class="process-step">
              <div class="step-number">01</div>
              <h3>Consult & Plan</h3>
              <p>Share your business needs, location, sign type, artwork, measurement, or reference direction.</p>
            </div>
          </div>
          <div class="col-md-4 mb-4 mb-md-0">
            <div class="process-step">
              <div class="step-number">02</div>
              <h3>Design & Produce</h3>
              <p>Confirm the design, materials, production method, and timeline before fabrication begins.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="process-step">
              <div class="step-number">03</div>
              <h3>Install & Evaluate</h3>
              <p>The finished signage is delivered, installed on site, and reviewed for quality completion.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="contact" class="cta">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 mb-4 mb-lg-0">
            <div class="section-kicker">Get a quote</div>
            <h2 class="section-title mb-3">Need signboard, signage, or printing support?</h2>
            <p class="section-copy mb-0">Send your project details, artwork, measurements, and location. A&T Media can help with recommendations, production, and installation planning.</p>
          </div>
          <div class="col-lg-4 offset-lg-1">
            <div class="contact-box">
              <p class="mb-3"><i class="fas fa-phone-alt mr-2 text-danger"></i><a href="tel:+60167013295">+60 16-701 3295</a></p>
              <p class="mb-3"><i class="fas fa-envelope mr-2 text-danger"></i><a href="mailto:antadv.rei@gmail.com">antadv.rei@gmail.com</a></p>
              <p class="mb-4"><i class="fas fa-map-marker-alt mr-2 text-danger"></i>16, Jalan Nilam 1/6, Taman Teknologi Tinggi Subang, 47500 Subang Jaya, Selangor, Malaysia.</p>
              <a class="btn btn-red btn-block" href="mailto:antadv.rei@gmail.com"><i class="fas fa-paper-plane mr-2"></i>Email Your Brief</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container d-flex flex-column flex-md-row justify-content-between align-items-md-center">
        <div><strong class="text-dark">A&T <span class="text-danger">Media</span></strong> | Signboard, signage and printing</div>
        <div class="mt-2 mt-md-0">Consulting, design, production, installation and evaluation.</div>
      </div>
    </footer>

    <a class="whatsapp-float" href="https://wa.me/60167013295?text=Hi%20A%26T%20Media%2C%20I%20would%20like%20to%20request%20a%20signage%20quote." target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
      <i class="fab fa-whatsapp" aria-hidden="true"></i>
    </a>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
