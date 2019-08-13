<?php
require 'assets/services/session-validate.php';
include_once("assets/services/products-service.php");

$categ = mysql_getdata("SELECT * FROM categorias");

$success= isset($_GET["success"]) ? $_GET["success"] : "";

$fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

?>

<div class="page-container">
    <div class="fill bg-products">
        <div class ="list-products-page">
            <form action="?page=add-product" method="post">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-4"></div>
                        <div class="col-sm-12 col-md-4">
                        <br>
                            <div class="card transparencia">
                                <div  class="card-header bg-dark txt-white text-center"> <h4> Cadastro de Produtos </h4> </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Nome do produto</label>
                                            <input type="text" class="form-control" id="prod" name="product" required>                        
                                        </div>
                                        <div class="form-group">
                                            <label>Categoria do produto</label>
                                            <select class="form-control" name="category">
                                                <?php 
                                                foreach ($categ as $value){
                                                ?>
        
                                                <option value="<?php echo $value["id"];?>"> <?php echo $value["nome"]; ?></option>
                    
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label >Preço</label>
                                            <input onfocusout="formatPrice()" style="display: inline-block!important" type="text" class="form-control dinheiro" id="valor" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" name="price" required>
                                        </div>
                                        <input type="submit" class="btn btn-info" value="Cadastrar">
        
                                    </div>
                                </div>
                                <?php
                                        //se orçamento foi inserido com sucesso mostra essa mensagem:
                                    if ($success):
                                ?>
                                <script>
                                    $("#notification").addClass("notification-animation bg-success ").html("Cadastrado com sucesso");
                                </script>
                                <?php 
                                    endif; 
                                ?>
                                <?php
                                    // se houver erro no formulario mostra essa mensagem:
                                    if ($fail):
                                ?>
                                <script>
                                    $("#notification").addClass("notification-animation bg-danger ").html("Erro ao cadastrar o produto"); 
                                </script>
                                <?php 
                                    endif; 
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4"></div>
                    </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('.dinheiro').mask('#.##0,00', {reverse: true});

    function formatPrice(){
        formatedVal = $("#valor").val();

        if (formatedVal.length == 2){
            $("#valor").val(formatedVal + ",00") 
        }else if(formatedVal.length == 1){
            $("#valor").val(formatedVal + ",00") 
        }else if(formatedVal.length == 0){
            $("#valor").val(formatedVal + "0,00") 
        }
    }
</script>
