<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

require_once "controladores/ProductoController.php";

$pc = new ProductoController();
$id = isset($_GET["id"]) ? intval($_GET["id"]) : (isset($_POST["id"]) ? intval($_POST["id"]) : 0);

if (!$id) {
    echo "<p style='color:red;text-align:center;'>ID no válido</p>";
    exit();
}

$producto = $pc->buscar($id)[0] ?? null;

if (!$producto) {
    echo "<p style='color:red;text-align:center;'>Producto no encontrado</p>";
    exit();
}

// Procesar actualización si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pc->actualizar($_POST);
    header("Location: verProducto.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

<div class="max-w-xl mx-auto bg-white shadow-md rounded-xl p-6">
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-green-600">Actualizar Producto</h1>
        <a href="verProducto.php" class="text-blue-600 hover:underline">← Volver</a>
    </div>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="space-y-4">
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

        <div>
            <label class="block text-gray-700 font-medium">Nombre</label>
            <input type="text" name="nombre" required
                   value="<?= htmlspecialchars($producto["nombre"]) ?>"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Categoría</label>
            <input type="text" name="categoria" required
                   value="<?= htmlspecialchars($producto["categoria"]) ?>"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Precio (S/)</label>
            <input type="number" step="0.01" name="precio" required
                   value="<?= htmlspecialchars($producto["precio"]) ?>"
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
        </div>

        <div class="flex justify-end">
            <input type="submit" value="Actualizar" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
        </div>
    </form>
</div>

</body>
</html>
