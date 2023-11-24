$(document).ready(function() {
    $("#formularioUser").submit(function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

        var correo = $("#correoL").val();
        var password = $("#passwordL").val();

        var validacionCampos = validaFormUser(); // Llamada a la función de validación

        if (validacionCampos) {
            $.ajax({
                type: "POST",
                url: "validaUsuario.php",
                data: {
                    correoL: correo,
                    passwordL: password
                },
                success: function(response) {
                    if (response.trim() !== "Credenciales Incorrectas") {
                        $("#login-error").css("display", "none");
                        window.location.href = "/admin/bienvenido.php";
                    } else {
                        $("#login-error").css("display", "block");
                        $("#login-error").html("Credenciales incorrectas. Intente de nuevo.");
                        limpiarMensajes('login-error');
                    }
                }
                
            });
        }
    });
});

function validaFormUser() {
    let correo = $('#correoL').val();
    let pass = $('#passwordL').val();

    if (!correo || !pass) {
        $("#login-error").css("display", "block"); // Mostrar el elemento .alerta
        $("#login-error").html("Por favor, complete los campos");
    
        // Establecer un temporizador para ocultar el mensaje después de 3 segundos
        limpiarMensajes('login-error');
    
        return false;
    }else 
    {
        $("#login-error").css("display", "none"); // Mostrar el elemento .alerta
        $("#login-error").html(""); // Limpiar cualquier mensaje de error anterior
        return true;
    }
}

function limpiarMensajes(mensajeId) {
    setTimeout(function() {
        $(`#${mensajeId}`).css("display", "none"); // Ocultar el elemento .alerta
        $(`#${mensajeId}`).html(""); // Limpiar el contenido del mensaje
    }, 3000);
}

$(document).ready(function() {
    $("#formularioUsuario").submit(function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

        var correo = $("#user_correo").val();
        var password = $("#user_password").val();

        var validacionCampos = validaFormUsuario(); // Llamada a la función de validación

        if (validacionCampos) {
            $.ajax({
                type: "POST",
                url: "validaUsuario.php",
                data: {
                    user_correo: correo,
                    user_password: password
                },
                success: function(response) {
                    if (response.trim() !== "Credenciales Incorrectas") {
                        $("#login-error").css("display", "none");
                        window.location.href = "/index.php";
                    } else {
                        $("#login-error").css("display", "block");
                        $("#login-error").html("Credenciales incorrectas. Intente de nuevo.");
                        limpiarMensajes('login-error');
                    }
                }
                
            });
        }
    });
});

function validaFormUsuario() {
    let correo = $('#user_correo').val();
    let pass = $('#user_password').val();

    if (!correo || !pass) {
        $("#login-error").css("display", "block"); // Mostrar el elemento .alerta
        $("#login-error").html("Por favor, complete los campos");
    
        // Establecer un temporizador para ocultar el mensaje después de 3 segundos
        limpiarMensajesU('login-error');
    
        return false;
    }else 
    {
        $("#login-error").css("display", "none"); // Mostrar el elemento .alerta
        $("#login-error").html(""); // Limpiar cualquier mensaje de error anterior
        return true;
    }
}

function limpiarMensajesU(mensajeId) {
    setTimeout(function() {
        $(`#${mensajeId}`).css("display", "none"); // Ocultar el elemento .alerta
        $(`#${mensajeId}`).html(""); // Limpiar el contenido del mensaje
    }, 3000);
}
