<?php
require_once "controladores/ProductoController.php";
require_once "layouts/header.php";

$pc = new ProductoController();
$productos = $pc->mostrar();
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Productos del Sistema</h2>
        <a class="btn btn-danger" href="logout.php">Cerrar Sesión</a>
    </div>

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-dark text-center">
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio (S/)</th>
                <th>Eliminar</th>
                <th>Actualizar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= htmlspecialchars($producto["nombre"]) ?></td>
                <td><?= htmlspecialchars($producto["categoria"]) ?></td>
                <td class="text-end"><?= number_format($producto["precio"], 2) ?></td>
                <td class="text-center">
                    <a href="eliminarProducto.php?id=<?= $producto["id"] ?>" 
                       class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                        <i class="bi bi-trash"></i>
                    </a>
                </td>
                <td class="text-center">
                    <a href="actualizarProducto.php?id=<?= $producto["id"] ?>" 
                       class="btn btn-sm btn-outline-warning">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="text-end">
        <a href="registrarProducto.php" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Registrar Producto
        </a>
    </div>
</div>

<?php require_once "layouts/footer.php"; ?>