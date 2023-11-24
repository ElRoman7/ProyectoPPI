<?php 
function UsuarioAutenticado(): bool {
    session_start();
    $auth = $_SESSION['login'];
    $admin = $_SESSION['admin'];
    if($auth){
        return true;
    }
    return false;
}
