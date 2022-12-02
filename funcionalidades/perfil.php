<?php
    session_start();
    if(isset($_SESSION['logged_in_user_id']) == "" && isset($_SESSION['logged_in_user_name']) == ""){
        print("<script type='text/javascript'> window.location.href = '../acceder.php'; </script>");
    }else{
    include("../Secciones/headerPerfil.php");
    include("../class/Usuario.php");

    $id_Usuario = $_SESSION['logged_in_user_id']; 
?>   
    <br><br>
    <form class="formularioPerfil" action="validarEditPerfil.php" method="POST">
        <?php
            $obj_perfilUsu = new Usuario();
            $editarUsu = $obj_perfilUsu->traer_Usuario($id_Usuario);
            $nfilas=count($editarUsu);
            
            if($nfilas > 0){
                foreach($editarUsu as $resuEditUsuarios){
                print("<input type='hidden' name='id_U' value='".$id_Usuario."'>");
        ?>
        <div class="formularioP">
            <div class="formularioP2">
                <div class="input1">
                    <h6 class="inputTexto">Usuario</h6>
                    <input type="text" name="username" class="form-control" id="input" placeholder="Username" aria-label="Username"
                        value="<?php print($resuEditUsuarios['username']) ?>"
                    >
                </div>
                <div class="input1">
                    <h6 class="inputTexto">Correo</h6>
                    <input type="email" name="email" class="form-control" id="input" 
                        placeholder="Email@example.com" aria-label="Username"
                        pattern="[a-zA-Z0-9!#$%&'*_+-]([\.]?[a-zA-Z0-9!#$%&'*_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?"
                        value="<?php print($resuEditUsuarios['email']) ?>"
                    >
                </div>
                <div class="input1">
                    <h6 class="inputTexto">Contraseña</h6>
                    <input type="password" name="password" class="form-control" id="input" placeholder="Password" aria-label="Username">
                    <input type='hidden' name='pass' value="<?php print($resuEditUsuarios['contraseña']) ?>">
                </div>
                <div class="contBtnP">
                    <button class="btnP">Guardar Cambios</button>
                    <button class="btnS"><a class="btncerrarA" href="cerrarSesion.php">Cerrar Sesión</a></button>
                </div>
            </div>
        </div>
        <div class="iconoS">
            <svg xmlns="http://www.w3.org/2000/svg" width="250" height="250" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            </svg>
        </div>
        <?php
                }  
            }
        ?>
    </form>



<br><br><br><br><br><br><br><br><br>
<?php
    include("../Secciones/footerPrincipal.php");
    }
?>
</body>
</html>