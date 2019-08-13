<?php

include_once("../../../assets/services/products-service.php");

$id = $_POST["idPedido"];
$valid = mysql_getdata("SELECT * FROM pedidos WHERE id = '$id' ");

if(count($valid)>0){
    $alter = mysql_insert("UPDATE pedidos SET status = 2 WHERE id = '$id'");
}
?>