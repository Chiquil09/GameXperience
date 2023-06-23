-- phpMyAdmin SQL Dump
-- version 5.2.1-1.fc38
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-06-2023 a las 10:27:17
-- Versión del servidor: 10.5.20-MariaDB
-- Versión de PHP: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gameperience`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `biblioteca`
--

CREATE TABLE `biblioteca` (
  `id` int(11) NOT NULL,
  `datos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `biblioteca`
--

INSERT INTO `biblioteca` (`id`, `datos_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int(11) NOT NULL,
  `puntuacion` varchar(50) NOT NULL,
  `desarrolador` varchar(60) NOT NULL,
  `genero_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `puntuacion`, `desarrolador`, `genero_id`, `producto_id`) VALUES
(1, '12', 'bungie', 1, 1),
(3, '4.3', 'manuelito ayala', 3, 3),
(6, '5', 'fosi', 1, 7),
(12, '12', 'mojang', 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`id`, `nombre`) VALUES
(1, 'Accion'),
(2, 'aventura'),
(3, 'multijugador'),
(4, 'misterio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` blob NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `imagen`, `precio`) VALUES
(1, 'Halo infiniy', 0x756e206a7565676f2063726561646f20657370656369616c206d656e746520706172612e2e2e, 'halo-infinity.jpg', 200.00),
(3, 'Doom Eternal', 0x6a7565676f206465206765727261, '1303642.jpeg', 300.00),
(7, 'Multi', 0x686f6c61, '1366_2000.jpg', 400.00),
(8, 'minecraft', 0x4c6f72656d20697073756d20646f6c6f722073697420616d65742c20636f6e73656374657475722061646970697363696e6720656c69742c2073656420646f20656975736d6f642074656d706f7220696e6369646964756e74207574206c61626f726520657420646f6c6f7265206d61676e6120616c697175612e2053697420616d6574206e69736c2073757363697069742061646970697363696e6720626962656e64756d2065737420756c7472696369657320696e746567657220717569732e204175677565206567657420617263752064696374756d207661726975732e204574206e65747573206574206d616c6573756164612066616d65732061632e20456e696d206575207475727069732065676573746173207072657469756d2e204d616563656e617320766f6c757470617420626c616e64697420616c697175616d20657469616d20657261742e204d692070726f696e20736564206c696265726f20656e696d207365642066617563696275732e204e69626820697073756d20636f6e736571756174206e69736c2076656c207072657469756d206c6563747573207175616d2069642e20446f6c6f722073697420616d657420636f6e73656374657475722061646970697363696e6720656c69742070656c6c656e746573717565206861626974616e74206d6f7262692e2044696374756d206e6f6e20636f6e7365637465747572206120657261742e20416d657420616c697175616d206964206469616d206d616563656e617320756c74726963696573206d692065676574206d61757269732e2056697665727261206a7573746f206e656320756c747269636573206475692073617069656e20656765742e20566f6c7574706174207365642063726173206f726e61726520617263752064756920766976616d75732e0d0a0d0a4e69736c2076656c207072657469756d206c6563747573207175616d2069642e2041646970697363696e6720747269737469717565207269737573206e6563206665756769617420696e2e20556c7472696369657320696e7465676572207175697320617563746f7220656c69742e205475727069732074696e636964756e7420696420616c69717565742072697375732e20457469616d20657261742076656c6974207363656c6572697371756520696e2064696374756d2e20, 'minecraft-swirls-i129032.jpg', 160.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` char(60) NOT NULL,
  `biblioteca_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`, `biblioteca_id`) VALUES
(1, 'angel kau', 'ang738093@gmail.com', '123', 1),
(2, 'Kevin', 'kevin@gmail.com', '123', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkdatosid` (`datos_id`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkidgenero` (`genero_id`),
  ADD KEY `fkproductoid` (`producto_id`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkbibliotecaid` (`biblioteca_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD CONSTRAINT `biblioteca_ibfk_1` FOREIGN KEY (`datos_id`) REFERENCES `datos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos`
--
ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`genero_id`) REFERENCES `generos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `datos_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`biblioteca_id`) REFERENCES `biblioteca` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
