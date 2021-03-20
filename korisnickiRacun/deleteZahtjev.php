<?php
require('../connectDB.php');

if(isset($_POST['delete']))
{
$id = $_POST['delete_id'];


$sql = "DELETE FROM request WHERE ID = $id";
$sql_run = mysqli_query($db,$sql);


if ($sql_run) {
  echo '<script>
    alert("Uspješno ste izbrisali zahtjev ");
    window.location.href="racun.php";
    </script>';
} else {
  echo "Error deleting record: " . $db->error;
}
}
?>