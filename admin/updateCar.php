<?php
require('../connectDB.php');
if (!session_id()) @session_start();
$sql = "SELECT DISTINCT  * from auta";
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
    <title>Admin Panel/Auta</title>
    <link rel="stylesheet" href="updateCar.css">
</head>
<body>
     <!-- Header -->
     <header>
    <div class="inner">
        <div class="section logo">
            
        </div>

        <div class="section main-navigation">
            
            <ul>
                
                <li><a href="../admin/auta.php">Auta</a></li>
                <li><a href="../admin/admin.php">Admin Panel</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>    
     </div>
   </header>
   
   <!-- End Header -->

   <?php
 $id = $_GET["id"];

 $qry = mysqli_query ($db,"SELECT * FROM auta WHERE ID = '$id'");
 
 $data = mysqli_fetch_array($qry);

 











 
 if(isset($_POST['update']))
 {
     $imeAuta = $_POST['imeAuta'];
     $modelAuta = $_POST['modelAuta'];
     $brojVrata = $_POST['brojVrata'];
     $brojSjedista = $_POST['brojSjedista'];
     $klima = $_POST['klima'];
     $gorivo = $_POST['gorivo'];
     $transmisija = $_POST['transmisija'];
     $cijena = $_POST['cijena'];







 
 
 $edit = mysqli_query($db,"update auta set imeAuta='$imeAuta', modelAuta='$modelAuta', brojVrata='$brojVrata', brojSjedista='$brojSjedista', klima='$klima', gorivo='$gorivo', transmisija='$transmisija', cijena='$cijena' WHERE ID = '$id'");
 
 if($edit)
 {
    echo '<script>
    alert("Uspješno ste uredili automobil ");
    window.location.href="auta.php";
    </script>';
     
     
 }
 else
 {
     echo mysqly_error();
 }
}  


   ?>


<section id="urediAuto">
    <div class="urediAuto">
       <form  method="POST">
        <p>ID</p>
        <input type="text" value="<?php echo $data['ID']?>" placeholder="ID" name="ID" ><br>
        <p>Ime Auta</p>
        <input type="text"  value="<?php echo $data['imeAuta'] ?>" name="imeAuta" ><br>
        <p>Model Auta</p>
        <input type="text" value="<?php echo $data['modelAuta'] ?>" name="modelAuta" ><br>
        <p>Broj Vrata</p>
        <input type="text" value="<?php echo $data['brojVrata'] ?>" name="brojVrata" ><br>
        <p>Broj Sjedišta</p>
        <input type="text" value="<?php echo $data['brojSjedista'] ?>" name="brojSjedista" ><br>
        <p>Klima: DA/NE</p>
        <input type="text" value="<?php echo $data['klima'] ?>" name="klima" ><br>
        <p>Vrsta goriva</p>
        <input type="text" value="<?php echo $data['gorivo'] ?>"name="gorivo" ><br>
        <p>Transmisija</p>
        <input type="text" value="<?php echo $data['transmisija'] ?>" name="transmisija" ><br>
        <p>Cijena Najma</p>
        <input type="text" value="<?php echo $data['cijena'] ?>" name="cijena" ><br>

        

       <input class="posalji" type="submit" name="update" value="Pošalji">
        
    </form>
    </div>
</section>

   
</body>
</html>