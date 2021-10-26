<?php

require '../utils/autoloader.php';
class UsuarioModelo extends Modelo{
    
    public $nombre;
    public $primerApellido;
    public $segundoApellido;
    public $usuario;
    public $contrasenia;
    public $cedula;
    public $estado;
    public $tipoDeUsuario;
    

    public function guardarUsuario(){
        if($this -> checkearUsuario($this -> usuario) == true){
            return false;
        } else if($this -> checkearUsuario($this -> usuario) == false ){
            $this -> prepararInsercion();
            $this -> sentencia -> execute();
            return true;
        }

        /*$this -> checkearUsuario($this -> usuario) ? generarHtml("registro" .$this-> tipoDeUsuario, ['exito' => false]) : $this -> prepararInsercion();
        $this -> sentencia -> execute();*/

        if($this -> sentencia -> error){
            throw new Exception("Lo sentimos hubo un problema al registrar al usuario" . $this -> sentencia -> error);
        }
    }

    private function prepararInsercion(){
            $this -> contrasenia = $this -> hashearContrasenia( $this -> contrasenia);
            $sql = "INSERT INTO usuario (cedula, nombre, primerApellido, segundoApellido, usuario, contrasenia, tipoDeUsuario, estado) VALUES (?,?,?,?,?,?,?,?)";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("isssssss",
                $this -> cedula,
                $this -> nombre,
                $this -> primerApellido,
                $this -> segundoApellido,
                $this -> usuario,
                $this -> contrasenia,
                $this -> tipoDeUsuario,
                $this -> estado
            );

    }

    private function checkearUsuario($usuario){ 
            $sql = "SELECT usuario FROM usuario WHERE usuario= ? ";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("s", $usuario);
            $this -> sentencia -> execute();
            $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
            if ($resultado['usuario'] === $usuario):
                return true;
            elseif($resultado['usuario'] !== $usuario):
                return false;
            endif;
    }

   
    
    //iniciar sesion
    public function autenticar(){
        $this -> prepararAutenticacion();
        $this -> sentencia -> execute();

        $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
       

        if($this -> sentencia -> error){
            
            throw new Exception ("Error al obtener el usuario: " . $this -> sentencia -> error);

        }

        if($resultado){
           
            $comparacion = $this -> compararPasswords($resultado['contrasenia']) && $resultado['estado'] == "aprobado" ;
            if($comparacion){
                $this -> asignarDatosDeUsuario($resultado);
            }
            else{
                throw new Exception ("Error al iniciar sesion");
            }

        }
        else throw new Exception ("Error al iniciar sesion");
    }
    private function compararPasswords($contraseniaHasheada){
        return password_verify($this -> contrasenia, $contraseniaHasheada);
    }
    
    private function prepararAutenticacion(){
        $sql= "SELECT  cedula,nombre, primerApellido, segundoApellido, usuario, contrasenia, tipoDeUsuario, estado FROM usuario WHERE usuario= ? ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("s", $this -> usuario);
    }

    private function asignarDatosDeUsuario($resultado){
        $this -> cedula = $resultado ['cedula'];
        $this -> nombre = $resultado['nombre'];
        $this -> primerApellido = $resultado['primerApellido'];
        $this -> segundoApellido = $resultado['segundoApellido'];
        $this -> usuario = $resultado['usuario'];
        $this -> contrasenia  = $resultado['contrasenia'];
        $this -> tipoDeUsuario= $resultado['tipoDeUsuario'];
        $this -> estado = $resultado['estado'];
    }
    //iniciar sesion
    
    //modificar datos

    public function actualizarUsuario(){
        $this -> prepararActualizacionDeUsuario();
        $this -> sentencia -> execute();
    }

    private function prepararActualizacionDeUsuario(){
        $this -> contrasenia = $this -> hashearContrasenia($this -> contrasenia);
        $sql = "UPDATE usuario SET nombre = ?, primerApellido = ?, segundoApellido = ?, usuario = ?, contrasenia = ? WHERE cedula = ?";
        $this -> sentencia = $this-> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("sssssi",
            $this -> nombre,
            $this -> primerApellido,
            $this -> segundoApellido,
            $this -> usuario,
            $this -> contrasenia,
            $this -> cedula
        );
    }
    
    //modificar datos
    sdjgfiufniurnfdsjkhdfbgjhdf
}