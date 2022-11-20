<?php
require_once('modelo.php');

class DificultadReceta extends modeloCredencialesBD{

    private $id_D;
    private $tipoDificultad;

    public function __construct(){
   
        parent::__construct();
       
    }
    public function consultar_tiposDificultad(){
        $instruccion = "CALL sp_listarDificultad()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            echo "Fallo al consultar los tipos de dificultades";
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

}

?>