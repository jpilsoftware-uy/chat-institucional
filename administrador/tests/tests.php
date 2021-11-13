<?php
require '/home/administrador/chat-institucional/administrador/app/usuarioModelo.class.php';

class tests extends \PHPUnit\Framework\TestCase{

    public function testGuardarUsuario(){
        //registramos un alumno
        try{
            $u = new usuarioModelo();
            $u -> nombre = "ivan";
            $u -> primerApellido = "braida";
            $u -> segundoApellido = "fagundez";
            $u -> usuario = "holabobi";
            $u -> contrasenia = "holaA123";
            $u -> cedula = "12345678";
            $u -> estado = "pendiente";
            $u -> tipoDeUsuario = "Alumno";
            $u -> email = "pedro@gmail.com";
            $resultado = $u -> guardarUsuario();
            $this -> assertTrue($resultado);
        } catch (Exception $e){
            $this -> assertTrue(false, "No se pudo registrar");
        }
        
    }

    public function testActualizarDatos(){
        //actualizamos datos de alumno manteniendo su usuario
        try{
            $u = new usuarioModelo();
            $u -> nombre = "ivan";
            $u -> primerApellido = "braida";
            $u -> segundoApellido = "fagundez";
            $u -> usuario = "ivanbraida";
            $u -> contrasenia = "holaA123";
            $u -> cedula = "36792178";
            $resultado = $u -> actualizarUsuario("ivanbraida", "Alumno");
            $this -> assertTrue($resultado);
        } catch(Exception $e){
            $this -> assertTrue(false, "Hubo un error");
        }
    }

    public function testEliminarUsuario(){
        //eliminamos un alumno
        $u = new usuarioModelo();
        $u -> cedula = "12345678";
        $resultado = $u -> eliminarUsuario();
        $this -> assertTrue($resultado);
    }

    
}