<?php
require_once "Conn.php";

class Usuario {

    public function guardar($nombre, $correo, $clave) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "insert into usuario(nombre, correo, clave) values ('$nombre', '$correo', '$clave')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "select * from usuario";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "select * from usuario where id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($nombre, $correo, $clave, $id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "update usuario set nombre = '$nombre', correo = '$correo', clave = '$clave' where id = $id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($id) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "delete from usuario where id = $id";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorCorreo($correo) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "select * from usuario where correo = '$correo'";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}
?>
