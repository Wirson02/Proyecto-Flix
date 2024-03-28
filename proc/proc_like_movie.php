<?php
session_start();
include_once('conexion.php');

$dato = $_POST['movie'];
$datos = json_decode($dato, true);
$id = $datos['id'];

// consulta para ver si hay like o no
$sql = 'SELECT * FROM tbl_likes WHERE id_movie = :movie AND id_user = :id;';
$stmt = $conn -> prepare($sql);
$stmt -> bindParam(':id',$_SESSION['id']);
$stmt -> bindParam(':movie',$id);
$stmt -> execute();
$likes = $stmt->fetch(PDO::FETCH_ASSOC);

if ($stmt->rowCount() == 1) {
    // echo "existe el like, lo quitaremos";
    $sql = 'DELETE FROM tbl_likes WHERE id_likes = :id';
    $stmt = $conn -> prepare($sql);
    $stmt -> bindParam(':id',$likes['id_likes']);
    $stmt -> execute();

}else{
    // echo "el like no existe, lo agregaremos";
    $sql = 'INSERT INTO tbl_likes (id_user, id_movie) VALUE (:usr, :mvi)';
    $stmt = $conn -> prepare($sql);
    $stmt -> bindParam(':usr',$_SESSION['id']);
    $stmt -> bindParam(':mvi',$id);
    $stmt -> execute();
    $stmt -> closeCursor();
}
    // CONSULTA DE LIKES
    $sql_lkes = 'SELECT COUNT(id_user) AS total_likes FROM tbl_likes WHERE id_movie = :id;';
    $stmt = $conn -> prepare($sql_lkes);
    $stmt -> bindParam(':id',$id);
    $stmt -> execute();
    $likes = $stmt->fetch(PDO::FETCH_ASSOC);

    echo $likes['total_likes'];