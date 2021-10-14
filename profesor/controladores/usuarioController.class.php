<?php

    require '../utils/autoloader.php';
    class usuarioController extends UsuarioModelo{
        
        
        public static function preAltaDeUsuario($cedula,$nombre, $primerApellido, $segundoApellido, $usuario, $contrasenia, $tipoDeUsuario){
           if($_SESSION['tipoDeUsuario'] == 'Administrador'){
               $estado = "aprobado";
           } else {
               $estado = "pendiente";
           }

            if($nombre !== "" && $primerApellido !== "" && $segundoApellido !== "" && $usuario !== "" && $contrasenia !== "" && $cedula !== "" && $tipoDeUsuario !== "" && $estado !== "" ){  
                try{
                    $u = new UsuarioModelo();
                    $u -> cedula = $cedula;
                    $u -> nombre = $nombre;
                    $u -> primerApellido = $primerApellido;
                    $u -> segundoApellido = $segundoApellido;
                    $u -> usuario = $usuario;
                    $u -> contrasenia = $contrasenia;
                    $u -> tipoDeUsuario =  $tipoDeUsuario;
                    $u -> estado = $estado;
                    $generarFormulario = $u -> guardarUsuario();
                    if ($generarFormulario == true){
                        return generarHtml('registro'. $tipoDeUsuario, ['exito' => true]);
                    } else if ($generarFormulario == false){
                        return generarHtml('registro' . $tipoDeUsuario, ['exito' => false]);
                    }
                }
                catch(Exception $e){

                    return generarHtml('registro' . $tipoDeUsuario , ['exito' => false]);
                    error_log($e -> getMessage());
                    return "No se pudo guardar ";
               }
            }else{
                return generarHtml('registro' .$tipoDeUsuario , ['exito' => false]);
            }
        }
    
        //iniciar sesion
        public static function iniciarSesion($usuario,$contrasenia,$tipoDeUsuario){
            try{
            
              $u = new usuarioModelo();
              $u -> usuario = $usuario;
              $u -> contrasenia = $contrasenia;
              $u -> tipoDeUsuario= $tipoDeUsuario;
              $u -> autenticar(); 
              self::crearSesion($u);

              header("Location: /principal" . $tipoDeUsuario);
            
            }
            catch(Exception $e){
                error_log("fallo login del usuario " . $usuario);
                generarHtml("login" .$tipoDeUsuario , ["falla" => true]);
            }
            
            
        }

        public static function MostrarLogin($tipoDeUsuario){
            session_start();
            if(isset($_SESSION['autenticado'])) header ("Location: /principal" .$tipoDeUsuario);
            else return cargarVista("login". $tipoDeUsuario);
        
        }
    
        public static function MostrarMenuPrincipal(){
            session_start();
            if(!isset($_SESSION['autenticado'])) header("Location : /inicio");
            else return cargarVista("menuPrincipal");
        }

        private static function crearSesion($usuario){
            session_start();
            ob_start(); 
            $_SESSION['nombre'] = $usuario -> nombre; 
            $_SESSION['primerApellido'] = $usuario -> primerApellido;
            $_SESSION['segundoApellido'] = $usuario -> segundoApellido;
            $_SESSION['usuario'] = $usuario -> usuario;
            $_SESSION['cedula'] = $usuario -> cedula;
            $_SESSION['grupo'] = $usuario -> grupo;
            $_SESSION['tipoDeUsuario'] = $usuario -> tipoDeUsuario;
            $_SESSION['estado'] = $usuario -> estado;
            $_SESSION['autenticado'] = true; 
        }
        //iniciar sesion

        //modificar datos de usuario
        public static function preModificarDatosDeUsuario($cedula, $nombre, $primerApellido, $segundoApellido, $usuario, $contrasenia){
            if($cedula !== "" && $nombre !== "" && $primerApellido !== "" && $segundoApellido !== "" && $usuario !== "" && $contrasenia !== ""){
                try{
                    if($_SESSION['tipoDeUsuario'] == "Alumno" || $_SESSION['tipoDeUsuario'] == "Profesor"){
                        if($_SESSION['cedula'] == $cedula){
                            $u = new UsuarioModelo();
                            $u -> cedula = $cedula;
                            $u -> nombre = $nombre;
                            $u -> primerApellido = $primerApellido;
                            $u -> segundoApellido = $segundoApellido;
                            $u -> usuario = $usuario;
                            $u -> contrasenia = $contrasenia;
                            $resultado = $u -> actualizarUsuario();
                            if($resultado == true){
                                self::cerrarSesion();
                            } else {
                                return generarHtml("actualizarUsuario", ['exito' => false]);
                            }
                        } else {
                            return generarHtml("actualizarUsuario", ['exito' => false]);
                        }
                    } else if ($_SESSION['tipoDeUsuario'] == "Administrador") {
                        $u = new UsuarioModelo();
                        $u -> cedula = $cedula;
                        $u -> nombre = $nombre;
                        $u -> primerApellido = $primerApellido;
                        $u -> segundoApellido = $segundoApellido;
                        $u -> usuario = $usuario;
                        $u -> contrasenia = $contrasenia;
                        $u -> actualizarUsuario();
                        if($u -> actualizarUsuario() == true){
                            return generarHtml("actualizarUsuario", ['exito' => true]);
                        } else {
                            return generarHtml("actualizarUsuario", ['exito' => false]);
                        }
                    }
                }
                catch(Exception $e){
                    error_log();
                    return generarHtml("actualizarUsuario", ['exito' => false]);
                }
            } else {
                return generarHtml('actualizarUsuario', ['exito' => false]);
            }
        }


        //listar profesores

        public static function mostrarProfesoresAprobados(){
            $p = new UsuarioModelo();
            $profesoresAprobados = $p -> listarProfesoresAprobados();
            return $profesoresAprobados;
        }

        //eliminar usuario

        public static function preEliminarUsuarios($cedula){
            if($cedula !== ""){
                try{
                    if($_SESSION['tipoDeUsuario'] == "Alumno" || $_SESSION['tipoDeUsuario'] == "Profesor"){
                        if($_SESSION['cedula'] == $cedula){
                            $u = new UsuarioModelo();
                            $u -> cedula = $cedula;
                            $resultado = $u -> eliminarUsuario();
                            if($resultado == true){
                                self::cerrarSesion();
                            } else {
                                return generarHtml("eliminarUsuarios", ['exito' => false]);
                            }
                        } else {
                            return generarHtml("eliminarUsuarios", ['exito' => false]);
                        }
                    } else if ($_SESSION['tipoDeUsuario'] == "Administrador"){
                        $u = new UsuarioModelo();
                        $u -> cedula = $cedula;
                        $resultado = $u -> eliminarUsuario();
                        if($resultado == true){
                            return generarHtml("eliminarUsuarios", ['exito' => true]);
                        } else {
                            return generarHtml("eliminarUsuarios", ['exito' => false]);
                        }
                    }
                } catch(Exception $e){
                    error_log();
                    generarHtml("eliminarUsuarios", ['exito' => false]);
                }
            }
        }

        //cerrar sesion
        
        public static function cerrarSesion(){
            session_destroy();
            return header("Location: /");
        }
}