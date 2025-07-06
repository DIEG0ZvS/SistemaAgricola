<?php

require_once "Conn.php";

class Pedido {
    public $id;
    public $clienteId;
    public $fecha;
    public $estado;

    public function __construct() {}

    public function buscar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM pedido WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($clienteId, $fecha, $estado, $id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE pedido SET clienteId = $clienteId, fecha = '$fecha', estado = '$estado' WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM pedido";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar($clienteId, $fecha, $estado) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO pedido(clienteId, fecha, estado) VALUES ($clienteId, '$fecha', '$estado')";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM pedido WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorNombre($clienteId) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM pedido WHERE clienteId = $clienteId";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
