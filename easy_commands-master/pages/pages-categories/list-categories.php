<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$list = mysql_getdata("SELECT categorias.id AS 'idCategoria', categorias.nome AS 'nomeCategoria', categorias.setores_id, setores.id AS 'idSetor', setores.nome AS 'nomeSetor' FROM categorias INNER JOIN setores ON categorias.setores_id = setores.id");


$success= isset($_GET["success"]) ? $_GET["success"] : "";

$fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

?>

<div class="page-container">
    <div class="fill bg-categories">
        <div class="container-fluid list-page">
            <div class="row">
                <div class="col-sm-12 col-md-3"></div>
                <div class="col-sm-12 col-md-6">
                <br>
                <div class="card">
                    <div class="card-header bg-dark">
                        <h4 class="text-center text-warning"> Lista de Categorias </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Setor da categoria</th>
                                    <th scope="col">Editar</th>                   
                                    <th scope="col">Excluir</th>                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach ($list as  $key =>$value){
                                ?>
                                    <tr>
                                        <th><?php echo $value["idCategoria"];?></th>
                                        <td><?php echo $value["nomeCategoria"];?></td>
                                        <td><?php echo $value["nomeSetor"];?></td>
                                        <td> <a class="text-dark" href="?page=alter-categories&id=<?php echo $value["idCategoria"] ?>&sect=<?php echo $value["idSetor"] ?> " > <i class="fas fa-edit new-icon"></i> </a> </td>
                                        <td> 
                                            <?php if($value["idCategoria"] != 2) { ?>
                                                <a class="text-dark" href="?page=delete-categories&id=<?php echo $value["idCategoria"] ?>"> <i class="fas fa-trash-alt new-icon"></i> </a> 
                                            <?php } ?>    
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
                            $("#notification").addClass("notification-animation bg-success ").html("Excluido com sucesso");
                        </script>
                        <?php endif; ?>
        
                        <?php
                            // se houver erro no formulario mostra essa mensagem:
                        if ($fail==1):
                        ?>
                        <script>
                             $("#notification").addClass("notification-animation bg-danger ").html("Existem produtos alocados a esta categoria"); 
                        </script>
                        <?php endif; ?>
                </div>
                <div class="col-md-1">
                    <a class="btn-dark add-table" href="?page=new-category" >
                        <i class="fas fa-plus text-light"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
