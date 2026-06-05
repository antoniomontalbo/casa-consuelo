<?php

    session_start();

    if(!isset($_SESSION["rol"]) || $_SESSION["rol"] != "admin"){
        header("Location: login_view.php");
        exit();
    }

    include("../php/conexion.php");
    include("../model/configuracion_model.php");

    $configuracion = new Configuracion($conexion);

    $config = $configuracion->obtenerConfiguracion();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Configuración Web</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../responsive.css">
</head>

<body>

<div class="contenedor-admin">
    <h1>Configuración Web</h1>

    <form action="../controller/admin_controller.php" method="POST">

        <input type="hidden" name="guardar_configuracion" value="1">

        <table class="tabla-admin">
            <tr>
                <th colspan="2">
                    Información General
                </th>
            </tr>

            <tr>
                <td>Dirección</td>
                <td>
                    <input type="text" name="direccion" value="<?php echo $config["direccion"]; ?>" required>
                </td>
            </tr>

            <tr>
                <td>Localidad</td>
                <td>
                    <input type="text" name="localidad" value="<?php echo $config["localidad"]; ?>" required>
                </td>
            </tr>

            <tr>
                <td>Teléfono</td>
                <td>
                    <input type="text" name="telefono" value="<?php echo $config["telefono"]; ?>" required>
                </td>
            </tr>

            <tr>
                <td>Email</td>
                <td>
                    <input type="email" name="email" value="<?php echo $config["email"]; ?>" required>
                </td>
            </tr>

            <tr>
                <th colspan="2">
                    Reservas
                </th>
            </tr>

            <tr>
                <td>Precio base</td>
                <td>
                    <input type="number" name="precio_base" value="<?php echo $config["precio_base"]; ?>" required>
                </td>
            </tr>
              <br>
            <tr>
                <th colspan="2">
                    Diseño Web
                </th>
            </tr>

            <tr>
                <td>Color principal</td>
                <td>
                    <input type="color" name="color_web" value="<?php echo $config["color_web"]; ?>">
                </td>
            </tr>

            <tr>
                <td>Fuente</td>
                <td>
                    <input type="text" name="fuente_web" value="<?php echo $config["fuente_web"]; ?>">
                </td>
            </tr>

            <tr>
                <td>Tamaño fuente</td>
                <td>
                    <input type="number" name="tamano_fuente" value="<?php echo $config["tamano_fuente"]; ?>">
                </td>
            </tr>

        </table>

        <br>

        <button type="submit" class="boton-panel">Guardar cambios</button>

    </form>

    <br><br>

    <a href="panel_view.php" class="volver-panel">Volver al panel</a>

</div>
</body>

</html>