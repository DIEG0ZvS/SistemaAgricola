<?php
require_once __DIR__ . '/Conn.php';
if (!isset($pdo)) {
    $pdo = (new Conn())->conectar();
}

class DetallesPedido {
    public static function agregarDetalle($pedidoId, $productoId, $cantidad) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO detallespedido (pedidoId, productoId, cantidad) VALUES (?, ?, ?)");
        $stmt->execute([$pedidoId, $productoId, $cantidad]);
    }

    public static function obtenerPorPedido($pedidoId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM detallespedido WHERE pedidoId = ?");
        $stmt->execute([$pedidoId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
