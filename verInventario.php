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
        <th>ID Producto</th>
        <th>Stock</th>
    </tr>
    </thead>
    <tbody>
<?php
    foreach($pedidos as $pedido){
        echo "<tr>
                <td>" . $pedido["productoId"] . "</td>
                <td>" . $pedido["stock"] . "</td>
            </tr>";
    }
?>
    </tbody>
</table>
<?php
require_once "layouts/footer.php";