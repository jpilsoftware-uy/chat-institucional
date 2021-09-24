<?php

require '../utils/autoloader.php';

class chatModelo extends Modelo{
    public $ciCreador;
    public $materia ;
    public $grupo;
    public $idChatMensaje;  
    public $ciCreadorMensaje;
    public $mensajeEnviado;
    public $fecha;




    private function guardarChat(){
        $sql = "Insert into chat (idChat, ciCreador ,materia ,grupo,estadoDelChat ) values (?,?,?,?,?)";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("iisss",
            $this -> idChat,
            $this -> ciCreador,
            $this -> materia,
            $this -> grupo,
            $this -> estadoDelChat,
            );
    }
    
    private function guardarMensaje(){
        $sql = "Insert into mensaje (idChatMensaje,ciCreadorMensaje,mensajeEnviado ) values (?,?,?)";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("iis",
            $this -> idChatMensaje,
            $this -> ciCreadorMensaje,
            $this -> mensajeEnviado,
            );
    }






    public function mostrarMensaje(){
        $this -> prepararMensaje();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }
  



  private function prepararMensaje(){
        $sql = "SELECT * FROM mensaje Where idChat= ? ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i", $id_chat);
        $this -> sentencia -> execute();
    }





}