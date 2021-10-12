

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
    <title>Habilitar Usuarios</title>
</head>
<body>
    <h1>Usuarios Pendientes Para Aprobar</h1>

    <table>
        <thead>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Cedula</th>
            <th>Usuario</th>
            <th>Tipo de usuario</th>
            <th>Acciones</th>
        </thead>
        <form action="submit" method="POST">
        <tbody>
            <?php
                $usuario = new administradorController();
                $usuarios = $usuario -> mostrarUsuariosPendientes();

                foreach($usuarios as $usuario){
                    echo "<tr>";
                    echo "<td> " . $usuario['nombre'] . "</td>";
                    echo "<td> " . $usuario['primerApellido'] . "</td>";
                    echo "<td> " . $usuario['segundoApellido'] . "</td>";
                    echo "<td> " . $usuario['cedula'] . "</td>";
                    echo "<td> " . $usuario['usuario'] . "</td>";
                    echo "<td> " . $usuario['tipoDeUsuario'] . "</td>";
                    echo "<td> 
                            <button name='cedula' formaction='/aprobar-usuarios' value='".$usuario['cedula']."'>  Aceptar Alumno  </button> <br>
                            <button name='cedula' formaction='/borrar-usuarios' value='".$usuario['cedula']."'>  Eliminar Alumno  </button> </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
        <button formaction="/principalAdministrador">Volver al inicio</button>
        </form>
    </table>
    


</body>

</html>