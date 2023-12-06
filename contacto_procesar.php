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
    $destinatario = "sergio.roman5167@alumnos.udg.mx";
    $asunto = "Nuevo mensaje de contacto";

    // Cuerpo del mensaje
    $mensaje = "Nombre: $nombre $apellidos\n";
    $mensaje .= "Correo: $correo\n";
    $mensaje .= "Descripción:\n$descripcion";

    try {

        $mail = new PHPMailer();
        // Configurar SMPT
        $mail->isSMTP();
        $mail->Host = "smtp.office365.com";
        $mail->SMTPAuth = true;
        $mail->Username = "umtim12@outlook.com";
        $mail->Password = "RG2003SA";
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        // Contenido
        $mail->setFrom('umtim12@outlook.com','CartEase');
        $mail->addAddress('umtim12@outlook.com','CartEase');
        $mail->Subject = 'Tienes un nuevo mensaje';
        
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

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
