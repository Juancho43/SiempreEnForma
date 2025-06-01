-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-09-2021 a las 09:16:48
-- Versión del servidor: 5.7.34-log
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `c2320290_grupo1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `idadmin` int(11) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`idadmin`, `correo`, `password`) VALUES
(1, 'mail@admin.com', '$2y$10$sBLyogRk7MnLAmrexFD0X.MJkXnkSPaXpQHD6ifeR./pHz.w22002');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `idclase` int(11) NOT NULL,
  `idsala` int(11) NOT NULL,
  `idprofesor` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `codigo` varchar(5) NOT NULL,
  `dia` varchar(10) NOT NULL,
  `hora` varchar(5) NOT NULL,
  `eliminado` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`idclase`, `idsala`, `idprofesor`, `descripcion`, `codigo`, `dia`, `hora`, `eliminado`) VALUES
(1, 1, 3, 'nose', 'dwad2', 'Lunes', '22:08', '0'),
(2, 2, 3, 'Spinning', '12', 'Lunes', '08:44', '1'),
(3, 1, 1, 'ASd', '34', 'Lunes', '09:45', '0'),
(4, 2, 2, 'Spinning', '67', 'Martes', '08:48', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL,
  `nomape` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `profesion` varchar(20) NOT NULL,
  `eliminado` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `nomape`, `telefono`, `correo`, `profesion`, `eliminado`) VALUES
(2, 'dawd', '2132427582', 'dwadw@adswad', 'hola', '0'),
(3, 'dwadad', '132123', 'dawdawd@adawd', '1323', '0'),
(4, '', '', '', '', '1'),
(5, 'Juan Bravo', '223456178', 'juanasd@gasd', 'cardiologo', '0'),
(6, 'juan', '2323', 'bravo@32.com', 'albaÃ±il', '0'),
(7, 'pedro', '3333333', 'pballarre@gmail.com', 'docente', '0'),
(8, 'juan', '888888', 'pballarre@gmail.com', 'nada', '0'),
(9, 'sexo ;)', '1000', 'xd@d', 'moderador de taringa', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `idinscripcion` int(11) NOT NULL,
  `idclase` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`idinscripcion`, `idclase`, `idcliente`) VALUES
(7, 1, 2),
(8, 1, 3),
(12, 1, 2),
(13, 1, 2),
(14, 2, 2),
(15, 1, 4),
(16, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idpago` int(11) NOT NULL,
  `idinscripcion` int(11) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `pagocuota` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`idpago`, `idinscripcion`, `fecha`, `pagocuota`) VALUES
(1, 8, '2021-08-19', '1'),
(2, 11, '2021-08-19', '1'),
(3, 12, '2021-08-19', '1'),
(4, 13, '2021-08-19', '1'),
(5, 15, '2021-08-19', '1'),
(6, 16, '2021-08-19', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `idprofesor` int(11) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `nomape` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `ingreso` date NOT NULL,
  `nacimiento` date NOT NULL,
  `eliminado` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`idprofesor`, `dni`, `nomape`, `telefono`, `ingreso`, `nacimiento`, `eliminado`) VALUES
(1, '2132312', 'dwaddwadawd', '2132132', '2021-08-19', '2021-08-11', '1'),
(2, '213123', 'dawwda', '2132132', '2021-08-19', '2021-08-07', '0'),
(3, '321321', 'dwadawdwadawd', '3213123', '2021-08-19', '2021-08-04', '0'),
(4, '5345345', 'hyttyhjtyh', '5646456', '2021-08-19', '2021-08-04', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `idrecurso` int(11) NOT NULL,
  `idsala` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `eliminado` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`idrecurso`, `idsala`, `descripcion`, `eliminado`) VALUES
(1, 1, 'dwadwaddwadaawdad', '0'),
(2, 1, 'Pesas', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `idsala` int(11) NOT NULL,
  `m2` float NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `num` varchar(3) NOT NULL,
  `eliminado` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`idsala`, `m2`, `ubicacion`, `tipo`, `num`, `eliminado`) VALUES
(1, 34, 'asda', 'Cardio', '32', '1'),
(2, 23, 'adwwad', 'dwad', '45', '0'),
(3, 34, 'arriba', 'Spinning', '23', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`idclase`),
  ADD KEY `idsala` (`idsala`),
  ADD KEY `idprofesor` (`idprofesor`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`idinscripcion`),
  ADD KEY `idclase` (`idclase`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idpago`),
  ADD KEY `idinscripcion` (`idinscripcion`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`idprofesor`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`idrecurso`),
  ADD KEY `idsala` (`idsala`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`idsala`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `idclase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `idinscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idpago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `idprofesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `idrecurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `idsala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`idprofesor`) REFERENCES `profesores` (`idprofesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clases_ibfk_2` FOREIGN KEY (`idsala`) REFERENCES `salas` (`idsala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripciones_ibfk_2` FOREIGN KEY (`idclase`) REFERENCES `clases` (`idclase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD CONSTRAINT `recursos_ibfk_1` FOREIGN KEY (`idsala`) REFERENCES `salas` (`idsala`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
