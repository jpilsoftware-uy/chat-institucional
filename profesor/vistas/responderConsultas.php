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
  
    <?php if(isset($parametros['exito']) && $parametros['exito'] == true): ?>
        <div style="color: #00FF00">Respuesta enviada</div>
    <?php endif; ?>

    <?php if(isset($parametros['exito']) && $parametros['exito'] == false): ?>
        <div style="color: #F90000">La respuesta no se pudo enviar </div>
    <?php endif; ?>

<table>
        <thead>
            <th>Nombre</th>
            <th>Consulta</th>
            <th>Seleccione consulta a responder</th>
            
        </thead>
        <form action="/insertarRespuesta" method="POST">
        <tbody>
            <?php
                $consulta = new ConsultaController();
                $consultas = $consulta -> mostrarConsultas();
                

                foreach($consultas as $consulta){
                    echo "<tr>";
                    echo "<td> " . $consulta['usuarioAlumno'] . "</td>";
                    echo "<td> " . $consulta['mensajeConsulta'] . "</td>";
                    echo "<td>  <input type='radio' name='idConsulta' value= '$consulta[idConsulta]' >  </td>";
                    echo "</tr>";
                }
                
            ?>
           
   
        </tbody>
        
    </table>

         <textarea name="mensajeRespuesta" ></textarea>
         <button action="submit" formaction="/insertarRespuesta">Enviar </button>
         <button action ="submit" formaction="/principalProfesor">Volver</button>  

         
         
         </form>
    



 

</body>
</html>