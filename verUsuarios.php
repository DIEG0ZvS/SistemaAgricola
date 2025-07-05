<?php
    require_once "controladores/ClienteController.php";
    require_once "layouts/header.php";

    $cc = new ClienteController();
    $clientes = $cc->mostrar();
?>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Clientes del Sistema</h2>
        <a class="btn btn-danger" href="logout.php">Cerrar Sesión</a>
    </div>

    <table class="table table-hover table-bordered align-middle">
        <thead class="table-dark text-center">
            <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Eliminar</th>
        <th>Actualizar</th>
    </tr>
    </thead>
    <tbody>
<?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= htmlspecialchars($cliente["id"]) ?></td>
                <td><?= htmlspecialchars($cliente["nombre"]) ?></td>
                <td><?= htmlspecialchars($cliente["direccion"]) ?></td>
                <td><?= htmlspecialchars($cliente["telefono"]) ?></td>
                <td class="text-center">
                    <a href="eliminarUsuario.php?id=<?= $cliente["id"] ?>" 
                       class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">
                        <i class="bi bi-trash"></i>
                    </a>
                </td>
                <td class="text-center">
                    <a href="actualizarUsuario.php?id=<?= $cliente["id"] ?>" 
                       class="btn btn-sm btn-outline-warning">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="text-end">
        <a href="registrarUsuarios.php" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Registrar Cliente</a>
<?php
require_once "layouts/footer.php";