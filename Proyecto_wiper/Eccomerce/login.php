<?php

if(isset($_SESSION['correo'])){
    echo "<script>window.location='LoginPagina.html'; </script>";
} else if(isset($_POST['ingresar'])){
    
    include "conexion.php";
    
    session_start();
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    
    $consultar = mysqli_query($con, "SELECT * FROM tbl_usuario WHERE correo='$correo'") or die ($con."Error en la consulta");
    
    if($fila = mysqli_fetch_array($consultar)){
        if(password_verify($contraseña, $fila['contraseña'])){
            $_SESSION['correo'] = $fila['correo'];
            echo "<script>window.location='./index.php'; </script>";
        } else {
            echo "<!DOCTYPE html>
                <html lang='es'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Actualización</title>
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                </head>
                <body>
                    <script>
                        Swal.fire({
                            title: 'Denegado',
                            text: 'Clave y/o Usuario Incorrecto',
                            icon: 'error'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = 'loginPagina.html';
                            }
                        });
                    </script>
                </body>
                </html>";
        }
    } else {
        echo "<script>alert('Clave y/o Correo Incorrectos');</script>";
        echo "<script>window.location='loginPagina.html'; </script>";
        
    }
}
?>
