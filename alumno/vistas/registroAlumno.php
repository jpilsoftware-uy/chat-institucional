
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://i.ibb.co/qMgNQf5/Logo-Dibujo.png">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <title>Registrarse como Alumno</title>
</head>
<body>
    <h1>Ingrese sus datos</h1>

    <?php if(isset($parametros['exito']) && $parametros['exito'] == true): ?>
        <div class="alert alert-success">
            Su usuario esta a la espera de ser aprobado por un administrador!
        </div>
    <?php endif; ?>

    <?php if(isset($parametros['exito']) && $parametros['exito'] == false): ?>
        <div class="alert alert-danger">
            Su usuario no pudo ser cargado!
        </div>
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