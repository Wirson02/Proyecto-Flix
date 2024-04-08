<?php
session_start();
include_once 'conexion.php';

$sql = 'SELECT m.*
FROM tbl_movie m
INNER JOIN tbl_likes l ON m.id_movie = l.id_movie
WHERE l.id_user = '.$_SESSION['id'].' ;';

echo '<h1>LISTA DE FAVORITOS</h1>';
echo '<div id="contenido" class="slt">';
$stmt = $conn->prepare($sql);
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
