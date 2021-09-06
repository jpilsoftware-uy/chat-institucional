<?php require '../utils/autoloader.php'; 

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
    <h1>Profesores Pendientes Para Aprobar</h1>

    <table>
        <thead>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Cedula</th>
            <th>Usuario</th>
            <th>Acciones</th>
        </thead>
        <form action="submit" method="POST">
        <tbody>
            <?php
                $profesor = new ProfesorController();
                $profesores = $profesor -> mostrarProfesoresPendientes();

                foreach($profesores as $profesor){
                    echo "<tr>";
                    echo "<td> " . $profesor['nombreDocente'] . "</td>";
                    echo "<td> " . $profesor['primerApellidoDocente'] . "</td>";
                    echo "<td> " . $profesor['segundoApellidoDocente'] . "</td>";
                    echo "<td> " . $profesor['cedulaDocente'] . "</td>";
                    echo "<td> " . $profesor['usuarioDocente'] . "</td>";
                    echo "<td> 
                            <button name='id' formaction='/aprobar-profesor' value='".$profesor['idDocente']."'>  Aceptar Profesor  </button>
                            <button name='id' formaction='/eliminar-profesor' value='".$profesor['idDocente']."'>  Eliminar Profesor  </button> </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
        </form>
    </table>
</body>
</html>