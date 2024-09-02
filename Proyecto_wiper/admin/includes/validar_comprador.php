<?php
$conexion= mysqli_connect("localhost", "root", "", "eggrut");

if(isset($_POST['registrar'])){

    if(strlen($_POST['nombre']) >=1  && strlen($_POST['contraseña'])>=1 && strlen($_POST['correo'])  >=1 ){

    $nombre = trim($_POST['nombre']);
    $contraseña = trim($_POST['contraseña']);
    $correo = trim($_POST['correo']);
    
    $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

    $consulta= "INSERT INTO tbl_usuario (nombre, contraseña, correo)
    VALUES ('$nombre', '$contraseña_hash', '$correo')";

    $resultado= mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    if ($resultado){
        echo "<script> alert('Registro Exitoso');</script>";
        echo "<script>window.location='../views/comprador.php';</script>";
    }else {
        echo "<script>alert('Registro NO exitoso, hubo un error al guardar los datos');</script>";
        echo "<script>window.location='../index_comprador.php'; </script>"; 
    }
  }
}









?>