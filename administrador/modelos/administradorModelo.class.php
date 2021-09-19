<?php

require '../utils/autoloader.php';
 

class administradorModelo extends Modelo{
    public $cedula;
    public $usuario;
    public $contrasenia;
    public $nombre;
    public $primerApellido;
    public $segundoApellido;


    public function autenticarAdministrador(){
        $this -> prepararAutenticacionAdministrador();
        $this -> sentencia -> execute();

        $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
       

        if($this -> sentencia -> error){
            
            throw new Exception ("Error al obtener el usuario: " . $this -> sentencia -> error);

        }

        if($resultado){
           
            $comparacion = $this -> compararPasswordsAdministrador($resultado['contrasenia']);
            if($comparacion){
                $this -> asignarDatosDeUsuarioAdministrador($resultado);
            }
            else{
                throw new Exception ("Error al iniciar sesion");
            }

        }
        else throw new Exception ("Error al iniciar sesion");
    }

    private function compararPasswordsAdministrador($contraseniaHasheada){
        return password_verify($this -> contrasenia, $contraseniaHasheada);
    }

    private function prepararAutenticacionAdministrador(){
        $sql= "SELECT cedula, nombre, primerApellido, segundoApellido, usuario, contrasenia, cedula FROM usuario WHERE usuario= ? ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("s", $this -> usuario);
    }
  
    
    private function asignarDatosDeUsuarioAdministrador($resultado){
        $this -> cedula = $resultado['cedula'];
        $this -> nombre = $resultado['nombre'];
        $this -> primerApellido = $resultado['primerApellido'];
        $this -> segundoApellido = $resultado['segundoApellido'];
        $this -> usuario = $resultado['usuario'];
        $this -> contrasenia  = $resultado['contrasenia'];
    }


    //funciones de administrador
    public function listarUsuariosPendientes(){
        $this -> prepararListadoDeUsuariosPendientes();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        
        return $resultado;
    }

    public function guardarEstadoUsuarios(){
        $this -> prepararActualizacionDeEstadoUsuarios($this -> cedula );
        $this -> sentencia -> execute();
    }

    public function eliminarUsuario(){
        $this -> prepararEliminacionDeUsuario($this -> cedula);
        $this-> sentencia -> execute();
    }
    
    private function prepararListadoDeUsuariosPendientes(){
        $sql = "SELECT cedula,nombre, primerApellido, segundoApellido, usuario, contrasenia, tipoDeUsuario, estado FROM usuario WHERE estado='pendiente' ";
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
        $sql = "SELECT cedula, nombre, primerApellido, segundoApellido, cedula, usuario FROM usuario WHERE estado='aprobado'";
        $this -> sentencia = $this -> conexion -> prepare($sql);
    }

    public function listarUsuariosAprobados(){
        $this -> prepararListadoDeUsuariosAprobados();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        
        return $resultado;

    }
    //funciones de administrador










}