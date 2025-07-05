<?php
    require_once "controladores/ClienteController.php";
    require_once "layouts/header.php";

    $cc = new ClienteController();
    $clientes = $cc->mostrar();
?>
<a class="btn btn-danger" href="logout.php">Salir</a>
<h1 class="mt-4"> Clientes del Sistema</h1>
<table class="table">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
<?php
    foreach($clientes as $cliente){
        echo "<tr>
                <td>" .$cliente["nombre"]. "</td>
                <td>" .$cliente["direccion"]. "</td>
                <td>" .$cliente["telefono"]. "</td>
                <td><a href='eliminarUsuario.php?id=".$cliente["id"]."' class='btn btn-sm btn-outline-danger'>Eliminar</a></td>
                <td><a href='actualizarUsuario.php?id=".$cliente["id"]."' class='btn btn-sm btn-outline-warning'>Actualizar</a></td>
            </tr>";
    }
?>
    </tbody>
</table>
<a href="registrarCliente.php" class="btn btn-primary">Registrar Cliente</a>
<?php
require_once "layouts/footer.php";
//dsdsdsdsd