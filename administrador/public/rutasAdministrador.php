<?php
    require '../utils/autoloader.php';

    $request = $_SERVER['REQUEST_URI'];
    switch($request){
        
        case '/':
            cargarVista('loginAdministrador');
            break;
        

        case '/usuarios-pendientes':
            cargarVista('habilitarUsuarios');
            break;


        case '/aprobar-usuarios':
            if($_SERVER['REQUEST_METHOD'] === "POST") administradorController::actualizarEstadoUsuarios($_POST['cedula']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header('Location: /usuarios-pendientes');
            break;


        case '/borrar-usuarios':
            if($_SERVER['REQUEST_METHOD'] === "POST") administradorController::eliminarUsuarios($_POST['cedula']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header('Location: /usuarios-pendientes');
            break;
        

        case '/inicioAdministrador':
            if($_SERVER['REQUEST_METHOD'] === 'GET') usuarioController::MostrarLogin();  
            if($_SERVER['REQUEST_METHOD'] === 'POST') usuarioController::iniciarSesion($_POST['usuario'],$_POST['contrasenia'],$_POST['tipoDeUsuario']);
            break;

            
        case '/principalAdministrador':
            usuarioController::MostrarMenuPrincipal();
            break; 
        
        
        case'/login-administrador':
            cargarVista('loginAdministrador');
            break;  
            
        case '/crearGrupos' :
            cargarVista('crearGrupo');
            break; 
        
        case '/insertarGrupo':
            if($_SERVER['REQUEST_METHOD']== 'POST') grupoController::preAltaDeGrupo($_POST['idGrupo'],$_POST['tipoDeOrientacion']);
            if($_SERVER['REQUEST_METHOD']== 'GET') cargarVista('crearGrupos');
            break;
              
        case '/registro-alumno':
            cargarVista('registroAlumno');
            break;

        case '/registrarAlumno':
            if($_SERVER['REQUEST_METHOD'] === "POST") usuarioController::preAltaDeUsuario($_POST['cedula'],$_POST['nombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['usuario'], $_POST['contrasenia'],$_POST['tipoDeUsuario']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /registro-alumno");
            break;
        
        case '/cerrar-sesion':
            if($_SERVER['REQUEST_METHOD'] === "POST") usuarioController::cerrarSesion();
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /principalAlumno");
            break;

        case '/eliminar-usuarios':
            cargarVista('eliminarUsuarios');
            break;

        case '/baja-usuario':
            if($_SERVER['REQUEST_METHOD'] === "POST") usuarioController::preEliminarUsuarios($_POST['cedula']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /eliminar-usuarios");
            break;





    }