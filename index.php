<?php 
    require 'includes/funciones/funciones.php';
    $auth = UsuarioAutenticado();
    include 'includes/templates/header.php';
?>

    <div class="titulo-pag">
        <h2 class="">CartEase</h2>
    </div>
    <div class="contenedor"> 
    </div>
    <section class="section contenedor">
        <h2>Promociones</h2>
        <?php include 'includes/templates/promocion.php' ?>
    </section>
    <section class="seccion contenedor">
        <h2>Productos</h2>
        
        <?php 
            $limite = 3;
            include 'includes/templates/anuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="productos.php" class="boton-verde">Ver Todos</a>
        </div>

    </section>

<?php 
    include 'includes/templates/footer.php';
?>