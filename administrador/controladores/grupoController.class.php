<?php
require '../utils/autoloader.php';

class grupoController extends grupoModelo{

    public static function preAltaDeGrupo($idGrupo,$tipoDeOrienacion){
        echo "aca" .$idGrupo;
        if($idGrupo != "" && $tipoDeOrienacion !=""){
            try{
                $g = new grupoModelo;
                $g -> idGrupo = $idGrupo;
                $g ->  tipoDeOrienacion = $tipoDeOrienacion;
                $g -> guardarGrupo();
                
            }catch(Exception $e){
                return generarHtml('crearGrupo', ['exito' => false]);
                    error_log($e -> getMessage());
                    return "No se pudo guardar ";

            }
        }else{
            return generarHtml('crearGrupo', ['exito' => false]);
        }
    }








}