<?php
    require '../utils/autoloader.php';

    $request = $_SERVER['REQUEST_URI'];
    switch($request){

        case"/enviarMensaje":
           if($_SERVER['REQUEST_METHOD'] ==="POST") chatController::crearMensaje($_POST['mensajeEnviado']);
           break;
        case"/crearChat":
            if($_SERVER['REQUEST_METHOD'] ==="POST") chatController::crearChat($_POST['']);
            break;   
        
    
    
    }
        