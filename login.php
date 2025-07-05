<?php
session_start();

$correoGuardado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST["correo"]);
    $clave = trim($_POST["clave"]);
    $_SESSION["correo_temp"] = $correo;

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>

        .input-underline {
            border: none;
            border-bottom: 2px solid #D1D5DB;
            padding-bottom: 8px;
            outline: none;
            transition: border-color 0.2s ease-in-out;
        }

        .input-underline:focus {
            border-bottom-color: #3B82F6;
        }
    </style>
</head>

<body class="bg-white flex items-center justify-center min-h-screen p-4">

    <div class="bg-gray-100 rounded-2xl shadow-2xl overflow-hidden flex max-w-3xl w-full h-[480px]">
       
        <div class="relative w-1/2 p-10 flex flex-col justify-center items-center text-center">
            <h1 class="text-5xl font-bold leading-tight text-gray-800">Sistema Agricola</h1>
        </div>

        
        <div class="w-1/2 p-10 flex flex-col justify-center bg-white">
            <h2 class="text-3xl font-bold mb-6 text-gray-900">Login</h2>

            <?php if (!empty($_SESSION['login_error'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <?php
                    echo $_SESSION['login_error'];
                    unset($_SESSION['login_error']);
                    ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-6">
                <div>
                    <label for="correo" class="sr-only">Correo</label>
                    <input type="text" id="correo" name="correo" required
                           value="<?php echo htmlspecialchars($correoGuardado); ?>"
                           class="w-full text-gray-800 placeholder-gray-400 input-underline"
                           placeholder="Usuario">
                </div>
                <div>
                    <label for="clave" class="sr-only">Password</label>
                    <input type="password" id="clave" name="clave" required
                           class="w-full text-gray-800 placeholder-gray-400 input-underline"
                           placeholder="Password">
                </div>
                <div class="pt-4 flex justify-end">
                    <button type="submit"
                            class="bg-blue-600 text-white px-7 py-2.5 rounded-full text-lg hover:bg-blue-700 transition shadow-md">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>