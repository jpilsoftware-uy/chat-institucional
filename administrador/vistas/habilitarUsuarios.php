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
    <title>Habilitar Usuarios | Administrador</title>
</head>
<body>
    <section class="vh-100" style="background: linear-gradient(to bottom right, #009ffd, #2a2a72)">
        <form action="" method="POST">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                        <p class="text-center h1 mb-5 mx-1 mx-md-4 mt-4" style="background: linear-gradient(to right, #009ffd, #2a2a72);-webkit-background-clip: text; -webkit-text-fill-color: transparent;">Habilitar Usuarios</p>
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <button type="submit" class="btn btn-md" formaction="/moduloUsuarios" style="border-radius: 25px; background-image: linear-gradient(to right,#09c6f9, #045de9); border: 0px; color: #fff; font-weight: bold;">Volver al Inicio</button>
                                            </div>
                                    </div>
                                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                        <table class="table table-striped table-fixed">
                                            <thead class="text-center" style="background: linear-gradient(to bottom right, #009ffd, #2a2a72)">
                                                <tr>
                                                    <th style="color: white; font-weight: bold;">Cedula</th>
                                                    <th style="color: white; font-weight: bold;">Nombre</th>
                                                    <th style="color: white; font-weight: bold;">Apellido</th>
                                                    <th style="color: white; font-weight: bold;">Tipo de usuario</th>
                                                    <th style="color: white; font-weight: bold;">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                            <?php

                                                $usuario = new administradorController();
                                                $usuarios = $usuario -> mostrarUsuariosPendientes();
                                                if($usuarios == false){
                                                    
                                                } else {
                                                    foreach($usuarios as $usuario){
                                                        echo "<tr>";
                                                        echo "<td> " . $usuario['cedula'] . "</td>";
                                                        echo "<td> " . $usuario['nombre'] . "</td>";
                                                        echo "<td> " . $usuario['primerApellido'] . "</td>";
                                                        echo "<td> " . $usuario['tipoDeUsuario'] . "</td>";
                                                        echo "<td> 
                                                                <button name='cedula' formaction='/aprobar-usuarios' class='btn  btn-sm mb-1' style='border-radius: 25px; background-image: linear-gradient(to right,#5aff15, #00b712); border: 0px; color: #fff;' value='".$usuario['cedula']."'>Aprobar Usuario</button> <br>
                                                                <button name='cedula' formaction='/borrar-usuarios' class='btn btn-sm ' style='border-radius: 25px; background-image: linear-gradient(to right,#ff0000, #990000); border: 0px; color: #fff;' value='".$usuario['cedula']."'>Eliminar Usuario</button> <br>
                                                                
                                                             </td>";
                                                             
                                                    }
                                                }

                                                
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</body>
</html>