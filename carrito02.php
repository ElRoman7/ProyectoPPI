<?php 


    require "includes/config/conecta.php";
    require "includes/funciones/funciones.php";
    $auth = UsuarioAutenticado();
    if(!$auth){
        header('Location: /');
    }
    $id_usuario = $_SESSION['id_usuario'];
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
WHERE pedidos.id_usuario = $id_usuario AND pedidos.status = 0
";
    $resultado = mysqli_query($db,$sql);
    include "includes/templates/header.php";
?>

    <div class="titulo-pag">
        <h2 class="no-margin">Carrito</h2>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="carrito01.php">Volver</a>
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
            while ($carrito = mysqli_fetch_assoc($resultado)) {
                $id = $carrito["id_pedidos_productos"];
                $nombre = $carrito["nombre_producto"];
                $costo = $carrito["precio"];
                $cantidad = $carrito["cantidad"];
                $subtotal = $cantidad*$costo;
                $idP = $carrito['id_producto'];
                $id_pedido = $carrito['id_pedido'];
                $total = "";
                ?>
                <tr data-id="<?php echo $id; ?>">
                    <td><?php echo $nombre; ?></td>
                    <td class="precio"><?php echo $costo ?></td>
                    <td>
                        <!-- <input type="number" name="cantidadC[<?php echo $id; ?>]" class="cantidad"value="<?php echo $cantidad; ?>"> -->
				 	        <input readonly contador-carrito type="text" value="<?php echo $cantidad; ?>" id="cantidad<?php echo $idP; ?>" class="cantidadProducto">
                        </div>
                    </td>
                    <td  class="subtotal"><?php echo $subtotal; ?></td> 
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
                <td class="total-valor"><?php echo $total?></td>
            </tr>
        </tfoot>
    </table>
    <input type="submit" onclick="confirmarPedido(<?php $id_pedido; ?>)" value="Confirmar Pedido">
    </section>
<?php 
    include "includes/templates/footer.php";
?>