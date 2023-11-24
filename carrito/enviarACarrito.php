<?php 
    require 'includes/config/conecta.php';
    $con = conecta();
    $productoID = $_POST['id_producto'];
    $query = "SELECT * FROM productos WHERE id = $productoID";
    $resultado = mysqli_query($con,$query);

    $producto = mysqli_fetch_assoc($resultado);

    $cantidad = $_POST['cantidad'];
    $subtotal = $producto['costo']*$cantidad;
    // Verificar si el producto ya está en el carrito
    $consultaExistencia = "SELECT * FROM carrito WHERE ProductoID = $productoID";
    $resultadoExistencia = mysqli_query($con, $consultaExistencia);
    if (mysqli_num_rows($resultadoExistencia) > 0) {
        // El producto ya está en el carrito, actualizar la cantidad y subtotal
        $filaExistencia = mysqli_fetch_assoc($resultadoExistencia);
        $nuevaCantidad = $filaExistencia['Cantidad'] + $cantidad;
        $nuevoSubtotal = $filaExistencia['Subtotal'] + ($producto['costo'] * $cantidad);
    
        $queryActualizar = "UPDATE carrito SET Cantidad = $nuevaCantidad, Subtotal = $nuevoSubtotal WHERE ProductoID = $productoID";
        $resultadoActualizar = mysqli_query($con, $queryActualizar);
    
        if ($resultadoActualizar) {
            header('Location: carrito_lista.php');
        } else {
            echo "Error al actualizar el carrito.";
        }
    } else{
    // $subtotal;
    
    $query = "INSERT INTO carrito (ProductoID,Cantidad,Subtotal) VALUES ($productoID,$cantidad,$subtotal)";
    $resultado = mysqli_query($con,$query);
    }
    if($resultado){
        header('Location: carrito_lista.php');
    }
?>