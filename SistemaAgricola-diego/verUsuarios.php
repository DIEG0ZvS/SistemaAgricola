<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

require_once "controladores/ClienteController.php";
$cc = new ClienteController();
$clientes = $cc->mostrar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes - Sistema Agrícola</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-green-600">Clientes Registrados</h1>
            <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Cerrar sesión</a>
        </div>

        <div class="mb-4">
            <a href="registrarCliente.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                + Registrar Cliente
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto bg-white border border-gray-200 rounded-lg">
                <thead class="bg-green-100 text-green-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Nombre</th>
                        <th class="px-4 py-2 text-left">Dirección</th>
                        <th class="px-4 py-2 text-left">Teléfono</th>
                        <th class="px-4 py-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    <?php foreach($clientes as $cliente): ?>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2"><?php echo htmlspecialchars($cliente["nombre"]); ?></td>
                            <td class="px-4 py-2"><?php echo htmlspecialchars($cliente["direccion"]); ?></td>
                            <td class="px-4 py-2"><?php echo htmlspecialchars($cliente["telefono"]); ?></td>
                            <td class="px-4 py-2 text-center space-x-2">
                                <a href="actualizarUsuario.php?id=<?php echo $cliente["id"]; ?>" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 transition text-sm">Actualizar</a>
                                <a href="eliminarUsuario.php?id=<?php echo $cliente["id"]; ?>" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition text-sm">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (count($cliente) == 0): ?>
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-gray-500">No hay clientes registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
