

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
    <title>Habilitar Alumno</title>
</head>
<body>
    <h1>Alumnos Pendientes Para Aprobar</h1>

    <table>
        <thead>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Cedula</th>
            <th>Grupo</th>
            <th>Usuario</th>
            <th>Acciones</th>
        </thead>
        <form action="submit" method="POST">
        <tbody>
            <?php
                $alumno = new AlumnoController();
                $alumnos = $alumno -> mostrarAlumnosPendientes();

                foreach($alumnos as $alumno){
                    echo "<tr>";
                    echo "<td> " . $alumno['nombreAlumno'] . "</td>";
                    echo "<td> " . $alumno['primerApellidoAlumno'] . "</td>";
                    echo "<td> " . $alumno['segundoApellidoAlumno'] . "</td>";
                    echo "<td> " . $alumno['cedulaAlumno'] . "</td>";
                    echo "<td> " . $alumno['grupoAlumno'] . "</td>";
                    echo "<td> " . $alumno['usuarioAlumno'] . "</td>";
                    echo "<td> 
                            <button name='id' formaction='/aprobar-alumno' value='".$alumno['idAlumno']."'>  Aceptar Alumno  </button> <br>
                            <button name='id' formaction='/eliminar-alumno' value='".$alumno['idAlumno']."'>  Eliminar Alumno  </button> </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
        </form>
    </table>
</body>
</html>