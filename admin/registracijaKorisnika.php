<?php
require('../connectDB.php');   


if(isset($_POST['ime_i_prezime'])) $ime_i_prezime=$_POST['ime_i_prezime'];
else $error=TRUE;
if(isset($_POST['adresa'])) $adresa=$_POST['adresa'];
else $error=TRUE;
if(isset($_POST['broj_telefona'])) $broj_telefona=$_POST['broj_telefona'];
else $error=TRUE;
if(isset($_POST['email'])) $email=$_POST['email'];
else $error=TRUE;
if(isset($_POST['sifra'])) $password=$_POST['sifra'];
else $error=TRUE;
$password = password_hash($password, PASSWORD_DEFAULT);


$SQLsnimiKorisnikaUbazu="INSERT INTO user (ime_i_prezime, adresa, broj_telefona, email, sifra) VALUES ('$ime_i_prezime', '$adresa', '$broj_telefona', '$email', '$password')";

    if($db->query($SQLsnimiKorisnikaUbazu) === TRUE){
        
    header("location: korisnici.php");
    }else {
        echo"Error: " . $SQLsnimiKorisnikaUbazu . "<br>" . $db->error;
    }
    
    
   
    $db->error;
    
?>