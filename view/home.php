<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        <!-- ===== BOX ICONS ===== -->
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
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
                        <!-- <a href="#search" class="nav__link">
                            <i class='bx bx-search-alt nav__icon'></i>
                            <span class="nav__name">Busqueda</span>
                        </a> -->
                        
                        <!-- <a href="#" class="nav__link">
                            <i class='bx bx-movie nav__icon' ></i>   
                            <span class="nav__name">Peliculas</span>
                        </a> -->
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
                <a href="./../proc/proc_logout.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Cerrar Sesión</span>
                </a>
            </nav>
        </div>
<!-- FIN NAVBAR -->
<!-- INICIO TOP 5 -->
    <div id="home" class="slt">
        <div id="perfil" class="slt flex">
            <div class="column-2">
                <form class="row g-3">
                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Nombre Pelicula</label>
                        <input type="text" class="form-control is-invalid" placeholder="Nombre de tu pelicula" id="nom_peli">
                        <div class="invalid-feedback">Inserta el nombre de la pelicula</div>
                    </div>
                    <div class="col-mb-3">
                        <label for="validationTextarea" class="form-label">Sinopsis</label>
                        <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Maximo 200 caracteres" required></textarea>
                        <div class="invalid-feedback">Minimo 100 caracteres y Maximo 200</div>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" id="genero_peli" class="form-label">Genero Principal</label>
                        <select id="inputState" class="is-invalid form-select">
                            <option selected hidden disabled>Choose...</option>
                            <option value="0">Por Definir</option>
                            <option value="1">Terror</option>
                            <option value="2">Accion</option>
                        </select>
                        <div class="invalid-feedback">Inserta el nombre de la pelicula</div>
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" class="form-control is-invalid" id="inputCity">
                        <div class="invalid-feedback">Inserta el nombre de la pelicula</div>
                    </div>
                    <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Año de Estreno</label>
                        <input type="text" class="form-control is-invalid" placeholder="Insertar Año" id="nom_peli">
                        <div class="invalid-feedback">Revisa los valores insertados</div>
                    </div>
                    <div class="col-md-4">
                    <label for="inputEmail4" class="form-label">Duración</label>
                        <input type="text" class="form-control is-invalid" placeholder="Duracion en minutos " id="nom_peli">
                        <div class="invalid-feedback">Revisa los valores insertados</div>
                    </div>
                    <div class="col-mb-3">
                        <input type="file" class="form-control is-invalid" required>
                        <div class="invalid-feedback">Solo se permite Formatos de Imagen, Campo obligatorio*</div>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">Check me out</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" id="añadir" class="btn btn-primary" disabled>Añadir Pelicula</button>
                    </div>
                </form>
            </div>
            <div class="column-2 flex">
            <div class="tarjeta contenido">
            <a href="">
                <div class="fondo"></div>
                <div class="titulo"></div>
                <img src="" class="card-img-top" alt="INSERTA UNA IMAGEN"><span></span>
            </div>
            </a>
        </div>
        </div>
    </div>
        <!-- FIN ETIQUETA #HOME -->
<!---->
        <!--===== MAIN JS =====-->
        <script src="./../js/home.js"></script>
    </body>
</html>