<?php
require_once "controladores/DistribucionController.php";

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $dc = new DistribucionController();
    $dc->eliminar($id);
    header("Location: verDistribucion.php");
}
?>