<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}
$nombreUsuario = $_SESSION["nombre"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Principal - Sistema Agrícola</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

    <div class="max-w-7xl mx-auto px-4 py-6">
        <!-- Encabezado -->
        <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col md:flex-row justify-between items-center mb-8">
            <div class="text-center md:text-left">
                <h1 class="text-3xl font-bold text-green-600">🌿 Sistema Agrícola</h1>
                <p class="text-gray-700 mt-1">Bienvenido, <span class="font-semibold text-green-700"><?php echo htmlspecialchars($nombreUsuario); ?></span></p>
            </div>
            <a href="logout.php" class="mt-4 md:mt-0 bg-red-500 text-white px-5 py-2 rounded-lg hover:bg-red-600 transition duration-200">
                Cerrar sesión
            </a>
        </div>

        <!-- Tarjetas de navegación -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="verProducto.php" class="card border-green-500 text-green-700 hover:border-green-600">
                <h2>🧺 Productos</h2>
                <p>Consulta los productos agrícolas registrados.</p>
            </a>

            <a href="registrarProducto.php" class="card border-blue-500 text-blue-700 hover:border-blue-600">
                <h2>➕ Agregar Producto</h2>
                <p>Añade un nuevo producto al inventario.</p>
            </a>

            <a href="verClientes.php" class="card border-yellow-500 text-yellow-700 hover:border-yellow-600">
                <h2>👤 Clientes</h2>
                <p>Gestiona la información de los clientes.</p>
            </a>

            <a href="verPedidos.php" class="card border-purple-500 text-purple-700 hover:border-purple-600">
                <h2>📦 Pedidos</h2>
                <p>Consulta y gestiona los pedidos realizados.</p>
            </a>

            <a href="verDistribucion.php" class="card border-indigo-500 text-indigo-700 hover:border-indigo-600">
                <h2>🚚 Distribución</h2>
                <p>Visualiza la distribución de los pedidos.</p>
            </a>

            <a href="verUsuarios.php" class="card border-gray-500 text-gray-700 hover:border-gray-600">
                <h2>🔐 Usuarios</h2>
                <p>Administra los usuarios del sistema.</p>
            </a>
        </div>
    </div>

    <!-- Tailwind helper for cards -->
    <style>
        .card {
            @apply bg-white border-l-4 rounded-xl shadow-md p-5 hover:shadow-lg transition duration-200;
        }
        .card h2 {
            @apply text-xl font-semibold mb-1;
        }
        .card p {
            @apply text-sm text-gray-600;
        }
    </style>

</body>
</html>
