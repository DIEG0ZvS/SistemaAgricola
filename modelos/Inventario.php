<?php

require_once "Conn.php";

class Inventario {
    public $id;
    public $productoId;
    public $stock;

    public function __construct() {}

    public function buscar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM inventario WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($productoId, $stock, $id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE inventario SET productoId = $productoId, stock = $stock WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM inventario";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar($productoId, $stock) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO inventario(productoId, stock) VALUES ($productoId, $stock)";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM inventario WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorNombre($productoId) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM inventario WHERE productoId = $productoId";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
