<?php
require_once('modelo.php');

class TipoPostre extends modeloCredencialesBD{

    private $id_P;
    private $postre;

    public function __construct(){
   
        parent::__construct();
       
    }
    public function consultar_tiposPostre(){
        $instruccion = "CALL sp_listarTiposPostres()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            echo "Fallo al consultar los tipos de postres";
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

}

?>