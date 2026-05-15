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
        <header role="banner" aria-label="Cabecera del estilo web">
                <div class="cabecera-contenido">
                    <img src="img/logo.png" alt="Casa Consuelo" class="logo-cabecera">
                    <h1>Casa Consuelo</h1>
                    <a href="admin/login.php" class="boton-admin">Iniciar sesión</a>
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
            <section class="index-principal">
                
                <div class="texto-inicio">
                    <br>
                    <p>
                        Casa Rural Consuelo se encuentra a solo 36 kilómetros
                        de Cuenca y ofrece un alojamiento en Torralba con
                        terraza y barbacoa, además de cocina compartida.
                        También ofrece buenas vista a este precioso paisaje
                        de la Alcarria Conquense.
                    </p>
                    <br><br>
                    <p>
                        En la zona en la que se encuentra la casa podemos visitar 
                        bonitos paisajes que nos dejan estos lugares y hacer
                        numerosas actividades en la naturaleza.
                    </p>
                </div>
                <div class="imagen-inicio">
                    <img src="img/casaConsuelo.png" alt="Casa Consuelo">
                </div>
            
            </section>
        </main>

        <footer role="contentinfo" aria-label="Pie de página">
            <p>"Un rincón de tranquilidad en Torralba"</p>
        </footer>
    </body>
</html>