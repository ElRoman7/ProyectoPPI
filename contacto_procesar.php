<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

    // Configurar PHPMailer
    $mail = new PHPMailer(true); // Habilitar excepciones

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '2318dc4bc2d183';
        $mail->Password = '8405b43ff7a86d';
        $mail->SMTPSecure = 'tls'; // Puedes usar 'ssl' también si es necesario
        $mail->Port = 2525; // Puerto SMTP
        $phpmailer = new PHPMailer();

        // Detalles del remitente y destinatario
        $mail->setFrom($correo, "$nombre $apellidos");
        $mail->addAddress($destinatario);

        // Contenido del correo
        $mail->isHTML(true); // Si el cuerpo del mensaje es HTML, cambia a true
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;

        // Enviar el correo
        $mail->send();
        echo "¡Gracias por contactarnos! Tu mensaje ha sido enviado.";
        header('Location: /index.php?result=1');
    } catch (Exception $e) {
        echo "Error al enviar el mensaje. Detalles del error: {$mail->ErrorInfo}";
    }
}
?>
