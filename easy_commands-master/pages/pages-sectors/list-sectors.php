<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$list = mysql_getdata("SELECT * FROM setores");

$success= isset($_GET["success"]) ? $_GET["success"] : "";

$fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

?>

<div class="page-container">
    <div class="fill bg-sectors">
        <div class="container-fluid list-page">
            <div class="row">
                <div class="col-sm-12 col-md-3"></div>
                <div class="col-sm-12 col-md-6">
                <br>
                <div class="card">
                    <div class="card-header bg-dark">
                        <h4 class="text-warning text-center"> Lista de Setores </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-light text-center">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Setor</th> 
                                    <th scope="col">Editar</th>                  
                                    <th scope="col">Excluir</th>                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($list as  $key =>$value){
                                ?>
                                    <tr>
                                        <th><?php echo $value["id"];?></th>
                                        <td><?php echo $value["nome"]; ?></td>
                                        <td>  <a class="text-dark" href="?page=alter-sectors&id=<?php echo $value["id"] ?>" > <i class="fas fa-edit new-icon txt-dark"></i> </a> </td>
                                        <td> 
                                            <?php if($value["id"] != 4 && $value["id"] != 5) { ?>
                                                <a class="text-dark" href="?page=delete-sectors&id=<?php echo $value["id"] ?>"> <i class="fas fa-trash-alt new-icon txt-dark"></i> </a> 
                                            <?php }?>
                                        </td>               
                                    </tr>
                                    <?php
                                        }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        
                        <?php
                            //se orçamento foi inserido com sucesso mostra essa mensagem:
                        if ($success == 1):
                        ?>
                        <script>
                            $("#notification").addClass("notification-animation bg-success ").html("Alterado com sucesso");
                        </script>
                        <?php endif; ?>
        
        
                        <?php
                            //se orçamento foi inserido com sucesso mostra essa mensagem:
                            if ($success == 2):
                        ?>
                        <script>
                            $("#notification").addClass("notification-animation bg-success ").html("Excluído com sucesso");
                        </script>
                        <?php endif; ?>
        
                        <?php
                            // se houver erro no formulario mostra essa mensagem:
                        if ($fail==1):
                        ?>
                        <script>
                            $("#notification").addClass("notification-animation bg-danger ").html("Existe uma categoria alocada a este setor"); 
                        </script>
                        <?php endif; ?>
                        
                </div>
                <div class="col-md-1">
                    <a class="btn-dark add-table" href="?page=new-sectors" >               
                        <i class="text-light fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>