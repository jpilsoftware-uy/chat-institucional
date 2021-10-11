<?php
require '../utils/autoloader.php';

class grupoModelo extends Modelo{
    public $idGrupo;
    public $tipoDeOrientacion;

    public function guardarGrupo(){
       

        $this -> prepararInsercionDeGrupo();
        $this -> sentencia -> execute();
        
        
        if($this -> sentencia -> error){
            throw new Exception("No se pudo ingresar el Grupo" . $this -> sentencia -> error);
        }
        

    }



    private function prepararInsercionDeGrupo(){
        $sql = "INSERT INTO grupo (idGrupo,tipoDeOrientacion) VALUES (?,?)";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("ss",
        $this -> idGrupo,
        $this -> tipoDeOrientacion
        );


    }

    




}
