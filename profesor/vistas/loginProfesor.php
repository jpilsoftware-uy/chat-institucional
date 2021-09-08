


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Profesor</title>

</head>
<body>
<h1>Login Profesor</h1>
    <?php if(isset($parametros['falla']) && $parametros['falla'] == true): ?>
        <div style="color: #FF0000"> Login Incorrecto</div>
    <?php endif; ?>
    
    <form action="/inicioProfesor" method="post">
        Usuario : <input type ="text" name ="usuario"> <br>
        Contrasenia : <input type ="password" name ="contrasenia"> <br>
        <button action="submit" name="tipoDeUsuario" id="tipoDeUsuario" value="Profesor">Iniciar Sesion</button>
        <button formaction="/registro-profesor">Registrarse</button>

    
    </form>
</body>
</html>