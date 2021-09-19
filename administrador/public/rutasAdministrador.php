<?php
    require '../utils/autoloader.php';

    $request = $_SERVER['REQUEST_URI'];
    switch($request){
        
        case '/':
            cargarVista('loginAdministrador');
            break;
        

        case '/usuarios-pendientes':
            cargarVista('habilitarAlumno');
            break;


        case '/aprobar-usuarios':
            if($_SERVER['REQUEST_METHOD'] === "POST") administradorController::actualizarEstadoUsuarios($_POST['cedula']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header('Location: /usuarios-pendientes');
            break;


        case '/eliminar-usuarios':
            if($_SERVER['REQUEST_METHOD'] === "POST") administradorController::eliminarUsuarios($_POST['cedula']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header('Location: /usuarios-pendientes');
            break;
        

        case '/inicioAdministrador':
            if($_SERVER['REQUEST_METHOD'] === 'GET') adminsitradorController::MostrarLoginAdministrador();  
            if($_SERVER['REQUEST_METHOD'] === 'POST') administradorController::iniciarSesion($_POST['usuario'],$_POST['contrasenia']);
            break;

            
        case '/principalAdministrador':
           AdministradorController::MostrarMenuPrincipalAdministrador();
            break; 
        
        
        case'/login-administrador':
                cargarVista('loginAdministrador');
            break;    







    }