-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-12-2020 a las 20:12:22
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Telefono` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID`, `Nombre`, `Telefono`) VALUES
(66, 'Juancho', '12315'),
(67, 'Juancho', '12315'),
(68, 'Juancho', '12315'),
(69, 'Juancho', '12315'),
(70, 'Juancho', '12315'),
(71, 'Juancho', '12315'),
(72, 'Juancho', '12315'),
(73, 'Juancho', '12315'),
(74, 'Juancho', '12315'),
(75, 'Juancho', '12315'),
(76, 'Juancho', '12315');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_has_solicitud`
--

CREATE TABLE `cliente_has_solicitud` (
  `Cliente_ID` int(11) NOT NULL,
  `Solicitud_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente`
--

CREATE TABLE `ingrediente` (
  `ID` int(11) NOT NULL,
  `NombreIngrediente` varchar(255) DEFAULT NULL,
  `CantidadIngrediente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingrediente`
--

INSERT INTO `ingrediente` (`ID`, `NombreIngrediente`, `CantidadIngrediente`) VALUES
(1, 'CARNE', 2),
(2, 'SAL', 400),
(3, 'LENTEJA', 400),
(4, 'LONGANIZA VEGANA', 2),
(5, 'MORA', 20),
(6, 'BANANA', 20),
(7, 'CHOCOLATE', 5),
(8, 'LECHE', 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preparacion`
--

CREATE TABLE `preparacion` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Receta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preparacion_has_ingrediente`
--

CREATE TABLE `preparacion_has_ingrediente` (
  `Preparacion_ID` int(11) NOT NULL,
  `Ingrediente_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preparacion_has_solicitud`
--

CREATE TABLE `preparacion_has_solicitud` (
  `Preparacion_ID` int(11) NOT NULL,
  `Solicitud_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `ID` int(11) NOT NULL,
  `TipoPedido` varchar(45) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Telefono` varchar(255) NOT NULL,
  `Estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`ID`, `TipoPedido`, `Nombre`, `Telefono`, `Estado`) VALUES
(35, 'Llevar', 'Juancho', '12315', 'Pedido en Espera'),
(36, 'Llevar', 'Juancho', '12315', 'Pedido en Espera'),
(37, 'Llevar', 'Juancho', '12315', 'Pagado'),
(38, 'Llevar', 'Juancho', '12315', 'Pagado'),
(39, 'Llevar', 'Juancho', '12315', 'Pagado'),
(40, 'Llevar', 'Juancho', '12315', 'Pagado'),
(41, 'Llevar', 'Juancho', '12315', 'Pagado'),
(42, 'Llevar', 'Juancho', '12315', 'Pagado'),
(43, 'Llevar', 'Juancho', '12315', 'Pagado'),
(44, 'Llevar', 'Juancho', '12315', 'Pagado'),
(45, 'Llevar', 'Juancho', '12315', 'Pagado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `preparacion`
--
ALTER TABLE `preparacion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
