<?php
require_once('modelo.php');

class Favoritas extends modeloCredencialesBD{

    private $id_R;
    private $id_U;

    public function __construct(){
   
        parent::__construct();
       
    }
    public function mostrar_favoritos($id_U){
        $instruccion = "CALL sp_mostrarFavoritos($id_U)";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
    
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function agregar_favoritos($id_R, $id_U){
        $instruccion = "CALL sp_agregarFavoritos(".$id_R.",". $id_U.")";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta;

        if(!$resultado){
            //print("<script> alert('Esta receta ya se encuentra agregada a favoritos'); </script>");
            return 0;
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function eliminar_favoritos($id_R, $id_U){
        $instruccion = "CALL sp_eliminarFavoritos(".$id_R.",". $id_U.")";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta;

        if(!$resultado){
            print("<script> alert('Fallo al eliminar la receta de favoritos'); </script>");
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
}
?>