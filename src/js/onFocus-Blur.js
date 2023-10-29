function onB(){

    $('#mensaje').html('Fuera del Campo');
    setTimeout("$('#mensaje').html('');",5000);
}
function onF(){
    $('#mensaje').html('Dentro del campo');
    setTimeout("$('#mensaje').html('');",5000);
}
// $(document).ready(function() {
//     $("#correo").on("blur", function() {
//         var correo = $(this).val();
//         $.ajax({
//             type: "POST",
//             url: "funciones/verifica_correo.php",
//             data: { correo: correo },
//             success: function(response) {
//                 if (response === "exist") {
//                     mensajesError += 'El correo ingresado ya existe.<br>';
//                     $("#mensaje").removeClass("bg-verde").addClass("bg-rojo");
//                     $("#mensaje").html("Ya ha sido registrado este correo");
//                     setTimeout("$('#mensaje').html('');",3000);
//                 } else if (response === "not_exist") {
//                     $("#mensaje").removeClass("bg-rojo").addClass("bg-verde");
//                     $("#mensaje").html("");
//                     setTimeout("$('#mensaje').html('');",5000);
//                 } else {
//                     $("#mensaje").html("Error en la verificación.");
//                     setTimeout("$('#mensaje').html('');",5000);
//                 }
//             }
//         });
//     });
// });
