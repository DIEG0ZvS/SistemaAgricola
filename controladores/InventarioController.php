<?php
require_once "modelos/Inventario.php";

class InventarioController {
    public function mostrar() {
        $inv = new Inventario();
        return $inv->mostrar();
    }
}
