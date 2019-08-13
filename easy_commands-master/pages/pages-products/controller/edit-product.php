<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$id = $_POST["id"];

$name = $_POST["product"];

$cat = $_POST["category"];

$price = $_POST["price"];

$newprice = str_replace(",", ".",$price);

$valid = mysql_getdata("SELECT * FROM produtos WHERE nome='$name' AND id != '$id' ");


if(count($valid)==0){
$alter = mysql_insert("UPDATE produtos SET nome='$name',categorias_id='$cat', preco='$newprice' WHERE id = $id");

if ($alter > 0) {
    //sleep(3);
    echo "<script type='text/javascript'>window.top.location='?page=list-products&success=1';</script>"; exit;
}else{
    echo "<script type='text/javascript'>window.top.location='?page=alter-products&fail=1&id=$id&cat=$cat';</script>"; exit;
}
}




?>