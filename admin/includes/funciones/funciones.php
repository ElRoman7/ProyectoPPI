<?php 
function estaAutenticado(): bool {
    session_start();
    $auth = $_SESSION['login'];
    $admin = $_SESSION['admin'];
    if($auth && $admin){
        return true;
    }
    return false;
}
