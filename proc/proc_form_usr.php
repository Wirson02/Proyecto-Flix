<?php 
session_start();
include_once 'conexion.php';
$datos = $_POST['datos'];
$js = json_decode($datos, true);

$id = $js['id'];

// echo $id;

// CONSULTA PARA SABER EL NUMERO DE PETICIONES 1 = SOLICTUDES PENDIENTES (PARA CONFIRMAR)
$sql_pet = 'SELECT * FROM tbl_user WHERE id_usr = '.$id.';';

try {
    $stmt_conn = $conn ->prepare($sql_pet);
    $stmt_conn ->execute();
    $usr = $stmt_conn->fetch();

    echo '
    <div class="mb-3">
        <label for="usr-name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="usr-name" placeholder="nombre" value="'.$usr['usr_nom'].'">
    </div>
    <div class="mb-3">
        <label for="usr-ape" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="usr-ape" placeholder="nombre" value="'.$usr['usr_ape'].'">
    </div>
    <div class="mb-3">
        <label for="usr-mail" class="form-label">Correo Electronico</label>
        <input type="text" class="form-control" id="usr-mail" placeholder="nombre" value="'.$usr['usr_mail'].'">
    </div>
    <br>
    <label for="usr-mail" class="form-label">Rol Usuario</label>
    <select class="form-select" id="usr-rol" aria-label="Rol Usuario">
        <option value="2">Deshabilitado</option>
        <option value="3">Activo</option>
        <option value="4">Administrador</option>
        <option selected hidden disabel value="0">Selecciona el Rol</option>
    </select>
    <br>
    <div class="mb-3">
        <label for="usr-pwd" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="usr-pwd" placeholder="Inserta nueva Contraseña">
    </div>
    ';
} catch (Exception $e) {
    echo "Ha ocurrido un error obteniendo la informacion de este usuario ".$e->getMessage();
}