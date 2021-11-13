<?php

require '/home/administrador/chat-institucional/administrador/app/modeloAdministrador.class.php';
 

class administradorModelo extends modeloAdministrador{
    public $cedula;
    public $usuario;
    public $contrasenia;
    public $nombre;
    public $primerApellido;
    public $segundoApellido;


    
    public function listarUsuariosPendientes(){
        $this -> prepararListadoDeUsuariosPendientes();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        if(empty($resultado)){
            return false;
        } else {
            return $resultado;
        }
        
    }

    public function guardarEstadoUsuarios(){
        $this -> prepararActualizacionDeEstadoUsuarios($this -> cedula );
        $this -> sentencia -> execute();
        if($this -> sentencia -> error){
            return false;
        } else {
            return true;
        }
    }

    public function eliminarUsuario(){
        $this -> prepararEliminacionDeUsuario($this -> cedula);
        $this-> sentencia -> execute();
        if($this -> sentencia -> error){
            return false;
        } else {
            return true;
        }
    }
    
    private function prepararListadoDeUsuariosPendientes(){
        $sql = "SELECT cedula, nombre, primerApellido, segundoApellido, usuario, contrasenia, tipoDeUsuario, estado FROM usuario WHERE estado='pendiente' ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
    }


    private function prepararActualizacionDeEstadoUsuarios($cedula){
        $sql = "UPDATE usuario SET estado='aprobado' WHERE cedula= ? ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i", $cedula);
    }


    private function prepararEliminacionDeUsuario($cedula){
        $sql = "DELETE FROM usuario WHERE cedula= ?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i", $cedula);
    }
    
  
    private function prepararListadoDeUsuariosAprobados(){
        $sql = "SELECT cedula, nombre, primerApellido, segundoApellido, cedula, usuario, tipoDeUsuario FROM usuario WHERE estado='aprobado' AND tipoDeUsuario='Alumno' OR tipoDeUsuario='Profesor'";
        $this -> sentencia = $this -> conexion -> prepare($sql);
    }

    public function listarUsuariosAprobados(){
        $this -> prepararListadoDeUsuariosAprobados();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        if(empty($resultado)){
            return false;
        } else {
            return $resultado;
        }
    }
   
    








}