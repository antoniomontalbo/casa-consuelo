<?php
    include("comprobar_admin.php");
    include("../php/conexion.php");

    $id = $_GET["id"];

    $sql = "DELETE FROM galeria WHERE id = $id";

    mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Eliminar imagen</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../responsive.css"  media="screen and (max-width: 768px)">
    <meta http-equiv="refresh" content="2;url=galeria_admin.php">
</head>

<body>
    <div class="mensaje-correcto">
        Imagen eliminada correctamente
    </div>
</body>

</html>