<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login administrador</title>
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../responsive.css"  media="screen and (max-width: 768px)">
</head>

<body>
    <div class="login-admin">

        <h1>Panel Administrador</h1>

        <form action="comprobar_login.php" method="POST">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
        </form>

        <div class="contenedor-volver">
            <a href="../index.php" class="volver-inicio">Volver al inicio</a>
        </div>
    </div>

</body>

</html>