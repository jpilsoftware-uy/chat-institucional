<?php

require '../utils/autoloader.php';



class chatController extends chatModelo {

    public static function crearChat(){
        try{
            $c = new chatModelo();
            $c -> ciCreador = $_SESSION['cedula'];
            $c -> estadoDelChat = "abierto";
            $c -> guardarChat();
            return generarHtml('preChat', ['exito' => true],"Se creo el chat con exito");

        }catch(Exception $e){
            return generarHtml('preChat', ['exito' => false], "No se pudo crear chat");
            error_log($e -> getMessage());
            return "No se pudo guardar ";
        } 
    }

    public static function crearMensaje($mensajeEnviado){
        if($mensajeEnviado != ""){
            try{
                $m= new ChatModelo();
                $m -> idChatMensaje = $_SESSION['idChat'];
                $m -> ciCreadorMensaje = $_SESSION['cedula'];
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
        try{
            $c = new chatModelo();
            $resultado = $c -> listadoDeChats();
            return $resultado;
        } catch (Exception $e){
            return generarHtml('unirseChat', ['exito' => false],"no hay chat disponibles");
            error_log($e -> getMessage());
            return "No se pudo listar";
            
        }
    }

    public static function asignarIdDeChat($id){
        if($id != ""){
            
            chatController::prepararAsignacionDeIdDeChat($id);
            
            $nombre = "hola";
            return header('Location: /chat');
        } else {
            echo "Error";
        }
    }

    private static function prepararAsignacionDeIdDeChat($id){
        ob_start();
        $_SESSION['idChat'] = $id;
        
    }



    

}