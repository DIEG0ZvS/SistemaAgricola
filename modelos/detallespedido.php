<?php

require_once "Conn.php";

class DetallesPedido {
    public $pedidoid;
    public $productoid;
    public $cantidad;

    public function __construct() {}

    public function buscar($pedidoid, $productoid) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM detallespedido WHERE pedidoid = $pedidoid AND productoid = $productoid";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($cantidad, $pedidoid, $productoid) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE detallespedido SET cantidad = $cantidad WHERE pedidoid = $pedidoid AND productoid = $productoid";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM detallespedido";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar($pedidoid, $productoid, $cantidad) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO detallespedido(pedidoid, productoid, cantidad) VALUES ($pedidoid, $productoid, $cantidad)";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($pedidoid, $productoid) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM detallespedido WHERE pedidoid = $pedidoid AND productoid = $productoid";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
