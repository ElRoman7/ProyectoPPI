
<footer class="footer seccion">
    <div class="contenedor contenedor-footer">
        <nav class="navegacion">
        <?php if($auth): ?>
            <a class="navegacion__enlace" href="/admin/bienvenido.php">Home</a>
            <a href="/admin/empleados_lista.php" class="navegacion__enlace">Empleados</a>
            <a href="/admin/productos_lista.php" class="navegacion__enlace">Productos</a>
            <a href="#" class="navegacion__enlace">Promociones</a>
            <a href="#" class="navegacion__enlace">Pedidos</a>
        <?php endif; ?>
        </nav>
    </div>     
    <p class="copyright">Todos los derechos reservados <?php echo date('Y')?> &copy;</p>
</footer>
<script src="/build/js/bundle.min.js"></script>
</body>
</html>