<?php

require '../utils/autoloader.php';

class consultaModelo extends Modelo{
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
        $sql = "SELECT idConsulta, mensajeConsulta, mensajeRespuesta, cedulaAlumno, cedulaProfesor, estadoConsulta FROM consulta WHERE cedulaProfesor= ? && estadoConsulta='enviado'" ;
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i",  $this -> cedula);
        $this -> sentencia -> execute();
    }


    public function listarConsultas(){
        $this -> prepararListadoDeConsultas();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);   
        return $resultado;
    }
   

    public function guardarConsulta(){
        $this -> prepararInsercionDeConsulta(); 
        $this -> sentencia -> execute();   
         
    }

    
    public function guardarRespuesta(){
        $this -> prepararInsercionDeRespuesta(); 
        $this -> sentencia -> execute();   
         
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
        return $resultado;
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


    public function historialDeConsultas(){
        $this -> prepararHistorialDeConsultas();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }


    private function prepararHistorialDeConsultas(){
        $sql = "SELECT mensajeConsulta, mensajeRespuesta, usuarioProfesor FROM consulta WHERE cedulaAlumno= ? && estadoConsulta = 'visto'";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i",
            $this -> cedula
        );
    }

}