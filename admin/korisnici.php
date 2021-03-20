
<?php
if (!session_id()) @session_start();
require('../connectDB.php');




$sql = "SELECT DISTINCT  * from user";
    $result = mysqli_query($db,$sql);
    $check = mysqli_num_rows($result) > 0;

    if($_SESSION["isAdmin"] == false)
        header ("Location: ../user/user.php")   
    

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel/Korisnici</title>
    <link rel="stylesheet" href="korisnici.css">
</head>
<body>
     <!-- Header -->
     <header>
    <div class="inner">
        <div class="section logo">
            
        </div>

        <div class="section main-navigation">
            
            <ul>
                
                <li><a href="../admin/admin.php">Admin Panel</a></li>
                <li><a href="#registracija">Dodaj Korisnika</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>    
     </div>
   </header>
   
   <!-- End Header -->

   <section id="listaKorisnika">
    <div class="lista_Korisnika">
        
        <div class="listaInfo">
            
            <div class="listID">
                <p>ID</p>
            </div>
            <div class="FirstName">
                <p>Ime & Prezime</p>
            </div>
            <div class="adress">
                <p>Adresa stanovanja</p>
            </div>
            <div class="numOfPhone">
                <p>Broj telefona</p>
            </div>
            <div class="email">
                <p>E-mail</p>
            </div>
            <div class="password">
                <p>Šifra</p>
            </div>
            <div class="role">
                <p>Uloga</p>
            </div>
            
        </div>
        
            <?php
        if ($check)
        {
           while ($row = mysqli_fetch_assoc($result))
           {
               ?>
        <div class="listUsers">
            <div class="UserID">
                <p><?php echo$row["ID"]?></p>
            </div>
            <div class="firstName">
            <p><?php echo$row["ime_i_prezime"]?></p>
            </div>
            <div class="adresa">
            <p><?php echo$row["adresa"]?></p>
            </div>
            <div class="brojTelefona">
            <p><?php echo$row["broj_telefona"]?></p>
            </div>
            <div class="e-mail">
            <p><?php echo$row["email"]?></p>
            </div>
            <div class="sifra">
            <p><?php echo$row["sifra"]?></p>
            </div>
            <div class="stats">
                <div class="stanje">
                    <p><?php echo$row["role"]?></p>
                </div>
                <div class="options">
                    <div class="edit">
                    <p><a href="updateUser.php?id=<?php echo $row['ID']; ?>">EDIT</a></p>
                  
                    </div>
                    <div class="delete">
                    <form action="deleteUser.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo$row['ID'];?>">
                    <input class="izbrisati"  type="submit" name="delete" value="IZBRIŠI">
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
}


        
        echo "</table>";
    }
    else{
        echo "0 result";
    }


?>
    </div>
   </section>



   <section id=registracija>
    <div class="registration">
     <div class="regTittle">
     <h2>REGISTRUJ NOVOG KORISNIKA</h2>
     </div>
     <div class="regForm">
     <form enctype="multipart/form-data" action="registracijaKorisnika.php" method="POST">
    <input type="text" placeholder="Ime & Prezime" name="ime_i_prezime" required><br>
    <input type="text" placeholder="Adresa" name="adresa" required><br>
    <input type="number" placeholder="Broj telefona" name="broj_telefona" required><br>
    <input type="email" placeholder="E-mail" name="email" required><br>
    <input type="password" placeholder="Password" name="sifra" required><br>
    <input type="submit" value="REGISTRUJ KORISNIKA">
    </form>
     </div>
     
    </div>

    </section>


   
</body>
</html>