<?php
    require 'assets/services/session-validate.php';
    $ident =  $_GET["id"];

    include_once("assets/services/products-service.php");

    $categ = mysql_getdata("SELECT * FROM setores WHERE id='$ident'");

    $success= isset($_GET["success"]) ? $_GET["success"] : "";

    $fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

?>
<div class="page-container">
    <div class="fill bg-sectors">
        <div class="list-page">
            <form action="?page=edit-sectors" method="post">
                <div class="container-fluid">
                    <div class="row">        
                        <div class="col-sm-12 col-md-4"></div>
                        <div class="col-sm-12 col-md-4">
                        <br>
                                <div class="card transparencia">
                                    <div class="card-header bg-dark">
                                        <h4 class="text-warning text-center"> Alterarção de Setor </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nome do Setor</label>
                                            <?php foreach($categ as $value){
                                            
                                            ?>
                                            <input type="text" class="form-control" id="sec" name="sector" value="<?php echo $value["nome"] ?>" required>
                                            <?php 
                                                } 
                                            ?>
                                            <input type="hidden" name="id" value="<?php echo $ident?>">
                                        </div>                                        
                                        <input type="submit" class="btn btn-warning" value="Cadastrar">
        
                                    </div>
                                </div>
                            <?php
                                //se orçamento foi inserido com sucesso mostra essa mensagem:
                                if ($success):
                            ?>
                            <script>
                                $("#notification").addClass("notification-animation bg-success ").html("Setor alterado com sucesso");
                            </script>
                            <?php 
                                endif; 
                            ?>
        
                            <?php
                                // se houver erro no formulario mostra essa mensagem:
                                if ($fail):
                            ?>
                            <script>
                                $("#notification").addClass("notification-animation bg-danger ").html("Verifique se já existe um setor com este nome"); 
                            </script>
                            <?php 
                                endif; 
                            ?>
                        </div>
                        <div class="col-sm-12 col-md-4"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
