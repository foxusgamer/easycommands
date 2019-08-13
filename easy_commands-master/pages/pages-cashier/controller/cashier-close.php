<?php
include_once("../../../assets/services/products-service.php");
$id_comanda = $_POST["idComanda"];
$valorTotal = $_POST["valorTotal"];

echo $valorTotal;

$list_commands = mysql_getdata("SELECT * FROM comandas WHERE id = '$id_comanda'");
$id_comanda_banco = $list_commands[0]['id'];
$id_mesa = $list_commands[0]["mesas_id"];
$mesa = mysql_getdata("SELECT numero FROM mesas WHERE id = '$id_mesa'");
$mesa_numero = $mesa[0]["numero"];
    if($id_comanda == $id_comanda_banco){
       $alter_num_mesa = mysql_update("UPDATE comandas SET hist_mesa_numero = '$mesa_numero' WHERE id = '$id_comanda_banco' ");
       $update_pref_mesa = mysql_update("UPDATE mesas SET preferencia = 0 Where numero = '$mesa_numero'");
       $alter_id_mesa = mysql_update("UPDATE comandas SET mesas_id = null WHERE id = '$id_comanda_banco' ");
       $alter_status = mysql_update("UPDATE comandas SET `status` = 1 WHERE id = '$id_comanda_banco' ");
       $alter_value = mysql_update("UPDATE comandas SET `hist_valor_fatura` = '$valorTotal' WHERE id = '$id_comanda_banco' ");
    }
?>