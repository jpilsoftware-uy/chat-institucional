<?php

require '../utils/autoloader.php';
 

class administradorModelo extends Modelo{
    public $id;
    public $usuario;
    public $contrasenia;
    public $nombre;
    public $primerApellido;
    public $segundoApellido;
    public $ci;


    public function autenticarAdministrador(){
        $this -> prepararAutenticacionAdministrador();
        $this -> sentencia -> execute();

        $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
       

        if($this -> sentencia -> error){
            
            throw new Exception ("Error al obtener el usuario: " . $this -> sentencia -> error);

        }

        if($resultado){
           
            $comparacion = $this -> compararPasswordsAdministrador($resultado['contraseniaAdministrador']);
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
        $sql= "SELECT idAdministrador,nombreAdministrador, primerApellidoAdministrador, segundoApellidoAdministrador, usuarioAdministrador, contraseniaAdministrador, cedulaAdministrador FROM administrador WHERE usuarioAdministrador= ? ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("s", $this -> usuario);
    }
  
    
    private function asignarDatosDeUsuarioAdministrador($resultado){
        $this -> id = $resultado['idAdministrador'];
        $this -> nombre = $resultado['nombreAdministrador'];
        $this -> primerApellido = $resultado['primerApellidoAdministrador'];
        $this -> segundoApellido = $resultado['segundoApellidoAdministrador'];
        $this -> usuario = $resultado['usuarioAdministrador'];
        $this -> contrasenia  = $resultado['contraseniaAdministrador'];
        $this -> ci = $resultado ['cedulaAdministrador'];
    }











}