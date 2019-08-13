<!-- <div class="login">

</div> -->
<div class="page-container">
    <div class="span5 bg-login fill">
        <div id="loginTitle" class="login-title" style="position: relative; top: 25%;">
            <h1>Easy Commands</h1>
            <h5 class="text-warning">Economizando tempo e papel</h5>
        </div>
        <div id="doLoginDiv" class="text-center" style="position: relative; top: 28%">
            <button  id="doLogin" type="submit" class="btn btn-outline-light" style="width:30%;">Login</button>
        </div>
        <div class="login-form">
            <br>
            <form action="../easy_commands/index.php" method="POST" autocomplete="off" id="form" style="display: none; margin-top: 10%;">
                <div class="form-group">
                    <label for="user">Usuário</label>
                    <input type="text" class="form-control login-control" id="user" name="userId" aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control login-control" id="exampleInputPassword1" name="userPass" required minlength="6">
                    <small id="errorHint" style="color: red;"><span style="color: #00000000">.</span></small>
                </div>
                <button type="submit" class="btn btn-outline-light" style="width:100%;">Entrar</button>
                <br>
                <br>
                <a class="text-light" href="#" style="text-align:center!important; width: 100%!important;">Esqueceu a senha?</a>

            </form>
        </div>
    </div>
    </div>
</div>

<script>
    $("#doLogin").click(function(){
        $("#loginTitle").animate({
            top: "5%"
        }, 1000, function(){
            $("#form").animate({
                display: "block",
                opacity: "toggle"
            }, 1000, function(){

            });
        });
        $("#doLoginDiv").animate({
            height: "toggle"
        }, 001, function(){

        });
    });
</script>