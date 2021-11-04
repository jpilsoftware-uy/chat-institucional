<?php
require '../utils/autoloader.php';

class materiaModelo extends modelo{
    public $materia;
    public $idGrupoDeUsuario;
    public $cedula;
    public $nombre;
    public $primerApellido;
    public $tipoDeUsuario;


    public function guardarMateriaDeUsuario(){
        if(  ($this -> checkearQueSiExistaLaMateriaConEseGrupo($this -> idGrupoDeUsuario, $this-> materia) ) == true){
            return false;
        } else if( ($this -> checkearQueSiExistaLaMateriaConEseGrupo($this -> idGrupoDeUsuario, $this-> materia)  ) == false ){
            $this -> prepararInsercionDeMateriaDeUsuario();
            $this -> sentencia -> execute();
            return true;
        }
    }
  
    
    private function checkearQueSiExistaLaMateriaConEseGrupo($idGrupoDeUsuario,$materia){ 
        $sql = "SELECT materia FROM materiaDeUsuario WHERE idGrupoDeUsuario= ? && materia=?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("ss",$idGrupoDeUsuario,$materia);
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
        if (empty($resultado)){
            return false;
        } else{
            return true;
        }
    }

    private function prepararInsercionDeMateriaDeUsuario(){
        $sql = "INSERT INTO materiaDeUsuario (cedula,nombre,primerApellido,idGrupoDeUsuario,materia,tipoDeUsuario) VALUES (?,?,?,?,?,?)";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("isssss",
            $this -> cedula ,
            $this -> nombre,
            $this -> primerApellido,
            $this -> idGrupoDeUsuario,
            $this -> materia,
            $this -> tipoDeUsuario,
        );
    }




    
}

