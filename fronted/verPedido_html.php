<?php // HTML visual extraído de verPedido.php ?>
<div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-green-700 mb-4">Lista de Pedidos</h2>
    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-green-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Cliente</th>
                <th class="border px-4 py-2">Fecha</th>
                <th class="border px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido): ?>
                <tr class="text-center">
                    <td class="border px-4 py-2"><?php echo $pedido['id']; ?></td>
                    <td class="border px-4 py-2"><?php echo $pedido['clienteId']; ?></td>
                    <td class="border px-4 py-2"><?php echo $pedido['fecha']; ?></td>
                    <td class="border px-4 py-2 space-x-2">
                        <a href="actualizarPedido.php?id=<?php echo $pedido['id']; ?>"
                           class="text-blue-600 hover:underline">Editar</a>
                        <a href="eliminarPedido.php?id=<?php echo $pedido['id']; ?>"
                           class="text-red-600 hover:underline">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
