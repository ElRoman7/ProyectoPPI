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
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
<header class="header">
    <div class="contenedor">
        <div class="barra">
        <?php if($auth): ?>
            <a class="logo" href="/admin/bienvenido.php">
            <!-- <a href="/admin/bienvenido.php">Home</a> -->
        <?php else: ?>
            <a class="logo" href="/">
        <?php endif; ?>
            <h1 class="logo__nombre no-margin centrar-texto">Empresa<span class="logo__bold">01</span></h1>
            </a>
            <nav class="navegacion">
                <!-- <a href="empleados_elimina.php" class="navegacion__enlace">Elimina</a> -->
                <?php if($auth): ?>
                <a class="navegacion__enlace" href="/admin/bienvenido.php">Home</a>
                <a href="/admin/empleados_lista.php" class="navegacion__enlace">Empleados</a>
                <a href="/admin/productos_lista.php" class="navegacion__enlace">Productos</a>
                <a href="#" class="navegacion__enlace">Promociones</a>
                <a href="#" class="navegacion__enlace">Pedidos</a>
                <a href="/cerrar_sesion.php" class="navegacion__enlace">Cerrar Sesión</a>
                
                <?php endif; ?>
                <?php if(!$auth): ?>
                <!-- <a class="navegacion__enlace" href="/admin/index.php">Home</a> -->
                <a class="navegacion__enlace" href="/admin/" class="navegacion__enlace">Log-In</a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>