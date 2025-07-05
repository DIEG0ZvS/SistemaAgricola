<?php

require_once "Conn.php";

class DetallesPedido {
    public $pedidoId;
    public $productoId;
    public $cantidad;

    public function __construct() {}

    public function buscar($pedidoId, $productoId) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM detallespedido WHERE pedidoId = $pedidoId AND productoId = $productoId";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($cantidad, $pedidoId, $productoId) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE detallespedido SET cantidad = $cantidad WHERE pedidoId = $pedidoId AND productoId = $productoId";
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

    public function guardar($pedidoId, $productoId, $cantidad) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO detallespedido(pedidoId, productoId, cantidad) VALUES ($pedidoId, $productoId, $cantidad)";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($pedidoId, $productoId) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM detallespedido WHERE pedidoId = $pedidoId AND productoId = $productoId";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorNombre($pedidoId) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM detallespedido WHERE pedidoId = $pedidoId";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
