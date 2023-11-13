<?php 
    require 'funciones/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: /');
    }
        require "templates/header.php"
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
            <fieldset>
                <legend>Información Personal</legend>
            <div class="campo">
                <label class="campo__label" for="nombre">Nombre:</label>
                <input class="campo__field" type="text" name="nombre" id="nombre" placeholder="Escribe Tu Nombre" value="<?php echo $nombre; ?>">
            </div>
            <div class="campo">
                <label class="campo__label" for="apellidos">Apellidos:</label>
                <input class="campo__field" type="text" name="apellidos" id="apellidos" placeholder="Escribe Tu Apellidos" value="<?php echo $apellidos; ?>">
            </div>
            <div class="campo">
                <label class="campo__label" for="correo">Correo:</label>
                <input class="campo__field" type="email" name="correo" id="correo" placeholder="Escribe tu Email"value="<?php echo $email; ?>">
                <!-- onblur="onB();" onfocus="onF();" -->
                <div class="alerta alerta-correo" id="mensaje"></div>
            </div>
            <div class="campo">
                <label class="campo__label" for="pass">Contraseña:</label>
                <input class="campo__field" type="password" name="pass" id="pass" placeholder="Escribe tu Contraseña"value="<?php echo $pass; ?>">
            </div>
            <div class="campo">
                <label class="campo__label" for="archivo">Archivo:</label>
                <input class="campo__field" type="file" id="archivo" name="archivo"> <br><br>
                <!--<input class="campo__field" type="submit" value="Subir Archivo" name="submit">-->
            </div>
            <div class="campo">
                <label class="campo__label" for="rol">Rol:</label>
                <select name="rol" id="rol">
                    <option value="0" disabled>Selecciona</option>
                    <option value="1">Gerente</option>
                    <option value="2">Ejecutivo</option>
            </select>
            </div>
        </fieldset>
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