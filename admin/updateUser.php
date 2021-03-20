<?php
require('../connectDB.php');
if (!session_id()) @session_start();
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
    <link rel="stylesheet" href="updateUser.css">
</head>
<body>
     <!-- Header -->
     <header>
    <div class="inner">
        <div class="section logo">
            
        </div>

        <div class="section main-navigation">
            
            <ul>
                
                <li><a href="../admin/korisnici.php">Korisnici</a></li>
                <li><a href="../admin/admin.php">Admin Panel</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>    
     </div>
   </header>
   
   <!-- End Header -->

   <?php
 $id = $_GET["id"];

 $qry = mysqli_query ($db,"SELECT * FROM user WHERE ID = '$id'");
 
 $data = mysqli_fetch_array($qry);

 if(isset($_POST['update']))
 {
     $ime_i_prezime = $_POST['ime_i_prezime'];
     $adresa = $_POST['adresa'];
     $broj_telefona = $_POST['broj_telefona'];
     $email = $_POST['email'];
     $sifra = $_POST['sifra'];
     $role = $_POST['role'];
     $sifra = password_hash($sifra, PASSWORD_DEFAULT);
 
 $edit = mysqli_query($db,"update user set ime_i_prezime='$ime_i_prezime', adresa='$adresa', broj_telefona='$broj_telefona', email='$email', sifra='$sifra', role='$role' WHERE ID = '$id'");
 
 if($edit)
 {
    echo '<script>
    alert("Uspješno ste uredili korisnika ");
    window.location.href="korisnici.php";
    </script>';
     
     
 }
 else
 {
     echo mysqly_error();
 }
}  


   ?>


<section id="urediKorisnika">
    <div class="urediKorisnika">
       <form  method="POST">
        <p>ID</p>
        <input type="text" value="<?php echo $data['ID']?>" placeholder="ID" name="ID" ><br>
        <p>Ime & Prezime</p>
        <input type="text"  value="<?php echo $data['ime_i_prezime'] ?>" name="ime_i_prezime" ><br>
        <p>Adresa Stanovanja</p>
        <input type="text" value="<?php echo $data['adresa'] ?>" name="adresa" ><br>
        <p>Broj telefona</p>
        <input type="text" value="<?php echo $data['broj_telefona'] ?>" name="broj_telefona" ><br>
        <p>E-mail</p>
        <input type="text" value="<?php echo $data['email'] ?>" name="email" ><br>
        <p>Šifra korisnika</p>
        <input type="text" value="" name="sifra" ><br>
        <p>Uloga</p>
        <input type="text" value="<?php echo $data['role'] ?>" name="role" ><br>
        

        

       <input class="posalji" type="submit" name="update" value="Pošalji">
        
    </form>
    </div>
</section>

   
</body>
</html>