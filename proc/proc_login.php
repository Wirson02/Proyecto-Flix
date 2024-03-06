<?php
    require 'conexion.php';
    $pwd = $_POST['pwd'];
    $user = $_POST['user'];
//Consulta

    $sql_login = "SELECT * from tbl_user where user_username = :user";
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $stm_consulta = $conn -> prepare($sql_login);
    $stm_consulta -> bindParam(':user',$user);
    $stm_consulta -> execute();
    $verif = $stm_consulta -> fetch();
if ($stm_consulta ->rowCount() == 1) {
    // $verif = mysqli_fetch_assoc($verif);
    // echo "existe usuario";
    // echo "<br>";
    if (password_verify($pwd, $verif['user_pwd'])) {
        // echo 'Password is valid!';
        // echo "<br>";
        // echo "Acceso al chat";
        session_start();
        $_SESSION["admin"] = $verif['user_admin'];
        $_SESSION['id'] = $verif['id_user'];
        $_SESSION['nom'] = $verif['user_username'];
        $_SESSION['ape'] = $verif['user_ape'];
        header('Location: ../home.php?start=true');
        exit();
    } else {
        header('Location: ../index.php?loginerror=true');
        exit();
    }
} else {
    echo "no existe";
    header('Location: ../index.php?loginerror=true'); // Usuario no encontrado
    exit();
}