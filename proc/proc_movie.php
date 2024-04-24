<?php
session_start();
//  COMPROBACIONES DE INICIO DE SESSION
include_once('conexion.php');
    // RECEPCION DE DATOS ENVIADOS POR JS
    $datos = $_POST['pelicula'];
    $id_movie = json_decode($datos, true);
    $id = $id_movie['id'];


    // CONSULTA DE LIKES
    $sql_lkes = 'SELECT COUNT(id_user) AS total_likes FROM tbl_likes WHERE id_movie = :id;';
    $stmt = $conn -> prepare($sql_lkes);
    $stmt -> bindParam(':id',$id);
    $stmt -> execute();
    $likes = $stmt->fetch(PDO::FETCH_ASSOC);

    // CONSULTA SI EL USUARIO HA HECHO LIKE
    $sql_usr = 'SELECT * FROM tbl_likes WHERE id_movie = :id AND id_user = :idusr';
    $stmt = $conn -> prepare($sql_usr);
    $stmt -> bindParam(':id', $id);
    $stmt -> bindParam(':idusr', $_SESSION['id']);
    $stmt -> execute();
    if ($stmt->rowCount() == 1) {
        # code...
        $clase = "act";
    }else
        $clase = "";

    // CONSULTA DE LA PELICULA
    $sql = "SELECT m.id_movie, m.mvi_nom, m.mvi_desc, m.mvi_dura, m.mvi_porta, m.mvi_year, g.gen_nom
    FROM tbl_movie m
    INNER JOIN tbl_genero_movie gm ON m.id_movie = gm.id_movie
    INNER JOIN tbl_generos g ON gm.id_gen = g.id_generos
    WHERE m.id_movie = :id;";

    $stmt = $conn -> prepare($sql);
    $stmt -> bindParam(':id',$id);
    $stmt -> execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($resultado) {
        echo '
        <div id="movie">
        <div class="container overflow-hidden">
    <div class="row gy-5">
        <div class="col-3 p-3 mb-2">
    <div class="tarjeta contenido">
        <img src="../rsc/movie/'.$resultado['mvi_porta'].'" class="card-img-top"><span></span>
    </div>
        </div>
        <div class="col-sm-9 p-3">
    <div id="movie-card">
        <div class="hstack gap-3">
    <div class="p-2"><h2>'.$resultado['mvi_nom'].'</h2></div>
    <div class="p-2 ms-auto"><button id="like-btn" value='.$resultado['id_movie'].' class="btn-love '.$clase.'"><span id="count">'.$likes['total_likes'].'</span> <span class="fa fa-heart '.$clase.'"></span></button></div>
        </div>
        <p><strong>'.$resultado['mvi_year'].'</strong> / <strong>'.$resultado['gen_nom'].'</strong> / <strong>'.$resultado['mvi_dura'].' min</strong></p>
        <h3>Sinopsis</h3>
        <p>'.$resultado['mvi_desc'].'</p>
        <div class="position-absolute end-1"><button id="sapo" >Ver Pelicula</button></div>
    </div>
        </div>
    </div>
        </div>
    </div>';

    } else {
        echo "No se encontraron resultados.";
    }