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
    <title>Unirse a un chat | Alumno</title>
</head>
<body>
    <h1>Elija el chat al que desea ingresar</h1>
    <form action="" method="POST">
    <?php
        $chat = new chatController();
        $chats = $chat -> mostrarChats();
        foreach($chats as $chat){
            $nombre = $chat['idChat'];
            
            echo "<button class='btn btn-success mb-3' name='id' formaction='/iniciar-chat' value='".$chat['idChat']."'>Abrir Chat - " . $nombre ."</button> <br>";
        }
    ?>
    <button formaction="/pre-chat" class="btn btn-primary">Volver atras</button>
    </form>
</body>
</html>