<?php
<<<<<<< HEAD
require_once "Conn.php";

class Cliente {
    public function guardar($nombre, $telefono) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO cliente (nombre, telefono) VALUES ('$nombre', '$telefono')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM cliente";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM cliente WHERE id = $id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }
}
=======
class Cliente {
    public $id;
    public $nombre;
    public $telefono;

    public function __construct($nombre, $telefono) {
        $this->nombre = $nombre;
        $this->telefono = $telefono;
    }

    public function guardar() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO cliente (nombre, telefono) VALUES (?, ?)");
        $stmt->execute([$this->nombre, $this->telefono]);
    }

    public static function obtenerTodos() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM cliente");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function encontrarPorId($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM cliente WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE cliente SET nombre = ?, telefono = ? WHERE id = ?");
        $stmt->execute([$this->nombre, $this->telefono, $id]);
    }

    public static function eliminar($id) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM cliente WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
>>>>>>> 69d373e42b3a1fb8bb4c8b2d38f0382447560222
