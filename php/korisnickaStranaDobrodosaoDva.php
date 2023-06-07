<div class="col-md-3 border-right" style="border-left: outset;">
    <div class="p-3 py-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">Promeni šifru</h4>
        </div>
        <form method="post">
            <div class="row mt-3">
                <div class="col-md-12">
                    <label class="labels">Nova šifra</label><input type="text" name="sif1" class="form-control" placeholder="Upišite novu šifru" value="">
                </div>
                <div class="col-md-12">
                    <label class="labels">Ponovite šifru</label><input type="text" name="sif2" class="form-control" placeholder="Ponovite šifru" value="">
                </div>
                <div class="mt-3 text-center">
                    <button class="btn btn-primary profile-button" type="submit" name="sacuvaj">Sačuvaj</button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
                    <h4 class="text-right">Otkaži dekoraciju</h4>
                </div>
                <div class="col-md-12">
                    <label class="labels">Upišite ID dekoracije</label>
                    <input type="text" name="unosBrisanje" placeholder="ID dekoracije" style="width:220px;">
                </div>
                <div class="mt-3 text-center">
                    <button class="btn btn-primary profile-button" type="submit" name="otkazi">Otkaži</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
<?php 

$mysqli = new mysqli("localhost","root","","bazadekoracija");

if ($mysqli->error) 
{
  die("Greska! " . $mysqli->error);
}


if(isset($_POST['sacuvaj'])) 
{
    $sifra = $_POST['sif1']??"";

    if( $_POST["sif1"] != $_POST["sif2"] ){
        ?>
        <div class="alert alert-warning" style="text-align: center;" >
            <strong>Greška! Šifre se ne podudaraju! </strong> 
        </div>
        <?php  
    }
    else if(!($_POST["sif1"]) || !($_POST["sif2"])){
        ?>
        <div class="alert alert-warning" style="text-align: center;" >
            <strong>Greška! Niste uneli sve podatke!! </strong> 
        </div>
        <?php  
    }
    else if(strlen($sifra)<=2){
      ?>
      <div class="alert alert-warning" style="text-align: center;" >
        <strong>Šifra mora imati barem 3 karaktera, pokušajte ponovo!</strong> 
    </div>
    <?php  
}
else{

    $upit = "UPDATE korisnik SET
    sifra = sha1('$sifra')";

    $rez=$mysqli->query($upit);

    if (!$rez) {
      die("GRESKA!! " . $mysqli->error);
  }
  else{
      echo "<meta http-equiv='refresh' content='0;url=php/uspehPorukaStranica.php'>";
      exit;
  }
}
}
else if (isset($_POST['otkazi'])) {

    $upitbrisi = "DELETE from dekoracija where ID_Dek = '".$_POST['unosBrisanje']."'";
    $rezb=$mysqli->query($upitbrisi);
    if (!$rezb) 
    {
     print("Ne mozemo izvrsiti brisanje. Probajte ponovo!");
     die($mysqli->error);
 }

 if ($mysqli->affected_rows!=0) 
 {
   echo "<meta http-equiv='refresh' content='0;url=php/uspehPorukaStranica.php'>";
   exit;
}
}
$mysqli->close();
?>

</div>
</div>
</div>
</section>

