<?php
    include("Secciones/header.php");
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="container">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="navbar-brand" id="nav1" aria-current="page" href="index.php">Inicio 
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
                            </svg>
                        </a> 
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" id="nav1" href="acceder.php">Acceder 
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark" id="divTitulo">
            <h4 class="tituloNavIni">Iniciar Sesión</h4>
    </nav>
    <br><br>
    <div class="iconoR">
        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </svg>
    </div>
    <div class="formularioR">
        <div class="formularioR2">
            <div class="input1">
                <h6 class="inputTexto">Usuario</h6>
                <input type="text" class="form-control" id="input" placeholder="Username" aria-label="Username">
            </div>
            <div class="input1">
                <h6 class="inputTexto">Contraseña</h6>
                <input type="text" class="form-control" id="input" placeholder="Password" aria-label="Username">
            </div>
            <div class="contBtnR">
                <div class="subContBtnR">
                    <a href="acceder.php" target="_parent"><button class="btnR">Iniciar Sesión</button></a>
                    <span class="spanAcceder">¿No tienes cuenta?</span><a class="irRegistro" href="registro.php">¡Regístrate!</a>
                </div>
            </div>
        </div>
    </div>

    
<?php
    include("Secciones/footer.php");
?>
</body>
</html>