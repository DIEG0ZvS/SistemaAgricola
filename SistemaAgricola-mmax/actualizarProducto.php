<?php
    require_once "auth.php";
    require_once "controladores/ProductoController.php";
    require_once "layouts/header.php";
    if(!empty($_GET)){
        $id = $_GET["id"];
    }else{
        $id = $_POST["id"];
    }
    $pc = new ProductoController();
    $producto = $pc->buscar($id);
    $nombre = $producto["nombre"];
    $categoria = $producto["categoria"];
    $precio = $producto["precio"];
?>
<h1 class="mt-4">Actualizar Producto</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?=$nombre; ?>"><br>
    <input class="form-control" type="text" name="categoria" placeholder="Categoría" value="<?=$categoria; ?>"><br>
    <input class="form-control" type="number" step="0.01" name="precio" placeholder="Precio" value="<?=$precio; ?>"><br>
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="submit" value="Actualizar" class="btn btn-primary"><br>
</form>
<?php
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $pc->actualizar($_POST);
        header("Location: verProducto.php");
    }
?>
