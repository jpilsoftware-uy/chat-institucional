function validarFormulario(){
    let nombre = document.querySelector("#nombre").value;
    let primerApellido = document.querySelector("#primerApellido").value;
    let segundoApellido = document.querySelector("#segundoApellido").value;
    let usuario = document.querySelector("#usuario").value;

    if( (comprobarCedula() && comprobarTexto(nombre, "nombre") && comprobarTexto(primerApellido, "primer apellido") && comprobarTexto(segundoApellido, "segundo apellido") && comprobarUsuario(usuario) && comprobarContrasenias() ) == true){
        return true;
    } else {
        return false;
    }
}

function comprobarCedula(){
    let cedula = document.querySelector("#cedula").value;
    let largoCedula = cedula.toString().length;
    
    if(cedula == ""){
        alert("El campo cedula esta vacio");
        return false;
    } else if(isNaN(cedula)){
        alert("La cedula contiene otros caracteres ademas de numeros");
        return false;
    } else if(largoCedula < 8 || largoCedula > 8){
        alert("La cedula tiene menos de 8 digitos");
        return false;
    } else {
        return true;
    }
    
}

function comprobarTexto(campo, nombreCampo){
    largoCampo = campo.toString().length;
    
    if(campo == ""){
        alert ("El campo " + nombreCampo +  " esta vacio");
        return false;
    } else if (!isNaN(campo)){
        alert("El campo " + nombreCampo +  " tiene un numero");
        return false;
    } else if (largoCampo < 3 || largoCampo > 20){
        alert("El campo " + nombreCampo +  " tiene menos de 3 caracteres");
        return false;
    } else {
        return true;
    }
}

function comprobarUsuario(usuario){
    largoUsuario = usuario.toString().length;

    if (usuario == ""){
        alert("El campo usuario esta vacio");
        return false;
    } else if (!isNaN(usuario)){
        alert("El campo usuario solo tiene numeros, su usuario puede tener numeros pero tambien debe tener letras");
        return false;
    } else if (largoUsuario < 5 || largoUsuario > 20 ){
        alert("El campo usuario es menor a 5");
        return false;
    } else {
        return true;
    }
}

function comprobarContrasenias(){
    let contrasenia = document.querySelector("#contrasenia").value;
    let contraseniaRepetida = document.querySelector("#contraseniaRepetida").value;

    if(contrasenia !== contraseniaRepetida){
        alert("Las contraseñas no coinciden");
        return false;
    } else {
        return true;
    }
}