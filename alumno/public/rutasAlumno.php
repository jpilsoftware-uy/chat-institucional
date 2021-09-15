<?php
    require '../utils/autoloader.php';

    $request = $_SERVER['REQUEST_URI'];
    switch($request){
        
        case '/':
            cargarVista('loginAlumno');
            break;
        

            
        case '/insertarAlumno':
            if($_SERVER['REQUEST_METHOD'] === 'POST') usuarioController::preAltaDeUsuario($_POST['cedula'],$_POST['nombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['usuario'], $_POST['contrasenia'],$_POST['tipoDeUsuario']);
            if($_SERVER['REQUEST_METHOD'] === 'GET') cargarVista('registroAlumno');
            break;

        case '/registro-alumno':
            cargarVista('registroAlumno');
            break;    


        


        case '/inicioAlumno':
            if($_SERVER['REQUEST_METHOD'] === 'GET') usuarioController::MostrarLogin();  
            if($_SERVER['REQUEST_METHOD'] === 'POST') usuarioController::iniciarSesion($_POST['usuario'],$_POST['contrasenia'],$_POST['tipoDeUsuario']);
            break;



        case '/principalAlumno':
            usuarioController::MostrarMenuPrincipal();
            break; 


          case'/ver-respuesta':
                cargarVista('verRespuestaAlumno');
    
             break; 
        
        case '/insertarConsulta':
                if($_SERVER['REQUEST_METHOD'] === 'POST') consultaController::preAltaDeConsulta($_POST['mensajeConsulta'], $_POST['idDocente']);
                if($_SERVER['REQUEST_METHOD'] === 'GET') cargarVista('consultaAlumno');
            break;
            
            
        case '/hacer-consulta':
             cargarVista('consultaAlumno');
            break;

        case '/Chat':
             cargarVista('preChat');
            break;    

        case '/modificar-datos':
            if($_SERVER['REQUEST_METHOD'] === "POST") usuarioController::modificarDatosDeUsuario($_POST['nombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['usuario'], $_POST['contrasenia'], $_POST['grupo']);
            if($_SERVER['REQUEST_METHOD'] === "GET") cargarVista('modificarDatos');
            break;

        







        
    }