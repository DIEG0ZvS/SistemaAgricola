<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST["correo"]);
    $clave = trim($_POST["clave"]);

    require_once "controladores/UsuarioController.php";
    $uc = new UsuarioController();
    $uc->login($correo, $clave);
}
?>

<h1>Ingresar al Sistema</h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
    <input type="email" name="correo" placeholder="Correo"/><br>
    <input type="password" name="clave" placeholder="Contraseña"/><br>
    <input type="submit" value="Iniciar Sesión"/>
</form>