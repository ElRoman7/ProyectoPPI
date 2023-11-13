// Alta
$(document).ready(function () {
    var mensajesError = '';
    // var correoValidoExp = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
    // Función para validar el correo
    function validarCodigo() {
        var codigo = $('#codigo').val();
        $.ajax({
            type: "POST",
            url: "funciones/verifica_codigo.php",
            data: { codigo: codigo },
            success: function(response) {
                if (response === "exist") {
                    mensajesError += 'El codigo ingresado ya existe o es inválido.<br>';
                    $('#mensajes-error').html('El codigo ingresado ya existe o es inválido.<br>');
                    $("#mensaje").removeClass("bg-verde").addClass("bg-rojo");
                    $("#mensaje").html("Ya ha sido registrado este codigo");
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

    // Validar el codigo en tiempo real (evento blur)
    $("#codigo").on("blur", function() {
        validarCodigo();
    });

    // Validar el correo al hacer clic en el botón de enviar (evento click)
    $('#miFormularioP').submit(function (e) {
        // Validar los campos y mostrar mensajes de error si es necesario
        var nombre = $('#nombre').val();
        var codigo = $('#codigo').val();
        var descripcion = $('#descripcion').val();
        var costo = $('#costo').val();
        var stock = $('#stock').val();
        var archivo = $('#archivo').val();


        if (nombre === '') {
            mensajesError += 'Por favor, complete el campo Nombre.<br>';
        }
        if (codigo === '') {
            mensajesError += 'Por favor, complete el campo Codigo.<br>';
        }
        if (descripcion === '') {
            mensajesError += 'Por favor, complete el campo Descripcion.<br>';
        }
        if (costo === '') {
            mensajesError += 'Por favor, complete el campo Costo.<br>';
        }
        if (stock === '') {
            mensajesError += 'Por favor, complete el campo Stock.<br>';
        }
        if (archivo === '') {
            mensajesError += 'Por favor, seleccione un archivo.<br>';
        }

        // Mostrar mensajes de error en el div
        $('#mensajes-error').html(mensajesError);

        // Validar el correo utilizando AJAX
        validarCodigo();

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



//! Editar
$(document).ready(function () {
    var mensajesError = '';
    // var correoValidoExp = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
    const codigoOriginal = $('#codigo').val(); // Almacena el valor original del correo
    console.log(codigoOriginal);

    // Función para validar el correo
    function validarCodigo() {

        let nuevoCodigo = $('#codigo').val();

        $.ajax({
            type: "POST",
            url: "funciones/verifica_codigo.php",
            data: { codigo: nuevoCodigo },
            success: function(response) {

            if(nuevoCodigo === codigoOriginal){
                    console.log(codigoOriginal);
                    console.log(nuevoCodigo);
                    // El codigo no ha cambiado, no es necesario realizar la validación
                    mensajesError = "";
                    $('#mensaje').html("");
                    $("#mensaje").addClass("bg-verde");
                    $("#mensaje").removeClass("bg-rojo");
                    return;
                } else if (response === "exist") {
                        mensajesError = 'El codigo ingresado ya existe o es inválido.<br>';
                        $("#mensaje").removeClass("bg-verde").addClass("bg-rojo");
                        $("#mensaje").html("Ya ha sido registrado este codigo");
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
    $("#codigo").on("blur", function() {
            validarCodigo();
    });

    // Validar el correo al hacer clic en el botón de enviar (evento click)
    $('#miFormularioActualizarP').submit(function (e) {
        // Validar los campos y mostrar mensajes de error si es necesario
        var nombre = $('#nombre').val();
        var codigo = $('#codigo').val();
        var descripcion = $('#descripcion').val();
        var costo = $('#costo').val();
        var stock = $('#stock').val();

        if (nombre === '') {
            mensajesError += 'Por favor, complete el campo Nombre.<br>';
        }
        if (codigo === '') {
            mensajesError += 'Por favor, complete el campo Codigo.<br>';
        }
        if (descripcion === '') {
            mensajesError += 'Por favor, complete el campo Descripcion.<br>';
        }
        if (costo === '') {
            mensajesError += 'Por favor, complete el campo Costo.<br>';
        }
        if (stock === '') {
            mensajesError += 'Por favor, complete el campo Stock.<br>';
        }

        // Mostrar mensajes de error en el div
        $('#mensajes-error').html(mensajesError);

        // Validar el correo utilizando AJAX
        validarCodigo();

        // Si hay errores, no envíes el formulario
        if (mensajesError === '') {
            $('#mensajes-error').removeClass('error');
        } else {
            $('#mensajes-error').addClass('error');
            e.preventDefault();
        }
    });
});

