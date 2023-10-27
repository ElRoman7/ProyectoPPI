<?php
require "funciones/conecta.php";
$con = conecta();

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Consulta la base de datos para cargar los datos del empleado con el ID proporcionado
    $query = "SELECT * FROM empleados WHERE id = $id";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        $empleado = $result->fetch_assoc();
    } else {
        // Manejo de errores si el empleado con el ID dado no se encuentra en la base de datos
        echo "Empleado no encontrado.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa01 - Editar Empleado</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header">
        <!-- Encabezado similar al de alta -->
    </header>

    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="empleados_lista.php">Volver</a>
    </div>
    
    <main class="contenedor">
        <form enctype="multipart/form-data" class="formulario" name="Forma01" method="post" action="empleados_actualizar.php">
            <fieldset>
                <legend>Información Personal</legend>
                <input type="hidden" name="id" value="<?php echo $empleado['id']; ?>">
                <div class="campo">
                    <label class="campo__label" for="nombre">Nombre:</label>
                    <input class="campo__field" type="text" name="nombre" id="nombre" value="<?php echo $empleado['nombre']; ?>">
                </div>
                <div class="campo">
                    <label class="campo__label" for="apellidos">Apellidos:</label>
                    <input class="campo__field" type="text" name="apellidos" id="apellidos" value="<?php echo $empleado['apellidos'] ?>">
                </div>
                <div class="campo">
                    <label class="campo__label" for="correo">Correo:</label>
                    <input onblur="entra();" onfocus="sale();" class="campo__field" type="email" name="correo" id="correo" value="<?php echo $empleado['correo'];?>">
                </div>
                <div class="campo">
                    <label class="campo__label" for="pass">Contraseña:</label>
                    <input class="campo__field" type="password" name="pass" id="pass" placeholder="Deja en blanco para mantener la contraseña actual">
                    <input type="hidden" name="pass_actual" value="<?php echo $empleado['pass']; ?>">
                </div>
                <div class="campo">
                    <label class="campo__label" for="archivo">Archivo:</label>
                    <input class="campo__field" type="file" id="archivo" name="archivo" value = "<?php echo $empleado['archivo_n']; ?>">
                    <!--<input class="campo__field" type="submit" value="Subir Archivo" name="submit">-->
                </div>
                <p class="archivo-actual"> Archivo Actual:<?php echo $empleado['archivo_n'];?></p>
                <div class="campo">
                <label class="campo__label" for="rol">Rol:</label>
                <select name="rol" id="rol">
                    <option value="0" disabled <?php if ($empleado['rol'] == 0) echo "selected"; ?>>Selecciona</option>
                    <option value="1" <?php if ($empleado['rol'] == 1) echo "selected"; ?>>Gerente</option>
                    <option value="2" <?php if ($empleado['rol'] == 2) echo "selected"; ?>>Ejecutivo</option>
                </select>
                </div>
                <!-- Otros campos del formulario con valores prellenados desde la base de datos -->
                <div class="campo">
                    <input class="boton-negro" type="submit" name="submit" value="Guardar Cambios">
                </div>
            </fieldset>
        </form>
    </main>
    <footer class="footer seccion">
        <!-- Pie de página similar al de alta -->
    </footer>
    <script src="/build/js/bundle.min.js"></script>
</body>
</html>
