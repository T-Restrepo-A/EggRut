<?php
$conexion= mysqli_connect("localhost", "root", "", "eggrut");

if(isset($_POST['registrar'])){

    if(strlen($_POST['nombre']) >=1 && strlen($_POST['correo'])  >=1 && strlen($_POST['telefono'])  >=1 
    && strlen($_POST['password'])  >=1 && strlen($_POST['rol']) >= 1 ){

    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $password = trim($_POST['password']);
    $rol = trim($_POST['rol']);

    $consulta= "INSERT INTO tbl_admin (nombre, correo, telefono, password, rol)
    VALUES ('$nombre', '$correo','$telefono','$password', '$rol' )";

    $resultado= mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    if ($resultado){
      echo "<script> alert('Registro Exitoso');</script>";
      echo "<script>window.location='../views/user.php';</script>";
  }else {
      echo "<script>alert('Registro NO exitoso, hubo un error al guardar los datos');</script>";
      echo "<script>window.location='../index.php'; </script>"; 
  }


    header('Location: ../views/user.php');
  }
}









?>