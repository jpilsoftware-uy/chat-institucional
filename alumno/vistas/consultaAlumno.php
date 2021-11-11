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

    <title>Enviar una consulta | Alumno</title>
</head>
<body>
<section class="vh-100" style="background: linear-gradient(to bottom right, #009ffd, #2a2a72)">
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
                        <form action="" method="POST">
                            <p class="text-center h1 mb-5 mx-1 mx-md-4 mt-4" style="background: linear-gradient(to right, #009ffd, #2a2a72);-webkit-background-clip: text; -webkit-text-fill-color: transparent;">Enviar Consultas</p>


                        <?php
                                                $grupo = new grupoController();
                                                $grupos = $grupo -> mostrarGrupoDeUsuario();
                                                echo "<select class='form-control' name='idGrupoDeUsuario'>";
                                                echo "<option selected disabled hidden>Seleccione grupo</option>";
                                                foreach($grupos as $grupo){
                                                    echo "<option  value='$grupo[idGrupoDeUsuario]'>" . $grupo['idGrupoDeUsuario'] ."</option>";
                                                } 
                                                echo "</select>" ;   
                                                ?>
                                            
                                            <button type="submit" formaction="/mostrarProfesoresDelGrupo"  class="btn btn-md mr-3 mt-3" style=" border-radius: 25px; background-image: linear-gradient(to right,#09c6f9, #045de9); border: 0px; color: #fff;">
                                            Mostrar Profesores
                                            </button>
                                                    
                                                    
                                            
                                                <?php
                                                    $profesor = new usuarioController();
                                                    $profesores = $profesor -> mostrarProfesoresDelGrupo();
                                                    
                                                        
                                                    echo "<select class='form-control mt-3' name='cedulaProfesor'>";
                                                    echo "<option selected disabled hidden>Seleccione Profesor</option>";
                                                    foreach($profesores as $profesor){
                                                        echo "<option value='" .$profesor['cedula']. "' >" . $profesor['nombre'] . " " . $profesor['primerApellido'] . "</option>";
                                                    }
                                                        echo "</select>" ;  
                                                   
                                                ?>
                                        <div class="d-flex flex-row align-items-center mb-4 input-group mt-3">
                                            <div class="input-group-prepend">
                                                <label>Mensaje:</label> <br>
                                                <textarea name="mensajeConsulta" id="mensajeConsulta" class="md-textarea form-control" rows="3" placeholder="Ingrese una consulta para el profesor"></textarea>
                                            </div>
                                        </div>
                                                
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" formaction="/insertarConsulta" class="btn btn-md mr-3" style="border-radius: 25px; background-image: linear-gradient(to right,#5aff15, #00b712); border: 0px; color: #fff; font-weight: bold;">Enviar Mensaje</button>
                                        <button type="submit" formaction="/principalAlumno" class="btn btn-md mr-3" style="border-radius: 25px; background-image: linear-gradient(to right,#09c6f9, #045de9); border: 0px; color: #fff; font-weight: bold;">Volver</button>
                                    </div>                                        
            </form>
                                    
                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</section>
</body>
</html>