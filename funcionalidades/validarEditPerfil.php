<?php
    require_once('../class/Usuario.php');
    $usuario = "dear"; 

    if(array_key_exists('username', $_POST) && array_key_exists('email', $_POST) && array_key_exists('password', $_POST)){

        if($_REQUEST['username'] == "" || $_REQUEST['email'] == "" ){

            print("<script> alert('Revisar Campos'); </script>");
            print("<script type='text/javascript'> window.location.href = 'perfil.php'; </script>");    

        }else{
            $obj_validarEdiUsu = new Usuario();
            $validarNameUser = $obj_validarEdiUsu->validar_Usuario($_REQUEST['username']);

            if($validarNameUser == null){
                print("<script> alert('El nombre de usuario ya está en uso'); </script>");
                print("<script type='text/javascript'> window.location.href = 'perfil.php'; </script>");
            }else{
                
                $obj_usuario = new Usuario();
                if($_REQUEST['password'] == ""){
                    $validarEdicionUsu = $obj_usuario->editar_Usuario($_REQUEST['id_U'], $_REQUEST['username'], $_REQUEST['email'], $_REQUEST['pass']);
                }else{
                    $passwordHash = password_hash($_REQUEST['password'], PASSWORD_BCRYPT);
                    $validarEdicionUsu = $obj_usuario->editar_Usuario($_REQUEST['id_U'], $_REQUEST['username'], $_REQUEST['email'], $passwordHash);
                }
                //Reedirecciona hacia la página principal de pastery cooker
                print("<script type='text/javascript'> window.location.href = 'perfil.php'; </script>");
            }
        }
    }else{
        print("<script> alert('Error en la creación de la receta, inténtelo de nuevo'); </script>");
        print("<script type='text/javascript'> window.location.href = 'perfil.php' </script>");
    }

?>