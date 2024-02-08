<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
                        <span class="nav__logo-name">NETFLIX</span>
                    </a>

                    <div class="nav__list">
                        <a href="#" class="nav__link active">
                        <i class='bx bxs-home nav__icon'></i>
                            <span class="nav__name">Inicio</span>
                        </a>
                        <a href="#search" class="nav__link">
                            <i class='bx bx-search-alt nav__icon'></i>
                            <span class="nav__name">Busqueda</span>
                        </a>
                        

                        <a href="#" class="nav__link">
                            <i class='bx bx-movie nav__icon' ></i>   
                            <span class="nav__name">Peliculas</span>
                        </a>
                        <a href="#" class="nav__link">
                            <i class='bx bx-heart nav__icon'></i>
                            <span class="nav__name">Favorites</span>
                        </a>

                        <a href="#" class="nav__link">
                            <i class='bx bx-layer nav__icon'></i>
                            <span class="nav__name">Administración</span>
                        </a>

                        <a href="#" class="nav__link">
                            <i class='bx bx-cog nav__icon'></i>
                            <span class="nav__name">Ajustes</span>
                        </a>
                    </div>
                </div>
                <a href="#" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Cerrar Sesión</span>
                </a>
            </nav>
        </div>
<!-- FIN NAVBAR -->

<!-- INICIO TOP 5 -->
    <div id="home" class="slt">
            <div class="head flex">
                <h1>TOP 5</h1>
            </div>
            <div class="column-5">
                <div class="tarjeta">
                    <div class="fondo"></div>
                    <div class="titulo">Blade Runner 2045</div>
                    <a href="#" class=""><img src="./../rsc/movie/blade_Runner.jpg" class="card-img-top" alt="..."></a><span></span>
                </div>
            </div>
            <div class="column-5">
                <div class="tarjeta">
                    <div class="fondo"></div>
                    <div class="titulo">Blade Runner 2045</div>
                    <a href="#" class=""><img src="./../rsc/movie/blade_Runner.jpg" class="card-img-top" alt="..."></a><span></span>
                </div>
            </div>
            <div class="column-5">
                <div class="tarjeta">
                    <div class="fondo"></div>
                    <div class="titulo">Blade Runner 2045</div>
                    <a href="#" class=""><img src="./../rsc/movie/blade_Runner.jpg" class="card-img-top" alt="..."></a><span></span>
                </div>
            </div>
            <div class="column-5">
                <div class="tarjeta">
                    <div class="fondo"></div>
                    <div class="titulo">Blade Runner 2045</div>
                    <a href="#" class=""><img src="./../rsc/movie/blade_Runner.jpg" class="card-img-top" alt="..."></a><span></span>
                </div>
            </div>
            <div class="column-5">
                <div class="tarjeta">
                    <div class="fondo"></div>
                    <div class="titulo">Blade Runner 2045</div>
                    <a href="#" class=""><img src="./../rsc/movie/blade_Runner.jpg" class="card-img-top" alt="..."></a><span></span>
                </div>
            </div>
        <div class="slt">
            <div id="search" class="column-1 flex">
                <div class="form flex" id="container">
                    <div class="row col-9">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Busca tu pelicula..." aria-label="City">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder="State" aria-label="State">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder="State" aria-label="State">
                        </div>
                        <!-- <div class="col-sm">
                            <input type="text" class="form-control" placeholder="Zip" aria-label="Zip">
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    <!-- FIN ETIQUETA #HOME -->
    </div>
<!---->
        <!--===== MAIN JS =====-->
        <script src="./../js/home.js"></script>
    </body>
</html>