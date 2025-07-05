<?php

class Conn{

    private $dsn;
    private $usuario;
    private $pass;
    private $conexion;

    public function __construct()
    {
<<<<<<< HEAD
        $this->dsn = "mysql:host=localhost;dbname=sistema";
=======
        $this->dsn = "mysql:host=localhost;dbname=agricola";
>>>>>>> 69d373e42b3a1fb8bb4c8b2d38f0382447560222
        $this->usuario = "root";
        $this->pass = "";
    }

    public function conectar(){
        $this->conexion = new PDO($this->dsn, $this->usuario, $this->pass);
        return $this->conexion;
    }

    public function cerrar(){
        $this->conexion = NULL;
    }


}