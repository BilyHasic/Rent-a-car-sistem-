
<?php
include("../connectDB.php");

if(!isset($_GET["code"])) {
    exit("Nije moguće da ti uđeš ovdje ako nemaš moju permisiju :) Al hvala što si pokušao ;) Cijenit ću to ");
}

$code = $_GET["code"];

$getEmailQuery = mysqli_query($db, "SELECT email FROM passwordreset WHERE code='$code'");
if(mysqli_num_rows($getEmailQuery) == 0){
    echo '<script> 
        alert("Ne može tako, sad se vrati i pitaj mogul ja opet promijenit nešto!"); window.location.href="../login/login.php";
        </script>';
}

if(isset($_POST["password"])){
    $pw = $_POST["password"];
    $pw = password_hash($pw, PASSWORD_DEFAULT);
    

    $row = mysqli_fetch_array($getEmailQuery);
    $email = $row["email"];

    $query = mysqli_query($db, "UPDATE user SET sifra='$pw' WHERE email='$email'");

    if($query){
        $query = mysqli_query($db, "DELETE FROM passwordreset WHERE code='$code'");
        echo '<script> 
        alert("Pasword je promjenjen"); window.location.href="../login/login.php";
        </script>';
    }
    else{
        exit("Nešto nije u redu");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="resetPassword.css">
</head>
<body>
    <section id=reset>
    <div class="Reset">
    <div class="resetTittle">
     <h2>Resetuj svoj paswrod</h2>
     </div>
     <div class="reForm">
     <form action="" method="POST">
    <input type="password" placeholder="Unesite novi password" name="password" required><br><br>
    <input type="submit" name="submit" value="RESET">
    
     </div>
     <div class="register">
         <p><a href="../index.php">Nazad na stranicu</a></p>
     </div>
    </div>
    </section>
</body>
</html>