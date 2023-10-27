<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa01</title>
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header">
        <div class="contenedor">
            <div class="barra">
                <a class="logo" href="empleados_lista.php">
                    <h1 class="logo__nombre no-margin centrar-texto">Empresa<span class="logo__bold">01</span></h1>
                </a>

                <nav class="navegacion">
                    <!-- <a href="empleados_elimina.php" class="navegacion__enlace">Elimina</a> -->
                    <a href="empleados_alta.php" class="navegacion__enlace">Alta</a>
                    <a href="empleados_lista.php" class="navegacion__enlace">Empleados</a>
                </nav>
            </div>
        </div>
        <div class="header__texto">
            <h2 class="no-margin">Alta</h2>
        </div>
    </header>

    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="empleados_lista.php">Volver</a>
    </div>
    
    <main class="contenedor">
        <form enctype="multipart/form-data" class="formulario" name="Forma01" method="post" action="empleados_salva.php">
            <fieldset>
                <legend>Información Personal</legend>
            <div class="campo">
                <label class="campo__label" for="nombre">Nombre:</label>
                <input class="campo__field" type="text" name="nombre" id="nombre" placeholder="Escribe Tu Nombre">
            </div>
            <div class="campo">
                <label class="campo__label" for="apellidos">Apellidos:</label>
                <input class="campo__field" type="text" name="apellidos" id="apellidos" placeholder="Escribe Tu Apellidos">
            </div>
            <div class="campo">
                <label class="campo__label" for="correo">Correo:</label>
                <input onblur="entra();" onfocus="sale();" class="campo__field" type="email" name="correo" id="correo" placeholder="Escribe tu Email">
            </div>
            <div class="campo">
                <label class="campo__label" for="pass">Contraseña:</label>
                <input class="campo__field" type="password" name="pass" id="pass" placeholder="Escribe tu Contraseña">
            </div>
            <div class="campo">
                <label class="campo__label" for="archivo">Archivo:</label>
                <input class="campo__field" type="file" id="archivo" name="archivo"> <br><br>
                <!--<input class="campo__field" type="submit" value="Subir Archivo" name="submit">-->
            </div>
            <div class="campo">
                <label class="campo__label" for="rol">Rol:</label>
                <select name="rol" id="rol">
                    <option value="0" disabled>Selecciona</option>
                    <option value="1">Gerente</option>
                    <option value="2">Ejecutivo</option>
            </select>
            </div>
            <div class="campo">
            <input class="boton-negro" type="submit" name="submit" value="Salvar" onclick="validar();">
            </div>
        </fieldset>
        </form>
    </main>
    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="empleados_alta.php" class="navegacion__enlace">Alta</a>
                <a href="empleados_lista.php" class="navegacion__enlace">Empleados</a>
            </nav>
        </div>     
        <p class="copyright">Todos los derechos reservados <?php echo date('Y')?> &copy;</p>
    </footer>
    <script src="/build/js/bundle.min.js"></script>
</body>
</html>