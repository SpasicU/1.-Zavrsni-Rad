
<?php 


$mysqli = new mysqli("localhost","root","","bazadekoracija");


if ($mysqli->error) 
{
	die("Greska! " . $mysqli->error);
}

$ime = $_POST['ime'] ?? "";
$ime = filter_var($ime,FILTER_SANITIZE_STRING);

$email = $_POST['email'] ?? "";
$email = filter_var($email,FILTER_SANITIZE_STRING);

$pass = $_POST['nPass'] ?? "";
$pass = filter_var($pass,FILTER_SANITIZE_STRING);

if(isset($_POST['posalji'])) 
{
	if ( $_POST["nPass"] != $_POST["nPass1"]) 
	{
		?>
		<div class="alert alert-warning" style="text-align: center;" >
			<strong>Greška! Šifre se ne podudaraju! </strong> 
		</div>
		<?php  
	}
	else
	{
		$pass = $_POST['nPass'] ?? "";
		$pass = filter_var($pass,FILTER_SANITIZE_STRING);
		//$pass = sha1($pass);
		$upit2 = "INSERT INTO korisnik (ime,email,sifra)
		VALUES ('$ime', '$email', SHA1('$pass'));";

			$rez=$mysqli->query($upit2);

			if (!$rez) 
			{
				die("Korisnik već postoji!");
			}
			else
			{
				echo "<meta http-equiv='refresh' content='0;url=uspeh.php'>";
				exit;
			}

		}

	} 

?> 


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registracija</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-26">
						Registruj se
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="ime">
						<span class="focus-input100" data-placeholder="Unesite korisničko ime"></span>
					</div>


					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Unesite email"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="nPass">
						<span class="focus-input100" data-placeholder="Kreirajte šifru"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="nPass1">
						<span class="focus-input100" data-placeholder="Ponovite šifru"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button name="posalji" class="login100-form-btn" type="submit">
								Kreiraj profil
							</button>
						</div>
					</div>

				</form>
				<div style="text-align: center; margin-top: 10px;">
					<a href="../../index.php"> <-- Nazad na web stranicu</a>
					</div>

				</div>

			</div>
		</div>
	</div>

	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../vendor/animsition/js/animsition.min.js"></script>
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../vendor/select2/select2.min.js"></script>
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
	<script src="../vendor/countdowntime/countdowntime.js"></script>
	<script src="../js/main.js"></script> 

</body>
</html>

