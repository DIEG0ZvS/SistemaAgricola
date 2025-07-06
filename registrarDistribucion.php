<?php
require_once "layouts/header.php";
require_once "controladores/DistribucionController.php";
require_once "controladores/PedidoController.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dc = new DistribucionController();
    $mensaje = $dc->guardar($_POST);

    echo "<script>
        alert('$mensaje');
        window.location.href='verDistribucion.php';
    </script>";
    exit();
}

$pedidoController = new PedidoController();
$pedidos = $pedidoController->mostrar();
?>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Registrar Distribución</h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="mb-3">
                    <label for="pedidoId" class="form-label">Seleccionar Pedido</label>
                    <select class="form-select" name="pedidoId" id="pedidoId" required>
                        <option value="">-- Selecciona un pedido --</option>
                        <?php foreach ($pedidos as $pedido): ?>
                            <option value="<?= $pedido['id'] ?>">
                                Pedido #<?= $pedido['id'] ?> - Cliente ID: <?= $pedido['clienteId'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nomMerc" class="form-label">Nombre del Mercado</label>
                    <input type="text" class="form-control" name="nomMerc" id="nomMerc" required>
                </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="verDistribucion.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<?php require_once "layouts/footer.php"; ?>