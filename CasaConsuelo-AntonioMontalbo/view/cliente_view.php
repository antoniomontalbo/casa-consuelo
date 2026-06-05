<?php

session_start();

if(!isset($_SESSION["id"])){
    header("Location: login_view.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Área Cliente</title>
    <link rel="stylesheet" href="../estilos.css">
</head>

<body>

    <h1>Bienvenido <?php echo $_SESSION["nombre"]; ?></h1>

    <p>
        <a href="../index.php">Volver a la web</a>
    </p>

    <p>
        <a href="perfil_view.php">Mis reservas</a>
    </p>

    <p>
        <a href="../controller/usuario_controller.php?logout=1">Cerrar sesión</a>
    </p>

</body>

</html>