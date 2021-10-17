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
    <title>Modulo de Chat | Alumno</title>

</head>
<body>
<h1>Inicio de chat</h1>
    <?php if(isset($parametros['exito']) && $parametros['exito'] == true): ?>
        <div class="alert alert-success">Su chat fue creado exitosamente, dirijase a "Unirse a un chat"</div>
    <?php endif; ?>

    <?php if(isset($parametros['exito']) && $parametros['exito'] == false): ?>
        <div class="alert alert-danger">El usuario ya existe en el sistema</div>
    <?php endif; ?>


    

<form action="" method="post">
   

        <button action="submit" formaction="/crearChat">Crear chat</button>
        <button action="submit" formaction="/unirse-chat">Unirse a un chat</button>
        <button formaction="/principalAlumno">Volver atras</button>

    </form>

    
   
</body>
</html>