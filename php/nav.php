<!-- ======= Header ======= -->
<header id="header" class="header relative-top d-flex align-items-center">
  <div class="container d-flex align-items-center justify-content-between">

    <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1>Bellissimo<span>.</span></h1>
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="index.php">Početna</a></li>
        <li><a href="index.php#about">O nama</a></li>
        <li><a href="ponuda.php">Ponuda</a></li>
        <li><a href="galerija.php">Galerija</a></li>
        <li><a href="kontakt.php">Kontakt</a></li>
      </ul>
    </nav><!-- .navbar -->
    <?php

    session_start();

    if(empty($_SESSION['user'])){
      ?>
      <a class="btn-book-a-table" href="login/login.html">Uloguj se</a>
      <?php  
    }else{
      ?>

      <div class="btn-group">
        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          Dobrodošao <?php echo $_SESSION['user']; ?>!
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="mojprofil.php">Moj profil</a></li>
          <li><a class="dropdown-item" href="login/logout.php">Odjavi se</a></li>
        </ul>
      </div>

    <?php } ?>
    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

  </div>
</header><!-- End Header -->