<?php
    session_start();
    if(isset($_GET['sair']) &&  $_GET['sair'] == 1){
        session_destroy();
        header("Location: ./"); exit;
    }

    if (isset($_SESSION['login']) && $_SESSION['login']  == "Autorizado") { header("Location: cliente.php"); exit; }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Simple Login Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form action="/examples/actions/confirmation.php" method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Usuário" id="user" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Senha" id="password" required="required">
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-primary btn-block" onclick="login();">Entrar</button>
        </div>     
    </form>
<!--     <p class="text-center"><a href="cadastro.php">Create an Account</a></p> -->
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="js/ajax_usuario.js" type="text/javascript"></script>
</body>
</html>                                		                            