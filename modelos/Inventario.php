<?php

require_once "Conn.php";

class Inventario {
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


    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM inventario";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

}
