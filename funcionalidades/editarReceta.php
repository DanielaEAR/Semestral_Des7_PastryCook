<?php
    include("../Secciones/headerPrincipal.php");
    include("../class/Recetas.php");
    include("../class/TipoPostre.php");
    include("../class/DificultadReceta.php");

    $id_Usuario = 0; //cambiar dependiendo del usuario
    $idReceta = $_GET['idR'];

?>   
    <br><br>
    <h2> Editar mi Receta </h2>
    <br><br>
    <div class="tarjetaRecetaPadre">
        <div class="tarjetaRecetaHija">
            <form name="formEditar" method="post" action="obtenerEditar.php" enctype="multipart/form-data">
            <?php
                $obj_receta = new Recetas();
                $editarReceta = $obj_receta->mostrar_UnaReceta($idReceta);
                $nfilas=count($editarReceta);
            
                if($nfilas > 0){
                    foreach($editarReceta as $resuEditRecetas){
                    print("<input type='hidden' name='id_R' value='".$idReceta."'>");
            ?>
                <br>
                <div class="headerTarjetaCrear">
                    <p>Título</p>
                    <input class="campoTitulo" name="titulo" type="text" value="<?php print($resuEditRecetas['titulo']) ?>">
                </div>
                <br>
                <div class="camposTarjeta">
                    <p>Ingredientes</p>
                    <div class="campoIngr">
                        <textarea class="campoIngr" name="ingr" cols="50" rows="5" ><?php print($resuEditRecetas['ingredientes']) ?></textarea>
                    </div>
                    <br>
                    <p>Descripción</p>
                    <div class="campoDescr">
                        <textarea class="campoDescrip" name="descr" cols="50" rows="10" ><?php print($resuEditRecetas['descripción']) ?></textarea>
                    </div>
                    <br>
                    <div class="campoImgC">
                        <p>Imágen (Opcional) </p>
                        <div class="input-group mb-3">
                            <input name="imagePostre" type="file" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Cargar</label>
                        </div>
                    </div>
                </div>
                <div class="camposInfoCrear">
                    <div class="infoCrear">
                        <div class="dropsCrear">
                            <span>Tipo de Categoría </span>
                            <SELECT class="dropC" name="catego">
                            <OPTION value="0" SELECTED>Categoría
                            <?php
                                $obj_tipoP = new TipoPostre();
                                $tipoP = $obj_tipoP->consultar_tiposPostre();
                                $nfilas=count($tipoP);

                                if($nfilas > 0){
                                    foreach($tipoP as $resultado){
                                        if($resultado['postre'] == $resuEditRecetas['postre']){
                                            print("<OPTION selected value='".$resultado['id_P']."'>".$resultado['postre']."<br>");
                                        }else{
                                            print("<OPTION value='".$resultado['id_P']."'>".$resultado['postre']."<br>");
                                        }
                                    }             
                            ?>
                            </SELECT>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="dropsCrear">
                            <span>Nivel</span>
                            <SELECT class="dropC" name="Dificultad">
                            <OPTION value="0" SELECTED>Dificultad
                            <?php
                                $obj_tipoD = new DificultadReceta();
                                $tipoD = $obj_tipoD->consultar_tiposDificultad();
                                $nfilas=count($tipoD);

                                if($nfilas > 0){
                                    foreach($tipoD as $resultadoD){
                                        if($resultadoD['tipoDificultad'] == $resuEditRecetas['tipoDificultad']){
                                            print("<OPTION selected value='".$resultadoD['id_D']."'>".$resultadoD['tipoDificultad']."<br>");
                                        }else{
                                            print("<OPTION value='".$resultadoD['id_D']."'>".$resultadoD['tipoDificultad']."<br>");
                                        }
                                    }             
                            ?>
                            </SELECT>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tarjetaBtn">
                    <button type="submit" class="btnEnviar">Enviar</button> </a>
                </div>
            <?php
                    }  
                }
            ?>
            </form>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br>
<?php
    include("../Secciones/footerPrincipal.php");
?>
</body>
</html>