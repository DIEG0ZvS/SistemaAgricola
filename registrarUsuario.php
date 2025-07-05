<?php
    require_once "layouts/header.php";
?>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Registrar Cliente</h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <input class="form-control" type="text" name="nombre" placeholder="Nombre"><br>
                <input class="form-control" type="text" name="direccion" placeholder="Dirección"><br>
    <input class="form-control" type="text" name="telefono" placeholder="Teléfono"><br>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="verUsuarios.php" class="btn btn-secondary">Cancelar</a>
</form>
<?php
    require_once "controladores/ClienteController.php";
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $cc = new ClienteController();
        echo $cc->guardar($_POST);
        header("Location: verUsuarios.php");
    }