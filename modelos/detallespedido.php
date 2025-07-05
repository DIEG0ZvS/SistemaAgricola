<?php
<<<<<<< HEAD
require_once "Conn.php";

class DetallesPedido {
    public function agregar($pedidoId, $productoId, $cantidad) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO detallespedido (pedidoId, productoId, cantidad) VALUES ($pedidoId, $productoId, $cantidad)";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function obtenerPorPedido($pedidoId) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM detallespedido WHERE pedidoId = $pedidoId";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
=======
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
>>>>>>> 69d373e42b3a1fb8bb4c8b2d38f0382447560222
