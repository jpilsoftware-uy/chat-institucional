<?php

require '../utils/autoloader.php';

class orientacionesController extends orientacionesModelo{
   
    
 
        public static function mostrarMaterias(){
            
            $materias = new orientacionesModelo();
            $materias-> idGrupo = $_SESSION['idGrupoDeUsuario'];
                
                if($materias -> traerOrientacion() == false){
                return false;
                }else{
                return $materias -> traerOrientacion();
                } 
        }


        public static function mostrarMateriasDeProfesor(){
            
                $materias = new orientacionesModelo();
                $materias-> idGrupo = $_SESSION['idGrupoDeUsuario'];
                    
                    if($materias -> traerMateriaYGrupo() == false){
                    return false;
                    }else{
                    return $materias -> traerMateriaYGrupo();
                    } 
            }

    

}