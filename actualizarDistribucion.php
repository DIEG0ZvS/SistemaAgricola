<?php
require_once "controladores/DistribucionController.php";
require_once "layouts/header.php";

$dc = new DistribucionController();

// Obtener ID desde GET o POST
$id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"] ?? null;

// Obtener datos actuales para mostrar en el formulario
$distribucion = $dc->buscar($id);
$pedidoId = $distribucion["pedidoId"];
$nomMerc = $distribucion["nomMerc"];
?>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Actualizar Distribución</h4>
        </div>
        <div class="card-body">
            <form method="post" action="actualizarDistribucion.php">
                <div class="mb-3">
                    <label for="pedidoId" class="form-label">ID del Pedido</label>
                    <input type="number" class="form-control" id="pedidoId" name="pedidoId" value="<?= $pedidoId ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nomMerc" class="form-label">Nombre del Mercado</label>
                    <input type="text" class="form-control" id="nomMerc" name="nomMerc" value="<?= htmlspecialchars($nomMerc) ?>" required>
                </div>
                <input type="hidden" name="id" value="<?= $id ?>">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="verDistribuciones.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<?php
require_once "layouts/footer.php";

// Procesar actualización
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mensaje = $dc->actualizar($_POST);
    echo "<script>
        alert('$mensaje');
        window.location.href='verDistribuciones.php';
    </script>";
}
?>