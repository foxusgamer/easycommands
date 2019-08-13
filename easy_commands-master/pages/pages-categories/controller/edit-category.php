<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$id = $_POST["id"];

$name = $_POST["cate"];

$sec = $_POST["sector"];

$valid = mysql_getdata("SELECT * FROM categorias WHERE nome='$name' AND id != '$id' ");


if(count($valid)==0){
$alter = mysql_insert("UPDATE categorias SET nome='$name',setores_id='$sec' WHERE id = $id");

if ($alter > 0) {
    //sleep(3);
    echo "<script type='text/javascript'>window.top.location='?page=list-categories&success=1';</script>"; exit;
}else{
    echo "<script type='text/javascript'>window.top.location='?page=alter-categories&fail=1&id=$id&sect=$sec';</script>"; exit;
}
}

echo "<script type='text/javascript'>window.top.location='?page=list-categories&success=1';</script>"; exit;

?>