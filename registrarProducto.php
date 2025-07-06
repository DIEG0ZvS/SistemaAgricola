<?php 
require_once "layouts/header.php"; 
?>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Registrar Producto</h4>
        </div>
        <div class="card-body">
            <form method="post" action="">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Producto</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <input type="text" class="form-control" name="categoria" id="categoria" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio (S/)</label>
                    <input type="number" step="0.01" class="form-control" name="precio" id="precio" required>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="verProducto.php" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<?php
require_once "layouts/footer.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once "controladores/ProductoController.php";
    $pc = new ProductoController();
    $resultado = $pc->guardar($_POST);
    echo "<script>
        alert('" . $resultado . "');
        window.location.href = 'verProducto.php';
    </script>";
}
?>