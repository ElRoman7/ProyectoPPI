<?php 
    require 'includes/funciones/funciones.php';
    $resultado = $_GET["result"] ?? null; //Busca el valor y si no lo encuentra lo da como null
    require "includes/templates/header.php";
?>
    <?php if($resultado):  ?>
        <div class="contenedor mensaje-resultado">
            <?php if($resultado==1): ?>
                <p class="mensaje-contenido">Para acceder al carrito necesitas Iniciar Sesión</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="titulo-pag">
        <h2 class="no-margin">Login</h2>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="index.php">Volver</a>
    </div>
    <section class="contenedor class="formulario">
        <form action="usuario_validar.php" method="post" class="formulario" id="formularioUsuario">
            <fieldset>
                <legend>Login</legend>
                <div class="campo">
                    <label class="campo__label" for="user_correo">Correo:</label>
                    <input class="campo__field" type="text" id="user_correo" name="user_correo" >
                </div>
                <div class="campo">
                    <label class="campo__label" for="user_password">Password:</label>
                    <input class="campo__field" type="password" id="user_password" name="user_password">
                </div>
            </fieldset>
            <div class="campo">
                    <input class="boton-negro" type="submit" name="submit" value="Ingresar">
            </div>
                <div class="alerta error">
                </div>

            <div class="alerta" id="login-error"></div>
        </form>

        <a class="boton boton-amarillo" href="usuario_registro.php">Registrarse</a>
    </section>

<?php 
    require "includes/templates/footer.php";
?>