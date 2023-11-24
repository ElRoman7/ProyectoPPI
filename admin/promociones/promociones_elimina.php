<?php
require "../includes/config/conecta.php";
require '../includes/funciones/funciones.php';
$auth = estaAutenticado();
if(!$auth){
    header('Location: /');
}

$con = conecta();

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Realiza la eliminación del registro en la base de datos (consulta SQL DELETE)
    $query = "UPDATE promociones SET eliminado = 1 WHERE id = $id";

    $result = $con->query($query);

    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}
