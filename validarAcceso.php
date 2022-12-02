<?php
session_start();
require_once('class/Usuario.php');

$username = $_REQUEST['username'];
$passwordV = $_REQUEST['password'];


    if(array_key_exists('username', $_POST)  && array_key_exists('password', $_POST)){
    
        $obj_usuario = new Usuario();
        $validarAuth = $obj_usuario->validar_Auth($_REQUEST['username']);

        if($validarAuth == null){
            print("<script> alert('Usuario Inválido'); </script>");
            print("<script type='text/javascript'> window.location.href = 'acceder.php'; </script>");
        }else{
            $nfilasT=count($validarAuth);
        
            if($nfilasT > 0){
                foreach($validarAuth as $authValid){
                    $auth = password_verify($passwordV, $authValid['contraseña']);
                    $id_U =  $authValid['id_U'];
                }
            }
            if($auth!=1){
                print("<script> alert('Contraseña Incorrecta'); </script>");
                print("<script type='text/javascript'> window.location.href = 'acceder.php'; </script>");
            }else{
                $_SESSION['logged_in_user_id'] = $id_U;
                $_SESSION['logged_in_user_name'] = $username;
                //Reedirecciona hacia la página principal de pastery cooker
                print("<script type='text/javascript'> window.location.href = 'funcionalidades/principal.php'; </script>");
            }
        }

    }

?>