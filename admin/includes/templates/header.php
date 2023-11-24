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
        <?php if($admin): ?>
            <a class="logo" href="/admin/bienvenido.php">
            <!-- <a href="/admin/bienvenido.php">Home</a> -->
        <?php else: ?>
            <a class="logo" href="/">
        <?php endif; ?>
            <img class="logo__nombre centrar-texto"  src="/Logo.png" alt="">
            </a>
            <nav class="navegacion">
                <a class="navegacion__enlace" href="/admin/bienvenido.php">Home</a>
                <a href="/admin/empleados/empleados_lista.php" class="navegacion__enlace">Empleados</a>
                <a href="/admin/productos/productos_lista.php" class="navegacion__enlace">Productos</a>
                <a href="/admin/promociones/promociones_lista.php" class="navegacion__enlace">Promociones</a>
                <a href="/admin/pedidos/pedidos_lista.php" class="navegacion__enlace">Pedidos</a>
                <a href="/cerrar_sesion.php" class="navegacion__enlace">Cerrar Sesión</a>
            </nav>
        </div>
    </div>
</header>