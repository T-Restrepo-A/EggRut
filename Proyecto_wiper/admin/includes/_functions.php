<?php
   
require_once ("_db.php");




if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

            case 'eliminar_registro';
            eliminar_registro();
    
            break;

            case 'acceso_user';
            acceso_user();
            break;

            case 'editar_comprador':
            editar_comprador();
            break; 
    
            case 'eliminar_comprador';
            eliminar_comprador();
        
             break;
    


		}

	}

    function editar_registro() {
		$conexion=mysqli_connect("localhost","root","","eggrut");
		extract($_POST);
		$consulta="UPDATE tbl_admin SET nombre = '$nombre', correo = '$correo', telefono = '$telefono',
		password ='$password', rol = '$rol' WHERE id = '$id' ";

		mysqli_query($conexion, $consulta);


		header('Location: ../views/user.php');

}


function eliminar_registro() {
    $conexion=mysqli_connect("localhost","root","","eggrut");
    extract($_POST);
    $id= $_POST['id'];
    $consulta= "DELETE FROM tbl_admin WHERE id= $id";

    mysqli_query($conexion, $consulta);


    header('Location: ../views/user.php');

}



function editar_comprador() {
    $conexion = mysqli_connect("localhost", "root", "", "eggrut");
    extract($_POST);

    // Actualizar nombre y correo
    $consulta = "UPDATE tbl_usuario SET nombre = '$nombre', correo = '$correo' WHERE id_usuario = '$id' ";
    mysqli_query($conexion, $consulta);

    // Si se proporcionó una nueva contraseña, actualizarla
    if (!empty($_POST['nueva_contrasena'])) {
        $nueva_contrasena_hashed = password_hash($_POST['nueva_contrasena'], PASSWORD_DEFAULT);
        $consulta_contraseña = "UPDATE tbl_usuario SET contraseña = '$nueva_contrasena_hashed' WHERE id_usuario = '$id' ";
        mysqli_query($conexion, $consulta_contraseña);
    }

    header('Location: ../views/comprador.php');
}

function eliminar_comprador() {
    $conexion=mysqli_connect("localhost","root","","eggrut");
    extract($_POST);
    $id= $_POST['id_usuario'];
    $consulta= "DELETE FROM tbl_usuario WHERE id_usuario= $id";

    mysqli_query($conexion, $consulta);


    header('Location: ../views/comprador.php');

}

function acceso_user() {
    $nombre=$_POST['nombre'];
    $password=$_POST['password'];
    session_start();
    $_SESSION['nombre']=$nombre;

    $conexion=mysqli_connect("localhost","root","","eggrut");
    $consulta= "SELECT * FROM tbl_admin WHERE nombre='$nombre' AND password='$password'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);


    if($filas['rol'] == 1){ //admin

        header('Location: ../views/user.php');

    }else if($filas['rol'] == 2){//lector
        header('Location: ../views/lector.php');
    }
    
    
    else{

        header('Location: login.php');
        session_destroy();

    }

  
}









