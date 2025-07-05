<?php

require_once "Conn.php";

class Producto {
    public $id;
    public $nombre;
    public $categoria;
    public $precio;

    public function __construct() {}

    public function buscar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM producto WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($nombre, $categoria, $precio, $id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE producto SET nombre = '$nombre', categoria = '$categoria', precio = $precio WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM producto";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar($nombre, $categoria, $precio) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO producto(nombre, categoria, precio) VALUES ('$nombre', '$categoria', $precio)";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM producto WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorNombre($nombre) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM producto WHERE nombre = '$nombre'";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
