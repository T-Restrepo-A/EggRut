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

        // Verificar que las contraseñas coincidan
        if ($contraseña === $confirmar_contraseña) {
            // Crear un hash de la contraseña
            $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

            // Insertar en la base de datos el hash de la contraseña en lugar de la contraseña en texto plano
            $registrar= "INSERT INTO tbl_usuario(nombre, correo, contraseña) VALUES ('$nombre','$correo','$contraseña_hash')";
            $resultado = mysqli_query($con,$registrar);
            
            if ($resultado) {
                echo"<script>alert('Registro exitoso');</script>";
                echo"<script>window.location='loginPagina.html';</script>";
            } else {
                echo "<script>alert('Registro NO exitoso, hubo un error al guardar los datos');</script>";
                echo "<script>window.location='../dashboard.html'; </script>"; 
            }
        } else {
            echo "<script>alert('Las contraseñas no coinciden');</script>";
            echo "<script>window.location='../dashboard.html'; </script>"; 
        }
    }else{
        echo "<script>alert('Registro NO exitoso, revise los campos e intentelo de nuevo');</script>";
        echo "<script>window.location='../dashboard.html'; </script>"; 
    }  
}

?>