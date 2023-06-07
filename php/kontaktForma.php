<section id="contact" class="contact" >
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Kontakt</h2>
      <p>Imate pitanje? <span>Kontaktirajte Nas</span></p>
    </div>

    <div class="mb-3">
      <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22647.708212937603!2d20.395489856433993!3d44.80193194935302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a6f92c98286a7%3A0xf18d5fb68a050a3d!2z0KHQsNCy0YHQutC4INCd0LDRgdC40L8sIEJlbGdyYWRl!5e0!3m2!1sen!2srs!4v1668440203741!5m2!1sen!2srs" frameborder="0" allowfullscreen></iframe>
    </div><!-- End Google Maps -->

    <div class="row gy-4">

      <div class="col-md-6">
        <div class="info-item  d-flex align-items-center">
          <i class="icon bi bi-map flex-shrink-0"></i>
          <div>
            <h3>Naša adresa</h3>
            <p>Savski Nasip 7, Beograd, 18000</p>
          </div>
        </div>
      </div><!-- End Info Item -->

      <div class="col-md-6">
        <div class="info-item d-flex align-items-center">
          <i class="icon bi bi-envelope flex-shrink-0"></i>
          <div>
            <h3>Pošalji nam mejl</h3>
            <p>bellissimo@gmail.com</p>
          </div>
        </div>
      </div><!-- End Info Item -->

      <div class="col-md-6">
        <div class="info-item  d-flex align-items-center">
          <i class="icon bi bi-telephone flex-shrink-0"></i>
          <div>
            <h3>Nazovi nas</h3>
            <p>+381 65 6389 266</p>
          </div>
        </div>
      </div><!-- End Info Item -->

      <div class="col-md-6">
        <div class="info-item  d-flex align-items-center">
          <i class="icon bi bi-share flex-shrink-0"></i>
          <div>
            <h3>Radno vreme</h3>
            <div><strong>Pon-Pet:</strong> 10:00 - 22:00;
              <strong>Vikend:</strong> Ne radimo
            </div>
          </div>
        </div>
      </div><!-- End Info Item -->

    </div>

    <br><br>
    <form method="post" class="php-email-form p-3 p-md-4">
      <div class="row">
        <div class="col-xl-6 form-group">
          <input type="text" name="ime" class="form-control" placeholder="Vaše ime" required>
        </div>
        <div class="col-xl-6 form-group">
          <input type="email" class="form-control" name="email" placeholder="Vaš Email" required>
        </div>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="tel" placeholder="Broj telefona" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="naslov" placeholder="Naslov" required>
      </div>
      <div class="form-group">
        <textarea class="form-control" name="poruka" rows="5" placeholder="Poruka..." required></textarea>
      </div>
      <button type="submit" name="posalji" style="margin-top: 15px;">Pošalji</button>
<!--         Pošalji
      </button> -->
    </form>
    <!--End Contact Form -->

  </div>
</section><!-- End Contact Section -->


<?php 


$mysqli = new mysqli("localhost","root","","bazadekoracija");

if ($mysqli->error) 
{
  die("Greska! " . $mysqli->error);
}

$ime = "";
$email = "";
$tel = "";
$naslov = "";
$poruka = "";


if(isset($_POST['posalji'])) 
{
  if (!($_POST["ime"]) ||  !($_POST["email"]) || !($_POST["tel"]) || !($_POST["naslov"]) || !($_POST["poruka"])) 
  {
    ?>
    <div class="col-md-6">
      <div class="alert alert-warning" role="alert">
        <strong>Greška!</strong>, niste uneli sve podatke!!
      </div>
    </div>
    <?php 

  }
  else
  {
    $upit2 = "INSERT INTO poruke (ime,email,tel,naslov,poruka)
    VALUES ('" 
     . $_POST["ime"] . "','" 
     . $_POST["email"] . "','"
     . $_POST["tel"] . "','"
     . $_POST["naslov"] . "','"
     . $_POST["poruka"] .  "')";

     $rez=$mysqli->query($upit2);

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