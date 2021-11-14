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
    <title>Unirse A Chat | Alumno</title>
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
            <a href="/principalAlumno">
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
        
        <h1 class="Titulo">Unirse A chat</h1>
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
                                               if($grupos == false){
                                                echo "<select class='form-control' name='idGrupoDeUsuario'>";
                                                echo "<option selected disabled hidden>Usted no pertenece a ningun grupo</option>";
                                               }else{
                                                    echo "<select class='form-control' name='idGrupoDeUsuario'>";
                                                    echo "<option selected disabled hidden>Seleccione grupo</option>";
                                                    foreach($grupos as $grupo){
                                                    echo "<option  value='$grupo[idGrupoDeUsuario]'>" . $grupo['idGrupoDeUsuario'] ."</option>";
                                                    }
                                               }
                                                
                                               echo "</select>" ;   
                                               ?>
                                           
                                           <button type="submit" formaction="/mostrarChats"  class="btn btn-md mr-3" style=" border-radius: 25px; background-image: linear-gradient(to right,#09c6f9, #045de9); border: 0px; color: #fff;">
                                           Mostrar Chats
                                           </button>
                                                
                                                  
                                            </form>
                                            <form action="" method="POST"> 
                                            <?php
                                                $chat = new chatController();
                                                $chats = $chat -> mostrarChats();
                                                
                                                
                                                    echo "<select class='form-control' name='idChat'>";
                                                    echo "<option selected disabled hidden>Seleccione Chat</option>";
                                                    foreach($chats as $chat){
                                                    echo "<option  value='$chat[idChat]'>"."Chat de ".$chat['grupo']." ".$chat['materia']."</option>";
                                                                  
                                                    } 
                                                
                                                
                                                    echo "</select>" ;  
                                                    
                                                    
                                                
                                            ?>
                                                                                             
                                        </div>
                                     
                                    </div>
                                <button type="submit" formaction="/iniciar-chat" class="btn btn-md mr-3" style=" border-radius: 25px; background-image: linear-gradient(to right,#09c6f9, #045de9); border: 0px; color: #fff;">
                                Unirse Chat
                                </button>
                                <button type="submit" formaction="/pre-chat"  class="btn btn-md mr-3" style=" border-radius: 25px; background-image: linear-gradient(to right,#09c6f9, #045de9); border: 0px; color: #fff;">
                                Volver atras
                                </button>
                
            </form>
            
                

            

                          

                            
    </main>
    
    <script src="../js/menu.js"></script>
</body>
</html>