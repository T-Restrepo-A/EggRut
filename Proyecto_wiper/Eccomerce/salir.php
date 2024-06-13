<?php
session_start();
if(isset($_SESSION['correo'])){
session_destroy();

echo "<script>window.location='../dashboard.html'; </script>"; 

}else{
    echo "<script>window.location='index.php'; </script>"; 
}

?>