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