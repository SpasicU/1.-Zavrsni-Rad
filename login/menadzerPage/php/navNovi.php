<?php 
session_start();

if(empty($_SESSION['user'])){
    echo "<a href='../login.html'>Niste ulogovani!! Kliknite za logovanje.</a><br>";
    die();
    
}
 ?>
 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost/1.%20Zavrsni%20Rad/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Bellissimo Dekoracije</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="menadzer.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Glavna</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

           <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="pitanja.php">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Poruke</span></a>
            </li>

             <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="zakazane.php">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Zakazane</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="korisnici.php">
                    <i class="fas fa-users"></i>
                    <span>Registrovani korisnici</span></a>
            </li>
           

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="../logout.php">
                    <i class="fas fa-power-off"></i>
                    <span>Odjava</span></a>
            </li>


        </ul>
        <!-- End of Sidebar -->