<?php
    require_once "controladores/PedidoController.php";
    require_once "layouts/header.php";

    $pc = new PedidoController();
    $pedidos = $pc->mostrar();
?>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Pedidos del Sistema</h2>
        <a class="btn btn-danger" href="logout.php">Cerrar Sesión</a>
    </div>

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-dark text-center">
    <tr>
        <th>ID Cliente</th>
        <th>Fecha</th>
        <th>Estado</th>
        <th>Eliminar</th>
        <th>Actualizar</th>
    </tr>
    </thead>
    <tbody>
<?php foreach($pedidos as $pedido): ?>
                <tr>
                    <td><?= htmlspecialchars($pedido["clienteId"]) ?></td>
                    <td><?= htmlspecialchars($pedido["fecha"]) ?></td>
                    <td><?= htmlspecialchars($pedido["estado"]) ?></td>
                    <td>
                        <a href="eliminarPedido.php?id=<?= $pedido["id"] ?>" 
                           class="btn btn-sm btn-outline-danger">Eliminar</a>
                    </td>
                    <td>
                        <a href="actualizarPedido.php?id=<?= $pedido["id"] ?>" 
                           class="btn btn-sm btn-outline-warning">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>
<div class="text-end">
        <a href="registrarPedido.php" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Registrar Pedido</a>
<?php
require_once "layouts/footer.php";