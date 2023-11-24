    <?php 
        require "../includes/templates/header.php";
        require '../includes/funciones/funciones.php';
        $auth = estaAutenticado();
        if(!$auth){
            header('Location: /');
        }
    ?>
    <div class="titulo-pag">
        <h2 class="no-margin">Alta de Productos</h2>
    </div>

    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="productos_lista.php">Volver</a>
    </div>
    
    <main class="contenedor">
        <form enctype="multipart/form-data" class="formulario" name="Forma01" method="POST" action="productos_salva.php"  id="ProductosAlta">
        <?php include '../includes/templates/productos_formulario.php' ?>
                <div class="campo">
            <input class="boton-negro" type="submit" name="submit" value="Salvar">
            <!--  -->
            </div>
        </form>
    </main>
    <div id="mensajes-error" class="alerta"></div>

    <script>

    </script>
<?php 
require "../includes/templates/footer.php"
?>