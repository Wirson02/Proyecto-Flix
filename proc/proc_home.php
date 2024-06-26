<?php
include_once('conexion.php');

// MAYOR NUMERO DE LIKES
$sql = "SELECT m.id_movie, m.mvi_nom, m.mvi_desc, m.mvi_dura, m.mvi_porta, m.mvi_year, COUNT(l.id_likes) AS num_likes
FROM tbl_movie m
LEFT JOIN tbl_likes l ON m.id_movie = l.id_movie
GROUP BY m.id_movie
ORDER BY num_likes DESC
LIMIT 5;";

// OPCIONES DE TODOS LOS GENEROS DISPONIBLES
$sql2 = "SELECT * FROM tbl_generos";

// OPCIONES DE AÑOS DE TODAS LAS PELICUALS QUE TENEMOS DISPONIBLES
$sql3 = "SELECT DISTINCT mvi_year FROM bd_stream.tbl_movie order by mvi_year ASC ;";

// PAGINACIÓN RESTRO DE PELICUAS
$sql4 = 'SELECT m.id_movie, m.mvi_nom, m.mvi_desc, m.mvi_dura, m.mvi_porta, m.mvi_year, COUNT(l.id_likes) AS num_likes
FROM tbl_movie m
LEFT JOIN tbl_likes l ON m.id_movie = l.id_movie
GROUP BY m.id_movie
ORDER BY num_likes DESC LIMIT 25 OFFSET 6;';
// $sql5= "SELECT * FROM tbl_movie ORDER BY id_movie ASC LIMIT 5, ;";

try {
    // PAGINACION DEL TOP 5
    // TOP 5 DEL MOMENTO 
    $stmt = $conn->prepare($sql);
    $stmt -> execute();
    $result = $stmt ->fetchAll();
    
    echo '<div class="head flex">
            <h1>TOP 5</h1>
        </div>';

    echo '<div id="top5" class="slt">';
    foreach ($result as $peli) {
        echo '
        <div class="column-5">
            <a href="">
            <div class="tarjeta contenido">
                <div class="fondo"></div>
                <div class="titulo">'.$peli['mvi_nom'].'</div>
                <a href="home.php?id='.$peli['id_movie'].'"><img src="../rsc/movie/'.$peli['mvi_porta'].'" class="card-img-top" alt="..."></a><span></span>
            </div>
            </a>
        </div>';
        // echo $peli['id'];
    }
    echo "</div>";
//     // PAGINACION DE BUSCADOR Y FILTROS
    echo '
    <div id="buscador" class="slt">
        <div class="column-1 flex">
            <div class="form flex" id="container">
                <div class="row col-9">
                    <div class="col-md-6">
                        <input id="actor" type="text" class="form-control" placeholder="Busca tu pelicula o actor..." aria-label="City">
                    </div>
                    <div class="col-md-3">
                        <select id="genero" name="genero" class="form-control">
                            <option value="0" selected>Todos los generos</option>';
    $stmt = $conn->prepare($sql2);
    $stmt -> execute();
    $result = $stmt->fetchAll();
    foreach ($result as $generos) {
        echo '<option value="'.$generos['id_generos'].'">'.$generos['gen_nom'].'</option>';
    }
    echo "</select>
    </div>";

    $stmt = $conn->prepare($sql3);
    $stmt -> execute();
    $result = $stmt->fetchAll();

    echo '<div class="col-md-3">
            <select id="year" name="year" class="form-control">
                <option value="0" selected>Todos los Años</option>';
    foreach ($result as $year) {
        echo '<option value="'.$year['mvi_year'].'">'.$year['mvi_year'].'</option>';
    }
    echo "</select>
    </div></div></div></div></div>";

    // // PAGINACION DEL RESTO DE PELICULAS

    echo '<div id="contenido" class="slt">';
    $stmt = $conn->prepare($sql4);
    $stmt->execute();
    
    // Obtener resultados usando fetch asociativo4º
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Asignar el valor a la variable $limite
    // $limite = $result['limite'];

    // PAGINACION PARA VER EL RESTO DE PELICULAS OMITIENDO LAS 5 PRIMERAS
    // $sql4 = "SELECT * FROM tbl_movie ORDER BY id_movie ASC LIMIT 5, $limite";
    $stmt = $conn->prepare($sql4);
    $stmt -> execute();
    $result = $stmt->fetchAll();
    foreach ($result as $pelicula) {
        echo '
        <div class="column-4 flex">
            <div class="tarjeta contenido">
            <a href="home.php?id='.$pelicula['id_movie'].'">
                <div class="fondo"></div>
                <div class="titulo">'.$pelicula['mvi_nom'].'</div>
                <img src="../rsc/movie/'.$pelicula['mvi_porta'].'" class="card-img-top" alt="..."><span></span>
            </div>
            </a>
        </div>';
    }

    echo '</div>';
} catch (Exception $e){
    echo "Error: ". $e->getMessage() ."";
}
