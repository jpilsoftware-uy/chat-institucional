<?php 
    require '../utils/autoloader.php';

    if(!isset($_SESSION['autenticado'])){
        header('Location: /');
        die();
    } 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://i.ibb.co/qMgNQf5/Logo-Dibujo.png" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    
    <title>Menu Principal | Administrador</title>
</head>
<body>
    <form method="POST" action="">
        <section class="vh-100" style="background: linear-gradient(to bottom right, #009ffd, #2a2a72)">
            <div class="container py-4">
                <div class="card" style="border-radius: 15px; background: #fafafa;">
                    <div class="card-body">
                        <h1 class="card-title" style="text-align: center"> Bienvenido Administrador! </h1>
                        <div class="card-deck-wrapper">
                            <div class="card-deck">
                                <div class="card mt-4 mb-4 text-center">
                                    <div class="card-header" style="background: linear-gradient(to right, #009ffd, #2a2a72);color: white;font-weight: bold;text-align: center;"> Registrar Alumno </div>
                                        <div class="card-body">
                                            <p class="card-text"> En esta seccion se puede registrar a un alumno por parte del Administrador. </p>
                                            <a href="/registro-alumno" class="btn" style=" border-radius: 25px; background-image: linear-gradient(to right,#009ffd, #2a2a72); border: 0px; color: #fff; font-weight: bold;">Registrar Alumno</a>
                                            <p class="card-text mt-1">
                                                <small class="text-muted"> Ultima actualizacion: 7/20/2021 </small>
                                            </p>
                                        </div>
                                </div>

                                <div class="card mt-4 mb-4 text-center">
                                    <div class="card-header" style="background: linear-gradient(to right, #009ffd, #2a2a72);color: white;font-weight: bold;text-align: center;"> Registrar Profesor </div>
                                        <div class="card-body">
                                            <p class="card-text"> En esta seccion se puede registrar a un profesor por parte del Administrador. </p>
                                            <a href="/registro-profesor" class="btn" style=" border-radius: 25px; background-image: linear-gradient(to right,#009ffd, #2a2a72); border: 0px; color: #fff; font-weight: bold;">Registrar Profesor</a>
                                            <p class="card-text mt-1">
                                                <small class="text-muted"> Ultima actualizacion: 7/20/2021 </small>
                                            </p>
                                        </div>
                                </div>

                                <div class="card mt-4 mb-4 text-center">
                                    <div class="card-header" style="background: linear-gradient(to right, #009ffd, #2a2a72);color: white;font-weight: bold;text-align: center;"> Modificar Usuarios </div>
                                        <div class="card-body">
                                            <p class="card-text"> En esta seccion se modifican los datos tanto de Alumnos como Profesores. </p>
                                            <a href="/modificar-datos-usuario" class="btn" style=" border-radius: 25px; background-image: linear-gradient(to right,#009ffd, #2a2a72); border: 0px; color: #fff; font-weight: bold;">Modificar Usuarios</a>
                                            <p class="card-text mt-1">
                                                <small class="text-muted"> Ultima actualizacion: 7/20/2021 </small>
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
                                                <small class="text-muted"> Ultima actualizacion: 7/20/21 </small>
                                            </p>
                                        </div>
                                </div>

                                <div class="card mt-4 mb-4 text-center">
                                    <div class="card-header" style="background: linear-gradient(to right, #009ffd, #2a2a72); color: white; font-weight: bold; text-align: center;"> Eliminar Usuarios </div>
                                        <div class="card-body">
                                            <p class="card-text"> En esta seccion se puede eliminar a los usuarios del sistema. </p>
                                            <a href="/eliminar-usuarios" class="btn" style=" border-radius: 25px; background-image: linear-gradient(to right,#009ffd, #2a2a72); border: 0px; color: #fff; font-weight: bold;">Eliminar Usuarios</a>
                                            <p class="card-text mt-1">
                                                <small class="text-muted"> Ultima actualizacion: 7/20/2021 </small>
                                            </p>
                                        </div>
                                </div>

                                <div class="card mt-4 mb-4 text-center">
                                    <div class="card-header" style="background: linear-gradient(to right, #009ffd, #2a2a72); color: white; font-weight: bold; text-align: center;"> Crear Grupos </div>
                                        <div class="card-body">
                                            <p class="card-text"> En esta seccion se pueden crear nuevos grupos en el sistema. </p>
                                            <a href="/crearGrupos" class="btn" style=" border-radius: 25px; background-image: linear-gradient(to right,#009ffd, #2a2a72); border: 0px; color: #fff; font-weight: bold;">Crear Grupos</a>
                                            <p class="card-text mt-1">
                                                <small class="text-muted"> Ultima actualizacion: 7/20/2021 </small>
                                            </p>
                                        </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-deck-wrapper">
                            <div class="card-deck">

                                <div class="card mt-4 mb-4 text-center">
                                    <div class="card-header" style="background: linear-gradient(to right, #ff0000, #990000); color: white; font-weight: bold; text-align: center;">Cerrar Sesion</div>
                                        <div class="card-body">
                                            <p class="card-text">Presione el boton que se encuentra en la parte inferior para cerrar sesion.</p>
                                            <button formaction="/cerrar-sesion" class="btn" style="border-radius: 25px; background-image: linear-gradient(to right,#ff0000, #990000); border: 0px; color: #fff; font-weight: bold;">Cerrar Sesion</button>
                                        </div>
                                </div>

                                <div class="card mt-4 mb-4 text-center">
                                    <div class="card-header" style="background: linear-gradient(to right, #009ffd, #2a2a72); color: white; font-weight: bold; text-align: center;"> Agenda de Consultas </div>
                                        <div class="card-body">
                                            <p class="card-text"> En esta seccion se puede ver toda la agenda de consultas del sistema. </p>
                                            <a href="/agenda-de-consultas" class="btn" style=" border-radius: 25px; background-image: linear-gradient(to right,#009ffd, #2a2a72); border: 0px; color: #fff; font-weight: bold;">Ver Agenda</a>
                                            <p class="card-text mt-1">
                                                <small class="text-muted"> Ultima actualizacion: 7/20/2021 </small>
                                            </p>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>
</html>