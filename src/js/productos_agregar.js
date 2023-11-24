function agregarProducto(idP) {
    $("#mensaje").css("display", "block");
    var cant = $('#cantidad'+idP).val();
    if (cant > 0) {
        $.ajax({
           url      : 'agregarProducto.php',
           type     : 'post',
           dataType : 'text',
           data     : 'idP='+idP+'&cant='+cant,
           success  : function(res) {
            if (res === '1') {
                $('#mensaje'+idP).html('Producto Agregado');
                setTimeout(function() {
                    $('#mensaje'+idP).html('');
                }, 5000);
            }
           },error: function() {
               alert('Error archivo no encontrado...');
           }
         });
    }
 }

 function actualizarProducto(idP) {
    $("#mensaje").css("display", "block");
  var cant = $('#cantidad' + idP).val();
  if (cant > 0) {
      $.ajax({
          url: 'productos_actualiza.php',
          type: 'post',
          data: 'idP=' + idP + '&cant=' + cant,
          success: function (res) {
              if (res === '1') {
                actualizarSubtotal(idP);
                    $('#mensaje'+idP).html('✔');
                    setTimeout(function() {
                        $('#mensaje'+idP).html('');
                    }, 5000);

                  // Éxito, actualización correcta

                  // alert('actualizado');
              } else {
                  // Error en la actualización, muestra el mensaje de error
                  alert('Error: ' + res);
              }
          },
          error: function () {
              alert('Error archivo no encontrado...');
          }
      });
  }
}
function actualizarSubtotal(idP) {
  // Obtén la cantidad y el costo del producto
  var cantidad = parseFloat($('#cantidad' + idP).val());
  var costo = parseFloat($('#cantidad' + idP).closest('tr').find('.precio').text());

  // Calcula el nuevo subtotal
  var subtotal = cantidad * costo;

  // Actualiza el subtotal en la interfaz
  $('#cantidad' + idP).closest('tr').find('.subtotal').text(subtotal.toFixed(2));
  calcularTotal();
  
}

function calcularTotal() {
  var total = 0;

  // Itera sobre cada fila de productos
  $('.cantidadProducto').each(function() {
      var cantidad = parseFloat($(this).val());
      var costo = parseFloat($(this).closest('tr').find('.precio').text());

      // Calcula el subtotal para cada producto y suma al total
      total += cantidad * costo;
  });

  // Actualiza el valor del total en la interfaz
  $('.total-valor').text(total.toFixed(2));
}

$(document).ready(function() {
  calcularTotal();
});

$(document).ready(function() {
  $(".eliminar-producto").click(function(e) {
      e.preventDefault();
      var id = $(this).data("id");
      var confirmation = confirm("¿Estás seguro de que deseas eliminar este producto?");
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
function confirmarPedido(id_pedido) {
    $.ajax({
        type: "POST",
        url: "pedidos_confirmar.php",  // Asegúrate de tener la extensión correcta del archivo
        data: { id_pedido: id_pedido },  // Usar ":" en lugar de "=" y proporcionar un nombre de propiedad
        success: function(response) {
            if (response == "1") {
                window.location.href = 'pedido_confirmado.php';
            } else {
                alert("No se pudo realizar la confirmación de tu pedido");
            }
            // Manejar la respuesta del servidor si es necesario
        },
    });
}
