<?php

require_once "modelos/Cliente.php";

class ClienteController{
    public function guardar(array $datos){
        $cliente = new Cliente();
        $resultado = $cliente->guardar(
            $datos["nombre"],
            $datos["direccion"],
            $datos["telefono"]
        );
        if($resultado!=0){
            return "Cliente guardado correctamente";
        }else{
            return "Error al guardar el cliente";
        }
    }

    public function buscar($id){
        $cliente = new Cliente();
        return $cliente->buscar($id);
    }

    public function mostrar(){
        $cliente = new Cliente();
        return $cliente->mostrar();
    }

    public function eliminar($id){
        $cliente = new Cliente();
        $resultado = $cliente->eliminar($id);
        if($resultado!=0){
            return "location: verCliente.php";
        }else{
            return "Error: no se eliminó el cliente";
        }
    }

    public function actualizar(array $datos){
        $cliente = new Cliente();
        $resultado = $cliente->actualizar(
            $datos["nombre"],
            $datos["direccion"],
            $datos["telefono"],
            $datos["id"]
        );
        if($resultado!= 0){
            header("location: verCliente.php");
        }else{
            return "Error al actualizar el cliente";
        }
    }
}