<?php
require_once('modelo.php');

class Usuario extends modeloCredencialesBD{

    private $id_U;
    private $username;
    private $email;
    private $contraseña;

    public function __construct(){
   
        parent::__construct();
       
    }
    public function validar_Auth($username){
        $instruccion = "CALL sp_validarAuth('".$username."')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            print("<script> alert('Fallo al validar usuario'); </script>");
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function validar_Usuario($username){
        $instruccion = "CALL sp_validarUsuario('".$username."')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta;

        if(!$resultado){
            print("<script> alert('Fallo al validar usuario'); </script>");
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function traer_Usuario($id_U){
        $instruccion = "CALL sp_traerUsuario($id_U)";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado){
            print("<script> alert('Fallo al traer información del usuario'); </script>");
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function  registrar_Usuario($username, $email, $contraseña){
        $instruccion = "CALL sp_registrarUsuario('".$username."','".$email."','".$contraseña."')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta;

        if(!$resultado){
            print("<script> alert('Fallo al registrar Usuario'); </script>");
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }
    public function  editar_Usuario($id_U, $username, $email, $contraseña){
        $instruccion = "CALL sp_editarUsuario(".$id_U.",'".$username."','".$email."','".$contraseña."')";
        $consulta = $this->_db->query($instruccion);
        $resultado = $consulta;

        if(!$resultado){
            print("<script> alert('Fallo al editar Usuario'); </script>");
        }else{
            return $resultado;
            $resultado->close();
            $this->_db->close();
        }
    }

   
}

?>