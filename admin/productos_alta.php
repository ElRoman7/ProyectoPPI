    <?php 
        require "templates/header.php"
    ?>
    <div class="titulo-pag">
        <h2 class="no-margin">Alta de Productos</h2>
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
        <a class="boton-verde botonNuevo" href="productos_lista.php">Volver</a>
    </div>
    
    <main class="contenedor">
        <form enctype="multipart/form-data" class="formulario" name="Forma01" method="POST" action="productos_salva.php"  id="miFormulario">
            <fieldset>
                <legend>Información Personal</legend>
                <!-- Nombre del producto -->
            <div class="campo">
                <label class="campo__label" for="nombre">Nombre:</label>
                <input class="campo__field" type="text" name="nombre" id="nombre" placeholder="Escribe el Nombre del Producto" value="<?php echo $nombre; ?>">
            </div>
            <!-- Codigo -->
            <div class="campo">
                <label class="campo__label" for="codigo">Código:</label>
                <input class="campo__field" type="text" name="codigo" id="codigo" placeholder="Escribe el Código del Producto" value="<?php echo $codigo; ?>">
                <div class="alerta alerta-correo" id="mensaje"></div>

            </div>
            <!-- Descripcion -->
            <div class="campo">
                <label class="campo__label" for="descripcion">Descripción:</label>
                <textarea cols="30" rows="5" class="campo__field" type="text" name="descripcion" id="descripcion" placeholder="Escribe la descripcion del Producto"><?php echo $descripcion; ?></textarea>
                <!-- onblur="onB();" onfocus="onF();" -->
                <!-- <div class="alerta alerta-correo" id="mensaje"></div> -->
            </div>
            <!-- Costo -->
            <div class="campo">
                <label class="campo__label" for="costo">Costo:</label>
                <input class="campo__field" type="text" name="costo" id="costo" placeholder="Escribe el costo del producto"value="<?php echo $costo; ?>">
            </div>
            <!-- Stock -->
            <div class="campo">
                <label class="campo__label" for="stock">Stock:</label>
                <input class="campo__field" type="text" name="stock" id="stock" placeholder="Escribe el stock del producto"value="<?php echo $stock; ?>">
            </div>
            <div class="campo">
                <label class="campo__label" for="archivo">Archivo:</label>
                <input class="campo__field" type="file" id="archivo" name="archivo"> <br><br>
                <!--<input class="campo__field" type="submit" value="Subir Archivo" name="submit">-->
            </div>
            <div class="campo">
            <input class="boton-negro" type="submit" name="submit" value="Salvar">
            </div>
        </fieldset>
        </form>
    </main>
    <div id="mensajes-error" class="alerta"></div>

    <script>

    </script>
<?php 
require "templates/footer.php"
?>