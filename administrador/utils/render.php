<?php
    require '../utils/autoloader.php';

    function generarHtml($vista, $parametros, $mensaje){
        return require "../vistas/$vista.php";
    }

    function cargarVista($vista){
        generarHtml($vista, null, null);
    }
    
