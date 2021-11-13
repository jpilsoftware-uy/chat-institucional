<?php
require '/home/administrador/chat-institucional/profesor/app/consultaModelo.class.php';

class tests extends \PHPUnit\Framework\TestCase{

    public function testListarConsultasSinResponder(){
        //listamos consultas sin responder
        try{
            $c = new consultaModelo();
            $c -> cedulaProfesor = "22222222";
            $resultado = $c -> listarConsultas();
            $this -> assertIsArray($resultado);
        } catch (Exception $e){
            $this -> assertFalse($resultado);
        }
    }

    public function testEnviarRespuesta(){
        //profesor envia respuesta a un alumno
        try{
            $c = new consultaModelo();
            $c -> mensajeRespuesta = "hola alumno";
            $c -> usuarioProfesor = "elofagundez";
            $c -> idConsulta = "1";
            $resultado = $c -> guardarRespuesta();
            $this -> assertTrue($resultado);
        } catch (Exception $e){
            $this -> assertFalse($resultado);
        }
    }
}