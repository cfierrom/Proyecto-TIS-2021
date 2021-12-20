-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2021 a las 00:18:07
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aforoucsc2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificio`
--

CREATE TABLE `edificio` (
  `id_edificio` int(5) NOT NULL,
  `nombre_edificio` varchar(30) NOT NULL,
  `capacidad_maxima_edificio` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `edificio`
--

INSERT INTO `edificio` (`id_edificio`, `nombre_edificio`, `capacidad_maxima_edificio`) VALUES
(2, 'Educacion', 120),
(3, 'Periodismo', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `run` int(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cargo` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`run`, `nombre`, `cargo`) VALUES
(11, 'Nicolas Aburto', 'Alumno'),
(22, 'Camilo Fierro', 'Alumno'),
(33, 'Hugo Garces', 'Docente'),
(44, 'Alvaro Concha', 'Seguridad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puede`
--

CREATE TABLE `puede` (
  `run_personal` int(11) NOT NULL,
  `id_edificio` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` time NOT NULL,
  `hora_salida` time NOT NULL,
  `id_ingreso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puede`
--

INSERT INTO `puede` (`run_personal`, `id_edificio`, `fecha_ingreso`, `hora_ingreso`, `hora_salida`, `id_ingreso`) VALUES
(11, 2, '2021-11-30', '22:00:00', '23:00:00', 1),
(22, 2, '2021-11-30', '22:00:00', '22:30:00', 2),
(33, 3, '2021-12-01', '10:00:00', '12:50:00', 3),
(44, 2, '2021-12-01', '11:20:00', '11:28:00', 4),
(44, 3, '2021-12-01', '11:30:00', '11:31:00', 5),
(44, 2, '2021-12-01', '11:32:00', '11:35:00', 6),
(44, 2, '2021-12-02', '22:40:00', '22:45:00', 7),
(11, 2, '2021-12-09', '19:15:00', '19:25:00', 8),
(11, 2, '2021-12-09', '19:25:00', '20:00:00', 9),
(44, 3, '2021-12-09', '19:26:00', '19:58:00', 10),
(11, 2, '2021-12-14', '11:28:00', '11:50:00', 11),
(11, 2, '2021-12-15', '18:50:00', '19:00:00', 12),
(44, 3, '2021-12-15', '18:50:00', '19:15:00', 13),
(11, 2, '2021-12-15', '19:04:00', '19:50:00', 14),
(33, 3, '2021-12-15', '18:59:00', '19:30:00', 15),
(22, 2, '2021-12-15', '19:24:00', '19:31:00', 16),
(44, 3, '2021-12-15', '19:25:00', '19:35:00', 17),
(11, 2, '2021-12-15', '19:50:00', '20:00:00', 18),
(22, 2, '2021-12-15', '19:50:00', '20:00:00', 19),
(33, 3, '2021-12-15', '19:50:00', '19:55:00', 20),
(44, 3, '2021-12-15', '19:50:00', '20:01:00', 21),
(11, 2, '2021-12-15', '20:03:00', '20:11:00', 22),
(22, 3, '2021-12-15', '20:03:00', '20:12:00', 23),
(33, 3, '2021-12-15', '20:03:00', '20:13:00', 24),
(44, 3, '2021-12-15', '20:02:00', '20:14:00', 25);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `edificio`
--
ALTER TABLE `edificio`
  ADD PRIMARY KEY (`id_edificio`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`run`);

--
-- Indices de la tabla `puede`
--
ALTER TABLE `puede`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD KEY `fk_run_personal` (`run_personal`),
  ADD KEY `fk_id_edificio` (`id_edificio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `edificio`
--
ALTER TABLE `edificio`
  MODIFY `id_edificio` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `puede`
--
ALTER TABLE `puede`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `puede`
--
ALTER TABLE `puede`
  ADD CONSTRAINT `fk_id_edificio` FOREIGN KEY (`id_edificio`) REFERENCES `edificio` (`id_edificio`),
  ADD CONSTRAINT `fk_run_personal` FOREIGN KEY (`run_personal`) REFERENCES `personal` (`run`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
