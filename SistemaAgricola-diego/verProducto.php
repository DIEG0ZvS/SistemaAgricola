<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

require_once "controladores/ProductoController.php";
$pc = new ProductoController();
$productos = $pc->mostrar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos - Sistema Agrícola</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-green-600">Productos del Sistema</h1>
            <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Cerrar sesión</a>
        </div>

        <div class="mb-4">
            <a href="registrarProducto.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                + Registrar Producto
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto bg-white border border-gray-200 rounded-lg">
                <thead class="bg-green-100 text-green-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Nombre</th>
                        <th class="px-4 py-2 text-left">Categoría</th>
                        <th class="px-4 py-2 text-left">Precio (S/)</th>
                        <th class="px-4 py-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    <?php foreach($productos as $producto): ?>
                        <tr class="border-t">
                            <td class="px-4 py-2"><?php echo htmlspecialchars($producto["nombre"]); ?></td>
                            <td class="px-4 py-2"><?php echo htmlspecialchars($producto["categoria"]); ?></td>
                            <td class="px-4 py-2">S/ <?php echo number_format($producto["precio"], 2); ?></td>
                            <td class="px-4 py-2 text-center">
                                <a href="actualizarProducto.php?id=<?php echo $producto["id"]; ?>" class="text-yellow-600 hover:underline mr-4">Actualizar</a>
                                <a href="eliminarProducto.php?id=<?php echo $producto["id"]; ?>" class="text-red-600 hover:underline">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (count($producto) == 0): ?>
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-gray-500">No hay productos registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
