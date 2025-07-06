<?php

require_once "modelos/Usuario.php";

class UsuarioController {

    public function guardar(array $datos) {
        $usuario = new Usuario();
        $resultado = $usuario->guardar(
            $datos["nombre"], 
            $datos["correo"], 
            password_hash($datos["clave"], PASSWORD_DEFAULT)
        );
        return $resultado != 0 ? "Usuario guardado correctamente" : "Error al guardar el usuario";
    }

    
    public function buscar($id) {
        $usuario = new Usuario();
        return $usuario->buscar($id);
    }

    public function mostrar() {
        $usuario = new Usuario();
        return $usuario->mostrar();
    }

    public function eliminar($id) {
        $usuario = new Usuario();
        $resultado = $usuario->eliminar($id);
        if ($resultado != 0) {
            header("Location: verUsuarios.php");
            exit();
        } else {
            $_SESSION['login_error'] = "No se pudo eliminar el usuario.";
            header("Location: verUsuarios.php");
            exit();
        }
    }

    public function actualizar(array $datos) {
        $usuario = new Usuario();
        $resultado = $usuario->actualizar(
            $datos["nombre"],
            $datos["correo"],
            $datos["id"]
        );
        if ($resultado != 0) {
            header("Location: verUsuarios.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Error al actualizar el usuario.";
            header("Location: verUsuarios.php");
            exit();
        }
    }

    public function login(String $correo, String $clave) {
        $usuario = new Usuario();
        $resultado = $usuario->buscarPorCorreo($correo);

        if (!empty($resultado)) {
            foreach ($resultado as $userLogin) {
                // Comparación directa para contraseñas en texto plano
                if ($clave === $userLogin["clave"]) {
                    session_start();
                    $_SESSION["nombre"] = $userLogin["nombre"];
                    $_SESSION["id"] = $userLogin["id"];
                    unset($_SESSION['login_error']);
                    header("Location: verUsuarios.php");
                    exit();
                }
            }
            session_start();
            $_SESSION['login_error'] = "Contraseña incorrecta.";
            header("Location: login.php");
            exit();
        } else {
            session_start();
            $_SESSION['login_error'] = "Usuario no encontrado.";
            header("Location: login.php");
            exit();
        }
    }
    
}
