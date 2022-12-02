<?php
    session_start();
    include("../Secciones/headerPrincipal.php");
    include("../class/Recetas.php");

    $id_Usuario = $_SESSION['logged_in_user_id'];
?>   
    <br><br>
    <h2> Mis Recetas </h2>
    <br>
    <div class="subCrear">
        <a href="crearReceta.php"> <button class="btnCrear">Crear Receta
            <svg id="iconoCrear" xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </button> </a>
    </div>
    <br>
<?php
    $obj_MiReceta = new Recetas();
    $misRecetasTodas = $obj_MiReceta->mostrar_MiReceta($id_Usuario);

    if($misRecetasTodas == null){
        print("<div class='tarjetaPadre'>");
        print("<div class='msj'>");
        print("<h4 class='msjFh4'> No hay Recetas </h4>");
        print("
        <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' fill='currentColor' class='bi bi-basket-fill' viewBox='0 0 16 16'>
            <path d='M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717L5.07 1.243zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0v-3z'/>
        </svg>
        ");
        print("</div>");
        print("</div>");
    }else{
        $nfilas=count($misRecetasTodas);

        foreach($misRecetasTodas as $resMisRecetas){

?>  
    <div class="tarjetaPadre">
        <div class="tarjeta">
            <div class="sub1">
                <h6> <b>Categoría:</b> <?php print($resMisRecetas['postre']) ?> </h6>
                <h6> <b>Nivel:</b> <?php print($resMisRecetas['tipoDificultad']) ?> </h6>
                <a class="iconoF" href="agregarFav.php?idFav=<?php print($resMisRecetas['id_R'])?>"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25"  fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                </a>
            </div>
            <div class="sub2">
                <h4> <a href="verReceta.php?idR=<?php print($resMisRecetas['id_R'])?>"> <?php print($resMisRecetas['titulo']) ?> </a> </h4>
                <hr>
                <div class="sub2Span">
                    <span> <b>Autor:</b> <?php print($resMisRecetas['username']) ?> </span>
                    <span> <?php print($resMisRecetas['fecha']) ?> </span>
                </div>
            </div>
            <div class="sub3">
                <div class="subEditar">
                    <a href="editarReceta.php?idR=<?php print($resMisRecetas['id_R'])?>"> <button class="btnEditar">Editar</button> </a>
                </div>
                <div class="subEliminar">
                    <a href="eliminarReceta.php?idR=<?php print($resMisRecetas['id_R'])?>"> <button class="btnEliminar">Eliminar</button> </a>
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