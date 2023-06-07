<!-- Page Content  -->
<div class="header" style="width: 100%; text-align:center; justify-content: center;">
    <h3 class="m-0 font-weight-bold text-primary">Dobrodošao!</h3>
</div>

<div id="content" align="center" class="p-4 p-md-5 pt-5" style="margin-top: 0px; padding-top: 0px;">

  <div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

      <div class="col-xl-8 col-lg-7">

        <!-- Area Chart -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Poruke</h5>
          </div>
          <div class="card-body" style="text-align: left;">
            <?php

            $host = "localhost";
            $user = "root";
            $pass = "";
            $baza = "bazadekoracija";

              // napravi mysqli objekat i otvori konekciju prema bazi
            $mysqli = new mysqli($host, $user, $pass, $baza);
              // da li je bilo gresaka?
            if (mysqli_connect_errno()) {
              die("Nije moguca konekcija!");
            }
              // napravi upit
            $upit = "SELECT * FROM poruke";
                // izvrsi upit
            $rezultat = $mysqli->query($upit);
            if ($rezultat) {
                //da li je bilo sta vraceno?
              if ($rezultat->num_rows > 0) {
                  // da stampaj jednu po jednu u obliku tabele
                while($red = $rezultat->fetch_array()) {
                  echo "<li>".$red[1]." - ". $red[3]."</li>";      
                }

              }
              else {
                  // ne stampaj statusnu poruku
                echo "Nijedna dekoracija nije vracena!";
              }
                  // oslobodi memoriju
              $rezultat->close();
            } else {
                  // stampaj poruku o gresci
              echo "Greska u upitu: $upit. ".$mysqli->error;
            }
                  // zatvori konekciuju
            $mysqli->close();

            ?>
          </div> 
          <hr>
          <a href="pitanja.php">Klikni za još detalja</a><br>
        </div>

      </div>

   
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Dekoracije</h5>
          </div>
          <!-- Card Body -->
          <div class="card-body" style="text-align: left;">
            <p>Aktuelne dekoracije koje trebaju biti odrađene:</p>
            <?php

            $host = "localhost";
            $user = "root";
            $pass = "";
            $baza = "bazadekoracija";

              // napravi mysqli objekat i otvori konekciju prema bazi
            $mysqli = new mysqli($host, $user, $pass, $baza);
              // da li je bilo gresaka?
            if (mysqli_connect_errno()) {
              die("Nije moguca konekcija!");
            }
              // napravi upit
            $upit = "SELECT * FROM dekoracija";
                // izvrsi upit
            $rezultat = $mysqli->query($upit);
            if ($rezultat) {
                //da li je bilo sta vraceno?
              if ($rezultat->num_rows > 0) {
                  // da stampaj jednu po jednu u obliku tabele
                while($red = $rezultat->fetch_array()) {
                  echo "<li>".$red[0]." - ". $red[5]."</li>";      
                }

              }
              else {
                  // ne stampaj statusnu poruku
                echo "Nijedna dekoracija nije vracena!";
              }
                  // oslobodi memoriju
              $rezultat->close();
            } else {
                  // stampaj poruku o gresci
              echo "Greska u upitu: $upit. ".$mysqli->error;
            }
                  // zatvori konekciuju
            $mysqli->close();

            ?>


          </div> 

          <hr>
          <a href="zakazane.php">Klikni za još detalja</a><br>
          
        </div>
      </div>
    </div>
    
  </div>


</div>




