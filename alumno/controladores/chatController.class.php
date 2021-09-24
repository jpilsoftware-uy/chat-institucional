<?php

require '../utils/autoloader.php';



class chatController extends chatModelo {

    public static function crearChat($ciCreador=$_SESSION['cedula'],$materia,$grupo,$estadoDelChat="abierto"){
        if($ciCreador !=" "&& $materia!=" "&& $grupo!=" "){
            try{
            $c = new ChatModelo();
            $c -> ciCreador = $ciCreador;
            $c -> materia = $materia;
            $c -> grupo = $grupo;
            $c -> estadoDelChat = $estadoDelChat;
            $c -> guardarChat();


            } catch(Exception $e){

                return generarHtml('registro' . $tipoDeUsuario , ['exito' => false]);
                error_log($e -> getMessage());
                return "No se pudo guardar ";
            } 
        }

    }

    public static function crearMensaje($idChatMensaje,$ciCreadorMensaje=$_SESSION['cedula'],$mensajeEnviado){
        if($idChatMensaje!=" "&& $ciCreadorMensaje!=" "&& $mensajeEnviado!=" "){
            try{
            $m= new ChatModelo();
            $m -> idChatMensaje = $idChatMensaje;
            $m -> ciCreadorMensaje = $ciCreadorMensaje;
            $m -> mensajeEnviado = $mensajeEnviado;
            $m -> fecha = $fecha;
            $m -> guardarMensaje();


            }   catch(Exception $e){

                return generarHtml('chat' . $tipoDeUsuario , ['exito' => false]);
                error_log($e -> getMessage());
                return "No se pudo guardar ";
            } 
        }else{
            return generarHtml('chat' . $tipoDeUsuario , ['exito' => false]);
        }

    }















public function mostrarMensajes(){
    $a = new chatModelo();
    $mensajeEnviado = $a -> mostrarMensaje();
    return $mensajeEnviado; 
}






}