<?php
require('../connectDB.php');
/*
 $id = $_GET['ID'];

$qry = mysqli_query ($db, "SELECT * FROM auta WHERE ID = '$id'");

$data = mysqli_fetch_array($qry);

if(isset($_POST['update']))
{
    $imeAuta = $selassoc['imeAuta'];
    $modelAuta = $selassoc['modelAuta'];
    $brojVrata = $selassoc['brojVrata'];
    $brojSjedista = $selassoc['brojSjedista'];
    $klima = $selassoc['klima'];
    $gorivo = $selassoc['gorivo'];
    $transmisija = $selassoc['transmisija'];
    $cijena = $selassoc['cijena'];
}

$edit = mysqli_query($db,"update auta set imeAuta='$imeAuta',modelAuta='$modelAuta',brojVrata='$brojVrata',brojSjedista='$brojSjedista',klima='$klima',gorivo='$gorivo',transmisija='$transmisija',cijena='$cijena', ");

if(edit)
{
    mysqli_close($db);
    header("Location: auta.php");
    exit;
}
else
{
    echo mysqly_error();
}
/*
$id = $selassoc['ID'];




if(isset($_POST['update'])){
$upid = $_POST['upID'];
$upime_auta = $_POST['upimeAuta'];
$upmodel_auta = $_POST['upmodelAuta'];
$upbroj_vrata = $_POST['upbrojVrata'];
$upbroj_sjedista = $_POST['upbrojSjedista'];
$upklima = $_POST['upklima'];
$upgorivo = $_POST['upgorivo'];
$uptransmisija = $_POST['uptransmisija'];
$upcijena = $selassoc['upcijena'];


$seleditt = "UPDATE `auta` SET `imeAuta`='$upime_auta',`modelAuta`='$upmodel_auta',`brojVrata`='$upbroj_vrata',`brojSjedista`='$upbroj_sjedista',`klima`='$upklima',`gorivo`='$upgorivo',`transmisija`='$uptransmisija',`cijena`='$upcijena', WHERE `id` = '$upid'";
$qry = mysqli_query($db,$seleditt);

if($qry) {
    header("location: auto.php");
}

}

// sql query for inserting data into database
    /*
    $seledit = "UPDATE auta SET imeAuta='" . $_POST['imeAuta'] ."', modelAuta='" . $_POST['modelAuta'] ."', brojVrata='" . $_POST['brojVrata'] . "', brojSjedista='" . $_POST['brojSjedista'] . "', klima= '" . $_POST['klima'] . "', gorivo= '" . $_POST['gorivo'] . "', transmisija= '" . $_POST['transmisija'] . "', cijena= '" . $_POST['cijena'] . "' where ID = '" . $_POST['ID'] ."'";
    $message = "Record Modified Successfully";
    

$result = mysqli_query($db,"SELECT * FROM auta WHERE ID ='" . $_GET['ID'] . "'");
$query_run = mysqli_fetch_array($result);
    if($query_run)
    {
        header("Location: auta.php");
    }else{
        echo "Error updating record: " . $db->error;
    }

*/
?>