<?php

require '../utils/autoloader.php';

class orientacionesController extends orientacionesModelo{
   
 
	public static function mostrarMaterias(){
		$materias = new orientacionesModelo();
		$materias -> idGrupo = $_SESSION['idGrupoDeUsuario'];
		if($materias -> traerOrientacion() == false){
			return false;
		} else {
			return $materias -> traerOrientacion();
		} 
	}


	public static function mostrarMateriasDeProfesor(){
		
		$materias = new orientacionesModelo();
		$materias-> idGrupo = $_SESSION['idGrupoDeUsuario'];
		if($materias -> traerMateriaYGrupo() == false){
			return false;
		} else {
			return $materias -> traerMateriaYGrupo();
		} 
	}

	
	public static function preCrearOrientacion($tipoDeOrientacion, $materia1, $materia2, $materia3, $materia4, $materia5, $materia6, $materia7, $materia8, $materia9, $materia10, $materia11, $materia12, $materia13){
		if ($materia1 == "" && $materia2 == "" && $materia3 == "" && $materia4 =="" && $materia5 == "" && $materia6 == "" && $materia7 == "" && $materia8 == "" && $materia9 == "" && $materia10 == "" && $materia11 == "" && $materia12 == "" && $materia13 == "") {
			return generarHtml('crearOrientacion', ['exito' => false], "No se puede crear una orientacion con todas las materias vacias");
		} else {
			if($tipoDeOrientacion == ""){
				return generarHtml('crearOrientacion', ['exito' => false], "El campo nombre de orientacion esta vacio");
			} else {
				try{
					$o = new orientacionesModelo();
					$o -> tipoDeOrientacion = $tipoDeOrientacion;
					if(!empty($materia1)){
						$o -> materia1 = $materia1;
					} else {
						$o -> materia1 = "vacio";
					}
					if(!empty($materia2)){
						$o -> materia2 = $materia2;
					} else {
						$o -> materia = "vacio";
					}
					if(!empty($materia3)){
						$o -> materia3 = $materia3;
					} else {
						$o -> materia3 = "vacio";
					}
					if(!empty($materia3)){
						$o -> materia3 = $materia3;
					} else {
						$o -> materia3 = "vacio";
					}
					if(!empty($materia4)){
						$o -> materia4 = $materia4;
					} else {
						$o -> materia4 = "vacio";
					}
					if(!empty($materia5)){
						$o -> materia5 = $materia5;
					} else {
						$o -> materia5 = "vacio";
					}
					if(!empty($materia6)){
						$o -> materia6 = $materia6;
					} else {
						$o -> materia6 = "vacio";
					}
					if(!empty($materia7)){
						$o -> materia7 = $materia7;
					} else {
						$o -> materia7 = "vacio";
					}
					if(!empty($materia8)){
						$o -> materia8 = $materia8;
					} else {
						$o -> materia8 = "vacio";
					}
					if(!empty($materia9)){
						$o -> materia9 = $materia9;
					} else {
						$o -> materia9 = "vacio";
					}
					if(!empty($materia10)){
						$o -> materia10 = $materia10;
					} else {
						$o -> materia10 = "vacio";
					}
					if(!empty($materia11)){
						$o -> materia11 = $materia11;
					} else {
						$o -> materia11 = "vacio";
					}
					if(!empty($materia12)){
						$o -> materia12 = $materia12;
					} else {
						$o -> materia12 = "vacio";
					}
					if(!empty($materia13)){
						$o -> materia13 = $materia13;
					} else {
						$o -> materia13 = "vacio";
					}
					$resultado = $o -> crearOrientacion();
					if($resultado){
						return generarHtml('crearOrientacion', ['exito' => true], "Orientacion creada con exito");
					} else {
						return generarHtml('crearOrientacion', ['exito' => false], "La orientacion que se intento crear ya existe");
					}
				} catch (Exception $e) {
					echo "error, contacte a los desarrolladores";
					return false;
				}
			}
		}
	}
  
    public static function mostrarOrientaciones(){
        $o = new orientacionesModelo();
        $orientacion = $o -> listarOrientaciones();
        return $orientacion;
    }

	public static function preEliminarOrientaciones($tipoDeOrientacion){
		if(empty($tipoDeOrientacion)){
			return generarHtml('eliminarOrientaciones', ['exito' => false], "Elija una orientacion para eliminar");
		} else {
			$o = new orientacionesModelo();
			$o -> tipoDeOrientacion = $tipoDeOrientacion;
			$resultado = $o -> eliminarOrientacion();
			if($resultado){
				return generarHtml('eliminarOrientaciones', ['exito' => true], "Orientacion eliminada con exito");
			} else {
				return generarHtml('eliminarOrientaciones', ['exito' => false], "La orientacion que se ingreso no existe");
			}
		}
	}
}