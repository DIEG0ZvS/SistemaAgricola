<?php
<<<<<<< HEAD
require_once "Conn.php";

class Inventario {
    public function actualizar($productoId, $stock) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE inventario SET stock = $stock WHERE productoId = $productoId";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT i.*, p.nombre AS producto FROM inventario i JOIN producto p ON i.productoId = p.id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
=======
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
>>>>>>> 69d373e42b3a1fb8bb4c8b2d38f0382447560222
