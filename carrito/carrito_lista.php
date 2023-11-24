<?php
require 'includes/config/conecta.php';
$con = conecta();

$query = "SELECT
    c.ID AS CarritoID,
    P.ID AS ProductoID,
    P.Nombre AS NombreProducto,
    P.Costo AS CostoProducto,
    c.Cantidad,
    c.Subtotal
FROM
    carrito c
JOIN
    productos P ON c.ProductoID = P.ID";

$query2 = "SELECT SUM(Subtotal) AS Total FROM carrito";

$resultado = mysqli_query($con, $query);
$totalResult = mysqli_query($con, $query2);
$total = mysqli_fetch_assoc($totalResult);

// Verificar si hay resultados antes de intentar acceder a ellos
// if ($resultado && mysqli_num_rows($resultado) > 0) {
    include "includes/templates/header.php";
    ?>
    <div class="titulo-pag">
        <h2 class="no-margin">Carrito</h2>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="index.php">Volver</a>
    </div>
    <table class="contenedor tabla-elimina carrito">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Costo</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($carrito = mysqli_fetch_assoc($resultado)) {
                $id = $carrito["CarritoID"];
                $nombre = $carrito["NombreProducto"];
                $costo = $carrito["CostoProducto"];
                $cantidad = $carrito["Cantidad"];
                $subtotal = $carrito["Subtotal"];
                ?>
                <tr data-id="<?php echo $id; ?>">
                    <td><?php echo $nombre; ?></td>
                    <td class="precio"><?php echo $costo ?></td>
                    <td>
                        <input type="number" name="cantidadC[<?php echo $id; ?>]" class="cantidad"value="<?php echo $cantidad; ?>">
                    </td>
                    <td><?php echo $subtotal; ?></td> 
                    <td>
                            <a class="boton boton-rojo-block eliminar-prodCarrito" data-id="<?php echo $id; ?>" href="#">Eliminar</a>
                        <!-- </div> -->
                    </td>
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
                <td><?php echo '$'.$total['Total']; ?></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
    <?php
    include "includes/templates/footer.php";
// } else {
    // No hay productos en el carrito
//     echo "<p>No hay productos en el carrito.</p>";
// }

// Cerrar la conexión
mysqli_close($con);
?>
