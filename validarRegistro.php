<?php

require_once('class/Usuario.php');

$username = $_REQUEST['username'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

//encripar la contraseña
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

    if(array_key_exists('username', $_POST) && array_key_exists('email', $_POST) && array_key_exists('password', $_POST)){


            if($_REQUEST['username'] == "" || $_REQUEST['email'] == "" || $_REQUEST['password'] == ""){
                print("<script> alert('Revisar Campos'); </script>");
                print("<script type='text/javascript'> window.location.href = 'registro.php'; </script>");               
            }else{
                $obj_validarR = new Usuario();
                $validarNameUser = $obj_validarR->validar_Usuario($_REQUEST['username']);

                if($validarNameUser == null){
                    print("<script> alert('El nombre de usuario ya está en uso'); </script>");
                    print("<script type='text/javascript'> window.location.href = 'registro.php'; </script>");
                }else{
                    $obj_registro = new Usuario();
                    $validarRegistro = $obj_registro->registrar_Usuario($_REQUEST['username'], $_REQUEST['email'], $passwordHash);
            
                    //Reedirecciona hacia la página principal de pastery cooker
                    print("<script type='text/javascript'> window.location.href = 'acceder.php'; </script>");
                }
            }
    }

?>