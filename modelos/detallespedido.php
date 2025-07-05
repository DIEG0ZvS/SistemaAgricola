<?php
require_once "Conn.php";

class DetallesPedido {
    public function guardar($pedidoid, $productoid, $cantidad) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "insert into detallespedido(pedidoid, productoid, cantidad) values ($pedidoid, $productoid, $cantidad)";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrarPorPedido($pedidoid) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "select * from detallespedido where pedidoid = $pedidoid";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
?>
