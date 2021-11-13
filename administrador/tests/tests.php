<?php
require '/home/administrador/chat-institucional/administrador/app/administradorModelo.class.php';

class tests extends \PHPUnit\Framework\TestCase{

    public function testListarUsuariosPendientes(){
        //listamos usuarios pendientes
        try{
            $a = new administradorModelo();
            $resultado = $a -> listarUsuariosPendientes();
            $this -> assertIsArray($resultado);
        } catch (Exception $e){
            $this -> assertFalse($resultado);
        }
        
    }

    public function testListarUsuariosAprobados(){
        try{
            $a = new administradorModelo();
            $resultado = $a -> listarUsuariosAprobados();
            $this -> assertIsArray($resultado); 
        } catch (Exception $e) {
            $this -> assertTrue(false);
        }
    }

    public function testGuardarEstadoUsuarios(){
        try{
            $a = new administradorModelo();
            $a -> cedula = "36792178";
            $resultado = $a -> guardarEstadoUsuarios();
            $this -> assertTrue($resultado);
        } catch (Exception $e){
            $this -> assertTrue(false, "Hubo un error");
        }
    }

    
}   