<?php
require "funciones/conecta.php";
require 'funciones/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: /');
    }

    $db = conecta();

    $id = $_POST['id'];
    $nombre = $_POST['nombreP'];
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $costo = $_POST['costo'];
    $stock = $_POST['stock'];
    $file_name = $_POST['archivo_n'];
    $new_file_enc = $_POST['archivoP'];


    $consulta = "SELECT * FROM productos WHERE id = {$id}";
    $resultado = mysqli_query($db,$consulta);
    $producto = mysqli_fetch_assoc($resultado);

    // Verificar si se proporcionó un nuevo archivo
    if (!empty($_FILES['archivoP']['name'])) {
        // Borrar archivo si se va a actualizar
        $carpetaImagenes = "archivosProductos/";
        unlink($carpetaImagenes . $producto['archivo']); //* Funcion para borrar

        // Obtener nombre y un temporal name que se va a encriptar
        $file_name = $_FILES['archivoP']['name'];
        $file_tmp = $_FILES['archivoP']['tmp_name'];

        $ext = pathinfo($file_name, PATHINFO_EXTENSION);

        // Construir el nuevo nombre del archivo encriptado
        $new_file_enc = md5(uniqid(rand(), true )).".$ext";
        $file_destination = "$carpetaImagenes" . $new_file_enc;
        move_uploaded_file($file_tmp, $file_destination);

        $query = "UPDATE productos SET nombre = '$nombre', codigo = '$codigo', codigo = '$codigo', descripcion = '$descripcion', costo = $costo, stock = '$stock' , archivo_n = '$file_name', archivo = '$new_file_enc' WHERE id = $id";

    } else {
        $query = "UPDATE productos SET nombre = '$nombre', codigo = '$codigo', codigo = '$codigo', descripcion = '$descripcion', costo = $costo, stock = '$stock' WHERE id = $id";
    }

    $result = $db->query($query);

    if ($result) {
        // Redirigir a empleados_lista.php después de una actualización exitosa
        header("Location: productos_lista.php");
        exit;
    } else {
        echo "Error al actualizar los datos.";
    }
?>
