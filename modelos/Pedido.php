<?php
require_once "Conn.php";

class Pedido {
    public function guardar($clienteid, $fecha, $estado) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "insert into pedido(clienteid, fecha, estado) values ($clienteid, '$fecha', '$estado')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "select * from pedido";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
?>
