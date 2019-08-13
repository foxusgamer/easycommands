<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$id = $_GET["id"];

echo $id;


$delet = mysql_delete("DELETE FROM setores WHERE id = $id");



if($delet == -1)
{
    echo "<script type='text/javascript'>window.top.location='?page=list-sectors&fail=1';</script>"; exit;
}
else if ($delet > 0) {
    echo "<script type='text/javascript'>window.top.location='?page=list-sectors&success=2';</script>"; exit;
}

?>