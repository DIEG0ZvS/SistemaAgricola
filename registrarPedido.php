<?php
    require_once "layouts/header.php";
    require_once "controladores/ClienteController.php";
    $cc = new ClienteController();
    $clientes = $cc->mostrar();

?>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Registrar Pedido</h4>
        </div>
        <div class="card-body">
            <form method="post" action="">
                <div class="mb-3">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>Cliente:</label>
    <select class="form-control" name="clienteId" required>
        <option value="">Seleccione un cliente</option>
        <?php foreach ($clientes as $cliente): ?>
            <option value="<?= $cliente["id"]; ?>"><?= $cliente["id"]; ?> - <?= $cliente["nombre"]; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Fecha:</label>
    <input class="form-control" type="date" name="fecha" required><br>

    <label>Estado:</label>
    <select class="form-control" name="estado" required>
        <option value="Pendiente">Pendiente</option>
        <option value="En camino">En camino</option>
        <option value="Entregado">Entregado</option>
    </select><br>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="verPedido.php" class="btn btn-secondary">Cancelar</a>
</form>

<?php
    require_once "controladores/PedidoController.php";
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $pc = new PedidoController();
        echo $pc->guardar($_POST);
        header("Location: verPedido.php");
    }
?>