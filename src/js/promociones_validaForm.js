// Alta
$(document).ready(function () {
    var mensajesError = '';
    // Validar el correo al hacer clic en el botón de enviar (evento click)
    $('#PromocionesAlta').submit(function (e) {
        // Validar los campos y mostrar mensajes de error si es necesario
        var nombre = $('#prom_nombre').val();
        var codigo = $('#prom_codigo').val();
        var descripcion = $('#prom_descripcion').val();
        var costo = $('#prom_costo').val();
        var stock = $('#prom_stock').val();
        var archivo = $('#prom_archivo').val();


        if (nombre === '') {
            mensajesError += 'Por favor, complete el campo Nombre.<br>';
        }
        if (archivo === '') {
            mensajesError += 'Por favor, seleccione un archivo.<br>';
        }

        // Mostrar mensajes de error en el div
        $('#mensajes-error').html(mensajesError);

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

    // Validar el correo al hacer clic en el botón de enviar (evento click)
    $('#PromocionesActualizar').submit(function (e) {
        // Validar los campos y mostrar mensajes de error si es necesario
        var nombre = $('#prom_nombre').val();

        if (nombre === '') {
            mensajesError += 'Por favor, complete el campo Nombre.<br>';
        }

        // Mostrar mensajes de error en el div
        $('#mensajes-error').html(mensajesError);

        // Si hay errores, no envíes el formulario
        if (mensajesError === '') {
            $('#mensajes-error').removeClass('error');
        } else {
            $('#mensajes-error').addClass('error');
            e.preventDefault();
        }
    });
});

