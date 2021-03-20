<?php
if (!session_id()) @session_start();
    require('connectDB.php');

    $sql = "SELECT DISTINCT  * from auta";
    $result = mysqli_query($db,$sql);
    $check = mysqli_num_rows($result) > 0;


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent-Car</title>
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
                <li><a href=""><span>RENT A CAR BILY</span></a></li>
                
                <div class="dropdown">
                <li class="dropbtn"><a href="/Fakultet/user/user.php">VOZNI PARK</a></li>
                <div class="dropdown-content">
                <?php
        if ($check)
        {
           while ($row = mysqli_fetch_assoc($result))
           {
               ?>
                    <a href="rezervacija/rezervacija.php?id=<?php echo $row['ID']; ?>"><?php echo$row["imeAuta"]." ".$row["modelAuta"]?></a>
                    <?php
}


        
        echo "</table>";
    }
    else{
        echo "0 result";
    }


?>
                  </div>
            </div>
            
               
                
                <?php
                if(isset ($_SESSION["logedin"])){
                    echo"<li>"."<a href="."logout.php".">Logout</a></li>";
                    
                    
                }
                else{
                    echo"<li>"."<a href="."./registracija/registracijaKorisnika1.php".">Registracija/login</a></li>";
                } 

                if(isset($_SESSION["isAdmin"])){
                    if ($_SESSION["isAdmin"] == true){
                        echo"<li>"."<a href="."admin/admin.php".">Admin Panel</a></li>";
                    }if ($_SESSION["isAdmin"] == false){
                        echo"<li>"."<a href="."korisnickiRacun/racun.php".">Korisnički račun</a></li>";
                    }
                    
                }
                
                ?>
                
            </ul>
        </div>    
     </div>
   </header>
   <!-- End Header -->



   <section id="mainPage">
       <div class="main_Box">
    <div class="main_Text">
        <h2>Uživajte u putovanjima uz naša vozila<br>Budite slobodni i iznajmite neka od naših auta</h2>
    </div>
    <div class="second_text">
        <p>U koliko odmah želite da pogledate automobile kliknite na dugme ispod.<br> Napomena! Morate biti registrovani kako bi mogli iznajmiti auto.</p>
    </div>
    <div class="main_button">
        <button><a href="user/user.php">IZNAJMITE AUTO</a></button>
    </div>
    </div>
    

    </section>

    <div class="footer">
    <p>Copyright 2021 - Bilal Hasić</p>
  </div>

    

    <!--
    <form action="registracijaKorisnika.php" method="POST">
    <input type="text" placeholder="Ime & Prezime" name="ime_i_prezime" required><br>
    <input type="text" placeholder="Adresa" name="adresa" required><br>
    <input type="number" placeholder="Broj telefona" name="broj_telefona" required><br>
    <input type="email" placeholder="E-mail" name="email" required><br>
    <input type="password" placeholder="Password" name="sifra" required><br>
    <input type="submit" value="Registruj se">
    </form>


    enctype="multipart/form-data"
    -->


    




<!--

    <form enctype="multipart/form-data"  action="dodajAuto.php" method="POST">
        <input type="text" placeholder="Ime Auta" name="imeAuta" required><br>
        <input type="text" placeholder="Model Auta" name="modelAuta" required><br>
        <input type="text" placeholder="Broj Vrata" name="brojVrata" required><br>
        <input type="text" placeholder="Broj Sjedišta " name="brojSjedista" required><br>
        <input type="text" placeholder="Klima - DA/NE" name="klima" required><br>
        <input type="text" placeholder="Gorivo" name="gorivo" required><br>
        <input type="text" placeholder="Transmisija" name="transmisija" required><br>
        <input type="text" placeholder="Cijena najma" name="cijena" required><br>
        <input type="file" placeholder="Odaberi sliku" name="slika" required><br>
       <input type="submit" name="submit" value="Pošalji">
        
    </form>
-->



    
    
</body>
</html>