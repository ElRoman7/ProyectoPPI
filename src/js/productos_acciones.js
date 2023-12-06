// Alta
$(document).ready(function () {
    $("#mensaje").css("display", "block");
    let mensajesError = '';
    // var correoValidoExp = /^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
    // Función para validar el correo
    function validarCodigo() {
        var codigo = $('#prod_codigo').val();
        $.ajax({
            type: "POST",
            url: "../includes/funciones/verifica_codigo.php",
            data: { codigo: codigo },
            success: function(response) {
                if (response === "exist") {
                    mensajesError = '';
                    mensajesError += 'El codigo ingresado ya existe o es inválido.<br>';
                    // $('#mensajes-error').html('El codigo ingresado ya existe o es inválido.<br>');
                    $("#mensaje").removeClass("bg-verde").addClass("bg-rojo");
                    $("#mensaje").html("Ya ha sido registrado este codigo");
                    setTimeout("$('#mensaje').html('');",3000);
                } else if (response === "not_exist") {
                    mensajesError = '';
                    // mensajesError = '';
                    $("#mensaje").removeClass("bg-rojo").addClass("bg-verde");
                    $("#mensaje").html("");
                } else {
                    $("#mensaje").html("Error en la verificación.");
                }
            }
        });
    }

    // Validar el codigo en tiempo real (evento blur)
    $("#prod_codigo").on("blur", function() {
        mensajesError = '';
        validarCodigo();
    });

    // Validar el correo al hacer clic en el botón de enviar (evento click)
    $('#ProductosAlta').submit(function (e) {
        // Validar los campos y mostrar mensajes de error si es necesario
        var nombre = $('#prod_nombre').val();
        var codigo = $('#prod_codigo').val();
        var descripcion = $('#prod_descripcion').val();
        var costo = $('#prod_costo').val();
        var stock = $('#prod_stock').val();
        var archivo = $('#prod_archivo').val();


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
            mensajesError = '';
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
    const codigoOriginal = $('#prod_codigo').val(); // Almacena el valor original del correo
    console.log(codigoOriginal);

    // Función para validar el correo
    function validarCodigo() {

        let nuevoCodigo = $('#prod_codigo').val();

        $.ajax({
            type: "POST",
            url: "../includes/funciones/verifica_codigo.php",
            data: { codigo: nuevoCodigo },
            success: function(response) {

            if(nuevoCodigo === codigoOriginal){
                    console.log(codigoOriginal);
                    console.log(nuevoCodigo);
                    $('#mensaje').html("");
                    $("#mensaje").addClass("bg-verde");
                    $("#mensaje").removeClass("bg-rojo");
                    return;
                } else if (response === "exist") {
                        mensajesError = '';
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
    $("#prod_codigo").on("blur", function() {
            mensajesError = '';
            validarCodigo();
    });

    // Validar el correo al hacer clic en el botón de enviar (evento click)
    $('#ProductosActualizar').submit(function (e) {
        // Validar los campos y mostrar mensajes de error si es necesario
        var nombre = $('#prod_nombre').val();
        var codigo = $('#prod_codigo').val();
        var descripcion = $('#prod_descripcion').val();
        var costo = $('#prod_costo').val();
        var stock = $('#prod_stock').val();

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
            mensajesError = '';
            $('#mensajes-error').addClass('error');
            e.preventDefault();
        }
    });
});

$(document).ready(function() {
    $(".eliminar-prodCarrito").click(function(e) {
        e.preventDefault();
        var id = $(this).data("id");
        var confirmation = confirm("¿Estás seguro de que deseas eliminar este producto del carrito?");
        var row = $(this).closest("tr"); // Obtener la fila que contiene el botón

        if (confirmation) {
            $.ajax({
                type: "POST",
                url: "productos_elimina.php",
                data: { id: id },
                success: function(response) {
                    if (response == "success") {
                        row.hide(); // Esta línea oculta la fila
                    } else {
                        alert("No se pudo realizar la eliminación");
                    }
                }
            });
        }
    });
});
