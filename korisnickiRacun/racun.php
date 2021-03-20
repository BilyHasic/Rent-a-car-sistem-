<?php
if (!session_id()) @session_start();
    require('../connectDB.php');

    if(isset ($_SESSION["logedin"])){
        header("Location:");
    }
    else{
        header("Location: ../index.php");
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korisnici Racun</title>
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
                <li><a href="../index.php">RENT A CAR BILY</a></li>
                
                
            
               
                
                <?php
                if(isset ($_SESSION["logedin"])){
                    echo"<li>"."<a href="."../logout.php".">Logout</a></li>";
                    
                    
                }
                else{
                    echo"<li>"."<a href="."./registracija/registracijaKorisnika1.php".">Registracija/login</a></li>";
                } 

                if(isset($_SESSION["isAdmin"])){
                    if ($_SESSION["isAdmin"] == true){
                        echo"<li>"."<a href="."admin/admin.php".">Admin Panel</a></li>";
                    }if ($_SESSION["isAdmin"] == false){
                        echo"<li>"."<a href=".""."><span>Korisnički račun</span></a></li>";
                    }
                    
                }
                
                ?>
                
            </ul>
        </div>    
     </div>
   </header>
   <!-- End Header -->



   <!-- USER -->


   <?php
$sql = "SELECT DISTINCT  * from user";
$result = mysqli_query($db,$sql);
$check = mysqli_num_rows($result) > 0;




 $id = $_SESSION["email"];

 $qry = mysqli_query ($db,"SELECT * FROM user WHERE email = '$id'");
 
 $data = mysqli_fetch_array($qry);

 if(isset($_POST['update']))
 {
     
     $ime_i_prezime = $_POST['ime_i_prezime'];
     $adresa = $_POST['adresa'];
     $broj_telefona = $_POST['broj_telefona'];
     $sifra = $_POST['sifra'];
     
     $sifra = password_hash($sifra, PASSWORD_DEFAULT);
 
 $edit = mysqli_query($db,"update user set ime_i_prezime='$ime_i_prezime', adresa='$adresa', broj_telefona='$broj_telefona',  sifra='$sifra' WHERE ID = '$_POST[ID]'");
 
 if($edit)
 {
    echo '<script>
    alert("Uspješno ste uredili korisnika ");
    window.location.href="racun.php";
    </script>';
     
     
 }
 else
 {
     echo mysqly_error();
 }
}  


   ?>
   
<section id="korisnik">
<div class="korisnik">
<div class="korisnik_sifra">
 <div class="podatci_naslov">
  <h2>Podatci o <span>korisniku</span></h2>
 </div>
 <div class="podatci_input">
 <form  method="POST">
        
        <input type="hidden" name="ID" value="<?php echo$data['ID'];?>">
        
        <p>Ime & Prezime</p>
        <input type="text"  value="<?php echo $data['ime_i_prezime'] ?>" name="ime_i_prezime" ><br>
        <p>Adresa Stanovanja</p>
        <input type="text" value="<?php echo $data['adresa'] ?>" name="adresa" ><br>
        <p>Broj telefona</p>
        <input type="text" value="<?php echo $data['broj_telefona'] ?>" name="broj_telefona" ><br>
        <p>Šifra korisnika</p>
        <input type="password" value="" name="sifra" ><br>
        
        

        

       <input class="posalji" type="submit" name="update" value="Promijeni">
        
    </form>
 </div>
</div>

<?php
$sql = "SELECT * from request WHERE email = '$id' ";
$result = mysqli_query($db,$sql);
$check = mysqli_num_rows($result) > 0;

?>
<div class="korisnik_rent">
<div class="rent_informacije">
<div class="rent_naslov">
<h2>Zahtjevi za rent automobila</h2>
</div>
<div class="rent_podatci">
    <table>
        <tr>
        <th>Ime Auta</th>
        <th>Model Auta</th>
        <th>Vrijeme Preuzimanja</th>
        <th>Vrijeme Vraćanja</th>
        <th>Status</th>
        <th>Opcije</th>
        </tr>
        <?php
        if ($check)
        {
           while ($row = mysqli_fetch_assoc($result))
           {
               ?>
        <tr>
            <td><?php echo$row["ime_auta"]?></td>
            <td><?php echo$row["model_auta"]?></td>
            <td><?php echo$row["vrijeme_preuzimanja"]?></td>
            <td><?php echo$row["vrijeme_vracanja"]?></td>
            <td><?php echo$row["status"]?></td>
            <td><form action="deleteZahtjev.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo$row['ID'];?>">
                    <?php
                    if($row["status"] == 'REZERVISANO'){
                        echo "<input class= 'izbrisati'  type='hidden' name='delete' value='IZBRIŠI'>";
                    }else {
                       echo "<input class='izbrisati'  type='submit' name='delete' value='IZBRIŠI'>"; 
                    }
                    ?>
                    
                    
                    </form></td>
        </tr>
        <?php
}


        
        echo "</table>";
    }
    else{
        echo "<th colspan='6'> TRENUTNO NEMA IZNAJMLJENIH AUTA</th>";
    }


?>
    </table>
</div>
</div>

</div>
</div>
</section>

   <!-- END USER -->
   
    
</body>
</html>