<?php
    require '../utils/autoloader.php';

    class administradorController extends administradorModelo {


        public static function mostrarUsuariosPendientes(){
            $a = new administradorModelo();
            $usuariosPendientes = $a -> listarUsuariosPendientes();
            if($usuariosPendientes == false){
                return false;
            } else {
                return $usuariosPendientes;
            }
        }

        public static function actualizarEstadoUsuarios($cedula){
            $a = new administradorModelo();
            $a -> cedula = $cedula;
            $resultado = $a -> guardarEstadoUsuarios();
            if($resultado == false){
                return "Error grave en el sistema";
            } else {
                return header('Location: /usuarios-pendientes');
            }
        }
        
        
        public static function mostrarUsuariosAprobados(){
            $a = new administradorModelo();
            $usuariosAprobados = $a -> listarUsuariosAprobados();
            if($usuariosAprobados == false){
                return false;
            } else {
                return $usuariosAprobados;
            }
        }

        public static function eliminarUsuarios($cedula){
            $u = new administradorModelo();
            $u -> cedula = $cedula;
            $resultado = $u -> eliminarUsuario();
            if($resultado){
                return header('Location: /usuarios-pendientes');
            } else {
                return "Error grave en el sistema";
            }            
        } 
}