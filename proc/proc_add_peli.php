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
            
            $sql = 'INSERT INTO tbl_movie (mvi_nom, mvi_des, mvi_dura, mvi_year) VALUE (:nom, :sinop, :dura, :myear)';
            $stmt = $conn->prepare($sql);
            $stmt -> bindParam(':nom', $movie_name);
            $stmt -> bindParam(':sinop', $movie_desc);
            $stmt -> bindParam(':dura', $movie_dura);
            $stmt -> bindParam(':myear', $movie_year);
            $stmt ->execute();
            $conn->commit();
        
        }catch (PDOException $e){
            $conn->rollBack();
            echo "Error: ". $e->getMessage() ."";
        }

        $sql_id = 'SELECT * FROM tbl_movie WHERE mvi_nom = '.$movie_name.' AND mvi_year = '.$movie_year.' ;';
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $conn -> prepare($sql_id);
        $stmt -> execute();
        $verif = $stmt -> fetch();

        $nombreArchivo = $_FILES['portada']['name'];
        $tipoArchivo = $_FILES['portada']['type'];
        $tamañoArchivo = $_FILES['portada']['size'];
        $rutaTemporal = $_FILES['portada']['tmp_name'];
        
        // Cambiar el nombre del archivo a "img1"
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
        $nombreArchivo = $verif['id_movie'].".".$extension;

        // Mover el archivo a una ubicación permanente
        $directorioDestino = '../rsc/movie/'; // Directorio donde se guardarán los archivos subidos
        $rutaDestino = $directorioDestino . $nombreArchivo;

        $extension = pathinfo($nombreArchivo,PATHINFO_EXTENSION);
        // $dirDestino = "img/";
        if (move_uploaded_file($rutaTemporal, $rutaDestino)) {
        echo "subido correctamente";
        }
    }

} catch (PDOException $e){
    $conn->rollBack();
    echo "Error: ". $e->getMessage() ."";
}




?>