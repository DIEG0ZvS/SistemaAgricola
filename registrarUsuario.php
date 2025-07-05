<h1>Registrar Usuario</h1>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
    <input type="text" name="nombre" placeholder="Nombre"/><br>
    <input type="email" name="correo" placeholder="Correo"/><br>
    <input type="password" name="clave" placeholder="Clave"/><br>
    <label for="rol">Rol:</label>
    <select name="rol" id="rol">
        <option value="empleado">Empleado</option>
        <option value="vendedor">Vendedor</option>
        <option value="administrador">Administrador</option>
    </select><br>
    <input type="submit" value="Guardar"/>
</form>

<?php

if (!empty($_POST)) {
    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"]);
    $clave = trim($_POST["clave"]);
    $rol = trim($_POST["rol"]);

    $contadorErrores = 0;

    if ($nombre == "") {
        echo "Complete el campo Nombre<br>";
        $contadorErrores++;
    }

    if ($correo == "") {
        echo "Complete el campo Correo<br>";
        $contadorErrores++;
    } else {
        $patron = "/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/";
        if (!preg_match($patron, $correo)) {
            echo "Debe ingresar un correo válido<br>";
            $contadorErrores++;
        }
    }

    if ($clave == "" || strlen($clave) < 6 || strlen($clave) > 12) {
        echo "La clave debe tener entre 6 y 12 caracteres<br>";
        $contadorErrores++;
    }


    if ($contadorErrores == 0) {
        require_once "controladores/UsuarioController.php";
        $uc = new UsuarioController();
        $respuesta = $uc->guardar($nombre, $correo, $clave, $rol);
        if ($respuesta) {
            echo "Usuario creado exitosamente";
        } else {
            echo "Error al crear el usuario";
        }
    }
}

?>