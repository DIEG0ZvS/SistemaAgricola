<?php
require_once __DIR__ . '/Conn.php';

class Usuario {
    public $nombre;
    public $correo;
    public $clave;

    public function __construct() {}

    public function guardar($nombre, $correo, $clave) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        // Encriptar contraseña
        $claveHash = password_hash($clave, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuario (nombre, correo, clave) VALUES (:nombre, :correo, :clave)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':clave', $claveHash);

        $resultado = $stmt->execute();
        $conn->cerrar();

        return $resultado;
    }

    public function validarUsuario($correo, $clave) {
        $conn = new Conn();
        $conexion = $conn->conectar();

        $sql = "SELECT * FROM usuario WHERE correo = :correo";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn->cerrar();

        if ($usuario) {
            if (password_verify($clave, $usuario['clave']) || $clave === $usuario['clave']) {
                return $usuario;
            }
        }

        return false;
    }
}
?>
