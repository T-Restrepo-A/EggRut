<?php
include 'conexion.php';

if (isset($_POST['recuperar'])) {
    if (
        strlen($_POST['nueva_contraseña']) >= 1 &&
        strlen($_POST['confirmar_contraseña']) >= 1) {
        $contraseña = trim($_POST['nueva_contraseña']);    
        $confirmar_contraseña = trim($_POST['confirmar_contraseña']);     
        $id = $_POST['id'];
        // Verificar que las contraseñas coincidan
        if ($contraseña === $confirmar_contraseña) {
            $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);
            $registrar= "UPDATE tbl_usuario SET contraseña = '$contraseña_hash' WHERE id_usuario= $id ";
            $resultado = mysqli_query($con,$registrar);

            if ($resultado){
                header("Location: mensaje_update.php");
            }
            
        }else {
            echo "<script>alert('Las contraseñas no coinciden');</script>";
            header("Location: contraseña_recuperar.php");
        } 
    } 
}

?>