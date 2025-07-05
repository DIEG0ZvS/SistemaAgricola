<?php
require_once "controladores/ClienteController.php";

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $uc = new ClienteController();
    $uc->eliminar($id);
    header("Location: verUsuarios.php");
}