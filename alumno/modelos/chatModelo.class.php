<?php

require '../utils/autoloader.php';

class chatModelo extends modelo{
    public $cedulaCreador ;
    public $idChat;  
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
            $this -> guardarParticipanteCreadorDelChat();
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

    public function guardarParticipanteCreadorDelChat(){
        if($this -> checkearQueNoExistaElParticipante($this-> cedulaParticipante , $this -> grupo, $this -> materia) == false){
            $this -> prepararTraerIdChatYHacerlaVariableDeSession($this -> grupo, $this -> materia);
            $idChat = $_SESSION['idChat'];
            $this -> prepararGuardarParticipanteCreadorDelChat($idChat);
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
    


    private function prepararGuardarParticipanteCreadorDelChat($idChat){
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
        $sql = "SELECT grupo,materia from chat where grupo=? and materia=? && estadoDelChat ='abierto'";
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
        if($this -> checkearSiElChatEstaAbierto($this -> idChat) == false ){
        $this -> prepararGuardarMensaje();
        $this -> sentencia -> execute();
        return true;
        }else{
            return false;
        }
        
    }

    private function prepararGuardarMensaje(){
        $sql = "INSERT INTO mensaje (idChatMensaje, cedulaCreadorMensaje, mensajeEnviado, usuarioCreadorMensaje) VALUES (?,?,?,?)";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("iiss",
            $this -> idChat,
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
       
        
    
    }

    private function prepararMensaje(){
        $sql = "SELECT * FROM mensaje WHERE idChatMensaje=?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("s",$this -> idChat);
    }

    public function listadoDeChats(){
        $this -> prepararListadoDeChats();
        $this -> sentencia -> execute(); 
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        return $resultado;
        
    }

    private function prepararListadoDeChats(){
        $sql = "SELECT * FROM chat WHERE grupo=? && estadoDelChat='abierto'";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("s", $this -> idGrupoDeUsuario);
        
    }

    public function guardarParticipanteDeChat(){
        if($this -> checkearQueNoExistaElParticipanteParaNoInsertarloRepetido($this->  idChat , $this -> cedulaParticipante) == false ){
            $this -> prepararTraerMateriaYgrupo();
            $this -> sentencia -> execute();
            $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
            $materia = $resultado['materia'];
            $grupo = $resultado['grupo'];
            $this -> prepararGuardarParticipanteDeChat($materia,$grupo);
            $this -> sentencia -> execute();
            return true;
        }else{
            return false;
            
        }
        
    }
    private function checkearQueNoExistaElParticipanteParaNoInsertarloRepetido($idChat,$cedulaParticipante){
        $sql = "SELECT idChat,cedulaParticipante from participantesDeChat  where idChat=? && cedulaParticipante=?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("si",$idChat,$cedulaParticipante);
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
        if(empty($resultado)){
            return false;
        }else{
            return true;
        }
    }

    private function prepararTraerMateriaYgrupo(){
        $sql = "SELECT * FROM chat WHERE  idChat=?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i", $this -> idChat);
      
        
    }
    

    private function prepararGuardarParticipanteDeChat($materia,$grupo){
        $sql ="INSERT INTO participantesDeChat (idChat,cedulaParticipante,materia,grupo) VALUES (?,?,?,?)";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("iiss",
        $this -> idChat,
        $this -> cedulaParticipante,
        $materia,
        $grupo,
        );
    }
    
    public function cerrarElChat(){
        if($this -> checkearSiEsElCreadorDelChat($this -> cedula, $this ->  idChat) == true ){
        $this ->  prepararCambioDeEstadoDeChat();
        $this -> sentencia -> execute();
        return true;
        }else{
            return false;
        }
    }   
    private function checkearSiEsElCreadorDelChat($cedula,$idChat){ 
        $sql="SELECT cedulaCreador from chat where idChat=? ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("s", $idChat);
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
        
        if($resultado['cedulaCreador'] != $cedula || $resultado['cedulaCreador'] == ""){
            return false; 
        }else if($resultado['cedulaCreador'] === $cedula){
            return true;
        }
    
    }

    private function prepararCambioDeEstadoDeChat(){
        $sql ="UPDATE chat SET estadoDelChat='cerrado' WHERE estadoDelChat='abierto' && idChat= ?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i", $this -> idChat);

    }
   

    private function checkearSiElChatEstaAbierto($idChat){
        
        $sql= "SELECT estadoDelChat FROM chat WHERE idChat=?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i", $idChat);
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
        if( $resultado['estadoDelChat'] == "abierto"){
            return true;
        }else if($resultado['estadoDelChat'] == "cerrado"){
            return false;
        }
    }
}