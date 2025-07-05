<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

require_once "controladores/ProductoController.php";

$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pc = new ProductoController();
    $mensaje = $pc->guardar($_POST);
    header("Location: verProducto.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-xl mx-auto bg-white shadow-md rounded-xl p-6">
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-green-600">Registrar Producto</h1>
            <a href="verProducto.php" class="text-blue-600 hover:underline">← Volver</a>
        </div>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-4">
            <div>
                <label class="block text-gray-700 font-medium">Nombre del Producto</label>
                <input type="text" name="nombre" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Categoría</label>
                <input type="text" name="categoria" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Precio (S/)</label>
                <input type="number" step="0.01" name="precio" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
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
