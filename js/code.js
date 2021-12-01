function validar() {
    email_usuario = document.getElementById('email_usuario').value
    pass_usuario = document.getElementById('pass_usuario').value
    mensaje = document.getElementById('mensaje')

    if (email_usuario == '' && pass_usuario == '') {
        mensaje.innerHTML = 'Introduce el email y la contraseña'
        return false
    } else if (email_usuario == '') {
        mensaje.innerHTML = 'Introduce el email'
        return false
    } else if (pass_usuario == '') {
        mensaje.innerHTML = 'Introduce la contraseña'
        return false
    } else {
        return true
    }
}

function inscripcion() {
    email = document.getElementById('email').value;
    nombre = document.getElementById('nombre').value;
    apellido = document.getElementById('apellido').value;
    telef = document.getElementById('telef').value;
    dni = document.getElementById('dni').value;
    letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
    mensaje = document.getElementById('mensaje');

    if (email == '' || nombre == '' || apellido == '' || telef == '' || dni == '') {
        mensaje.innerHTML = "Introduce todos los campos"
        return false
    } else if (/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i) {
        mensaje.innerHTML = "email incorrecto"
        return false;
    } else if (!(/^\d{9}$/.test(telef))) {
        mensaje.innerHTML = "telf incorrecto"
        return false;
    } else if (!(/^\d{8}[A-Z]$/.test(dni))) {
        mensaje.innerHTML = "dni incorrecto"
        return false;
    } else if (valor.charAt(8) != letras[(valor.substring(0, 8)) % 23]) {
        mensaje.innerHTML = "dni incorrecto"
        return false;
    } else {
        return true
    }
}

function evento() {
    nom_evento = document.getElementById('nom_evento').value
    desc_evento = document.getElementById('desc_evento').value
    lugar_evento = document.getElementById('lugar_evento').value
    fecha_evento = document.getElementById('fecha_evento').value
    hora_evento = document.getElementById('hora_evento').value
    mensaje = document.getElementById('mensaje')

    if (nom_evento == '' || desc_evento == '' || lugar_evento == '' || fecha_evento == '' || hora_evento == '') {
        mensaje.innerHTML = 'Rellena todos los campos'
        return false
    } else {
        return true
    }
}