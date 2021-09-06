


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
        <input type="submit" value ="Iniciar Sesion">
        <button formaction="/registro-profesor">Registrarse</button>

    
    </form>
</body>
</html>