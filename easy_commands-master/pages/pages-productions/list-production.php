<?php
    require 'assets/services/session-validate.php';
    include_once("assets/services/products-service.php");

    $list = mysql_getdata("SELECT p.nome AS 'product_name',php.id AS 'idPedido', php.status AS 'pedido_status', php.quantidade AS 'product_qtd', php.observacoes AS 'product_obs', com.status AS 'order_status', com.hora AS 'order_time', com.mesas_id AS 'order_table_number', m.id AS 'order_table_id', com.id as command_id FROM produtos AS p
    INNER JOIN pedidos AS php ON p.id = php.produtos_id
    INNER JOIN comandas AS com ON php.comandas_id = com.id
    INNER JOIN mesas AS m ON m.id = com.mesas_id");

    $sector = mysql_getdata("SELECT * FROM setores where id != 4 order by nome");

    $success= isset($_GET["success"]) ? $_GET["success"] : "";

    $fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

    $teste = isset($_GET["teste"]) ? $_GET["teste"] : "";
?>


<div class="page-container">
    <div class="bg-production fill">
        <div class="container-fluid">
            <br>
            <div class="row">
                <div class="col-xs-12 col-sm-2 col-md-1 col-lg-1"></div>
                <div class="col">
                    <br>   
                    <div class="stats bg-danger text-center text-white" id="listT" style="transition: 0.5s;"></div>
                    <div class="card-header bg-dark">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="text-light text-center">
                                Lista de Produção
                            </h4> 
                        </div>
                        <div class="col">
                            <select class="form-control" id="filtroSetores"> 
                                <?php foreach($sector as  $key => $value){ ?>
                                    <option value="<?php echo $value["id"] ?>"><?php echo $value["nome"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="card roll">                    
                        <table class="table table-striped " >
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Mesa</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Observação</th>
                                    <th scope="col">Confirma</th>                   
                                </tr>
                            </thead>
                            <tbody class="text-center" id="tbody">
                    
                            </tbody>
                        </table>
                    </div>     
                
                    <?php
                        //se orçamento foi inserido com sucesso mostra essa mensagem:
                        if ($success):
                    ?>
                        <script>
                            $("#notification").addClass("notification-animation bg-success ").html("Pedido enviado com sucesso");
                        </script>
                    <?php 
                        endif; 
                    ?>
                    <?php
                        // se houver erro no formulario mostra essa mensagem:
                        if ($fail):
                    ?>
                    <script>
                        $("#notification").addClass("notification-animation bg-danger ").html("Falha ao enviar pedido");
                    </script>
                    <?php 
                        endif; 
                    ?>
                        
                </div>
                <div class="col-xs-12 col-sm-2 col-md-4 col-lg-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>



<script> 
  
function listOrders(){
    var sectorValue = $("#filtroSetores").val();
    $.ajax({
        type:'POST',
        url:'pages/pages-tables/controller/list-order.php',
        data: {sector_value: sectorValue},
        success:function(html){
            $('#tbody').html(html);
        }
    }); 
}

var refreshId = setInterval(function(){ listOrders(); }, 1000);

function listTypes(){
    $.ajax({
        type:'POST',
        url:'pages/pages-productions/controller/list-types.php',
        success:function(html){
            $('#listT').html(html);
        }
    }); 
}

var refreshId = setInterval(function(){ listTypes(); }, 1000);

</script>

<style>

    .stats{
        animation-duration: 1.5s;
        animation-name: statsAnimation;
        animation-timing-function: ease;
        height: fit-content;
    }

    @keyframes statsAnimation{
        0%   {
                color: #dc3545;
                height: 24px;
             }
        90%  {
                color: #dc3545;
            }
        100% {
                color: white;
                height: 24px;
             }
    }
</style>