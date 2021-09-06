<?php
    require '../utils/autoloader.php';

    class administradorController extends administradorModelo {
        public static function iniciarSesion($usuario,$contrasenia){
            try{
              $u = new administradorModelo();
              $u -> usuario = $usuario;
              $u -> contrasenia = $contrasenia;
              $u -> autenticarAdministrador(); 
              self::crearSesionAdministrador($u);

              header("Location: /principalAdministrador");
            
            }
            catch(Exception $e){
                error_log("fallo login del usuario " . $usuario);
                generarHtml("loginAdministrador", ["falla" => true]);
            }  
        }
        

        public static function MostrarLoginAdministrador(){
            session_start();
            if(isset($_SESSION['autenticado'])) header ("Location: /principalAdministrador");
            else return cargarVista("loginAdministrador");
        }

        public static function MostrarMenuPrincipalAdministrador(){
            session_start();
           if(!isset($_SESSION['autenticado'])) header("Location : /inicioAdministrador");
           else return cargarVista("menuPrincipalAdministrador");

       }
       
       private static function crearSesionAdministrador($usuario){
        session_start();
        ob_start(); 
        $_SESSION['AdministradorNombre'] = $usuario -> nombre; 
        $_SESSION['AdministradorPrimerApellido'] = $usuario -> primerApellido;
        $_SESSION['AdministradorSegundoApellido'] = $usuario -> segundoApellido;
        $_SESSION['AdministradorUsuario'] = $usuario -> usuario;
        $_SESSION['AdministradorCi'] = $usuario -> ci;
        $_SESSION['autenticado'] = true; 
    }




    }