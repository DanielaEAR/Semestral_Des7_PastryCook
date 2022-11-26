<?php
    include("../Secciones/headerPrincipal.php");
    include("../class/Recetas.php");
    include("../class/TipoPostre.php");
    include("../class/DificultadReceta.php");
?>
    <br><br>
    <h2> ¡Busca Tus Postres Favoritos Aquí!</h2>
    <br><br>
    <div class="contenedorBuscar">
        <div class="contenedorBuscar2">
            <form name="buscar" method="post" action="buscarRecetas.php"> <!-- inicia el form -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="tituloBuscar" value=" ">
                    <button name="btnBuscar"class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                </div>

        </div>
    </div>
    <br><br>
    <div class="contenedorPadre">
        <div class="contenedorFiltro">
            <div class="subContenedor">
                <h4 class="tituloFilt">Filtrar por</h4> 
                <svg id="iconoB" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-binoculars" viewBox="0 0 16 16">
                        <path d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z"/>
                </svg>
            </div>

            <div class="drops">
                <SELECT class="drop1" name="catego">
                <OPTION value="0" SELECTED>Categoría
                <?php
                    $obj_tipoP = new TipoPostre();
                    $tipoP = $obj_tipoP->consultar_tiposPostre();
                    $nfilas=count($tipoP);

                    if($nfilas > 0){
                        foreach($tipoP as $resultado){
                            print("<OPTION value='".$resultado['id_P']."'>".$resultado['postre']."<br>");
                        }             
                ?>
                </SELECT>
                <?php
                    }
                ?>
            </div>
            <div class="drops">
                <SELECT class="drop1" name="Dificultad">
                <OPTION value="0" SELECTED>Dificultad
                <?php
                    $obj_tipoD = new DificultadReceta();
                    $tipoD = $obj_tipoD->consultar_tiposDificultad();
                    $nfilas=count($tipoD);

                    if($nfilas > 0){
                        foreach($tipoD as $resultadoD){
                            print("<OPTION value='".$resultadoD['id_D']."'>".$resultadoD['tipoDificultad']."<br>");
                        }             
                ?>
                </SELECT>
                <?php
                    }
                ?>
            </div>
            </form>  <!-- termina el form -->
        </div>   
        
        <div class="contenedorResult">
<?php
    $obj_recetas = new Recetas();
    $recetasTodas = $obj_recetas->mostrar_recetas();

    if(array_key_exists('btnBuscar', $_POST)){

        if($_REQUEST['tituloBuscar'] == " " && $_REQUEST['catego'] == 0 && $_REQUEST['Dificultad'] == 0){
            $obj_recetas = new Recetas();
            $recetasTodas = $obj_recetas->mostrar_recetas();
        }else{
            $obj_recetasF = new Recetas();
            
            if($_REQUEST['tituloBuscar'] != " "){
                $buscarT = trim($_REQUEST['tituloBuscar']);
                $recetasTodas = $obj_recetasF->filtrar_Receta($buscarT, $_REQUEST['catego'], $_REQUEST['Dificultad']);
            }else{
                $recetasTodas = $obj_recetasF->filtrar_Receta($_REQUEST['tituloBuscar'], $_REQUEST['catego'], $_REQUEST['Dificultad']);
            }
        }
    }
    if($recetasTodas == null){
        print("<div class='tarjetaPadre'>");
        print("<div class='msj'>");
        print("<h4 class='msjH4'> No se han encontrado Resultados</h4>");
        print("
        <svg xmlns='http://www.w3.org/2000/svg' width='70' height='70' fill='currentColor' class='bi bi-emoji-frown-fill' viewBox='0 0 16 16'>
            <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm-2.715 5.933a.5.5 0 0 1-.183-.683A4.498 4.498 0 0 1 8 9.5a4.5 4.5 0 0 1 3.898 2.25.5.5 0 0 1-.866.5A3.498 3.498 0 0 0 8 10.5a3.498 3.498 0 0 0-3.032 1.75.5.5 0 0 1-.683.183zM10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8z'/>
        </svg>
        ");
        print("</div>");
        print("</div>");
    }else{
        $nfilas=count($recetasTodas);

        foreach($recetasTodas as $resultadoRecetas){
?>
        <div class="tarjetaPadre">
            <div class="tarjeta">
                <div class="sub1">
                    <h6> <b>Categoría:</b> <?php print($resultadoRecetas['postre']) ?> </h6>
                    <h6> <b>Nivel:</b> <?php print($resultadoRecetas['tipoDificultad']) ?> </h6>
                    <a class="iconoF" href="agregarFav.php?idFav=<?php print($resultadoRecetas['id_R'])?>"> 
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
    }/* else{
        print("<h2> No hay Postres Publicados </h2>");
    } */
?>      </div>  
    </div>
    <br><br><br><br><br><br><br><br><br>
<?php
    include("../Secciones/footerPrincipal.php");
?>
</body>
</html>