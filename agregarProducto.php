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
if ($num == 0) {
    $fecha = date('Y-m-d H:i:s'); // Cambié el formato de fecha
    $sql = "INSERT INTO pedidos (fecha, id_usuario) VALUES ('$fecha', $id_cliente)";
    $res = $con->query($sql);
    $id_pedido = $con->insert_id;
} else {
    $row = $res->fetch_assoc();
    $id_pedido = $row['id'];
}

// Obtener precio
$sql = "SELECT costo FROM productos WHERE id = $idP";
$res = $con->query($sql);
$num = $res->num_rows;
if ($num) {
    $row = $res->fetch_assoc();
    $precio = $row['costo'];
}

if ($cant > 0) {
    // Verifica si ya se está pidiendo ese producto
    $sql = "SELECT * FROM pedidos_productos WHERE id_producto = $idP AND id_pedido = $id_pedido";
    $res = $con->query($sql);
    $num = $res->num_rows;
    
    if ($num == 0) {
        $sql = "INSERT INTO pedidos_productos (id_pedido, id_producto, cantidad, precio) 
                VALUES ($id_pedido, $idP, $cant, $precio)";
    } else {
        $sql = "UPDATE pedidos_productos SET cantidad = cantidad + $cant WHERE id_producto = $idP AND id_pedido = $id_pedido";
    }

    if (!$con->query($sql)) {
        // Manejar error de la consulta
        echo "Error en la consulta: " . $con->error;
    } else {
        echo 1;
    }
}
?>
