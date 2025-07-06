<?php
session_start();
include_once "layouts/header.php";

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}
?>