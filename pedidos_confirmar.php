<?php 
require "includes/config/conecta.php";
require "includes/funciones/funciones.php";
$con = conecta();
$auth = UsuarioAutenticado();
$id_usuario = $_SESSION['id_usuario'];

$sql = "SELECT * FROM pedidos WHERE id_usuario = '$id_usuario' AND status = 0";
$res = $con->query($sql);
$num = $res->num_rows;

if ($num > 0) {
    $row = $res->fetch_assoc();
    $id_pedido = $row['id'];

    // Consulta SQL para actualizar el estado de 0 a 1
    $sql = "UPDATE pedidos SET status = 1 WHERE id = $id_pedido";

    // Ejecutar la consulta
    $resultado = mysqli_query($con, $sql);

    if ($resultado) {
        // La actualización fue exitosa
        echo '1';
    } else {
        // Hubo un error en la consulta
        echo '2';
    }
} 
?>