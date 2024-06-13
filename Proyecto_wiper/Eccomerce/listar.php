<?php
session_start();
error_reporting(0);

$validar = $_SESSION['correo'];

if ($validar == null || $validar == '') {
    header("Location: loginPagina.html");
    die();
} else {
    // Incluye el archivo de conexión a la base de datos
    include("conexion.php");

    // Obtén el correo del usuario actual
    $correoUsuario = $_SESSION['correo'];

    // Consulta la base de datos para obtener los datos del usuario actual
    $consulta = "SELECT * FROM tbl_usuario WHERE correo = '$correoUsuario'";
    $resultado = mysqli_query($con, $consulta);

    if ($resultado) {
        // Supongo que solo obtendrás un registro, así que no necesitas un bucle while
        $row = $resultado->fetch_array();
        $id = $row['id_usuario'];
        $nombre = $row['nombre'];
        $correo = $row['correo'];

        // Ahora tienes los datos del usuario actual
        // Puedes usar $id, $nombre y $correo según tus necesidades
    } else {
        // Manejo de errores si la consulta falla
        echo "Error al obtener los datos del usuario.";
    }
}
?>
