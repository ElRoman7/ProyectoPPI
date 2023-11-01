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
