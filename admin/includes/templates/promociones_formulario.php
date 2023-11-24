<fieldset>
    <legend>Información Personal</legend>
    <input type="hidden" name="id" value="<?php echo $promocion['id']; ?>">
    <div class="campo">
        <label class="campo__label" for="prom_nombre">Nombre:</label>
        <input class="campo__field" type="text" name="prom_nombre" id="prom_nombre" placeholder="Escribe el Nombre del Producto" value="<?php echo $promocion['nombre']; ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="prom_archivo">Archivo:</label>
        <input class="campo__field" type="file" id="prom_archivo" name="prom_archivo">
        <input type="hidden" name="prom_archivo" value="<?php echo $promocion['archivo'];?>">
    </div>
    <?php if($promocion['archivo']!=''): ?>
        <p class="archivo-actual"> Foto Actual:</p>
        <img class="imagen-small" src="../archivosPromociones/<?php echo $promocion['archivo'] ?>" alt="imagen-small">    
    <?php endif; ?>
</fieldset>