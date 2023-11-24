<?php
require "../includes/config/conecta.php";
require '../includes/funciones/funciones.php';

$auth = estaAutenticado();
if (!$auth){
    header('Location: /');
    exit; // Detener la ejecución después de redirigir
}

$db = conecta();

$id = $_POST['id'];
$nombre = $_POST['prod_nombre'];
$codigo = $_POST['prod_codigo'];
$descripcion = $_POST['prod_descripcion'];
$costo = $_POST['prod_costo'];
$stock = $_POST['prod_stock'];
$file_name = $_POST['archivo_n'];
$new_file_enc = $_POST['prod_archivo'];

$consulta = "SELECT * FROM productos WHERE id = {$id}";
$resultado = mysqli_query($db,$consulta);
$producto = mysqli_fetch_assoc($resultado);

// Verificar si se proporcionó un nuevo archivo
if (!empty($_FILES['prod_archivo']['name'])) {
    // Borrar archivo si se va a actualizar
    $carpetaImagenes = "../archivosProductos/";
    unlink($carpetaImagenes . $producto['archivo']); //* Función para borrar

    // Obtener nombre y un temporal name que se va a encriptar
    $file_name = $_FILES['prod_archivo']['name'];
    $file_tmp = $_FILES['prod_archivo']['tmp_name'];

    $ext = pathinfo($file_name, PATHINFO_EXTENSION);

    // Construir el nuevo nombre del archivo encriptado
    $new_file_enc = md5(uniqid(rand(), true)).".$ext";
    $file_destination = "$carpetaImagenes" . $new_file_enc;
    move_uploaded_file($file_tmp, $file_destination);

} else {
    // Si no se proporciona un nuevo archivo, mantener el nombre de archivo actual y su hash
    $new_file_enc = $producto['archivo'];
    $file_name = $producto['archivo_n'];
}

$query = "UPDATE productos SET nombre = '$nombre', codigo = '$codigo', descripcion = '$descripcion', costo = $costo, stock = '$stock' , archivo_n = '$file_name', archivo = '$new_file_enc' WHERE id = $id";
$result = $db->query($query);

if ($result) {
    // Redirigir a productos_lista.php después de una actualización exitosa
    header("Location: productos_lista.php");
    exit;
} else {
    echo "Error al actualizar los datos.";
}
?>
