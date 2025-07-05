<?php
    require_once "controladores/PedidoController.php";
    require_once "layouts/header.php";
    if(!empty($_GET)){
        $id = $_GET["id"];
    }else{
        $id = $_POST["id"];
    }
    $pc = new PedidoController();
    $pedidos = $pc->buscar($id);
    foreach ($pedidos as $pedido){
        $cliente = $pedido["clienteId"];
        $fecha = $pedido["fecha"];
        $estado = $pedido["estado"];
    }
?>
<h1 class="mt-4">Actualizar Pedido</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input class="form-control" type="text" name="clienteId" placeholder="Cliente" value="<?=$cliente; ?>"><br>
    <label>Fecha:</label>
    <input class="form-control" type="date" name="fecha" value="<?= $fecha; ?>" required><br>

    <label>Estado:</label>
    <select class="form-control" name="estado" required>
        <option value="Pendiente" <?= $estado == "Pendiente" ? "selected" : "" ?>>Pendiente</option>
        <option value="En camino" <?= $estado == "En camino" ? "selected" : "" ?>>En camino</option>
        <option value="Entregado" <?= $estado == "Entregado" ? "selected" : "" ?>>Entregado</option>
    </select><br>

    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="submit" value="Actualizar" class="btn btn-primary"><br>
</form>
<?php
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $pc->actualizar($_POST);
        header("Location: verPedido.php");
    }
?>
