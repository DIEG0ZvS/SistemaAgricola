<?php // Formulario de inicio de sesión ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-green-100">

    <form method="POST" action="login.php" class="bg-white p-8 rounded-xl shadow-md w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-6 text-center text-green-700">Iniciar Sesión</h2>

        <label for="usuario" class="block text-sm font-medium text-gray-700">Usuario</label>
        <input type="text" id="usuario" name="usuario" required
               class="w-full px-3 py-2 border border-gray-300 rounded-lg mb-4 focus:outline-none focus:ring focus:border-green-500">

        <label for="clave" class="block text-sm font-medium text-gray-700">Contraseña</label>
        <input type="password" id="clave" name="clave" required
               class="w-full px-3 py-2 border border-gray-300 rounded-lg mb-6 focus:outline-none focus:ring focus:border-green-500">

        <button type="submit"
                class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-200">
            Ingresar
        </button>
    </form>

</body>
</html>
