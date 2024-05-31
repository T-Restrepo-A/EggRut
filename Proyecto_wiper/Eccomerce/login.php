<?php
if(isset($_SESSION['correo'])){
    echo "<script>window.location='LoginPagina.html'; </script>";
}else
if(isset($_POST['ingresar'])){
    
    include "conexion.php";
    
    session_start();
    $correo=$_POST['correo'];
    $contraseña=$_POST['contraseña'];

    //$encrip =md5($clave1);
    
    $consultar=mysqli_query($con,"SELECT * FROM tbl_usuario WHERE correo='$correo' AND contraseña='$contraseña'") or die ($con."Error en la consulta");
    
    $resultado=mysqli_num_rows($consultar);
    
    while($fila = mysqli_fetch_array($consultar)){
        $_SESSION['contraseña']=$fila['contraseña'];
        $_SESSION['correo']=$fila['correo'];
               
echo "<script>window.location='./index.php'; </script>";
}
echo "<script>alert('Clave y/o Nombre Incorrectos');</script>";
echo "<script>window.location='loginPagina.html'; </script>";

}
//}
?>