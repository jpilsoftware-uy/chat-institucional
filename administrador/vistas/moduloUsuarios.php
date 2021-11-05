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
    <title>Modulo Usuario | Administrador </title>
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
        echo "<h1 class='ml-4'>Modulo Usuario </h1>";
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
            <a href="/principalAdministrador" class="seleccionado">
                <div class="opcion">
                <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>                
            </a>
          
            
            
                <a href="/cerrar-sesion" >
                    <div class="opcion">
                    <i class="fas fa-sign-out-alt" title="Cerrar Sesion"></i>
                    <h4>Cerrar Sesion</h4>
                    </div>
                </a>
                           
        </div>
    </div>
    <main class="vh-100" >
    <form method="POST" action="">
        <section class="vh-100" style="background: linear-gradient(to bottom right, #009ffd, #2a2a72)">
            <div class="container py-4">
                <div class="card" style="border-radius: 15px; background: #fafafa;">
                    <div class="card-body">
                        
                        <div class="card-deck-wrapper">
                            <div class="card-deck">
                                <div class="card mt-4 mb-4 text-center">
                                    <div class="card-header" style="background: linear-gradient(to right, #009ffd, #2a2a72);color: white;font-weight: bold;text-align: center;"> Registrar Usuario </div>
                                        <div class="card-body">
                                            <p class="card-text"> En esta seccion se puede registrar a un usuario por parte del Administrador. </p>
                                            <a href="/registroUsuario" class="btn" style=" border-radius: 25px; background-image: linear-gradient(to right,#009ffd, #2a2a72); border: 0px; color: #fff; font-weight: bold;">Registrar Usuario </a>
                                            <p class="card-text mt-1">
                                                <small class="text-muted"> Ultima actualizacion: 11/5/2021 </small>
                                            </p>
                                        </div>
                                </div>

                                

                                <div class="card mt-4 mb-4 text-center">
                                    <div class="card-header" style="background: linear-gradient(to right, #009ffd, #2a2a72);color: white;font-weight: bold;text-align: center;"> Modificar Usuarios </div>
                                        <div class="card-body">
                                            <p class="card-text"> En esta seccion se modifican los datos tanto de Alumnos como Profesores. </p>
                                            <a href="/modificar-datos-usuario" class="btn" style=" border-radius: 25px; background-image: linear-gradient(to right,#009ffd, #2a2a72); border: 0px; color: #fff; font-weight: bold;">Modificar Usuarios</a>
                                            <p class="card-text mt-1">
                                                <small class="text-muted"> Ultima actualizacion: 11/5/2021 </small>
                                            </p>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-deck-wrapper">
                            <div class="card-deck">

                                <div class="card mt-4 mb-4 text-center">
                                    <div class="card-header" style="background: linear-gradient(to right, #009ffd, #2a2a72); color: white; font-weight: bold; text-align: center;"> Habilitar Usuarios </div>
                                        <div class="card-body">
                                            <p class="card-text"> En esta seccion se habilita a los usuarios a utilizar el sistema. </p>
                                            <a href="/usuarios-pendientes" class="btn" style=" border-radius: 25px; background-image: linear-gradient(to right,#009ffd, #2a2a72); border: 0px; color: #fff; font-weight: bold;">Habilitar Usuarios</a>
                                            <p class="card-text mt-1">
                                                <small class="text-muted"> Ultima actualizacion: 11/5/2021 </small>
                                            </p>
                                        </div>
                                </div>

                                <div class="card mt-4 mb-4 text-center">
                                    <div class="card-header" style="background: linear-gradient(to right, #009ffd, #2a2a72); color: white; font-weight: bold; text-align: center;"> Eliminar Usuarios </div>
                                        <div class="card-body">
                                            <p class="card-text"> En esta seccion se puede eliminar a los usuarios del sistema. </p>
                                            <a href="/eliminar-usuarios" class="btn" style=" border-radius: 25px; background-image: linear-gradient(to right,#009ffd, #2a2a72); border: 0px; color: #fff; font-weight: bold;">Eliminar Usuarios</a>
                                            <p class="card-text mt-1">
                                                <small class="text-muted"> Ultima actualizacion: 11/5/2021 </small>
                                            </p>
                                        </div>
                                </div>

                                

                            </div>
                            <button type="submit" formaction="/principalAdministrador" class="btn text-center " style=" border-radius: 25px; background-image: linear-gradient(to right,#09c6f9, #045de9); border: 0px; color: #fff; font-weight: bold;">Volver al Inicio</button>

                        </div>
                    </div>
                     </div>
                </div>
                

            </div>

        </section>
    </form>
                                    
                            
    </main>
    
    <script src="../js/menu.js"></script>

</body>
</html>