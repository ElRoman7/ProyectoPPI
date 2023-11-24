<?php 
    require "includes/funciones/funciones.php";
    $auth = UsuarioAutenticado();
    if(!$auth){
        header('Location: login.php');
    }
    include "includes/templates/header.php";
?>

    <div class="titulo-pag">
        <h2 class="no-margin">El pedido fue confirmado</h2>

    </div>
    <div class="contenedor">
    <p>Pronto nos pondremos en contacto contigo, da click en el siguiente enlace para seguir comprando:</p>
        <a class="boton-verde botonNuevo" href="index.php">Volver</a>
    </div>

<?php 
    include "includes/templates/footer.php";
?>