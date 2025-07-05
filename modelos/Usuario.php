<?php

require_once "Conn.php";

class Usuario {

    private $nombre;
    private $correo;
    private $clave;
    private $rol;

    public function __construct() {

    }

    public function guardar(String $nombre, String $correo, String $clave, String $rol = 'empleado') {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $clave = password_hash($clave, PASSWORD_DEFAULT);
        $sql = "INSERT INTO Usuario (nombre, correo, clave, rol)
        VALUES ('$nombre', '$correo', '$clave', '$rol')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function validarUsuario(String $correo) {
    $conn = new Conn();
    $conexion = $conn->conectar();
    $sql = "SELECT * FROM Usuario WHERE correo = '$correo'";
    $resultado = $conexion->query($sql);
    $conn->cerrar();
    return $resultado;
    }
}