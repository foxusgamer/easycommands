<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$id = $_POST["id"];

$setor = $_POST["inputSector"];

$user = $_POST["inputUser"];

$lvlpermission = $_POST["inputPermission"];

$email = $_POST["inputEmail"];

$pass = $_POST["inputPass"];


$valid = mysql_getdata("SELECT * FROM usuarios WHERE usuario='$user' AND id != '$id' ");


if(count($valid)==0){
$alter = mysql_insert("UPDATE usuarios SET usuario='$user', nivel_de_permissao='$lvlpermission', senha='$pass', email='$email', setores_id='$setor' WHERE id = $id");

print_r($alter);

if ($alter > 0) {
    //sleep(3);
    echo "<script type='text/javascript'>window.top.location='?page=list-users&success=1';</script>"; exit;
}else{
    echo "<script type='text/javascript'>window.top.location='?page=alter-users&fail=1&id=$id';</script>"; exit;
}
}
?>