<?php

    session_start();

    if(!isset($_SESSION["id"]) || $_SESSION["rol"] != "admin"){
        header("Location: ../view/login_view.php");
        exit();
    }

    include("../php/conexion.php");
    include("../model/contacto_model.php");

    $contacto = new Contacto($conexion);

    $pendientes = $contacto->contarPendientes();

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
        <p>Bienvenido</p>

        <div class="menu-admin">
            <a href="configuracion_view.php" class="boton-panel">Configuración web</a>
            <a href="galeria_admin_view.php" class="boton-panel">Gestionar galería</a>
            <a href="sitios_admin_view.php" class="boton-panel">Gestionar sitios cercanos</a>
            <a href="mensajes_view.php" class="boton-panel">Gestionar mensajes(<?php echo $pendientes; ?>)</a>
            <a href="resenas_admin_view.php" class="boton-panel">Gestionar reseñas</a>
            <a href="reservas_admin_view.php" class="boton-panel">Gestionar reservas</a>
            <a href="../index.php?pagina=inicio" class="boton-panel">Volver a la web</a>
            <a href="../controller/usuario_controller.php?logout=1" class="boton-panel">Cerrar sesión</a>
        </div>
    </div>
</body>

</html>