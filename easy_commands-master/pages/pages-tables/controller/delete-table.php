<?php
include_once("../../assets/services/products-service.php");

$id = $_POST["id"];

$delet = mysql_delete("DELETE FROM mesas WHERE id = $id");

?>