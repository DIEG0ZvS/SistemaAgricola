<?php

require_once "modelos/Usuario.php";

class UsuarioController {

    public function guardar(String $nombre, String $correo, String $clave) {
        $usuario = new Usuario();
        return $usuario->guardar($nombre, $correo, $clave);
    }

    public function login(String $correo, String $clave) {
        $usuario = new Usuario();
        $respuesta = $usuario->validarUsuario($correo);

        $contador = 0;
        $claveBd = null;

        foreach ($respuesta as $fila) {
            $claveBd = $fila["clave"];
            $id = $fila["id"];
            $nombre = $fila["nombre"];
            $contador++;
        }

        if ($contador > 0) {
            if ($claveBd != null && password_verify($clave, $claveBd)) {
                session_start();
                $_SESSION["id"] = $id;
                $_SESSION["nombre"] = $nombre;
                header("Location: home.php");
                exit();
            } else {
                echo "Correo y/o clave incorrectos";
            }
        } else {
            echo "Correo y/o clave incorrectos";
        }
    }
}
