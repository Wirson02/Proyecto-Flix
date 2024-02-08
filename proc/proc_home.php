<?php
include_once('conexion.php');

// MAYOR NUMERO DE LIKES
$sql = "SELECT * FROM tbl_movie ORDER BY id_movie ASC LIMIT 5;";

// OPCIONES DE TODOS LOS GENEROS DISPONIBLES
$sql2 = "SELECT * FROM tbl_generos";

// RESTO DE LA PAGINACION

try {
    // TOP 5 DEL MOMENTO
    $stmt = $conn->prepare($sql);
    $stmt -> execute();
    $result = $stmt ->fetchAll();
    
    echo '<div class="slt">
            <div class="head flex">
                <h1>TOP 5</h1>
            </div>';
    foreach ($result as $peli) {
        echo '
        <div class="column-5">
            <div class="tarjeta">
                <div class="fondo"></div>
                <div class="titulo">'.$peli['mvi_nom'].'</div>
                <a><img src="../rsc/movie/'.$peli['mvi_porta'].'" class="card-img-top" alt="..."></a><span></span>
            </div>
        </div>
            ';
        // echo $peli['id'];

    }// BUSCADOR Y FILTROS
    try {
        echo '
        <div class="slt">
            <div id="search" class="column-1 flex">
                <div class="form flex" id="container">
                    <div class="row col-9">
                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control" placeholder="Busca tu pelicula..." aria-label="City">
                        </div>
                        <div class="col-md-4">
                            <select id="genero" name="genero" class="form-control">
                                <option value="" hidden disabled selected>Escoge un genero</option>';
        $stmt = $conn->prepare($sql2);
        $stmt -> execute();
        $result = $stmt ->fetchAll();
        foreach ($result as $generos) {
            echo '<option value="'.$generos['id_generos'].'">'.$generos['gen_nom'].'</option>';
        }
        echo "</select>
        
        </div>
        </div>";
        
    } catch (Exception $e){
        echo "Error: ". $e->getMessage() ."";
    }
echo '</div>';
} catch (Exception $e){
    echo "Error: ". $e->getMessage() ."";
}
