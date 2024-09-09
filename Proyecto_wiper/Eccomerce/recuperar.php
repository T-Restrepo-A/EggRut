<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';
require_once 'conexion.php';

$correo = $_POST['correo'];

// Consultar si el email existe en la base de datos
$sql = "SELECT * FROM tbl_usuario WHERE correo = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $mail = new PHPMailer(true);
    

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tomas.res.ald@gmail.com'; // Tu dirección de Gmail
    $mail->Password = 'ofdfpoylfvvqahfz'; // Tu contraseña de Gmail
    $mail->SMTPSecure = 'tls'; // O 'ssl' si prefieres
    $mail->Port = 587; // Puerto para TLS

    // Detalles del correo
    $mail->setFrom('tomas.res.ald@gmail.com', 'EggRut');
    $mail->addReplyTo($_POST['correo']); 
    $mail->addAddress($_POST['correo'], 'Usuario');
    $mail->Subject = '!Recupera tu Contraseña¡';
    $mail->Body = 'Para Restablecer tu contraseña ingresa al siguiente link http://localhost/Eggrut/proyecto_wiper/Eccomerce/contrase%C3%B1a_recuperar.php?id=' . $row['id_usuario'];
    // Enviar el correo
    $mail->send();
    header("Location: mensaje_recuperar.php");
} catch (Exception $e) {
    header("Location: formulario_recuperar.php?message=error");
}

}else{
    header("Location: formulario_recuperar.php?message=not_found");
  }
?>
