<?php 
    $auth = $_SESSION['login'] ?? false;
    require "admin/templates/header.php";
?>

    <div class="titulo-pag">
        <h2 class="">Index</h2>
    </div>
    <div class="contenedor"> 
        <?php if($auth): 
            header('Location: /admin/bienvenido.php');
        ?>
        <?php else: ?>
        <a class="boton boton-verde botonNuevo" href="admin/index.php">Log-in</a>
        <?php endif; ?>
    </div>

<?php 
    require "admin/templates/footer.php"
?>