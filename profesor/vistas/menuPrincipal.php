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
    <title>Inicio Profesor</title>
</head>

<body>

    <h1>Bienvenido, Profesor!</h1>
    <form action="/responderConsultas" method ="POST">
    <button type="submit">Responder Consultas </button>
    <button action="submit" formaction="pre-chat" class="btn btn-success mb-3">Modulo de Chat</button> <br>
    <button formaction="/">Volver al inicio</button>
    


 
     </form>
</body>
</html>