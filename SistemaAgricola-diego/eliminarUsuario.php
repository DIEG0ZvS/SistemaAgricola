<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

require_once "controladores/UsuarioController.php";

// Validar si se recibió un ID válido por GET
if (isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0) {
    $id = intval($_GET["id"]);

    $uc = new UsuarioController();
    $resultado = $uc->eliminar($id);

    if (strpos($resultado, 'location:') === 0) {
        header($resultado); // redirige si viene "location: verUsuarios.php"
    } else {
        // Error en la eliminación
        echo "<p style='color: red; text-align: center;'>$resultado</p>";
        echo "<p style='text-align: center;'><a href='verUsuarios.php'>← Volver a la lista</a></p>";
    }
} else {
    // ID inválido
    echo "<p style='color: red; text-align: center;'>ID inválido para eliminar.</p>";
    echo "<p style='text-align: center;'><a href='verUsuarios.php'>← Volver a la lista</a></p>";
}
