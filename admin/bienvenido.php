<?php 
    require 'includes/funciones/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: index.php');
    }
    $nombre = $_SESSION['nombreUsuario'];
    require "includes/templates/header.php";
?>

    <div class="titulo-pag">
        <h2 class="no-margin">Sistema de Administración</h2>
        <h3>Bienvenido <?=$nombre;?></h3>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="/">Vista Cliente</a>
    </div>

<?php 
    require "includes/templates/footer.php"
?>