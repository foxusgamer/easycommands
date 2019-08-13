<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$categor = $_POST["categ"];

$secid = $_POST["secid"];

$valid = mysql_getdata("SELECT * FROM categorias WHERE nome='$categor'");

if(count($valid)==0){
    $show = mysql_insert("INSERT INTO categorias VALUES(DEFAULT, '{$categor}', '{$secid}')");

if ($show > 0) 
    //sleep(3);
    echo "<script type='text/javascript'>window.top.location='?page=new-category&success=1';</script>"; exit;


}else{
    echo "<script type='text/javascript'>window.top.location='?page=new-category&fail=1';</script>"; exit;
}
?>