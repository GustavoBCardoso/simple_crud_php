function login(){
    user = document.getElementById('user').value;
    pass = document.getElementById('password').value;
    $.ajax({
        url: 'libs/dynamics_usuario.php',
        data: {'modulo': 'login', 'user':user, 'password':pass },
        type: 'POST',
        success: function(output){
            if(output == "true"){
                window.location.href = "cliente.php";
            }  else {
                alert("Não foi possivel efetuar o login!");
            }
        }
    });
}

function logoff(){
    $.ajax({
        url: 'libs/dynamics_usuario.php',
        data: {'modulo': 'logoff','user':user, 'password':pass },
        type: 'POST',
        success: function(){
            window.location.href = "index.php";
        }
    });
}
