<?php
include_once("../../assets/services/products-service.php");
$id_pedido = $_POST["id_pedidos"]; 

$delete = mysql_delete("DELETE FROM pedidos WHERE id = '$id_pedido'");

?>
<script>
    listOrder();
</script>