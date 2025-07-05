<?php
require_once "Conn.php";

class Producto {
    public function guardar($nombre, $categoria, $precio) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "insert into producto(nombre, categoria, precio) values ('$nombre', '$categoria', $precio)";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "select * from producto";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "delete from producto where id = $id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }
}
?>
