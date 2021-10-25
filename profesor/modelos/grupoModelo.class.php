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

    


    public function TraerGrupoDeUsuario(){
        $this -> prepararGrupoDeUsuario();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }

    private function prepararGrupoDeUsuario(){
        
        $sql ="SELECT idGrupoDeUsuario FROM grupoDeUsuario  where cedula= ? ";
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
       
        
        
        if($this -> sentencia -> error){
            throw new Exception("No se pudo ingresar el Grupo" . $this -> sentencia -> error);
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

    public function traerGrupoParaElegir(){
        $this -> prepararGrupoParaElegir();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }
    private function prepararGrupoParaElegir(){
        $sql ="SELECT * FROM grupo";
        $this -> sentencia = $this -> conexion -> prepare($sql);
    }
}
