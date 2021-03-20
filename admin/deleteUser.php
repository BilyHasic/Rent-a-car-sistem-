<?php
require('../connectDB.php');
require '../alert.php';

if(isset($_POST['delete']))
{
$id = $_POST['delete_id'];


$sql = "DELETE FROM user WHERE ID = $id";
$sql_run = mysqli_query($db,$sql);


if ($sql_run) {
  echo '<script>
    
    window.location.href="korisnici.php";
    </script>';
} else {
  echo "Error deleting record: " . $db->error;
}
}
?>