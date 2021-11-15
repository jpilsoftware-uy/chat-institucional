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
    <title>Menu Principal | Profesor</title>
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
        echo "<h1 class='ml-4'>Bienvenido ". $_SESSION['nombre']. " !</h1>";
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
            <a href="/principalProfesor" >
                <div class="opcion">
                <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>                
            </a>
            <a href="/modificar-datos-usuario" class="seleccionado">
                <div class="opcion">
                    <i class="fas fa-user-edit" title="Editar perfil"></i>
                    <h4>Editar perfil</h4>
                </div>                
            </a>
            <a href="/eliminar-usuario">
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
    <section class="vh-100" style="background: linear-gradient(to bottom right, #009ffd, #2a2a72)">
    <?php if(isset($parametros['exito']) && $parametros['exito'] == true && $mensaje !== ""): 
        echo "<div class='alert alert-success' > " . $mensaje .  " </div>";
        endif; 
    ?>

    <?php if(isset($parametros['exito']) && $parametros['exito'] == false && $mensaje !== ""): 
        echo " <div class='alert alert-danger'> " . $mensaje  . " </div> ";
        endif; 
    ?>

        <div class="card-deck-wrapper">
        <div class="card mt-4 mb-4 text-center mx-4">
        <div class="card-header" style="background: linear-gradient(to right, #009ffd, #2a2a72); color: white; font-weight: bold; text-align: center;"> Materias </div>
        <div class="card-body">
        <form action="" method="POST">
                                    <div class="d-flex flex-row align-items-center mb-4 input-group">
                                            
                                        <div class="d-flex flex-row align-items-center mb-4 input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Grupo</span>
                                            </div>
                                            <?php
                                               $grupo = new grupoController();
                                               $grupos = $grupo -> mostrarGrupoDeUsuario();
                                               if($grupos == false ){
                                                echo "<select class='form-control' name='idGrupoDeUsuario'>";
                                                echo "<option selected disabled hidden>Usted no tiene grupo</option>";
                                               }else{
                                                    echo "<select class='form-control' name='idGrupoDeUsuario'>";
                                                    echo "<option selected disabled hidden>Seleccione grupo</option>";
                                                    foreach($grupos as $grupo){
                                                        echo "<option  value='$grupo[idGrupoDeUsuario]'>" . $grupo['idGrupoDeUsuario'] ."</option>";
                                                    }
                                                 
                                               }
                                                
                                               echo "</select>" ;   
                                               ?>
                                           
                                           <button type="submit" formaction="/mostrarMateria"  class="btn btn-md mr-3" style=" border-radius: 25px; background-image: linear-gradient(to right,#09c6f9, #045de9); border: 0px; color: #fff;">
                                           Mostrar Materias
                                           </button>
                                                
                                                  
                                            </form>
                                            <form action="" method="POST"> 
                                            <?php
                                                $materia = new orientacionesController();
                                                $materias = $materia -> mostrarMaterias();
                                                echo "<select class='form-control' name='materia'>";
                                                
                                                if($materias == false){
                                                    
                                                    echo "<option selected disabled hidden>No tiene materias</option>";              
                                                }else{
                                                    foreach($materias as $materia){
                                                    echo "<option selected disabled hidden>$materia[tipoDeOrientacion]</option>";
                                                    echo "<option value='$materia[materia1]'>" . $materia['materia1'] ."</option>";
                                                    echo "<option value='$materia[materia2]'>" . $materia['materia2'] ."</option>";
                                                    echo "<option value='$materia[materia3]'>" . $materia['materia3'] ."</option>";
                                                    echo "<option value='$materia[materia4]'>" . $materia['materia4'] ."</option>";
                                                    echo "<option value='$materia[materia5]'>" . $materia['materia5'] ."</option>";
                                                    echo "<option value='$materia[materia6]'>" . $materia['materia6'] ."</option>";
                                                    echo "<option value='$materia[materia7]'>" . $materia['materia7'] ."</option>";
                                                    echo "<option value='$materia[materia8]'>" . $materia['materia8'] ."</option>";
                                                    echo "<option value='$materia[materia9]'>" . $materia['materia9'] ."</option>";
                                                    echo "<option value='$materia[materia10]'>" . $materia['materia10'] ."</option>";
                                                    echo "<option value='$materia[materia11]'>" . $materia['materia11'] ."</option>";
                                                    echo "<option value='$materia[materia12]'>" . $materia['materia12'] ."</option>";
                                                    echo "<option value='$materia[materia13]'>" . $materia['materia13'] ."</option>"; 
                                                    }
                                                }
                                                echo "</select>" ;
                                                ?>
                                                                                             
                                        </div>
                                     
                                </div>
                                <button type="submit" formaction="/insertarMateria"  class="btn btn-md mr-3" style=" border-radius: 25px; background-image: linear-gradient(to right,#09c6f9, #045de9); border: 0px; color: #fff;">
                                Elegir materia
                                </button>
                            </form>

                                    
                                                <p class="card-text"> En esta seccion puedes elegir la materia. </p>
                                                
                                                <a href="/modificar-datos-usuario" class="btn" style=" border-radius: 25px; background-image: linear-gradient(to right,#009ffd, #2a2a72); border: 0px; color: #fff; font-weight: bold;">Volver</a>

                                                <p class="card-text mt-1">
                                                    <small class="text-muted"> Ultima actualizacion: 10/28/2021 </small>
                                                </p>
                                            </div>
                                    </div>
                                    
                            
    </main>
    
    <script src="../js/menu.js"></script>

</body>
</html>