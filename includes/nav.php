<?php
$activePage = $activePage ?? '';
$quoteUrl = $navQuoteUrl ?? 'contact.php';
$quoteTarget = !empty($navQuoteExternal) ? ' target="_blank" rel="noopener"' : '';
$isHome = $activePage === 'home';
$isProducts = $activePage === 'products';
$isContact = $activePage === 'contact';
?>
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
        <?php if (!$isHome): ?><li class="nav-item"><a class="nav-link" href="index.php">Home</a></li><?php endif; ?>
        <li class="nav-item"><a class="nav-link<?php echo $isProducts ? ' active' : ''; ?>" href="products.php">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $isHome ? '#projects' : 'index.php#projects'; ?>">Projects</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $isHome ? '#work' : 'index.php#work'; ?>">About</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $isHome ? '#process' : 'index.php#process'; ?>">Process</a></li>
        <li class="nav-item"><a class="nav-link<?php echo $isContact ? ' active' : ''; ?>" href="contact.php">Contact</a></li>
        <li class="nav-item ml-lg-3"><a class="btn btn-red px-4" href="<?php echo htmlspecialchars($quoteUrl, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $quoteTarget; ?>><i class="fas fa-phone-alt mr-2"></i>Get Quote</a></li>
      </ul>
    </div>
  </div>
</nav>
