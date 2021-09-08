<?php

require '../utils/autoloader.php';
class UsuarioModelo extends Modelo{
    
    public $nombre;
    public $primerApellido;
    public $segundoApellido;
    public $usuario;
    public $contrasenia;
    public $cedula;
    public $estado;
    public $tipoDeUsuario;
    

    public function guardarUsuario(){ 
        $this -> checkearUsuario($this -> usuario) ? generarHtml("registro" .$this->tipoDeUsuario , ['exito' => false]) : $this -> prepararInsercion();
        $this -> sentencia -> execute();

        if($this -> sentencia -> error){
            throw new Exception("Lo sentimos hubo un problema al registrar al usuario" . $this -> sentencia -> error);
        }
    }

    private function prepararInsercion(){
            $this -> contrasenia = $this -> hashearContrasenia( $this -> contrasenia);
            $sql = "INSERT INTO usuario (cedula, nombre, primerApellido, segundoApellido, usuario, contrasenia, tipoDeUsuario, estado) VALUES (?,?,?,?,?,?,?,?)";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("isssssss",
                $this -> cedula,
                $this -> nombre,
                $this -> primerApellido,
                $this -> segundoApellido,
                $this -> usuario,
                $this -> contrasenia,
                $this -> tipoDeUsuario,
                $this -> estado
            );

    }

    private function checkearUsuario($usuario){ 
            $sql = "SELECT usuario FROM usuario WHERE usuario= ? ";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("s", $usuario);
            $this -> sentencia -> execute();
            $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
            if ($resultado['usuario'] === $usuario):
                return true;
            elseif($resultado['usuario'] !== $usuario):
                return false;
            endif;
    }

   
    
    //iniciar sesion
    public function autenticar(){
        $this -> prepararAutenticacion();
        $this -> sentencia -> execute();

        $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
       

        if($this -> sentencia -> error){
            
            throw new Exception ("Error al obtener el usuario: " . $this -> sentencia -> error);

        }

        if($resultado){
           
            $comparacion = $this -> compararPasswords($resultado['contrasenia']) && $resultado['estado'] == "pendiente" ;
            if($comparacion){
                $this -> asignarDatosDeUsuario($resultado);
            }
            else{
                throw new Exception ("Error al iniciar sesion");
            }

        }
        else throw new Exception ("Error al iniciar sesion");
    }
    private function compararPasswords($contraseniaHasheada){
        return password_verify($this -> contrasenia, $contraseniaHasheada);
    }
    
    private function prepararAutenticacion(){
        $sql= "SELECT  cedula,nombre, primerApellido, segundoApellido, usuario, contrasenia, tipoDeUsuario, estado FROM usuario WHERE usuario= ? ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("s", $this -> usuario);
    }
    private function asignarDatosDeUsuario($resultado){
        $this -> cedula = $resultado ['cedula'];
        $this -> nombre = $resultado['nombre'];
        $this -> primerApellido = $resultado['primerApellido'];
        $this -> segundoApellido = $resultado['segundoApellido'];
        $this -> usuario = $resultado['usuario'];
        $this -> contrasenia  = $resultado['contrasenia'];
        $this -> tipoDeUsuario= $resultado['tipoDeUsuario'];
        $this -> estado = $resultado['estado'];
    }
    //iniciar sesion
   











   //funciones de administrador
    public function listarUsuariosPendientes(){
        $this -> prepararListadoDeUsuariosPendientes();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        
        return $resultado;
    }

    public function guardarEstadoUsuarios(){
        $this -> prepararActualizacionDeEstadoUsuarios($this -> cedula );
        $this -> sentencia -> execute();
    }

    public function eliminarUsuarios(){
        $this -> prepararEliminacionDeUsuarios($this -> cedula);
        $this-> sentencia -> execute();
    }
    
    private function prepararListadoDeUsuariosPendientes(){
        $sql = "SELECT  cedula,nombre, primerApellido, segundoApellido, usuario, contrasenia, tipoDeUsuario, estado FROM usuario WHERE usuario= ? ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
    }


    private function prepararActualizacionDeEstadoUsuarios($cedula){
        $sql = "UPDATE Alumno SET estado='aprobado' WHERE cedula= ? ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i", $cedula);
    }


    private function prepararEliminacionDeUsuarios($cedula){
        $sql = "DELETE FROM Alumno WHERE cedula= ?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i", $cedula);
    }
    
    
  
    private function prepararListadoDeUsuariosAprobados(){
        $sql = "SELECT idDocente, nombreDocente, primerApellidoDocente, segundoApellidoDocente, cedulaDocente, grupoDocente, usuarioDocente FROM Docente WHERE estadoDocente='aprobado'";
        $this -> sentencia = $this -> conexion -> prepare($sql);
    }
    public function listarUsuariosAprobados(){
        $this -> prepararListadoDeUsuariosAprobados();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        
        return $resultado;

    }
 
    
    //funciones de administrador


    //
    //





    


}