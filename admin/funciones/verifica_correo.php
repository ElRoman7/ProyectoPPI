<?php
require "conecta.php";
$con = conecta();

// if (isset($_POST['correo'])) {
    $correo = $_POST['correo'];

    // Realiza una consulta SQL para verificar si el correo ya existe en la base de datos
    $query = "SELECT COUNT(*) as count FROM empleados WHERE correo = '$correo'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row['count'] > 0) {
            echo "exist";
        } else {
            echo "not_exist";
        }
    } else {
        echo "error: " . mysqli_error($con);
    }
// }
