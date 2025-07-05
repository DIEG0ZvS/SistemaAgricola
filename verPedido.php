<?php
    require_once "controladores/PedidoController.php";
    require_once "layouts/header.php";

    $pc = new PedidoController();
    $pedidos = $pc->mostrar();
?>
<a class="btn btn-danger" href="logout.php">Salir</a>
<h1 class="mt-4">Pedidos del Sistema</h1>
<table class="table">
    <thead>
    <tr>
        <th>ID Cliente</th>
        <th>Fecha</th>
        <th>Estado</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
<?php
    foreach($pedidos as $pedido){
        echo "<tr>
                <td>" . $pedido["clienteId"] . "</td>
                <td>" . $pedido["fecha"] . "</td>
                <td>" . $pedido["estado"] . "</td>
                <td><a href='eliminarPedido.php?id=" . $pedido["id"] . "' class='btn btn-sm btn-outline-danger'>Eliminar</a></td>
                <td><a href='actualizarPedido.php?id=" . $pedido["id"] . "' class='btn btn-sm btn-outline-warning'>Actualizar</a></td>
            </tr>";
    }
?>
    </tbody>
</table>
<a href="registrarPedido.php" class="btn btn-primary">Registrar Pedido</a>
<?php
require_once "layouts/footer.php";