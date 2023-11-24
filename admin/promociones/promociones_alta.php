<?php 
        
        require '../includes/funciones/funciones.php';
        $auth = estaAutenticado();
        if(!$auth){
            header('Location: /');
        }
        include "../includes/templates/header.php";
    ?>
    <div class="titulo-pag">
        <h2 class="no-margin">Alta de Promociones</h2>
    </div>

    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="promociones_lista.php">Volver</a>
    </div>
    
    <main class="contenedor">
        <form enctype="multipart/form-data" class="formulario" name="Forma01" method="POST" action="promociones_salva.php"  id="PromocionesAlta">
        <?php include '../includes/templates/promociones_formulario.php' ?>
        <div class="campo">
            <input class="boton-negro" type="submit" name="submit" value="Salvar">
        </div>
        </form>
    </main>
    <div id="mensajes-error" class="alerta"></div>
<?php 
require "../includes/templates/footer.php";
?>