<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

require_once "controladores/ProductoController.php";

// Validar que el ID exista y sea un número positivo
if (isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0) {
    $id = intval($_GET["id"]);

    $pc = new ProductoController();
    $resultado = $pc->eliminar($id);

    if (strpos($resultado, 'location:') === 0) {
        header($resultado); // Redirige si se devuelve correctamente
        exit();
    } else {
        // Error durante la eliminación
        echo "<p style='color: red; text-align: center;'>$resultado</p>";
        echo "<p style='text-align: center;'><a href='verProducto.php'>← Volver a productos</a></p>";
    }
} else {
    // ID inválido
    echo "<p style='color: red; text-align: center;'>ID de producto no válido.</p>";
    echo "<p style='text-align: center;'><a href='verProducto.php'>← Volver a productos</a></p>";
}
