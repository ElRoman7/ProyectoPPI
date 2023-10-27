<?php
//empleados_salva.php
require "funciones/conecta.php";
$con = conecta();

//Variables para recibir archivo
$file_name  = $_FILES['archivo']['name'];
$file_tmp   = $_FILES['archivo']['tmp_name'];
$arreglo    = explode(".",$file_name);
$len        = count($arreglo);
$pos        = $len -1;
$ext        = $arreglo[$pos];
$dir        = "archivos/";

$file_enc   = md5_file($file_tmp);
$random_string = bin2hex(random_bytes(5)); // Genera una cadena aleatoria de 10 caracteres en hexadecimal.
$file_enc .= $random_string;
$new_file_enc = "$file_enc.$ext";
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
$passEnc    = md5($pass);
//! Guardar archivo
$file_destination = "archivos/" . $new_file_enc;
move_uploaded_file($file_tmp, $file_destination);
// if($file_name != ''){
//     $fileName1 = "$file_enc.$ext";
//     copy($file_tmp, $dir.$fileName1);
// }


$sql = "Insert INTO empleados
        (nombre, apellidos, correo, pass,rol,archivo_n,archivo)
        VALUES ('$nombre', '$apellidos','$correo','$passEnc',$rol,
        '$archivo_n','$archivo')";

$res = $con->query($sql);
if ($res) {
    // Redirigir a empleados_lista.php después de una actualización exitosa
    header("Location: empleados_lista.php");
    exit;
} else {
    echo "Error al actualizar los datos.";
}

?>