<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Giatchat</title>
</head>
<body>
    <?php 
    if(isset($_GET)){
        if(!isset($_GET['userExist'])){
            echo"<script>btn = document.getElementById('signUp');
            btn.click();
            </script>";
        }
    }
    ?>
    <div class="container <?php if (isset($_GET['nombreVacio']) || isset($_GET['nombre'])) {echo" right-panel-active";}else{}?>" id="container">
        <div class="form-container sign-in-container">
            <form action="./proc/proc_val.php" method="post">
                <h1>Iniciar Sesion</h1>
                <?php   if (isset($_GET['loginerror'])) {echo "<span class='alert'>Porfavor revisa los datos al iniciar sesión</span>";}?>
                <input type="text" name="user" id="user" placeholder="Usuario" <?php if(isset($_GET['userlog'])){echo "value = ".$_GET['user'];}?>>
                <input type="password" name="pwd" id="pwd" placeholder="Contraseña">
                <button type="submit" value="login" name="login">Inicia Sesion</button>
            </form>
        </div>
    </div>
    <script src="./js/index.js"></script>
</body>
</html>