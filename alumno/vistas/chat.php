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
    <link rel="stylesheet" href="css/chat.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  
    <title>Chateando | Alumno</title>
    <script type="text/javascript">

		function tiempoReal()
		{
			var tabla = $.ajax({
				url:'/traermensajes',
				dataType:'text',
				async:false
			}).responseText;

			document.getElementById("chat").innerHTML = tabla;
		}
		setInterval(tiempoReal, 1000);
		</script>




</head>
<body>
    <div id="container">
        <div id="chat-box" style="overflow: auto">
            <div id="chat">
                
            </div>
           
        </div>
        <form action="/enviarMensaje" method="POST">
            
            <textarea name="mensajeEnviado"placeholder="Ingresa tu mensaje..."></textarea>
            <input type="submit" value="Enviar Mensaje" name="enviar">
            <button action ="submit" formaction="/principalAlumno">Volver</button>  
        </form>
    </div>
</body>
</html>