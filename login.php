<?php 
    require 'includes/funciones/funciones.php';

    require "includes/templates/header.php";
?>

    <div class="titulo-pag">
        <h2 class="no-margin">Login</h2>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="index.php">Volver</a>
    </div>
    <section class="contenedor class="formulario">
        <form action="validaUsuario.php" method="post" class="formulario" id="formularioUsuario">
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

        <a class="boton boton-amarillo" href="registro.php">Registrarse</a>
    </section>

<?php 
    require "includes/templates/footer.php";
?>