<?php
include_once("../../../assets/services/table-service.php");

$numeroMesa = $_POST["mesa_numero"];
$id = $_POST["mesa_id"];

 $alterTableNumber = mysql_insert("UPDATE mesas SET numero ='$numeroMesa' WHERE id = '$id'");
?>


