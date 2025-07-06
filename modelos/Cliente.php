<?php

require_once "Conn.php";

class Cliente{
    public $id;
    public $nombre;
    public $direccion;
    public $telefono;

    public function __construct(){
    
    }

public function buscar($id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM cliente WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($id, $nombre, $direccion, $telefono){
    $conn = new Conn();
    $conexion = $conn->conectar();
    $sql = "UPDATE cliente SET nombre = '$nombre', direccion = '$direccion', telefono = '$telefono' WHERE id = $id";
    $resultado = $conexion->query($sql);
    $conn->cerrar();
    return $resultado;
    }

    public function mostrar(){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM cliente";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

        public function guardar($nombre, $direccion, $telefono){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO cliente(nombre, direccion, telefono) VALUES ('$nombre', '$direccion', '$telefono')";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
    
    public function eliminar($id){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM cliente WHERE id = $id";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscarPorNombre($nombre){
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM cliente WHERE nombre = '$nombre'";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }
}