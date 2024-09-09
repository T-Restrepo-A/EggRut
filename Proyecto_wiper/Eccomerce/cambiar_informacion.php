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
                    title: 'Éxito',
                    text: 'Nombre y/o correo actualizado satisfactoriamente',
                    icon: 'success'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = 'user.php';
                    }
                });
            </script>
        </body>
        </html>";
    } else {
        echo "Error updating record: " . $con->error;
    }
}
