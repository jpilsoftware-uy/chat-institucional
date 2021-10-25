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
    <title>Chat | Profesor</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#modalInformacion").modal('show');
        });
    </script>
</head>

<body id="body">
  

    <header>
        <div class ="icon_menu" > 
            <i class="fas fa-bars" id="botonAbrir"></i>
            
        </div>
        <div class="mensajeDeBienvenida">
        <?php 
        echo "<h1 class='ml-4'>Inicio de chat </h1>";
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
            <a href="/principalProfesor">
                <div class="opcion">
                <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>                
            </a>
            <a href="/modificar-datos-usuario"  >
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
    

    <?php if(isset($parametros['exito']) && $parametros['exito'] == true && $mensaje !== ""): 
        echo "<div class='alert alert-success' > " . $mensaje .  " </div>";
        endif; 
    ?>

    <?php if(isset($parametros['exito']) && $parametros['exito'] == false && $mensaje !== ""): 
        echo " <div class='alert alert-danger'> " . $mensaje  . " </div> ";
        endif; 
    ?>
        
        <h1 class="Titulo">Seleccione Grupo</h1>
               
                <form action="" method="POST">
                <div class="grupos">
                <?php
                $grupo = new grupoController();
                $grupos = $grupo -> mostrarGrupoDeUsuario();
                if($grupos == false){
                    
                    echo "<select  class='opcionGrupos'> ";
                    echo "<option>". "No tienes grupo" ."</option>";
                    echo "</select>" . "</br>";
                }else{ 
                    echo "<select name='grupo' class='opcionGrupos'>";
                    foreach($grupos as $grupo){
                        
                    echo "<option>" . $grupo['idGrupoDeUsuario'] ."</option>";
                    }
                    echo "</select>";
                }   
                ?>
                </div>
                <button action="submit" formaction="/crearChat" value="$grupo['idGrupoDeUsuario']">Iniciar Chat</button>
                <button action="submit" formaction="/pre-chat">Volver atras</button>
            </form>
            
           

            

                          

                            
    </main>
    
    <script src="../js/menu.js"></script>
</body>
</html>