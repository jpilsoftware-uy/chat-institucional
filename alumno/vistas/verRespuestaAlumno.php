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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


    

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <title>Respuestas Recientes | Alumno</title>

    <script text="javascript">
            $(window).on("beforeunload", function() { 
                Location.replace('/consultaTerminada');    
            })
    </script>
</head>
<body>
    <section class="vh-100" style="background: linear-gradient(to bottom right, #009ffd, #2a2a72)">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-10 col-xl-10 order-2 order-lg-1 text-center">
                                    <p class="text-center h1 mb-5 mx-1 mx-md-4 mt-4" style="background: linear-gradient(to right, #009ffd, #2a2a72);-webkit-background-clip: text; -webkit-text-fill-color: transparent;">Consultas Recientes</p>
                                    <table class="table table-striped table-fixed">
                                        <thead class="text-center" style="background: linear-gradient(to bottom right, #009ffd, #2a2a72)">
                                            <tr>
                                                <th style="color: white; font-weight: bold;">Profesor</th>
                                                <th style="color: white; font-weight: bold;">Mensaje Consulta</th>
                                                <th style="color: white; font-weight: bold;">Mensaje Respuesta</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            <?php
                                                $respuesta = new ConsultaController();
                                                $respuestas = $respuesta -> mostrarRespuesta();
                                                if($respuestas == false){
                                                    echo "<tr>";
                                                    echo "<td colspan='3'> Usted no tiene consultas recientes </td>";
                                                    echo "</tr>";
                                                } else {
                                                    foreach($respuestas as $respuesta){
                                                        echo "<tr>";
                                                        echo "<td> " . $respuesta['usuarioProfesor'] . "</td>";
                                                        echo "<td> " . $respuesta['mensajeConsulta'] . "</td>";
                                                        echo "<td> " . $respuesta['mensajeRespuesta'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <form action="/consultaTerminada" method="post">
                                        <button type="submit" class="btn text-center" style=" border-radius: 25px; background-image: linear-gradient(to right,#09c6f9, #045de9); border: 0px; color: #fff; font-weight: bold;">Volver al Inicio</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </section>

<!--
<table>
        <thead>
            <th>Nombre</th>
            <th>Consulta</th>
            <th>Respuesta</th>
            
        </thead>
        <form action="/consultaTerminada" method="POST">
        <tbody>
            <?php

                /*
                $respuesta = new ConsultaController();
                $respuestas = $respuesta -> mostrarRespuesta();
                

                foreach($respuestas as $respuesta){
                    echo "<tr>";
                    echo "<td> " . $respuesta['usuarioProfesor'] . "</td>";
                    echo "<td> " . $respuesta['mensajeConsulta'] . "</td>";
                    echo "<td> " . $respuesta['mensajeRespuesta'] . "</td>";
                    echo "</tr>";
                }
                */
            ?>
           
   
        </tbody>
        
    </table>

         <button action ="submit"formaction="/consultaTerminada">Volver</button>  
         
         </form>
    -->

</body>
</html>