<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

require_once "controladores/ClienteController.php";

$cc = new ClienteController();

if (!empty($_GET["id"])) {
    $id = intval($_GET["id"]);
} elseif (!empty($_POST["id"])) {
    $id = intval($_POST["id"]);
} else {
    echo "<p style='color: red;'>ID no proporcionado.</p>";
    exit();
}

$cliente = $cc->buscar($id)[0] ?? null;

if (!$cliente) {
    echo "<p style='color: red;'>Cliente no encontrado.</p>";
    exit();
}

// Procesar actualización
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cc->actualizar($_POST);
    header("Location: verClientes.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Cliente</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-xl mx-auto bg-white shadow-md rounded-xl p-6">
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-green-600">Actualizar Cliente</h1>
            <a href="verClientes.php" class="text-blue-600 hover:underline">← Volver</a>
        </div>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-4">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

            <div>
                <label class="block text-gray-700 font-medium">Nombre</label>
                <input type="text" name="nombre" value="<?= htmlspecialchars($cliente["nombre"]) ?>" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Dirección</label>
                <input type="text" name="direccion" value="<?= htmlspecialchars($cliente["direccion"]) ?>" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Teléfono</label>
                <input type="text" name="telefono" value="<?= htmlspecialchars($cliente["telefono"]) ?>" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
            </div>

            <div class="flex justify-end">
                <input type="submit" value="Actualizar" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
            </div>
        </form>
    </div>

</body>
</html>
