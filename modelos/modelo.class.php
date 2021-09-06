<?php
    require '../utils/autoloader.php';
    
    
    class Modelo{
        protected $ipDb;
        protected $usuarioDb;
        protected $contraseniaDb;
        protected $puertoDb;
        protected $nombreDb;
        protected $conexion;
        protected $sentencia;

        public function __construct(){
            $this -> parametrosDeConexion();
            $this -> conexion = new mysqli(
                $this -> ipDb,
                $this -> usuarioDb,
                $this -> contraseniaDb,
                $this -> nombreDb,
                $this -> puertoDb
            );

            if( $this -> conexion -> connect_error){
                throw new Exception ("Lo sentimos, no se pudo conectar");
            }
        }
        
        protected function parametrosDeConexion(){
            $this -> ipDb = IP_DB;
            $this -> usuarioDb = USUARIO_DB;
            $this -> contraseniaDb = PASSWORD_DB;
            $this -> puertoDb = PUERTO_DB;
            $this -> nombreDb = NOMBRE_DB;
        }

        protected function hashearContrasenia($contrasenia){
            return password_hash($contrasenia, PASSWORD_DEFAULT);
        }
    }