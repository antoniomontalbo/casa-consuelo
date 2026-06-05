-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2026 a las 22:00:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `casaconsuelo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL
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
(9, 'Natalia Jimenez', '09876543A', 'natalia@example.es', '687903245');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id_configuracion` int(11) NOT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `localidad` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `precio_base` int(10) NOT NULL,
  `color_web` varchar(10) NOT NULL,
  `fuente_web` varchar(50) NOT NULL,
  `tamano_fuente` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id_configuracion`, `direccion`, `localidad`, `telefono`, `email`, `precio_base`, `color_web`, `fuente_web`, `tamano_fuente`) VALUES
(0, 'C/Pajuderos N12B', 'Torralba, Cuenca', '680 40 86 67', 'casaconsuelo2020@gmail.com', 25, '#af8364', 'Open Sans', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `respuesta` varchar(255) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `email`, `mensaje`, `respuesta`, `estado`, `fecha`, `id_usuario`) VALUES
(4, 'Roberto', 'roberto@gmail.com', 'Se admiten mascotas??', 'No', 'respondido', '2026-05-31', 6),
(5, 'Roberto', 'roberto@gmail.com', 'Hay cafetera?', 'Si', 'respondido', '2026-06-04', 6),
(6, 'Juan', 'juan@example.com', 'Tiene mesa para comer en la terraza?', 'si', 'respondido', '2026-06-05', 7),
(7, 'Juan', 'juan@example.com', 'Se puede fumar?', 'No', 'respondido', '2026-06-05', 1),
(8, 'Roberto', 'roberto@gmail.com', 'Cuantas camas hay?', '7', 'respondido', '2026-06-05', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
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
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `valoracion` decimal(11,0) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `resena`
--

INSERT INTO `resena` (`id`, `nombre`, `comentario`, `valoracion`, `fecha`, `id_usuario`) VALUES
(5, 'Natalia Jimenez', 'Los dueños de la casa son encantadores.\r\nLa casa es muy amplía y cómoda, está muy limpia y nueva.\r\nFuimos un grupo de amigos con niños y lo pasamos...”', 10, '2026-05-14', 0),
(6, 'Roberto', 'La casa es encantadora.', 9, '2026-05-31', 6),
(8, 'Juan', 'La casa tiene todo lo necesario para disfrutar de una buena estancia', 9, '2026-06-05', 7),
(9, 'Roberto', 'Que bonita es la casa', 8, '2026-06-05', 1),
(10, 'Roberto', 'Espectacular', 8, '2026-06-05', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `f_entrada` date NOT NULL,
  `f_salida` date NOT NULL,
  `personas` int(11) NOT NULL,
  `precio` decimal(8,2) DEFAULT NULL,
  `estado` varchar(50) NOT NULL,
  `f_reserva` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id`, `f_entrada`, `f_salida`, `personas`, `precio`, `estado`, `f_reserva`, `id_usuario`) VALUES
(8, '2026-06-04', '2026-06-07', 7, 525.00, '', '0000-00-00', 8),
(9, '2026-05-29', '2026-06-01', 8, 600.00, '', '0000-00-00', 9),
(11, '2026-06-06', '2026-06-10', 10, 500.00, 'confirmada', '2026-05-31', 6),
(12, '2026-06-12', '2026-06-14', 8, 480.00, 'confirmada', '2026-06-01', 1),
(13, '2026-06-18', '2026-06-21', 8, 0.00, 'cancelada', '2026-06-04', 6),
(14, '2026-06-22', '0000-00-00', 1, 0.00, 'cancelada', '2026-06-04', 6),
(15, '2026-06-17', '2026-06-20', 6, 720.00, 'cancelada', '2026-06-05', 6),
(16, '2026-06-25', '2026-06-28', 10, 750.00, 'pendiente', '2026-06-05', 6),
(17, '2026-06-26', '2026-06-28', 1, 250.00, 'pendiente', '2026-06-05', 1),
(18, '2026-06-16', '2026-06-20', 7, 700.00, 'cancelada', '2026-06-05', 1),
(19, '2026-06-23', '2026-06-26', 8, 600.00, 'confirmada', '2026-06-05', 1),
(20, '2026-07-02', '2026-07-05', 7, 525.00, 'confirmada', '2026-06-05', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitios_cercanos`
--

CREATE TABLE `sitios_cercanos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sitios_cercanos`
--

INSERT INTO `sitios_cercanos` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Nacimiento del Rio Cuervo', 'Nace junto a la localidad conquense de Vega del Codorno, \r\n                        concretamente en la falda occidental de la Muela de San \r\n                        Felipe, a unos 1469 metros de altitud, es un sitio \r\n                        precioso para visitar dentro de nuestra zona.', 'sitio1.jpg'),
(2, 'Ciudad Encantada', 'Es un espectacular paisaje kárstico en la Serranía de Cuenca, \r\n                        famoso por sus formaciones rocosas de piedra caliza \r\n                        esculpidas por la erosión del agua, el viento y el hielo \r\n                        durante millones de años, creando figuras que parecen animales, \r\n                        personas y objetos.', 'sitio2.jpg'),
(3, 'Ruta de las Caras', 'Es un sendero circular y gratuito, famoso por sus más de 20 esculturas \r\ny bajorrelieves tallados directamente en la roca arenisca por los \r\nartistas Eulogio Reguillo y Jorge J. Maldonado, inspirados en figuras \r\ndiversas (budistas, templarias, mitológicas, Beethoven) y que ofrecen \r\nuna experiencia artística y natural junto al pantano de Buendía.', 'sitio3.jpg'),
(4, 'Vía Ferrata de Priego', 'Se encuentra en la Serranía de Cuenca, es un itinerario de aventura equipado \r\ncon grapas, peldaños y puentes (monos y tibetanos) para progresar \r\npor paredes verticales y horizontales con total seguridad, \r\nofreciendo espectaculares vistas de la Hoz del río Escabas y \r\npermitiendo disfrutar de la verticalidad sin necesidad de ser \r\nescalador experto.', 'sitio4.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `contrasena`, `telefono`, `rol`, `fecha_registro`) VALUES
(1, 'casaconsuelo', 'admin@casaconsuelo.com', 'casaconsuelo20', '680408668', 'admin', '2026-06-01'),
(2, 'Antonio ', 'antoniomontalbo23@gmail.com', '123456', '633293058', 'cliente', '2026-05-29'),
(3, 'Antonio ', 'antonio@example.es', '123456', '633293058', 'cliente', '2026-05-29'),
(4, 'Antonio ', 'antonio@example2.es', '123456', '633293058', 'cliente', '2026-05-29'),
(5, 'Pedro', 'pedro@gmail.com', '123456', '654321078', 'cliente', '2026-05-30'),
(6, 'Roberto', 'roberto@gmail.com', '123456', '654321098', 'cliente', '2026-05-30'),
(7, 'Juan', 'juan@example.com', '123456', '654321098', 'cliente', '2026-06-05');

--
-- Índices para tablas volcadas
--

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
  ADD KEY `id_cliente` (`id_usuario`);

--
-- Indices de la tabla `sitios_cercanos`
--
ALTER TABLE `sitios_cercanos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `resena`
--
ALTER TABLE `resena`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `sitios_cercanos`
--
ALTER TABLE `sitios_cercanos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
