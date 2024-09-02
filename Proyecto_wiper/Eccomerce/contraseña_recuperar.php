<?php

session_start();
error_reporting(0);


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_f.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/png">
    <title>Recuperar Contraseña</title>
</head>
<body>
    <div class="container-form">
        <div class="information-recover">
            <div class="info-childs-recover">
                <!--<input type="button" value="¡Volver al Inicio!" id="go-back" class="go-back" onclick="window.location.href='../dashboard.html'"> -->
                <br><br><br>
                <h2>Recuperar Contraseña</h2>
                <form action="recuperar.php" method="post" class="form">
                    <label>
                        <i class='bx bx-lock'></i>
                        <input type="password" id="nueva-contrasena" name="nueva-contrasena" placeholder="Nueva Contraseña" required>
                    </label>
                    <label>
                        <i class='bx bx-lock'></i>
                        <input type="password" id="confirmar-contrasena" name="confirmar-contrasena" placeholder="Confirmar Contraseña" required>
                    </label>
                    <input type="submit" name="recuperar" value="Cambiar Contraseña">
                </form>
            </div>
        </div>
    </div>
    <script src="../js/app.js"></script>
</body>
</html>