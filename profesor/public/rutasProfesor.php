<?php
    require '../utils/autoloader.php';

    $request = $_SERVER['REQUEST_URI'];
    switch($request){
        
        case '/':
            cargarVista('loginProfesor');
            break;
            
        case '/insertarProfesor':
            if($_SERVER['REQUEST_METHOD'] === 'POST') usuarioController::preAltaDeUsuario($_POST['cedula'],$_POST['nombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['usuario'], $_POST['contrasenia'],$_POST['tipoDeUsuario'],$_POST['email']);
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
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /chat");
            break;             
            
        case '/crearChat':
            if($_SERVER['REQUEST_METHOD'] ==="POST") chatController::crearChat($_POST['materia']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header('Location: /iniciarChat');
            break;
    
        case '/unirseChat':
            cargarVista('unirseChat');
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

        case '/eliminar-usuario':
            cargarVista('eliminarUsuarios');
            break;

        case '/baja-usuario':
            if($_SERVER['REQUEST_METHOD'] === "POST") usuarioController::preEliminarUsuarios($_POST['cedula']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /principalProfesor");
            break;

        case '/modificar-datos-usuario':
            cargarVista('actualizarUsuario');
            break;

        case '/actualizar-datos-usuario':
            if($_SERVER['REQUEST_METHOD'] === "POST") usuarioController::preModificarDatosDeUsuario($_POST['cedula'], $_POST['nombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['usuario'], $_POST['contrasenia']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /modificar-datos-usuario");
            break;
        
        case '/ver-historial':
            cargarVista('historialConsultas');
            break;

        case '/unirseGrupo':
            if($_SERVER['REQUEST_METHOD'] === "POST") grupoController::unirseAGrupo($_POST['idGrupoDeUsuario']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /modificar-datos-usuario");
            break;

        case '/iniciarChat':
            cargarVista('iniciarChat');
            break;

        case '/elegirMateria':
            cargarVista('elegirMateria');
            break;

        case '/mostrarMateria':
            if($_SERVER['REQUEST_METHOD'] === "POST")grupoController::asignarVariableDeSessionIdGrupo($_POST['idGrupoDeUsuario'],$vista="elegirMateria") && orientacionesController::mostrarMaterias();
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /elegirMateria");
            break;

        case '/insertarMateria':
            if($_SERVER['REQUEST_METHOD']==="POST")materiaController::insertarMateria($_POST['materia']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /elegirMateria");
            break;

        case '/mostrarMateriaParaChatDeProfesor':
            if($_SERVER['REQUEST_METHOD'] === "POST")grupoController::asignarVariableDeSessionIdGrupo($_POST['idGrupoDeUsuario'],$vista="iniciarChat") && orientacionesController::mostrarMateriasDeProfesor();
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /iniciarChat");
            break;        
            
        case '/pre-chat':
            cargarVista('pre-chat');
            break;    

        case '/mostrarChats':
            if($_SERVER['REQUEST_METHOD'] === "POST")grupoController::asignarVariableDeSessionIdGrupo($_POST['idGrupoDeUsuario'],$vista="unirseChat") && chatController::mostrarChats();
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /iniciarChat");
            break;
            
        case '/iniciar-chat':
            if($_SERVER['REQUEST_METHOD'] === "POST")chatController::unirseChat($_POST['idChat']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /iniciarChat");

            break;      
        case '/cerrarChat':
            chatController::cerrarChat();
            break;  
    }