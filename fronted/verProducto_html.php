<?php // HTML visual extraído de verProducto.php ?>
<div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-green-700 mb-4">Lista de Productos</h2>
    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-green-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Nombre</th>
                <th class="border px-4 py-2">Precio</th>
                <th class="border px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr class="text-center">
                    <td class="border px-4 py-2"><?php echo $producto['id']; ?></td>
                    <td class="border px-4 py-2"><?php echo $producto['nombre']; ?></td>
                    <td class="border px-4 py-2">S/ <?php echo $producto['precio']; ?></td>
                    <td class="border px-4 py-2 space-x-2">
                        <a href="actualizarProducto.php?id=<?php echo $producto['id']; ?>"
                           class="text-blue-600 hover:underline">Editar</a>
                        <a href="eliminarProducto.php?id=<?php echo $producto['id']; ?>"
                           class="text-red-600 hover:underline">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
