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


    public function traerMateriaYGrupo(){
        $this -> prepararMateriaYgrupo();
        $this -> sentencia -> execute();
        $materias = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        if(empty($materias)){
            return false;
        }else{
            return $materias;    
        }
    }


    private function prepararMateriaYgrupo(){
        $sql="SELECT materia FROM materiaDeUsuario WHERE idGrupoDeUsuario=?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("s", $this -> idGrupo);
    }

    public function crearOrientacion(){
        if($this -> checkearOrientaciones($this -> tipoDeOrientacion)){
            return false;
        } else {
            $this -> prepararCrearOrientacion();
            $this -> sentencia -> execute();
            if($this -> sentencia -> error){
                return false;
            } else {
                return true;
            }
        }
    }

    
    private function checkearOrientaciones($tipoDeOrientacion){
        $sql = "SELECT tipoDeOrientacion FROM orientaciones WHERE tipoDeOrientacion = ?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("s", $tipoDeOrientacion);
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
        if($resultado['tipoDeOrientacion'] === $tipoDeOrientacion){
            return true;
        } else {
            return false;
        }
    }

    private function prepararCrearOrientacion(){
        $sql = "INSERT INTO orientaciones (tipoDeOrientacion, materia1, materia2, materia3, materia4, materia5, materia6, materia7, materia8, materia9, materia10, materia11, materia12, materia13) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("ssssssssssssss",
            $this -> tipoDeOrientacion,
            $this -> materia1,
            $this -> materia2,
            $this -> materia3,
            $this -> materia4,
            $this -> materia5,
            $this -> materia6,
            $this -> materia7,
            $this -> materia8,
            $this -> materia9,
            $this -> materia10,
            $this -> materia11,
            $this -> materia12,
            $this -> materia13
        );
    }

}