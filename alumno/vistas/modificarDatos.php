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
    <title>Modificar Datos</title>
</head>
<body>

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

    <h1 class="text-center mt-3">Registre sus datos!</h1>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form id="formulario" action="/insertar-modificacion" method="POST">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                        </div>
                        <input type="text" id="nombre" class="form-control" placeholder="Ingrese su nombre" name="nombre" maxlength="20">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Primer Apellido</span>
                        </div>
                        <input type="text" id="primerApellido" class="form-control" placeholder="Ingrese su primer apellido" name="primerApellido" maxlength="20">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Segundo Apellido</span>
                        </div>
                        <input type="text" id="segundoApellido" class="form-control" placeholder="Ingrese su segundo apellido" name="segundoApellido" maxlength="20">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Usuario</span>
                        </div>
                        <input type="text" id="usuario" class="form-control" placeholder="Ingrese su usuario" name="usuario" maxlength="20">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Contraseña</span>
                        </div>
                        <input type="password" id="contrasenia" class="form-control" placeholder="Ingrese su contraseña" name="contrasenia" maxlength="32">
                    </div>

                    <button class="btn btn-success" id="registro" action="submit">Modificar Datos</button>
                    <button class="btn btn-primary" formaction="/principalAlumno">Volver Atras</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>