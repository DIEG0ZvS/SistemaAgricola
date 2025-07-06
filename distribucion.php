<?php
<<<<<<< HEAD
require_once "Conn.php";

class Distribucion {
    public function registrar($pedidoId, $nomMerc) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO distribucion (pedidoId, nomMerc) VALUES ($pedidoId, '$nomMerc')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function obtenerTodos() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM distribucion";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
=======
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
+
>>>>>>> 69d373e42b3a1fb8bb4c8b2d38f0382447560222
