<?php
    include("php/conexion.php");

    $sql = "SELECT * FROM sitios_cercanos";

    $resultado = mysqli_query($conexion, $sql);

    if(!$resultado) {
        die("Error en la consulta");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Consuelo</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="./responsive.css"  media="screen and (max-width: 768px)">

</head>

<body>
    <header>
        <div class="cabecera-contenido">
            <img src="img/logo.png" alt="Casa Consuelo" class="logo-cabecera">
            <h1>Casa Consuelo</h1>
            <a href="admin/login.php" class="boton-admin">Iniciar sesión</a>
        </div>

        <nav>
            <ul class="menu-principal">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="galeria.php">Galería</a></li>
                <li><a href="sitios.php">Sitios cercanos</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="reservas.php">Reservas</a></li>
            </ul>
        </nav>
    </header>


    <main>
        <section class="principal">

            <?php while($fila = mysqli_fetch_assoc($resultado)) { ?>
                <div class="sitio">
                    <img src="img/<?php echo $fila["imagen"]; ?>" alt="Sitio cercano">

                    <div class="descripcion">
                        <h2><?php echo $fila["nombre"]; ?></h2>
                        <p><?php echo $fila["descripcion"]; ?></p>
                    </div>
                </div>
            <?php } ?>
        </section>
    </main>

    <footer><p>"Un rincón de tranquilidad en Torralba"</p></footer>

</body>

</html>