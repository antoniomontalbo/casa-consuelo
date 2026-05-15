<?php
    include("comprobar_admin.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel administrador</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../responsive.css"  media="screen and (max-width: 768px)">
</head>

<body>
    <div class="panel-admin">

        <h1>Panel de Administración</h1>
        <p>Bienvenido <?php echo $_SESSION["admin"]; ?></p>

        <div class="menu-admin">
            <a href="configuracion.php" class="boton-panel">Configuración web</a>
            <a href="galeria_admin.php" class="boton-panel">Gestionar galería</a>
            <a href="sitios_admin.php" class="boton-panel">Gestionar sitios cercanos</a>
            <a href="mensajes.php" class="boton-panel">Gestionar mensajes</a>
            <a href="resenas_admin.php" class="boton-panel">Gestionar reseñas</a>
            <a href="reservas_admin.php" class="boton-panel">Gestionar reservas</a>
            <a href="logout.php" class="boton-panel">Cerrar sesión</a>
        </div>
    </div>
</body>

</html>