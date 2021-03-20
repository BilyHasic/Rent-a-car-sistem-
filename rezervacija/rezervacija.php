<?php
if (!session_id()) @session_start();
    require('../connectDB.php');
    require ('../FlashMessages.php');
    $sql = "SELECT DISTINCT  * from auta";
    $result = mysqli_query($db,$sql);
    $check = mysqli_num_rows($result) > 0;
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();

    

    
 $id = $_GET["id"];
 $qry = mysqli_query ($db,"SELECT * FROM auta WHERE ID = '$id'");

 $row = mysqli_fetch_array($qry);
    
    $msg->display();


    
    ?>
    
            
<!DOCTYPE html>
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
                <li><a href="../index.php"><span>RENT A CAR BILY</span></a></li>
                <li><a href="../user/user.php">VOZNI PARK</a></li>
                
                <?php
                if(isset ($_SESSION["logedin"])){
                    echo"<li>"."<a href="."../logout.php".">Logout</a></li>";
                }else {
                    echo"<li>"."<a href="."../registracija/registracijaKorisnika1.php".">Registracija/Login</a></li>";
                }
                

                if(isset($_SESSION["isAdmin"])){
                    if ($_SESSION["isAdmin"] == true){
                        echo"<li>"."<a href="."../admin/admin.php".">Admin Panel</a></li>";
                    }if ($_SESSION["isAdmin"] == false){
                        echo"<li>"."<a href="."../admin/admin.php".">Korisnički račun</a></li>";
                    }
                    
                }
                ?>
                

                <!--<li><a href=""><?php echo$row["ime_i_prezime"]; ?></a></li> -->
            </ul>
        </div>    
     </div>
   </header>
   
   <!-- End Header -->


<section id="rezervation">
    <div class="rezervation">
        <div class="rezervation_img">
        <?php  echo"<img src='/Fakultet/admin/".$row['slika']."'>"?>
        </div>
        <div class="rezervation_info">
            <div class="reservation_tittle">
                <h2>INFORMACIJE O <span>AUTU</span></h2>
                </div>
                <div class="columns">
                <div class="col_left">
                <p>IME AUTA: <span><?php echo $row['imeAuta'];?></span></p>
                <p>MODEL AUTA: <span><?php echo $row['modelAuta'];?></span></p>
                <p>BROJ VRATA: <span><?php echo $row['brojVrata'];?></span></p>
                <p>BROJ SJEDIŠTA: <span><?php echo $row['brojSjedista'];?></span></p>
                <p>KLIMA: <span><?php echo $row['klima'];?></span></p>
                <p>GORIVO: <span><?php echo $row['gorivo'];?></span></p>
                <p>TRANSMISIJA: <span><?php echo $row['transmisija'];?></span></p>
                <p>CIJENA NAJMA: <span><?php echo $row['cijena']."KM/dan";?></span></p>
                </div>
                <div class="col_right">
                 
                <form action="rezervacija1.php" method="POST">
                    <p>Datum <span>preuzimanja</span></p>
                    <input type="date" name="vrijeme_preuzimanja" required>
                    <p>Datum <span>vraćanja</span></p>
                    <input type="date" name="vrijeme_vracanja" required><br>
                <!-- <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>"> -->
                <input type="hidden" name="imeAuta" value="<?php echo $row['imeAuta'];?>">
                <input type="hidden" name="modelAuta" value="<?php echo $row['modelAuta'];?>">
                <input type="hidden" name="id" value="<?php echo$_GET['id'];?>">
                <input type="hidden" name="email" value="<?php echo$_SESSION['email'];?>">
                
                <input type="submit" name="submit" value="REZERVIŠI">
                </form>
                </div>
                </div>
        </div>
    </div>

    
</section>




   

</body>
</html>