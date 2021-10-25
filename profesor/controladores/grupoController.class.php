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
    public static function mostrarGrupoDeUsuario(){
        $g = new grupoModelo();
        $g -> cedula = $_SESSION['cedula'];
        $grupo = $g -> prepararGrupoDeUsuario();
        if(empty($grupo)){
            return false;
        }else{
            return $grupo;
        }

    }




    public static function unirseAGrupo($idGrupoDeUsuario){
       
        if($idGrupoDeUsuario !="" ){
            
            try{
                $g = new grupoModelo();
                $g -> idGrupoDeUsuario = $idGrupoDeUsuario; 
                $g -> cedula = $_SESSION['cedula'];
                $g -> nombre = $_SESSION['nombre'];
                $g -> primerApellido = $_SESSION['primerApellido'];
                $g -> tipoDeUsuario = $_SESSION['tipoDeUsuario'];
                
                if($g -> guardarGrupoDeUsuario() == true){
                    return generarHtml('actualizarUsuario', ['exito' => true],"Se unio al grupo con exito");
                }else{
                    return generarHtml('actualizarUsuario', ['exito' => false],"Usted ya esta en el grupo");
                }
                
            }catch(Exception $e){
                return generarHtml('actualizarUsuario', ['exito' => false],"No se pudo unir al grupo");
                    error_log($e -> getMessage());
                    return "No se pudo guardar ";
            }

        }else{
           
            return generarHtml('actualizarUsuario', ['exito' => false], "Ingrese un grupo");
        }
    }

    public static function mostrarGrupo(){
        $g = new grupoModelo();
        $g -> cedula = $_SESSION['cedula'];      
        $grupo = $g -> prepararGrupo();
        return $grupo;

    }


    
    public static function mostrarGrupoParaElgir(){
        $g = new grupoModelo();
        $grupo = $g -> prepararGrupoParaElegir();
        return $grupo;
    }
    
}