function entra(){
    $('#mensaje').html('Entro al Campo');
    setTimeout("$('#mensaje').html('');",5000);
}
function sale(){
    $('#mensaje').html('Salio al Campo');
    setTimeout("$('#mensaje').html('');",5000);
}