<?php 
require "includes/config/conecta.php";
require "includes/funciones/funciones.php";
$auth = UsuarioAutenticado();
$con = conecta();
$id = $_GET["id"];
$query = "SELECT * FROM productos WHERE status=1 and eliminado=0 and id = $id";
$idP = $id;
$result = $con->query($query);
if ($result->num_rows > 0) {
    $producto = $result->fetch_assoc();
} else {
    // Manejo de errores si el empleado con el ID dado no se encuentra en la base de datos
    echo "Empleado no encontrado.";
    exit;
}


include "includes/templates/header.php";
?>
    <div class="titulo-pag">
        <h2 class="no-margin">Detalles del producto</h2>
    </div>

    <section class="contenedor tarjeta-anuncio">
        <div class="tarjeta-foto">
            <img src="admin/archivosProductos/<?php echo $producto['archivo']; ?>" alt="foto producto">
        </div>
        <div class="tarjeta-información">
            <div class="tarjeta-titulo">
                <h2><?php echo $producto['nombre'] ?></h2>
            </div>
            <div>
                <p class="precio"><?php echo "$".$producto['costo'] ?></p>
            </div>
            <div class="tarjeta-descripcion">
                <p><?php echo $producto['descripcion'] ?></p>
            </div>
            <div class="tarjeta-boton">
                    <div class="tarjeta-pre">
                        <?php if($auth): ?>
                        <a class="boton boton-verde-block" onclick="agregarProducto(<?php echo $idP; ?>)">Agregar</a>
				 	    <input class="contador-carrito" type="text" value="1" id="cantidad<?php echo $idP; ?>">
                        <div class="mensaje confirmacion" id="mensaje<?php echo $idP; ?>"></div>
                        <?php endif; ?>
                    </div>
                    <div>
                    <?php if($auth): ?>
                        <p class="stock"><?php echo "Stock: ".$producto['stock'] ?></p>
                        <?php endif; ?>
                    </div>
                    <input type="hidden" name="id_producto" value="<?php echo $producto['id']; ?> ">
            </div>
        </div>
    </section>
    <section class="contenedor seccion">
        <div>
            <h4>Otros Productos Relacionados</h4>
        </div>
        <div>
        <?php 
        $consultaAleatoria = true;
            $limite = 3;
            include 'includes/templates/anuncios.php';
        ?>
        </div>
    </section>
<?php 
    include 'includes/templates/footer.php';
?>