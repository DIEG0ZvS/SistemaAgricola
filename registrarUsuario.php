<?php
    require_once "layouts/header.php";
?>
<h1>Registrar Cliente</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input class="form-control" type="text" name="nombre" placeholder="Nombre"><br>
    <input class="form-control" type="text" name="direccion" placeholder="Dirección"><br>
    <input class="form-control" type="text" name="telefono" placeholder="Teléfono"><br>
    <input type="submit" value="Guardar" class="btn btn-primary"><br>
</form>
<?php
    require_once "controladores/ClienteController.php";
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $cc = new ClienteController();
        echo $cc->guardar($_POST);
        header("Location: verCliente.php");
    }