<?php
require '../utils/autoloader.php';

class grupoController extends grupoModelo{

    public static function preAltaDeGrupo($idGrupo,$tipoDeOrientacion){
        if($idGrupo != "" && $tipoDeOrientacion !=""){
            try{
                $g = new grupoModelo();
                $g -> idGrupo = $idGrupo;
                $g -> tipoDeOrientacion = $tipoDeOrientacion;
                if($g -> guardarGrupo() == false){
                    return generarHtml('crearGrupo', ['exito' => false], "El grupo que trato de crear ya existe");
                } else {
                    return generarHtml('crearGrupo', ['exito' => true], "Se creo el grupo con exito");
                }
            }catch(Exception $e){
                return generarHtml('crearGrupo', ['exito' => false], "Error inesperado");
                    error_log($e -> getMessage());
                    return "No se pudo guardar ";
            }
        }else{
            return generarHtml('crearGrupo', ['exito' => false], "No se ingreso ningun nombre para el grupo");
        }
    }


    public static function mostrarGrupoDeUsuario(){
        $grupo = new grupoModelo();
        $grupo -> cedula = $_SESSION['cedula'];
        if($grupo -> traerGrupoDeUsuario() == false){
            return false;
        }else{
            return $grupo -> traerGrupoDeUsuario();
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


    public static function asignarVariableDeSessionIdGrupo($idGrupoDeUsuario,$vista){
        if($idGrupoDeUsuario != ""){
            grupoController::prepararAsignacionDeIdGrupo($idGrupoDeUsuario); 
            return header('Location: /'.$vista);
        } else {
            generarHtml($vista,['exito' => false ],"Seleccione un Grupo valido");
        }
    }


    private static function prepararAsignacionDeIdGrupo($idGrupoDeUsuario){
            ob_start();
            $_SESSION['idGrupoDeUsuario'] = $idGrupoDeUsuario;   
    }

    
    public function eliminarGrupos($idGrupo){
        if($idGrupo !=""){
            try{
                $g = new grupoModelo();
                $g -> preBorrarGrupo($idGrupo);
                return generarHtml("eliminarGrupos",['exito' => true],"Se elimino el grupo con exito");
            }catch(Exception $e){
                return generarHtml("eliminarGrupos",['exito' => false],"Ocurrio un error, por favor intente denuevo");
            }

        }else{
            return generarHtml("eliminarGrupos",['exito' => false],"Ocurrio un error, por favor intente denuevo");
        }
    }

   
}