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
        <div style="color: #00FF00">Consulta enviada</div>
    <?php endif; ?>

    <?php if(isset($parametros['exito']) && $parametros['exito'] == false): ?>
        <div style="color: #F90000">La consulta no se pudo enviar </div>
    <?php endif; ?>

<table>
        <thead>
            <th>Nombre </th>
            <th>Primer Apellido </th>
            <th>Usuario del Docente </th>
            <th>Id del docente </th>
            <th>Seleccione un profesor</th>
            
        </thead>
        <form action="/insertarConsulta"  method="POST">
        <tbody>
            <?php
                $profesor = new usuarioController();
                $profesores = $profesor -> mostrarProfesoresAprobados();
                foreach($profesores as $profesor){
                    echo "<tr>";
                    echo "<td> " . $profesor['nombre'] . "</td>";
                    echo "<td> " . $profesor['primerApellido'] . "</td>";
                    echo "<td> " . $profesor['usuario'] . "</td>";
                    echo "<td> " . $profesor['cedula'] . "</td>";
                    echo "<td>  <input type='radio' name='cedulaProfesor' value= '$profesor[cedula]'    >  </td>";
                    echo "</tr>";
                }
            ?>
            
           
   
        </tbody>
        
    </table>
        
         <textarea name="mensajeConsulta" > </textarea>
         <button action="submit" formaction="/insertarConsulta" >Enviar </button>

                 
    
         </form>

 

</body>
</html>