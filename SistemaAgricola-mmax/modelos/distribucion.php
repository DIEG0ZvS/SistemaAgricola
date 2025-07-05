<?php
require_once __DIR__ . '/Conn.php';
if (!isset($pdo)) {
    $pdo = (new Conn())->conectar();
}

class Distribucion {
    public static function registrar($pedidoId, $nomMerc) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO distribucion (pedidoId, nomMerc) VALUES (?, ?)");
        $stmt->execute([$pedidoId, $nomMerc]);
    }

    public static function obtenerPorPedido($pedidoId) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM distribucion WHERE pedidoId = ?");
        $stmt->execute([$pedidoId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
