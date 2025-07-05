<?php
session_start();

$correoGuardado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST["correo"]);
    $clave = trim($_POST["clave"]);
    $_SESSION["correo_temp"] = $correo; // para autocompletar

    require_once "controladores/UsuarioController.php";
    $uc = new UsuarioController();
    $uc->login($correo, $clave);
}

if (isset($_SESSION["correo_temp"])) {
    $correoGuardado = $_SESSION["correo_temp"];
    unset($_SESSION["correo_temp"]);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-6 text-center text-green-600">Inicio de Sesión</h2>

        <?php if (!empty($_SESSION['login_error'])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php
                echo $_SESSION['login_error'];
                unset($_SESSION['login_error']);
                ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-4">
            <div>
                <label for="correo" class="block mb-1 font-medium text-gray-700">Correo</label>
                <input type="email" id="correo" name="correo" required
                       value="<?php echo htmlspecialchars($correoGuardado); ?>"
                       class="w-full border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                       placeholder="ejemplo@correo.com">
            </div>
            <div>
                <label for="clave" class="block mb-1 font-medium text-gray-700">Contraseña</label>
                <input type="password" id="clave" name="clave" required
                       class="w-full border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400"
                       placeholder="••••••••">
            </div>
            <button type="submit"
                    class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 transition">
                Iniciar Sesión
            </button>
        </form>
    </div>
</body>
</html>
