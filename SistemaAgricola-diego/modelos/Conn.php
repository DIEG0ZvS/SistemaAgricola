<?php

class Conn {

    private $dsn;
    private $usuario;
    private $pass;
    private $conexion;

    public function __construct()
    {
        // Cambiado a la base de datos correcta
        $this->dsn = "mysql:host=localhost;dbname=sistema_ventas;charset=utf8mb4";
        $this->usuario = "root";
        $this->pass = "";  // asegúrate que sea tu contraseña correcta
    }

    public function conectar() {
        try {
            $this->conexion = new PDO($this->dsn, $this->usuario, $this->pass);
            // Opcional: activar modo de errores
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conexion;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function cerrar() {
        $this->conexion = null;
    }
}
