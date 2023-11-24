<?php
require "../includes/config/conecta.php";
require '../includes/funciones/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: /');
    }

    $db = conecta();

    $id = $_POST['id'];
    $nombre = $_POST['prom_nombre'];
    $file_enc = $_POST['prom_archivo'];

    $consulta = "SELECT * FROM promociones WHERE id = {$id}";
    $resultado = mysqli_query($db,$consulta);
    $promocion = mysqli_fetch_assoc($resultado);

    // Verificar si se proporcionó un nuevo archivo
    if (!empty($_FILES['prom_archivo']['name'])) {
        // Borrar archivo si se va a actualizar
        $carpetaImagenes = "../archivosPromociones/";
        unlink($carpetaImagenes . $promocion['archivo']); //* Funcion para borrar

        // Obtener nombre y un temporal name que se va a encriptar
        $file_name = $_FILES['prom_archivo']['name'];
        $file_tmp = $_FILES['prom_archivo']['tmp_name'];

        $ext = pathinfo($file_name, PATHINFO_EXTENSION);

        // Construir el nuevo nombre del archivo encriptado
        $file_enc = md5(uniqid(rand(), true )).".$ext";
        $file_destination = "$carpetaImagenes" . $file_enc;
        move_uploaded_file($file_tmp, $file_destination);
    }
    else {
        $file_enc = $promocion['archivo'];
    }
    $query = "UPDATE promociones SET nombre = '$nombre', archivo = '$file_enc' WHERE id = $id";

    $result = $db->query($query);

    if ($result) {
        // Redirigir a empleados_lista.php después de una actualización exitosa
        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";
        // exit;
        header("Location: promociones_lista.php");
        exit;
    } else {
        echo "Error al actualizar los datos.";
    }
?>
