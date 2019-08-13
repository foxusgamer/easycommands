<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$id = $_POST["id"];

$sec = $_POST["sector"];




$valid = mysql_getdata("SELECT * FROM setores WHERE nome='$sec' AND id != '$id' ");


if(count($valid)==0){
$alter = mysql_insert("UPDATE setores SET nome='$sec' WHERE id = $id");

print_r($alter);

if ($alter > 0) {
    //sleep(3);
    echo "<script type='text/javascript'>window.top.location='?page=list-sectors&success=1';</script>"; exit;
}else{
    echo "<script type='text/javascript'>window.top.location='?page=alter-sectors&fail=1&id=$id';</script>"; exit;
}
}
?>