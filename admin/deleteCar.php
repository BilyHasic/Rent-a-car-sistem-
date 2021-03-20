<?php
require('../connectDB.php');

if(isset($_POST['delete']))
{
$id = $_POST['delete_id'];


$sql = "DELETE FROM auta WHERE ID = $id";
$sql_run = mysqli_query($db,$sql);


if ($sql_run) {
  echo '<script>
    alert("Uspješno ste izbrisali auto ");
    window.location.href="auta.php";
    </script>';
} else {
  echo "Error deleting record: " . $db->error;
}
}
?>