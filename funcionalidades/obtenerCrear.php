<?php
session_start();
require_once('../class/Recetas.php');

    $usuario = $_SESSION['logged_in_user_name']; // validar con la sesión
    
    $file_get = $_FILES['imagePostre']['name'];
    $temp = $_FILES['imagePostre']['tmp_name'];

    //se crea la carpeta única para el usuario
    $micarpeta = '../img/imgRecetas/'.$usuario;
    if (!file_exists($micarpeta)) {
        mkdir($micarpeta, 0777, true);
    }
    $file_to_saved = "../img/imgRecetas/".$usuario."/".$file_get; 
    move_uploaded_file($temp, $file_to_saved);
    
    if(array_key_exists('titulo', $_POST)  && array_key_exists('ingr', $_POST) &&
        array_key_exists('descr', $_POST)  && array_key_exists('catego', $_POST) &&
        array_key_exists('Dificultad', $_POST)){
        
        if($_REQUEST['titulo'] == "" || $_REQUEST['ingr'] == "" || $_REQUEST['descr'] == "" ||
           $_REQUEST['catego'] == 0 || $_REQUEST['Dificultad'] == 0){

            print("<script> alert('Campos en Blanco'); </script>");
            print("<script type='text/javascript'> window.location.href = 'crearReceta.php'; </script>");               
        }else{
            $obj_crearR = new Recetas();
            $crearReceta = $obj_crearR->crear_Receta($_REQUEST['id_U'], $_REQUEST['titulo'], $_REQUEST['ingr'], $_REQUEST['descr'], 
                                                    $file_to_saved, $_REQUEST['catego'], $_REQUEST['Dificultad']);
            if($crearReceta > 0){
            //Se ingresó correctamente
                print("<script> alert('Se creó correctamente'); </script>");
                //Reedirecciona hacia la página principal de gestión de actividades
                print("<script type='text/javascript'> window.location.href = 'misRecetas.php'; </script>");
            }
        }
    }else{
        print("<script> alert('Error en la creación de la receta, inténtelo de nuevo'); </script>");
        print("<script type='text/javascript'> window.location.href = 'crearReceta.php' </script>");
    }

?>