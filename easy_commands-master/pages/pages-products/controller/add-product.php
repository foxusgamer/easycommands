<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$name = $_POST["product"];

$cat = $_POST["category"];

$price = $_POST["price"];

$newprice = str_replace(",", ".",$price);

$valid = mysql_getdata("SELECT * FROM produtos WHERE nome='$name'");

if(count($valid)==0){
    $show = mysql_insert("INSERT INTO produtos VALUES(DEFAULT, '{$name}', '{$newprice}', {$cat})");

if ($show > 0) {
    //sleep(3);
    echo "<script type='text/javascript'>window.top.location='?page=new-product&success=1';</script>"; exit;
}

}else{
    echo "<script type='text/javascript'>window.top.location='?page=new-product&fail=1';</script>"; exit;
}
?>