<?php
    require_once "controladores/DistribucionController.php";
    require_once "layouts/header.php";

    $dc = new DistribucionController();
    $distribuciones = $dc->mostrar();
?>
<a class="btn btn-danger" href="logout.php">Salir</a>
<h1 class="mt-4">Distribuciones del Sistema</h1>
<table class="table">
    <thead>
    <tr>
        <th>PedioID</th>
        <th>Nombre del mercado</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
<?php
    foreach($distribuciones as $distribucion){
        echo "<tr>
                <td>" . $distribucion["id"] . "</td>
                <td>" . $distribucion["nomMerc"] . "</td>
                <td><a href='eliminarDistribucion.php?id=" . $distribucion["id"] . "' class='btn btn-sm btn-outline-danger'>Eliminar</a></td>
                <td><a href='actualizarDistribucion.php?id=" . $distribucion["id"] . "' class='btn btn-sm btn-outline-warning'>Actualizar</a></td>
            </tr>";
    }
?>
    </tbody>
</table>
<a href="registrarDistribucion.php" class="btn btn-primary">Registrar Distribución</a>
<?php
require_once "layouts/footer.php";