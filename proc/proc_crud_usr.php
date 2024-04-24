<?php 
include_once "conexion.php";
session_start();

echo '
<h3>CRUD USUARIOS</h3>
<div class="slt">
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo Electronico</th>
            <th scope="col">Contraseña</th>
            <th scope="col">Rol / Estado</th>
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
    <button value="'.$user['id_usr'].'" type="button" class="editar_usr btn-warning btn">Editar</button>
    <button value="'.$user['id_usr'].'" type="button" class="delete_usr btn-danger btn">Eliminar</button> <br></td>
    </tr>';
}

