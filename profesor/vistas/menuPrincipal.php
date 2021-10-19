<?php 
    require '../utils/autoloader.php';

    if(!isset($_SESSION['autenticado'])){
        header('Location: /');
        die();
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
    <title>Menu Principal | Profesor</title>
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
                <form action="" method="POST">
                    <button type="submit" formaction="/pre-chat" class="btn btn-success mb-3">Modulo de chat</button> <br>
                    <button type="submit" formaction="/responderConsultas" class="btn btn-success mb-3">Responder Consultas de Alumnos</button> <br>
                    <button type="submit" formaction="/cerrar-sesion" class="btn btn-danger mb-3">Cerrar Sesion</button> <br>
                    <button type="submit" formaction="/eliminar-usuario" class="btn btn-success mb-3">Eliminar Usuario</button> <br>
                    <button type="submit" formaction="/modificar-datos-usuario" class="btn btn-success mb-3">Modificar Datos</button> <br>
                    <button type="submit" formaction="/ver-historial" class="btn btn-success mb-3">Ver historial de consultas respondidas</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>