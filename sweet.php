<?php
include 'sweet1.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Alert in Core PHP</title>
</head>
<body>
    
    <button id='btn'>Klikni me</button>

    <script>
     $('#btn').on('click', function(){

      Swal.fire(
  'Good job!',
  'Uspješno prihvaćen zahtjev!',
  'success'
)
        })
    </script>

    <?php
    
    echo "Todays ".date("Y-m-d");

    ?>

</body>