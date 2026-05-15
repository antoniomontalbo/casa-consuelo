<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Consuelo</title>

    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="./responsive.css"  media="screen and (max-width: 768px)">    
</head>
<body>
    <header role="banner" aria-label="Cabecera del estilo web">
        <div class="cabecera-contenido">
            <img src="img/logo.png" alt="Casa Consuelo" class="logo-cabecera">
            <h1>Casa Consuelo</h1>
        </div>

        <nav role="navigation" aria-label="Menú principal">
            <ul class="menu-principal">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="galeria.php">Galería</a></li>
                <li><a href="sitios.php">Sitios cercanos</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="reservas.php">Reservas</a></li>
            </ul>
        </nav>
    </header>

    <main role="main" aria-label="Contenido principal">
        <section class="principal">

            <div class="galeria">

                <div class="menu-galeria">
                    <ul class="menu-principal">
                        <li><a href="galeria.php">Galería</a></li>
                        <li><a href="galeria-hab.php">Habitaciones</a></li>
                        <li><a href="galeria-banos.php">Baños</a></li>
                        <li><a href="galeria-salon.php">Salón</a></li>
                        <li><a href="galeria-exterior.php">Exterior</a></li>
                    </ul>
                </div>
                <div class="galeria-grid galeria-baños" aria-label="Galería de imágenes">
                    <img src="img/bano1.jpg" alt="Baño">
                    <img src="img/bano2.jpg" alt="Baño">
                    <img src="img/bano3.jpg" alt="Baño">
                    <img src="img/bano4.jpg" alt="Baño">
                </div>
            </div>

        </section>
    </main>

    <footer role="contentinfo" aria-label="Pie de página">
        <p>"Un rincón de tranquilidad en Torralba"</p>
    </footer>
</body>
</html>