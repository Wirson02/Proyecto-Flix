<?php
include_once 'conexion.php';
session_start();

$movie_name = $_POST['nom_peli'];
$movie_desc = $_POST['sinopsis'];
$movie_gene = $_POST['genero_peli'];
$movie_dura = $_POST['dur_peli'];
$movie_year = $_POST['year_peli'];

// COMPROBACION PARA VER SI EXISTE LA PELICULA
try {
    $sql = 'SELECT * FROM tbl_movie WHERE  mvi_nom = :nom';
    $stmt = $conn -> prepare($sql);
    $stmt ->bindParam(':nom', $movie_name);
    $stmt -> execute();
    
    if ($stmt->rowCount() ==  0) {
        try {
            
            $sql = 'INSERT INTO tbl_movie (mvi_nom, mvi_desc, mvi_dura, mvi_year) VALUE (:nom, :sinop, :dura, :myear)';
            $stmt = $conn->prepare($sql);
            $stmt -> bindParam(':nom', $movie_name);
            $stmt -> bindParam(':sinop', $movie_desc);
            $stmt -> bindParam(':dura', $movie_dura);
            $stmt -> bindParam(':myear', $movie_year);
            $stmt ->execute();
        }catch (PDOException $e){
            // $conn->rollBack();
            echo "Error: ". $e->getMessage() ."";
        }

        // 
        $sql_id = 'SELECT * FROM tbl_movie WHERE mvi_nom = "'.$movie_name.'" AND mvi_year = "'.$movie_year.'";';
        echo $sql_id;
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $conn -> prepare($sql_id);
        $stmt -> execute();
        $verif = $stmt -> fetch();

        echo $verif['id_movie'];
        if (isset($_FILES["portada"])) {
            // Directorio de destino para guardar el archivo con el nuevo nombre
            $target_directory = "./../rsc/movie/";
            $target_file = $target_directory .$verif['id_movie'].".jpg";
            // Movemos el archivo subido al directorio de destino con el nuevo nombre
            if (move_uploaded_file($_FILES["portada"]["tmp_name"], $target_file)) {
                echo "El archivo se ha subido correctamente.";
                $sql_up = 'UPDATE tbl_movie SET mvi_porta = "'.$verif['id_movie'].'.jpg" WHERE ( id_movie = '.$verif['id_movie'].');';
                // echo $sql_up;
                $stmt = $conn->prepare($sql_up);
                $stmt ->execute();
                $sql_cat = 'INSERT INTO tbl_genero_movie (id_movie, id_gen) VALUES ('.$verif['id_movie'].', '.$movie_gene.');';
                echo $sql_cat;
                $stmt = $conn->prepare($sql_cat);
                $stmt -> execute();

                header('Location: ../view/home.php?id='.$verif['id_movie']);

            }
        } else {
        }
    }

} catch (PDOException $e){
    // $conn->rollBack();
    echo "Error: ". $e->getMessage() ."";
}




?>