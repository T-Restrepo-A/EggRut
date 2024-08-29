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
                <input type="button" value="¡Volver al Login!" id="go-back" class="go-back" onclick="window.location.href='loginPagina.html'">
                <br><br><br>
                <h2>Recuperar Contraseña</h2>
                <p>Ingresa tu correo electrónico para restablecer tu contraseña:</p>
                <form action="recuperar.php" method="post" class="form">
                    <label>
                        <i class='bx bx-envelope'></i>
                        <input type="email" id="correo" name="correo" placeholder="Correo Electrónico" required>
                    </label>
                    <input type="submit" name="recuperar" value="Enviar Correo">
                </form>
            </div>
        </div>
    </div>
    <script src="../js/app.js"></script>
</body>
</html>