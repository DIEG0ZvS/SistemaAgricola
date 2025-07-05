<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

require_once "controladores/PedidoController.php";

$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pc = new PedidoController();
    $mensaje = $pc->guardar($_POST);
    header("Location: verPedido.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Pedido</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-xl mx-auto bg-white shadow-md rounded-xl p-6">
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-green-600">Registrar Pedido</h1>
            <a href="verPedido.php" class="text-blue-600 hover:underline">← Volver</a>
        </div>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-4">
            <div>
                <label class="block text-gray-700 font-medium">Cliente</label>
                <input type="text" name="cliente" required placeholder="Nombre del cliente"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Producto</label>
                <input type="text" name="producto" required placeholder="Nombre del producto"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Cantidad</label>
                <input type="number" name="cantidad" required min="1" placeholder="Cantidad solicitada"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div class="flex justify-end">
                <input type="submit" value="Guardar" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
            </div>
        </form>

        <?php if (!empty($mensaje)): ?>
            <p class="mt-4 text-green-600 font-medium"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>
    </div>

</body>
</html>
