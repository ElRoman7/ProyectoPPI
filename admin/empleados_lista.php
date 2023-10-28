<?php 
     //empleados_lista.php
     require "funciones/conecta.php";
     $con = conecta();
    //  $id = $_POST['id'];

     $query = "SELECT * FROM empleados 
             WHERE status = 1 AND eliminado = 0";
     $sql = $con->query($query);

    require "templates/header.php";
?>
    <div class="titulo-pag">
        <h2 class="no-margin">Lista de Empleados</h2>
    </div>
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
                    <td><?php echo $rol== 1 ? "Gerente":"Ejecutivo"; ?></td>
                    <td>
                    <div class="contenedor-botones">
                        <a class="boton boton-amarillo-block" href="empleados_editar.php?id=<?php echo $id;?>">Editar</a>
                        <a class="boton boton-rojo-block eliminar-empleado" data-id="<?php echo $id; ?>" href="#">Eliminar</a>
                    </div>
                        <a class="boton boton-gris-block" href="empleados_detalle.php?id=<?php echo $id;?>">Ver Empleado</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
<?php 
    require "templates/footer.php"
?>

