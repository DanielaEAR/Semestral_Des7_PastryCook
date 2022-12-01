<?php

require_once('class/Usuario.php');

$username = $_REQUEST['username'];
$passwordV = $_REQUEST['password'];


    if(array_key_exists('username', $_POST)  && array_key_exists('password', $_POST)){
    
        $obj_usuario = new Usuario();
        $validarAuth = $obj_usuario->validar_Auth($_REQUEST['username']);

        if($validarAuth == null){
            print("<script type='text/javascript'> window.location.href = 'acceder.php'; </script>");
        }else{
            $nfilasT=count($validarAuth);
        
            if($nfilasT > 0){
                foreach($validarAuth as $authValid){
                    $auth = password_verify($passwordV, $authValid['contraseña']);
                }
            }
            if($auth!=1){
                print("<script> alert('Contraseña Incorrecta'); </script>");
                print("<script type='text/javascript'> window.location.href = 'acceder.php'; </script>");
            }else{
                //Reedirecciona hacia la página principal de pastery cooker
                print("<script type='text/javascript'> window.location.href = 'funcionalidades/principal.php'; </script>");
            }
        }

    }

?>