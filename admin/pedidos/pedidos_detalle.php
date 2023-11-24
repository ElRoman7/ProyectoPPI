<?php
require "../includes/config/conecta.php"; 
$id_pedido = $_GET['id'];
$db = conecta();
$sql = "SELECT 
    pedidos.id AS id_pedido,
    pedidos.fecha,
    pedidos.id_usuario,
    pedidos.status,
    pedidos_productos.id AS id_pedidos_productos,
    productos.nombre AS nombre_producto,
    pedidos_productos.id_producto,
    pedidos_productos.cantidad,
    pedidos_productos.precio
    FROM pedidos
    JOIN pedidos_productos ON pedidos.id = pedidos_productos.id_pedido
    JOIN productos ON pedidos_productos.id_producto = productos.id
    WHERE id_pedido = $id_pedido
    ";
$resultado = mysqli_query($db, $sql);

// Verifica si hay algún resultado antes de realizar la consulta
if ($resultado) {
    $total = 0; // Inicializa la variable total fuera del bucle

    include "../includes/templates/header.php";
?>

<div class="titulo-pag">
    <h2 class="no-margin">Detalles de Pedido</h2>
</div>
<div class="contenedor">
    <a class="boton-verde botonNuevo" href="pedidos_lista.php">Volver</a>
</div>

<section class="contenedor seccion">
    <table class="contenedor tabla-elimina carrito">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Costo</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($pedido = mysqli_fetch_assoc($resultado)) {
                $id = $pedido["id_pedidos_productos"];
                $nombre = $pedido["nombre_producto"];
                $costo = $pedido["precio"];
                $cantidad = $pedido["cantidad"];
                $subtotal = $cantidad * $costo;
                $idP = $pedido['id_producto'];
                $id_pedido = $pedido['id_pedido'];
                $total += $subtotal; // Actualiza el total en cada iteración
                ?>
                <tr data-id="<?php echo $id; ?>">
                    <td><?php echo $nombre; ?></td>
                    <td class="precio"><?php echo $costo ?></td>
                    <td>
                        <input readonly contador-carrito type="text" value="<?php echo $cantidad; ?>" id="cantidad<?php echo $idP; ?>" class="cantidadProducto input-cantidad">
                    </td>
                    <td class="subtotal"><?php echo $subtotal; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td>TOTAL</td>
                <td></td>
                <td></td>
                <td class="total-valor"><?php echo $total; ?></td>
            </tr>
        </tfoot>
    </table>
    <!-- <input type="submit" onclick="confirmarPedido(<?php $id_pedido; ?>)" value="Confirmar Pedido"> -->
</section>

<?php 
    include "../includes/templates/footer.php";
} else {
    // Maneja el error si la consulta no se realiza correctamente
    echo "Error en la consulta: " . mysqli_error($db);
}
?>
