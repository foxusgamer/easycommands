<?php
    require '../../../assets/php/conect.php';
    include_once("../../../assets/services/products-service.php");

    $totalRodizioSelect = mysql_getdata("SELECT pedidos.quantidade AS 'qtd' FROM pedidos
    INNER JOIN produtos ON pedidos.produtos_id = produtos.id
    INNER JOIN comandas ON pedidos.comandas_id = comandas.id
    WHERE produtos.categorias_id = 2 AND comandas.status != 1;");

    $totalRodizio = 0;

    foreach($totalRodizioSelect as $key => $rodizio){
        $totalRodizio += $rodizio['qtd']; 
    }

    $totalRodizioSalgadoSelect = mysql_getdata("SELECT pedidos.quantidade AS 'qtd' FROM pedidos
    INNER JOIN produtos ON pedidos.produtos_id = produtos.id
    INNER JOIN comandas ON pedidos.comandas_id = comandas.id
    INNER JOIN mesas ON mesas.id = comandas.mesas_id
    WHERE produtos.categorias_id = 2 AND mesas.preferencia = 0 AND comandas.status != 1;");

    $totalRodizioSalgado = 0;

    foreach($totalRodizioSalgadoSelect as $key => $rodizio){
        $totalRodizioSalgado += $rodizio['qtd']; 
    }

    $totalRodizioDoceSelect = mysql_getdata("SELECT pedidos.quantidade AS 'qtd' FROM pedidos
    INNER JOIN produtos ON pedidos.produtos_id = produtos.id
    INNER JOIN comandas ON pedidos.comandas_id = comandas.id
    INNER JOIN mesas ON mesas.id = comandas.mesas_id
    WHERE produtos.categorias_id = 2 AND mesas.preferencia = 1 AND comandas.status != 1;");

    $totalRodizioDoce = 0;

    foreach($totalRodizioDoceSelect as $key => $rodizio){
        $totalRodizioDoce += $rodizio['qtd']; 
    }
        echo '
        <div class="row">
        <div class="col">Total:
            '.$totalRodizio.'
        </div>
        <div class="col">
            Salgadas:
            '.$totalRodizioSalgado.'                                               
        </div>
        <div class="col">
            Doces:
            '.$totalRodizioDoce.'                                                                              
        </div>
    </div>
        ';

    

?>