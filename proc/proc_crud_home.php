<?php
include_once "conexion.php";
session_start();

echo '';

// CONSULTA PARA SABER EL NUMERO DE PETICIONES
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
    <button type="button" id="user_crud" class="btn btn-primary flex"><box-icon name="user"></box-icon> <span>Usuarios</span></button>
</div>
<div class="column-5">
    <button type="button" id="movie_crud" class="btn btn-info flex"> <box-icon name="movie-play"></box-icon> <span> Peliculas</span></button>
</div>
<div class="column-5">';

if ($peticiones['peticiones'] == 0) {
    echo '<button type="button" id="peti_crud" class="btn btn-dark position-relative">Peticiones<span class="visually-hidden">unread messages</span></button></div></div>';
}else{
    echo '<div class="column-5"><button type="button" id="peti_crud" class="btn btn-dark position-relative">Peticiones<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">'.$peticiones['peticiones'].'<span class="visually-hidden">unread messages</span></span></button></div></div>';
}
echo '</div>';
echo '<div id="perfil" class="slt">
<h3>Usuarios</h3>
<div class="slt">
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo Electronico</th>
            <th scope="col">Contraseña</th>
            <th scope="col">Rol</th>
            <th scope="col">Edicion</th>
        </tr>
    </thead>
<tbody>
';

$sql = 'SELECT * FROM tbl_user';
$stmt = $conn ->prepare($sql);
$stmt ->execute();
$result = $stmt->fetchAll();
foreach ($result as $user) {
    echo '<tr>
        <td>'.$user['usr_nom'].'</td>
        <td>'.$user['usr_ape'].'</td>
        <td>'.$user['usr_mail'].'</td>';
        // echo '<td>'.$user['usr_pwd'].'</td>';
        echo '<td>  **********  </td>';

    switch ($user['usr_rol']) {
        case '4':
            echo '<td class="table-info" >Administrador</td>';
            break;
        case '3':
            echo '<td class="table-success">Activo</td>';
            break;
        case '2':
            echo '<td class="table-danger" >Deshabilitado</td>';
            break;
        default:
            echo '<td class="table-warning">Espera</td>';
            break;
    }
    echo '<td>
    <button value="'.$user['id_usr'].'" type="button" class="btn-warning btn">Editar</button>
    <button value="'.$user['id_usr'].'" type="button" class="btn-danger btn">Eliminar</button> <br></td>
    </tr>';
}
