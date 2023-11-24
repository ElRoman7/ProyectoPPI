<?php 
    // Importar la conexión
    define("HOST", 'localhost');

    define("BD",'empresa01');  
    
    define("USER_BD",'root'); 
    
    define("PASS_BD",'Rg2003sA?');
    
    if (!function_exists('conecta')){
        function conecta(){
            $con = new mysqli(HOST, USER_BD, PASS_BD, BD);
            return $con;
        }
    }
    $db=conecta();


    // consultar
    $query = "SELECT * FROM productos LIMIT ${limite}";

    // obtener resultado
    $resultado = mysqli_query($db, $query);

?>

<div class="contenedor-anuncios">
        <?php while($producto = mysqli_fetch_assoc($resultado)): ?>
        <div class="anuncio">

            <img class="img-min" loading="lazy" src="/admin/archivosProductos/<?php echo $producto['archivo']; ?>" alt="anuncio">

            <div class="contenido-anuncio">
                <div class="contenedor-texto">
                    <h3><?php echo $producto['nombre']; ?></h3>
                    <p><?php echo substr($producto['descripcion'], 0, 130)."..."?><a href="#">Ver más</a></p>
                </div>
                <div class="contenedor-precio">
                    <p class="precio">$<?php echo $producto['costo']; ?></p>
                </div>
                <div class="contenedor-boton">
                    <a href="productos_detalle.php?id=<?php echo $producto['id']; ?>" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div>
            </div><!--.contenido-anuncio-->
        </div><!--anuncio-->
        <?php endwhile; ?>
    </div> <!--.contenedor-anuncios-->

<?php 

    // Cerrar la conexión
    mysqli_close($db);
?>