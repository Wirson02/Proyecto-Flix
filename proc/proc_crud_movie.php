<?php
include_once "conexion.php";
session_start();
echo '
<h2> CRUD DE PELICULAS </h2>
<div class="slt">
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Sinopsis</th>
            <th scope="col">Duracion</th>
            <th scope="col">Portada</th>
            <th scope="col">Edicion</th>
        </tr>
    </thead>
<tbody>
';

try {
    $sql = 'SELECT * FROM tbl_movie';
    $stmt_conn = $conn ->prepare($sql);
    $stmt_conn ->execute();
    $result = $stmt_conn->fetchAll();

    foreach ($result as $movie) {
        echo '<tr>
        <td>'.$movie['mvi_nom'].'</td>
        <td>'.$movie['mvi_desc'].'</td>
        <td>'.$movie['mvi_dura'].' min </td>
        <td>'.$movie['mvi_porta'].'</td>';
        
        echo '<td>
        <button value="'.$movie['id_movie'].'" type="button" class="editar_mvi btn-warning btn">Editar</button>
        <button value="'.$movie['id_movie'].'" type="button" class="delete_mvi btn-danger btn delete_usr">Eliminar</button> <br></td>
        </tr>';
    
    }
echo '</div>';
} catch (Exception $e) {
    
}
