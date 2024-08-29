<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            text-align: center;
            padding: 20px;
            background-image: url(../img/img_fondo2.jpg); 
            background-size: cover;
        }
        .message-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
        }
        input{
            background-color: transparent;
            outline: none;
            border: solid 2px #9191bd;
            border-radius: 20px;
            padding: 10px 20px;
            color: #9191bd;
            cursor: pointer;
            transition: background-color .3s ease;

        }
        input:hover{
            background-color: #9191bd;
            border: none;
            color: #fff;
            box-shadow: 0 5px 7px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="message-container">
        <h1>Recuperación de contraseña</h1>
        <p>Se ha enviado el mensaje correctamente. Por favor, revisa tu correo para recuperar tu contraseña.</p>
        <br><br><br><br>
        <input type="button" value="¡Volver a la Pagina!" id="go-back" class="go-back" onclick="window.location.href='../dashboard.html'">
    </div>
    
</body>
</html>