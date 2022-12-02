<?php
    session_start();
    include("../Secciones/headerPrincipal.php");
    include("../class/Favoritas.php");
    
    $id_Usuario = $_SESSION['logged_in_user_id'];
?>
    <br><br>
    <h2> Mis Favoritos </h2>
    <br><br>
<?php
    $obj_recetasF = new Favoritas();
    $recetasTodasFav = $obj_recetasF->mostrar_favoritos($id_Usuario);

    if($recetasTodasFav == null){
        print("<div class='tarjetaPadre'>");
        print("<div class='msj'>");
        print("<h4 class='msjFh4'> No hay Recetas Favoritas </h4>");
        print("
        <svg xmlns='http://www.w3.org/2000/svg' width='40'  fill='currentColor' class='bi bi-star-fill' viewBox='0 0 16 16'>
            <path d='M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z'/>
        </svg>
        ");
        print("</div>");
        print("</div>");
    }else{
        $nfilas=count($recetasTodasFav);

        foreach($recetasTodasFav as $resRecetasFav){

?>
    <div class="tarjetaPadre">
        <div class="tarjeta">
            <div class="sub1">
                <h6> <b>Categoría:</b> <?php print($resRecetasFav['postre']) ?> </h6>
                <h6> <b>Nivel:</b> <?php print($resRecetasFav['tipoDificultad']) ?> </h6>
                <a class="iconoF" href="agregarFav.php?idFav=<?php print($resRecetasFav['id_R'])?>"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25"  fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                </a>
            </div>
            <div class="sub2">
                <h4> <a href="verReceta.php?idR=<?php print($resRecetasFav['id_R'])?>"> <?php print($resRecetasFav['titulo']) ?> </a> </h4>
                <hr>
                <div class="sub2Span">
                    <span> <b>Autor:</b> <?php print($resRecetasFav['username']) ?> </span>
                    <span> <?php print($resRecetasFav['fecha']) ?> </span>
                </div>
            </div>
        </div>
    </div>
    <br><br>
<?php
        }        
    }
?>
    <br><br><br><br><br><br><br><br><br>
<?php
    include("../Secciones/footerPrincipal.php");
?>
</body>
</html>