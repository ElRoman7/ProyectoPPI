<fieldset>
    <legend>Información Personal</legend>
    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
    <div class="campo">
        <label class="campo__label" for="prod_nombre">Nombre:</label>
        <input class="campo__field" type="text" name="prod_nombre" id="prod_nombre" placeholder="Escribe el Nombre del Producto" value="<?php echo $producto['nombre']; ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="prod_codigo">Código:</label>
        <input class="campo__field" type="text" name="prod_codigo" id="prod_codigo" value="<?php echo $producto['codigo'];?>" placeholder="Escribe el Codigo del Producto">
        <!-- onblur="entra();" onfocus="sale();" -->
        <div class="alerta alerta-correo bg-verde" id="mensaje"></div>
    </div>
    <div class="campo">
        <label class="campo__label" for="prod_descripcion">Descripción:</label>
        <textarea cols="30" rows="5" class="campo__field" type="text" name="prod_descripcion" id="prod_descripcion" placeholder="Escribe la descripcion del Producto"><?php echo $producto['descripcion']; ?></textarea>
    </div>
    <div class="campo">
        <label class="campo__label" for="prod_costo">Costo:</label>
        <input class="campo__field" type="text" name="prod_costo" id="prod_costo" placeholder="Escribe el Costo del Producto" value="<?php echo $producto['costo']; ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="prod_archivo">Archivo:</label>
        <input class="campo__field" type="file" id="prod_archivo" name="prod_archivo">
        <input type="hidden" name="archivoP_actual" value="<?php echo $producto['archivo'];?>">
    </div>
    <?php if($producto['archivo_n']!=''): ?>
    <p class="archivo-actual"> Archivo Actual:<?php echo $producto['archivo_n'];?></p>
    <?php endif; ?>
    <div class="campo">
        <label class="campo__label" for="prod_stock">Stock:</label>
        <input class="campo__field" type="text" name="prod_stock" id="prod_stock" placeholder="Stock" value="<?php echo $producto['stock']; ?>">
    </div>
</fieldset>