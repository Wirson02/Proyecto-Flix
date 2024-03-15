<?php
// var_dump($_POST);
if (isset($_POST["validado"])) {
    include("conexion.php");

}else{
    header('Location: '.'../index.php');  
    exit();
}

$user = $_POST['user'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$pwd = password_hash($_POST['pwd'], PASSWORD_BCRYPT);


try {
    $sqlChk="SELECT usr_mail FROM tbl_user WHERE usr_mail = :user";
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $stmt1 = $conn -> prepare($sqlChk);
    $stmt1 -> bindParam(':user',$user);
    $stmt1 -> execute();
    $res = $stmt1 -> fetchAll();
    echo $stmt1->rowCount();
    if($stmt1->rowCount()>=1){
        echo"El usuario existe";
        header('Location: '.'../index.php?userExist=true');
        exit();
    }else{
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sqlInsert=  "INSERT INTO tbl_user (usr_mail, usr_nom, usr_ape, usr_pwd) VALUES (:user,:nom,:ape,:pwd);";
        $stmt2 = $conn -> prepare($sqlInsert);
        $stmt2 -> bindParam(':user',$user);
        $stmt2 -> bindParam(':nom',$nombre);
        $stmt2 -> bindParam(':ape',$apellido);
        $stmt2 -> bindParam(':pwd',$pwd);
        $stmt2 -> execute();
        $stmt1 -> closeCursor();
        $stmt2 -> closeCursor();
        // echo "Usuario creadado correctamente";
        header('Location: '.'../index.php?alert=1');
    }

} catch (Exception $e) {
    echo "Ha ocurrido un error con el registro: ".$e->getMessage();
    die();
}