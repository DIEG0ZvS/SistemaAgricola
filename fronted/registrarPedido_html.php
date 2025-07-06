<?php // HTML visual extraído de registrarPedido.php ?>
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-green-700 mb-4">Registrar Pedido</h2>
    <form action="registrarPedido.php" method="post">
        <label class="block mb-2">Cliente ID:</label>
        <input type="text" name="clienteId"
               class="w-full border border-gray-300 rounded p-2 mb-4" required>

        <label class="block mb-2">Fecha:</label>
        <input type="date" name="fecha"
               class="w-full border border-gray-300 rounded p-2 mb-4" required>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Registrar Pedido
        </button>
    </form>
</div>
