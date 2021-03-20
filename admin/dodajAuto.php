<?php
require('../connectDB.php');
require('../alert.php');

if(isset($_POST['imeAuta'])) $ime_auta=$_POST['imeAuta'];
else $error=TRUE;
if(isset($_POST['modelAuta'])) $model=$_POST['modelAuta'];
else $error=TRUE;
if(isset($_POST['brojVrata'])) $brojVrata=$_POST['brojVrata'];
else $error=TRUE;
if(isset($_POST['brojSjedista'])) $brojSjedista=$_POST['brojSjedista'];
else $error=TRUE;
if(isset($_POST['klima'])) $klima=$_POST['klima'];
else $error=TRUE;
if(isset($_POST['gorivo'])) $gorivo=$_POST['gorivo'];
else $error=TRUE;
if(isset($_POST['transmisija'])) $transmisija=$_POST['transmisija'];
else $error=TRUE;
if(isset($_POST['cijena'])) $cijena=$_POST['cijena'];
else $error=TRUE;
if (isset($_POST['slika'])) $slikica=$_POST['slika'];
else $error=TRUE;

//$_SERVER['DOCUMENT_ROOT'].

$target_dir = "slike_auta/";
$target_file = $target_dir. basename($_FILES["slika"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["slika"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }


// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["slika"]["size"] > 2000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk = 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["slika"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}





    $SQLsnimiAutoUbazu="INSERT INTO auta (imeAuta, modelAuta, brojVrata, brojSjedista, klima, gorivo, transmisija, cijena, slika) VALUES ('$ime_auta', '$model', '$brojVrata', '$brojSjedista', '$klima', '$gorivo', '$transmisija', '$cijena', '$target_file')";
    if($db->query($SQLsnimiAutoUbazu) === TRUE){

        header("Location:auta.php");
        
    }else {
        echo"Error: " . $SQLsnimiAutoUbazu . "<br>" . $db->error;
    }

    $db->error;

?>

/*

if (isset($_POST['submit'])) 
{
    
    $img=$_FILES['slika']['name'];
    move_uploaded_file($_FILES['slika']['tmsp_name'], "img/slike_auta/$img");

    
}

*/


//die(var_dump($target_file));
    //$target_file=$_SERVER['DOCUMENT_ROOT'].$target_file;

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>