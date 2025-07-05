<?php
require_once "Conn.php";

class Cliente {
    public function guardar($nombre, $telefono) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "insert into cliente(nombre, telefono) values ('$nombre', '$telefono')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "select * from cliente";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "delete from cliente where id = $id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }
}
?>
