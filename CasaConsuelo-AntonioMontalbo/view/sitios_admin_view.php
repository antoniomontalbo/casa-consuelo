<?php

session_start();

if(!isset($_SESSION["rol"]) || $_SESSION["rol"] != "admin"){
    header("Location: login_view.php");
    exit();
}

include("../php/conexion.php");
include("../model/sitio_model.php");

$sitio = new Sitio($conexion);
$sitios = $sitio->obtenerSitios();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gestionar sitios</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../responsive.css"  media="screen and (max-width: 768px)">
</head>

<body>
    <div class="contenedor-admin">
        <h1>Gestionar sitios cercanos</h1>

        <form action="../controller/admin_controller.php" method="POST" enctype="multipart/form-data" class="form-sitio">
            <input type="hidden" name="guardar_sitio" value="1">
            <input type="text" name="nombre" placeholder="Nombre del sitio" required>
            <textarea name="descripcion" placeholder="Descripción" required></textarea>
            <input type="file" name="imagen" required>
            <button type="submit" class="boton-reserva">Añadir sitio</button>
        </form>

        <table class="tabla-admin">

            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>

            <?php foreach($sitios as $fila) { ?>

            <tr>
                <td>
                    <img src="../img/<?php echo $fila["imagen"]; ?>" width="250">
                </td>

                <td>
                    <?php echo $fila["nombre"]; ?>
                </td>
                <td>
                    <form action="../controller/admin_controller.php" method="POST">
                        <input type="hidden" name="modificar_sitio" value="1">
                        <input type="hidden" name="id" value="<?php echo $fila["id"]; ?>">
                        <input type="text" name="nombre" value="<?php echo $fila["nombre"]; ?>">
                        <br><br>
                        <textarea name="descripcion"><?php echo $fila["descripcion"]; ?></textarea>
                        <br><br>
                        <button type="submit" class="boton-panel">Guardar</button>
                    </form>
                </td>
                <td>
                    <a href="../controller/admin_controller.php?eliminar_sitio=<?php echo $fila["id"]; ?>" class="boton-eliminar">
                        Eliminar
                    </a>
                </td>
            </tr>

            <?php } ?>
        </table>

        <a href="panel_view.php" class="volver-panel">Volver al panel</a>
    </div>

</body>

</html>