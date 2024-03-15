<?php
session_start();

if (!isset($_SESSION['id'])) {
    # code...
    header('Location: '.'../index.php');
}else{
    if (!$_SERVER['REQUEST_METHOD'] === 'POST') {
        header('Location: '.'../index.php');
    }else{
        echo "hola";
        $datos = $_POST['pelicula'];
        $id_movie = json_decode($datos, true);
        $sql = "SELECT * from tbl_movie WHERE id_movie = :id";
    }
}
