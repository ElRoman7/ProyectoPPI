<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge los datos del formulario
    $nombre = $_POST["cont_nombre"];
    $apellidos = $_POST["cont_apellidos"];
    $correo = $_POST["cont_correo"];
    $descripcion = $_POST["cont_descripcion"];

    // Configura el destinatario y el asunto
    $destinatario = "sergio.romam@outlook.com";
    $asunto = "Nuevo mensaje de contacto";

    // Cuerpo del mensaje
    $mensaje = "Nombre: $nombre $apellidos\n";
    $mensaje .= "Correo: $correo\n";
    $mensaje .= "Descripción:\n$descripcion";

    // Cabeceras del correo
    $headers = "From: $correo" . "\r\n" .
               "Reply-To: $correo" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envía el correo electrónico
    if (mail($destinatario, $asunto, $mensaje, $headers)) {
        echo "¡Gracias por contactarnos! Tu mensaje ha sido enviado.";
    } else {
        echo "Error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.";
    }
}
?>
