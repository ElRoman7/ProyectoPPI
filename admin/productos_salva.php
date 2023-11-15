<?php
    //empleados_salva.php
    require "funciones/conecta.php";
    require 'funciones/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: /');
    }
    $con = conecta();

    $file_name  = $_FILES['archivo']['name'];
    $file_tmp   = $_FILES['archivo']['tmp_name'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_enc = md5(uniqid(rand(), true )).".$ext";
    $file_destination = "archivosProductos/" . $new_file_enc;
    move_uploaded_file($file_tmp, $file_destination);

    //Recibe Variables
    $nombre         = $_REQUEST['nombre'];
    $codigo         = $_REQUEST['codigo'];
    $descripcion    = $_REQUEST['descripcion'];
    $costo          = $_REQUEST['costo'];
    $stock          = $_REQUEST['stock'];
    $archivo_n      = $file_name;
    $archivo        = $new_file_enc;

        $dir        = "archivos/";
        if(!is_dir($dir)){
            mkdir($dir);
        }
        $file_destination = "archivos/" . $new_file_enc;
        move_uploaded_file($file_tmp, $file_destination);

        // Query
        $sql = "INSERT INTO productos (nombre, codigo, descripcion, costo,stock,archivo_n,archivo)
                VALUES ('$nombre', '$codigo','$descripcion', $costo, $stock, '$archivo_n', '$archivo')";
                
        // Insertamos en la BD
        $res = mysqli_query($con,$sql);
        if ($res) {
            // Redirigir a empleados_lista.php después de una actualización exitosa
            header("Location: productos_lista.php");
            die;
        } else {
            echo "Error al actualizar los datos.";
        }

?>