<?php

require_once "modelos/Producto.php";

class ProductoController{
    public function guardar(array $datos){
        $producto = new Producto(
            $datos["nombre"],
            $datos["categoria"],
            $datos["precio"]
        );
        $resultado = $producto->guardar();
        if($resultado!=0){
            return "Producto guardado correctamente";
        }else{
            return "Error al guardar el producto";
        }
    }

    public function buscar($id){
        return Producto::encontrarPorId($id);
    }

    public function mostrar(){
        return Producto::obtenerTodos();
    }

    public function eliminar($id){
        $resultado = Producto::eliminar($id);
        if($resultado!=0){
            return "location: verProducto.php";
        }else{
            return "Error: no se eliminó el producto";
        }
    }

    public function actualizar(array $datos){
        $producto = new Producto(
            $datos["nombre"],
            $datos["categoria"],
            $datos["precio"]
        );
        $resultado = $producto->actualizar($datos["id"]);
        if($resultado!=0){
            header("location: verProducto.php");
        }else{
            return "Error al actualizar el producto";
        }
    }
}
