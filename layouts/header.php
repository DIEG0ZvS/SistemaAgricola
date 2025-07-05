<?php
$archivoActual = basename($_SERVER['PHP_SELF']);
$ocultarSidebar = (
    $archivoActual === 'actualizarProducto.php' ||
    $archivoActual === 'actualizarPedido.php' ||
    $archivoActual === 'actualizarUsuario.php' ||
    $archivoActual === 'actualizarDistribucion.php'
);
?>
<style>
<?php if ($ocultarSidebar): ?>
#sidebar { display: none !important; }
#main-content { margin-right: 0 !important; }
<?php endif; ?>
#sidebar {
    width: 200px;
    height: 100vh;
    position: fixed;
    right: 0; /* Cambiado de left: 0; a right: 0; */
    top: 0;
    background: #f8f9fa;
    padding-top: 60px;
    box-shadow: -2px 0 5px rgba(0,0,0,0.05); /* Sombra a la izquierda */
    z-index: 1000;
}
#sidebar button {
    width: 90%;
    margin: 10px 5%;
    display: block;
}
#main-content {
    margin-right: 210px; /* Cambiado de margin-left a margin-right */
    padding: 20px;
}
</style>

<div id="sidebar">
    <button id="btnUsuarios" onclick="mostrarBoton('btnUsuarios')"
        class="btn btn-primary" onclick="location.href='verUsuarios.php'">Ver Usuarios</button>
    <button id="btnProductos" onclick="mostrarBoton('btnProductos')"
        class="btn btn-success" onclick="location.href='verProductos.php'">Ver Productos</button>
    <button id="btnPedidos" onclick="mostrarBoton('btnPedidos')"
        class="btn btn-warning" onclick="location.href='verPedidos.php'">Ver Pedidos</button>
    <button id="btnDistribuciones" onclick="mostrarBoton('btnDistribuciones')"
        class="btn btn-secondary" onclick="location.href='verDistribuciones.php'">Ver Distribuciones</button>
</div>

<script>
function mostrarBoton(id) {
    // Mostrar todos los botones
    document.getElementById('btnUsuarios').style.display = 'block';
    document.getElementById('btnProductos').style.display = 'block';
    document.getElementById('btnPedidos').style.display = 'block';
    document.getElementById('btnDistribuciones').style.display = 'block';
    // Ocultar el botón clickeado
    document.getElementById(id).style.display = 'none';
    // Redirigir según el botón
    if(id === 'btnUsuarios') window.location.href = 'verUsuarios.php';
    if(id === 'btnProductos') window.location.href = 'verProducto.php';
    if(id === 'btnPedidos') window.location.href = 'verPedido.php';
    if(id === 'btnDistribuciones') window.location.href = 'verDistribucion.php'
}
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">