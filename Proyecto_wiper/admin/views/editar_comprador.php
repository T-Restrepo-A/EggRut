<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

    header("Location: ../includes/login.php");
    die();
    

}





$id= $_GET['id'];
$conexion= mysqli_connect("localhost", "root", "", "eggrut");
$consulta= "SELECT * FROM tbl_usuario WHERE id_usuario = $id";
$resultado = mysqli_query($conexion, $consulta);
$comprador = mysqli_fetch_assoc($resultado);


?>


<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>


    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/es.css">
</head>

<body id="page-top">


<form  action="../includes/_functions.php" method="POST">
<div id="login" >
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    
                            <br>
                            <br>
                            <h3 class="text-center">Editar comprador</h3>
                            <div class="form-group">
                            <label for="nombre" class="form-label">Nombre *</label>
                            <input type="text"  id="nombre" name="nombre" class="form-control" value="<?php echo $comprador['nombre'];?>"required>
                            </div>
                            <div class="form-group">
                                <label for="nueva_contrasena">Nueva contraseña (opcional):</label><br>
                                <input type="password" name="nueva_contrasena" id="nueva_contrasena" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username">Correo:</label><br>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="" value="<?php echo $comprador['correo'];?>">
                            </div>
                            <input type="hidden" name="accion" value="editar_comprador">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <div class="mb-3">
                           <br>
                           
                                    
                            <button type="submit" class="btn btn-success" >Editar</button>
                               <a href="comprador.php" class="btn btn-danger">Cancelar</a>
                               
                            </div>
                            </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>
</html>