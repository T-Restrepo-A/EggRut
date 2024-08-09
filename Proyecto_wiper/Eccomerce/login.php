<?php

if(isset($_SESSION['correo'])){
    echo "<script>window.location='LoginPagina.html'; </script>";
} else if(isset($_POST['ingresar'])){
    
    include "conexion.php";
    
    session_start();
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    
    // Consultar solo el correo para obtener el hash de la contraseña
    $consultar = mysqli_query($con, "SELECT * FROM tbl_usuario WHERE correo='$correo'") or die ($con."Error en la consulta");
    
    if($fila = mysqli_fetch_array($consultar)){
        // Verificar si la contraseña ingresada coincide con el hash almacenado
        if(password_verify($contraseña, $fila['contraseña'])){
            // Si coincide, iniciar sesión
            $_SESSION['correo'] = $fila['correo'];
            echo "<script>window.location='./index.php'; </script>";
        } else {
            // Si no coincide, mostrar mensaje de error
            echo "<script>alert('Clave y/o Correo Incorrectos');</script>";
            echo "<script>window.location='loginPagina.html'; </script>";
        }
    } else {
        // Si no se encuentra el correo, mostrar mensaje de error
        echo "<script>alert('Clave y/o Correo Incorrectos');</script>";
        echo "<script>window.location='loginPagina.html'; </script>";
        
    }
}
?>