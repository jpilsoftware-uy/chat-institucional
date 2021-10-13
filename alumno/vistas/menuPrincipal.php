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
    <title>Menu Principal | Alumno</title>
</head>
<body>
    <?php 
    $nombre = $_SESSION['nombre'];
    $h1 = '
    <h1 class="text-center mt-3">Bienvenido ' . $nombre . '!</h1>
    ';
    echo $h1;
    ?>
    <hr>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <form method="POST">
                    <button action="submit" formaction="hacer-consulta" class="btn btn-success mb-3">Hacer una Consulta a un Profesor</button> <br>
                    <button action="submit" formaction="ver-respuesta" class="btn btn-success mb-3">Ver Respuestas del Profesor</button> <br>
                    <button action="submit" formaction="pre-chat" class="btn btn-success mb-3">Modulo de Chat</button> <br>
                    <button action="submit" formaction="/modificar-datos-usuario" class="btn btn-success mb-3">Modificar mis datos</button> <br>
                    <button action="submit" formaction="/cerrar-sesion" class="btn btn-danger">Cerrar Sesion</button>
                    <button action="submit" formaction="/eliminar-usuario" class="btn btn-success">Eliminar Usuario</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>