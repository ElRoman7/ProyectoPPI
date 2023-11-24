<?php 
    //empleados_lista.php
    require "../includes/config/conecta.php";
    require '../includes/funciones/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: /');
    }
    $con = conecta();
    //  $id = $_POST['id'];

    $query = "SELECT * FROM promociones 
            WHERE status = 1 AND eliminado = 0";
    $result = $con->query($query);

    require "../includes/templates/header.php";
?>

    <div class="titulo-pag">
        <h2>Lista de Promociones</h2>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="promociones_alta.php">Nuevo Producto</a>
    </div>
    
    <table class="contenedor tabla-productos">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($promocion = $result->fetch_assoc()): 
                    $id             = $promocion["id"];
                    $nombre         = $promocion["nombre"];
            ?>
                <tr data-id="<?php echo $id; ?>">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nombre; ?></td>
                    <td>
                    <div class="contenedor-botones">
                        <a class="boton boton-amarillo-block" href="promociones_editar.php?id=<?php echo $id;?>">Editar</a>
                        <a class="boton boton-rojo-block eliminar-promocion" data-id="<?php echo $id; ?>" href="#">Eliminar</a>
                    </div>
                        <a class="boton boton-gris-block" href="promociones_detalle.php?id=<?php echo $id;?>">Ver Producto</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
<?php 
    require "../includes/templates/footer.php";
?>
