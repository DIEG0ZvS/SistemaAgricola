<?php

require_once "Conn.php";

class Distribucion {
    public $id;
    public $pedidoId;
    public $nomMerc;

    public function __construct() {}

    public function buscar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM distribucion WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($pedidoId, $nomMerc, $id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE distribucion SET pedidoId = $pedidoId, nomMerc = '$nomMerc' WHERE id = $id";
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

    public function guardar($pedidoId, $nomMerc) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO distribucion(pedidoId, nomMerc) VALUES ($pedidoId, '$nomMerc')";
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

    public function buscarPorNombre($nomMerc) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM distribucion WHERE nomMerc = '$nomMerc'";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
