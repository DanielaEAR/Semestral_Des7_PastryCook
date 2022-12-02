<?php
    session_start();
    if(isset($_SESSION['logged_in_user_id']) == "" && isset($_SESSION['logged_in_user_name']) == ""){
        print("<script type='text/javascript'> window.location.href = '../acceder.php'; </script>");
    }else{
        
    include("../Secciones/headerPrincipal.php");
    include("../class/Recetas.php");

    $idReceta = $_GET['idR'];

    $obj_receta = new Recetas();
    $verReceta = $obj_receta->mostrar_UnaReceta($idReceta);
    $nfilas=count($verReceta);

    if($nfilas > 0){
        foreach($verReceta as $resuVerRecetas){

?>
    <br><br>
    <div class="tarjetaRecetaPadre">
        <div class="tarjetaRecetaHija">
            <br>
            <div class="headerTarjeta">
                <h2> <?php print($resuVerRecetas['titulo']) ?> </h2>
                <a class="iconoF" id="ic2" href="agregarFav.php?idFav=<?php print($resuVerRecetas['id_R'])?>"> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="25"  fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                </a>
            </div>
            <br>
            <div class="camposTarjeta">
                <h5>Ingredientes</h5>
                <hr>
                <div class="campoIngr">
                    <p>
                        <?php print(nl2br($resuVerRecetas['ingredientes'])) ?>
                    </p>
                </div>
                <br>
                <h5>Descripción</h5>
                <hr>
                <div class="campoDescr">
                    <p>
                        <?php print(nl2br($resuVerRecetas['descripción'])) ?>
                    </p>
                </div>
                <br><br>
                <div class="campoImg">
                    <img class="imgR" src="<?php print($resuVerRecetas['imagen']) ?>" alt="" width="300" >
                </div>
            </div>
            <div class="camposInfo">
                <hr>
                <div class="info">
                    <span><b>Categoría:</b> <?php print($resuVerRecetas['postre']) ?> </span>
                    <span><b>Nivel:</b> <?php print($resuVerRecetas['tipoDificultad']) ?> </span>
                </div>
                <div class="info">
                    <span><b>Autor:</b> <?php print($resuVerRecetas['username']) ?> </span>
                    <span> <?php print($resuVerRecetas['fecha']) ?> </span>
                </div>
            </div>
        </div>
    </div>
<?php
        }        
    }
?>
    <br><br><br><br><br><br><br><br><br>
<?php
    include("../Secciones/footerPrincipal.php");
}
?>
</body>
</html>