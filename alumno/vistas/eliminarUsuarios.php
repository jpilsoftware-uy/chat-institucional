<?php 
    require '../utils/autoloader.php';

    if(!isset($_SESSION['autenticado'])){
        header('Location: /');
        die();
        session_destroy();
    } 



?>

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
    <link rel="stylesheet" href="css/menuDesplegable.css">
    <script src="https://kit.fontawesome.com/626834a84d.js" crossorigin="anonymous"></script>
    <title> Eliminar Perfil | Alumno</title>
    <style>
    
    
</style>
</head>

<body id="body">
  

    <header>
        <div class ="icon_menu" > 
            <i class="fas fa-bars" id="botonAbrir"></i>
            
        </div>
        <div class="mensajeDeBienvenida">
        <?php 
        echo "<h1 class='ml-4'>Eliminar Perfil</h1>";
         ?> 
        </div> 
       
    </header>
    <div class="menu" id="menu">
        <div class="perfil">
            <i class="fas fa-user-circle"></i>
            <?php 
            echo "<h4>".$_SESSION['usuario']."</h4>";
            ?>
        </div>

        <div class="opcionesMenu">
            <a href="/principalAlumno" >
                <div class="opcion">
                <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>                
            </a>
            <a href="/modificar-datos-usuario" >
                <div class="opcion">
                    <i class="fas fa-user-edit" title="Editar perfil"></i>
                    <h4>Editar perfil</h4>
                </div>                
            </a>
            <a href="/eliminar-usuario" class="seleccionado">
                <div class="opcion">
                    <i class="fas fa-times-circle" title="Eliminar Usuario"></i>
                    <h4>Eliminar perfil</h4>
                </div>
            
                <a href="/cerrar-sesion" >
                    <div class="opcion">
                    <i class="fas fa-sign-out-alt" title="Cerrar Sesion"></i>
                    <h4>Cerrar Sesion</h4>
                    </div>
                </a>
                           
        </div>
    </div>
    
    <main class="vh-100" >
    <?php if(isset($parametros['exito']) && $parametros['exito'] == false): ?>
    <div class="alert alert-danger" >La cedula es incorrecta</div>
    <?php endif; ?> 
    


  <section class="vh-100" style="background: linear-gradient(to bottom right, #009ffd, #2a2a72)">
  <?php if(isset($parametros['exito']) && $parametros['exito'] == false && $mensaje !== ""): 
      echo " <div class='alert alert-danger'> " . $mensaje  . " </div> ";
      endif; 
  ?>
  <form action="" method="POST">

    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black  mt-4" style="border-radius: 25px">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p class="text-center h1 mb-5 mx-1 mx-md-4 mt-4" style="background: linear-gradient(to right, #009ffd, #2a2a72);-webkit-background-clip: text; -webkit-text-fill-color: transparent;">Eliminar</p>
                    <div class="d-flex flex-row align-items-center mb-4 input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Cedula</span>
                      </div>
                      <input type="text" placeholder="Ingrese su cedula" class="form-control" maxlength="8" name="cedula" id="cedula"/>
                    </div>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="button" data-toggle="modal" data-target="#modalEliminar" class="btn btn-md mr-3 btn-block" style=" border-radius: 25px; background-image: linear-gradient(to right,#ff0000, #990000); border: 0px; color: #fff;">
                        Eliminar Usuario
                      </button>
                      <button type="submit" formaction="/principalAlumno" class="btn btn-md mr-3" style=" border-radius: 25px; background-image: linear-gradient(to right,#09c6f9, #045de9); border: 0px; color: #fff;">
                        Volver
                      </button>
                    </div>
                  </div>
                  <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                    <img class="img-fluid" src="https://i.ibb.co/1vDRKRC/eliminar-usuario.png" alt="Imagen Ilustrativa">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title col-11 text-center" style="font-weight: bold;" id="exampleModalLabel">Eliminar Usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="text-danger" style="font-weight: bold;">Advertencia: </p> 
              <p>Esta a punto de eliminar un usuario del sistema, esta seguro de que desea hacerlo?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn text-center" style=" border-radius: 25px; background-image: linear-gradient(to right,#5aff15, #00b712); border: 0px; color: #fff;" data-dismiss="modal">Cancelar</button>
              <button type="submit" formaction="/baja-usuario" class="btn text-center" style=" border-radius: 25px; background-image: linear-gradient(to right,#ff0000, #990000); border: 0px; color: #fff;">Eliminar Usuario</button>
            </div>
          </div>
        </div>
      </div>
  </form>

                            
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="../js/menu.js"></script>
</body>
</html>