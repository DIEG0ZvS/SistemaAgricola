<?php // HTML visual extraído de eliminarProducto.php ?>
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-md text-center">
    <h2 class="text-xl font-bold text-red-600 mb-4">¿Eliminar este producto?</h2>
    <form method="post" action="eliminarProducto.php">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Eliminar
        </button>
    </form>
</div>
