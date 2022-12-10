<?php
    session_start();
    if(isset($_SESSION['logged_in_user_id']) == "" && isset($_SESSION['logged_in_user_name']) == ""){
        print("<script type='text/javascript'> window.location.href = '../acceder.php'; </script>");
    }else{
    include("../Secciones/headerPrincipal.php");
    include("../class/Recetas.php");
?>
    <div class="bannerPrincipal">
        <img class="imgbannerP" src="../img/banners/bannerPrincipal.jpg"> 
    </div>
    <br><br><br>
    <h2> ¡Tus Postres Favoritos Aquí!</h2>
    <br><br><br>
<?php
    $obj_recetas = new Recetas();
    $recetasTodas = $obj_recetas->mostrar_recetas();
    $nfilas=count($recetasTodas);

    if($nfilas > 0){
        foreach($recetasTodas as $resultadoRecetas){

?>
    <div class="tarjetaPadre">
        <div class="tarjeta">
            <div class="sub1">
                <h6> <b>Categoría:</b> <?php print($resultadoRecetas['postre']) ?> </h6>
                <h6> <b>Nivel:</b> <?php print($resultadoRecetas['tipoDificultad']) ?> </h6>
                <a class="iconoF" href="agregarFav.php?idFav=<?php print($resultadoRecetas['id_R'])?>&pg=1"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25"  fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                </a>
            </div>
            <div class="sub2">
                <h4> <a href="verReceta.php?idR=<?php print($resultadoRecetas['id_R'])?>"> <?php print($resultadoRecetas['titulo']) ?> </a> </h4>
                <hr>
                <div class="sub2Span">
                    <span> <b>Autor:</b> <?php print($resultadoRecetas['username']) ?> </span>
                    <span> <?php print($resultadoRecetas['fecha']) ?> </span>
                </div>
            </div>
        </div>
    </div>
    <br><br>
<?php
        }        
    }else{
        print("<h2> No hay Postres Publicados </h2>");
    }
?>
    <br><br><br><br><br><br><br><br><br>
<?php
    include("../Secciones/footerPrincipal.php");
}
?>
</body>
</html>