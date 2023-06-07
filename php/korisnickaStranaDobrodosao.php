    <section>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-9 border-right" id="id"> 
                    <div class="p-3 py-5">
                        <span class="font-weight-bold" style="font-size: 18px;"><?php echo $_SESSION['user']; ?> - </span>
                        <span class="text-black-50"><i><?php echo $_SESSION['email']; ?></i></span>
                        <span></span>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Vaše poručene dekoracije:</h4>
                        </div>
                        <?php

                        $host = "localhost";
                        $user = "root";
                        $pass = "";
                        $baza = "bazadekoracija";

                        $mysqli = new mysqli($host, $user, $pass, $baza);

                        if (mysqli_connect_errno()) 
                        {
                          die("Nije moguca konekcija!");
                      } 
                        // napravi upit

                      $email = $_SESSION['email'];
                      $upit = "SELECT * FROM dekoracija where email='$email'";                      ;

                        // izvrsi upit
                      $rezultat = $mysqli->query($upit);
                      if ($rezultat) 
                      {
                            //da li je bilo sta vraceno?
                          if ($rezultat->num_rows > 0) 
                          {
                            // da stampaj jednu po jednu u obliku tabele
                            echo "<div class=\"card-body\">";
                            echo "<div class=\"table-responsive\">
                            <table class=\"table table-bordered\" id=\"dataTable\" width=\"100%\" cellspacing=\"0\" style=\"font-size:14px;\">
                            ";
                            echo "<thead style=\"background-color: #682773; color: #ffffff;\"><tr><th>*ID dekoracije</th><th>Ime</th><th>Broj</th><th>Email</th><th>Tip</th><th>Paket</th><th>Datum</th><th>Zahtevi</th></tr></thead>";
                            while($red = $rezultat->fetch_array()) 
                            {
                              $tip = "SELECT * FROM tip where tipID='$red[3]'";
                              $tip = $mysqli->query($tip);
                              $tip = $tip->fetch_array();
                              $paket = "SELECT * FROM paket where paketID='$red[4]'";
                              $paket = $mysqli->query($paket);
                              $paket = $paket->fetch_array();
                              echo "<tbody>";
                              echo "<tr>";
                              echo "<td>".$red[7]."</td>";
                              echo "<td>".$red[0]."</td>";
                              echo "<td>".$red[1]."</td>";
                              echo "<td>".$red[2]."</td>";
                              echo "<td>".$red[3]."</td>";
                              echo "<td>".$red[4]."</td>";
                              echo "<td>".$red[5]."</td>";
                              echo "<td>".$red[6]."</td>";
                              echo "</tr>";
                              echo "</tbody>";
                          }
                          echo "</table>";
                          echo "<div style=\"font-size:12px;\"><p><i>*Ukoliko želite da obrišete dekoraciju upišite ID dekoracije u polje na desnoj strani i pritisnite dugme OTKAŽI.</i><p></div>";
                          echo "</div>";
                          echo "</div>";
                      }else {
                        echo "Još uvek niste poručili dekoraciju!!";
                        echo "<br>";
                        echo "<a href=\"ponuda.php#poruci\">Klik ovde da zakažete.</a>";
                    }
                            // oslobodi memoriju
                    $rezultat->close();
                } else {
                           // stampaj poruku o gresci
                    echo "Greska u upitu: $upit. ".$mysqli->error;
                }
                    $mysqli->close();
                            // zatvori konekciuju
                ?>

</div>
</div>


            
        