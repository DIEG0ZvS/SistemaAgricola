<?php
session_start();
require_once "modelos/Usuario.php";

$mensaje = "";
if (isset($_SESSION['usuario_id'])) {
    header("Location: verProducto.php");
    exit;
}

if (!empty($_POST)) {
    $correo = $_POST['correo'] ?? '';
    $clave = $_POST['clave'] ?? '';
    $usuarioModel = new Usuario();
    $usuario = $usuarioModel->validarUsuario($correo, $clave);
    if ($usuario) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];
        header("Location: verProducto.php");
        exit;
    } else {
        $mensaje = "Correo o contraseña inválidos";
    }
}
require_once "layouts/header.php";
?>
<h1>Iniciar Sesión</h1>
<?php if ($mensaje): ?>
<div class="alert alert-danger"><?php echo $mensaje; ?></div>
<?php endif; ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input class="form-control" type="email" name="correo" placeholder="Correo"><br>
    <input class="form-control" type="password" name="clave" placeholder="Contraseña"><br>
    <input type="submit" value="Ingresar" class="btn btn-primary"><br>
</form>
<?php
require_once "layouts/footer.php";
?>
