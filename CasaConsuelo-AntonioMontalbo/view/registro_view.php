<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="../estilos.css">
</head>

<body>

    <div class="login-admin">

        <h1>Registro Cliente</h1>

        <form action="../controller/usuario_controller.php" method="POST" onsubmit="return validarRegistro()">
            <input type="text" id="nombreRegistro" name="nombre" placeholder="Nombre" required>
            <input type="email" id="emailRegistro" name="email" placeholder="Email" required>
            <input type="password" id="contrasenaRegistro" name="contrasena" placeholder="Contraseña" required>
            <input type="text" id="telefonoRegistro" name="telefono" placeholder="Teléfono"required>
            <button type="submit" name="registrar">Registrarse</button>
        </form>

</div>
    <script src="../js/validaciones.js"></script>
</body>

</html>