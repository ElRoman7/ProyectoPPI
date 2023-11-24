<?php
require "includes/config/conecta.php";
require "includes/funciones/funciones.php";
$auth = UsuarioAutenticado();
$con = conecta();

// Recibe variables
$idP = $_REQUEST['idP'];
$cant = $_REQUEST['cant'];

$id_cliente = $_SESSION['id_usuario'];

// Obtener id_pedido
$sql = "SELECT * FROM pedidos WHERE id_usuario = '$id_cliente' AND status = 0";
$res = $con->query($sql);
$num = $res->num_rows;

if ($num > 0) {
    $row = $res->fetch_assoc();
    $id_pedido = $row['id'];

    // Actualizar la cantidad en la tabla pedidos_productos
    $sql_actualizar = "UPDATE pedidos_productos SET cantidad = $cant WHERE id_producto = $idP AND id_pedido = $id_pedido";
    $resultado = $con->query($sql_actualizar);

    if ($resultado) {
        // Éxito
        echo "1";
    } else {
        // Error en la consulta SQL
        echo "Error: " . $con->error;
    }
} else {
    // No se encontró un pedido abierto para el usuario
    echo "Error: No se encontró un pedido abierto para el usuario.";
}
?>
