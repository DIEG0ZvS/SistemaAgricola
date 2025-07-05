<?php
    require_once "controladores/PedidoController.php";
    require_once "layouts/header.php";
    if(!empty($_GET)){
        $id = $_GET["id"];
    }else{
        $id = $_POST["id"];
    }
    $pc = new PedidoController();
    $pedidos = $pc->buscar($id);
    foreach ($pedidos as $pedido){
        $cliente = $pedido["clienteId"];
        $fecha = $pedido["fecha"];
        $estado = $pedido["estado"];
    }
?>
<h1 class="mt-4">Actualizar Pedido</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <input class="form-control" type="text" name="clienteid" placeholder="Cliente" value="<?=$cliente; ?>"><br>
    <input class="form-control" type="text" name="fecha" placeholder="Fecha" value="<?=$fecha; ?>"><br>
    <input class="form-control" type="number" name="estado" placeholder="Estado" value="<?=$estado; ?>"><br>
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="submit" value="Actualizar" class="btn btn-primary"><br>
</form>
<?php
    require_once "layouts/footer.php";
    if(!empty($_POST)){
        $pc->actualizar($_POST);
        header("Location: verPedido.php");
    }
?>