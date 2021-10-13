<?php 
    require '../utils/autoloader.php';

    if(!isset($_SESSION['autenticado'])){
        header('Location: /');
        die();
    } 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://i.ibb.co/qMgNQf5/Logo-Dibujo.png" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
        crossorigin="anonymous"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#modalInformacion").modal('show');
        });
    </script>
    <title>Modificar Datos</title>
</head>
<body>
    <section class="vh-100" style="background: linear-gradient(to bottom right, #009ffd, #2a2a72)">
    <?php if(isset($parametros['exito']) && $parametros['exito'] == true): ?>
        <div class="alert alert-success" >El usuario fue modificado exitosamente</div>
    <?php endif; ?>
    <?php if(isset($parametros['exito']) && $parametros['exito'] == false): ?>
        <div class="alert alert-danger" >No se pudo modificar el usuario</div>
    <?php endif; ?> 
        <form action="/actualizar-datos-usuario" method="POST">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                        <p class="text-center h1 mb-5 mx-1 mx-md-4 mt-4" style="background: linear-gradient(to right, #009ffd, #2a2a72);-webkit-background-clip: text; -webkit-text-fill-color: transparent;">Modificar Datos</p>
                                        <div class="d-flex flex-row align-items-center mb-4 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Nombre</span>
                                            </div>
                                            <input type="text" placeholder="Ingrese su nombre" class="form-control" maxlength="20" name="nombre" id="nombre"/>   
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Primer Apellido</span>
                                            </div>
                                            <input type="text" placeholder="Ingrese su primer apellido" class="form-control" maxlength="20" name="primerApellido" id="primerApellido"/>   
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Segundo Apellido</span>
                                            </div>
                                            <input type="text" placeholder="Ingrese su segundo apellido" class="form-control" maxlength="20" name="segundoApellido" id="segundoApellido"/>   
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Usuario</span>
                                            </div>
                                            <input type="text" placeholder="Ingrese su usuario" class="form-control" maxlength="20" name="usuario" id="usuario"/>   
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Contraseña</span>
                                            </div>
                                            <input type="password" placeholder="Ingrese su contraseña" class="form-control" maxlength="20" name="contrasenia" id="contrasenia"/>   
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="button" data-toggle="modal" data-target="#modalModificar" class="btn btn-md mr-3 btn-block" style=" border-radius: 25px; background-image: linear-gradient(to right,#f53803, #f5d020); border: 0px; color: #fff;">
                                              Modificar Datos
                                            </button>
                                            <button type="submit" formaction="/principalAdministrador" class="btn btn-md mr-3" style=" border-radius: 25px; background-image: linear-gradient(to right,#09c6f9, #045de9); border: 0px; color: #fff;">
                                              Volver
                                            </button>
                                          </div>
                                    </div>
                                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                        <img class="img-fluid" src="https://i.ibb.co/KqD4qbL/actualizar-usuario.png" alt="Imagen Ilustrativa">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal hide fade" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title col-11 text-center" style="font-weight: bold;" id="exampleModalLabel">Modificar Datos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-warning" style="font-weight: bold;">Antes de modificar tus datos debemos pedirte dos cosas:</p>
                                <p>Primero, ingresa tu cedula para comprobar que eres tu:</p>
                                <div class="d-flex flex-row align-items-center mb-4 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Cedula</span>
                                    </div>
                                    <input type="text" placeholder="Ingrese su cedula" class="form-control" maxlength="8" name="cedula" id="cedula"/>   
                                </div>
                                <p>Segundo, ingresa tu nueva contraseña, de esta manera evitamos que la escribas mal 😉</p>
                                <div class="d-flex flex-row align-items-center mb-4 input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Contraseña</span>
                                    </div>
                                    <input type="password" placeholder="Ingrese su contraseña" class="form-control" maxlength="20" name="contraseniaRepetida" id="contraseniaRepetida"/>   
                                </div>
                                <p>Ahora si, podes modificar tus datos </p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn text-center" style=" border-radius: 25px; background-image: linear-gradient(to right,#5aff15, #00b712); border: 0px; color: #fff;">Modificar Datos</button>
                                <button type="button" class="btn text-center" style=" border-radius: 25px; background-image: linear-gradient(to right,#ff0000, #990000); border: 0px; color: #fff;" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal hide fade" id="modalInformacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title col-11 text-center" style="font-weight: bold;" id="exampleModalLabel">Modificar Datos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-warning" style="font-weight: bold;">Como modificar los datos: </p> 
                                <p>Para poder modificar los datos de su usuario debera rellenar todos los campos correspondientes.</p>
                                <p>En caso de querer modificar unicamente una parte de los datos, debe llenar todos los campos, los que quiere mantener con los valores anteriores, con los valores anteriores.</p>
                                <p>Una vez modificados los datos, su sesion se cerrara y debera iniciar sesion nuevamente, con sus datos nuevos.</p>
                                <p class="text-danger" style="font-weight: bold;">Ademas recordamos: </p>
                                <p>El campo cedula no se puede modificar, en ese caso, debera eliminar su usuario y crear uno nuevo en el sistema.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-center" style=" border-radius: 25px; background-image: linear-gradient(to right,#5aff15, #00b712); border: 0px; color: #fff;" data-dismiss="modal">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</body>
</html>