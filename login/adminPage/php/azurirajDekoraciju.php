<section>


<?php 


$mysqli = new mysqli("localhost","root","","bazadekoracija");

if ($mysqli->error) 
{
  die("Greska! " . $mysqli->error);
}

$ID_Dek = "";
$datum = "";
$tip = "";
$paket = "";
$zahtevi = "";

// $imePrezime = "";
// $broj = "";
// $email = "";
// $tip = "";
// $paket = "";
// $datum = "";
// $zahtevi = "";

if (isset($_POST['azuriraj'])) 
{
  if (!($_POST["ID_Dek"]) || !($_POST["tip"]) || !($_POST["paket"]) || !($_POST["datum"]) || !($_POST["zahtevi"]) )
  {
    echo "GRESKA!! Niste uneli sve podatke!!!";
  }
  else
  {
    $upit = "UPDATE dekoracija SET
    tip = '".$_POST['tip']."',
    paket = '".$_POST['paket']."',
    datum = '".$_POST['datum']."',
    zahtevi = '".$_POST['zahtevi']."'
    WHERE ID_dek = '".$_POST['ID_Dek']."'";


    if(!($rez=$mysqli->query($upit))) 
    {
      print("Ne moze se izvrsiti azuriranje tabele");
      die($mysqli->error);
    }
    else
    {
      echo "<meta http-equiv='refresh' content='0;url=php/uspehPoruka.php'>";
      exit;
  }


}

}
else if (isset($_POST['trazi']))
{

        $upit2 = " SELECT * FROM dekoracija WHERE ID_dek LIKE '" . $_POST['ID_Dek'] . "'"; 
        $rez = $mysqli->query($upit2);

        if (!$rez) 
        {
          print("Ne moze se izvrsiti upit.<br>");
          die($mysqli->error);
        }

        if (!($red = $rez->fetch_assoc())) // stavili smo u red sve fetchovano iz upita 
        {
          print("<p><b>Nema trazene dekoracije sa datim ID Brojem!</b></p>");
        }
        else
        {
          // pronalazimo podatke po kljucu
          // key / value pair
          $ID_Dek = $red['ID_dek'];
          $datum = $red['datum'];
          $tip = $red['tip'];
          $paket = $red['paket'];
          $zahtevi = $red['zahtevi'];

        } 
}


?>

  <div align="center" class="p-4 p-md-5 pt-5" style="overflow: hidden; margin-top: 15px;">

    <div>
      <div class="card shadow mb-4">  
        <div class="card-header py-3">
          <h4 class="m-0 font-weight-bold text-primary">Ažuriraj Dekoraciju</h4>
        </div>


        <div class="card-body">
          <form method="post">
            <div>
              <div class="form-outline mb-3">
                <input type="text" name="ID_Dek" value="<?php echo $ID_Dek ?>"  class="form-control" id="date" placeholder="ID dekoracije za pretragu" >
              </div>
              <div class="form-outline mb-3">
                <input type="text" name="datum" value="<?php echo $datum ?>" class="form-control" id="date" placeholder="Datum - DD.MM.GGGG" >
              </div>
              <div class="form-outline mb-3">
                <input type="text" name="tip" value="<?php echo $tip ?>" class="form-control" id="date" placeholder="Tip dekoracije" >               
              </div>
              <div class="form-outline mb-3">
                <input type="text" name="paket" value="<?php echo $paket ?>" class="form-control" id="date" placeholder="Paket" >       
              </div>

          </div>
          <div class="form-group">
            <input class="form-control" name="zahtevi" value="<?php echo $zahtevi ?>" id="date" placeholder="Poruka, opišite dekoraciju!" ></input>
          </div>
          <button class="btn btn-info btn-icon-split" type="submit" name="azuriraj" style="margin-top: 15px;">
            <span class="icon text-white-50">
              <i class="fas fa-gear"></i>
            </span>
            <span class="text">Ažuriraj</span>
          </button>
          <button class="btn btn-info btn-icon-split" type="submit" name="trazi" style="margin-top: 15px;">
                  <span class="text">Trazi po indeksu</span>
          </button>
        </form>
      </div>

    </div>

  </div>
</section>



