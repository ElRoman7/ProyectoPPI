<?php 
    require "../includes/config/conecta.php";
    require '../includes/funciones/funciones.php';
    $auth = estaAutenticado();
    if(!$auth){
        header('Location: /');
    }
    $con = conecta();
    $id = $_GET["id"];
    $query = "SELECT * FROM promociones WHERE id = $id";
    $result = $con->query($query);
    if ($result->num_rows > 0) {
        $promocion = $result->fetch_assoc();
    } else {
        // Manejo de errores si el empleado con el ID dado no se encuentra en la base de datos
        echo "Promocion no encontrada.";
        exit;
    }
    $rol = $promocion['id'];


    require "../includes/templates/header.php";
?>

    <div class="titulo-pag">
        <h2 >Detalles de Empleado</h2>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="promociones_lista.php">Volver</a>
    </div>
    <section class="contenedor ver-promocion">
        <div class="bg-gray">
            <h3><?php echo $promocion['nombre']; ?></h3>
        </div>
        <div>
        <img class="imagen-empleado" src="../archivosPromociones/<?php echo $promocion['archivo'] ?>" alt="imagen Promocion">
        </div>
    </section>
<?php 
    require "../includes/templates/footer.php";
?>