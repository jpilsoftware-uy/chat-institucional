<?php
    require '../utils/autoloader.php';

    $request = $_SERVER['REQUEST_URI'];
    switch($request){
        
        case '/':
            cargarVista('loginAlumno');
            break;
                    
        case '/insertarAlumno':
            if($_SERVER['REQUEST_METHOD'] === 'POST') usuarioController::preAltaDeUsuario($_POST['cedula'],$_POST['nombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['usuario'], $_POST['contrasenia'],$_POST['tipoDeUsuario'],$_POST['email']);
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
            if($_SERVER['REQUEST_METHOD'] === 'POST') consultaController::preAltaDeConsulta($_POST['mensajeConsulta'], $_POST['cedulaProfesor']);
            if($_SERVER['REQUEST_METHOD'] === 'GET') cargarVista('consultaAlumno');
            break;
            
        case '/consultaAlumno':
             cargarVista('consultaAlumno');
            break;
        
        case '/pre-chat':
            cargarVista('preChat');
            break;

        case '/chat':
            cargarVista('chat');
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

        case '/cerrar-sesion':
            usuarioController::cerrarSesion();
            break;

        case '/eliminar-usuario':
            cargarVista('eliminarUsuarios');
            break;
        
        case '/baja-usuario':
            if($_SERVER['REQUEST_METHOD'] === "POST") usuarioController::preEliminarUsuarios($_POST['cedula']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /principalAlumno");
            break;
        
        case '/modificar-datos-usuario':
            cargarVista('actualizarUsuario');
            break;

        case '/actualizar-datos-usuario':
            if($_SERVER['REQUEST_METHOD'] === "POST") usuarioController::preModificarDatosDeUsuario($_POST['cedula'], $_POST['nombre'], $_POST['primerApellido'], $_POST['segundoApellido'], $_POST['usuario'], $_POST['contrasenia']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /modificar-datos-usuario");
            break;

        case '/consultaTerminada':
            consultaController::cambiarEstadoAVisto();
            header('location: /principalAlumno');
            break;

        case '/iniciarChat':
            cargarVista('iniciarChat');
            break;

        case '/editar':
            cargarVista('editar');
            break;

        case '/unirseGrupo':
            if($_SERVER['REQUEST_METHOD'] === "POST") grupoController::unirseAGrupo($_POST['idGrupoDeUsuario']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header("Location: /modificar-datos-usuario");
            break;    
            
        case '/ver-historial':
            cargarVista('historialConsultas');
            break;

        case '/mostrarMateriaParaChat':
            if($_SERVER['REQUEST_METHOD'] === "POST")grupoController::asignarVariableDeSessionIdGrupo($_POST['idGrupoDeUsuario'],$vista="iniciarChat") && orientacionesController::mostrarMaterias();
            if($_SERVER['REQUEST_METHOD'] === "GET") header('Location: /unirseChat');
            break;

        case '/mostrarChats':
            if($_SERVER['REQUEST_METHOD'] === "POST")grupoController::asignarVariableDeSessionIdGrupo($_POST['idGrupoDeUsuario'],$vista="unirseChat") && chatController::mostrarChats();
            if($_SERVER['REQUEST_METHOD'] === "GET") header('Location: /unirseChat');
            break;

        case '/iniciar-chat':
            if($_SERVER['REQUEST_METHOD'] === "POST")chatController::unirseChat($_POST['idChat']);
            if($_SERVER['REQUEST_METHOD'] === "GET") header('Location: /iniciarChat');
            break;

        case '/cerrarChat':
            chatController::cerrarChat();
            break; 

        case '/verificarEstado':
            chatController::verificarEstadoDeChat();
            break; 

        case '/mostrarProfesoresDelGrupo':
            if($_SERVER['REQUEST_METHOD'] === "POST")grupoController::asignarVariableDeSessionIdGrupo($_POST['idGrupoDeUsuario'],$vista="consultaAlumno") && usuarioController::mostrarProfesoresDelGrupo();
            
            break;    
            
        

}            
