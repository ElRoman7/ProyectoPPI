$(document).ready(function() {
    $("#formularioUser").submit(function(event) {
        event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

        var correo = $("#correoL").val();
        var password = $("#passwordL").val();

        var validacionCampos = validaFormUser(); // Llamada a la función de validación

        if (validacionCampos) {
            $.ajax({
                type: "POST",
                url: "usuario_validar.php",
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
                url: "usuario_validar.php",
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

$(document).ready(function () {
    var mensajesError = '';
    var correoValidoExp = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
    // Función para validar el correo
    function validarCorreoU() {
        $("#mensaje").css("display", "block");
        var correo = $('#user_correo').val();
        $.ajax({
            type: "POST",
            url: "includes/funciones/verifica_correo.php",
            data: { user_correo: correo },
            success: function(response) {
                if (!correo.match(correoValidoExp)) {
                    mensajesError += 'Por favor, ingrese un correo electrónico válido.<br>';
                    // $('#mensajes-error').html('Por favor, ingrese un correo electrónico válido.<br>');
                    $("#mensaje").removeClass("bg-verde").addClass("bg-rojo");
                    $("#mensaje").html("El correo ingresado es Inválido.");
                    setTimeout("$('#mensaje').html('');",3000);
                    // return false; // La sintaxis del correo no es válida
                }
                else if (response === "exist") {
                    mensajesError += 'El correo ingresado ya existe o es inválido.<br>';
                    // $('#mensajes-error').html('El correo ingresado ya existe o es inválido.<br>');
                    $("#mensaje").removeClass("bg-verde").addClass("bg-rojo");
                    $("#mensaje").html("Ya ha sido registrado este correo");
                    setTimeout("$('#mensaje').html('');",3000);
                } else if (response === "not_exist") {
                    // mensajesError = '';
                    $("#mensaje").removeClass("bg-rojo").addClass("bg-verde");
                    $("#mensaje").html("");
                } else {
                    $("#mensaje").html("Error en la verificación.");
                }
            }
        });
    }

    // Validar el correo en tiempo real (evento blur)
    $("#user_correo").on("blur", function() {
        validarCorreoU();
    });

    // Validar el correo al hacer clic en el botón de enviar (evento click)
    $('#UsuariosAlta').submit(function (e) {
        $("#mensaje").css("display", "block");
        // Validar los campos y mostrar mensajes de error si es necesario
        var nombre = $('#user_nombre').val();
        var apellidos = $('#user_apellidos').val();
        var correo = $('#user_correo').val();
        var pass = $('#user_pass').val();

        if (nombre==="") {
            mensajesError += 'Por favor, complete el campo Nombre.<br>';
        }
        if (apellidos === '') {
            mensajesError += 'Por favor, complete el campo Apellidos.<br>';
        }
        if (correo === '') {
            mensajesError += 'Por favor, complete el campo Correo.<br>';
        }
        if (pass === '') {
            mensajesError += 'Por favor, complete el campo Contraseña.<br>';
        }
        

        // Mostrar mensajes de error en el div
        $('#mensajes-error').html(mensajesError);
        // alert(mensajesError);
        validarCorreoU();
        // Validar el correo utilizando AJAX
        

        // Si hay errores, no envíes el formulario
        if (mensajesError === '') {
            alert('si');
            $('#mensajes-error').removeClass('error');
        } else {
            mensajesError = '';
            $('#mensajes-error').addClass('error');
            setTimeout(function() {
                $('#mensajes-error').removeClass('error');
            }, 5000); // 5000 milisegundos (5 segundos)
            e.preventDefault();
        }
    });
});
