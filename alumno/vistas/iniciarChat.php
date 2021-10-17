<?php 
    require '../utils/autoloader.php';

    if(!isset($_SESSION['autenticado'])){
        header('Location: /');
        die();
        session_destroy();
    } 



?>
<!DOCTYPE html>
<html>
<head>
   <title>Iniciar Chat </title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
   <link href="css/style.css" rel="stylesheet" id="bootstrap-css">
   <script src="js/chat.js"></script>
</head>
<body>
    <h1>Iniciar Chat</h1>
    <div>  Seleccione Grupo    </div>
        <select>
            <option>1</option>
            <option>2</option>
            <option>3</option>
        
        </select> </br>
        

   </div>
</body>
</html>