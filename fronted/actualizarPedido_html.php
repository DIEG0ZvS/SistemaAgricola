<?php // HTML visual extraído de actualizarPedido.php ?>
<div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-green-700 mb-4">Actualizar Pedido</h2>
    <form action="actualizarPedido.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $pedido['id']; ?>">

        <label class="block mb-2">Cliente ID:</label>
        <input type="text" name="clienteId" value="<?php echo $pedido['clienteId']; ?>"
               class="w-full border border-gray-300 rounded p-2 mb-4" required>

        <label class="block mb-2">Fecha:</label>
        <input type="date" name="fecha" value="<?php echo $pedido['fecha']; ?>"
               class="w-full border border-gray-300 rounded p-2 mb-4" required>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Actualizar Pedido
        </button>
    </form>
</div>
