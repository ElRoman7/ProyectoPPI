<?php 
    require 'includes/config/conecta.php';
    require 'includes/funciones/funciones.php';
    $db = conecta();
    $queryTotal = "SELECT COUNT(*) as total FROM productos WHERE status = 1 AND eliminado = 0";
    $resultadoTotal = mysqli_query($db, $queryTotal);
    $totalProductos = mysqli_fetch_assoc($resultadoTotal)['total'];
    
    include "includes/templates/header.php";
?>

    <div class="titulo-pag">
        <h2 class="no-margin">Listado de Productos</h2>
    </div>
    <section class="seccion contenedor">
        <!-- <h2>Productos</h2> -->
        
        <?php 
            $limite = $totalProductos;
            include 'includes/templates/anuncios.php';
        ?>


    </section>
<?php 
    include "includes/templates/footer.php";
?>