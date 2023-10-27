function validar() {
    var nombre = document.Forma01.nombre.value;
    var apellidos = document.Forma01.apellidos.value;
    var correo = document.Forma01.correo.value;
    var pass = document.Forma01.pass.value;
    var rol = document.Forma01.rol.value;
    if (nombre === '' || apellidos === '' || correo === '' || pass === '' || rol == 0) {
        alert('Faltan campos por llenar');
    } else {
        // Aquí puedes agregar lógica adicional si los campos están llenos
        document.Forma01.submit(); // Envía el formulario si todos los campos están llenos
    }
}
