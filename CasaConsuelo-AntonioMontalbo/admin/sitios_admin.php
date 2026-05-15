<?php
    include("comprobar_admin.php");
    include("../php/conexion.php");

    $sql = "SELECT * FROM sitios_cercanos ORDER BY id DESC";

    $resultado = mysqli_query($conexion, $sql);
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

        <form action="subir_sitio.php" method="POST" enctype="multipart/form-data" class="form-sitio">
            <input type="text" name="nombre" placeholder="Nombre del sitio" required>
            <textarea name="descripcion" placeholder="Descripción" required></textarea>
            <input type="file" name="imagen" required>
            <button type="submit" class="boton-reserva">Añadir sitio</button>
        </form>

        <table class="tabla-admin">

            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Eliminar</th>
            </tr>

            <?php while($fila = mysqli_fetch_assoc($resultado)) { ?>

            <tr>
                <td>
                    <img src="../img/<?php echo $fila["imagen"]; ?>" width="250">
                </td>

                <td>
                    <?php echo $fila["nombre"]; ?>
                </td>

                <td>
                    <a href="eliminar_sitio.php?id=<?php echo $fila["id"]; ?>" class="boton-eliminar">Eliminar</a>
                </td>
            </tr>

            <?php } ?>
        </table>

        <a href="panel.php" class="volver-panel">Volver al panel</a>
    </div>

</body>

</html>