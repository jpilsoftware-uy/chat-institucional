


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
    <title>Iniciar Sesion | Profesor</title>
</head>
<body>
    <?php if(isset($parametros['falla']) && $parametros['falla'] == true): ?>
        <div class="alert alert-danger" style="color: #FF0000"> Login Incorrecto</div>
    <?php endif; ?>
    
    <h1 class="text-center mt-3">Ingrese sus datos para Iniciar Sesion</h1>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="/inicioProfesor" method="POST">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Ingrese su usuario" name="usuario" maxlength="20">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
                        </div>
                        <input type="password" class="form-control" placeholder="Ingrese su contraseña" name="contrasenia" maxlenght="32">
                    </div>
                    
                    <button type="submit" class="btn btn-success" name="tipoDeUsuario" id="tipoDeUsuario" value="Profesor">Iniciar Sesion</button>
                    <button type="submit" formaction="/registro-profesor" class="btn btn-primary">Registrarse</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>