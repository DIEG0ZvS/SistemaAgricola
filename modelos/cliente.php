<?php

require_once "Conn.php";

class Cliente {
    public $id;
    public $nombre;
    public $telefono;

    public function __construct() {}

    public function buscar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM cliente WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($nombre, $telefono, $id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE cliente SET nombre = '$nombre', telefono = '$telefono' WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM cliente";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar($nombre, $telefono) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO cliente(nombre, telefono) VALUES ('$nombre', '$telefono')";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM cliente WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
