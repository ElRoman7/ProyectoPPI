<?php 
    require 'funciones/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: /admin/');
    }
    $nombre = $_SESSION['nombreUsuario'];
    require "templates/header.php";
?>

    <div class="titulo-pag">
        <h2 class="no-margin">Sistema de Administración</h2>
        <h3>Bienvenido <?=$nombre;?></h3>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="empleados_lista.php">Empleados Lista</a>
        <a class="boton-verde botonNuevo" href="productos_lista.php">Productos Lista</a>
    </div>

<?php 
    require "templates/footer.php"
?>