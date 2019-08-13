<?php
include_once("assets/services/products-service.php");
$select = mysql_getdata("SELECT * FROM setores");

$success= isset($_GET["success"]) ? $_GET["success"] : "";

$fail= isset($_GET["fail"]) ? $_GET["fail"] : "";

?>
<script>
$(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});
</script>


<div class="page-container">
    <div class="fill bg-users">
        <div class="container-fluid register-page">
            <div class="row">
                <div class="col-sm-12 col-md-4"></div>
                <div class="col-sm-12 col-md-4">  
                <br>  
                    <div class="card">
                    <div class="card-header bg-dark">
                        <h6 class="text-warning text-center">
                            Cadastro de Usuário
                        </h6>
                    </div>
                        <div class="card-body">
                            <form action="pages/pages-users/controller/register.php" method="POST">
                                <div class="form-group">
                                    <label for="user">Usuário</label>
                                    <input type="text" class="form-control" id="user" name="inputUser" required>
                                </div>
                                <div class="form-group">
                                    <label>Nivel de Permissao</label><br>
                                    <div class="funkyradio">
                                    <div class="funkyradio-info">
                                        <input type="radio" name="inputPermission" value="0" id="radio1" />
                                        <label  data-toggle="tooltip" data-placement="right" title="Faz alteracoes no sistema" for="radio1">Administrador</label>
                                    </div>
                                    <div class="funkyradio-info">
                                        <input type="radio" name="inputPermission" value="1" id="radio2" checked/>
                                        <label data-toggle="tooltip" data-placement="right" title="Apenas as tarefas" for="radio2">Padrao</label>
                                    </div>                        
                                </div>
                                <div class="form-group">
                                    <label for="user">Email</label>
                                    <input type="email" class="form-control" id="userEmail" name="inputEmail"  required>
                                </div>
                                <div class="form-group">
                                    <label for="user">Setor</label><br>
                                    <div class="">
                                    <select class="btn" name="inputSector" required>
                                        <?php foreach($select as $key =>$value){?>
                                        <option value="<?php echo $value["id"] ?>"><?php echo $value["nome"] ?></option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Senha</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" name="inputPass" required minlength="6">
                                </div>
                                <button type="submit" class="btn btn-outline-dark btn-block">Cadastrar</button> 
                            </form>
                        </div>
                    </div>
                </div>
            <br>
                <?php
                //se orçamento foi inserido com sucesso mostra essa mensagem:
                if ($success):
                ?>
                    <script>
                        $("#notification").addClass("notification-animation bg-success ").html("usuário registrado com sucesso");
                    </script>
                <?php endif; ?>
                <?php
                // se houver erro no formulario mostra essa mensagem:
                if ($fail):
                ?>
                    <script>
                        $("#notification").addClass("notification-animation bg-danger ").html("Usuário já cadastrado"); 
                    </script>
                <?php endif; ?>
            </div>
            <div class="col-sm-12 col-md-4"></div>
        </div>
    </div>
</div>
