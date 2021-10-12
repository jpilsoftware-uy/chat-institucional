<?php
require '../utils/autoloader.php';

class grupoController extends grupoModelo{

    public static function preAltaDeGrupo($idGrupo,$tipoDeOrientacion){
        
        if($idGrupo != "" && $tipoDeOrientacion !=""){
            try{
                $g = new grupoModelo();
                $g -> idGrupo = $idGrupo;
                $g -> tipoDeOrientacion = $tipoDeOrientacion;
                $g -> guardarGrupo();
                return generarHtml('crearGrupo', ['exito' => true]);
                
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