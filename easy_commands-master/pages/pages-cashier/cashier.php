<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");
$select = mysql_getdata("SELECT * FROM categorias");
$list_commands = mysql_getdata("SELECT mesas.numero as numero_mesa, mesas.id as id_mesa, mesas.status as status_mesa,
comandas.id as id_comanda, comandas.status as status_comanda, pedidos.quantidade as quantidade_pedido,
produtos.nome as nome_produto, produtos.preco as preco_produto from mesas 
inner join comandas ON comandas.mesas_id = mesas.id
INNER JOIN pedidos ON pedidos.comandas_id = comandas.id
INNER JOIN produtos ON produtos.id = pedidos.produtos_id");
?>

<div class="page-container">
    <div class="fill bg-cashier">
            <br>
            <br>
            <br>
        <div class="container">
            <div class="row">   
                <div class="col-xs-12 col-sm-12 col-md-3">
                    <br>
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h4 class="text-center text-warning">Lista de mesas</h4>
                        </div>
                        <div class="card-body bg-dark" style="padding: 0!important;">
                            <table class="table table-dark">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="text-align: center;"scope="col">Mesa</th>                   
                                    </tr>
                                </thead>
                                <tbody id="lista">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>    
            
                <div class="col-xs-12 col-sm-12 col-md-9">
                    <br>
                    <div class="card">
                        <div class="card-header bg-dark">
                            <h4 class="text-center text-warning">PEDIDO</h4>
                        </div>
                        <div class="card-body" style="padding: 0!important;" id="fatura">
                            <table class="table text-center" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Produto</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Excluir</th>                    
                                    </tr>
                                </thead>
                                <tbody id="comanda">
                                    <tr class="text-danger">
                                        <td colspan="4">
                                        <br>
                                            Nenhuma comanda aberta no momento.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>      
                        </div>
                        <div class="card-footer bg-dark">
                            <button id="fecha_comanda" value="0" class="btn btn-block btn-warning" onclick="function_confirm_cashier();" disabled>Finalizar Comanda</button>
                        </div>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./assets/javascript/cashier.js"></script>

<div id="fundo" class="card transparencia">
	 <div class="fundo_alert"></div>
</div>