<?php 

    include "includes/templates/header.php";
?>

    <div class="titulo-pag">
        <h2 class="no-margin">Contacto</h2>
    </div>
    <div class="contenedor">
        <a class="boton-verde botonNuevo" href="index.php">Volver</a>
    </div>

    <main class="contenedor">
        <form enctype="multipart/form-data" class="formulario" name="Contacto" id="Contacto" method="POST" action="procesar_contacto.php">
            <fieldset>
                <legend>Información de Contacto</legend>

                            
                <div class="campo">
                    <label class="campo__label" for="cont_nombre">Nombre:</label>
                    <input required class="campo__field" type="text" name="cont_nombre" id="cont_nombre" placeholder="Ingresa Tu Nombre">
                </div>

                <div class="campo">
                    <label class="campo__label" for="cont_apellidos">Apellidos:</label>
                    <input required class="campo__field" type="text" name="cont_apellidos" id="cont_apellidos" placeholder="Ingresa tus Apellidos">
                </div>

                <div class="campo">
                    <label class="campo__label" for="cont_correo">Correo:</label>
                    <input required class="campo__field" type="email" name="cont_correo" id="cont_correo" placeholder="Ingresa tu correo">
                </div>
                <div class="campo">
                    <label class="campo__label" for="cont_descripcion">Descripción:</label>
                    <textarea cols="30" rows="5" class="campo__field" type="text" name="cont_descripcion" id="cont_descripcion" placeholder="Escribe la descripcion"></textarea>
                </div>
            </fieldset>

            <div class="campo">
                <input class="boton-negro" type="submit" name="submit" value="Enviar">
            </div>
        </form>
    </main>

<?php 
    include "includes/templates/footer.php";
?>