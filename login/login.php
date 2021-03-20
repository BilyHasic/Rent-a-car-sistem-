<?php

require '../alert.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id=login>
    <div class="Login">
    <div class="logTittle">
     <h2>Log In</h2>
     </div>
     <div class="logForm">
     <form action="login1.php" method="POST">
    <input type="email" placeholder="E-mail" name="email" required><br>
    <input type="password" placeholder="Password" name="sifra" required><br>
    <input id="btn" type="submit" value="LOG IN">
    <p><a href="../resetPasswords/requestReset.php">Forgot password</a></p>
     </div>
     <div class="register">
         <p><a href="../registracija/registracijaKorisnika1.php">Register</a><br><br><a href="../index.php">Nazad na stranicu</a></p>
     </div>
    </div>
    </section>

    <script>
     $('#btn').on('click', function(){

            swal({
        title: "Good job!",
        text: "You clicked the button!",
        icon: "success",
        button: "Aww yiss!",
     });
        })
    </script>
    
</body>
</html>