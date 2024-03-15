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
        <!-- ===== CSS ===== -->
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
                    <a href="#" class="nav__logo">
                        <i class='bx bx-camera-movie nav__logo-icon'></i>
                        <span class="nav__logo-name">PROYFLIX</span>
                    </a>
                    <div class="nav__list">
                        <a href="#" id="inicio" class="nav__link active">
                            <i class='bx bxs-home nav__icon'></i>
                            <span class="nav__name">Inicio</span>
                        </a>
                        <a href="#" class="nav__link">
                            <i class='bx bx-heart nav__icon'></i>
                            <span class="nav__name">Favorites</span>
                        </a>
                        <a href="#" id="crud" class="nav__link">
                            <i class='bx bx-layer nav__icon'></i>
                            <span class="nav__name">Administrador</span>
                        </a>
                        <a href="#search" id="add" class="nav__link">
                            <i class='bx bx-layer-plus nav__icon' ></i>
                            <span class="nav__name">Añadir Pelicula</span>
                        </a>
                        <a href="#" class="nav__link">
                            <i class='bx bx-cog nav__icon'></i>
                            <span class="nav__name">Administrar</span>
                        </a>
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
        <div id="movie">
            <div class="container overflow-hidden">
                <div class="row gy-5">
                    <div class="col-3 p-3 mb-2">
                    <!-- <div class="col-6 col-md-4"> -->
                        <div class="tarjeta contenido">
                            <img src="../rsc/movie/default.jpg" class="card-img-top"><span></span>
                        </div>
                    </div>
                    <div class="col-sm-9 p-3">
                    <!-- <div class="col-sm-6 col-md-8"> -->
                        <div id="movie-card">
                            <div class="hstack gap-3">
                                <div class="p-2"><h2>Blade Runner 2049</h2></div>
                                <div class="p-2 ms-auto"><button id="movie" value="1" class="btn-love"><span class="fa fa-heart"></span></button></div>
                                <!-- <div class="p-2">Second item</div> -->
                            </div>
                            <p><strong>2019</strong> / <strong>Accion</strong> / <strong>120min</strong></p>
                            <h3>Sinopsis</h3>
                            <p>SLING EN UNA AVENTURAACOMPAÑA A RAYAN GHOSLING EN UNA AVENTURAACOMPAÑA A RAYAN GHOSLING EN UNA AVENTURAACOMPAÑA A RAYAN GHOSLING EN UNA AVENTURAACOMPAÑA A RAYAN GHOSLING EN UNA AVENTURAACOMPAÑA A RAYAN GHOSLING EN UNA AVENTURAACOMPAÑA A RAYAN GHOSLING EN UNA AVENTURAACOMPAÑA A RAYAN GHOSLING EN UNA AVENTURAACOMPAÑA A RAYAN GHOSLING EN UNA AVENTURAACOMPAÑA A RAYAN GHOSLING EN UNA AVENTURAACOMPAÑA A RAYAN GHOSLING EN UNA AVENTURAACOMPAÑA A RAYAN GHOSLING EN UNA AVENTURAACOMPAÑA A RAYAN GHOSLING EN UNA AVENTURA</p>
                            <div class="position-absolute end-1"><button>Ver Pelicula</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- FIN ETIQUETA #HOME -->
<!---->
        <!--===== MAIN JS =====-->
        <script src="./../js/home.js"></script>
    </body>
</html>