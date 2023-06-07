 <section id="poruci" class="book-a-table">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Zakaži dekoraciju</h2>
      <p>Zakaži <span>Tvoju Dekoraciju</span> Kod Nas</p>
    </div>

    <div class="row g-0">

      <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/pozadinazakazi.jpg);" data-aos="zoom-out" data-aos-delay="200"></div>

      <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
        <form method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
          <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
              <?php if(empty($_SESSION['user'])){  ?>
                <input type="text" name="imePrezime" class="form-control" id="name" placeholder="Vaše Ime" 
                value="">
              <?php }else{  ?>
                 <input type="text" name="imePrezime" class="form-control" id="name" placeholder="Vaše Ime" 
                value="<?php echo $_SESSION['user']; ?>">
              <?php  }?>
            </div>
            <div class="col-lg-4 col-md-6">
              <?php  if(empty($_SESSION['user'])){    ?>
                <input type="email" class="form-control" name="email" id="email" placeholder="Vaš Email" value="">
              <?php  }else{  ?>
                 <input type="email" class="form-control" name="email" id="email" placeholder="Vaš Email" value="<?php echo $_SESSION['email']; ?>">
              <?php  } ?>
            </div>
            <div class="col-lg-4 col-md-6">
              <input type="text" class="form-control" name="broj" id="phone" placeholder="Broj Telefona"required>

            </div>
            <div class="col-lg-4 col-md-6">
              <input type="date" name="datum" class="form-control" id="date" min="<?php echo date('Y-m-d');?>" >
            </div>
            <div class="col-lg-4 col-md-6">
              <select name="tip" class="form-control" style="padding: 12px 15px; font-size: 14px; border-radius: 0px;">
                <option value="" selected="selected" class="form-control">Izaberite jedno &#8630</option>
                <option value="svadba" class="form-control">Svadba</option>
                <option value="rodjendan" class="form-control">Rođendan</option>
                <option value="ostalo" class="form-control">Ostalo</option>
              </select>
            </div>
            <div class="col-lg-4 col-md-6">
              <select name="paket" class="form-control" style="padding: 12px 15px; font-size: 14px; border-radius: 0px;">
                <option value="" selected="selected" class="form-control">Izaberite paket &#8630</option>
                <option value="standard" class="form-control">Standard</option>
                <option value="premium" class="form-control">Premium</option>
                <option value="exclusive" class="form-control">Exclusive</option>
              </select>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="zahtevi" rows="5" placeholder="Poruka, opišite dekoraciju!" required></textarea>
            
          </div>
          <button type="submit" name="zakazi" style="margin-top: 15px;">Zakaži</button>
        </form>
      </div><!-- End Reservation Form -->

    </div>

  </div>
</section>



<?php 


$mysqli = new mysqli("localhost","root","","bazadekoracija");

if ($mysqli->error) 
{
  die("Greska! " . $mysqli->error);
}

$imePrezime = "";
$broj = "";
$email = "";
$tip = "";
$paket = "";
$datum = "";
$zahtevi = "";


if(isset($_POST['zakazi'])) 
{

  if(empty($_SESSION['user'])){
    echo "<meta http-equiv='refresh' content='0;url=login/login.html'>";
    exit;
    die();
  }

  if (!($_POST["imePrezime"]) || !($_POST["broj"]) || !($_POST["email"]) || !($_POST["tip"]) || !($_POST["paket"]) || !($_POST["datum"]) || !($_POST["zahtevi"]) )
  {
    ?>
    <br>
    <div>
      <div class="alert alert-danger" role="alert" style="text-align: -webkit-center;">
        <strong>Greška!</strong> Niste uneli sve podatke!!
      </div>
    </div>
    <br><br><br><br>
    <?php 

  }
  else
  {
    $upit = "INSERT INTO dekoracija (imePrezime, broj, email, tip, paket, datum, zahtevi)
    VALUES ('" 
     . $_POST["imePrezime"] . "','" 
     . $_POST["broj"] . "','" 
     . $_POST["email"] . "','" 
     . $_POST["tip"] . "','"
     . $_POST["paket"] . "','"
     . $_POST["datum"] . "','"
     . $_POST["zahtevi"] . "')";

     $rez=$mysqli->query($upit);

     if (!$rez) 
     {
      die("GRESKA!! " . $mysqli->error);
    }
    else
    {
      echo "<meta http-equiv='refresh' content='0;url=php/uspehPorukaStranica.php'>";
      exit;

    }

  }
}



?>