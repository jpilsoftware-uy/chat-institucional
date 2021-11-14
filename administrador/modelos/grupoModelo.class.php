<?php
require '../utils/autoloader.php';

class grupoModelo extends modelo{
    public $idGrupo;
    public $tipoDeOrientacion;
    public $cedula;
    public $idGrupoDeUsuario;
    public $nombre;
    public $primerApellido;
    public $tipoDeUsuario;



    public function guardarGrupo(){
        if($this -> checkearSiExisteGrupo($this -> idGrupo) == false){
            $this -> prepararInsercionDeGrupo();
            $this -> sentencia -> execute();
            return true;
        } else {
            return false;
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


    private function checkearSiExisteGrupo($grupo){
        $sql = "SELECT idGrupo FROM grupo WHERE idgrupo = ?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("s", $grupo);
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
        if(empty($resultado)){
            return false;
        } else {
            return true;
        }
    }


    public function traerGrupoDeUsuario(){
        $this -> prepararGrupoDeUsuario();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        if(empty($resultado)){
            return false;
        } else {
            return $resultado;
        }
    }


    private function prepararGrupoDeUsuario(){
        $sql ="SELECT idGrupoDeUsuario FROM grupoDeUsuario where cedula= ? ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i", $this -> cedula);
    }


    public function guardarGrupoDeUsuario(){
        if( ($this -> checkearQueNoExistaEnEseGrupo($this -> cedula, $this-> idGrupoDeUsuario)) == true){
            return false;
        } else if( ($this -> checkearQueNoExistaEnEseGrupo($this -> cedula, $this-> idGrupoDeUsuario)  ) == false ){
            $this -> prepararInsercionDeGrupoDeUsuario();
            $this -> sentencia -> execute();
            return true;
        }
    }


    private function checkearQueNoExistaEnEseGrupo($cedula,$idGrupoDeUsuario){ 
        $sql = "SELECT idGrupoDeUsuario FROM grupoDeUsuario WHERE cedula= ? && idGrupoDeUsuario=?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("is",$cedula,$idGrupoDeUsuario);
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
        if (empty($resultado)){
            return false;
        } else{
            return true;
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
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }


    private function TraerGrupo(){
        $sql ="SELECT * FROM grupoDeUsuario where cedula=?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i", $this -> cedula);
    }


    public function prepararGrupoParaElegir(){
        $this -> TraerGrupoParaElegir();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }


    private function TraerGrupoParaElegir(){
        $sql ="SELECT * FROM grupo";
        $this -> sentencia = $this -> conexion -> prepare($sql);
    }

    public function preBorrarGrupo($idGrupo){
        $this -> borrarGrupo($idGrupo);
        $this -> sentencia -> execute();
    }
    private function borrarGrupo($idGrupo){  
        $sql ="DELETE FROM grupo WHERE idGrupo=?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("s",$idGrupo);
    }

   


   
}
