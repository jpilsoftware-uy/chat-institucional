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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <title>Inicio Profesor</title>
    <script text="javascript">
            $(window).on("beforeunload", function() { 
                Location.replace('/consultaTerminada');    
            })
    </script>
</head>
<body>
  

<table>
        <thead>
            <th>Nombre</th>
            <th>Consulta</th>
            <th>Respuesta</th>
            
        </thead>
        <form action="/consultaTerminada" method="POST">
        <tbody>
            <?php


                $respuesta = new ConsultaController();
                $respuestas = $respuesta -> mostrarRespuesta();
                

                foreach($respuestas as $respuesta){
                    echo "<tr>";
                    echo "<td> " . $respuesta['usuarioProfesor'] . "</td>";
                    echo "<td> " . $respuesta['mensajeConsulta'] . "</td>";
                    echo "<td> " . $respuesta['mensajeRespuesta'] . "</td>";
                    echo "</tr>";
                }
                
            ?>
           
   
        </tbody>
        
    </table>

         <button action ="submit"formaction="/consultaTerminada">Volver</button>  
         
         </form>
    

</body>
</html>