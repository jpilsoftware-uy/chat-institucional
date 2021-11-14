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
            usuarioController::cerrarSesion();
            break;

        case '/eliminar-usuarios':
            cargarVista('eliminarUsuarios');
            break;

        case '/baja-usuario':
            if($_SERVER['REQUEST_METHOD'] === "POST") usuarioController::preEliminarUsuarios($_POST['cedula']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /eliminar-usuarios");
            break;

        case '/registro-profesor':
            cargarVista('registroProfesor');
            break;

        case '/registrarProfesor':
            if($_SERVER['REQUEST_METHOD'] === "POST") usuarioController::preAltaDeUsuario($_POST['cedula'],$_POST['nombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['usuario'], $_POST['contrasenia'],$_POST['tipoDeUsuario']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /registro-profesor");
            break;

        case '/modificar-datos-usuario':
            cargarVista('actualizarUsuario');
            break;

        case '/actualizar-datos-usuario':
            if($_SERVER['REQUEST_METHOD'] === "POST") usuarioController::preModificarDatosDeUsuario($_POST['cedula'], $_POST['nombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['usuario'], $_POST['contrasenia']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /modificar-datos-usuario");
            break;

        case '/agenda-de-consultas':
            cargarVista('agendaConsultas');
            break;
        case '/registroUsuario':
            cargarVista('registrarUsuario');
            break;   
        case '/moduloUsuarios':
            cargarVista('moduloUsuarios');
            break;  
        case '/moduloGrupos':
            cargarVista('moduloGrupos');
            break;     
        case '/eliminarGrupos':
            cargarVista('eliminarGrupos');
            break;
        case '/borrarGrupo':
            if($_SERVER['REQUEST_METHOD'] === "POST") grupoController::eliminarGrupos($_POST['idGrupo']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header('Location: /eliminarGrupos');
            break;
    
    }