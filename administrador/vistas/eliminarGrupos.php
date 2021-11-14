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
  <link rel="stylesheet" href="eliminar-usuarios.css">
  <link rel="icon" href="https://i.ibb.co/qMgNQf5/Logo-Dibujo.png" />
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
    crossorigin="anonymous"
  />
  <title>Eliminar Usuarios</title>
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
  <form action="" method="POST">
    <div class="container h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-lg-12 col-xl-11">
                                <div class="card text-black" style="border-radius: 25px">
                                    <div class="card-body p-md-5">
                                        <div class="row justify-content-center">
                                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                            
                                            <form action="" method="POST"> 
                                            <?php
                                               $grupo = new grupoController();
                                               $grupos = $grupo -> mostrarGrupoParaElgir();

                                               echo "<select class='form-control' name='idGrupo'>";
                                               echo "<option selected disabled hidden>Seleccione un grupo</option>";
                                               foreach($grupos as $grupo){
                                                   echo "<option value='$grupo[idGrupo]'>".$grupo['idGrupo']. "</option>";
                                                } 
                                                    echo "</select>" ;  
                                                    
                                                    
                                                
                                            ?>
                                                  
                                <button type="submit" formaction="/borrarGrupo" class="btn btn-md mr-3 mt-4" style=" border-radius: 25px; background-image: linear-gradient(to right,#09c6f9, #045de9); border: 0px; color: #fff;">
                                EliminarGrupo
                                </button>
                                <button type="submit" formaction="/moduloGrupos"  class="btn btn-md mr-3 mt-4" style=" border-radius: 25px; background-image: linear-gradient(to right,#09c6f9, #045de9); border: 0px; color: #fff;">
                                Volver atras
                                </button>                                              
                                        </div>
                                     
                                    </div>
                                
                                        </div>
                                                
                                       </div>
                                      
                                      
                                    </div>
                               
                                </div>

                                
                            </div>
                            
                        
                        </div>
                                            
                        </form>
                          
                       
                        
                              
                        
         
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
        </div>  
                      
                                
  </form>
  </section>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>

