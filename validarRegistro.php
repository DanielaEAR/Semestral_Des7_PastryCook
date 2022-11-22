<?php

require_once('class/Usuario.php');

$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

//encripar la contraseña
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

    if(array_key_exists('username', $_POST) && array_key_exists('email', $_POST) && array_key_exists('password', $_POST)){

    $obj_registro = new Usuario();
    $validarRegistro = $obj_registro->registrar_Usuario($_REQUEST['username'], $_REQUEST['email'], $passwordHash);
    
        if($validarRegistro > 0){
            //Reedirecciona hacia la página principal de pastery cooker
            print("<script type='text/javascript'> window.location.href = 'acceder.php'; </script>");
        }else{
            //No se ingresó correctamente
            print("<script> alert('Revisar Campos'); </script>");
            print("<script type='text/javascript'> window.location.href = 'registro.php'; </script>");
        }
    }

?>