
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
    <title>Iniciar Sesion | Administrador</title>
</head>
<body>
    <section
      class="vh-100"
      style="background: linear-gradient(to bottom right, #009ffd, #2a2a72)"
    >

    <?php if(isset($parametros['falla']) && $parametros['falla'] == true): ?>
        <div class="alert alert-danger" style="color: #FF0000"> Login Incorrecto</div>
    <?php endif; ?>

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
                      Iniciar Sesion
                    </p>
                    <form
                      class="mx-1 mx-md-4"
                      method="POST"
                      action="/inicioAdministrador"
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
                          <span class="input-group-text">Usuario</span>
                        </div>
                        <input
                          type="text"
                          placeholder="Ingrese su usuario"
                          class="form-control"
                          maxlength="20"
                          name="usuario"
                          id="usuario"
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
                          <span class="input-group-text">Contraseña</span>
                        </div>
                        <input
                          type="password"
                          placeholder="Ingrese su contraseña"
                          class="form-control"
                          maxlength="32"
                          name="contrasenia"
                          id="contrasenia"
                        />
                      </div>
                      <div
                        class="d-flex justify-content-center mx-4 mb-3 mb-lg-4"
                      >
                        <button
                          type="submit"
                          name="tipoDeUsuario" 
                          value="Administrador"
                          id="tipoDeUsuario"
                          class="btn btn-lg mr-3 btn-block"
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
                        >
                          Iniciar Sesion
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
                      src="https://i.ibb.co/dkLDn1r/imagen-login.png"
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


</body>
</html>