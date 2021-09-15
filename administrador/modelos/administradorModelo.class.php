<?php

require '../utils/autoloader.php';
 

class administradorModelo extends Modelo{
    public $cedula
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











}