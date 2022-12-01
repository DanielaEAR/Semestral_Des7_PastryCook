<?php
require_once('modelo.php');

class Recetas extends modeloCredencialesBD{

    private $id_R;
    private $id_U;
    private $titulo;
    private $ingredientes;
    private $descripcion;
    private $id_P;
    private $id_D;

    public function __construct(){
   
        parent::__construct();
       
    }
 
    public function  mostrar_recetas(){
        $instruccion = "CALL sp_mostrarRecetas()";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){

        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function mostrar_UnaReceta($id_R){
        $instruccion = "CALL sp_mostrarUnaReceta($id_R)";
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
    public function mostrar_MiReceta($id_U){
        $instruccion = "CALL sp_mostrarMisRecetas($id_U)";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){

        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function filtrar_Receta($buscar, $id_P, $id_D){
    
        $instruccion = "CALL sp_filtrarReceta('".$buscar."', ".$id_P.", ".$id_D.")";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){

        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function crear_Receta($id_U, $titulo, $ingre, $descrip, $img, $id_P, $id_D){
        $instruccion = "CALL sp_crearReceta(".$id_U.",'".$titulo."','".$ingre."','".$descrip."','".$img."',".$id_P.",".$id_D.")";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta;

        if(!$resultado){
            print("<script> alert('Fallo al registrar la receta'); </script>");
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function editar_Receta($id_R, $titulo, $ingre, $descrip, $img, $id_P, $id_D){
        $instruccion = "CALL sp_editarReceta(".$id_R.",'".$titulo."','".$ingre."','".$descrip."','".$img."',".$id_P.",".$id_D.")";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta;

        if(!$resultado){
            print("<script> alert('Fallo al Editar la receta'); </script>");
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function eliminar_Receta($id_R){
        $instruccion = "CALL sp_eliminarReceta(".$id_R.")";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta;

        if(!$resultado){
            print("<script> alert('Fallo al Eliminar la receta'); </script>");
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
}

?>