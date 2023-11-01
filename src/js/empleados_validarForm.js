$(document).ready(function () {
    var mensajesError = '';
    var correoValidoExp = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
    // Función para validar el correo
    function validarCorreo() {
        var correo = $('#correo').val();
        $.ajax({
            type: "POST",
            url: "funciones/verifica_correo.php",
            data: { correo: correo },
            success: function(response) {
                if (!correo.match(correoValidoExp)) {
                    mensajesError += 'Por favor, ingrese un correo electrónico válido';
                    // $('#mensajes-error').html('Por favor, ingrese un correo electrónico válido.<br>');
                    $("#mensaje").removeClass("bg-verde").addClass("bg-rojo");
                    $("#mensaje").html("El correo ingresado es Inválido.");
                    setTimeout("$('#mensaje').html('');",3000);
                    // return false; // La sintaxis del correo no es válida
                }
                else if (response === "exist") {
                    mensajesError += 'El correo ingresado ya existe o es inválido.<br>';
                    $('#mensajes-error').html('El correo ingresado ya existe o es inválido.<br>');
                    $("#mensaje").removeClass("bg-verde").addClass("bg-rojo");
                    $("#mensaje").html("Ya ha sido registrado este correo");
                    setTimeout("$('#mensaje').html('');",3000);
                } else if (response === "not_exist") {
                    mensajesError = '';
                    $("#mensaje").removeClass("bg-rojo").addClass("bg-verde");
                    $("#mensaje").html("");
                } else {
                    $("#mensaje").html("Error en la verificación.");
                }
            }
        });
    }

    // Validar el correo en tiempo real (evento blur)
    $("#correo").on("blur", function() {
        validarCorreo();
    });

    // Validar el correo al hacer clic en el botón de enviar (evento click)
    $('#miFormulario').submit(function (e) {
        // Validar los campos y mostrar mensajes de error si es necesario
        var nombre = $('#nombre').val();
        var apellidos = $('#apellidos').val();
        var correo = $('#correo').val();
        var pass = $('#pass').val();
        var rol = $('#rol').val();
        var archivo = $('#archivo').val();


        if (nombre === '') {
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
        if (rol === '0') {
            mensajesError += 'Por favor, seleccione un Rol.<br>';
        }
        if (archivo === '') {
            mensajesError += 'Por favor, seleccione un archivo.<br>';
        }

        // Mostrar mensajes de error en el div
        $('#mensajes-error').html(mensajesError);

        // Validar el correo utilizando AJAX
        validarCorreo();

        // Si hay errores, no envíes el formulario
        if (mensajesError === '') {
            $('#mensajes-error').removeClass('error');
        } else {
            $('#mensajes-error').addClass('error');

            setTimeout(function() {
                $('#mensajes-error').removeClass('error');
            }, 5000); // 5000 milisegundos (5 segundos)
            e.preventDefault();
        }
    });
});
$(document).ready(function () {
    var mensajesError = '';
    var correoValidoExp = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
    const correoOriginal = $('#correo').val(); // Almacena el valor original del correo
    console.log(correoOriginal);

    // Función para validar el correo
    function validarCorreo() {

        var archivo = $('#archivo').val();
        let nuevoCorreo = $('#correo').val();


        // Compara el nuevo correo con el original
        // else{

        $.ajax({
            type: "POST",
            url: "funciones/verifica_correo.php",
            data: { correo: nuevoCorreo },
            success: function(response) {

                if (!nuevoCorreo.match(correoValidoExp)) {
                    mensajesError = 'Por favor, ingrese un correo electrónico válido';
                    $("#mensaje").removeClass("bg-verde").addClass("bg-rojo");
                    $("#mensaje").html("El correo ingresado es Inválido.");
                } else if(nuevoCorreo === correoOriginal){
                    console.log(correoOriginal);
                    console.log(nuevoCorreo);
                    // El correo no ha cambiado, no es necesario realizar la validación
                    mensajesError = "";
                    $('#mensaje').html("");
                    $("#mensaje").addClass("bg-verde");
                    $("#mensaje").removeClass("bg-rojo");
                    return
                } else if (response === "exist") {
                        mensajesError = 'El correo ingresado ya existe o es inválido.<br>';
                        $("#mensaje").removeClass("bg-verde").addClass("bg-rojo");
                        $("#mensaje").html("Ya ha sido registrado este correo");
                } else if (response === "not_exist") {
                    mensajesError = '';
                    $("#mensaje").removeClass("bg-rojo").addClass("bg-verde");
                    $("#mensaje").html("");
                } else {
                    mensajesError = "Error en la verificación.";
                }
            }
        });
    // }
}

    // Validar el correo en tiempo real (evento blur)
    $("#correo").on("blur", function() {
            validarCorreo();
    });

    // Validar el correo al hacer clic en el botón de enviar (evento click)
    $('#miFormularioActualizar').submit(function (e) {
        // Validar los campos y mostrar mensajes de error si es necesario
        var nombre = $('#nombre').val();
        var apellidos = $('#apellidos').val();
        var correo = $('#correo').val();
        var pass = $('#pass').val();
        var rol = $('#rol').val();
        var archivo = $('#archivo').val();

        if (nombre === '') {
            mensajesError += 'Por favor, complete el campo Nombre.<br>';
        }
        if (apellidos === '') {
            mensajesError += 'Por favor, complete el campo Apellidos.<br>';
        }
        if (correo === '') {
            mensajesError += 'Por favor, complete el campo Correo.<br>';
        }
        if (rol === '0') {
            mensajesError += 'Por favor, seleccione un Rol.<br>';
        }

        // Mostrar mensajes de error en el div
        $('#mensajes-error').html(mensajesError);

        // Validar el correo utilizando AJAX
        validarCorreo();

        // Si hay errores, no envíes el formulario
        if (mensajesError === '') {
            $('#mensajes-error').removeClass('error');
        } else {
            $('#mensajes-error').addClass('error');
            e.preventDefault();
        }
    });
});



// $(document).ready(function () {
//     $('#miFormularioActualizar').submit(function (e) {
//         // Validar los campos y mostrar mensajes de error si es necesario
//         var nombre = $('#nombre').val();
//         var apellidos = $('#apellidos').val();
//         var correo = $('#correo').val();
//         var pass = $('#pass').val();
//         var rol = $('#rol').val();
//         var archivo = $('#archivo').val();

//         var mensajesError = '';

//         if (nombre === '') {
//             mensajesError += 'Por favor, complete el campo Nombre.<br>';
//         }
//         if (apellidos === '') {
//             mensajesError += 'Por favor, complete el campo Apellidos.<br>';
//         }
//         if (correo === ''){
//             mensajesError += 'Por favor, complete el campo Correo.<br>';
//         }else{
//             $.ajax({
//                 type: "POST",
//                 url: "funciones/verifica_correo.php",
//                 data: { correo: correo },
//                 success: function(response) {
//                     if (response === "exist") {
//                         mensajesError += 'El correo ingresado ya existe.<br>';
//                         $("#mensaje").removeClass("bg-verde").addClass("bg-rojo");
//                         $("#mensaje").html("Ya ha sido registrado este correo");
//                         setTimeout("$('#mensaje').html('');",3000);
//                     } else if (response === "not_exist") {
//                         $("#mensaje").removeClass("bg-rojo").addClass("bg-verde");
//                         $("#mensaje").html("");
//                         setTimeout("$('#mensaje').html('');",5000);
//                     } else {
//                         $("#mensaje").html("Error en la verificación.");
//                         setTimeout("$('#mensaje').html('');",5000);
//                     }
//                 }
//             });
//         }
//         if (rol === '0') {
//             mensajesError += 'Por favor, seleccione un Rol.<br>';
//         }

//         // Mostrar mensajes de error en el div
//         $('#mensajes-error').html(mensajesError);

//         // Si hay errores, no envíes el formulario
//         if (mensajesError === '') {
//             $('#mensajes-error').removeClass('error'); // Elimina la clase 'error'
//         } else {
//             $('#mensajes-error').addClass('error'); // Agrega la clase 'error'
//             e.preventDefault(); // Evita la acción predeterminada del formulario solo cuando hay errores
//         }
//     });
// });