<?php
if (!session_id()) @session_start();
require('../connectDB.php');




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
    <link rel="stylesheet" href="auta.css">
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
                <li><a href="#addCar">Dodaj Auto</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>    
     </div>
   </header>
   
   <!-- End Header -->


   <!-- Lista Automobila -->

   <section id="listaAuta">
    <div class="lista_Auta">
        
        <div class="listaInfo">
            
            <div class="listID">
                <p>ID</p>
            </div>
            <div class="slika">
                <p>Slika</p>
            </div>
            <div class="ImeAuta">
                <p>Ime Auta</p>
            </div>
            <div class="modelAuta">
                <p>Model Auta</p>
            </div>
            <div class="brojVrata">
                <p>Broj Vrata</p>
            </div>
            <div class="brojSjedista">
                <p>Broj Sjedišta</p>
            </div>
            <div class="klima">
                <p>Klima</p>
            </div>
            <div class="transmisija">
                <p>Transmisija</p>
            </div>
            <div class="cijena">
                <p>Cijena Najma</p>
            </div>
            <div class="status">
                <p>STATUS</p>
            </div>
        </div>
        
            <?php
        if ($check)
        {
           while ($row = mysqli_fetch_assoc($result))
           {
               ?>
        <div class="listCars">
            <div class="carID">
                <p><?php echo$row["ID"]?></p>
            </div>
            <div class="carImg">
            <?php  echo"<img src='/Fakultet/admin/".$row['slika']."'>"?>
            </div>
            <div class="carName">
            <p><?php echo$row["imeAuta"]?></p>
            </div>
            <div class="carModel">
            <p><?php echo$row["modelAuta"]?></p>
            </div>
            <div class="NumOfDors">
            <p><?php echo$row["brojVrata"]?></p>
            </div>
            <div class="NufOfSeats">
            <p><?php echo$row["brojSjedista"]?></p>
            </div>
            <div class="clime">
            <p><?php echo$row["klima"]?></p>
            </div>
            <div class="transmision">
            <p><?php echo$row["transmisija"]?></p>
            </div>
            <div class="price">
            <p><?php echo$row["cijena"]."KM"?></p>
            </div>
            <div class="stats">
                <div class="stanje">
                    <p><?php echo$row["stanje"]?></p>
                </div>
                <div class="options">
                    <div class="edit">
                    <p><a href="updateCar.php?id=<?php echo $row['ID']; ?>">EDIT</a></p>
                    <!--
                    <form action="updateCar.php" method="POST">
                    <input type="hidden" name="edit_id" value="<?php echo$row['ID'];?>">
                    <input class="urediti"  type="submit" name="edit" value="UREDI">
                    </form>
                    -->
                    </div>
                    <div class="delete">
                    <form action="deleteCar.php" method="POST">
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



   <section id="addCar">
       <div class="addCar">
           <div class="addCarTittle">
                <h2>DODAJ NOVO AUTO</h2>
           </div>
       <form enctype="multipart/form-data" action="dodajAuto.php" method="POST">
        <input type="text" placeholder="Ime Auta" name="imeAuta" required><br>
        <input type="text" placeholder="Model Auta" name="modelAuta" required><br>
        <input type="text" placeholder="Broj Vrata" name="brojVrata" required><br>
        <input type="text" placeholder="Broj Sjedišta " name="brojSjedista" required><br>
        <div class="glasanje">
            <div class="glasanje1">
            <label for="DA">DA</label>
        <input class="radijo" id="DA" type="radio" value="DA" name="klima" required>
        
</div>
<div class="glasanje2">
        <label for="NE">NE</label>
        <input class="radijo" id="NE" type="radio" value="NE" name="klima" required><br>
        
        </div>
        </div>
        <input type="text" placeholder="Gorivo" name="gorivo" required><br>
        <input type="text" placeholder="Transmisija" name="transmisija" required><br>
        <input type="text" placeholder="Cijena najma" name="cijena" required><br>
        <input class="slika" type="file" placeholder="Odaberi sliku" name="slika" required><br>
       <input  type="submit" name="submit" value="Pošalji">
        
    </form>
       </div>
   </section>

   



   
</body>
</html>