<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija Korisnika</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section id=registracija>
    <div class="registration">
     <div class="regTittle">
     <h2>Registuj svoj nalog</h2>
     </div>
     <div class="regForm">
     <form action="registracijaKorisnika.php" method="POST">
    <input type="text" placeholder="Ime & Prezime" name="ime_i_prezime" required><br>
    <input type="text" placeholder="Adresa" name="adresa" required><br>
    <input type="number" placeholder="Broj telefona" name="broj_telefona" required><br>
    <input type="email" placeholder="E-mail" name="email" required><br>
    <input type="password" placeholder="Password" name="sifra" required><br>
    <input type="submit" value="Registruj se">
    </form>
     </div>
     <div class="login">
         <p><a href="../login/login.php">Login</a><br><br><a href="../index.php">Nazad na stranicu</a></p>
     </div>
    </div>

    </section>
</body>
</html>