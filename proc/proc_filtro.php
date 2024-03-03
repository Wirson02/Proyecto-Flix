<?php

include_once('conexion.php');

// $sql = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = $_POST['datos'];
    $filtros = json_decode($datos, true);

    $actor_peli = $filtros['actor'];
    $genero = $filtros['genero'];
    $year = $filtros['year'];
    $id = 0;
    // echo $actor_peli;
    // echo $genero;
    // echo $year;
    $mysql = 
    'SELECT
        tbl_movie.id_movie,
        tbl_movie.mvi_nom,
        tbl_movie.mvi_porta,
        CONCAT(tbl_famoso.fmso_nom, " ", tbl_famoso.fmso_ape) AS "Nombre del Actor/Director",
        tbl_genero_movie.id_gen AS "ID de Género",
        tbl_movie.mvi_year AS "Año de Estreno"
    FROM
        tbl_movie
    INNER JOIN tbl_reparto ON tbl_movie.id_movie = tbl_reparto.id_movie
    INNER JOIN tbl_famoso ON tbl_reparto.id_famosos = tbl_famoso.id_fmso
    INNER JOIN tbl_genero_movie ON tbl_movie.id_movie = tbl_genero_movie.id_movie
    WHERE ';

    $myfil = "";
    
    if(!$filtros['actor'] == ""){
        $myfil .= '(tbl_movie.mvi_nom LIKE CONCAT("%":nom"%") OR tbl_famoso.fmso_nom LIKE CONCAT("%":nom"%"))';
    }

    if(!$filtros['genero']== "" && !$filtros['genero'] == 0){
        if ($myfil == "") {
            $myfil .= 'tbl_genero_movie.id_gen = :gen ' ;
        }else{
            $myfil .= 'AND tbl_genero_movie.id_gen = :gen ';
        }
    }

    if(!$filtros['year']== "" && !$filtros['year'] == 0){
        if ($myfil == "") {
            $myfil .= 'tbl_movie.mvi_year = :year ' ;
        }else{
            $myfil .= 'AND tbl_movie.mvi_year = :year ';
        }
    }

    if ($myfil == "") {
        $mysql = "SELECT * FROM tbl_movie;";
    }else{
        $myfil .= " Order by tbl_movie.id_movie desc;";
        $mysql .= $myfil;
    }
    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $stmt = $conn->prepare($mysql);

        if (!$filtros['actor']== "") {
            $stmt -> bindParam(':nom',$actor_peli);
        }
        if (!$filtros['genero']== "") {
            $stmt -> bindParam(':gen',$genero);
        }
        if (!$filtros['year']== "") {
            $stmt -> bindParam(':year',$year);
        }
        $stmt -> execute();
        $result = $stmt ->fetchAll();

        foreach ($result as $pelicula) {
            if ($id == $pelicula['id_movie']) {
                $id = $pelicula['id_movie'];
            }else {
                echo '
                <div class="column-4 flex">
                    <div class="tarjeta contenido">
                    <a href="">
                        <div class="fondo"></div>
                        <div class="titulo">'.$pelicula['mvi_nom'].'</div>
                        <img src="../rsc/movie/'.$pelicula['mvi_porta'].'" class="card-img-top" alt="..."><span></span>
                    </div>
                    </a>
                </div>';
                $id = $pelicula['id_movie'];
            }

        }
        // EJECUTAR LA CONSULTA
        $conn->commit();
    }catch (PDOException $e){
        $conn->rollBack();
        echo "Error: ". $e->getMessage() ."";
    }
}
?>