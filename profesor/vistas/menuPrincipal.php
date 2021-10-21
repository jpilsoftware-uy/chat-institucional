<?php 
    require '../utils/autoloader.php';

    if(!isset($_SESSION['autenticado'])){
        header('Location: /');
        die();
        session_destroy();
    } 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://i.ibb.co/qMgNQf5/Logo-Dibujo.png">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/menuDesplegable.css">
    <script src="https://kit.fontawesome.com/626834a84d.js" crossorigin="anonymous"></script>
    <title>Menu Principal | Profesor</title>
    <style>
    
    
</style>
</head>
<body id="body">
  

    <header>
        <div class ="icon_menu" > 
            <i class="fas fa-bars" id="botonAbrir"></i>
            
        </div>
        <div class="mensajeDeBienvenida">
        <?php 
        echo "<h1 class='ml-4'>Bienvenido ". $_SESSION['nombre']. " !</h1>";
         ?> 
        </div> 
       
    </header>
    <div class="menu" id="menu">
        <div class="perfil">
            <i class="fas fa-user-circle"></i>
            <?php 
            echo "<h4>".$_SESSION['usuario']."</h4>";
            ?>
        </div>

        <div class="opcionesMenu">
            <a href="/principalProfesor" class="seleccionado">
                <div class="opcion">
                <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>                
            </a>
            <a href="/modificar-datos-usuario" >
                <div class="opcion">
                    <i class="fas fa-user-edit" title="Editar perfil"></i>
                    <h4>Editar perfil</h4>
                </div>                
            </a>
            <a href="/eliminar-usuario">
                <div class="opcion">
                    <i class="fas fa-times-circle" title="Eliminar Usuario"></i>
                    <h4>Eliminar perfil</h4>
                </div>
            
                <a href="/cerrar-sesion" >
                    <div class="opcion">
                    <i class="fas fa-sign-out-alt" title="Cerrar Sesion"></i>
                    <h4>Cerrar Sesion</h4>
                    </div>
                </a>
                           
        </div>
    </div>
    <main class="vh-100" >
        <div class="card-deck-wrapper">
                                <div class="card-deck">

                                    <div class="card mt-4 mb-3 text-center mx-4">
                                        <div class="card-header" style="background: linear-gradient(to right, #009ffd, #2a2a72); color: white; font-weight: bold; text-align: center;"> Chat</div>
                                            <div class="card-body">
                                                <p class="card-text"> En esta seccion se puede chatear con los usuarios que desee. </p>
                                                <a href="/pre-chat" class="btn" style=" border-radius: 25px; background-image: linear-gradient(to right,#009ffd, #2a2a72); border: 0px; color: #fff; font-weight: bold;">Chat</a>
                                                <p class="card-text mt-1">
                                                    <small class="text-muted"> Ultima actualizacion: 10/21/21 </small>
                                                </p>
                                            </div>
                                    </div>

                                    <div class="card mt-4 mb-4 text-center mx-4">
                                        <div class="card-header" style="background: linear-gradient(to right, #009ffd, #2a2a72); color: white; font-weight: bold; text-align: center;"> Consultas </div>
                                            <div class="card-body">
                                                <p class="card-text"> En esta seccion puede responder sus consultas pendientes. </p>
                                                <a href="/responderConsultas" class="btn" style=" border-radius: 25px; background-image: linear-gradient(to right,#009ffd, #2a2a72); border: 0px; color: #fff; font-weight: bold;">Consultas</a>
                                                <p class="card-text mt-1">
                                                    <small class="text-muted"> Ultima actualizacion: 10/21/2021 </small>
                                                </p>
                                            </div>
                                    </div>
                                    
                            
    </main>
    
    <script src="../js/menu.js"></script>
</body>
</html>