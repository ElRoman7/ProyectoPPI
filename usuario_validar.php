<?php
require "includes/config/conecta.php";
require 'includes/funciones/funciones.php';

$db = conecta();

    $correo = $_POST['user_correo'];
    $password = $_POST['user_password'];

        $query = "SELECT * FROM usuarios WHERE status = 1 AND eliminado = 0 AND correo = '$correo'";
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
                $_SESSION['admin']=false;
                $_SESSION['id_usuario']= $usuario['id'];

                header('Location: /index.php');

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