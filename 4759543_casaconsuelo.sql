-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb1032.awardspace.net
-- Tiempo de generación: 15-05-2026 a las 18:47:36
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `4759543_casaconsuelo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `usuario`, `contrasena`) VALUES
(1, 'casaconsuelo', 'casaconsuelo20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `dni` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `dni`, `email`, `telefono`) VALUES
(1, 'Antonio ', NULL, 'antoniomontalbo23@gmail.com', '678901234'),
(2, 'Hugo', '06578912M', 'hugo@hotmail.es', '654321689'),
(3, 'Hugo', '06578912M', 'hugo@hotmail.es', '654321689'),
(4, 'Hugo', '06578912M', 'hugo@gmail.com', '678901234'),
(5, 'Antonio ', '05432607F', 'antoniomontalbo23@gmail.com', '654321098'),
(6, 'Juan Pérez', '05432607F', 'juan.perez@example.com', '678901234'),
(7, 'Juan Pérez', '05432607F', 'juan.perez@example.com', '654327890'),
(8, 'Hugo', '06578912M', 'hugo@hotmail.es', '654321098'),
(9, 'Natalia Jimenez', '09876543A', 'natalia@example.es', '687903245'),
(10, 'Alvaro Rodriguez', '06901265D', 'alvaro.rodriguez@gmail.com', '690213456'),
(11, 'Juan Pérez', '05432607F', 'juan.perez@example.com', '678901234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id_configuracion` int NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `localidad` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id_configuracion`, `direccion`, `localidad`, `telefono`, `email`) VALUES
(0, 'C/Pajuderos Nï¿½12B', 'Torralba, Cuenca', '680 40 86 68', 'casaconsuelo2020@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mensaje` text COLLATE utf8mb4_general_ci,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `email`, `mensaje`, `fecha`) VALUES
(2, 'Antonio Montalbo Canales', 'antoniomontalbo23@gmail.com', 'Quería saber de cuantas habitaciones dispone la casa, somos 10 personas', '2026-05-12'),
(3, 'Juan Pérez', 'juan.perez@example.com', 'Muy buenas, quería saber si pueden entrar mascotas a las instalaciones de la casa.', '2026-05-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `imagen`) VALUES
(1, 'salon1.jpg'),
(2, 'salon2.jpg'),
(3, 'salon3.jpg'),
(4, 'salon4.jpg'),
(5, 'hab1.jpg'),
(6, 'hab2.jpg'),
(7, 'hab3.jpg'),
(8, 'hab4.jpg'),
(9, 'bano1.jpg'),
(10, 'bano2.jpg'),
(11, 'bano3.jpg'),
(12, 'bano4.jpg'),
(13, 'exterior1.jpg'),
(14, 'exterior2.jpg'),
(15, 'exterior3.jpg'),
(19, 'exterior4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resena`
--

CREATE TABLE `resena` (
  `id` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `comentario` text COLLATE utf8mb4_general_ci,
  `valoracion` decimal(11,0) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `resena`
--

INSERT INTO `resena` (`id`, `nombre`, `comentario`, `valoracion`, `fecha`) VALUES
(5, 'Natalia Jimenez', 'Los dueños de la casa son encantadores.\r\nLa casa es muy amplía y cómoda, está muy limpia y nueva.\r\nFuimos un grupo de amigos con niños y lo pasamos...”', 10, '2026-05-14'),
(7, 'Paula', 'Una estancia increÃ­ble en Casa Rural Consuelo. La casa estÃ¡ muy cuidada, limpia y equipada con todo lo necesario para pasar unos dÃ­as perfectos. El entorno es tranquilo y ideal para desconectar, y la atenciÃ³n recibida fue excelente desde el primer momento. Sin duda, un lugar totalmente recomendable para disfrutar en familia o con amigos.', 10, '2026-05-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` int NOT NULL,
  `f_entrada` date NOT NULL,
  `f_salida` date NOT NULL,
  `personas` int NOT NULL,
  `precio` decimal(8,2) DEFAULT NULL,
  `id_cliente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id`, `f_entrada`, `f_salida`, `personas`, `precio`, `id_cliente`) VALUES
(8, '2026-06-04', '2026-06-07', 7, 525.00, 8),
(9, '2026-05-29', '2026-06-01', 8, 600.00, 9),
(10, '2026-06-11', '2026-06-14', 8, 600.00, 10),
(11, '2026-05-21', '2026-05-24', 7, 525.00, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitios_cercanos`
--

CREATE TABLE `sitios_cercanos` (
  `id` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci,
  `imagen` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sitios_cercanos`
--

INSERT INTO `sitios_cercanos` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Nacimiento del Rio Cuervo', 'Nace junto a la localidad conquense de Vega del Codorno, \r\n                        concretamente en la falda occidental de la Muela de San \r\n                        Felipe, a unos 1469 metros de altitud, es un sitio \r\n                        precioso para visitar dentro de nuestra zona.', 'sitio1.jpg'),
(2, 'Ciudad Encantada', 'Es un espectacular paisaje kárstico en la Serranía de Cuenca, \r\n                        famoso por sus formaciones rocosas de piedra caliza \r\n                        esculpidas por la erosión del agua, el viento y el hielo \r\n                        durante millones de años, creando figuras que parecen animales, \r\n                        personas y objetos.', 'sitio2.jpg'),
(3, 'Ruta de las Caras', 'Es un sendero circular y gratuito, famoso por sus más de 20 esculturas \r\ny bajorrelieves tallados directamente en la roca arenisca por los \r\nartistas Eulogio Reguillo y Jorge J. Maldonado, inspirados en figuras \r\ndiversas (budistas, templarias, mitológicas, Beethoven) y que ofrecen \r\nuna experiencia artística y natural junto al pantano de Buendía.', 'sitio3.jpg'),
(4, 'Vía Ferrata de Priego', 'Se encuentra en la Serranía de Cuenca, es un itinerario de aventura equipado \r\ncon grapas, peldaños y puentes (monos y tibetanos) para progresar \r\npor paredes verticales y horizontales con total seguridad, \r\nofreciendo espectaculares vistas de la Hoz del río Escabas y \r\npermitiendo disfrutar de la verticalidad sin necesidad de ser \r\nescalador experto.', 'sitio4.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id_configuracion`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resena`
--
ALTER TABLE `resena`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `sitios_cercanos`
--
ALTER TABLE `sitios_cercanos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `resena`
--
ALTER TABLE `resena`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `sitios_cercanos`
--
ALTER TABLE `sitios_cercanos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
