<?php
    session_start();
    include("../class/Favoritas.php");

    $idReceta = $_GET['idFav'];
    $id_Usuario = $_SESSION['logged_in_user_id'];

    $eliminarFav = new Favoritas();
    $eliminarMiFav = $eliminarFav->eliminar_favoritos($idReceta, $id_Usuario);

    if($eliminarMiFav){
        print("<script type='text/javascript'> window.location.href = 'Favoritos.php'; </script>");
    }else{
        print("<script> alert('Receta ya añadida a favoritos'); </script>");
        print("<script type='text/javascript'> window.location.href = 'Favoritos.php'; </script>");
    }

?> 