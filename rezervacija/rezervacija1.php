<?php
    if (!session_id()) @session_start();
    require '../connectDB.php';

    
    
    


   
    if(isset($_POST["submit"])){ 

      if($_SESSION["logedin"] == false){
        echo '<script> 
        alert("Morate biti prijavljeni da bi ste mogli rentati vozilo"); window.location.href="../login/login.php";
        </script>'; 
      }else{

          
      


        $id = $_POST["id"];
        $SelectFromAuta = mysqli_query ($db,"SELECT * FROM auta WHERE id = '$id'");
        $result = mysqli_fetch_array($SelectFromAuta);

        $email = $_POST["email"];
        $SelectFromUser = mysqli_query ($db,"SELECT * FROM user WHERE email = '$email'");
        $result2 = mysqli_fetch_array($SelectFromUser);
        
        $ime_auta = $result['imeAuta'];
        $model_auta = $result['modelAuta'];
        $vrijeme_preuzimanja = $_POST['vrijeme_preuzimanja'];
        $vrijeme_vracanja = $_POST['vrijeme_vracanja'];

        $sqlSnimiRezervaciju="INSERT INTO request (email, ime_auta, model_auta, vrijeme_preuzimanja, vrijeme_vracanja) VALUES ('$email', '$ime_auta', '$model_auta', '$vrijeme_preuzimanja', '$vrijeme_vracanja')";

        if ($db->query($sqlSnimiRezervaciju) === TRUE) {
          echo '<script> 
          alert("Uspješno ste poslali zahtjev za rent automobila, u što kraćem roku će te dobiti povratnu informaciju."); window.location.href="../korisnickiRacun/racun.php";
          </script>'; 
          } else {
            echo "Error: " . $sqlSnimiRezervaciju . "<br>" . $db->error;
          }

        }      

        
    }


?>