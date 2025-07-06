<?php // HTML visual extraído de registrarProducto.php ?>
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-green-700 mb-4">Registrar Producto</h2>
    <form action="registrarProducto.php" method="post">
        <label class="block mb-2">Nombre:</label>
        <input type="text" name="nombre"
               class="w-full border border-gray-300 rounded p-2 mb-4" required>

        <label class="block mb-2">Precio:</label>
        <input type="number" name="precio"
               class="w-full border border-gray-300 rounded p-2 mb-4" required>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Registrar Producto
        </button>
    </form>
</div>
