<?php 
    require 'includes/config/conecta.php';
    // require 'includes/funciones/funciones.php';
    $db=conecta();

    // consultar
    
    $consultaAleatoria = isset($consultaAleatoria) ? $consultaAleatoria : false;

    if($consultaAleatoria){
        $query = "SELECT * FROM productos where status=1 and eliminado=0 ORDER BY RAND() LIMIT ${limite} ";
    }else{
        $query = "SELECT * FROM productos where status=1 and eliminado=0 LIMIT ${limite} ";
    }
    $id = $_GET["id"];

    $auth = UsuarioAutenticado();
    

    // obtener resultado
    $resultado = mysqli_query($db, $query);

?>

<div class="contenedor-anuncios">
        <?php while($producto = mysqli_fetch_assoc($resultado)): ?>
        <div class="anuncio">
            <div class="anuncio-foto">
                <img class="img-min" loading="lazy" src="/admin/archivosProductos/<?php echo $producto['archivo']; ?>" alt="anuncio">
            </div>
            <div class="contenido-anuncio">
                <div class="contenedor-texto">
                    <h3><?php echo $producto['nombre']; ?></h3>
                    <!-- <p><?php echo substr($producto['descripcion'], 0, 130)."..."?><a href="productos_detalle.php?id=<?php echo $producto['id']; ?>"">Ver más</a></p> -->
                </div>
                <div class="contenedor-precio">
                    <p class="precio">$<?php echo $producto['costo']; ?></p>
                </div>
                <div class="contenedor-boton">
                    <a href="productos_detalle.php?id=<?php echo $producto['id']; ?>" class="boton-amarillo-block">
                        Ver Producto
                    </a>
                    <?php 
                         $idP = $producto['id'];
                    ?>
                    <?php if($auth): ?>
                    <a class="boton boton-verde-block" onclick="agregarProducto(<?php echo $idP; ?>)">Agregar al Carrito</a>
                    <input class="contador-carrito" type="hidden" value="1" id="cantidad<?php echo $idP; ?>">
                    <?php endif ?>
                </div>
            </div><!--.contenido-anuncio-->
            <div class="mensaje confirmacion" id="mensaje<?php echo $idP; ?>"></div>
        </div><!--anuncio-->
        <?php endwhile; ?>
    </div> <!--.contenedor-anuncios-->

<?php 

    // Cerrar la conexión
    mysqli_close($db);
?>