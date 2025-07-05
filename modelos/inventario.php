<?php
require_once "Conn.php";

class Inventario {
    public function actualizar($productoid, $stock) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "update inventario set stock = $stock where productoid = $productoid";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "select * from inventario";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
?>
