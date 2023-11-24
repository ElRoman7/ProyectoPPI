<?php

    require 'includes/funciones/funciones.php';
    require "includes/config/conecta.php";

    $con = conecta();

        //Recibe Variables
        $nombre     = $_REQUEST['user_nombre'];
        $apellidos  = $_REQUEST['user_apellidos'];
        $correo     = $_REQUEST['user_correo'];
        $pass       = $_REQUEST['user_pass'];
        if($nombre!=''&&$apellidos!=''&&$correo!=''&&$pass!=''){

            $passEnc = password_hash($pass,PASSWORD_DEFAULT);


            // Query
            $sql = "INSERT INTO usuarios (nombre, apellidos, correo, pass)
                    VALUES ('$nombre', '$apellidos','$correo','$passEnc')";
                    
            // Insertamos en la BD
            $res = mysqli_query($con,$sql);
            if ($res) {
                // Redirigir a empleados_lista.php después de una actualización exitosa
                echo "1";
                die;
            } else {
                echo "2";
            }
        }else{
            echo "3";
        }
        // }
    // }
?>