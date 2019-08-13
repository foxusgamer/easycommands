<?php
    require 'assets/services/session-validate.php';
    include_once("assets/services/products-service.php");

    $list = mysql_getdata("SELECT * FROM comandas");

    $success= isset($_GET["success"]) ? $_GET["success"] : "";

    $fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

    $teste = isset($_GET["teste"]) ? $_GET["teste"] : "";




?>

<script> 
    $(document).ready(function(){

        $("#edit").click(function(e){
             $.ajax({
                url : "assets/php/edit-production.php",
                type : 'post',
                data : {
                    id : this.parentElement.parentElement.id,
                    stats :$("#stats_"+this.parentElement.parentElement.id).val()
                }
            })
            .done(function(msg){
                //$("#resultado").html(msg);
                if(msg > 0){
                    $("#notification").addClass("notification-animation bg-success ").html("Pedido Finalizado");
                }
                else{
                    $("#notification").addClass("notification-animation bg-danger ").html("Falha ao finalizar o pedido");
                }
                
            })
            .fail(function(jqXHR, textStatus, msg){
                alert(msg);
            }); 

        })

        
        
    })

</script>
<div class="production-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-2"></div>
            <div class="col-sm-12 col-md-8">
            <br>   
                <div class="card">
                    <div class="card-header bg-success">
                        <h4 class="text-light text-center">
                            Lista de Produção
                        </h4>
                    </div>
                    <table class="table table-striped">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Mesa</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Status</th>
                                <th scope="col">Confirma</th>
                                <th scope="col">Detalhes</th>                   
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php 
                                foreach ($list as  $key =>$value){
                            ?>
                            <tr id="<?php echo $value["id"] ?>">
                                <td><?php echo $value["mesa"]; ?></td>
                                <td><?php echo $value["hora"]; ?></td>
                                <td>
                                        <select style="width: 100%;" class="form-control" id="stats_<?php echo $value["id"] ?>" name="stats">
                                        <option value="0" <?php echo ($value["status"] == 0) ? "selected" : ""; ?>> Disponivel</option>
                                        <option value="1" <?php echo ($value["status"] == 1) ? "selected" : ""; ?>> Em produção</option>
                                        <option value="2" <?php echo ($value["status"] == 2) ? "selected" : ""; ?>> Finalizado</option>
                                    </select>
                                </td>
                                <td>  <a class="btn btn-sm" id="edit"> <i class="fas fa-check text-success"></i>
                                </a> 
                                </td>
                                <td>
                                    <a class="btn btn-sm" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-info-circle text-secondary"></i>
                                    </a>
                                </td>
        
                            </tr>
                            <?php
                                }
                            ?>                    
                        </tbody>
                    </table>
                </div>     
            
                <?php
                    //se orçamento foi inserido com sucesso mostra essa mensagem:
                    if ($success):
                ?>
                    <script>
                        $("#notification").addClass("notification-animation bg-success ").html("Alterado com sucesso");
                    </script>
                <?php 
                    endif; 
                ?>
                <?php
                    // se houver erro no formulario mostra essa mensagem:
                    if ($fail):
                ?>
                <script>
                    $("#notification").addClass("notification-animation bg-success ").html("Excluído com Sucesso");
                </script>
                <?php 
                    endif; 
                ?>
                    
            </div>
            <div class="col-sm-12 col-md-2">
                <?php 
                    foreach ($list as  $key =>$value){
                ?>
                    <div class="collapse" id="collapseExample">
                        <div class="card comanda-detalhes">
                            <div class="tape-a"></div>
                            <div class="tape-b"></div>
                            <a> <?php echo $value["detalhes"]; ?> </a>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>