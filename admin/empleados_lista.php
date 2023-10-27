<?php 
     //empleados_lista.php
     require "funciones/conecta.php";
     $con = conecta();
     $id = $_POST['id'];

     $query = "SELECT * FROM empleados 
             WHERE status = 1 AND eliminado = 0";
     $sql = $con->query($query);
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
                <a class="logo" href="empleados_lista.php">
                    <h1 class="logo__nombre no-margin centrar-texto">Empresa<span class="logo__bold">01</span></h1>
                </a>

                <nav class="navegacion">
                    <!-- <a href="empleados_elimina.php" class="navegacion__enlace">Elimina</a> -->
                    <a href="empleados_alta.php" class="navegacion__enlace">Alta</a>
                    <a href="empleados_lista.php" class="navegacion__enlace">Empleados</a>
                </nav>
            </div>
        </div>
        <div class="header__texto">
            <h2 class="no-margin">Lisa de Empleados</h2>
        </div>
    </header>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="empleados_alta.php">Nuevo Empleado</a>
    </div>
    
<table class="contenedor tabla-elimina">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre y Apellidos</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $sql->fetch_array()): 
                $id         = $row["id"];
                $nombre     = $row["nombre"];
                $apellidos  = $row["apellidos"];
                $correo     = $row["correo"];
                $rol        = $row["rol"]
        ?>
            <tr data-id="<?php echo $id; ?>">
                <td><?php echo $id; ?></td>
                <td><?php echo "$nombre $apellidos"; ?></td>
                <td><?php echo $correo ?></td>
                <td><?php echo $rol==1 ? "Gerente":"Ejecutivo"; ?></td>
                <td>
                <a class="boton boton-amarillo-block" href="empleados_editar.php?id=<?php echo $id;?>">Actualizar</a>
                <a class="boton boton-rojo-block eliminar-empleado" data-id="<?php echo $id; ?>" href="#">Eliminar</a>
                </td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>

<footer class="footer seccion">
    <div class="contenedor contenedor-footer">
        <nav class="navegacion">
            <a href="empleados_alta.php" class="navegacion__enlace">Alta</a>
            <a href="empleados_lista.php" class="navegacion__enlace">Empleados</a>
        </nav>
    </div>     
    <p class="copyright">Todos los derechos reservados <?php echo date('Y')?> &copy;</p>
</footer>

<script src="/build/js/bundle.min.js"></script>
</body>


</html>

