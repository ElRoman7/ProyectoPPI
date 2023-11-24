<?php 
    require 'includes/config/conecta.php';
    $con = conecta();
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    
        // Realiza la eliminación del registro en la base de datos (consulta SQL DELETE)
        $query = "DELETE FROM pedidos_productos WHERE id = $id";
    
        $result = $con->query($query);
    
        if ($result) {
            echo "success";
        } else {
            echo "error";
        }
    }
?>