<?php

require_once "modelos/Distribucion.php";

class DistribucionController{
    public function guardar(array $datos){
        $distribucion = new Distribucion();
        $resultado = $distribucion->guardar(
            $datos["pedidoId"], 
            $datos["nomMerc"], 
        );
        if($resultado!=0){
            return "Distribución guardada correctamente";
        }else{
            return "Error al guardar la distribución";
        }
    }

    public function buscar($id){
        $distribucion = new Distribucion();
        return $distribucion->buscar($id);
    }

    public function mostrar(){
        $distribucion = new Distribucion();
        return $distribucion->mostrar();
    }

    public function eliminar($id){
        $distribucion = new Distribucion();
        $resultado = $distribucion->eliminar($id);
        if($resultado!=0){
            return "location: verDistribucion.php";
        }else{
            return "Error: no se eliminó la distribución";
        }
    }

    public function actualizar(array $datos){
    $distribucion = new Distribucion();
    $resultado = $distribucion->actualizar(
        $datos["pedidoId"],
        $datos["nomMerc"],
        $datos["id"]
    );
    if($resultado != 0){
        header("location: verDistribucion.php");
    } else {
        return "Error al actualizar la distribución";
    }
}
}