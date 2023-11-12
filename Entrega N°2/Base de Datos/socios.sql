-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2023 a las 00:13:33
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
-- Base de datos: `socios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscripciones`
--

CREATE TABLE `subscripciones` (
  `ID_subscripcion` int(11) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `caracteristicas` varchar(50) NOT NULL,
  `duracion` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `subscripciones`
--

INSERT INTO `subscripciones` (`ID_subscripcion`, `tipo`, `caracteristicas`, `duracion`, `precio`) VALUES
(1, 'FAN', 'POPULAR', 2, 750),
(2, 'SUPER FAN', 'POPULAR', 2, 1800),
(3, 'MEGA FAN', 'PLATEA', 2, 2500),
(4, 'BOSTERO', 'PLATEA', 5, 7500),
(17, 'SUPER BOSTERO', 'PALCO', 50, 90000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `subscripciones`
--
ALTER TABLE `subscripciones`
  ADD PRIMARY KEY (`ID_subscripcion`),
  ADD KEY `ID_subscripcion` (`ID_subscripcion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `subscripciones`
--
ALTER TABLE `subscripciones`
  MODIFY `ID_subscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
