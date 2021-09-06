
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse como Alumno</title>
</head>
<body>
    <h1>Ingrese sus datos</h1>
    
    
    <?php if(isset($parametros['exito']) && $parametros['exito'] == true): ?>
        <div style="color: #00FF00">Persona guardada exitosamente</div>
    <?php endif; ?>

    <?php if(isset($parametros['exito']) && $parametros['exito'] == false): ?>
        <div style="color: #F90000">El usuario ya existe en el sistema</div>
    <?php endif; ?>
    
    <form action="/insertarAlumno" method="POST">
        Nombre: <input type="text" name="nombre" id="nombre"> <br>
        Primer Apellido: <input type="text" name="primerApellido" id="primerApellido"> <br>
        Segundo Apellido: <input type="text" name="segundoApellido" id="segundoApellido"> <br>
        Cedula de Identidad (sin puntos ni guiones): <input type="text" name="cedula" id="cedula"> <br>
        Usuario: <input type="text" name="usuario" id="usuario"> <br>
        Contrasenia: <input type="password" name="contrasenia" id="contrasenia"> <br>
       

        <button action="submit" name="tipoDeUsuario" id="tipoDeUsuario" value="Alumno">Registrar Usuario</button>
        <button formaction="/">Volver al inicio</button>
        
    </form>
        
</body>
</html>