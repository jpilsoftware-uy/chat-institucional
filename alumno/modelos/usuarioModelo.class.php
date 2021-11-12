<?php

require '../utils/autoloader.php';
class usuarioModelo extends modelo{
    
    public $nombre;
    public $primerApellido;
    public $segundoApellido;
    public $usuario;
    public $contrasenia;
    public $cedula;
    public $estado;
    public $tipoDeUsuario;
    public $email;
    


    public function guardarUsuario(){
       

        if( $this -> checkearUsuario($this -> usuario)  == true || $this -> checkearCedula($this -> cedula) == true || $this -> checkearEmail($this -> email) == true ){
            
            return false;
           
        } else if( $this -> checkearUsuario($this -> usuario) == false || $this -> checkearCedula($this -> cedula) == false || $this -> checkearEmail($this -> email) == false){
            
            $this -> prepararInsercion();
            $this -> sentencia -> execute();
            return true;
        }

        if($this -> sentencia -> error){
            throw new Exception("Lo sentimos hubo un problema al registrar al usuario" . $this -> sentencia -> error);
        }
    }

    private function prepararInsercion(){
            
            $this -> contrasenia = $this -> hashearContrasenia( $this -> contrasenia);
            $sql = "INSERT INTO usuario (cedula, nombre, primerApellido, segundoApellido, usuario, contrasenia, tipoDeUsuario, estado, email)  VALUES (?,?,?,?,?,?,?,?,?)";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("issssssss",
                $this -> cedula,
                $this -> nombre,
                $this -> primerApellido,
                $this -> segundoApellido,
                $this -> usuario,
                $this -> contrasenia,
                $this -> tipoDeUsuario,
                $this -> estado,
                $this -> email
            );
    }

    private function checkearUsuario($usuario){ 
            $sql = "SELECT usuario FROM usuario WHERE usuario= ? ";
            $this -> sentencia = $this -> conexion -> prepare($sql);
            $this -> sentencia -> bind_param("s", $usuario);
            $this -> sentencia -> execute();
            $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
            if ($resultado['usuario'] === $usuario){
                return true;
            } else if ($resultado['usuario'] !== $usuario){
                return false;
            }
    }

   private function checkearCedula($cedula){
       $sql = "SELECT cedula FROM usuario WHERE cedula = ?";
       $this -> sentencia = $this -> conexion -> prepare($sql);
       $this -> sentencia -> bind_param("i", $cedula);
       $this -> sentencia -> execute();
       $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
       if($resultado['cedula'] == $cedula){
           return true;
       } else if ($resultado['cedula'] != $cedula){
           return false;
       }
   }
   private function checkearEmail($email){
       
       $sql ="SELECT email FROM usuario WHERE email=?";
       $this -> sentencia = $this -> conexion -> prepare($sql);
       $this -> sentencia -> bind_param("s", $email);
       $this -> sentencia -> execute();
       $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
       if($resultado['email'] === $email){
        return true;
       }else if($resultado['email'] !== $email) {
           return false;

       }
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
            $comparacion = $this -> compararPasswords($resultado['contrasenia']) && $resultado['estado'] == "aprobado" &&  $resultado['tipoDeUsuario'] == $this -> tipoDeUsuario;
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
        $sql= "SELECT cedula, nombre, primerApellido, segundoApellido, usuario, contrasenia, tipoDeUsuario, estado, email FROM usuario WHERE usuario= ? ";
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
        $this -> email = $resultado['email'];
    }
    //iniciar sesion
    
    //modificar datos

    public function actualizarUsuario($usuarioDeComparacion, $tipoDeUsuario){
        if($tipoDeUsuario === 'Profesor' || $tipoDeUsuario === 'Alumno'){
            if($this -> usuario !== $usuarioDeComparacion){
                if($this -> checkearUsuario($this -> usuario) == false){
                    $this -> prepararActualizacionDeUsuario();
                    $this -> sentencia -> execute();
                    return true;
                } else {
                    return false;
                }
            } else {
                $this -> prepararActualizacionDeUsuario();
                $this -> sentencia -> execute();
                return true;
            }
        } else if ($tipoDeUsuario === 'Administrador'){
            if($this -> checkearCedula($this -> cedula) == true){
                $resultado = self::listarUsuario($this -> cedula);
                if($resultado['usuario'] === $this -> usuario){
                    $this -> prepararActualizacionDeUsuario();
                    $this -> sentencia -> execute();
                    return true;
                } else {
                    if($this -> checkearUsuario($this -> usuario) == false){
                        $this -> prepararActualizacionDeUsuario();
                        $this -> sentencia -> execute();
                        return true;
                    } else {
                        return false;
                    }
                } 
            } else {
                return false;
            }
        }
    }

    public function listarUsuario($cedula){
        $this -> prepararListadoDeUsuario($cedula);
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_assoc();
        return $resultado;
    }

    private function prepararListadoDeUsuario($cedula){
        $sql = "SELECT * from usuario WHERE cedula = ?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this-> sentencia -> bind_param("i", $cedula);
    }

    private function prepararActualizacionDeUsuario(){
        $contrasenia = $this -> hashearContrasenia($this -> contrasenia);
        $sql = "UPDATE usuario SET nombre = ?, primerApellido = ?, segundoApellido = ?, usuario = ?, contrasenia = ? WHERE cedula = ?";
        $this -> sentencia = $this-> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("sssssi",
            $this -> nombre,
            $this -> primerApellido,
            $this -> segundoApellido,
            $this -> usuario,
            $contrasenia,
            $this -> cedula
            
        );
    }
    
    //modificar datos

    //listar profesores

    public function listarProfesoresAprobados(){
        $this -> prepararListadoDeProfesoresAprobados();
        $this -> sentencia -> execute();
        $resultado = $this -> sentencia -> get_result() -> fetch_all(MYSQLI_ASSOC);
        return $resultado;
    }
    
    
    private function prepararListadoDeProfesoresAprobados(){
        $sql = "SELECT cedula, nombre, primerApellido, segundoApellido, usuario FROM usuario WHERE estado = 'aprobado' AND tipoDeUsuario = 'Profesor' ";
        $this -> sentencia = $this -> conexion -> prepare($sql);
    }

    //eliminar usuario

    public function eliminarUsuario(){
        if( ($this -> checkearCedula($this -> cedula)) == true){
            $this -> prepararEliminacionDeUsuario();
            $this -> sentencia -> execute();
            return true;
        } else {
            return false;
        }
    }

    private function prepararEliminacionDeUsuario(){
        $sql = "DELETE FROM usuario WHERE cedula = ?";
        $this -> sentencia = $this -> conexion -> prepare($sql);
        $this -> sentencia -> bind_param("i", $this -> cedula);
    }
}