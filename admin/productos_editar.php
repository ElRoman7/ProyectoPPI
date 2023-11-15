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
    $query = "SELECT * FROM productos WHERE id = $id";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
    } else {
        // Manejo de errores si el empleado con el ID dado no se encuentra en la base de datos
        echo "Empleado no encontrado.";
        exit;
    }
}

require "templates/header.php";
?>
    <div class="titulo-pag">
        <h2 class="no-margin">Editando Producto</h2>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="productos_lista.php">Volver</a>
    </div>
    
    <main class="contenedor">
        <form enctype="multipart/form-data" class="formulario" name="Forma01" method="post" action="productos_actualizar.php" id="miFormularioActualizarP">
            <fieldset>
                <legend>Información Personal</legend>
                <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                <div class="campo">
                    <label class="campo__label" for="nombreP">Nombre:</label>
                    <input class="campo__field" type="text" name="nombreP" id="nombreP" placeholder="Escribe el Nombre del Producto" value="<?php echo $producto['nombre']; ?>">
                </div>
                <div class="campo">
                    <label class="campo__label" for="codigo">Código:</label>
                    <input class="campo__field" type="text" name="codigo" id="codigo" value="<?php echo $producto['codigo'];?>">
                    <!-- onblur="entra();" onfocus="sale();" -->
                    <div class="alerta alerta-correo bg-verde" id="mensaje"></div>
                </div>
                <div class="campo">
                    <label class="campo__label" for="descripcion">Descripción:</label>
                    <textarea cols="30" rows="5" class="campo__field" type="text" name="descripcion" id="descripcion" placeholder="Escribe la descripcion del Producto"><?php echo $producto['descripcion']; ?></textarea>
                </div>
                <div class="campo">
                    <label class="campo__label" for="costo">Costo:</label>
                    <input class="campo__field" type="text" name="costo" id="costo" placeholder="Costo" value="<?php echo $producto['costo']; ?>">
                </div>
                <div class="campo">
                    <label class="campo__label" for="archivoP">Archivo:</label>
                    <input class="campo__field" type="file" id="archivoP" name="archivoP">
                    <input type="hidden" name="archivoP_actual" value="<?php echo $producto['archivo'];?>">
                </div>
                <p class="archivo-actual"> Archivo Actual:<?php echo $producto['archivo_n'];?></p>
                <div class="campo">
                    <label class="campo__label" for="stock">Stock:</label>
                    <input class="campo__field" type="text" name="stock" id="stock" placeholder="Stock" value="<?php echo $producto['stock']; ?>">
                </div>
            </fieldset>
            <div class="campo">
                    <input class="boton-negro" type="submit" name="submit" value="Guardar Cambios">
                </div>
        </form>
    </main>
    <div id="mensajes-error" class="alerta"></div>
<?php 
require "templates/footer.php"
?>