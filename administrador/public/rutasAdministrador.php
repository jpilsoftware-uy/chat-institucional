<?php
    require '../utils/autoloader.php';

    $request = $_SERVER['REQUEST_URI'];
    switch($request){
        
        case '/':
            cargarVista('loginAdministrador');
            break;
        

        case '/alumnos-pendientes':
            cargarVista('habilitarAlumno');
            break;


        case '/aprobar-alumno':
            if($_SERVER['REQUEST_METHOD'] === "POST") AlumnoController::actualizarEstadoAlumno($_POST['id']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header('Location: /alumnos-pendientes');
            break;


        case '/eliminar-alumno':
            if($_SERVER['REQUEST_METHOD'] === "POST") AlumnoController::eliminarAlumnos($_POST['id']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header('Location: /alumnos-pendientes');
            break;


        case '/profesores-pendientes':
            cargarVista('habilitarProfesor');
            break;

        
        case '/aprobar-profesor':
            if($_SERVER['REQUEST_METHOD'] === "POST") ProfesorController::actualizarEstadoProfesor($_POST['id']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header('Location: /profesores-pendientes');
            break;


        case '/eliminar-profesor':
            if($_SERVER['REQUEST_METHOD'] === "POST") ProfesorController::eliminarProfesores($_POST['id']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header('Location: /Profesores-pendientes');
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