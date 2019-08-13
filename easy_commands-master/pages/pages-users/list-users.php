<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$list = mysql_getdata("SELECT usuarios.id AS 'idUsuario', usuarios.usuario AS 'nomeUsuario', usuarios.email AS 'emailUsuario', setores.nome AS 'nomeSetor', setores.id AS 'idSetor' FROM usuarios INNER JOIN setores ON usuarios.setores_id = setores.id");


$success= isset($_GET["success"]) ? $_GET["success"] : "";

$fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

?>

<div class="page-container">
    <div class="fill bg-users">
        <div class="container-fluid list-page">
            <div class="row">
                <div class="col-sm-12 col-md-3"></div>
                <div class="col-sm-12 col-md-6">
                <br>
                <div class="card">
                    <div class="card-header bg-dark">
                        <h4 class="text-center text-warning"> Lista de Usuarios </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
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
                                        <th><?php echo $value["idUsuario"];?></th>
                                        <td><?php echo $value["nomeUsuario"];?></td>
                                        <td><?php echo $value["emailUsuario"];?></td>
                                        <td><?php echo $value["nomeSetor"];?></td>
                                        <td> <a class="text-dark " href="?page=alter-users&id=<?php echo $value["idUsuario"] ?>&sect=<?php echo $value["idSetor"] ?> " ><i class="fas fa-edit new-icon txt-dark"></i> </a> </td>
                                        <td> <a class="text-dark text-center" href="?page=delete-users&id=<?php echo $value["idUsuario"] ?>"><i class="fas fa-trash-alt new-icon txt-dark"></i> </a> </td>               
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
                            $("#notification").addClass("notification-animation bg-danger ").html("Existe um produto alocado a esta categoria");
                        </script>
                        <?php endif; ?>
                </div>
                <div class="col-md-1">
                    <a class="btn-dark add-table" href="?page=user-register" >
                        <i class="fas fa-plus text-light"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
