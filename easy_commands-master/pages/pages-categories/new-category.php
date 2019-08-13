<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$categ = mysql_getdata("SELECT * FROM setores");

$success= isset($_GET["success"]) ? $_GET["success"] : "";

$fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

?>

<div class="page-container">
    <div class="fill bg-categories">
        <div class="list-page">
            <form action="?page=add-category" method="post">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-4"></div>
                            <div class="col-sm-12 col-md-4">
                                <br>
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <h4 class="text-warning text-center"> Cadastro de categoria </h4> 
                                    </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Nome da categoria</label>
                                                <input type="text" class="form-control" id="cat" name="categ" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Setor da categoria</label>
                                                <select class="form-control" name="secid">
                                                    <?php 
                                                    foreach ($categ as $value){
                                                    ?>

                                                    <option value="<?php echo $value["id"];?>"> <?php echo $value["nome"]; ?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                            
                                        <input type="submit" class="btn btn-warning" value="Cadastrar">
        
                                    </div>
                                </div>
                                    <?php
                                        //se orçamento foi inserido com sucesso mostra essa mensagem:
                                        if ($success):
                                    ?>
                                        <script>
                                            $("#notification").addClass("notification-animation bg-success ").html("Excluido com Sucesso");
                                        </script>
                                    <?php endif; ?>
        
                                    <?php
                                        // se houver erro no formulario mostra essa mensagem:
                                        if ($fail):
                                    ?>
                                        <script>
                                            $("#notification").addClass("notification-animation bg-danger ").html("Esta categoria já está cadastrada no sistema"); 
                                        </script>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-12 col-md-4"></div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>

