<?php
include_once("../../assets/services/products-service.php");
$setor = $_POST["inputSector"];
$user = $_POST["inputUser"];
$lvlpermission = $_POST["inputPermission"];
$email = $_POST["inputEmail"];
$pass = $_POST["inputPass"];

$valid = mysql_getdata("SELECT * FROM usuarios WHERE usuario='$user'");
if(count($valid)==0){
    $register = mysql_insert("INSERT INTO usuarios VALUES(DEFAULT, '{$user}', '{$lvlpermission}' , {$pass},
    '{$email}', '{$setor}')");
    
    if ($register > 0) {
        header('Location: ../../index.php?page=user-register&success=1');
    }
}else{
    echo "<script type='text/javascript'>alert('Usuario ja cadastrado.);</script>";
    header('Location: ../../index.php?page=user-register&fail=1');

}

?>