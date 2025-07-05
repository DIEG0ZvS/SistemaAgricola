<?php

require_once "Conn.php";

class Pedido {
    public $id;
    public $clienteid;
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

    public function actualizar($clienteid, $fecha, $estado, $id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE pedido SET clienteid = $clienteid, fecha = '$fecha', estado = '$estado' WHERE id = $id";
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

    public function guardar($clienteid, $fecha, $estado) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO pedido(clienteid, fecha, estado) VALUES ($clienteid, '$fecha', '$estado')";
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
}
