<?php
    include("../admin/comprobar_admin.php");
    include("../php/conexion.php");

    $sql = "SELECT * FROM configuracion WHERE id_configuracion = 0";

    $resultado = mysqli_query($conexion, $sql);

    $config = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración web</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../responsive.css"  media="screen and (max-width: 768px)">
</head>

<body>

<div class="contenedor-admin">

    <h1>Configuración web</h1>

    <br><br>

    <form action="guardar_configuracion.php" method="POST" class="form-sitio">
        <label>Dirección</label>
        <input type="text" name="direccion" value="<?php echo $config["direccion"]; ?>" required>
        <label>Localidad</label>
        <input type="text" name="localidad" value="<?php echo $config["localidad"]; ?>" required>
        <label>Teléfono</label>
        <input type="text" name="telefono" value="<?php echo $config["telefono"]; ?>" required>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $config["email"]; ?>" required>

        <button type="submit" class="boton-panel">Guardar cambios</button>
    </form>

    <br>

    <a href="panel.php" class="volver-panel">Volver al panel</a>

</div>

</body>
</html>