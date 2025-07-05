<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

require_once "controladores/PedidoController.php";

// Validar que el ID esté definido, sea numérico y positivo
if (isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0) {
    $id = intval($_GET["id"]);

    $pc = new PedidoController();
    $resultado = $pc->eliminar($id);

    if (strpos($resultado, 'location:') === 0) {
        header($resultado); // Redirige correctamente
        exit();
    } else {
        // Si hay un mensaje de error
        echo "<p style='color: red; text-align: center;'>$resultado</p>";
        echo "<p style='text-align: center;'><a href='verPedido.php'>← Volver a pedidos</a></p>";
    }
} else {
    // ID inválido
    echo "<p style='color: red; text-align: center;'>ID de pedido no válido.</p>";
    echo "<p style='text-align: center;'><a href='verPedido.php'>← Volver a pedidos</a></p>";
}
