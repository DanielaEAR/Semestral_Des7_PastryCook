<?php
    include("../class/Recetas.php");

        $idReceta = $_GET['idR'];
        $obj_eliminarRec = new Recetas();
        $eliminar = $obj_eliminarRec->eliminar_Receta($idReceta);
        
        if($eliminar > 0){
        //Se ingresó correctamente
            print("<script> alert('La Receta se eliminó con éxito:D'); </script>");
            //Reedirecciona hacia la página principal de gestión de actividades
            print("<script type='text/javascript'> window.location.href = 'misRecetas.php'; </script>");
        }else{
            //No se ingresó correctamente
            print("<script> alert('No se pudo eliminar la actividad'); </script>");
            print("<script type='text/javascript'> window.location.href = 'misRecetas.php'; </script>");
        }
?>