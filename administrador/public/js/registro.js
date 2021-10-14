function validarFormulario() {
    let nombre = document.querySelector("#nombre").value;
    let primerApellido = document.querySelector("#primerApellido").value;
    let segundoApellido = document.querySelector("#segundoApellido").value;
    let usuario = document.querySelector("#usuario").value;

    if ((comprobarCedula() && comprobarTexto(nombre, "nombre", "#nombre") && comprobarTexto(primerApellido, "primer apellido", "#primerApellido") && comprobarTexto(segundoApellido, "segundo apellido", "#segundoApellido") && comprobarUsuario(usuario) && comprobarContrasenias()) == true) {
        return true;
    } else {
        return false;
    }
}

function comprobarCedula() {
    let cedula = document.querySelector("#cedula").value;
    let largoCedula = cedula.toString().length;

    if (cedula == "") {
        mostrarMensajeError("El campo cedula esta vacio", "#cedula");
        return false;
    } else if (isNaN(cedula)) {
        mostrarMensajeError("La cedula contiene otros caracteres ademas de numeros", "#cedula");
        return false;
    } else if (largoCedula < 8 || largoCedula > 8) {
        mostrarMensajeError("La cedula tiene menos de 8 digitos", "#cedula");
        return false;
    } else {
        return true;
    }

}


function comprobarTexto(valor, nombreCampo, campo) {
    largoCampo = valor.toString().length;

    if (valor == "") {
        mostrarMensajeError("El campo " + nombreCampo + " esta vacio", campo);
        return false;
    } else if (!isNaN(valor)) {
        mostrarMensajeError("El campo " + nombreCampo + " tiene un numero", campo);
        return false;
    } else if (largoCampo < 3 || largoCampo > 20) {
        mostrarMensajeError("El campo " + nombreCampo + " tiene menos de 3 caracteres", campo);
        return false;
    } else {
        return true;
    }
}


function comprobarUsuario(usuario) {
    largoUsuario = usuario.toString().length;

    if (usuario == "") {
        mostrarMensajeError("El campo usuario esta vacio", "#usuario");
        return false;
    } else if (!isNaN(usuario)) {
        mostrarMensajeError("El campo usuario solo tiene numeros, su usuario puede tener numeros pero tambien debe tener letras", "#usuario");
        return false;
    } else if (largoUsuario < 5 || largoUsuario > 20) {
        mostrarMensajeError("El campo usuario es menor a 5", "#usuario");
        return false;
    } else {
        return true;
    }
}

function comprobarContrasenias() {
    let contrasenia = document.querySelector("#contrasenia").value;
    let contraseniaRepetida = document.querySelector("#contraseniaRepetida").value;

    if (contrasenia.length < 8) {
        mostrarMensajeError("La contraseña es menor a 8 digitos", "#contrasenia");
        return false;
    } else if (contrasenia !== contraseniaRepetida) {
        mostrarMensajeError("Las contraseñas no son iguales", "#contrasenia");
        return false;
    } else if (!contrasenia.match(/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,32}$/)) {
        mostrarMensajeError("La contraseña debe contener al menos, una mayuscula, una minuscula y un numero", "#contrasenia");
        return false;
    } else {
        return true;
    }


}


function mostrarMensajeError(mensaje, id) {
    let elemento = document.querySelector(id);
    elemento.classList.add("is-invalid");

    let div = document.createElement("div");
    div.textContent = mensaje;
    div.classList.add("text-center", "alert", "alert-danger");

    let section = document.querySelector("#section");
    section.prepend(div);

    setTimeout(() => {
        div.remove();
        elemento.classList.remove("is-invalid");
    }, 5000);
}
