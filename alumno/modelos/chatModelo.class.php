<?php

require '../utils/autoloader.php';

class chatModelo extends Modelo{
    public $cedulaCreador ;
    public $idChatMensaje;  
    public $cedulaCreadorMensaje;
    public $mensajeEnviado;
    public $estadoDelChat;
    public $fecha;
    public $usuarioCreadorMensaje;
    public $materia;
    public $cedulaParticipante;
    public $grupo;



    public function guardarChat(){
        
        if(($this -> checkearQueNoExistaChat($this -> grupo, $this ->materia ))== false){
            $this -> prepararGuardarChat();
            $this -> sentencia -> execute();
            $this -> guardarParticipanteDelChat();
            return true;
        }else{
            return false;
        }
        
    }


    private function prepararGuardarChat(){
        $sql = "INSERT INTO chat (cedulaCreador, estadoDelChat,materia, grupo) VALUES (?, ?, ?, ?)";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("isss",
            $this -> cedulaCreador,
            $this -> estadoDelChat,
            $this -> materia,
            $this -> grupo,
        );
    }

    public function guardarParticipanteDelChat(){
        if($this -> checkearQueNoExistaElParticipante($this-> cedulaParticipante , $this -> grupo, $this -> materia) == false){
            $this -> prepararTraerIdChatYHacerlaVariableDeSession($this -> grupo, $this -> materia);
            $idChat = $_SESSION['idChat'];
            $this -> prepararGuardarParticipanteDelChat($idChat);
            $this -> sentencia -> execute();
            return true;
        }else{
            return false;
        }

    }
    private function prepararTraerIdChatYHacerlaVariableDeSession($grupo,$materia){
        $sql ="SELECT idChat FROM chat WHERE grupo=? && materia=?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("ss",$grupo,$materia); 
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
        $idChat = $resultado['idChat'];
        ob_start();
        $_SESSION['idChat'] = $idChat;
    } 
    


    private function prepararGuardarParticipanteDelChat($idChat){
        $sql ="INSERT INTO participantesDeChat (idChat,cedulaParticipante,materia,grupo) VALUES (?,?,?,?)";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("iiss",
        $idChat,
        $this -> cedulaParticipante,
        $this -> materia,
        $this -> grupo,
        );

    }

    private function checkearQueNoExistaElParticipante($cedulaParticipante,$materia,$grupo){
        $sql = "SELECT cedulaParticipante,materia,grupo from participantesDeChat  where cedulaParticipante=? && materia=? && grupo=?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("iss",$cedulaParticipante,$materia,$grupo);
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_assoc();

        if(empty($resultado)){
            return false;
        }else{
            return true;
        }

    }

    private function checkearQueNoExistaChat($grupo,$materia){
        $sql = "SELECT grupo,materia from chat where grupo=? and materia=?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("ss",$grupo,$materia);
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
        if($resultado['materia'] == $materia && $resultado['grupo'] == $grupo){
            return true;
        }else{
            return false;
        }

    }

    public function guardarMensaje(){
        $this -> prepararGuardarMensaje();
        $this -> sentencia -> execute();
    }

    private function prepararGuardarMensaje(){
        $sql = "INSERT INTO mensaje (idChatMensaje, cedulaCreadorMensaje, mensajeEnviado, usuarioCreadorMensaje) VALUES (?,?,?,?)";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("iiss",
            $this -> idChatMensaje,
            $this -> cedulaCreadorMensaje,
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