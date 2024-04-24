<?php
session_start();
include_once 'conexion.php';
$datos = $_POST['datos'];
$usr = json_decode($datos, true);
// --- ROLLES --- /  1 = EN ESPERA / 2 = DESHABILITADO / 3 = ACTIVO (USUARIO NORMAL) / 4 = ADMIN


try {
    if ($usr['usr'] == 1) {
        $sql = 'UPDATE tbl_user SET usr_rol = 3 WHERE (id_usr = '.$usr['id'].' );';
        echo 'ABLE';
    }
    
    if ($usr['usr'] == 2) {
        $sql = 'UPDATE tbl_user SET usr_rol = 2 WHERE (id_usr = '.$usr['id'].' );';
        echo 'DISSABLE';
    }
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();


}catch (Exception $e) {
    echo "Ha ocurrido un error obteniendo la informacion de este usuario ".$e->getMessage();
}

$stmt = $conn->prepare($sql);