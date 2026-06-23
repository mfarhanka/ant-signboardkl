<?php
$siteName = 'A&T Media Sdn. Bhd.';
$siteTitle = 'A&T Media Sdn. Bhd. | Signboard, Signage & Printing KL';
$siteDescription = 'A&T Media Sdn. Bhd. provides one-stop signboard, signage, printing, design, production, and installation services in Kuala Lumpur (KL), Klang Valley, Selangor, and Seremban.';
$siteKeywords = 'signboard Kuala Lumpur, signage KL, signage Klang Valley, signage Selangor, signage Seremban, 3D lettering, lightbox signage, billboard signage';
$sitePhone = '+60 16-701 3295';
$siteEmail = 'antadv.rei@gmail.com';
$siteUrl = 'http://signboardkl.com.my';
$siteAddress = [
  '@type' => 'PostalAddress',
  'streetAddress' => '16, Jalan Nilam 1/6, Taman Teknologi Tinggi Subang',
  'postalCode' => '47500',
  'addressLocality' => 'Subang Jaya',
  'addressRegion' => 'Selangor',
  'addressCountry' => 'MY',
];

$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

if ($requestPath === '/index.php' || $requestPath === '/index.html') {
  $requestPath = '/';
}

$baseUrl = rtrim($siteUrl, '/');
$canonicalUrl = $baseUrl . ($requestPath === '/' ? '/' : $requestPath);
$ogImage = $baseUrl . '/assets/signboardkl-hero.png';
$logoImage = $baseUrl . '/assets/ant-signage-logo.png';

$structuredData = [
  '@context' => 'https://schema.org',
  '@type' => 'LocalBusiness',
  'name' => $siteName,
  'image' => $ogImage,
  'logo' => $logoImage,
  'url' => $canonicalUrl,
  'telephone' => $sitePhone,
  'email' => $siteEmail,
  'description' => $siteDescription,
  'priceRange' => '$$',
  'address' => $siteAddress,
  'areaServed' => [
    'Kuala Lumpur',
    'Klang Valley',
    'Selangor',
    'Seremban',
  ],
  'aggregateRating' => [
    '@type' => 'AggregateRating',
    'ratingValue' => '5.0',
    'reviewCount' => '25',
  ],
  'sameAs' => [
    'https://wa.me/60167013295',
  ],
];

