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

    $query = "SELECT * FROM productos 
            WHERE status = 1 AND eliminado = 0";
    $result = $con->query($query);

    require "../includes/templates/header.php";
?>

<div class="titulo-pag">
        <h2 class="no-margin">Lista de Productos</h2>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="productos_alta.php">Nuevo Producto</a>
    </div>
    
    <table class="contenedor tabla-productos">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Codigo</th>
                <th>Descripción</th>
                <th>Costo</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($productos = $result->fetch_assoc()): 
                    $id             = $productos["id"];
                    $nombre         = $productos["nombre"];
                    $codigo         = $productos["codigo"];
                    $descripcion    = $productos["descripcion"];
                    $costo          = $productos["costo"];
                    $stock          = $productos["stock"];
            ?>
                <tr data-id="<?php echo $id; ?>">
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo $codigo?></td>
                    <td><?php echo $descripcion?></td>
                    <td><?php echo "$".$costo?></td>
                    <td><?php echo $stock?></td>
                    <td>
                    <div class="contenedor-botones">
                        <a class="boton boton-amarillo-block" href="productos_editar.php?id=<?php echo $id;?>">Editar</a>
                        <a class="boton boton-rojo-block eliminar-producto" data-id="<?php echo $id; ?>" href="#">Eliminar</a>
                    </div>
                        <a class="boton boton-gris-block" href="productos_detalle.php?id=<?php echo $id;?>">Ver Producto</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
<?php 
    require "../includes/templates/footer.php"
?>
