<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en Linea</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/iconos/fontawesome/css/all.min.css">
</head>
<body>
<!-- CABEZAERA -->
    <header id="header">
    <div id="logo">
        <img src="assets/img/camiseta.png" alt="Camiseta Logo" />
        <a href="index.php">
            Tienda de camisetas
        </a>
    </div>
    
    </header>

    <!-- MENU -->

    <nav id="menu">

    <ul>
        <li>
            <a href="">Inicio</a>
        </li>
        <li>
            <a href="">Categoria 1</a>
        </li>
        <li>
            <a href="">Categoria 2</a>
        </li>
        <li>
            <a href="">Categoria 3</a>
        </li>
        <li>
            <a href="">Categoria 4</a>
        </li>
        <li>
            <a href="">Categoria 5</a>
        </li>
    </ul>

    </nav>

    <div id="content">
    <!-- BARRALATERAL -->

    <aside id="lateral">

    <div id="login" class="block_aside">
    <h3>Entrar a la web</h3>
    <form action="#" method="post">

    <label for="email">email</label>
    <input type="email" name="email" id="email">

    <label for="password">contraseña</label>
    <input type="password" name="password" id="password">

    <input type="submit" value="Enviar">
    </form>
    <ul>
        <li><span><i class="fas fa-user"></i></span>
            <a href="#">Mis pedidos</a>
        </li>

        <li><span><i class="fas fa-key"></i></span>
            <a href="#">Gestionar Pedidos</a>
        </li>

        <li><span><i class="fas fa-lock"></i></span>
            <a href="#">Gestionar categorias</a>
        </li>
    </ul>
    </div>
    </aside>


    <!-- CONTENIDO CENTRAL -->

    <div id="central">

        <div class="product">
            <h1>Productos destacados</h1>
            <img src="assets/img/camiseta.png" alt="Camiseta ">
            <h2>Camiseta Azul Ancha</h2>
            <p>30 Euros</p>
            <a href="">Comprar</a>
        </div>

        <div class="product">
             <h1>Productos destacados</h1>
            <img src="assets/img/camiseta.png" alt="Camiseta ">
            <h2>Camiseta Azul Ancha</h2>
            <p>30 Euros</p>
            <a href="">Comprar</a>
        </div>

        <div class="product">
            <h1>Productos destacados</h1>
            <img src="assets/img/camiseta.png" alt="Camiseta ">
            <h2>Camiseta Azul Ancha</h2>
            <p>30 Euros</p>
            <a href="">Comprar</a>
        </div>

    </div>
    </div>


    <!-- FOOTER -->
    <footer id="footer">
        <p>Desarrollado por FEDEDJPG &copy; <?= date('Y');?></p>
    </footer>
</body>
</html>