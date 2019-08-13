<?php 
    include_once("../../assets/services/products-service.php");
    require '../../assets/php/conect.php';

    $reports = mysql_getdata("SELECT DISTINCT comandas.id, comandas.hist_mesa_numero as tableNumber, comandas.data as openningDate, comandas.hora as openningHour, comandas.hist_valor_fatura as totalValue FROM comandas 
    INNER JOIN pedidos on pedidos.comandas_id = comandas.id where comandas.status = 1;");

foreach($reports as $value)
    echo 
    '
    
        <tr>
            <td>'.$value['tableNumber'].'</td>
            <td>'.$value['openningDate'].' às '.$value['openningHour'].'</td>
            <td>'.$value['totalValue'].'</td>
            <td><a href="#">Detalhes</a></td>
        </tr>
    
    '
    
?>