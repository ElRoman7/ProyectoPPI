<?php 
    require 'includes/funciones/funciones.php';
    require 'includes/config/conecta.php';
    $con = conecta();
    $auth = UsuarioAutenticado();
    if($auth){
        header('Location: /');
    }

    include "includes/templates/header.php";
    ?>
    <div class="titulo-pag">
        <h2 class="no-margin">Registro</h2>
    </div>

    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="login.php">Volver</a>
    </div>
    
    <main class="contenedor">
        <form enctype="multipart/form-data" class="formulario" name="Forma01" method="POST" action="usuario_alta.php"  id="UsuariosAlta">
        <fieldset>
            <legend>Información Personal</legend>

            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

            <div class="campo">
                <label class="campo__label" for="user_nombre">Nombre:</label>
                <input class="campo__field" type="text" name="user_nombre" id="user_nombre" placeholder="Ingresa Tu Nombre" value="<?php echo $usuario['nombre']; ?>">
            </div>

            <div class="campo">
                <label class="campo__label" for="user_apellidos">Apellidos:</label>
                <input class="campo__field" type="text" name="user_apellidos" id="user_apellidos" value="<?php echo $usuario['apellidos'] ?>" placeholder="Ingresa tus Apellidos">
            </div>

            <div class="campo">
                <label class="campo__label" for="user_correo">Correo:</label>
                <input class="campo__field" type="email" name="user_correo" id="user_correo" placeholder="Ingresa tu correo" value="<?php echo $usuario['correo'];?>">
                <div class="alerta alerta-correo bg-verde" id="mensaje"></div>
            </div>

            <div class="campo">
                <label class="campo__label" for="user_pass">Contraseña:</label>
                <input class="campo__field" type="password" name="user_pass" id="user_pass" 
                placeholder="Ingresa una Contraseña">
                <input type="hidden" name="pass_actual" value="<?php echo $usuario['pass']; ?>">
            </div>
            <!-- Otros campos del formulario con valores prellenados desde la base de datos -->
        </fieldset>
        <div class="campo">
            <input class="boton-negro" type="submit" name="submit" value="Salvar">
            </div>
        </form>
    </main>
    <div id="mensajes-error" class="alerta"></div>
<?php 
require "includes/templates/footer.php";
?>