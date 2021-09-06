<?php
    require '../utils/autoloader.php';

    $request = $_SERVER['REQUEST_URI'];
    switch($request){
        
        case '/':
            cargarVista('loginProfesor');
            break;
            
        case '/insertarProfesor':
            if($_SERVER['REQUEST_METHOD'] === 'POST') ProfesorController::preAltaDeProfesor($_POST['nombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['usuario'], $_POST['contrasenia'], $_POST['ci']);
            if($_SERVER['REQUEST_METHOD'] === 'GET') cargarVista('registroProfesor');
            break;    
            
        
        case '/registro-profesor':
            cargarVista('registroProfesor');
            break;


        case '/inicioProfesor':
            if($_SERVER['REQUEST_METHOD'] === 'GET') profesorController::MostrarLoginProfesor();  
            if($_SERVER['REQUEST_METHOD'] === 'POST') profesorController::iniciarSesion($_POST['usuario'],$_POST['contrasenia']);
            break;

        
        case '/principalProfesor':
            ProfesorController::MostrarMenuPrincipalProfesor();
            break;


        case '/responderConsultas':
                cargarVista('responderConsultas');
            break;  
            
            
          
        case '/insertarRespuesta':
               if($_SERVER['REQUEST_METHOD'] === 'POST') consultaController::insertarRespuesta($_POST['mensajeRespuesta'], $_POST['idConsulta']);
               if($_SERVER['REQUEST_METHOD'] === 'GET') cargarVista('responderConsultas');
            break;     

        
    }