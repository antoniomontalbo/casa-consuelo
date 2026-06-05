<?php

session_start();

include("../php/conexion.php");
include("../model/resena_model.php");

$resena = new Resena($conexion);

$resenas = $resena->obtenerResenas();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reseñas</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../responsive.css"  media="screen and (max-width: 768px)">
</head>

<body>

    <div class="contenedor-admin">
        <h1>Reseñas</h1>

        <table class="tabla-admin">
            <tr>
                <th>Nombre</th>
                <th>Comentario</th>
                <th>Valoración</th>
                <th>Fecha</th>
                <th>Eliminar</th>
            </tr>

            <?php foreach($resenas as $fila){ ?>

            <tr>
                <td><?php echo $fila["nombre"]; ?></td>
                <td><?php echo $fila["comentario"]; ?></td>
                <td><?php echo $fila["valoracion"]; ?>/10</td>
                <td><?php echo $fila["fecha"]; ?></td>
                <td>
                    <a class="boton-eliminar" href="../controller/admin_controller.php?eliminar_resena=<?php echo $fila["id"]; ?>">Eliminar</a>
                </td>
            </tr>

            <?php } ?>
        </table>

        <a href="panel_view.php" class="volver-panel">Volver al panel</a>
    </div>

</body>

</html>