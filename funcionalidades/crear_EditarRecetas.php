<?php
    include("../Secciones/headerPrincipal.php");
    include("../class/Favoritas.php");
    $id_Usuario = 0; //cambiar dependiendo del usuario
?>   
    <br><br>
    <h2> Mis Recetas </h2>
    <br><br>
    <div class="tarjetaRecetaPadre">
        <div class="tarjetaRecetaHija">
            <br>
            <div class="headerTarjeta">
                <input type="text">
            </div>
            <br>
            <div class="camposTarjeta">
                <h5>Ingredientes</h5>
                <hr>
                <div class="campoIngr">
                    <input type="text">
                </div>
                <br>
                <h5>Descripción</h5>
                <hr>
                <div class="campoDescr">
                    <input type="text">
                </div>
                <br><br>
                <div class="campoImg">
                    <input type="text">
                </div>
            </div>
            <div class="camposInfo">
                <hr>
                <div class="info">
                    <span><b>Categoría:</b> <?php //print($resuVerRecetas['postre']) ?> </span>
                    <span><b>Nivel:</b> <?php //print($resuVerRecetas['tipoDificultad']) ?> </span>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br>
<?php
    include("../Secciones/footerPrincipal.php");
?>
</body>
</html>