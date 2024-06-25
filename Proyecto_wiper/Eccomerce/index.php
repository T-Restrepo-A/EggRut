<?php

session_start();
error_reporting(0);

require('listar.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EggRut</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    
</head>
<body>

<nav class="navbar">
</h1>
<div class="profile-dropdown">
  <div onclick="toggle()" class="profile-dropdown-btn">
    <div class="profile-img">
      <i class="fa-solid fa-circle"></i>
    </div>

    <span
      ><?php echo $nombre; ?>
      <i class="fa-solid fa-angle-down"></i>
    </span>
  </div>

  <ul class="profile-dropdown-list">
    <li class="profile-dropdown-list-item">
      <a href="user.php">
        <i class="fa-regular fa-user"></i>
        Edit Profile
      </a>
    </li>

    <li class="profile-dropdown-list-item">
      <a id="boton-salir">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
        Log out
      </a>
    </li>
  </ul>
</div>
</nav>

    <div class="wrapper">
        <header class="header-mobile">
            <h1 class="logo">EggRut</h1>
            <button class="open-menu" id="open-menu">
                <i class="bi bi-list"></i>
            </button>
        </header>
        <aside>
            <button class="close-menu" id="close-menu">
                <i class="bi bi-x"></i>
            </button>
            <header>
                <h1 class="logo">EggRut</h1>
            </header>
            <nav>
                <ul class="menu">
                    <li>
                        <button id="todos" class="boton-menu boton-categoria active"><i class="bi bi-hand-index-thumb-fill"></i> Todos los productos</button>
                    </li>
                    <li>
                        <button id="A" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i> Huevos A</button>
                    </li>
                    <li>
                        <button id="AA" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i> Huevos AA</button>
                    </li>
                    <li>
                        <button id="AAA" class="boton-menu boton-categoria"><i class="bi bi-hand-index-thumb"></i> Huevos AAA</button>
                    </li>
                    <li>
                        <a class="boton-menu boton-carrito" href="./carrito.html">
                            <i class="bi bi-cart-fill"></i> Carrito <span id="numerito" class="numerito">0</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <footer>
                <p class="texto-footer">© 2024 EggRut</p>
            </footer>
        </aside>
        <main>
            <h2 class="titulo-principal" id="titulo-principal">Todos los productos</h2>
            <div id="contenedor-productos" class="contenedor-productos">
                <!-- Esto se va a rellenar con JS -->
            </div>
        </main>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/menu.js"></script>
</body>
</html>