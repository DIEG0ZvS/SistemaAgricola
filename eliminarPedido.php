<?php
require_once "controladores/PedidoController.php";

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $pe = new PedidoController();
    $pe->eliminar($id);
    header("Location: verPedido.php");
}