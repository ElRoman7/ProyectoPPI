<?php
require "funciones/conecta.php";
require 'funciones/funciones.php';
// $auth = estaAutenticado();
// if(!$auth){
//     header('Location: /');
// }
$db = conecta();

    $correo = $_POST['correoL'];
    $password = $_POST['passwordL'];

    // if(!$correo){
    //     // $errores[]= "El Email es obligatorio o no es válido";
    // }
    // if(!$password){
    //     // $errores[] = "El Password es obligatorio"; 
    // }

        $query = "SELECT * FROM empleados WHERE status = 1 AND eliminado = 0 AND correo = '$correo'";
        $resultado = mysqli_query($db,$query);    
                    
        if ($resultado->num_rows) {
            // Revisar si el Password es correcto
            $usuario = mysqli_fetch_assoc($resultado);

            // Verificar si el pass el correcto o no
            $auth = password_verify($password,$usuario['pass']);

            // var_dump($auth);

            if($auth){
                // El usuario esta autenticado
                session_start();

                // LLenar arreglo de la sesión
                $_SESSION['usuario'] = $usuario['correo'];
                $_SESSION['login'] = true;
                $_SESSION['nombreUsuario'] = $usuario['nombre'];

                // header('Location: /admin/bienvenido.php');
                echo "success";

            }else{
                // header('Location: /admin/');
                echo "Credenciales Incorrectas";
            }
        } else {
            echo "Credenciales Incorrectas";
            // $errores[] = "El Usuario No existe";
        }
    // }
// }
?>