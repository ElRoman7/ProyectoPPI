<?php
require "funciones/conecta.php";
$db = conecta();

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];

    $consulta = "SELECT * FROM empleados WHERE id = {$id}";
    $resultado = mysqli_query($db,$consulta);
    $empleado = mysqli_fetch_assoc($resultado);

    // Verificar si se proporcionó un nuevo archivo
    if (!empty($_FILES['archivo']['name'])) {
        // Borrar archivo si se va a actualizar
        $carpetaImagenes = "archivos/";
        unlink($carpetaImagenes . $empleado['archivo']); //* Funcion para borrar

        // Obtener nombre y un temporal name que se va a encriptar
        $file_name = $_FILES['archivo']['name'];
        $file_tmp = $_FILES['archivo']['tmp_name'];

        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        // Construir el nuevo nombre del archivo encriptado
        $new_file_enc = md5(uniqid(rand(), true )).".$ext";
        $file_destination = "$carpetaImagenes" . $new_file_enc;
        move_uploaded_file($file_tmp, $file_destination);
    } else {
        // Si no se proporciona un nuevo archivo, mantener el nombre de archivo actual y su hash
        $new_file_enc = $_POST['archivo_n'];
        $file_enc = $_POST['archivo'];
    }
    // Verificar si se proporcionó una nueva contraseña
    if (!empty($_POST['pass'])) {
        $pass = $_POST['pass'];
        $passEnc = password_hash($pass,PASSWORD_DEFAULT);
    } else {
        // Si no se proporciona una nueva contraseña, mantener la contraseña actual
        $passEnc = $empleado['pass'];
        // $query = "UPDATE empleados SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', rol = $rol, archivo_n = '$file_name', archivo = '$new_file_enc' WHERE id = $id";
    }

    $query = "UPDATE empleados SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', pass = '$passEnc', rol = $rol, archivo_n = '$file_name', archivo = '$new_file_enc' WHERE id = $id";

    $result = $db->query($query);

    if ($result) {
        // Redirigir a empleados_lista.php después de una actualización exitosa
        header("Location: empleados_lista.php");
        exit;
    } else {
        echo "Error al actualizar los datos.";
    }
?>
