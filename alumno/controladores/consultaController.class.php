<?php  
    require '../utils/autoloader.php';

    class consultaController {
        public static function preAltaDeConsulta($mensajeConsulta, $cedulaProfesor){
            if( $mensajeConsulta != "" && $cedulaProfesor != "" ){
                try{
                    $p = new ConsultaModelo();
                    $p -> mensajeConsulta = $mensajeConsulta;
                    $p -> cedulaAlumno = $_SESSION['cedula'];
                    $p -> cedulaProfesor = $cedulaProfesor;
                    $p -> estadoConsulta ="enviado";
                    $p -> usuarioAlumno = $_SESSION['usuario'];
                    $p -> guardarConsulta();
                    return generarHtml('consultaAlumno', ['exito' => true], "Consulta enviada exitosamente");
                }
                catch(Exception $e){
                    error_log($e -> getMessage());
                    return "No se pudo guardar la consulta";
                }
            }else{
                return generarHtml('consultaAlumno',  ['exito' => false], "El campo mensaje se encuentra vacio");
            }
        }


        public static function mostrarConsultas(){
            try{
                $a = new ConsultaModelo();
                $a -> cedula = $_SESSION['cedula'];
                $consultasEnviadas = $a -> listarConsultas();
                return $consultasEnviadas;
            }
            catch(Exception $e){
                error_log($e -> getMessage());
                return "error";
            }    
        }


        public static function insertarRespuesta( $mensajeRespuesta, $idConsulta ){
           
            if( $mensajeRespuesta != "" &&  $idConsulta !=""){
                try{
                    $p = new ConsultaModelo();
                    $p -> idConsulta= $idConsulta;
                    $p -> mensajeRespuesta = $mensajeRespuesta;
                    $p -> usuarioProfesor = $_SESSION['usuario'];
                    $p -> guardarRespuesta();
                    return generarHtml('responderConsultas', ['exito' => true], "Respuesta enviada exitosamente");
                }
                catch(Exception $e){
                    error_log($e -> getMessage());
                    return "No se pudo guardar la respeusta";
                }
            }else{
                return generarHtml('responderConsultas',  ['exito' => false] , "El mensaje de respuesta no se pudo enviar"); 
            }
        }

        public static function mostrarRespuesta(){
            try{
                $a = new ConsultaModelo();
                $a -> cedula = $_SESSION['cedula'];
                $respuestasEnviadas = $a -> listarRespuesta();
                return $respuestasEnviadas;
            } 
            catch(Exception $e){
                error_log($e -> getMessage());
                return "error";
            }
        }


        public  static function cambiarEstadoAVisto(){
            try{
                $v = new ConsultaModelo();
                $v -> cedula = $_SESSION['cedula'];
                $v -> guardarEstado();
            }
            catch(Exception $e){
                error_log($e -> getMessage());
                return "error";
            }
        }

        public static function preHistorialDeConsultas(){
            try{
                $c = new ConsultaModelo();
                $c -> cedula = $_SESSION['cedula'];
                $resultado = $c ->  historialDeConsultas();
                return $resultado;
            }
            catch(Exception $e){
                error_log($e -> getMessage());
                return generarHtml('historialConsultas', ['exito' => false], "No se pudo listar las consultas");
            }
        }
    }