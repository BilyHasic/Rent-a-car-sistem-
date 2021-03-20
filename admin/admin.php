<?php

if (!session_id()) @session_start();
require('../connectDB.php');
require ('../FlashMessages.php');
$msg = new \Plasticbrain\FlashMessages\FlashMessages();


if($_SESSION["isAdmin"] == true){
    echo"";
}else if($_SESSION["logedin"] == false){
    header("Location: ../login/login.php");
}
else($_SESSION["isAdmin"] == false){
    header ("Location: ../user/user.php")   
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <!-- Header -->
     <header>
    <div class="inner">
        <div class="section logo">
            
        </div>

        <div class="section main-navigation">
            
            <ul>
            <li><a href="../index.php">Pogledaj stranicu</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>    
     </div>
   </header>
   
   <!-- End Header -->


    <section id="AdminPanel">
    <div class="sekcije">
    <div class="red1">
    <div class="korisnici">
        <div class="korisnici_text">
        <h2><a href="../admin/korisnici.php">Korisnici</a></h2>
        </div>
        
    </div>
    <div class="auta">
        <div class="korisnici_text">
        <h2><a href="../admin/auta.php">Auta</a></h2>
        </div>
        
    </div>
</div>
<div class="red2">
<div class="zahtjev">
        <div class="korisnici_text">
        <h2><a href="../admin/zahtjev.php">Zahtjev</a></h2>
        </div>
        
    </div>

   
</div>


</div>

</section>
</body>
</html>