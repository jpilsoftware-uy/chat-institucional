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
    <title>Inicio Profesor</title>
</head>
<body>
  

<table>
        <thead>
            <th>Nombre</th>
            <th>Consulta</th>
            <th>Respuesta</th>
            
        </thead>
        <form action="/insertarRespuesta" method="POST">
        <tbody>
            <?php


                $respuesta = new ConsultaController();
                $respuestas = $respuesta -> mostrarRespuesta();
                

                foreach($respuestas as $respuesta){
                    echo "<tr>";
                    echo "<td> " . $respuesta['usuarioDocente'] . "</td>";
                    echo "<td> " . $respuesta['mensajeConsulta'] . "</td>";
                    echo "<td> " . $respuesta['mensajeRespuesta'] . "</td>";
                    echo "</tr>";
                }
                
            ?>
           
   
        </tbody>
        
    </table>

         
         
         </form>
    



 

</body>
</html>