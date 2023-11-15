<?php 
    require 'funciones/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: /');
    }
    require "templates/header.php";
    ?>
    <div class="titulo-pag">
        <h2 class="no-margin">Alta</h2>
    </div>

    <!-- <div id="mensajes-error" class="alerta error"></div>
    Validacion Backend
    <?php if(isset($errores) && !empty($errores)): ?>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach?>
    <?php endif; ?> -->

    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="empleados_lista.php">Volver</a>
    </div>
    
    <main class="contenedor">
        <form enctype="multipart/form-data" class="formulario" name="Forma01" method="POST" action="empleados_salva.php"  id="miFormulario">
            <?php include 'templates/empleados_formulario.php' ?>
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
require "templates/footer.php"
?>