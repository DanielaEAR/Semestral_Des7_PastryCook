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
            print("<script> alert('Fallo al mostrar recetas favoritas'); </script>");
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function mostrar_UnaFavorito($id_R){
        $instruccion = "CALL sp_mostrarUnFavorito($id_R)";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            print("<script> alert('Fallo al consultar la receta'); </script>");
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function agregar_favoritos($id_R, $id_U){
        $instruccion = "CALL sp_agregarFavoritos(".$id_R.",". $id_U.")";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            print("<script> alert('Fallo al agregar la receta a favoritos'); </script>");
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
}
<?