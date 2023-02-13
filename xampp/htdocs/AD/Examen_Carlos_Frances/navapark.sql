-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2023 a las 17:34:10
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `navapark`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atracciones`
--

CREATE TABLE `atracciones` (
  `nombre` varchar(20) NOT NULL,
  `tematica` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `atracciones`
--

INSERT INTO `atracciones` (`nombre`, `tematica`) VALUES
('cascada', 'amazonas'),
('lanzadera', 'aviacion'),
('tiovivo', 'disney');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `ID` int(11) NOT NULL,
  `atraccion` varchar(20) NOT NULL,
  `hora` time NOT NULL,
  `edad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`ID`, `atraccion`, `hora`, `edad`) VALUES
(5, 'tiovivo', '12:00:00', 23),
(6, 'tiovivo', '14:00:00', 27),
(7, 'lanzadera', '09:50:00', 40),
(8, 'lanzadera', '17:35:00', 22),
(9, 'lanzadera', '11:20:00', 17),
(10, 'cascada', '09:50:00', 45);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atracciones`
--
ALTER TABLE `atracciones`
  ADD PRIMARY KEY (`nombre`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `atraccion` (`atraccion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `viajes_ibfk_1` FOREIGN KEY (`atraccion`) REFERENCES `atracciones` (`nombre`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
