<?php
    require '../utils/autoloader.php';

    class administradorController extends administradorModelo {


       
        public static function mostrarUsuariosPendientes(){
            $a = new administradorModelo();
            $usuariosPendientes = $a -> listarUsuariosPendientes();
            return $usuariosPendientes;
        }

        public static function actualizarEstadoUsuarios($cedula){
            $a = new administradorModelo();
            $a -> cedula = $cedula;
            $a -> guardarEstadoUsuarios();
            
            return header('Location: /usuarios-pendientes');
        }
        
        
        public static function mostrarUsuariosAprobados(){
            $a = new administradorModelo();
            $usuariosAprobados = $a -> listarUsuariosAprobados();
            return $usuariosAprobados;
        }

        public static function eliminarUsuarios($cedula){
            $u = new administradorModelo();
            $u -> cedula = $cedula;
            $u -> eliminarUsuario();
            return header('Location: /usuarios-pendientes');
        }
        
}