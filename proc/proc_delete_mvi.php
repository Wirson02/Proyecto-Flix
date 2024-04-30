<?php
session_start();
include_once 'conexion.php';

$datos = $_POST['datos'];
$dato = json_decode($datos, true);

try {
    $sql= 'SELECT * FROM tbl_genero_movie WHERE id_movie = '.$dato['id'].' ;';
    // $conn->beginTransaction();
    $stmt = $conn ->prepare($sql);
    $stmt ->execute();
    $result = $stmt->fetchAll();
    if ($stmt->rowCount() >= 1) {
        foreach ($result as $like) {
            $sql = 'DELETE FROM tbl_genero_movie WHERE id_gen_mvi = '.$like['id_gen_mvi'].';';
            $stmt1 = $conn->prepare($sql);
            $stmt1 -> execute();
            // $conn->commit();

        }
    }

    $sql= 'SELECT * FROM tbl_likes WHERE id_movie = '.$dato['id'].' ;';
    // $conn->beginTransaction();
    $stmt = $conn ->prepare($sql);
    $stmt ->execute();
    $result = $stmt->fetchAll();
    if ($stmt->rowCount() >= 1) {
        foreach ($result as $like) {
            $sql = 'DELETE FROM tbl_likes WHERE id_likes = '.$like['id_likes'].';';
            $stmt1 = $conn->prepare($sql);
            $stmt1 -> execute();
            // $conn->commit();
        }
    }

    $sql = 'DELETE FROM tbl_movie WHERE id_movie = '.$dato['id'].';';
    $stmt1 = $conn->prepare($sql);
    $stmt1-> execute();
    // $conn->commit();


    echo "OK";
} catch (Exception $e) {
    // $conn->rollBack();
    echo "Ha ocurrido un error con el registro: ".$e->getMessage();
}