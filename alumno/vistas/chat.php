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
    
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
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
    <?php if(isset($parametros['exito']) && $parametros['exito'] == true && $mensaje !== ""): 
        echo "<div class='alert alert-success' > " . $mensaje .  " </div>";
        endif; 
    ?>

    <?php if(isset($parametros['exito']) && $parametros['exito'] == false && $mensaje !== ""): 
        echo " <div class='alert alert-danger'> " . $mensaje  . " </div> ";
        endif; 
    ?>
    <div id="container">
        <div id="chat-box" style="overflow: auto">
            <div id="chat">
                
            </div>
           
        </div>
        <form action="/enviarMensaje" method="POST">
            
            <textarea name="mensajeEnviado"placeholder="Ingresa tu mensaje..."></textarea>
            <input type="submit" value="Enviar Mensaje" name="enviar">
            <button action ="submit" formaction="/principalAlumno">Volver</button>
            <button action ="submit" formaction="/cerrarChat">Cerrar Chat</button>  
  
        </form>
    </div>
</body>
</html>