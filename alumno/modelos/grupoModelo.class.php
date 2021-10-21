<?php
require '../utils/autoloader.php';

class grupoModelo extends Modelo{
    public $idGrupo;
    public $tipoDeOrientacion;
    public $cedula;
    public $idGrupoDeUsuario;
    public $nombre;
    public $primerApellido;
    public $tipoDeUsuario;

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

    


    public function prepararGrupoDeUsuario(){
        $this -> TraerGrupoDeUsuario();
        $this -> sentencia -> execute();
    }

    private function TraerGrupoDeUsuario(){
        $sql ="SELECT * FROM grupoDeUsuario  where cedula= ? ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i", $this -> cedula);
    }


    public function guardarGrupoDeUsuario(){
        $this -> prepararInsercionDeGrupoDeUsuario();
        $this -> sentencia -> execute();
        
        
        if($this -> sentencia -> error){
            throw new Exception("No se pudo ingresar el Grupo" . $this -> sentencia -> error);
        }
    }

    private function prepararInsercionDeGrupoDeUsuario(){
        $sql = "INSERT INTO grupoDeUsuario (cedula,nombre,primerApellido,idGrupoDeUsuario,tipoDeUsuario) VALUES (?,?,?,?,?)";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("issss",
        $this -> cedula ,
        $this -> nombre,
        $this -> primerApellido,
        $this -> idGrupoDeUsuario,
        $this -> tipoDeUsuario,
        );
    }
    public function prepararGrupo(){
        $this -> TraerGrupo();
        $this -> sentencia -> execute();
    }
    private function TraerGrupo(){
        $sql ="SELECT * FROM grupo";
        $this -> sentencia = $this -> conexion -> prepare($sql);
    }


}
