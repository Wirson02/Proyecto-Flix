<?php
    require 'conexion.php';
    $pwd = $_POST['pwd'];
    $user = $_POST['user'];
//Consulta

    $sql_login = "SELECT * from tbl_user where usr_mail = :user";
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $stm_consulta = $conn -> prepare($sql_login);
    $stm_consulta -> bindParam(':user',$user);
    $stm_consulta -> execute();
    $verif = $stm_consulta -> fetch();
if ($stm_consulta ->rowCount() == 1) {
    // $verif = mysqli_fetch_assoc($verif);
    // echo "existe usuario";
    // echo "<br>";
    if (password_verify($pwd, $verif['usr_pwd'])) {
        // --- ROLLES --- /  1 = EN ESPERA / 2 = DESHABILITADO / 3 = ACTIVO (USUARIO NORMAL) / 4 = ADMIN
        if ($verif['usr_rol'] == 1) {
            header('Location: ../index.php?alerta=1');
            exit();
        }
        if ($verif['usr_rol'] == 2) {
            header('Location: ../index.php?alerta=2');
            exit();
        }

        if ($verif['usr_rol'] >=3) {
            session_start();
            $_SESSION['id'] = $verif['id_usr'];
            $_SESSION['nom'] = $verif['usr_nom'];
            $_SESSION['ape'] = $verif['usr_ape'];
            $_SESSION['rol'] = $verif['usr_rol'];
            header('Location: ./../view/home.php?start');
            exit();
        }
        // echo 'Password is valid!';
        // echo "<br>";
        // echo "Acceso al chat";

        header('Location: ../index.php?alerta=3');
        exit();
    } else {
        header('Location: ../index.php?alerta=3');
        exit();
    }
} else {
    header('Location: ../index.php?alerta=3'); // Usuario no encontrado
    exit();
}