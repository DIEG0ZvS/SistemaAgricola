<?php
    require_once "controladores/ClienteController.php";
    require_once "layouts/header.php";
    if(!empty($_GET)){
        $id = $_GET["id"];
    }else{
        $id = $_POST["id"];
    }
    $cc = new ClienteController();
    $clientes = $cc->buscar($id);
    foreach ($clientes as $cliente){
        $nombre = $cliente["nombre"];
        $direccion = $cliente["direccion"];
        $telefono = $cliente["telefono"];
    }
?>
<h1 class="mt-4">Actualizar Cliente</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?=$nombre; ?>"><br>
    <input class="form-control" type="text" name="direccion" placeholder="Dirección" value="<?=$direccion; ?>"><br>
    <input class="form-control" type="text" name="telefono" placeholder="Teléfono" value="<?=$telefono; ?>"><br>
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="submit" value="Actualizar" class="btn btn-primary"><br>
</form>
<?php
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $cc->actualizar($_POST);
        header("Location: verUsuarios.php");
    }