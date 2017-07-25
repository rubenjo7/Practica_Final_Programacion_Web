-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2016 a las 16:48:14
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db53598079`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE `canciones` (
  `idCanciones` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `idDisco` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`idCanciones`, `nombre`, `idDisco`) VALUES
(1, 'a', 84),
(2, 'a', 86),
(3, 'a', 87),
(4, 'a', 87),
(5, 'a', 87),
(6, 'a', 87),
(7, 'a', 87),
(8, 'a', 88),
(9, 'a', 92),
(10, 'b', 92),
(11, 'c', 92),
(12, 'd', 92),
(13, 'e', 92),
(14, 'a', 117);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idComentario` int(6) NOT NULL,
  `idDisco` int(6) NOT NULL,
  `idUsuario` int(6) NOT NULL,
  `comentario` varchar(140) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`idComentario`, `idDisco`, `idUsuario`, `comentario`, `fecha`, `hora`) VALUES
(108, 45, 2, 'dsadsad', '2016-06-03', '16:46:25'),
(109, 45, 2, 'sd asdas', '2016-06-03', '16:47:53'),
(110, 45, 2, 'sd asdas', '2016-06-03', '16:50:20'),
(111, 45, 2, 'sd asdas', '2016-06-03', '16:51:23'),
(112, 45, 2, 'sd asdas', '2016-06-03', '16:51:56'),
(113, 37, 2, 'eds', '2016-06-03', '17:08:17'),
(114, 37, 2, 'erf', '2016-06-03', '17:08:23'),
(115, 37, 2, 'ghg hghj ghjg hjg jg jhg jhg jh ghj ghj ghjg hj gjhg jh ghjg h gjg jg jhg hjg jg jg jhgj jg jh hjg jh ghjg jhg jhg jhg hj j gj hjg jh gjg h', '2016-06-03', '17:08:58'),
(116, 37, 1, 'dasdas', '2016-06-03', '19:52:05'),
(117, 92, 1, 'Es una pasada!\r\n', '2016-06-04', '13:55:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disco`
--

CREATE TABLE `disco` (
  `idDisco` int(11) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `precio` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` int(4) NOT NULL,
  `pos` int(2) NOT NULL,
  `imagen_url` varchar(100) NOT NULL,
  `artista` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `disco`
--

INSERT INTO `disco` (`idDisco`, `titulo`, `precio`, `fecha`, `tipo`, `pos`, `imagen_url`, `artista`) VALUES
(36, 'Rumba a lo desconocido', '14\r\n', '2016-06-04', 1, 1, 'Discos/disco2.jpg', 'Estopa'),
(37, 'No lo se', '20', '2016-06-03', 2, 1, 'Discos/disco1.jpg', 'Cage the Elephant'),
(38, 's', '5', '2016-06-03', 3, 1, 'Discos/disco3.jpg', 'as'),
(39, 'a', '9', '2016-06-03', 4, 2, 'Discos/disco4.jpg', 'a'),
(40, 'sada', '12', '2016-06-04', 1, 1, 'Discos/disco2.jpg', 'das'),
(87, 'a', '12', '2016-06-04', 1, 2, 'Discos/disco2.jpg', 'a'),
(92, 'dsa', '12', '2016-06-04', 1, 1, 'Discos/disco2.jpg', 'a'),
(117, 'a', '15', '2016-06-04', 1, 1, 'Discos/disco2.jpg', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacionados`
--

CREATE TABLE `relacionados` (
  `idDisco1` int(11) NOT NULL,
  `idDisco2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(6) NOT NULL,
  `nombreUsuario` varchar(40) NOT NULL,
  `contrasena` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `tipo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `contrasena`, `email`, `nombre`, `apellidos`, `telefono`, `tipo`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'rubenjo7@correo.ugr.es', 'Rubén', 'Jiménez Ortega', '628673081', 1),
(2, 'usu', 'cc25dddbb8e44fbd804322fd50d2620f', 'usuario@normal.es', 'Usuario', 'Normal', '989898891', 2),
(14, 'sdas', '81dc9bdb52d04dc20036dbd8313ed055', 'ref@asd.es', 'ads', 'dsadas', '698698698', 2),
(16, 'sdasds', '81dc9bdb52d04dc20036dbd8313ed055', 'ref@asd.es', 'ads', 'dsadas', '698698698', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`idCanciones`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`idComentario`);

--
-- Indices de la tabla `disco`
--
ALTER TABLE `disco`
  ADD PRIMARY KEY (`idDisco`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `idCanciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `idComentario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT de la tabla `disco`
--
ALTER TABLE `disco`
  MODIFY `idDisco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
