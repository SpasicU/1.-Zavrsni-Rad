<?php

//sesija
session_start();


$user = $_POST['nIme']??"";
$user = filter_var($user,FILTER_SANITIZE_STRING);

$pass = $_POST['nPass']??"";
$pass = filter_var($pass,FILTER_SANITIZE_STRING);

if(strlen($user)<=2 || strlen($pass)<=2){
  die("Korisnicko i sifra moraju imati bar 3 karaktera");
}

// konekcija sa bazom ucitavanjem fajla konekcija.php 
require_once('konekcija.php');

// sql za citanje podataka iz baze
$sql = "SELECT * FROM `korisnik` 
WHERE `ime`='$user' and `sifra`=sha1('$pass')";

$result = $conn->query($sql);

//var_dump($result);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $_SESSION['email'] = $row['email'];
    $_SESSION['user'] = $row['ime'];
    $_SESSION['privilegija'] = $row['privilegija'];
    if($row['privilegija'] == '11'){
      header('Location:adminPage/admin.php');
    }
    else if($row['privilegija'] == '22'){
      header('Location:menadzerPage/menadzer.php');
    }
    else if($row['privilegija'] == '33'){
      header('Location:../index.php');
    }
  }
} else {
  echo "Greska";
  // echo "<meta http-equiv='refresh' content='0;url=php/neuspeh.php'>";
  exit;
}
$conn->close();