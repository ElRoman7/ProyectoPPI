<?php

// //Ubicacion del archivo
// // ./funciones/conecta.php

define("HOST", 'localhost');

define("BD",'empresa01');  

define("USER_BD",'root'); 

define("PASS_BD",'Rg2003sA?');

if (!function_exists('conecta')){
    function conecta(){
        $con = new mysqli(HOST, USER_BD, PASS_BD, BD);
        return $con;
    }
}

?>