<?php
session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if ($validar == null || $validar == '') {
    header("Location: loginPagina.html");
    die();
} else {
    include("conexion.php");

    $correoUsuario = $_SESSION['correo'];

    // Consulta la base de datos para obtener los datos del usuario actual
    $consulta = "SELECT * FROM tbl_usuario WHERE correo = '$correoUsuario'";
    $resultado = mysqli_query($con, $consulta);

    if ($resultado) {
        $row = $resultado->fetch_array();
        $id = $row['id_usuario'];
        $nombre = $row['nombre'];
        $correo = $row['correo'];

    } else {
        // Manejo de errores si la consulta falla
        echo "Error al obtener los datos del usuario.";
    }
}
?>
