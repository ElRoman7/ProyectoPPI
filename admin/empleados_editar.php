<?php
require "funciones/conecta.php";
require 'funciones/funciones.php';
$auth = estaAutenticado();
if(!$auth){
    header('Location: /');
}
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

require "templates/header.php";
?>
    <div class="titulo-pag">
        <h2 class="no-margin">Editando Empleado</h2>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="empleados_lista.php">Volver</a>
    </div>
    
    <main class="contenedor">
        <form enctype="multipart/form-data" class="formulario" name="Forma01" method="post" action="empleados_actualizar.php" id="miFormularioActualizar">
        <?php include 'templates/empleados_formulario.php' ?>

            <div class="campo">
                    <input class="boton-negro" type="submit" name="submit" value="Guardar Cambios">
                </div>
        </form>
    </main>
    <div id="mensajes-error" class="alerta"></div>
<?php 
require "templates/footer.php"
?>