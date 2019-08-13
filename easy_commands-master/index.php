<?php
session_start();
$get = isset($_GET['page'])? $_GET['page']:'';

include 'template/header.php';
?>

<?php
	switch ($get) {
        case 'listar-produtos':
            include 'template/navbar.php';
            include 'pages/listar-orcamentos.php';
            break;
        case 'list-production':
            include 'template/navbar.php';
            include 'pages/pages-productions/list-production.php';
            break;
        case 'new-product':      
            include 'template/navbar.php';
            include 'pages/pages-products/new-product.php';
            break;
        case 'new-category': 
            include 'template/navbar.php';     
            include 'pages/pages-categories/new-category.php';
            break;
        case 'alter-users': 
            include 'template/navbar.php';     
            include 'pages/pages-users/alter-users.php';
            break;
        case 'delete-users': 
            include 'template/navbar.php';     
            include 'pages/pages-users/delete-users.php';
            break;
        case 'list-table':
            include 'template/navbar.php'; 
            include 'pages/pages-tables/list-table.php';
            break;
        case 'list-users':
            include 'template/navbar.php'; 
            include 'pages/pages-users/list-users.php';
            break;
        case 'home-page':     
            include 'template/navbar.php';
            include 'pages/pages-tables/list-table.php';
            break;
        case 'delete-products':     
            include 'template/navbar.php';
            include 'pages/pages-products/delete-products.php';
            break;
        case 'cashier':     
            include 'template/navbar.php';
            include 'pages/pages-cashier/cashier.php';
            break;
        case 'delete-categories':
            include 'template/navbar.php';     
            include 'pages/pages-categories/delete-categories.php';
            break;
        case 'list-products':
            include 'template/navbar.php';     
            include 'pages/pages-products/list-products.php';
            break;
        case 'list-categories':
            include 'template/navbar.php';     
            include 'pages/pages-categories/list-categories.php';
            break;
        case 'alter-products':
            include 'template/navbar.php';     
            include 'pages/pages-products/alter-products.php';
            break;
        case 'alter-categories':
            include 'template/navbar.php';     
            include 'pages/pages-categories/alter-categories.php';
            break;
        case 'alter-productions':
            include 'template/navbar.php';     
            include 'pages/pages-productions/alter-productions.php';
            break;
        case 'user-register':
            include 'template/navbar.php';     
            include 'pages/pages-users/user-register.php';
            break;
        case 'add-product':     
            include 'template/navbar.php';
            include 'pages/pages-products/controller/add-product.php';
            break;
        case 'add-category':
            include 'template/navbar.php';     
            include 'pages/pages-categories/controller/add-category.php';
            break;
        case 'edit-product':
            include 'template/navbar.php';     
            include 'pages/pages-products/controller/edit-product.php';
            break;
        case 'edit-production':
            include 'template/navbar.php';     
            include 'pages/pages-productions/controller/edit-production.php';
            break;
        case 'new-sectors':     
            include 'template/navbar.php';
            include 'pages/pages-sectors/new-sectors.php';
            break;
        case 'list-sectors':
            include 'template/navbar.php';     
            include 'pages/pages-sectors/list-sectors.php';
            break;
        case 'add-sector':     
            include 'pages/pages-sectors/controller/add-sector.php';
            include 'template/navbar.php';
            break;
        case 'alter-sectors':
            include 'template/navbar.php';     
            include 'pages/pages-sectors/alter-sectors.php';
            break;
        case 'edit-sectors':
            include 'template/navbar.php';     
            include 'pages/pages-sectors/controller/edit-sectors.php';
            break;
        case 'edit-users':
            include 'template/navbar.php';     
            include 'pages/pages-users/controller/edit-users.php';
            break;
        case 'edit-category':
            include 'template/navbar.php';     
            include 'pages/pages-categories/controller/edit-category.php';
            break;
        case 'delete-sectors': 
            include 'template/navbar.php';     
            include 'pages/pages-sectors/delete-sectors.php';
            break;
        case 'delete-table': 
            include 'template/navbar.php';     
            include 'pages/pages-tables/controller/delete-table.php';
            break;
        case 'delete-users': 
            include 'template/navbar.php';     
            include 'assets/php/delete-users.php';
            break;
        case 'new-command':  
            include 'template/navbar.php';    
            include 'pages/pages-tables/new-command.php';
            break;
        case 'report':  
            include 'template/navbar.php';    
            include 'pages/report/report.php';
            break;
        default:
            include 'pages/login.php';
            break;
            
    }

//Conecta com o banco
require "assets/php/conect.php";
//Pega usuario e senha criptografando
$inputId = isset($_POST["userId"]) ? addslashes(trim($_POST["userId"])) : FALSE;
$inputPass = isset($_POST["userPass"]) ? (trim($_POST["userPass"])) : FALSE;
if(isset($_POST["userId"]) && isset($_POST["userPass"])){

//Consulta o banco, caso $result_id for diferente de vazio ganha 1 como login valido
$validate = "SELECT id, usuario, nivel_de_permissao, senha, email, setores_id FROM usuarios 
WHERE usuario = '$inputId'";
$result_id = mysqli_query($con,$validate) or die(mysqli_error($con));
$total = mysqli_affected_rows($con);
if($total == 1){
    //Pega os dados do usuario para passar pra sessao
    $data = mysqli_fetch_array($result_id);

    //Verifica senha, caso ok passa pra sessao as informacoes    
    if(!strcmp($inputPass, $data["senha"])){
        $_SESSION["sessionId"] = session_id();
        $_SESSION["userId"] = $data["id"];
        $_SESSION["userUsername"] = stripslashes($data["usuario"]);
        $_SESSION["userPermissionLevel"] = $data["nivel_de_permissao"];
        echo "<script type='text/javascript'>window.top.location='index.php?page=home-page';</script>";
        exit;
    //Senha invalida
    }else{
        ?>
    <script>
        $('#errorHint').html('Senha incorreta. Tente novamente ou clique em "Esqueceu a senha?" para redefini-la.');       
    </script>
    <?php
    unset ($_SESSION['userId']);
    unset ($_SESSION['userPass']);
    exit; 
    }
//Login inexistente 
}else{
    if($total == 0){
    ?>
    <script>
        $('#errorHint').html('Não foi possível encontrar sua conta.');
    </script>
    <?php
    unset ($_SESSION['userId']);
    unset ($_SESSION['userPass']);
    exit; 
    }
}
}
?>  

<?php include 'template/footer.php' ?>