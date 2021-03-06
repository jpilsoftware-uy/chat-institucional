<?php

require '../utils/autoloader.php';

class consultaModelo extends modelo{
    public $idConsulta;
    public $mensajeConsulta; 
    public $mensajeRespuesta; 
    public $cedulaAlumno;
    public $cedulaProfesor;
    public $estadoConsulta;
    public $usuarioAlumno;  
    public $usuarioProfesor;


    private function prepararInsercionDeConsulta(){   
            $sql = "INSERT into consulta (mensajeConsulta, mensajeRespuesta, cedulaAlumno, cedulaProfesor, estadoConsulta, usuarioAlumno, usuarioProfesor) VALUES (?,?,?,?,?,?,?)";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("ssiisss",
                $this -> mensajeConsulta,
                $this -> mensajeRespuesta,
                $this -> cedulaAlumno,
                $this -> cedulaProfesor,
                $this -> estadoConsulta,
                $this -> usuarioAlumno, 
                $this -> usuarioProfesor,
                ); 
    }


    private function prepararListadoDeConsultas(){
        $sql = "SELECT idConsulta, mensajeConsulta, mensajeRespuesta, cedulaAlumno, cedulaProfesor, estadoConsulta, usuarioAlumno FROM consulta WHERE cedulaProfesor= ? && estadoConsulta='enviado'" ;
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i",  $this -> cedula);
    }


    public function listarConsultas(){
        $this -> prepararListadoDeConsultas();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        if(empty($resultado)){
            return false;
        } else {
            return $resultado;
        }
    }
   

    public function guardarConsulta(){
        $this -> prepararInsercionDeConsulta(); 
        $this -> sentencia -> execute();
        if($this -> sentencia -> error){
            return false;
        } else {
            return true;
        }   
    }

    
    public function guardarRespuesta(){
        $this -> prepararInsercionDeRespuesta(); 
        $this -> sentencia -> execute();
        if($this -> sentencia -> error){
            return false;
        } else {
            return true;
        }
    }


    private function prepararInsercionDeRespuesta(){
        $sql = "UPDATE consulta SET mensajeRespuesta= ?, usuarioProfesor= ?, estadoConsulta='respondido' WHERE idConsulta= ? ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("ssi",
            $this -> mensajeRespuesta,
            $this -> usuarioProfesor,
            $this -> idConsulta,
            ); 
    }


    private function prepararListadoDeRespuesta(){    
        $sql = "SELECT idConsulta, mensajeConsulta, mensajeRespuesta, cedulaAlumno, cedulaProfesor, estadoConsulta, usuarioAlumno, usuarioProfesor FROM consulta WHERE cedulaAlumno= ? && estadoConsulta='respondido'" ;
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i", $this -> cedula);
    }


    public function listarRespuesta(){
        $this -> prepararListadoDeRespuesta();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        if(empty($resultado)){
            return false;
        } else {
            return $resultado;
        }   
    }


    public function guardarEstado(){
        $this -> prepararInsercionDeEstado(); 
        $this -> sentencia -> execute();
    }


    private function prepararInsercionDeEstado(){
        $sql = "UPDATE consulta SET estadoConsulta='visto' WHERE cedulaAlumno= ? && estadoConsulta='respondido'";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i",
            $this -> cedula,
        ); 

    }


    public function historialDeConsultasAlumno(){
        $this -> prepararHistorialDeConsultasAlumno();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        if(empty($resultado)){
            return false;
        } else {
            return $resultado;
        }
    }


    private function prepararHistorialDeConsultasAlumno(){
        $sql = "SELECT mensajeConsulta, mensajeRespuesta, usuarioProfesor, usuarioAlumno FROM consulta WHERE cedulaAlumno= ? && estadoConsulta = 'visto'";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i", $this -> cedulaAlumno);
    }


    public function historialDeConsultasProfesor(){
        $this -> prepararHistorialDeConsultasProfesor();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        if(empty($resultado)){
            return false;
        } else {
            return $resultado;
        }
    }


    private function prepararHistorialDeConsultasProfesor(){
        $sql = "SELECT mensajeConsulta, mensajeRespuesta, usuarioAlumno FROM consulta WHERE cedulaProfesor = ? && estadoConsulta = 'respondido' OR estadoConsulta = 'visto'";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i", $this -> cedulaProfesor);
    }


    public function listarTodasLasConsultas(){
        $this -> prepararListarTodasLasConsultas();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        if(empty($resultado)){
            return false;
        } else {
            return $resultado;
        }
    }

    private function prepararListarTodasLasConsultas(){
        $sql = "SELECT mensajeConsulta, mensajeRespuesta, usuarioAlumno, usuarioProfesor FROM consulta";
        $this -> sentencia = $this -> conexion -> prepare($sql);
    }
    

}