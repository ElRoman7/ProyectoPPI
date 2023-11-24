<?php
require "../config/conecta.php";
$con = conecta();

// if (isset($_POST['correo'])) {
    $correo = $_POST['user_correo'];

    // Realiza una consulta SQL para verificar si el correo ya existe en la base de datos
    $query = "SELECT COUNT(*) as count FROM usuarios WHERE correo = '$correo'";
    $result = mysqli_query($con, $query);
    
    $queryE = "SELECT COUNT(*) as count FROM empleados WHERE correo = '$correo'";
    $resultE = mysqli_query($con, $queryE); // Corregir aquí

    if ($result || $resultE) {
        $row = mysqli_fetch_assoc($result);
        $rowE = mysqli_fetch_assoc($resultE);

        if ($row['count'] > 0 || $rowE['count'] > 0) {
            echo "exist";
        } else {
            echo "not_exist";
        }
    } else {
        echo "error: " . mysqli_error($con);
    }
// }
?>
