<?php

require_once "Conn.php";

class Inventario {
    public $id;
    public $productoid;
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

    public function actualizar($productoid, $stock, $id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE inventario SET productoid = $productoid, stock = $stock WHERE id = $id";
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

    public function guardar($productoid, $stock) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO inventario(productoid, stock) VALUES ($productoid, $stock)";
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
}
