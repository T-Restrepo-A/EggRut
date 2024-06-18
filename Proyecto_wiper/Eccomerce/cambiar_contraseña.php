<?php
include 'conexion.php';
include 'listar.php';

// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validar que las nuevas contraseñas coincidan
    if ($new_password !== $confirm_password) {
        exit('Las nuevas contraseñas no coinciden.');
    }

    // Obtener la contraseña actual de la base de datos
    $stmt = $con->prepare('SELECT contraseña FROM  tbl_usuario WHERE id_usuario = ?');
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verificar la contraseña actual
    if (!password_verify($current_password, $user['contraseña'])) {
        exit('La contraseña actual es incorrecta.');
    }
    // Hashear la nueva contraseña
    $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

    // Actualizar la contraseña en la base de datos
    $stmt = $con->prepare('UPDATE  tbl_usuario SET contraseña = ? WHERE id_usuario = ?');
    $stmt->bind_param('si', $new_password_hash, $id);
    if ($stmt->execute()) {
        echo "<script>alert('Cambio hecho exitosamente');</script>";
        echo "<script>window.location='user.php'; </script>";
    } else {
        echo 'Error al cambiar la contraseña.';
    }
}

?>