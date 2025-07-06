<?php
<<<<<<< HEAD

require_once "Conn.php";

class Usuario {

    private $nombre;
    private $correo;
    private $clave;
    private $rol;

    public function __construct() {

    }

    public function guardar(String $nombre, String $correo, String $clave, String $rol = 'empleado') {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $clave = password_hash($clave, PASSWORD_DEFAULT);
        $sql = "INSERT INTO Usuario (nombre, correo, clave, rol)
        VALUES ('$nombre', '$correo', '$clave', '$rol')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function validarUsuario(String $correo) {
    $conn = new Conn();
    $conexion = $conn->conectar();
    $sql = "SELECT * FROM Usuario WHERE correo = '$correo'";
    $resultado = $conexion->query($sql);
    $conn->cerrar();
    return $resultado;
    }
}
=======
require_once "Conn.php";

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

        if ($usuario && password_verify($clave, $usuario['clave'])) {
            return $usuario;
        }

        return false;
    }
}
?>
>>>>>>> 69d373e42b3a1fb8bb4c8b2d38f0382447560222
