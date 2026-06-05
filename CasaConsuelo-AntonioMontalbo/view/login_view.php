<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../responsive.css" media="screen and (max-width: 768px)">

</head>

<body>

    <div class="login-admin">
        <h1>Iniciar Sesión</h1>
        <?php
            if(isset($_GET["error"])){
            ?>
                <div class="mensaje-error">
                    Email o contraseña incorrectos
                </div>
            <?php
            }
        ?>

        <br>

        <form action="../controller/usuario_controller.php" method="POST">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button type="submit" name="login" class="boton-panel">Entrar</button>
        </form>

        <br>
        <div class="contenedor-volver">
            <a href="registro_view.php" class="boton-panel">Registrarse</a>
            <br><br>
            <a href="../index.php" class="volver-inicio">Volver al inicio</a>
        </div>

    </div>

</body>

</html>