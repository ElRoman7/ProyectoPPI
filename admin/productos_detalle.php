<?php 
    require "funciones/conecta.php";
    require 'funciones/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: /');
    }
    $con = conecta();
    $id = $_GET["id"];
    $query = "SELECT * FROM productos WHERE id = $id";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
    } else {
        // Manejo de errores si el empleado con el ID dado no se encuentra en la base de datos
        echo "Producto no encontrado.";
        exit;
    }
    $rol = $producto['id'];


    require "templates/header.php";
?>

    <div class="titulo-pag">
        <h2 >Detalles de Empleado</h2>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="productos_lista.php">Volver</a>
    </div>

    <section class="contenedor ver-empleado">
        <div class="div1" class="head">
            <h3><?php echo $producto['nombre']; ?></h3>
        </div>
        <div  class="div2">
            <img class="imagen-empleado" src="archivos/<?php echo $producto['archivo'] ?>" alt="imagen Producto">
        </div>
        <div  class="div3">
            <p ><?php echo "$".$producto['costo']; ?></p>
        </div>
        <!-- <div  class="div4">
            <p ><?php echo $producto['apellidos']; ?></p>
        </div> -->
        <div  class="div5">
            <p><?php echo $producto['codigo']."<br>".$producto['descripcion'];?></p>
        </div>
        <div  class="div6">
            <p><?php echo "Stock: ". $producto['stock']; ?></p>
        </div>
    </section>

<?php 
    require "templates/footer.php"
?>