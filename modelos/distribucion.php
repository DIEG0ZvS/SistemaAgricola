<?php

require_once "Conn.php";

class Distribucion {
    public $id;
    public $pedidoid;
    public $nommerc;

    public function __construct() {}

    public function buscar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM distribucion WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($pedidoid, $nommerc, $id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE distribucion SET pedidoid = $pedidoid, nommerc = '$nommerc' WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM distribucion";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar($pedidoid, $nommerc) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO distribucion(pedidoid, nommerc) VALUES ($pedidoid, '$nommerc')";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM distribucion WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
