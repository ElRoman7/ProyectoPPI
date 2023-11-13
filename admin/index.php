<?php 
    require 'funciones/funciones.php';
    $auth = estaAutenticado();
    if($auth){
        header('Location: bienvenido.php');
    }
    require "templates/header.php";
?>

    <div class="titulo-pag">
        <h2 class="no-margin">Login</h2>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="/admin/">Volver</a>
    </div>
    <section class="contenedor class="formulario">
        <form action="validaUsuario.php" method="post" class="formulario" id="formularioUser">
            <fieldset>
                <legend>Login</legend>
                <div class="campo">
                    <label class="campo__label" for="correoL">Correo:</label>
                    <input class="campo__field" type="text" id="correoL" name="correoL" >
                </div>
                <div class="campo">
                    <label class="campo__label" for="passwordL">Password:</label>
                    <input class="campo__field" type="password" id="passwordL" name="passwordL">
                </div>
            </fieldset>
            <div class="campo">
                    <input class="boton-negro" type="submit" name="submit" value="Ingresar">
            </div>
            <?php foreach($errores as $error): ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>
            <div class="alerta" id="login-error"></div>
        </form>
    </section>

<?php 

    require "templates/footer.php"
?>