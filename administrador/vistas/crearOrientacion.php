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
    <title>Crear Orientacion | Administrador</title>
</head>
<body style="background: linear-gradient(to bottom right, #009ffd, #2a2a72)">
    
    <?php if(isset($parametros['exito']) && $parametros['exito'] == true && $mensaje !== ""): 
      echo "<div class='alert alert-success' > " . $mensaje .  " </div>";
      endif; 
    ?>

    <?php if(isset($parametros['exito']) && $parametros['exito'] == false && $mensaje !== ""): 
      echo " <div class='alert alert-danger'> " . $mensaje  . " </div> ";
      endif; 
    ?> 

        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-8 order-2 order-lg-1">
                                    <p
                                        class="text-center h1 mb-5 mx-1 mx-md-4 mt-4"
                                        style="
                                            background: linear-gradient(to right, #009ffd, #2a2a72);
                                            -webkit-background-clip: text;
                                            -webkit-text-fill-color: transparent;
                                        "
                                    >
                                    Crear orientacion
                                    </p>
                                    <form
                                        class="mx-1 mx-md-4"
                                        action="/registrar-orientacion"
                                        method="POST"
                                    >   
                                        <div
                                            class="
                                            d-flex
                                            flex-row
                                            align-items-center
                                            mb-4
                                            input-group
                                            "
                                        >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Nombre de la orientacion</span>
                                            </div>
                                            <input
                                                type="text"
                                                placeholder="Ingrese el nombre de la orientacion"
                                                class="form-control"
                                                maxlength="30"
                                                id="tipoDeOrientacion"
                                                name="tipoDeOrientacion"
                                            />
                                        </div>
                                        <div
                                            class="
                                            d-flex
                                            flex-row
                                            align-items-center
                                            mb-4
                                            input-group
                                            "
                                        >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Materia 1</span>
                                            </div>
                                            <input
                                                type="text"
                                                placeholder="Ingrese el nombre de la materia"
                                                class="form-control"
                                                maxlength="30"
                                                id="materia1"
                                                name="materia1"
                                            />
                                        </div>
                                        <div
                                            class="
                                            d-flex
                                            flex-row
                                            align-items-center
                                            mb-4
                                            input-group
                                            "
                                        >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Materia 2</span>
                                            </div>
                                            <input
                                                type="text"
                                                placeholder="Ingrese el nombre de la materia"
                                                class="form-control"
                                                maxlength="30"
                                                id="materia2"
                                                name="materia2"
                                            />
                                        </div>
                                        <div
                                            class="
                                            d-flex
                                            flex-row
                                            align-items-center
                                            mb-4
                                            input-group
                                            "
                                        >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Materia 3</span>
                                            </div>
                                            <input
                                                type="text"
                                                placeholder="Ingrese el nombre de la materia"
                                                class="form-control"
                                                maxlength="30"
                                                id="materia3"
                                                name="materia3"
                                            />
                                        </div>
                                        <div
                                            class="
                                            d-flex
                                            flex-row
                                            align-items-center
                                            mb-4
                                            input-group
                                            "
                                        >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Materia 4</span>
                                            </div>
                                            <input
                                                type="text"
                                                placeholder="Ingrese el nombre de la materia"
                                                class="form-control"
                                                maxlength="30"
                                                id="materia4"
                                                name="materia4"
                                            />
                                        </div>
                                        <div
                                            class="
                                            d-flex
                                            flex-row
                                            align-items-center
                                            mb-4
                                            input-group
                                            "
                                        >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Materia 5</span>
                                            </div>
                                            <input
                                                type="text"
                                                placeholder="Ingrese el nombre de la materia"
                                                class="form-control"
                                                maxlength="30"
                                                id="materia5"
                                                name="materia5"
                                            />
                                        </div>
                                        <div
                                            class="
                                            d-flex
                                            flex-row
                                            align-items-center
                                            mb-4
                                            input-group
                                            "
                                        >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Materia 6</span>
                                            </div>
                                            <input
                                                type="text"
                                                placeholder="Ingrese el nombre de la materia"
                                                class="form-control"
                                                maxlength="30"
                                                id="materia6"
                                                name="materia6"
                                            />
                                        </div>
                                        <div
                                            class="
                                            d-flex
                                            flex-row
                                            align-items-center
                                            mb-4
                                            input-group
                                            "
                                        >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Materia 7</span>
                                            </div>
                                            <input
                                                type="text"
                                                placeholder="Ingrese el nombre de la materia"
                                                class="form-control"
                                                maxlength="30"
                                                id="materia7"
                                                name="materia7"
                                            />
                                        </div>
                                        <div
                                            class="
                                            d-flex
                                            flex-row
                                            align-items-center
                                            mb-4
                                            input-group
                                            "
                                        >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Materia 8</span>
                                            </div>
                                            <input
                                                type="text"
                                                placeholder="Ingrese el nombre de la materia"
                                                class="form-control"
                                                maxlength="30"
                                                id="materia8"
                                                name="materia8"
                                            />
                                        </div>
                                        <div
                                            class="
                                            d-flex
                                            flex-row
                                            align-items-center
                                            mb-4
                                            input-group
                                            "
                                        >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Materia 9</span>
                                            </div>
                                            <input
                                                type="text"
                                                placeholder="Ingrese el nombre de la materia"
                                                class="form-control"
                                                maxlength="30"
                                                id="materia9"
                                                name="materia9"
                                            />
                                        </div>
                                        <div
                                            class="
                                            d-flex
                                            flex-row
                                            align-items-center
                                            mb-4
                                            input-group
                                            "
                                        >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Materia 10</span>
                                            </div>
                                            <input
                                                type="text"
                                                placeholder="Ingrese el nombre de la materia"
                                                class="form-control"
                                                maxlength="30"
                                                id="materia10"
                                                name="materia10"
                                            />
                                        </div>
                                        <div
                                            class="
                                            d-flex
                                            flex-row
                                            align-items-center
                                            mb-4
                                            input-group
                                            "
                                        >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Materia 11</span>
                                            </div>
                                            <input
                                                type="text"
                                                placeholder="Ingrese el nombre de la materia"
                                                class="form-control"
                                                maxlength="30"
                                                id="materia11"
                                                name="materia11"
                                            />
                                        </div>
                                        <div
                                            class="
                                            d-flex
                                            flex-row
                                            align-items-center
                                            mb-4
                                            input-group
                                            "
                                        >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Materia 12</span>
                                            </div>
                                            <input
                                                type="text"
                                                placeholder="Ingrese el nombre de la materia"
                                                class="form-control"
                                                maxlength="30"
                                                id="materia12"
                                                name="materia12"
                                            />
                                        </div>
                                        <div
                                            class="
                                            d-flex
                                            flex-row
                                            align-items-center
                                            mb-4
                                            input-group
                                            "
                                        >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Materia 13</span>
                                            </div>
                                            <input
                                                type="text"
                                                placeholder="Ingrese el nombre de la materia"
                                                class="form-control"
                                                maxlength="30"
                                                id="materia13"
                                                name="materia13"
                                            />
                                        </div>
                                        <div
                                            class="d-flex justify-content-center mx-4 mb-3 mb-lg-4"
                                        >
                                            <button
                                                class="btn btn-md mr-3 text-center"
                                                style="
                                                    border-radius: 25px;
                                                    background-image: linear-gradient(
                                                    to right,
                                                    #5aff15,
                                                    #00b712
                                                    );
                                                    border: 0px;
                                                    color: #fff;
                                                "
                                                id="btnRegistrarse"
                                                name="tipoDeUsuario"
                                                value="Alumno"
                                                action="submit"
                                                onClick="return validarFormulario()"
                                                >
                                                Crear Orientacion
                                            </button>

                                            <button
                                                action="submit"
                                                class="btn btn-md text-center"
                                                formaction="/modulo-orientaciones"
                                                style="
                                                    border-radius: 25px;
                                                    background-image: linear-gradient(
                                                    to right,
                                                    #09c6f9,
                                                    #045de9
                                                    );
                                                    border: 0px;
                                                    color: #fff;
                                                "
                                                >
                                                Volver
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal hide fade" id="modalInformacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title col-11 text-center" style="font-weight: bold;" id="exampleModalLabel">Crear una orientacion</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-warning" style="font-weight: bold;">Como crear una orientacion:</p> 
                                                <p>El maximo de materias que una orientacion puede tener son 13</p>
                                                <p>En caso de querer una orientacion con menos de 13 materias, simplemente las dejamos vacias</p>
                                                <p>Una vez se hayan escrito todos los campos, presiona el boton: "Crear Orientacion"</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn text-center" style=" border-radius: 25px; background-image: linear-gradient(to right,#5aff15, #00b712); border: 0px; color: #fff;" data-dismiss="modal">Aceptar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>         
                            </div>
                        </div>            
                    </div>                
                </div>
            </div>
        </div>    
</body>
</html>