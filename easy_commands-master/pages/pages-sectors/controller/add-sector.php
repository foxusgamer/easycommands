<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$sec = $_POST["sector"];

$valid = mysql_getdata("SELECT * FROM setores WHERE nome='$sec'");

if(count($valid)==0){
    $show = mysql_insert("INSERT INTO setores VALUES(DEFAULT, '{$sec}')");

if ($show > 0) {
    //sleep(3);
    echo "<script type='text/javascript'>window.top.location='?page=new-sectors&success=1';</script>"; exit;
}

}else{
    echo "<script type='text/javascript'>window.top.location='?page=new-sectors&fail=1';</script>"; exit;
}
?>