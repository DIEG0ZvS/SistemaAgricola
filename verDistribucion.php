<?php
require_once "controladores/DistribucionController.php";
require_once "layouts/header.php";

$dc = new DistribucionController();
$distribuciones = $dc->mostrar();
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Distribuciones del Sistema</h2>
        <a class="btn btn-danger" href="logout.php">Cerrar Sesión</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID Pedido</th>
                <th>Nombre del Mercado</th>
                <th>Eliminar</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($distribuciones as $distribucion): ?>
                <tr>
                    <td><?= htmlspecialchars($distribucion["pedidoId"]) ?></td>
                    <td><?= htmlspecialchars($distribucion["nomMerc"]) ?></td>
                    <td>
                        <a href="eliminarDistribucion.php?id=<?= $distribucion["id"] ?>" 
                           class="btn btn-sm btn-outline-danger">Eliminar</a>
                    </td>
                    <td>
                        <a href="actualizarDistribucion.php?id=<?= $distribucion["id"] ?>" 
                           class="btn btn-sm btn-outline-warning">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<div class="text-end">
        <a href="registrarDistribucion.php" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Registrar Distribución
        </a>
    </div>
</div>

<?php
require_once "layouts/footer.php";
?>