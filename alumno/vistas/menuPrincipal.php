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
    <title>Inicio Alumno</title>
</head>
<body>
    <h1>Bienvenido, Alumno!</h1>
    <form action="" method="post">
        <button action="submit" formaction="hacer-consulta">Hacer Consulta</button>
        <button action="submit" formaction="ver-respuesta">Ver respuesta</button>
        <button action="submit" formaction="Chat">Chat</button>
        <button formaction="/">Volver al inicio</button>


        
    </form>


 

</body>
</html>