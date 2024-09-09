<?php

session_start();
error_reporting(0);


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
                <br><br>
                <?php 
        if(isset($_GET['message'])){
        ?>
        <div class="alert alert-primary" role="alert">
            <?php 
            switch ($_GET['message']) {
            case 'error':
                echo 'Algo salió mal, intenta de nuevo';
                break;
            
            default:
                echo 'Algo salió mal, intenta de nuevo';
                break;
            }
            ?>
      </div>
    <?php
    }
    ?>
            </div>
            
        </div>
        
    </div>
    
    <script src="../js/app.js"></script>
</body>
</html>