<?php
session_start();
include_once 'conexion.php';

$datos = $_POST['datos'];
$dato = json_decode($datos, true);

$sql = 'SELECT * FROM  tbl_likes WHERE id_user = '.$dato['id'].';';

try {
    // $conn->beginTransaction();
    $stmt = $conn ->prepare($sql);
    $stmt ->execute();
    $result = $stmt->fetchAll();
    if ($stmt->rowCount() >= 1) {
        foreach ($result as $like) {
            try {
                $sql = 'DELETE FROM tbl_likes WHERE id_likes = '.$like['id_likes'].';';
                // $conn->beginTransaction();
                $stmt1 = $conn->prepare($sql);
                $stmt1-> execute();
                // $conn->commit();
            } catch (Exception $e) {
                echo "Ha ocurrido un error con el registro: ".$e->getMessage();
            }
        }
    }
    try {
        $user = 'DELETE FROM tbl_user WHERE  id_usr = '.$dato['id'].' ;';
        $stmt = $conn->prepare($user);
        $stmt ->execute();
        // $conn->commit();
        echo "OK";
    } catch (Exception $e) {
            // $conn->rollBack();
        echo "Ha ocurrido un error con el registro: ".$e->getMessage();
    }
} catch (Exception $e) {
    // $conn->rollBack();
    echo "Ha ocurrido un error con el registro: ".$e->getMessage();
}

