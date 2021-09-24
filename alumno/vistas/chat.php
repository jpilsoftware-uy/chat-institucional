<?php     

    require '../utils/autoloader.php';

?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/chat.css">
    <!--<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    /> -->
    <title>Chateando | Alumno</title>
</head>
<body>
    <div id="container">
        <div id="chat-box">
            <div id="chat">
        
                <div id="chat-data">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <form action="/enviarMensaje" method="POST">
            
            <textarea name="mensaje"placeholder="Ingresa tu mensaje..."></textarea>
            <input type="submit" value="Enviar Mensaje" name="enviar">
        </form>
    </div>
</body>
</html>