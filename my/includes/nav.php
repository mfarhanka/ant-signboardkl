<?php
$activePage = $activePage ?? '';
$quoteUrl = $navQuoteUrl ?? 'contact.php';
$quoteTarget = !empty($navQuoteExternal) ? ' target="_blank" rel="noopener"' : '';
$assetPrefix = $assetPrefix ?? '../';
$isHome = $activePage === 'home';
$isProducts = $activePage === 'products';
$isContact = $activePage === 'contact';
?>
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
  <div class="container">
    <a class="navbar-brand" href="index.php" aria-label="A&T Media Sdn. Bhd.">
      <img src="<?php echo htmlspecialchars($assetPrefix, ENT_QUOTES, 'UTF-8'); ?>assets/ant-signage-logo.png" alt="Logo A&T Media Sdn. Bhd.">
      <span>Signboard<span class="brand-accent">KL</span></span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ml-auto align-items-lg-center">
        <?php if (!$isHome): ?><li class="nav-item"><a class="nav-link" href="index.php">Laman Utama</a></li><?php endif; ?>
        <li class="nav-item"><a class="nav-link<?php echo $isProducts ? ' active' : ''; ?>" href="products.php">Produk</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $isHome ? '#projects' : 'index.php#projects'; ?>">Projek</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $isHome ? '#work' : 'index.php#work'; ?>">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $isHome ? '#process' : 'index.php#process'; ?>">Proses</a></li>
        <li class="nav-item"><a class="nav-link<?php echo $isContact ? ' active' : ''; ?>" href="contact.php">Hubungi</a></li>
        <li class="nav-item ml-lg-3"><a class="btn btn-red px-4" href="<?php echo htmlspecialchars($quoteUrl, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $quoteTarget; ?>><i class="fas fa-phone-alt mr-2"></i>Dapatkan Sebut Harga</a></li>
      </ul>
    </div>
  </div>
</nav>
