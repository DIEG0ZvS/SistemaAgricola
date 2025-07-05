<?php
require_once __DIR__ . '/Conn.php';
if (!isset($pdo)) {
    $pdo = (new Conn())->conectar();
}

class Inventario {
    public static function registrar($productoId, $stock) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO inventario (productoId, stock) VALUES (?, ?)");
        $stmt->execute([$productoId, $stock]);
    }

    public static function actualizarStock($productoId, $nuevoStock) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE inventario SET stock = ? WHERE productoId = ?");
        $stmt->execute([$nuevoStock, $productoId]);
    }

    public static function obtenerPorProducto($productoId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM inventario WHERE productoId = ?");
        $stmt->execute([$productoId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