$googleReviews = [
  [
    'name' => 'Nur Milah',
    'date' => '8 months ago',
    'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocKi3C9QqGsIyk_rpjazoumj8yXqMZ7lK0z9q1_jevpybGnCnw=s120-c-rp-mo-br100',
    'review' => '5-star Google review.',
  ],
  [
    'name' => 'SoftiexDinox',
    'date' => '8 months ago',
    'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocLDRjDRtu8ZojDRp84V2ITBzLkyy5Usv_mTeRtAAPYRIl2c7QcL=s120-c-rp-mo-ba2-br100',
    'review' => 'Very nice and professional service!',
  ],
  [
    'name' => 'Naqiah',
    'date' => '8 months ago',
    'avatar' => 'https://lh3.googleusercontent.com/a-/ALV-UjVyMp7fla_djCe-qqPaNO3-Mkeyk-rzePmxMlIjXMZ6YMP9fgU=s120-c-rp-mo-br100',
    'review' => 'Good service and quality in signboard.',
  ],
  [
    'name' => 'Vennibell',
    'date' => '8 months ago',
    'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocIjkqeUrgapa2JRRUBiwcpwntGr1rYClth2GRAGQXx05kbERg=s120-c-rp-mo-br100',
    'review' => 'Very good!',
  ],
  [
    'name' => 'Babuwilna Wilnasani',
    'date' => '8 months ago',
    'avatar' => 'https://lh3.googleusercontent.com/a-/ALV-UjVduSXBfnebYs2LWBLCCeu8Em_EUwsV7cPe1Cac1X_levgaiWU=s120-c-rp-mo-br100',
    'review' => '5-star Google review.',
  ],
  [
    'name' => 'Ghost Me',
    'date' => '8 months ago',
    'avatar' => 'https://lh3.googleusercontent.com/a-/ALV-UjW8QFi9KKui16ogCAZEyqo1sOKAs-IClOxFqhNCR-WnoTkH9cjZ=s120-c-rp-mo-br100',
    'review' => 'A&T Signboard team is awesome! Easy to talk and their artwork is so nice. Really satisfied with the result!',
  ],
  [
    'name' => 'Admin',
    'date' => '8 months ago',
    'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocKPiJZhZ6u4078ByrYall4tUymuTGHbxOHK6Vy5vcHj8Xln4g=s120-c-rp-mo-br100',
    'review' => 'Very impressed with A&T Signboard! The designer is professional and helpful, giving great design options that fit customer needs. Really satisfied with the final artwork!!',
  ],
  [
    'name' => 'Fariq hakimi',
    'date' => '8 months ago',
    'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocIzmt-Y9jwRbAIPZ4JMH8PJ76aICaQeIqAnX2mECLRf5dV62A=s120-c-rp-mo-br100',
    'review' => '(Translated by Google) Very good work (Original) Kerja baik sangat.',
  ],
  [
    'name' => 'Syafawani Mukayat',
    'date' => '8 months ago',
    'avatar' => 'https://lh3.googleusercontent.com/a-/ALV-UjUpUVhZc80xaexcJ2WUKWCegxiroN-5pdRwJE3q2MA1-9wdQE4=s120-c-rp-mo-br100',
    'review' => '5-star Google review.',
  ],
  [
    'name' => 'Eugene Loo',
    'date' => '8 months ago',
    'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocKQxhbhIApISUBwSKkAGm0U98USLWuoFua4zdBNDRicFuRsTw=s120-c-rp-mo-br100',
    'review' => '5-star Google review.',
  ],
  [
    'name' => 'Mohd Faizal Faizaliyananas',
    'date' => '8 months ago',
    'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocKoFk2yJ16VRy-8UjLz9jRkOyEjM_jakj9GI5xgwkEYiseq2g=s120-c-rp-mo-br100',
    'review' => '5-star Google review.',
  ],
  [
    'name' => 'Y S Chang',
    'date' => '8 months ago',
    'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocJzMA_yEB8rOoyVj-MiZ6FZFdkukM-hXIUkmgvt1FcLX4rukA=s120-c-rp-mo-br100',
    'review' => 'Excellent quality product with service.',
  ],
  [
    'name' => 'Ivan “Iv.A” Ang',
    'date' => '8 months ago',
    'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocIQ57qQNKC_gkENINLTZ-4k3dhO3bHZR1vVwpi-wzQc8T_t3w=s120-c-rp-mo-br100',
    'review' => 'Friendly and professional team, recommended for advertising needs and wants. Good job and keep it up!',
  ],
  [
    'name' => 'shimin Tan',
    'date' => '8 months ago',
    'avatar' => 'https://lh3.googleusercontent.com/a-/ALV-UjUwwkKYnZK1AsCntVFo_o35idCUnwMpGsslmtvpwY-tyWYIOvCl=s120-c-rp-mo-br100',
    'review' => '(Translated by Google) The new sign is really nice! The workmanship is very fine, and the light is on and it looks very textured. (Original) 新招牌真的很好看！做工很细，灯亮起来超有质感',
  ],
  [
    'name' => 'Owen Lee',
    'date' => '10 months ago',
    'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocJpm7QTD08BrLRobItEF5sXNsv6w_TmXrMna-GQUFjax8EhTA=s120-c-rp-mo-ba2-br100',
    'review' => 'Superb service & quality signage from A&T Advertising.',
  ],
  [
    'name' => 'zy tan',
    'date' => '10 months ago',
    'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocKbwHt9WGLgVLbH3vCYwYl8m2BcNpBUcTbnKoEWXTRoEkWly7A=s120-c-rp-mo-br100',
    'review' => 'SY Printing good service.',
  ],
  [
    'name' => 'Ehsan Property',
    'date' => '2 years ago',
    'avatar' => 'https://lh3.googleusercontent.com/a-/ALV-UjUS362sxbJJUvYtMMGJI3hqgLAy2-Ty103_2hN3B_c3XzPqgT1a=s120-c-rp-mo-br100',
    'review' => 'We had a great experience dealing with Mr. Ray Tan and his team. We ordered a signboard, and they provided excellent service. The font and overall design were neat and beautiful. This is the second time we\'ve ordered from this company, and I highly recommend them for their outstanding customer care and top-notch service!',
  ],
  [
    'name' => 'Jessyca Yong',
    'date' => '2 years ago',
    'avatar' => 'https://lh3.googleusercontent.com/a-/ALV-UjWzgTPrcGxGlA-sGDfvuUTq8S9xhanSc3ThXfdOSQbXIzzsNBGYKA=s120-c-rp-mo-ba3-br100',
    'review' => 'Highly recommend! Very responsive and reasonable pricing. Thanks Brandon for his good service. Hope to collaborate more on highway projects.',
  ],
  [
    'name' => 'Hashim Abdullah',
    'date' => '2 years ago',
    'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocK1fKqM2NhQk6T0ayqmUjLgSf9cwS3u02U_zzkNGKZSeu6zIA=s120-c-rp-mo-br100',
    'review' => '(Translated by Google) It\'s a pleasure to deal with A & T. All questions and suggestions received good cooperation and response. The quality of the product is also very satisfactory and most importantly the price is very reasonable. (Original) Senang berurusan dengan A & T...segala pertanyaan dan cadangan mendapat kerjasama dan respons yg baik. Kualiti produk juga amat memuaskan dan yang paling penting harga sangat berpatutan.',
  ],
  [
    'name' => 'Wan Brandon',
    'date' => '2 years ago',
    'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocIehmaPL742CBLwOWR55HYMzxk47KAC9tsvwpwpLWDpy3Bfyc0=s120-c-rp-mo-br100',
    'review' => 'Professional signboard maker in Klang Valley. Reasonable price, and quality product and service. Must choose A&T.',
  ],
  [
    'name' => 'Shinee Pong',
    'date' => '2 years ago',
    'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocIL8cVGtvzHksDUWvel_T4eQzBPgZbJHQI-1yULMlOP45OEl5G9=s120-c-rp-mo-ba4-br100',
    'review' => '5-star Google review.',
  ],
  [
    'name' => 'JIA SHENG CHIN',
    'date' => '2 years ago',
    'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocL5DHj_rRCtoCfB43_i01NCKZaXK2h_29mDfp3jgpUu6CXdTw=s120-c-rp-mo-br100',
    'review' => '5-star Google review.',
  ],
  [
    'name' => 'R4Rei Tan (R4Rei)',
    'date' => '2 years ago',
    'avatar' => 'https://lh3.googleusercontent.com/a-/ALV-UjU7iRNnTubnwq9OQJZYhMfHO1CDtq5MtaArtL0H0H9pC2Cz4D3gVQ=s120-c-rp-mo-br100',
    'review' => 'Good services.',
  ],
  [
    'name' => 'Chloe Tan',
    'date' => '3 years ago',
    'avatar' => 'https://lh3.googleusercontent.com/a-/ALV-UjWrlZTHcIco7gzDehXzqWVOjQa20mrzctJcAU1ttEvhRZ8aQlGo=s120-c-rp-mo-br100',
    'review' => '5-star Google review.',
  ],
  [
    'name' => 'Rei Tan',
    'date' => '3 years ago',
    'avatar' => 'https://lh3.googleusercontent.com/a-/ALV-UjWrlZTHcIco7gzDehXzqWVOjQa20mrzctJcAU1ttEvhRZ8aQlGo=s120-c-rp-mo-br100',
    'review' => '5-star Google review.',
  ],
];

