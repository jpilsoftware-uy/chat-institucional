<?php

require '../utils/autoloader.php';

class chatModelo extends Modelo{
    public $ciCreador;
    public $idChatMensaje;  
    public $ciCreadorMensaje;
    public $mensajeEnviado;
    public $estadoDelChat;
    public $fecha;
    public $usuarioCreadorMensaje;


    public function guardarChat(){
        $this -> prepararGuardarChat();
        $this -> sentencia -> execute();
    }


    private function prepararGuardarChat(){
        $sql = "INSERT INTO chat (ciCreador, estadoDelChat) VALUES (?, ?)";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("is",
            $this -> ciCreador,
            $this -> estadoDelChat
        );
    }
    public function guardarMensaje(){
        $this -> prepararGuardarMensaje();
        $this -> sentencia -> execute();
    }

    private function prepararGuardarMensaje(){
        $sql = "INSERT INTO mensaje (idChatMensaje, ciCreadorMensaje, mensajeEnviado, usuarioCreadorMensaje) VALUES (?,?,?,?)";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("iiss",
            $this -> idChatMensaje,
            $this -> ciCreadorMensaje,
            $this -> mensajeEnviado,
            $this -> usuarioCreadorMensaje
        );
    }

    public function mostrarMensaje(){
        $this -> prepararMensaje();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        return $resultado;
        var_dump($resultado);
    
    }

    private function prepararMensaje(){
        $sql = "SELECT * FROM mensaje WHERE idChatMensaje= $_SESSION[idChat]";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        
    }

    public function listadoDeChats(){
        $this -> prepararListadoDeChats();
        $this -> sentencia -> execute(); 
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        return $resultado;
        
    }

    private function prepararListadoDeChats(){
        $sql = "SELECT idChat FROM chat WHERE estadoDelChat= 'abierto' ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        
    }




}