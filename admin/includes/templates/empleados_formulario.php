<fieldset>
    <legend>Información Personal</legend>

    <input type="hidden" name="id" value="<?php echo $empleado['id']; ?>">

    <div class="campo">
        <label class="campo__label" for="nombre">Nombre:</label>
        <input class="campo__field" type="text" name="nombre" id="nombre" placeholder="Ingresa Tu Nombre" value="<?php echo $empleado['nombre']; ?>">
    </div>

    <div class="campo">
        <label class="campo__label" for="apellidos">Apellidos:</label>
        <input class="campo__field" type="text" name="apellidos" id="apellidos" value="<?php echo $empleado['apellidos'] ?>" placeholder="Ingresa tus Apellidos">
    </div>

    <div class="campo">
        <label class="campo__label" for="correo">Correo:</label>
        <input class="campo__field" type="email" name="correo" id="correo" placeholder="Ingresa tu correo" value="<?php echo $empleado['correo'];?>">
        <div class="alerta alerta-correo bg-verde" id="mensaje"></div>
    </div>

    <div class="campo">
        <label class="campo__label" for="pass">Contraseña:</label>
        <input class="campo__field" type="password" name="pass" id="pass" 
        <?php if($empleado['pass']!=''): ?> 
        placeholder="Deja en blanco para mantener la contraseña actual"
        <?php else: ?>
        placeholder="Ingresa una Contraseña"
        <?php endif; ?>
        >
        <input type="hidden" name="pass_actual" value="<?php echo $empleado['pass']; ?>">
    </div>

    <div class="campo">
        <label class="campo__label" for="archivo">Archivo:</label>
        <input class="campo__field" type="file" id="archivo" name="archivo">
        <input type="hidden" name="archivoE_actual" placeholder="Ingresa un Archivo" value="<?php echo $empleado['archivo'];?>">
    </div>
       <?php if($empleado['archivo_n']!=''): ?>
            <p class="archivo-actual"> Archivo Actual:<?php echo $empleado['archivo_n'];?></p>
        <?php endif; ?>
    <div class="campo">
        <label class="campo__label" for="rol">Rol:</label>
        <select name="rol" id="rol">
            <option value="0" disabled <?php if ($empleado['rol'] == 0) echo "selected"; ?>>Selecciona un Rol</option>
            <option value="1" <?php if ($empleado['rol'] == 1) echo "selected"; ?>>Gerente</option>
            <option value="2" <?php if ($empleado['rol'] == 2) echo "selected"; ?>>Ejecutivo</option>
        </select>
    </div>
    <!-- Otros campos del formulario con valores prellenados desde la base de datos -->
</fieldset>