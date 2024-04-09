<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../index.php?alerta=4');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        <!-- ===== BOX ICONS ===== -->
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="./../css/home.css">
        <title>Home</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
            <!-- <div class="header__img">
                <img src="assets/img/perfil.jpg" alt="">
            </div> -->
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="" id="home_btn" class="nav__logo">
                        <i class='bx bx-camera-movie nav__logo-icon'></i>
                        <span class="nav__logo-name">PROYFLIX</span>
                    </a>
                    <div class="nav__list">
                        <a id="inicio" class="nav__link active">
                            <i class='bx bxs-home nav__icon'></i>
                            <span class="nav__name">Inicio</span>
                        </a>
                        <a id="favoritos" class="nav__link">
                            <i class='bx bx-heart nav__icon'></i>
                            <span class="nav__name">Favoritos</span>
                        </a>
                        <?php if ($_SESSION['rol'] == 4) { ?>
                        <a id="crud" class="nav__link">
                            <i class='bx bx-layer nav__icon'></i>
                            <span class="nav__name">Administrador</span>
                        </a>
                        <a href="#search" id="add" class="nav__link">
                            <i class='bx bx-layer-plus nav__icon' ></i>
                            <span class="nav__name">Añadir Pelicula</span>
                        </a>
                        <?php } ?>
                        <!-- <a href="#" class="nav__link">
                            <i class='bx bx-cog nav__icon'></i>
                            <span class="nav__name">Administración</span>
                        </a> -->
                    </div>
                </div>
                <a href="./../proc/proc_logout.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Cerrar Sesión</span>
                </a>
            </nav>
        </div>
<!-- FIN NAVBAR -->
<!-- INICIO TOP 5 -->
    <div id="home" class="slt">
        <br>
        <h1>ADMINISTRADOR</h1>
        <br>
        <div class="slt">
            <div class="column-5">
                <button type="button" id="user_crud" class="btn btn-primary flex"><box-icon name='user'></box-icon> <span>Usuarios</span></button>
            </div>
            <div class="column-5">
                <button type="button" id="movie_crud" class="btn btn-info flex"> <box-icon name='movie-play'></box-icon> <span> Peliculas</span></button>
            </div>
            <div class="column-5">
                <button type="button" id="peti_crud" class="btn btn-warning position-relative">Peticiones<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">20<span class="visually-hidden">unread messages</span></span></button>
            </div>
        </div>
        <div id="perfil" class="slt">
            <h3>Peliculas</h3>
            <div class="slt">
                <table class="table">
                    <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Sinopsis</th>
                <th scope="col">Categoria</th>
                <th scope="col">Año</th>
                
                <th scope="col">Duración</th>
                <th scope="col">Portada</th>
                <th scope="col">Edicion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td  class="table-warning">Blade Runner</td>
                <td>p como la exigente editora de una revista de moda.p como la exigente editora de una revista de moda.p como la exigente editora de una revista de moda.p como la exigente editora de una revista de moda.p como la exigente editora de una revista de moda.</td>
                <td>Ciencia Ficción</td>
                <td>1968</td>
                <td>182 min</td>
                <td>12.jpg</td>
                <td>
                <button type="button" class="btn btn-warning">Editar</button>
                <button type="button" class="btn btn-danger">Eliminar</button> <br></td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
                </tr>
            </tbody>
            </table>
            </div>
        </div> 
    </div>
        <!-- FIN ETIQUETA #HOME -->
<!---->
        <!--===== MAIN JS =====-->
        <script src="./../js/home.js"></script>
    </body>
</html>