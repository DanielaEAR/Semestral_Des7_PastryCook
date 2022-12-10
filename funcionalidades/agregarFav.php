  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="http://localhost/SemestralFinal/css/estilosPrincipal.css" rel="stylesheet">
 <?php
    session_start();
    include("../class/Favoritas.php");

    $idReceta = $_GET['idFav'];
    $id_Usuario = $_SESSION['logged_in_user_id'];
    $pg = $_GET['pg'];

    $agregarFav = new Favoritas();
    $agregarMiFav = $agregarFav->agregar_favoritos($idReceta, $id_Usuario);

    if($agregarMiFav){
        print("<script type='text/javascript'> window.location.href = 'Favoritos.php'; </script>");
    }else{
?> 
    <div class="modal-dialog"> 
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">No se ha podido Agregar a Favoritos</h4>
            </div>
            <div class="modal-body">
                <p>Esta receta ya se encuentra agregada a favoritos.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                <?php  
                    if($pg == 2){
                ?>
                    <a class="iconoF" href="buscarRecetas.php"> Aceptar <a>
                <?php   
                    } else{
                ?> 
                    <a class="iconoF" href="principal.php"> Aceptar <a>
                <?php 
                    }
                ?> 
                </button>
            </div>
        </div>
        </div>
    </div>
<?php
        //print("<script type='text/javascript'> window.location.href = 'javascript:history.back()'; </script>");
    }

?> 