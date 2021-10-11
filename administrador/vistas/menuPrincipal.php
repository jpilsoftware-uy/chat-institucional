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
    <title>Inicio</title>
</head>
<body>
    <form action="" method="post">
        <button action="submit" formaction="usuarios-pendientes">Habilitar Usuarios</button>
        <button action="submit" formaction="/crearGrupos">Crear Grupos</button>
        <button formaction="/">Volver al inicio</button>
    </form>
</body>
</html>