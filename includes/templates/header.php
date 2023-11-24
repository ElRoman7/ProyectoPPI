<?php 
    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa01</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>
<header class="header">
    <div class="contenedor">
        <div class="barra">
            <a class="logo" href="/">
            <img class="logo__nombre centrar-texto"  src="/Logo.png" alt="">
            </a>
            <nav class="navegacion">
                <a class="navegacion__enlace" href="/">Home</a>
                <a href="productos.php" class="navegacion__enlace">Productos</a>
                <a href="contacto.php" class="navegacion__enlace">Contacto</a>
                <a href="carrito01.php" class="navegacion__enlace">Carrito</a>
                <?php if($auth): ?>
                <a href="cerrar_sesion.php" class="navegacion__enlace">Cerrar Sesión</a>
                <?php else: ?>
                <a href="login.php" class="navegacion__enlace">Log-in</a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>
