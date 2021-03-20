<?php
if (!session_id()) @session_start();
    require('../connectDB.php');
    require ('../FlashMessages.php');
    $sql = "SELECT DISTINCT  * from auta";
    $result = mysqli_query($db,$sql);
    $check = mysqli_num_rows($result) > 0;
    $msg = new \Plasticbrain\FlashMessages\FlashMessages();
    

    
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
                        echo"<li>"."<a href="."../korisnickiRacun/racun.php".">Korisnički račun</a></li>";
                    }
                    
                }
                ?>
                

                <!--<li><a href=""><?php echo$row["ime_i_prezime"]; ?></a></li> -->
            </ul>
        </div>    
     </div>
   </header>
   
   <!-- End Header -->


   <section id="mission">
    <div class="mission">
        <div class="mission_tittle">
            
            <h2>Odaberite auto i <span>RENTAJTE</span>.</h2>
        </div>
        
        <div class="mission_box">
        <?php
        if ($check)
        {
           while ($row = mysqli_fetch_assoc($result))
           {
               ?>
            <div class="box">
                <div class="mission_img">
                <?php  echo"<img src='/Fakultet/admin/".$row['slika']."'>"?> 
                </div>
                <div class="mission_text">
                    <h2><?php echo$row["imeAuta"] ." ". $row["modelAuta"]; ?></h2>
                    <h2><?php echo$row["cijena"] ."KM/dan"; ?></h2>
                    <button><a href="../rezervacija/rezervacija.php?id=<?php echo $row['ID']; ?>">REZERVIŠI VOZILO</a></button>
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
            
    </div>


    
</section>

<div class="footer">
    <p>Copyright 2021 - Bilal Hasić</p>
  </div>


   

</body>
</html>