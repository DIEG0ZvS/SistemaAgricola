<?php
require_once "controladores/PedidoController.php";
require_once "layouts/header.php";

$pc = new PedidoController();

$stmt = $pc->mostrar();
$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalPedidos = count($pedidos);
$estados = [
    "Pendiente" => 0,
    "En camino" => 0,
    "Entregado" => 0
];
foreach ($pedidos as $p) {
    if (isset($estados[$p["estado"]])) {
        $estados[$p["estado"]]++;
    }
}
?>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Reporte de Pedidos</h2>
        <a class="btn btn-danger" href="logout.php">Cerrar Sesión</a>
    </div>
    <table class="table table-hover table-bordered align-middle">
        <thead class="table-dark text-center">
            <tr>
                <th>ID Cliente</th>
                <th>Fecha</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($pedidos as $pedido): ?>
            <tr>
                <td><?= htmlspecialchars($pedido["clienteId"]) ?></td>
                <td><?= htmlspecialchars($pedido["fecha"]) ?></td>
                <td><?= htmlspecialchars($pedido["estado"]) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="mt-4">
        <p><strong>Total de pedidos:</strong> <?= $totalPedidos ?></p>
        <ul>
            <li>Pendientes: <?= $estados["Pendiente"] ?></li>
            <li>En camino: <?= $estados["En camino"] ?></li>
            <li>Entregados: <?= $estados["Entregado"] ?></li>
        </ul>
    </div>
    <div class="mt-3 text-end">
        <button class="btn btn-secondary" onclick="window.print()">Imprimir</button>
        <a href="verPedido.php" class="btn btn-primary">Volver</a>
    </div>
</div>
<?php require_once "layouts/footer.php"; ?>
