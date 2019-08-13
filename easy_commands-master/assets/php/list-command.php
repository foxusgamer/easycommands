<?php
    include_once("../../assets/services/products-service.php");
    $numeroMesa = $_POST['numero_mesa'];
    
    require '../../assets/php/conect.php';    
    $mesa = mysql_getdata("SELECT * FROM mesas WHERE numero = '$numeroMesa'");
    $idMesa = $mesa[0]['id'];
    $id_comanda = "SELECT id FROM comandas WHERE mesas_id = '$idMesa'";
    $result_id_comanda = mysqli_query($con, $id_comanda) or die(mysqli_error());
    $id_found = mysqli_affected_rows($con);
    if($id_found !== 0){
        $data_comanda = mysqli_fetch_array($result_id_comanda);
        $id_comanda = $data_comanda[0];
        $orderInformation = mysql_getdata("SELECT * FROM comandas WHERE mesas_id = '$idMesa'"); 
        $orderInformationCard = mysql_getdata("SELECT ped.id as id_pedidos, ped.quantidade as quantidade, prod.nome as nome, ped.observacoes as observacoes from pedidos as ped
        inner join produtos as prod on ped.produtos_id = prod.id 
        where ped.comandas_id = '$id_comanda'");  
        
        if(count($orderInformationCard) > 0){
            foreach($orderInformationCard as $value){
                echo '<li class="list-group-item" style="width: 100%!important">'.$value['quantidade']."x  ".$value['nome']." <small class='text-danger'> ".$value['observacoes']."</small> <i class=' fas fa-trash-alt order-delete' onclick='deleteOrder(".$value['id_pedidos'].")'></i></li>" ;
            }
        }else{
            echo '<li class="list-group-item text-center text-danger" style="width: 100%!important">Não há pedidos nessa Comanda</li>';
        }
    }else{
        echo '<li class="list-group-item text-center text-danger">Não há nenhuma comanda atrelada a essa mesa</li>';
    }
?>