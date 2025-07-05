<?php
require_once "controladores/UsuarioController.php";

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $uc = new UsuarioController();
    $uc->eliminar($id);
    header("Location: verUsuarios.php");
}