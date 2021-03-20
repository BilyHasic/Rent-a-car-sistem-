<?php
if (!session_id()) @session_start();
require '../FlashMessages.php';
require '../alert.php';
require('../connectDB.php');

$msg = new \Plasticbrain\FlashMessages\FlashMessages();



if(empty($_POST["email"]) || empty($_POST["sifra"]))  
{  
    $msg->error('Ne postoji uneseni E-mail u bazi podataka');  
}  
else  
{  
    $email = mysqli_real_escape_string($db, $_POST["email"]);  
    $password = mysqli_real_escape_string($db, $_POST["sifra"]);  
    $query = "SELECT * FROM user WHERE email = '$email'";  
    //$result = mysqli_query($db, $query);  
    $result=$db->query($query);
    if(mysqli_num_rows($result) > 0)  
    {  
        while($row = mysqli_fetch_array($result))  
        {  
                if(password_verify($password, $row["sifra"]))     
                {  
                    //return true;  
                    $_SESSION["email"] = $email;
                    $_SESSION["logedin"] = true;
                    $_SESSION["ime_i_prezime"] = $row['ime_i_prezime'];     
                    
                    
                    
                    if($row["role"] == "admin"){
                        $_SESSION["isAdmin"] = true;
                    }else{
                        $_SESSION["isAdmin"] = false;
                    }  
                    $_SESSION["role"] = $row["role"];
                    echo '<script>
                    alert("USPJEŠNO STE SE PRIJAVILI :) ");
                    window.location.href="../admin/admin.php";
                    </script>';
                }  
                else  
                {  
                    //return false;  
                    echo '<script>
                    alert("Pogrešno unesen E-mail ili Password ");
                    window.location.href="login.php";
                    </script>'; 
                      
   
                } 
                 
        }  
    }  
    else  
    { 
       
        $msg->error('Pogrešno uneseni podatci', "/Fakultet/login/login.php");  
    }  
} 
$msg->display();



?>
