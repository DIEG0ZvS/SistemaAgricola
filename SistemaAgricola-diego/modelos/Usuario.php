<?php

require_once "Conn.php";

class Usuario {
    public $id;
    public $nombre;
    public $correo;
    public $clave;

    public function __construct() {}

    public function buscar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM usuario WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($nombre, $correo, $clave, $id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE usuario SET nombre = '$nombre', correo = '$correo', clave = '$clave' WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM usuario";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar($nombre, $correo, $clave) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO usuario(nombre, correo, clave) VALUES ('$nombre', '$correo', '$clave')";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM usuario WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public static function buscarPorCorreo($correo) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM usuario WHERE correo = '$correo'";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
}
}
