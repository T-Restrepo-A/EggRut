<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/SMTP.php';


// Crear una instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP de Gmail
    $mail->SMTPDebug = 0; // Para obtener detalles de depuración
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
    $mail->Body = 'Para Restablecer tu contraseña ingresa al siguientelink.  http://localhost/Eggrut/proyecto_wiper/Eccomerce/contrase%C3%B1a_recuperar.php?email=' . urlencode($_POST['email']);

    // Enviar el correo
    $mail->send();
    echo "<script>window.location='mensaje_recuperar.php'; </script>";
} catch (Exception $e) {
    echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
}
?>
