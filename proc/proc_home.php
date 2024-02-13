<?php
include_once('conexion.php');

// MAYOR NUMERO DE LIKES
$sql = "SELECT * FROM tbl_movie ORDER BY id_movie ASC LIMIT 5;";

// OPCIONES DE TODOS LOS GENEROS DISPONIBLES
$sql2 = "SELECT * FROM tbl_generos";
// OPCIONES DE AÑOS DE TODAS LAS PELICUALS QUE TENEMOS DISPONIBLES
$sql3 = "SELECT DISTINCT mvi_year FROM bd_stream.tbl_movie order by mvi_year ASC ;";

// PAGINACIÓN RESTRO DE PELICUAS
$sql4 = "SELECT (COUNT(*) - 5) AS limite FROM tbl_movie;";
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
            <div class="tarjeta">
                <div class="fondo"></div>
                <div class="titulo">'.$peli['mvi_nom'].'</div>
                <a><img src="../rsc/movie/'.$peli['mvi_porta'].'" class="card-img-top" alt="..."></a><span></span>
            </div>
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
                            <option value="0" hidden disabled selected>Escoge un genero</option>';
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
                <option value="0" hidden disabled selected>Escoge un el año</option>';
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
    $limite = $result['limite'];

    // PAGINACION PARA VER EL RESTO DE PELICULAS OMITIENDO LAS 5 PRIMERAS
    $sql4 = "SELECT * FROM tbl_movie ORDER BY id_movie ASC LIMIT 5, $limite";
    $stmt = $conn->prepare($sql4);
    $stmt -> execute();
    $result = $stmt->fetchAll();
    foreach ($result as $pelicula) {
        echo '
        <div class="column-4 flex">
            <div class="tarjeta">
                <div class="fondo"></div>
                <div class="titulo">'.$pelicula['mvi_nom'].'</div>
                <a><img src="../rsc/movie/'.$pelicula['mvi_porta'].'" class="card-img-top" alt="..."></a><span></span>
            </div>
        </div>';
    }

    echo '</div>';
} catch (Exception $e){
    echo "Error: ". $e->getMessage() ."";
}
