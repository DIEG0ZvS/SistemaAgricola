<?php // HTML visual extraído de registrarUsuario.php ?>
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-green-700 mb-4">Registrar Usuario</h2>
    <form action="registrarUsuario.php" method="post">
        <label class="block mb-2">Nombre:</label>
        <input type="text" name="nombre"
               class="w-full border border-gray-300 rounded p-2 mb-4" required>

        <label class="block mb-2">Usuario:</label>
        <input type="text" name="usuario"
               class="w-full border border-gray-300 rounded p-2 mb-4" required>

        <label class="block mb-2">Contraseña:</label>
        <input type="password" name="clave"
               class="w-full border border-gray-300 rounded p-2 mb-4" required>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Registrar Usuario
        </button>
    </form>
</div>
