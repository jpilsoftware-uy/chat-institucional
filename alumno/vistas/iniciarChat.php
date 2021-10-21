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
        <form action="" method="POST">
        <?php
        $grupo = new grupoController();
        $grupos = $grupo -> mostrarGrupoDeUsuario();
        
        if($grupos == false){
            
            echo "<select>";
            echo "<option>". "No tienes grupo" ."</option>";
            echo "</select>" . "</br>";
        }else{ 
            echo "<select name='grupo'>";
            foreach($grupos as $grupo){
            echo "<option>" . $grupo['idGrupo'] ."</option>";
            }
            echo "</select>" . "</br>";
        }   
        ?>
        <button action="submit" formaction="/crearChat" value="$grupo['idGrupo']">Iniciar Chat</button>
        <button action="submit" formaction="/pre-chat">Volver atras</button>
    </form>
        
        
        
</body>
</html>