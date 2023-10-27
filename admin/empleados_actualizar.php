<?php
require "funciones/conecta.php";
$con = conecta();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];

    // Verificar si se proporcionó un nuevo archivo
    if (!empty($_FILES['archivo']['name'])) {
        $file_name = $_FILES['archivo']['name'];
        $file_tmp = $_FILES['archivo']['tmp_name'];
        
        $file_enc   = md5_file($file_tmp);
        $random_string = bin2hex(random_bytes(5)); // Genera una cadena aleatoria de 10 caracteres en hexadecimal.
        $file_enc .= $random_string;
        $new_file_enc = "$file_enc.$ext";

        // Obtener la extensión del archivo
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        
        // Construir el nuevo nombre del archivo encriptado
        $new_file_enc = "$file_enc.$ext";
        
        // Mover y guardar el nuevo archivo en el servidor con el nombre encriptado
        $file_destination = "archivos/" . $new_file_enc;
        move_uploaded_file($file_tmp, $file_destination);
    } else {
        // Si no se proporciona un nuevo archivo, mantener el nombre de archivo actual y su hash
        $new_file_enc = $_POST['archivo_actual'];
        $file_enc = $_POST['archivo_actual_enc'];
    }
    // Verificar si se proporcionó una nueva contraseña
    if (!empty($_POST['pass'])) {
        $pass = $_POST['pass'];
        $passEnc = md5($pass);
    } else {
        // Si no se proporciona una nueva contraseña, mantener la contraseña actual
        $passEnc = $_POST['pass_actual'];
    }

    // Actualizar la base de datos, incluyendo el archivo encriptado
    $query = "UPDATE empleados SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', rol = $rol, archivo_n = '$file_name', archivo = '$new_file_enc' WHERE id = $id";

    $result = $con->query($query);

    if ($result) {
        // Redirigir a empleados_lista.php después de una actualización exitosa
        header("Location: empleados_lista.php");
        exit;
    } else {
        echo "Error al actualizar los datos.";
    }
}
?>
