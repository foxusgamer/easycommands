<?php

function open_table($id_comanda){
    include_once("../../../assets/services/products-service.php");
    require '../../../assets/php/conect.php';
    (float)$totalprice = 0;
    $list_commands = mysql_getdata("SELECT mesas.numero as numero_mesa, mesas.id as id_mesa, mesas.status as status_mesa,
    comandas.id as id_comanda, comandas.status as status_comanda, pedidos.id as id_pedidos, pedidos.quantidade as quantidade_pedido,
    produtos.nome as nome_produto, produtos.preco as preco_produto from mesas 
    inner join comandas ON comandas.mesas_id = mesas.id
    INNER JOIN pedidos ON pedidos.comandas_id = comandas.id
    INNER JOIN produtos ON produtos.id = pedidos.produtos_id");
    foreach($list_commands as $key => $value){
        if($_POST["idComanda"] == $value["id_comanda"]){
            (float)$sum = $value["preco_produto"] * $value["quantidade_pedido"];
            $totalprice += $sum;

            $formatTotalPrice = number_format((float)$totalprice, 2, ',', '');
            $HistTotalPrice = number_format((float)$totalprice, 2, '.', '');

            $newprice = str_replace(".", ",",$value["preco_produto"]);
            echo '
            <tr>
                <td>'.$value["nome_produto"].'</td> 
                <td pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$">'.$newprice.'</td>
                <td>'.$value["quantidade_pedido"].'</td>
                <td class="text-center"><a style="color: white;" href="?page=new-command&numero='.$value["numero_mesa"].'"><i class="fas fa-trash-alt"></i></a> </td>
            </tr>';
        }
    }
    echo '<tr class="totalPrice">
            <td colspan="4">TOTAL: <span class="text-danger">'.$formatTotalPrice.'
            <input id="valorTotal" value="'.$HistTotalPrice.'" style="display: none;">
            </td>
          </span></tr>
          ';
}
$idComanda = $_POST["idComanda"];
open_table($idComanda);
?>
