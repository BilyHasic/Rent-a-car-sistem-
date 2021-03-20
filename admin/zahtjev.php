<?php
if (!session_id()) @session_start();
require('../connectDB.php');




$selectFromrequest = "SELECT DISTINCT  * from request";
    $result = mysqli_query($db,$selectFromrequest);
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
    <link rel="stylesheet" href="zahtjev.css">
    <script src="zahtjev.js"></script>
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
                
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>    
     </div>
   </header>
   
   <!-- End Header -->

   <section id="listaZahtjeva">
    <div class="listaZahtjeva">
        
        <div class="listaInfo">
            
            <div class="listID">
                <p>ID</p>
            </div>
            <div class="email">
                <p>E-mail</p>
            </div>
            <div class="ime_auta">
                <p>Ime Auta</p>
            </div>
            <div class="model_auta">
                <p>Model Auta</p>
            </div>
            <div class="vrijeme_preuzimanja">
                <p>Vrijeme Preuzimanja</p>
            </div>
            <div class="vrijeme_vracanja">
                <p>Vrijeme Vraćanja</p>
            </div>
            <div class="opcije">
                <p>Opcije</p>
            </div>
            <div class="Status">
                <p>Status</p>
            </div>
            
            
        </div>

      
        
            <?php
        if ($check)
        {
           while ($row = mysqli_fetch_assoc($result))
           {
               ?>
        <div class="listRequests">
            <div class="UserID">
                <p><?php echo$row["ID"]?></p>
            </div>
            <div class="email">
            <p><?php echo$row["email"]?></p>
            </div>
            <div class="imeAuta">
            <p><?php echo$row["ime_auta"]?></p>
            </div>
            <div class="modelAuta">
            <p><?php echo$row["model_auta"]?></p>
            </div>
            <div class="vrijemePreuzimanja">
            <p><?php echo$row["vrijeme_preuzimanja"]?></p>
            </div>
            <div class="vrijemeVracanja">
            <p><?php echo$row["vrijeme_vracanja"]?></p>
            </div>
            
            <?php  
            $exp_date = $row["vrijeme_vracanja"];
            $take_date = $row["vrijeme_preuzimanja"];
            $realTime = date("Y-m-d");

            if($exp_date <= $realTime ){
                $id = $row["ID"];
                $sql = "DELETE FROM request WHERE ID = $id";
                $sql_run = mysqli_query($db,$sql);
                
            }
            
        ?>
            
            <div class="stats">
                
                
                    <div class="edit">
                        <form action="zahtjev1.php" method="POST" class="form-disable">
                            <input type="hidden" name="acceptRequest" value="<?php echo$row['ID'];?>">
                            <input type="hidden" name="email" value="<?php echo$_SESSION['email'];?>">
                            <input type="hidden" name="email" value="<?php echo$row['email'];?>">
                            <?php
                            if($row["status"] == 'REZERVISANO'){
                                echo"<input class='prihvatiti'  type='hidden' name='accept' value='PRIHVATI'>";
                            }else {
                                echo"<input class='prihvatiti'  type='submit' name='accept' value='PRIHVATI'>";
                            }
                            ?>
                            
                        </form>
                   <!-- <p><a href="zahtjev1.php?id=<?php echo $row['ID']; ?>">PRIHVATI</a></p> -->
                  
                    </div>
                    <div class="delete">
                    <form action="deleteZahtjev.php" method="POST">
                    <input type="hidden" name="delete_id" value="<?php echo$row['ID'];?>">
                    <input type="hidden" name="email" value="<?php echo$_SESSION['email'];?>">
                    <input type="hidden" name="email" value="<?php echo$row['email'];?>">
                    <?php
                    if($row["status"] == 'REZERVISANO'){
                        echo"<input class='izbrisati'  type='hidden' name='delete' value='ODBIJ'>";
                        
                    }else {
                        echo"<input class='izbrisati'  type='submit' name='delete' value='ODBIJ'>";
                    }
                    ?>
                    
                    
                    </form>
                
                </div>
            </div>
            <div class="status">
            <p><?php echo$row["status"]?></p>
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
