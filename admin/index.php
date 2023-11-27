<?php 
    require 'includes/funciones/funciones.php';
    $auth = estaAutenticado();
    if($auth){
        header('Location: bienvenido.php');
    }
?>
<?php 
    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;
    $admin = $_SESSION['admin'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa01</title>
    <link rel="stylesheet" href="../../../build/css/app.css">
</head>
<body>
<header class="header">
    <div class="contenedor">
        <div class="barra">
        <?php if($auth&&$admin): ?>
            <a class="logo" href="/admin/bienvenido.php">
            <!-- <a href="/admin/bienvenido.php">Home</a> -->
        <?php else: ?>
            <a class="logo" href="/">
        <?php endif; ?>
            <!-- <h1 class="logo__nombre no-margin centrar-texto">Empresa<span class="logo__bold">01</span></h1> -->
            <img class="logo__nombre centrar-texto"  src="../../../build/img/Logo.png" alt="">
            </a>
            <nav class="navegacion">
            </nav>
        </div>
    </div>
</header>
    <div class="titulo-pag">
        <h2 class="no-margin">Login</h2>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="/admin/">Volver</a>
    </div>
    <section class="contenedor class="formulario">
        <form action="usuario_validar.php" method="post" class="formulario" id="formularioUser">
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
                <div class="alerta error">
                </div>

            <div class="alerta" id="login-error"></div>
        </form>
    </section>

<?php 
    require "includes/templates/footer.php"
?>