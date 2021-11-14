<?php  
    require '../utils/autoloader.php';

    class consultaController {
        public static function preAltaDeConsulta($mensajeConsulta, $cedulaProfesor){
            if($mensajeConsulta == ""){
                return generarHtml("consultaAlumno", ['exito' => false], "El campo mensaje esta vacio");
            } else if($cedulaProfesor == ""){
                return generarHtml("consultaAlumno", ['exito' => false], "No se selecciono ningun profesor");
            } else {
                try{
                    $p = new consultaModelo();
                    $p -> mensajeConsulta = $mensajeConsulta;
                    $p -> cedulaAlumno = $_SESSION['cedula'];
                    $p -> cedulaProfesor = $cedulaProfesor;
                    $p -> estadoConsulta ="enviado";
                    $p -> usuarioAlumno = $_SESSION['usuario'];
                    $resultado = $p -> guardarConsulta();
                    if($resultado == true){
                        return generarHtml('consultaAlumno', ['exito' => true], "Consulta enviada exitosamente");
                    } else {
                        return generarHtml('consultaAlumno', ['exito' => false], "No se pudo guardar la consulta");
                    }
                }
                catch(Exception $e){
                    error_log($e -> getMessage());
                    return generarHtml('consultaAlumno', ['exito' => false], "No se pudo guardar la consulta");
                }
            }
        }


        public static function mostrarConsultas(){
            try{
                $a = new consultaModelo();
                $a -> cedula = $_SESSION['cedula'];
                $consultasEnviadas = $a -> listarConsultas();
                if($consultasEnviadas == false){
                    return false;
                } else if (!empty($consultasEnviadas)){
                    return $consultasEnviadas;
                }
            }
            catch(Exception $e){
                error_log($e -> getMessage());
                return "Error grave en el sistema";
            }    
        }


        public static function insertarRespuesta( $mensajeRespuesta, $idConsulta ){
           
            if( $mensajeRespuesta != "" &&  $idConsulta !=""){
                try{
                    $p = new consultaModelo();
                    $p -> idConsulta= $idConsulta;
                    $p -> mensajeRespuesta = $mensajeRespuesta;
                    $p -> usuarioProfesor = $_SESSION['usuario'];
                    $resultado = $p -> guardarRespuesta();
                    if($resultado){
                        return generarHtml('responderConsultas', ['exito' => true], "Respuesta enviada exitosamente");
                    } else {
                        return generarHtml('responderConsultas', ['exito' => false], "Respuesta enviada exitosamente");
                    }
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
                $a = new consultaModelo();
                $a -> cedula = $_SESSION['cedula'];
                $respuestasEnviadas = $a -> listarRespuesta();
                if($respuestasEnviadas == false){
                    return false;
                } else {
                    return $respuestasEnviadas;
                }
            } 
            catch(Exception $e){
                error_log($e -> getMessage());
                return "error";
            }
        }


        public  static function cambiarEstadoAVisto(){
            try{
                $v = new consultaModelo();
                $v -> cedula = $_SESSION['cedula'];
                $v -> guardarEstado();
            }
            catch(Exception $e){
                error_log($e -> getMessage());
                return "error";
            }
        }


        public static function preHistorialDeConsultasAlumno(){
            try{
                $c = new consultaModelo();
                $c -> cedulaAlumno = $_SESSION['cedula'];
                $resultado = $c ->  historialDeConsultasAlumno();
                if($resultado == false){
                    return false;
                } else {
                    return $resultado;
                }
            }
            catch(Exception $e){
                error_log($e -> getMessage());
                return generarHtml('historialConsultas', ['exito' => false], "No se pudo listar las consultas");
            }
        }


        public static function preHistorialDeConsultasProfesor(){
            try{
                $c = new consultaModelo();
                $c -> cedulaProfesor = $_SESSION['cedula'];
                $resultado = $c -> historialDeConsultasProfesor();
                if($resultado == false){
                    return false;
                } else {
                    return $resultado;
                }
            } 
            catch(Exception $e){
                error_log($e -> getMessage());
                return generarHtml('historialConsultas', ['exito' => false], "No se pudo listar las consultas");
            }
        }


        public static function preListarTodasLasConsultas(){
            try{
                $c = new consultaModelo();
                $resultado = $c -> listarTodasLasConsultas();
                if($resultado == false){
                    return false;
                } else {
                    return $resultado;
                }
            }
            catch(Exception $e){
                error_log($e -> getMessage());
                return generarHtml('agendaConsultas', ['exito' => false], "No se pudo listar las consultas");      
            }
        }

        
    }