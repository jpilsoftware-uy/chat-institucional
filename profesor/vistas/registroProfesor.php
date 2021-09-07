
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse como profesor</title>
</head>
<body>
    <h1>Ingrese sus datos</h1>
    
    
    <?php if(isset($parametros['exito']) && $parametros['exito'] == true): ?>
        <div style="color: #00FF00">Su usuario esta a la espera de aprobacion del administrador</div>
    <?php endif; ?>

    <?php if(isset($parametros['exito']) && $parametros['exito'] == false): ?>
        <div style="color: #F90000">La carga de su usuario tuvo algun error</div>
    <?php endif; ?>
    
    <form action="/insertarProfesor" method="post">
        Nombre: <input type="text" name="nombre" id="nombre"> <br>
        Primer Apellido: <input type="text" name="primerApellido" id="primerApellido"> <br>
        Segundo Apellido: <input type="text" name="segundoApellido" id="segundoApellido"> <br>
        Cedula de Identidad: <input type="text" name="cedula" id="cedula" placeholder="sin puntos ni guiones"> <br>
        Usuario: <input type="text" name="usuario" id="usuario"> <br>
        Contrasenia: <input type="password" name="contrasenia" id="contrasenia"> <br>
        

        

        <button action="submit" name="tipoDeUsuario" id="tipoDeUsuario" value="Profesor">Registrar Usuario</button>
        <button formaction="/">Volver al inicio</button>
    </form>


        
</body>
</html>