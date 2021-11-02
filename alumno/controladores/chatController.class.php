<?php

require '../utils/autoloader.php';



class chatController extends chatModelo {

    public static function crearChat($materia){
        if($materia !=""){
            try{
                $c = new chatModelo();
                $c -> grupo = $_SESSION['idGrupoDeUsuario'];
                $c -> materia = $materia;
                $c -> cedulaCreador = $_SESSION['cedula'];
                $c -> estadoDelChat = "abierto";
                $c -> cedulaParticipante =  $_SESSION['cedula'];
                $c -> guardarChat();
                
                return header('Location: /chat');


            }catch(Exception $e){
                return generarHtml('iniciarChat', ['exito' => false], "No se pudo crear chat");
                error_log($e -> getMessage());
                return "No se pudo guardar ";
            }
        }else{
            return generarHtml('iniciarChat', ['exito' => false], "No tiene grupo");

        } 
    }   
    public static function unirseChat($idChat){
        
        if($idChat !=""){
            try{
                
                $c = new chatModelo();
                $c -> idChat = $idChat;
                $c -> cedulaParticipante = $_SESSION['cedula'];
                $c -> guardarParticipanteDeChat();
                
                return header('Location: /chat');


            }catch(Exception $e){
                return generarHtml('unirseChat', ['exito' => false], "No se pudo crear chat");
                error_log($e -> getMessage());
                return "No se pudo guardar ";
            }
        }else{
            return generarHtml('unirseChat', ['exito' => false], "No tiene grupo");

        } 
    }   
    
    
    public static function crearMensaje($mensajeEnviado){
        if($mensajeEnviado != ""){
            try{
                $m= new ChatModelo();
                $m -> idChatMensaje = $_SESSION['idChat'];
                $m -> cedulaCreadorMensaje = $_SESSION['cedula'];
                $m -> mensajeEnviado = $mensajeEnviado;
                $m -> fecha = $fecha;
                $m -> usuarioCreadorMensaje = $_SESSION['usuario'];
                $m -> guardarMensaje();
                return cargarVista('chat');
            }catch(Exception $e){
                return generarHtml('chat' . $tipoDeUsuario , ['exito' => false],"No se pudo enviar el mensaje");
                error_log($e -> getMessage());
                return "No se pudo guardar ";
            } 
        }else{
            return generarHtml('chat' . $tipoDeUsuario , ['exito' => false],"El mensaje no puede ser vacio");
        }
    }

    public static function listarMensajesChat(){
        $mensaje = new ChatModelo();
        $mensajes = $mensaje -> mostrarMensaje();
        
        foreach($mensajes as $mensaje){
            echo"<div id='chat-data'>";
            echo"<span>" .$mensaje['usuarioCreadorMensaje'] . ": </span>";
            echo"<span>" .$mensaje['mensajeEnviado'] . "- </span>";
            echo"<span>" .$mensaje['fecha'] ." </span>";
            echo"</div>"; 
        } 
    }



    public function mostrarMensajes(){
        $a = new chatModelo();
        $a -> idChatMensaje = $_SESSION['idChat'];
        $mensajeEnviado = $a -> mostrarMensaje();
        return $mensajeEnviado; 
    }

    public static function mostrarChats(){
        
            $chats = new chatModelo();
            $chats -> idGrupoDeUsuario = $_SESSION['idGrupoDeUsuario']; 
            
            
            if($chats -> listadoDeChats() == false){
                return false;
                }else{
                return $chats -> listadoDeChats();
                } 
        
        
    }

    public static function asignarIdDeChat($idChat){
        
        if($idChat != ""){    
          
            chatController::prepararAsignacionDeIdDeChat($idChat);
            
            
            return header('Location: /unirseChat');
        }else{
            return generarHtml('unirseChat', ['exito' => false],"ocurrio un error");
        }
    }

    private static function prepararAsignacionDeIdDeChat($idChat){
        ob_start();
        $_SESSION['idChat'] = $idChat;
        
    }

   

    

}