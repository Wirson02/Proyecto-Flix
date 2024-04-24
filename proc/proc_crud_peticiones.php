<?php
session_start();
include_once 'conexion.php';

$sql = 'SELECT id_usr, usr_ape , usr_nom, usr_mail FROM tbl_user WHERE usr_rol = 1 ';

try {
  $stmt = $conn ->prepare($sql);
  $stmt ->execute();
  $result = $stmt->fetchAll();
  if ($stmt -> rowCount() >= 1) {
    echo '<table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Mail</th>
        <th scope="col">Opción</th>
      </tr>
    </thead>
    <tbody>';
    foreach ($result as $user) {
        echo '<tr>
        <td>'.$user['usr_nom'].'</td>
        <td>'.$user['usr_ape'].'</td>
        <td>'.$user['usr_mail'].'</td>
        ';
        echo '<td>
        <button value="'.$user['id_usr'].'" type="button" class="acept-peti btn-success btn ">Aceptar</button>
        <button value="'.$user['id_usr'].'" type="button" class="deneg-peti btn-danger btn">Rechazar</button>
        </td></tr>';
    }
    echo '  </tbody>
    </table>';    
  }else{
    echo '<div class="flex"><h2>No hay Peticiones </h2></div>';
  }
}catch (Exception $e) {
  echo "Ha ocurrido un error con el registro: ".$e->getMessage();
}