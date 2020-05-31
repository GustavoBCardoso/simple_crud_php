<?php    
$modulo = $_POST['modulo'];

if($modulo == "login"){
    $user = $_POST['user'];
    $pass = $_POST['password'];

    if ($user == "virtua" && $pass == "virtu@"){
        session_start();
        $_SESSION['login'] = "Autorizado";
        $retorno = true;
    } else {
        unset ($_SESSION['login']);
        $retorno = false;
    }

    echo json_encode($retorno);
}

if($modulo == "logoff"){
    unset ($_SESSION['login']);
    session_destroy();
}
