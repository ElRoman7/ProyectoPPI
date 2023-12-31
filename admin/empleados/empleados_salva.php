<?php
    //empleados_salva.php
    require '../includes/funciones/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: /');
    }
    require "../includes/config/conecta.php";
    $con = conecta();


    // $errores = [];
    // include "empleados_alta.php";

    // $nombre     = ''; 
    // $apellidos  = ''; 
    // $correo     = ''; 
    // $pass       = ''; 
    // $rol        = ''; 
    // $archivo_n  = ''; 
    // $archivo    = ''; 

    //Ejecutar el código cuando el usuario envie el formulario
    // if($_SERVER['REQUEST_METHOD']=='POST'){
        $file_name  = $_FILES['archivo']['name'];
        $file_tmp   = $_FILES['archivo']['tmp_name'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_enc = md5(uniqid(rand(), true )).".$ext";
        $file_destination = "archivos/" . $new_file_enc;
        move_uploaded_file($file_tmp, $file_destination);

        //Recibe Variables
        $nombre     = $_REQUEST['nombre'];
        $apellidos  = $_REQUEST['apellidos'];
        $correo     = $_REQUEST['correo'];
        $pass       = $_REQUEST['pass'];
        $rol        = $_REQUEST['rol'];
        $archivo_n  = $file_name;
        $archivo    = $new_file_enc;

            $passEnc = password_hash($pass,PASSWORD_DEFAULT);

            // Guardarmos archivo
            $dir        = "../archivos/";
            if(!is_dir($dir)){
                mkdir($dir);
            }
            $file_destination = "../archivos/" . $new_file_enc;
            move_uploaded_file($file_tmp, $file_destination);

            // Query
            $sql = "INSERT INTO empleados (nombre, apellidos, correo, pass,rol,archivo_n,archivo)
                    VALUES ('$nombre', '$apellidos','$correo','$passEnc',$rol, '$archivo_n','$archivo')";
                    
            // Insertamos en la BD
            $res = mysqli_query($con,$sql);
            if ($res) {
                // Redirigir a empleados_lista.php después de una actualización exitosa
                header("Location: empleados_lista.php");
                die;
            } else {
                echo "Error al actualizar los datos.";
            }
        // }
    // }
?>