$reviewSlides = array_chunk($googleReviews, 3);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($siteDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($siteKeywords, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="author" content="<?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="theme-color" content="#d71920">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="icon" type="image/png" href="<?php echo htmlspecialchars($logoImage, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:locale" content="en_MY">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($siteDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:site_name" content="<?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image:alt" content="A&T Media signage and signboard services">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($siteDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="preconnect" href="https://stackpath.bootstrapcdn.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script type="application/ld+json"><?php echo json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
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

      .navbar-brand span {
        font-size: 1.2rem;
        font-weight: 800;
        line-height: 1;
        color: var(--ink);
      }

      .navbar-brand .brand-accent {
        color: var(--brand-red);
      }

      .hero {
        position: relative;
        min-height: 620px;
        display: flex;

        .navbar-brand {
          gap: 10px;
        }

        .navbar-brand span {
          font-size: 1rem;
        }
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

      .reviews-band {
        background: linear-gradient(180deg, #ffffff 0%, #f8f9fb 100%);
      }

      .reviews-summary {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        margin-bottom: 28px;
      }

      .reviews-score {
        display: flex;
        align-items: center;
        gap: 18px;
      }

      .reviews-score-number {
        font-size: 3rem;
        font-weight: 900;
        line-height: 1;
        color: var(--ink);
      }

      .reviews-meta span {
        color: var(--muted);
      }

      .google-badge {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        border: 1px solid var(--line);
        border-radius: 999px;
        padding: 10px 16px;
        background: #ffffff;
        font-weight: 700;
        color: var(--graphite);
      }

      .google-badge img {
        width: 24px;
        height: 24px;
        object-fit: contain;
      }

      .review-stars {
        color: #f4b400;
        letter-spacing: 2px;
        font-size: 0.95rem;
      }

      .review-carousel {
        position: relative;
      }

      .review-slide {
        padding: 4px 44px;
      }

      .review-card {
        height: 100%;
        min-height: 160px;
        display: flex;
        flex-direction: column;
        border: 1px solid var(--line);
        border-radius: 12px;
        background: #ffffff;
        padding: 24px;
        box-shadow: 0 16px 36px rgba(17, 17, 17, 0.06);
      }

      .review-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        margin-bottom: 18px;
      }

      .review-author {
        display: flex;
        align-items: center;
        gap: 14px;
        min-width: 0;
      }

      .review-avatar {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
        background: var(--soft-grey);
      }

      .review-author strong,
      .review-author span {
        display: block;
      }

      .review-author strong {
        font-size: 1rem;
        color: var(--ink);
      }

      .review-author span {
        font-size: 0.9rem;
        color: var(--muted);
      }

      .review-google {
        width: 24px;
        height: 24px;
        object-fit: contain;
        flex-shrink: 0;
      }

      .review-copy {
        flex: 1 1 auto;
        color: var(--graphite);
        line-height: 1.7;
        margin-bottom: 0;
        overflow: hidden;
        word-break: break-word;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 6;
      }

      .review-control {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0;
        border-radius: 50%;
        border: 1px solid var(--line);
        background: #ffffff;
        color: var(--ink);
        opacity: 1;
      }

      .review-control.carousel-control-prev {
        left: 0;
      }

      .review-control.carousel-control-next {
        right: 0;
      }

      .review-control .carousel-control-prev-icon,
      .review-control .carousel-control-next-icon {
        width: 14px;
        height: 14px;
        filter: invert(1);
      }

      .review-indicators {
        position: static;
        margin: 24px 0 0;
      }

      .review-indicators li {
        flex: 0 0 10px;
        width: 10px;
        height: 10px;
        margin: 0 5px;
        padding: 0;
        border: 0;
        border-radius: 50%;
        background: #c4c7cf;
        opacity: 1;
      }

      .review-indicators .active {
        background: var(--brand-red);
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

      .contact-form-card {
        border: 1px solid rgba(255, 255, 255, 0.22);
        border-radius: 8px;
        padding: 30px;
        background: #ffffff;
        color: var(--ink);
        box-shadow: 0 18px 42px rgba(0, 0, 0, 0.24);
      }

      .contact-form-card h3 {
        font-size: 1.25rem;
        font-weight: 850;
        margin-bottom: 18px;
      }

      .contact-form-card label {
        color: var(--graphite);
        font-size: 0.9rem;
        font-weight: 800;
      }

      .contact-form-card .form-control {
        min-height: 48px;
        border-color: #d8dbe0;
        border-radius: 8px;
        color: var(--ink);
      }

      .contact-form-card textarea.form-control {
        min-height: 132px;
        resize: vertical;
      }

      .contact-form-card .form-control:focus {
        border-color: var(--brand-red);
        box-shadow: 0 0 0 0.2rem rgba(215, 25, 32, 0.16);
      }

      footer {
        background: #ffffff;
        border-top: 1px solid var(--line);
        color: var(--muted);
        padding: 24px 0;
      }

      .footer-brand {
        color: var(--ink);
        font-weight: 800;
        margin-bottom: 4px;
      }

      .footer-tagline {
        margin-bottom: 4px;
      }

      .footer-group,
      .footer-copyright {
        font-size: 0.92rem;
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

        .reviews-score-number {
          font-size: 2.4rem;
        }

        .review-slide {
          padding: 4px 0;
        }

        .review-card {
          min-height: 0;
        }

        .review-control {
          display: none;
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
        <a class="navbar-brand" href="index.php" aria-label="A&T Media Sdn. Bhd.">
          <img src="assets/ant-signage-logo.png" alt="A&T Media Sdn. Bhd. logo">
          <span>Signboard<span class="brand-accent">KL</span></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="navbar-nav ml-auto align-items-lg-center">
            <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
            <li class="nav-item"><a class="nav-link" href="#work">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#process">Process</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            <li class="nav-item ml-lg-3"><a class="btn btn-red px-4" href="contact.php"><i class="fas fa-phone-alt mr-2"></i>Get Quote</a></li>
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
            <a class="btn btn-red btn-lg px-4" href="contact.php"><i class="fas fa-paper-plane mr-2"></i>Request a Quote</a>
            <a class="btn btn-outline-light btn-lg px-4" href="products.php"><i class="fas fa-th-large mr-2"></i>View Products</a>
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

    <section id="reviews" class="reviews-band">
      <div class="container">
        <div class="row mb-4">
          <div class="col-lg-7">
            <div class="section-kicker">Google Reviews</div>
            <h2 class="section-title">Trusted by customers across Klang Valley, Selangor, and Seremban.</h2>
          </div>
          <div class="col-lg-5">
            <p class="section-copy">Recent customer feedback highlights the team\'s responsiveness, design support, workmanship, and finished signboard quality.</p>
          </div>
        </div>
        <div class="reviews-summary">
          <div class="reviews-score">
            <div class="reviews-score-number">5.0</div>
            <div class="reviews-meta">
              <span class="review-stars" aria-label="5 out of 5 stars">★★★★★</span>
            </div>
          </div>
          <div class="google-badge">
            <img src="https://cdn1.npcdn.net/img/1692259633google_logo.png" alt="Google logo">
            <span>Verified Google Reviews</span>
          </div>
        </div>
        <div id="googleReviewsCarousel" class="carousel slide review-carousel" data-ride="carousel" data-interval="7000">
          <ol class="carousel-indicators review-indicators">
            <?php foreach ($reviewSlides as $index => $_slide): ?>
              <li data-target="#googleReviewsCarousel" data-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>" aria-label="Show review set <?php echo $index + 1; ?>"></li>
            <?php endforeach; ?>
          </ol>
          <div class="carousel-inner">
            <?php foreach ($reviewSlides as $slideIndex => $slide): ?>
              <div class="carousel-item <?php echo $slideIndex === 0 ? 'active' : ''; ?>">
                <div class="review-slide">
                  <div class="row">
                    <?php foreach ($slide as $review): ?>
                      <div class="col-lg-4 col-md-6 mb-4 mb-lg-0 d-flex">
                        <article class="review-card w-100">
                          <div class="review-card-header">
                            <div class="review-author">
                              <img class="review-avatar" src="<?php echo htmlspecialchars($review['avatar'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($review['name'], ENT_QUOTES, 'UTF-8'); ?> avatar">
                              <div>
                                <strong><?php echo htmlspecialchars($review['name'], ENT_QUOTES, 'UTF-8'); ?></strong>
                                <span><?php echo htmlspecialchars($review['date'], ENT_QUOTES, 'UTF-8'); ?></span>
                                <span class="review-stars" aria-hidden="true">★★★★★</span>
                              </div>
                            </div>
                            <img class="review-google" src="https://cdn1.npcdn.net/img/1692259633google_logo.png" alt="Google logo">
                          </div>
                          <p class="review-copy"><?php echo htmlspecialchars($review['review'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </article>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <a class="carousel-control-prev review-control" href="#googleReviewsCarousel" role="button" data-slide="prev" aria-label="Previous reviews">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next review-control" href="#googleReviewsCarousel" role="button" data-slide="next" aria-label="Next reviews">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
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
        <div class="row align-items-start">
          <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="section-kicker">Get a quote</div>
            <h2 class="section-title mb-3">Contact us for signboard, signage, or printing support.</h2>
            <p class="section-copy">Send your project details, artwork, measurements, and location. A&T Media can help with recommendations, production, and installation planning.</p>
            <div class="contact-box mt-4">
              <p class="mb-3"><i class="fas fa-phone-alt mr-2 text-danger"></i><a href="tel:+60167013295">+60 16-701 3295</a></p>
              <p class="mb-3"><i class="fas fa-envelope mr-2 text-danger"></i><a href="mailto:antadv.rei@gmail.com">antadv.rei@gmail.com</a></p>
              <p class="mb-0"><i class="fas fa-map-marker-alt mr-2 text-danger"></i>16, Jalan Nilam 1/6, Taman Teknologi Tinggi Subang, 47500 Subang Jaya, Selangor, Malaysia.</p>
            </div>
          </div>
          <div class="col-lg-7">
            <form class="contact-form-card" action="mailto:antadv.rei@gmail.com" method="post" enctype="text/plain">
              <h3>Tell us about your project</h3>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="contactName">Name</label>
                  <input id="contactName" class="form-control" type="text" name="Name" autocomplete="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="contactPhone">Phone</label>
                  <input id="contactPhone" class="form-control" type="tel" name="Phone" autocomplete="tel" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="contactEmail">Email</label>
                  <input id="contactEmail" class="form-control" type="email" name="Email" autocomplete="email">
                </div>
                <div class="form-group col-md-6">
                  <label for="contactService">Service</label>
                  <select id="contactService" class="form-control" name="Service">
                    <option value="Signboard">Signboard</option>
                    <option value="Signage">Signage</option>
                    <option value="Printing">Printing</option>
                    <option value="Fabric Lightbox">Fabric Lightbox</option>
                    <option value="3D Lettering">3D Lettering</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="contactLocation">Project location</label>
                <input id="contactLocation" class="form-control" type="text" name="Project Location" placeholder="Kuala Lumpur, Klang Valley, Selangor, Seremban">
              </div>
              <div class="form-group">
                <label for="contactMessage">Project details</label>
                <textarea id="contactMessage" class="form-control" name="Project Details" placeholder="Share size, quantity, timeline, artwork status, installation needs, or reference ideas." required></textarea>
              </div>
              <button class="btn btn-red btn-lg btn-block" type="submit"><i class="fas fa-paper-plane mr-2"></i>Send Enquiry</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <div class="footer-brand">A&amp;T Media Sdn. Bhd.</div>
        <div class="footer-tagline">Trusted Signboard Supplier in Kuala Lumpur Since 2022</div>
        <div class="footer-group">Part of ANT Group</div>
        <div class="footer-copyright mt-3">Copyright &copy; 2026 A&amp;T Media Sdn. Bhd. 202501057902 (1659308-W) All rights reserved.</div>
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
