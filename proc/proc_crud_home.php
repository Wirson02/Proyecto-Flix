<?php
include_once "conexion.php";
session_start();


// CONSULTA PARA SABER EL NUMERO DE PETICIONES 1 = SOLICTUDES PENDIENTES (PARA CONFIRMAR)
$sql_pet = 'SELECT COUNT(*) as "peticiones" FROM tbl_user WHERE usr_rol = "1";';
$stmt_conn = $conn ->prepare($sql_pet);
$stmt_conn ->execute();
$peticiones = $stmt_conn->fetch();

echo '
<br>
<h1>ADMINISTRADOR</h1>
<br>
<div class="slt">
<div class="column-5">
    <button type="button" id="user_crud" class="btn btn-primary flex"><box-icon class="me-1" name="user"></box-icon> <span>Usuarios</span></button>
</div>
<div class="column-5">
    <button type="button" id="movie_crud" class="btn btn-info flex"> <box-icon class="me-1" name="movie-play"></box-icon> <span> Peliculas</span></button>
</div>
<div class="column-5">';

if ($peticiones['peticiones'] == 0) {
    echo '<button type="button" id="peti_crud" class="btn btn-warning flex"><box-icon  class="me-1" name="chat"></box-icon><span> Peticiones</span></button></div></div>';
}else{
    echo '<button type="button" id="peti_crud" class="btn btn-warning position-relative flex"><box-icon class="me-1" name="chat"></box-icon>Peticiones<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">'.$peticiones['peticiones'].'<span class="visually-hidden">unread messages</span></span></button></div></div>';
}
echo '</div>';
echo '<div id="perfil" class="slt">
</div>';
