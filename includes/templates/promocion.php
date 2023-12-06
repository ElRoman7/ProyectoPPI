<?php
require 'includes/config/conecta.php';
$con = conecta();

// Consulta SQL para obtener una imagen aleatoria
$query = "SELECT archivo FROM promociones WHERE status = 1 AND eliminado = 0 ORDER BY RAND() LIMIT 1";
$result = mysqli_query($con, $query);

// Verificar si hay resultados antes de intentar acceder a ellos
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $rutaImagen = $row['archivo'];
?>
    <div class="imagen-promocion">
        <img src="admin/archivosPromociones/<?php echo $rutaImagen; ?>" class="d-block w-100" alt="Promoción">
    </div>
<?php
} else {
    echo "<p>No hay promociones disponibles.</p>";
}
?>
