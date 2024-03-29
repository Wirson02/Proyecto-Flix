<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
    <link rel="stylesheet" href="./css/index.css">
    <title>Giatchat</title>
</head>
<body>
    <h2>Bienvenido a Proyecto Fenix</h2>
    <div class="container <?php if (isset($_GET['nombreVacio']) || isset($_GET['nombre'])) {echo" right-panel-active";}else{}?>" id="container">
        <div class="form-container sign-up-container">
            <form action="./proc/proc_val.php" method="post" id="registrarse">
                <h1>Crear Cuenta</h1>
                <?php  if (isset($_GET['signup'])) {echo "<span class='alert'>Porfavor revisa los datos del usuario a crear</span>";}?>
                <?php  if (isset($_GET['userMaxLength'])) {echo "<span class='alert'>el nombre de usuario no pueden ser mas de 15 caracteres</span>";}?>
                <?php  if (isset($_GET['userVacio'])) {echo "<span class='alert'>El campo usuario es obligatorio</span>";}?>
                <input type="text" name="user" id="user" placeholder="Correo Electronico" value="<?php if(isset($_GET["user"])){echo $_GET["user"];} ?>">
                <?php  if (isset($_GET['nombreVacio'])) {echo "<span class='alert'>El campo nombre es obligatorio</span>";}?>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?php if(isset($_GET["nombre"])){echo $_GET["nombre"];} ?>">
                <?php  if (isset($_GET['apellidoVacio'])) {echo "<span class='alert'>El campo apellido es obligatorio</span>";}?>
                <input type="text" name="apellido" id="apellido" placeholder="Apellido" value="<?php if(isset($_GET["apellido"])){echo $_GET["apellido"];} ?>">
                <?php  if (isset($_GET['pwd1Vacio'])) {echo "<span class='alert'>El campo contraseña es obligatorio</span>";}?>
                <input type="password" name="pwd1" id="pwd1" placeholder="Contraseña">
                <?php  if (isset($_GET['pwdUnmatch'])) {echo "<span class='alert'>Las contraseñas deben coincidir</span>";}?>
                <input type="password" name="pwd2" id="pwd2" placeholder="Repetir Contraseña">
                <button type="submit" name="registrarse">Registrarse</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="./proc/proc_val.php" method="post">
                <h1>Iniciar Sesion</h1>
                <?php   if (isset($_GET['loginerror'])) {echo "<span class='alert'>Porfavor revisa los datos al iniciar sesión</span>";}?>
                <input type="text" name="user" id="user" placeholder="Correo Electronico" <?php if(isset($_GET['userlog'])){echo "value = ".$_GET['user'];}?>>
                <input type="password" name="pwd" id="pwd" placeholder="Contraseña">
                <button type="submit" value="login" name="login">Inicia Sesion</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Bienvenido de Nuevo</h1>
				    <p>Para seguir conectado con nostros por favor inicia sesion</p>
                    <button class="ghost" id="signIn">Iniciar Sesion</button>
			    </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hola, amigo!</h1>
				    <p>Registrate para poder mantenerte conectado y empezara a hablar con tus amigos</p>
				    <button class="ghost" id="signUp">Registrarse</button>
			    </div>
            </div>
        </div>
    </div>
</body>
</html>