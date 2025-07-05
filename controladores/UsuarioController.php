<?php

require_once "modelos/Usuario.php";

class UsuarioController{
    public function guardar(array $datos){
        $usuario = new Usuario();
        $resultado = $usuario->guardar(
            $datos["nombre"], 
            $datos["correo"], 
            password_hash($datos["clave"], PASSWORD_DEFAULT)
        );
        if($resultado!=0){
            return "Usuario guardado correctamente";
        }else{
            return "Error al guardar el usuario";
        }
    }

    public function buscar($id){
        $usuario = new Usuario();
        return $usuario->buscar($id);
    }

    public function mostrar(){
        $usuario = new Usuario();
        return $usuario->mostrar();
    }

    public function eliminar($id){
        $usuario = new Usuario();
        $resultado = $usuario->eliminar($id);
        if($resultado!=0){
            return "location: verUsuarios.php";
        }else{
            return "Error: no se eliminó el usuario";
        }
    }

    public function actualizar(array $datos){
        $usuario = new Usuario();
        $resultado = $usuario->actualizar(
            $datos["nombre"],
            $datos["correo"],
            $datos["id"]
        );
        if($resultado!= 0){
            header("location: verClientes.php");
        }else{
            return "Error al actualizar el usuario";
        }
    }

    public function login(String $correo, String $clave){
        $usuario = new Usuario();
        $resultado = $usuario->buscarPorCorreo($correo);
        $claveDb = "";
        $nombre = "";
        $id = "";
        $contador = 0;
        foreach($resultado as $userLogin){
            $claveDb = $userLogin["clave"];
            $nombre = $userLogin["nombre"];
            $id = $userLogin["id"];
            $contador++;
        }
        if($contador!=0){
            if(password_verify($clave, $claveDb)){
                session_start();
                $_SESSION["nombre"] = $nombre;
                $_SESSION["id"] = $id;
                header("location: verUsuarios.php");
            }else{
                return "Error: contraseña incorrecta";
            }
        }else{
            return "Error al iniciar sesión";
        }
    }
}