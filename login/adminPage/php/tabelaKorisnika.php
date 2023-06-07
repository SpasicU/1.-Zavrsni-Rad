<section>
<!-- Page Content  -->
<form method="post">
    <div id="content" align="center" class="p-4 p-md-3 pt-5" style="overflow: hidden; min-height: 0vh;"> 
      <!-- <p style="font-size: 16px;" class="panel-body">U tabeli su ispisane zakazane dekoracije koje možete pregledati. Da bi izbrisali dekoraciju koja je vec završena unesite datum dekoracije u polje i pritisnite dugme izbriši.</p>
          <br><br> -->
          <div class="row" style="justify-content: center; text-align: center;">

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
          $upit = "SELECT * FROM korisnik where privilegija='33' ";
// izvrsi upit
          $rezultat = $mysqli->query($upit);
          if ($rezultat) {
//da li je bilo sta vraceno?
              if ($rezultat->num_rows > 0) {
// da stampaj jednu po jednu u obliku tabele
                echo "<div class=\"card shadow mb-4\">";
                echo "<div class=\"card-header py-3\">";
                echo "<h3 class=\"m-0 font-weight-bold text-primary\">Korisnici</h3>";
                echo "</div>";
                echo "<div class=\"card-body\">";
                echo "<br>";
                echo "<div class=\"card-header\">";
                echo "<h6 class=\"m-0 font-weight-bold text-secondary\">Tabela</h6>";
                echo "</div>";
                echo "<div class=\"table-responsive\">
                <table class=\"table table-bordered\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\">
                ";
                echo "<thead><tr><th>ID korisnika</th><th>Ime</th><th>Email</th></thead>";
                while($red = $rezultat->fetch_array()) {
                  echo "<tbody>";
                  echo "<tr>";
                  echo "<td>".$red[0]."</td>";
                  echo "<td>".$red[1]."</td>";
                  echo "<td>".$red[2]."</td>";
                  echo "</tr>";
                  echo "</tbody>";
              }
              echo "</table>";
          }
          else {
// ne stampaj statusnu poruku
            echo "Nijedan red nije vracen!";
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

<div>
    <br>
    <input type="text" name="idKor" placeholder="Upišite ovde ID" style="margin-bottom: 10px;">
    <button type="submit" name="brisi" class="btn btn-danger btn-icon-split">
      <span class="icon text-white-50">
        <i class="fas fa-trash"></i>
    </span>
    <span class="text">Izbriši</span>
    </button>
</div>
</form>

<?php 

$mysqli = new mysqli("localhost","root","","bazadekoracija");

if ($mysqli->error) 
{
    die("Greska! " . $mysqli->error);
}


if (isset($_POST['brisi'])) 
{
   $upitbrisi = "DELETE from korisnik where idKorisnika = '". $_POST['idKor']."'";
   $rezb=$mysqli->query($upitbrisi);
   if (!$rezb) 
   {
     print("Ne mozemo izvrsiti brisanje. Probajte ponovo!");
     die($mysqli->error);
 }

 print("Obrisano redova: \n" . $mysqli->affected_rows);

 
 if ($mysqli->affected_rows!=0) 
 {
   echo "<meta http-equiv='refresh' content='0;url=php/uspehPoruka.php'>";
  exit;
}
$mysqli -> close();
}

?>

</section>