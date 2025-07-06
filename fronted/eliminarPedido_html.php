<?php // HTML visual extraído de eliminarPedido.php ?>
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md text-center">
    <h2 class="text-xl font-bold text-red-600 mb-4">¿Estás seguro de eliminar este pedido?</h2>
    <form method="post" action="eliminarPedido.php">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Confirmar Eliminación
        </button>
    </form>
</div>
