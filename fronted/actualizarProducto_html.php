<?php // HTML visual extraído de actualizarProducto.php ?>
<div class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-green-700">Actualizar Producto</h2>
    <form action="actualizarProducto.php" method="post">
        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

        <label class="block mb-2">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>"
               class="w-full p-2 border border-gray-300 rounded mb-4">

        <label class="block mb-2">Precio:</label>
        <input type="number" name="precio" value="<?php echo $producto['precio']; ?>"
               class="w-full p-2 border border-gray-300 rounded mb-4">

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Actualizar
        </button>
    </form>
</div>
