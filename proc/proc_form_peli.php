<?php

include('conexion.php');
// OPCIONES DE TODOS LOS GENEROS DISPONIBLES
$sql2 = "SELECT * FROM tbl_generos";

try {
    echo '
    <div id="perfil" class="slt flex">
        <div class="column-2">
            <form id="form-addmovie" class="row g-3">
                <div class="col-md-12">
                    <label for="inputEmail4" class="form-label">Nombre Pelicula</label>
                    <input type="text" class="form-control" placeholder="Nombre de tu pelicula" id="nom_peli">
                    <div class="invalid-feedback">Inserta el nombre de la pelicula</div>
                </div>
                <div class="col-mb-3">
                    <label for="validationTextarea" class="form-label">Sinopsis</label>
                    <textarea class="form-control" id="sinopsis" placeholder="Maximo 200 caracteres" required></textarea>
                    <div class="invalid-feedback">Minimo 100 caracteres y Maximo 200</div>
                </div>
                <div class="col-md-4">
                    <label for="inputPassword4" class="form-label">Genero Principal</label>
                    <select id="genero_peli" class="form-select">
                    <option selected hidden disabled>Choose...</option>';
    $stmt = $conn->prepare($sql2);
    $stmt -> execute();
    $result = $stmt->fetchAll();
    foreach ($result as $generos) {
        echo '<option value="'.$generos['id_generos'].'">'.$generos['gen_nom'].'</option>';
    }
    echo '</select>
    <div class="invalid-feedback">Inserta el nombre de la pelicula</div>
    </div>
    <div class="col-md-4">
    <label for="inputEmail4" class="form-label">Duración</label>
        <input type="number" class="form-control" placeholder="Duracion en minutos " id="dur_peli">
        <div class="invalid-feedback">Revisa los valores insertados</div>
    </div>
    <div class="col-md-4">
    <label for="inputEmail4" class="form-label">Año de Estreno</label>
        <input type="number" class="form-control" placeholder="Insertar Año" id="year_peli">
        <div class="invalid-feedback">Revisa los valores insertados</div>
    </div>
    <div class="col-mb-3">
        <input type="file" id="portada" class="form-control" required>
        <div class="invalid-feedback">Solo se permite Formatos de Imagen, Campo obligatorio*</div>
    </div>
    <div class="col-12">
        <button type="submit" id="añadir" class="btn btn-primary" disabled>Añadir Pelicula</button>
    </div>
</form>
</div>
<div class="column-2 flex">
<div class="tarjeta contenido">
    <div class="fondo"></div>
    <div id="titulo" class="titulo"></div>
    <img src="../rsc/movie/default.jpg" id="img-preview" class="card-img-top" alt="INSERTA UNA IMAGEN"><span></span>
</div>
</div>
</div>';

}catch (PDOException $e){
    echo "Error: ". $e->getMessage() ."";
}

?>


1