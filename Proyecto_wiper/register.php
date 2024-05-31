<?php
include 'conexion.php';

if (isset($_POST['register'])) {
    if (strlen($_POST['nombre']) >= 1 &&
        strlen($_POST['correo']) >= 1 &&
        strlen($_POST['contraseña']) >= 1 &&
        strlen($_POST['confirmar_contraseña']) >= 1) {
        $nombre = trim($_POST['nombre']);     
        $correo = trim($_POST['correo']); 
        $contraseña = trim($_POST['contraseña']);    
        $confirmar_contraseña = trim($_POST['confirmar_contraseña']);     

        

        $registrar= "INSERT INTO tbl_usuario(nombre, correo, contraseña, confirmar_contraseña) VALUES ('$nombre','$correo','$contraseña','$confirmar_contraseña')" or die ("Registro no Exitoso");  
        $resultado = mysqli_query($con,$registrar);
        header('windowalert("Usuario Registrado con exito")');

        echo $registrar;
        echo"<script>alert('registro exitoso');</script>";
         
        echo"<script>window.location='loginPagina.html';</script>";
    }else{
        echo "<script>alert('Registro NO exitoso, revise los campos e intentelo de nuevo');</script>";
        
        echo "<script>window.location='index.html'; </script>"; 
    }  
}

?>