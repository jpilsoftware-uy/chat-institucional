<?php

require '../utils/autoloader.php';

class orientacionesModelo extends modelo{
    public $tipoDeOrientacion;
    public $materia1;
    public $materia2;
    public $materia3;
    public $materia4;
    public $materia5;
    public $materia6;
    public $materia7;
    public $materia8;
    public $materia9;
    public $materia10;
    public $materia11;
    public $materia12;
    public $materia13;


    public function traerOrientacion(){
        $this -> prepararOrientacion();
        $this -> sentencia -> execute();
        $orientacion = $this -> sentencia -> get_result() -> fetch_assoc();

        if(empty($orientacion)){
            
            return false;
        }else{
           
           $materias = self::traerMateria($orientacion);
           
            return $materias;
        }
    }   


    private function prepararOrientacion(){
        $sql ="SELECT tipoDeOrientacion FROM grupo where idGrupo= ? ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("s", $this -> idGrupo);
    }


    private function prepararMateria($tipoDeOrientacion){
        
        
        $sql ="SELECT * FROM orientaciones where tipoDeOrientacion= ? ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("s", $tipoDeOrientacion);
        
        
    }



    public function traerMateria($orientacion){
        $tipoDeOrientacion = $orientacion['tipoDeOrientacion'];
        $this -> prepararMateria($tipoDeOrientacion);
        $this -> sentencia -> execute();
        $materias = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);

        if(empty($materias)){
            
            return false;
            
        }else{
            
            return $materias;    
        }
    }
    

}