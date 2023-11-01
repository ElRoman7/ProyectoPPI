<?php
require "funciones/conecta.php";
$db = conecta();

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];
    $file_name = $_POST['archivo_n'];
    $new_file_enc = $_POST['archivo'];


    $consulta = "SELECT * FROM empleados WHERE id = {$id}";
    $resultado = mysqli_query($db,$consulta);
    $empleado = mysqli_fetch_assoc($resultado);
    if (!empty($_POST['pass'])) {
        $pass = $_POST['pass'];
        $passEnc = password_hash($pass,PASSWORD_DEFAULT);
    } else {
        // Si no se proporciona una nueva contraseña, mantener la contraseña actual
        $passEnc = $empleado['pass'];
    }

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
        $query = "UPDATE empleados SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', pass = '$passEnc', rol = $rol, archivo_n = '$file_name', archivo = '$new_file_enc' WHERE id = $id";
    } else {
        // // Si no se proporciona un nuevo archivo, mantener el nombre de archivo actual y su hash
        // $new_file_enc = $_POST['archivo'];
        // $file_name = $_POST['archivo_n'];
        $query = "UPDATE empleados SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', pass = '$passEnc', rol = $rol WHERE id = $id";
    }
    // Verificar si se proporcionó una nueva contraseña


    $result = $db->query($query);

    if ($result) {
        // Redirigir a empleados_lista.php después de una actualización exitosa
        header("Location: empleados_lista.php");
        exit;
    } else {
        echo "Error al actualizar los datos.";
    }
?>
