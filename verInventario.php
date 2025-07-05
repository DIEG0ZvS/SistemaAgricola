<?php
require_once "controladores/InventarioController.php";
require_once "layouts/header.php";

$ic = new InventarioController();
$inventario = $ic->mostrar();
?>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Pedidos del Sistema</h2>
        <a class="btn btn-danger" href="logout.php">Cerrar Sesión</a>
    </div>

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-dark text-center">
    <tr>
            <th>ID Producto</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($inventario as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item["productoId"]) ?></td>
                <td><?= htmlspecialchars($item["stock"]) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php require_once "layouts/footer.php"; ?>
