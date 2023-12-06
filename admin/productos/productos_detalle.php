<?php 
    require "../includes/config/conecta.php";
    require '../includes/funciones/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: /');
    }
    $con = conecta();
    $id = $_GET["id"];
    $query = "SELECT * FROM productos WHERE id = $id";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
    } else {
        // Manejo de errores si el empleado con el ID dado no se encuentra en la base de datos
        echo "Producto no encontrado.";
        exit;
    }
    $rol = $producto['id'];


    require "../includes/templates/header.php";
?>

    <div class="titulo-pag">
        <h2 >Detalles de Producto</h2>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="productos_lista.php">Volver</a>
    </div>

    <section class="contenedor seccion tarjeta-producto">
        <div class="bg-gray">
            <h3><?php echo $producto['nombre']; ?></h3>
        </div>
        <div class="img">
            <img class="imagen-producto" src="../archivosProductos/<?php echo $producto['archivo'] ?>" alt="imagen Producto">
        </div>
        <div >
            <p class="precio"><?php echo "$".$producto['costo']; ?></p>
        </div>
        <div class="bg-gray">
            <p><?php echo "Código: " . $producto['codigo']; ?></p>
        </div>
        <div >
            <p><?php echo $producto['descripcion'];?></p>
        </div>
        <div class="bg-gray">
            <p><?php echo "Stock: ". $producto['stock']; ?></p>
        </div>
    </section>

   
<?php 
    require "../includes/templates/footer.php"
?>