<?php
require_once "Conn.php";

class Distribucion {
    public function guardar($pedidoid, $nommerc) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "insert into distribucion(pedidoid, nommerc) values ($pedidoid, '$nommerc')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "select * from distribucion";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
?>
