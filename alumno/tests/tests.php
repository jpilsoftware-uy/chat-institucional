<?php
require '/home/administrador/chat-institucional/alumno/app/usuarioModelo.class.php';
require '/home/administrador/chat-institucional/alumno/app/consultaModelo.class.php';

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
            $u -> estado = "aprobado";
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
            $u -> usuario = "holabobi";
            $u -> contrasenia = "holaA123";
            $u -> cedula = "12345678";
            $resultado = $u -> actualizarUsuario("holabobi", "Alumno");
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

    public function testEnviarConsulta(){
        //enviamos una consulta a un profesor
        try{
            $c = new consultaModelo();
            $c -> mensajeConsulta = "Hola profesor";
            $c -> cedulaAlumno = "36792178";
            $c -> cedulaProfesor = "22222222";
            $c -> estadoConsulta ="enviado";
            $c -> usuarioAlumno = "ivanbraida";
            $resultado = $c -> guardarConsulta();
            $this -> assertTrue($resultado);
        } catch (Exception $e){
            $this -> assertTrue(false, "Hubo un error");
        }
    }

    public function testHistorialDeConsultasAlumno(){
        //listamos historial de consultas del usuario alumno
        try{
            $c = new consultaModelo();
            $c -> cedulaAlumno = "36792178";
            $resultado = $c -> listarTodasLasConsultas();
            $this -> assertIsArray($resultado);
        } catch (Exception $e){
            $this -> assertTrue(false, "Hubo un error");
        }
        
    }

    
}