
<!DOCTYPE html>
<html lang="es">
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
    <title>Registrarse | Alumno</title>
</head>
<body class="vh-100"
      style="background: linear-gradient(to bottom right, #009ffd, #2a2a72)">
    
    <section
     
      id="section"
    >
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
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <p
                      class="text-center h1 mb-5 mx-1 mx-md-4 mt-4"
                      style="
                        background: linear-gradient(to right, #009ffd, #2a2a72);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                      "
                    >
                      Registrarse
                    </p>
                    <form
                      class="mx-1 mx-md-4"
                      action="/insertarAlumno"
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
                          <span class="input-group-text">Nombre</span>
                        </div>
                        <input
                          type="text"
                          placeholder="Ingrese su nombre"
                          class="form-control"
                          maxlength="20"
                          id="nombre"
                          name="nombre"
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
                          <span class="input-group-text">Primer Apellido</span>
                        </div>
                        <input
                          type="text"
                          placeholder="Ingrese su primer apellido"
                          class="form-control"
                          maxlength="20"
                          id="primerApellido"
                          name="primerApellido"
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
                          <span class="input-group-text">Segundo Apellido</span>
                        </div>
                        <input
                          type="text"
                          placeholder="Ingrese su segundo apellido"
                          class="form-control"
                          maxlength="20"
                          id="segundoApellido"
                          name="segundoApellido"
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
                          <span class="input-group-text">Cedula</span>
                        </div>
                        <input
                          type="text"
                          placeholder="(sin puntos ni guiones)"
                          class="form-control"
                          maxlength="8"
                          id="cedula"
                          name="cedula"
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
                          <span class="input-group-text">Usuario</span>
                        </div>
                        <input
                          type="text"
                          placeholder="Ingrese su usuario"
                          class="form-control"
                          maxlength="20"
                          id="usuario"
                          name="usuario"
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
                          <span class="input-group-text">Email</span>
                        </div>
                        <input
                          type="text"
                          placeholder="Ingrese su Email"
                          class="form-control"
                          maxlength="30"
                          id="email"
                          name="email"
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
                          <span class="input-group-text">Contrase??a</span>
                        </div>
                        <input
                          type="password"
                          placeholder="Ingrese su contrase??a"
                          class="form-control"
                          maxlength="32"
                          id="contrasenia"
                          name="contrasenia"
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
                          <span class="input-group-text">Contrase??a</span>
                        </div>
                        <input
                          type="password"
                          placeholder="Repita su contrase??a"
                          class="form-control"
                          maxlength="32"
                          id="contraseniaRepetida"
                          name="contraseniaRepetida"
                        />
                      </div>

                      <div
                        class="d-flex justify-content-center mx-4 mb-3 mb-lg-4"
                      >
                        <button
                          class="btn btn-md mr-3"
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
                          name="tipoDeUsuario" 
                          value="Alumno"
                          id="btnRegistrarse"
                          action="submit"
                          onClick="return validarFormulario()"
                        >
                          Registrarse
                        </button>

                        <button
                          action="submit"
                          formaction="/"
                          class="btn btn-md btn-block"
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
                          Inicio
                        </button>
                      </div>
                    </form>
                  </div>
                  <div
                    class="
                      col-md-10 col-lg-6 col-xl-7
                      d-flex
                      align-items-center
                      order-1 order-lg-2
                    "
                  >
                    <img
                      src="https://i.ibb.co/PjSWs5Z/imagen-registro.png"
                      class="img-fluid"
                      alt="Sample image"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="../js/registro.js"></script>
</body>
</html>