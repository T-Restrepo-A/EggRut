<?php
include 'conexion.php';
include 'listar.php';

// Verificamos si el formulario ha sido enviado mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verificamos la conexión a la base de datos
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Obtenemos los nuevos valores de nombre y correo del formulario
    $new_name = $con->real_escape_string($_POST['nombre']);
    $new_email = $con->real_escape_string($_POST['correo']);

    // Actualizamos el nombre y correo del usuario en la tabla tbl_usuario
    $sql = "UPDATE tbl_usuario SET nombre='$new_name', correo='$new_email' WHERE id_usuario='$id'";

    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Nombre y Correo Actualizado Satisfactoriamente');</script>";
        echo "<script>window.location='user.php'; </script>";
    } else {
        echo "Error updating record: " . $con->error;
    }
}
?>