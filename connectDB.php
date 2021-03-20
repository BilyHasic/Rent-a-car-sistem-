<?php

$db=new mysqli("localhost", "root", "", "rentcar");

if($db->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
$error=FALSE;  

?>