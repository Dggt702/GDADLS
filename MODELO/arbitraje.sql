-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-05-2024 a las 21:50:18
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `arbitraje`
--

DROP DATABASE IF EXISTS `arbitraje`;
CREATE DATABASE IF NOT EXISTS `arbitraje`;
USE `arbitraje`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `contrasenia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre_usuario`, `contrasenia`) VALUES
(1, 'admin', '$2y$10$peDCz/qUlIF7d1xm2cTwDOO2tvic61/esfqLCgDMOOkK9kf63hYAK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbitro`
--

CREATE TABLE `arbitro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `telefono` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `disponibilidad` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `arbitro`
--

INSERT INTO `arbitro` (`id`, `nombre`, `apellidos`, `dni`, `contrasenia`, `telefono`, `email`, `disponibilidad`) VALUES
(1, 'Carlos', 'García', '1', '$2y$10$7ns7wkxKO8frXgPOj8HureQMmub5B/xpRp87V9E4bxq1qXKoUnuW2', 600111111, 'carlos.garcia@example.com', 'DISPONIBLE'),
(2, 'Laura', 'Martínez', '2', '$2y$10$ubTM/SaTuyfcE3ScjutpGuQwO4aCgIcnWKfq5V1fw2GNV6ZaY0uUO', 600222222, 'laura.martinez@example.com', 'DISPONIBLE'),
(3, 'David', 'Rodríguez', '3', '$2y$10$hngpNVL95i1jV35KzTYQO.o/1HtSnnpScAc2PMZvbus5AwijMMOve', 600333333, 'david.rodriguez@example.com', 'DISPONIBLE'),
(4, 'Sara', 'López', '4', '$2y$10$ajnMivXifmnwhbLnxRM.weRuZsvtlbWZG9GFYyUHMXRNUu7Zfdm4y', 600444444, 'sara.lopez@example.com', 'DISPONIBLE'),
(5, 'Jorge', 'Hernández', '5', '$2y$10$VfurMigYxit5C5O6yNpPMOny/ZdvPSeJ.xcTrS72bXJKjrrhJL0CC', 600555555, 'jorge.hernandez@example.com', 'DISPONIBLE');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club`
--

CREATE TABLE `club` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `localizacion` int(11) NOT NULL,
  `deporte` int(11) NOT NULL,
  `persona_contacto` varchar(50) NOT NULL,
  `telefono_contacto` int(11) NOT NULL,
  `correo_contacto` varchar(50) NOT NULL,
  `polideportivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `club`
--

INSERT INTO `club` (`id`, `nombre`, `localizacion`, `deporte`, `persona_contacto`, `telefono_contacto`, `correo_contacto`, `polideportivo`) VALUES
(1, 'Alpedrete', 1, 1, 'Juan Gómez', 123456789, 'juangomez@prueba.com', 1),
(2, 'Collado Mediano', 2, 2, 'María Pérez', 987654321, 'mariaperez@prueba.com', 6),
(3, 'Hoyo de Manzanares', 3, 3, 'Carlos Sánchez', 654321987, 'carlossanchez@prueba.com', 11),
(4, 'Valdemorillo', 4, 4, 'Laura García', 321654987, 'lauragarcia@prueba.com', 10),
(5, 'Becerril de la Sierra', 5, 5, 'Pedro Martínez', 789456123, 'pedromartinez@prueba.com', 2),
(6, 'Collado Villalba', 6, 1, 'Ana López', 456789123, 'analopez@prueba.com', 7),
(7, 'Los Molinos', 7, 2, 'David Fernández', 159753486, 'davidfernandez@prueba.com', 12),
(8, 'El Boalo - Cerceda - Mataelpino', 8, 3, 'Marta Rodríguez', 753159486, 'martarodriguez@prueba.com', 3),
(9, 'El Escorial', 9, 4, 'Jorge González', 258369147, 'jorgegonzalez@prueba.com', 8),
(10, 'Manzanares El Real', 10, 5, 'Sara Hernández', 147258369, 'sarahernandez@prueba.com', 18),
(11, 'Cercedilla', 11, 1, 'Luis Ramírez', 369258147, 'luisramirez@prueba.com', 4),
(12, 'Galapagar', 12, 2, 'Raquel Muñoz', 951753486, 'raquelmunoz@prueba.com', 9),
(13, 'Moralzarzal', 13, 3, 'Sergio Díaz', 486159753, 'sergiodiaz@prueba.com', 13),
(14, 'San Lorenzo de El Escorial', 14, 4, 'Patricia Romero', 753486159, 'patriciaromero@prueba.com', 15),
(15, 'Colmenarejo', 15, 5, 'Fernando Rubio', 159486753, 'fernandorubio@prueba.com', 5),
(16, 'Guadarrama', 16, 1, 'Nuria Blanco', 486753159, 'nuriablanco@prueba.com', 10),
(17, 'Navacerrada', 17, 2, 'Óscar Medina', 753951486, 'oscarmedina@prueba.com', 14),
(18, 'Torrelodones', 18, 3, 'Lucía Ortiz', 951486753, 'luciaortiz@prueba.com', 16);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deporte`
--

CREATE TABLE `deporte` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `deporte`
--

INSERT INTO `deporte` (`id`, `nombre`) VALUES
(1, 'Baloncesto'),
(2, 'Fútbol 7'),
(3, 'Fútbol 11'),
(4, 'Fútbol-sala'),
(5, 'Voleibol');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE `partido` (
  `id` int(11) NOT NULL,
  `jornada` int(11) NOT NULL,
  `temporada` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(20) NOT NULL,
  `deporte` int(11) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `arbitro` int(11) NOT NULL,
  `local` int(11) NOT NULL,
  `visitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`id`, `jornada`, `temporada`, `fecha`, `estado`, `deporte`, `categoria`, `arbitro`, `local`, `visitante`) VALUES
(1, 1, '2023-2024', '2024-06-15', 'PENDIENTE', 1, 1, 1, 1, 2),
(2, 2, '2023-2024', '2024-06-16', 'PENDIENTE', 2, 3, 2, 3, 4),
(3, 3, '2023-2024', '2024-06-17', 'PENDIENTE', 3, 5, 3, 5, 6),
(4, 4, '2023-2024', '2024-06-18', 'PENDIENTE', 4, 7, 4, 7, 8),
(5, 5, '2023-2024', '2024-06-19', 'PENDIENTE', 5, 8, 5, 9, 10),
(6, 6, '2023-2024', '2024-06-20', 'PENDIENTE', 1, 2, 1, 11, 12),
(7, 7, '2023-2024', '2024-06-21', 'PENDIENTE', 2, 4, 2, 13, 14),
(8, 8, '2023-2024', '2024-06-22', 'PENDIENTE', 3, 6, 3, 15, 16),
(9, 9, '2023-2024', '2024-06-23', 'PENDIENTE', 4, 7, 4, 17, 18),
(10, 10, '2023-2024', '2024-06-24', 'PENDIENTE', 5, 8, 5, 1, 3);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pueblo`
--

CREATE TABLE `pueblo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `codigo_postal` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pueblo`
--

INSERT INTO `pueblo` (`id`, `nombre`, `codigo_postal`) VALUES
(1, 'Alpedrete', 28430),
(2, 'Collado Mediano', 28450),
(3, 'Hoyo de Manzanares', 28240),
(4, 'Valdemorillo', 28210),
(5, 'Becerril de la Sierra', 28490),
(6, 'Collado Villalba', 28400),
(7, 'Los Molinos', 28460),
(8, 'El Boalo - Cerceda - Mataelpino', 28413),
(9, 'El Escorial', 28280),
(10, 'Manzanares El Real', 28410),
(11, 'Cercedilla', 28470),
(12, 'Galapagar', 28260),
(13, 'Moralzarzal', 28411),
(14, 'San Lorenzo de El Escorial', 28200),
(15, 'Colmenarejo', 28270),
(16, 'Guadarrama', 28440),
(17, 'Navacerrada', 28491),
(18, 'Torrelodones', 28250);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `descripcion`) VALUES 
  (1, 'Alevín Mixto'),
  (2, 'Alevín Femenino'),
  (3, 'Infantil Mixto'),
  (4, 'Infantil Femenino'),
  (5, 'Cadete Mixto'),
  (6, 'Cadete Femenino'),
  (7, 'Juvenil Femenino'),
  (8, 'Senior Femenino');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `polideportivo`
--

CREATE TABLE `polideportivo` (
  `id` int(11) NOT NULL,
  `ubicacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `polideportivo` (`id`, `ubicacion`) VALUES
(1, 'Polideportivo Municipal de Alpedrete'),
(2, 'Polideportivo Municipal de Becerril de la Sierra'),
(3, 'Polideportivo Municipal de Mataelpino'),
(4, 'Polideportivo Municipal de Cercedilla'),
(5, 'Polideportivo Municipal de Colmenarejo'),
(6, 'Polideportivo Municipal de Collado Mediano'),
(7, 'Ciudad Deportiva de Collado Villalba'),
(8, 'Polideportivo Municipal de El Escorial'),
(9, 'Polideportivo Municipal \'Marcelo Escudero\''),
(10, 'Polideportivo Municipal de Guadarrama'),
(11, 'Polideportivo Municipal de Hoyo de Manzanares'),
(12, 'Polideportivo Municipal de Los Molinos'),
(13, 'Polideportivo Municipal de Moralzarzal'),
(14, 'Polideportivo Municipal de Navacerrada'),
(15, 'Polideportivo Municipal de San Lorenzo de El Escorial'),
(16, 'Polideportivo Municipal de Torrelodones'),
(17, 'Polideportivo Municipal \'Eras Cerradas\''),
(18, 'Polideportivo Municipal de Manzanares El Real');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_token`
--

CREATE TABLE `password_token` (
  `id` int(11) NOT NULL,
  `id_arbitro` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `fecha_exp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `arbitro`
--
ALTER TABLE `arbitro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deporte` (`deporte`),
  ADD KEY `localizacion` (`localizacion`),
  ADD KEY `polideportivo` (`polideportivo`);

--
-- Indices de la tabla `deporte`
--
ALTER TABLE `deporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `partido`
--
ALTER TABLE `partido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `arbitro` (`arbitro`),
  ADD KEY `deporte` (`deporte`),
  ADD KEY `local` (`local`),
  ADD KEY `visitante` (`visitante`);

--
-- Indices de la tabla `pueblo`
--
ALTER TABLE `pueblo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `polideportivo`
--
ALTER TABLE `polideportivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `polideportivo`
--
ALTER TABLE `password_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `arbitro` (`id_arbitro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `arbitro`
--
ALTER TABLE `arbitro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `club`
--
ALTER TABLE `club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `deporte`
--
ALTER TABLE `deporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `partido`
--
ALTER TABLE `partido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pueblo`
--
ALTER TABLE `pueblo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `polideportivo`
--
ALTER TABLE `polideportivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `polideportivo`
--
ALTER TABLE `password_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `club_ibfk_1` FOREIGN KEY (`deporte`) REFERENCES `deporte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `club_ibfk_2` FOREIGN KEY (`localizacion`) REFERENCES `pueblo` (`id`),
  ADD CONSTRAINT `club_ibfk_3` FOREIGN KEY (`polideportivo`) REFERENCES `polideportivo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `partido`
--
ALTER TABLE `partido`
  ADD CONSTRAINT `partido_ibfk_1` FOREIGN KEY (`arbitro`) REFERENCES `arbitro` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `partido_ibfk_2` FOREIGN KEY (`deporte`) REFERENCES `deporte` (`id`),
  ADD CONSTRAINT `partido_ibfk_3` FOREIGN KEY (`local`) REFERENCES `club` (`id`),
  ADD CONSTRAINT `partido_ibfk_4` FOREIGN KEY (`visitante`) REFERENCES `club` (`id`);

--
-- Filtros para la tabla `password_token`
--
ALTER TABLE `password_token`
  ADD CONSTRAINT `password_token_ibfk_1` FOREIGN KEY (`id_arbitro`) REFERENCES `arbitro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
