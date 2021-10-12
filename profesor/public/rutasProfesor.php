<?php
    require '../utils/autoloader.php';

    $request = $_SERVER['REQUEST_URI'];
    switch($request){
        
        case '/':
            cargarVista('loginProfesor');
            break;
            
        case '/insertarProfesor':
            if($_SERVER['REQUEST_METHOD'] === 'POST') usuarioController::preAltaDeUsuario($_POST['cedula'],$_POST['nombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['usuario'], $_POST['contrasenia'],$_POST['tipoDeUsuario']);
            if($_SERVER['REQUEST_METHOD'] === 'GET') cargarVista('registroProfesor');
            break;    
            
        
        case '/registro-profesor':
            cargarVista('registroProfesor');
            break;


        case '/inicioProfesor':
            if($_SERVER['REQUEST_METHOD'] === 'GET') usuarioController::MostrarLogin(); 
            if($_SERVER['REQUEST_METHOD'] === 'POST') usuarioController::iniciarSesion($_POST['usuario'],$_POST['contrasenia'],$_POST['tipoDeUsuario']);
            break;

        
        case '/principalProfesor':
            usuarioController::MostrarMenuPrincipal();
            break;


        case '/responderConsultas':
                cargarVista('responderConsultas');
            break;  
            
        case '/insertarRespuesta':
            if($_SERVER['REQUEST_METHOD'] === 'POST') consultaController::insertarRespuesta($_POST['mensajeRespuesta'], $_POST['idConsulta']);
            if($_SERVER['REQUEST_METHOD'] === 'GET') cargarVista('responderConsultas');
            break;     

        case '/enviarMensaje':
            if($_SERVER['REQUEST_METHOD'] ==="POST") chatController::crearMensaje($_POST['mensajeEnviado']);
            break;             
            
        case '/crearChat':
            if($_SERVER['REQUEST_METHOD'] ==="POST") chatController::crearChat($_POST['']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header('Location: /pre-chat');
            break;
    
        case '/unirse-chat':
            cargarVista('unirseChat');
            break;
    
        case '/iniciar-chat':
            if($_SERVER['REQUEST_METHOD'] === "POST") chatController::asignarIdDeChat($_POST['id']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header('Location: /pre-chat');
            break;
            
        case '/traermensajes':
            chatController::listarMensajesChat();
            break;

        case '/pre-chat':
            cargarVista('preChat');
            break;
        
        case '/chat':
            cargarVista('chat');
            break;    
                
        case '/modificar-datos':
            cargarVista('modificarDatos');
            break;
    
        case '/insertar-modificacion':
            if($_SERVER['REQUEST_METHOD'] === "POST") usuarioController::modificarDatosDeUsuario($_POST['nombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['usuario'], $_POST['contrasenia'], $_POST['grupo']);
            if($_SERVER['REQUEST_METHOD'] === "GET") cargarVista('modificarDatos');
            break;

        case '/cerrar-sesion':
            usuarioController::cerrarSesion();
            break;

        case '/cerrar-sesion':
            if($_SERVER['REQUEST_METHOD'] === "POST") usuarioController::cerrarSesion();
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /principalAlumno");
            break;

        case '/eliminar-usuario':
            cargarVista('eliminarUsuarios');
            break;

        case '/baja-usuario':
            if($_SERVER['REQUEST_METHOD'] === "POST") usuarioController::preEliminarUsuarios($_POST['cedula']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /principalAlumno");
            break;
    }