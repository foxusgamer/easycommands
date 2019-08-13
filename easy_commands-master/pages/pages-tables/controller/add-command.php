<?php
require '../../../assets/php/conect.php';
date_default_timezone_set('America/Sao_Paulo'); 
include_once("../../../assets/services/products-service.php");

$numeroMesa = $_POST["numero_mesa"];
$product_qtd = $_POST["product_qtd"];
$product_id = $_POST["product_id"];
$observation = $_POST["observation"];

function list_products($numeroMesa){  
    require '../../../assets/php/conect.php';
    
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
        foreach($orderInformationCard as $value){
            echo '<li class="list-group-item" style="width: 100%!important">'.$value['quantidade']."x  ".$value['nome']." <small class='text-danger'> ".$value['observacoes']."</small> <i class=' fas fa-trash-alt order-delete' onclick='deleteOrder(".$value['id_pedidos'].")'></i></li>" ;
        }
    }else{
        echo '<li class="list-group-item" style="width: 100%!important"> Não há nenhuma comanda atrelada a essa mesa </li>';
    }
}

//Consulta o BD procurando o ID correspondente ao numero da mesa
$idMesa = "SELECT id FROM mesas WHERE numero = '$numeroMesa'";
//Armazena os dados da consulta acima
$result_id = mysqli_query($con, $idMesa) or die(mysqli_error());
//Pega o valor de linhas afetadas - 0 ou 1
$id_found = mysqli_affected_rows($con);
//Se encontrou alguma linha retorna 1 e entra no if
if($id_found == 1){
    //Pega os dados para tratamento, da array que armazena os dados da consulta
    $data_mesa = mysqli_fetch_array($result_id);
    $mesas_id = $data_mesa["0"]; 
    $pedido = "SELECT * FROM comandas WHERE mesas_id = '$mesas_id'";
    $result_idPedido = mysqli_query($con,$pedido) or die(mysqli_error());
    $id_foundPedido = mysqli_affected_rows($con);
    if($id_foundPedido == 1){
        $horaAtual = date('H:i:s', time());
        $data_pedido = mysqli_fetch_array($result_idPedido);
        $comanda_id = $data_pedido[0];   
        $registerProductInOrder = mysql_insert("INSERT INTO pedidos values (DEFAULT, '{$product_qtd}', '0', '{$observation}', '{$comanda_id}', '{$product_id}', '{$horaAtual}')");
        list_products($numeroMesa);
    }else{
        //Codigo que cria pedido
        $dataAtual = date('Y-m-d'); 
        $horaAtual = date('H:i:s', time());
        $createCommand = mysql_insert("INSERT INTO comandas values (DEFAULT, '{$dataAtual}', '{$horaAtual}', '0', '{$mesas_id}', '0', '0')");
        $data_comanda = mysql_getdata("SELECT id FROM comandas WHERE mesas_id = '$mesas_id'");
        $comanda_id = $data_comanda[0]['id'];
        $registerProductInOrder = mysql_insert("INSERT INTO pedidos values (DEFAULT, '{$product_qtd}', '0', '{$observation}', '{$comanda_id}', '{$product_id}', '{$horaAtual}')");
        list_products($numeroMesa);
    }
    
}else{
    //Codigo que retorna mensagem que nao achou o id da mesa
}


?>
