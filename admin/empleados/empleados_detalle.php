<?php 
    require "../includes/config/conecta.php";
    $con = conecta();
    $id = $_GET["id"];
    $query = "SELECT * FROM empleados WHERE id = $id";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
        $empleado = $result->fetch_assoc();
    } else {
        // Manejo de errores si el empleado con el ID dado no se encuentra en la base de datos
        echo "Empleado no encontrado.";
        exit;
    }
    $rol = $empleado['id'];


    require "../includes/templates/header.php";
?>

    <div class="titulo-pag">
        <h2 >Detalles de Empleado</h2>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="empleados_lista.php">Volver</a>
    </div>

    <section class="contenedor ver-empleado">
        <div class="div1" class="head">
            <h3><?php echo $empleado['rol'] == 1 ? "Gerente":"Ejecutivo"; ?></h3>
        </div>
        <div  class="div2">
            <img class="imagen-empleado" src="../archivos/<?php echo $empleado['archivo'] ?>" alt="imagen Empleado">
        </div>
        <div  class="div3">
            <p ><?php echo $empleado['nombre'] . " " .$empleado['apellidos']; ?></p>
        </div>
        <!-- <div  class="div4">
            <p ><?php echo $empleado['apellidos']; ?></p>
        </div> -->
        <div  class="div5">
            <p><?php echo $empleado['correo'];?></p>
        </div>
        <div  class="div6">
            <p><?php echo $empleado['status'] == 1 ? "Activo":"Inactivo"; ?></p>
        </div>
    </section>

<?php 
    require "../includes/templates/footer.php"
?>