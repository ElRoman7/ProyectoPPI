$(document).ready(function () {
    $('#miFormulario').submit(function (e) {
        // Validar los campos y mostrar mensajes de error si es necesario
        var nombre = $('#nombre').val();
        var apellidos = $('#apellidos').val();
        var correo = $('#correo').val();
        var pass = $('#pass').val();
        var rol = $('#rol').val();
        var archivo = $('#archivo').val();

        var mensajesError = '';

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

        // Si hay errores, no envíes el formulario
        if (mensajesError === '') {
            $('#mensajes-error').removeClass('error'); // Elimina la clase 'error'
        } else {
            $('#mensajes-error').addClass('error'); // Agrega la clase 'error'
            e.preventDefault(); // Evita la acción predeterminada del formulario solo cuando hay errores
        }
    });
});

$(document).ready(function () {
    $('#miFormularioActualizar').submit(function (e) {
        // Validar los campos y mostrar mensajes de error si es necesario
        var nombre = $('#nombre').val();
        var apellidos = $('#apellidos').val();
        var correo = $('#correo').val();
        var pass = $('#pass').val();
        var rol = $('#rol').val();
        var archivo = $('#archivo').val();

        var mensajesError = '';

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

        // Si hay errores, no envíes el formulario
        if (mensajesError === '') {
            $('#mensajes-error').removeClass('error'); // Elimina la clase 'error'
        } else {
            $('#mensajes-error').addClass('error'); // Agrega la clase 'error'
            e.preventDefault(); // Evita la acción predeterminada del formulario solo cuando hay errores
        }
    });
});