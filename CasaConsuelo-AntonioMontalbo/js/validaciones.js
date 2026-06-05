/* VALIDAR REGISTRO */

function validarRegistro(){

    let nombre = document.getElementById("nombreRegistro").value;
    let email = document.getElementById("emailRegistro").value;
    let contrasena = document.getElementById("contrasenaRegistro").value;
    let telefono = document.getElementById("telefonoRegistro").value;

    let letras = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;

    if(nombre.length < 3){
        alert("El nombre debe tener al menos 3 caracteres");
        return false;
    }

    if(!letras.test(nombre)){
        alert("El nombre solo puede contener letras");
        return false;
    }

    if(contrasena.length < 6){
        alert("La contraseña debe tener al menos 6 caracteres");
        return false;
    }

    if(telefono.length != 9 || isNaN(telefono)){
        alert("El teléfono debe tener 9 números");
        return false;
    }
    return true;
}

/* VALIDAR CONTACTO */

function validarContacto(){
    let nombre = document.getElementById("nombreContacto").value;
    let mensaje = document.getElementById("mensajeContacto").value;
    let letras = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;

    if(nombre.length < 3){
        alert("Introduce un nombre válido");
        return false;
    }

    if(!letras.test(nombre)){
        alert("El nombre solo puede contener letras");
        return false;
    }

    if(mensaje.length < 10){
        alert("El mensaje debe tener al menos 10 caracteres");
        return false;
    }
    return true;
}

/* VALIDAR RESEÑA */

function validarResena(){
    let nombre = document.getElementById("nombreResena").value;
    let comentario = document.getElementById("comentarioResena").value;
    let valoracion = document.getElementById("valoracionResena").value;
    let letras = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/;

    if(nombre.length < 3){
        alert("Introduce un nombre válido");
        return false;
    }

    if(!letras.test(nombre)){
        alert("El nombre solo puede contener letras");
        return false;
    }

    if(comentario.length < 10){
        alert("La reseña debe tener al menos 10 caracteres");
        return false;
    }

    if(valoracion < 0 || valoracion > 10){
        alert("La valoración debe estar entre 0 y 10");
        return false;
    }
    return true;
}