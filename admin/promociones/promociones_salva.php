<?php
    //empleados_salva.php
    require "../includes/config/conecta.php";
    require '../includes/funciones/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: /');
    }
    $con = conecta();

    $file_name  = $_FILES['prom_archivo']['name'];
    $file_tmp   = $_FILES['prom_archivo']['tmp_name'];
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_enc = md5(uniqid(rand(), true )).".$ext";
    $file_destination = "../archivosPromociones/" . $new_file_enc;
    move_uploaded_file($file_tmp, $file_destination);

    //Recibe Variables
    $nombre         = $_REQUEST['prom_nombre'];
    $archivo        = $new_file_enc;

        $dir        = "../archivosPromociones/";
        if(!is_dir($dir)){
            mkdir($dir);
        }
        $file_destination = "../archivosPromociones/" . $new_file_enc;
        move_uploaded_file($file_tmp, $file_destination);

        // Query
        $sql = "INSERT INTO promociones (nombre,archivo)
                VALUES ('$nombre','$archivo')";
                
        // Insertamos en la BD
        $res = mysqli_query($con,$sql);
        if ($res) {
            // Redirigir a empleados_lista.php después de una actualización exitosa
            header("Location: promociones_lista.php");
            die;
        } else {
            echo "Error al actualizar los datos.";
        }

?>