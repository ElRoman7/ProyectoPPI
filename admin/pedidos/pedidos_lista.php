<?php     
    require "../includes/config/conecta.php";
    $db = conecta();
    $sql = "SELECT *
    FROM pedidos
    WHERE pedidos.status = 1
";
    $resultado = mysqli_query($db,$sql);
    include "../includes/templates/header.php";
?>

    <div class="titulo-pag">
        <h2 class="no-margin">Lista de Pedidos</h2>
    </div>
    <section class="contenedor seccion">
    <table class="contenedor tabla-elimina carrito">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha</th>
                <th>usuario</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($pedido = mysqli_fetch_assoc($resultado)):
                $id = $pedido["id"];
                $fecha = $pedido["fecha"];
                $usuario = $pedido["id_usuario"];
                ?>
                <tr data-id="<?php echo $id; ?>">
                    <td><?php echo $id; ?></td> 
                    <td><?php echo $fecha; ?></td>
                    <td><?php echo $usuario ?></td>
                    <td><a class="boton boton-verde-block" href="pedidos_detalle.php?id=<?php echo $id;?>">Ver Pedido</a></td>
                </tr>
            <?php endwhile;?>
        </tbody>
    </table>
    </section>

<?php 
    include "../includes/templates/footer.php";
?>