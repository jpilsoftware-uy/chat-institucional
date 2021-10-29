<?php
require '../utils/autoloader.php';

class materiaController extends materiaModelo{

    public static function insertarMateria($materia){
        if($materia !="" ){
            try{
                $g = new MateriaModelo();
                $g -> materia = $materia;
                $g -> idGrupoDeUsuario = $_SESSION['idGrupoDeUsuario']; 
                $g -> cedula = $_SESSION['cedula'];
                $g -> nombre = $_SESSION['nombre'];
                $g -> primerApellido = $_SESSION['primerApellido'];
                $g -> tipoDeUsuario = $_SESSION['tipoDeUsuario'];
                if($g -> guardarMateriaDeUsuario() == true){
                    return generarHtml('elegirMateria', ['exito' => true],"Se unio a la Materia con exito");
                }else{
                    return generarHtml('elegirMateria', ['exito' => false],"Usted ya esta en el Materia");
                }
            }catch(Exception $e){
                return generarHtml('elegirMateria', ['exito' => false],"No se pudo unir al Materia");
                    error_log($e -> getMessage());
                    return "No se pudo guardar ";
            }
        }else{
            return generarHtml('elegirMateria', ['exito' => false], "Ingrese un Materia");
        }
    }


    
    
    
}