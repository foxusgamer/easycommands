<?php 
include_once("../../../assets/services/table-service.php");

$pref = $_POST["pref"];
$numero_mesa = $_POST["numero_mesa"];

mysql_insert("UPDATE mesas SET preferencia='$pref' where numero ='$numero_mesa' ");
?>