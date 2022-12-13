-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 13-12-2022 a las 18:21:17
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `almacen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `referencia` int(11) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `creado` int(11) NOT NULL,
  `modificado` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `ref_fabricante` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`referencia`, `producto`, `cantidad`, `creado`, `modificado`, `fecha_creacion`, `fecha_modificacion`, `ref_fabricante`) VALUES
(1, 'Bombilla led Philips 1,5W', 163, 1, 1, '2022-10-04', '2022-10-20', '193-765-987ja'),
(2, 'Bombilla led Philips 40 W', 200, 1, 1, '2022-10-04', '2022-10-04', '204-765-987ja'),
(3, 'Bombilla led Philips 50 W', 200, 1, 1, '2022-10-04', '2022-10-04', '205-765-987ja'),
(4, 'Bombilla led Philips 60 W', 200, 1, 1, '2022-10-04', '2022-10-04', '206-765-987ja'),
(5, 'Conmutador de pared Philips mod. Roma', 240, 1, 1, '2022-10-04', '2022-10-04', '200-774-987ja'),
(6, 'Enchufe de pared Philips mod. Roma', 250, 1, 1, '2022-10-04', '2022-10-04', '201-774-987ja'),
(7, 'Conmutador de pared doble Philips mod. Roma', 240, 1, 1, '2022-10-04', '2022-10-04', '202-774-987ja'),
(8, 'Conmutador con enchufe de pared Philips mod. Roma', 240, 1, 1, '2022-10-04', '2022-10-04', '203-774-987ja'),
(9, 'Interruptor de pared Philips mod. Roma', 340, 1, 1, '2022-10-04', '2022-10-04', '204-774-987ja'),
(10, 'Interruptor doble de pared Philips mod. Roma', 240, 1, 1, '2022-10-04', '2022-10-04', '205-774-987ja'),
(11, 'Bombilla led Philips 15 W', 312, 1, 1, '2022-10-04', '2022-10-04', '202-765-987ja'),
(12, 'Bombilla led Philips 10 W', 312, 1, 1, '2022-10-04', '2022-10-04', '201-765-987ja'),
(14, 'Bombilla led Philips 8 W', 225, 1, 3, '2022-10-04', '2022-10-04', '200-765-987ja'),
(15, 'Bombilla led Philips 5W', 325, 4, 4, '2022-10-19', '2022-10-19', '199-765-987ja'),
(16, 'Bombilla led Philips 2W', 200, 4, 4, '2022-10-19', '2022-10-19', '198-765-987ja'),
(17, 'Bombilla led Philips 1W', 25, 4, 4, '2022-10-19', '2022-10-19', '197-765-987ja'),
(19, 'Bombilla led Philips 0,5W', 56, 4, 4, '2022-10-19', '2022-10-19', '196-765-987ja'),
(20, 'Interruptor triple de pared Philips mod. Roma', 98, 4, 4, '2022-10-19', '2022-10-19', '206-774-987ja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_pwd`
--

CREATE TABLE `solicitudes_pwd` (
  `id_solicitud` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `solicitudes_pwd`
--

INSERT INTO `solicitudes_pwd` (`id_solicitud`, `id_user`, `fecha`) VALUES
(1, 7, '2022-10-04'),
(3, 5, '2022-10-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_registro`
--

CREATE TABLE `solicitudes_registro` (
  `id_solicitud` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_1` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_2` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `permisos` enum('Administrador','Escritura','Lectura') COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `solicitudes_registro`
--

INSERT INTO `solicitudes_registro` (`id_solicitud`, `nombre`, `apellido_1`, `apellido_2`, `mail`, `permisos`) VALUES
(5, 'Antonio', 'Otero', 'Blanco', 'antonio.otero@mimail.com', 'Lectura'),
(7, 'Mireia', 'Belmote', 'Blanco', 'mireia.b.b@gmail.com', 'Escritura'),
(9, 'Luis', 'Robles', 'Fuerte', 'luis_r_f@mymail.com', 'Lectura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_1` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_2` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `permisos` enum('Administrador','Lectura','Escritura') COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `nombre`, `apellido_1`, `apellido_2`, `mail`, `permisos`) VALUES
(1, 'admin', '$2y$10$pn/8R5LEtjSeaHWxZANAMeAn0BOTZ4WiD1kiy4sccYXgNTZ5nopWS', 'Administrador', 'de la', 'Base de Datos', 'agus.fg@mail.com', 'Administrador'),
(2, 'juan', '$2y$10$4LjZe3gTM10Fbr6bOoapD.cnFik/wzXpf49ZbQH6bpZfXhVUvvwDi', 'Juan', 'P&eacute;rez', 'Osorios', 'j.perez@gmail.com', 'Lectura'),
(3, 'luis', '$2y$10$vxxHYM/cY5lwCkmV5Pf4ke/u9iqwfkbyk5qK9oCohvv95IRidKn/.', 'Luis', 'Casado', 'Blanco', 'luis.c@mail.com', 'Escritura'),
(4, 'ana', '$2y$10$KJoNMBa9MNoNnJiCpZ8uQOwMzQahsw1rm9Yq2gY89nRLC8Mn1RUvi', 'Ana', 'Martín', 'Blanco', 'ana.mar@mail.com', 'Escritura'),
(5, 'mari', '$2y$10$4ZRyJygLVFmnDeKNrFx..uKnoj4uFow8jAndL1OS.93NUv5ScqMp6', 'Maria', 'Blanco', 'Azul', 'maria.blanco@gmail.com', 'Lectura'),
(6, 'ramon', '$2y$10$ZB1p1aDQASxVrFMa9etCKOqUJaYXpL3gtQnM.bplM0H.0EL.U4f5S', 'Ramón', 'Fernández', 'Liste', 'ramon.fdz@mail.com', 'Lectura'),
(7, 'eva', '$2y$10$s2khKAV0YT7P0Nxaz0NxJ.AiISRAtSMo51PK10hrWMP0HQx8SUIFu', 'Eva', 'Iglesias', 'Rajoy', 'eva.i@mail.com', 'Lectura'),
(9, 'manu', '$2y$10$LcLhFzHom0uFPBLeCBYw3uCMPIdHQ6hIbYg5mNEWJFdjhCQQqnu.q', 'Manuel', 'Gonz&aacute;lez', 'Iglesias', 'm.gonzalez@gmail.com', 'Lectura'),
(10, 'ruben', '$2y$10$zr8tUeCLdOYJ/Hc7k6daHOW1GNeAaqXQvPXMvQoi6QZBoE4xJi.8a', 'Rub&eacute;n', 'Loro', 'Verde', 'rlv@mimail.com', 'Lectura'),
(11, 'manuela', '$2y$10$/KJm4lEbO01/UzA7fngfuuJrIVbSAx0C4.FJagEOpJSxXsR37vnJy', 'Manuela', 'Flores', 'Pino', 'manuela.f.p@gmail.com', 'Lectura');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`referencia`),
  ADD KEY `creado` (`creado`),
  ADD KEY `modificado` (`modificado`);

--
-- Indices de la tabla `solicitudes_pwd`
--
ALTER TABLE `solicitudes_pwd`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_user_fk` (`id_user`);

--
-- Indices de la tabla `solicitudes_registro`
--
ALTER TABLE `solicitudes_registro`
  ADD PRIMARY KEY (`id_solicitud`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users` (`user`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `referencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `solicitudes_pwd`
--
ALTER TABLE `solicitudes_pwd`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitudes_registro`
--
ALTER TABLE `solicitudes_registro`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `creado_fk` FOREIGN KEY (`creado`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `modificado_fk` FOREIGN KEY (`modificado`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudes_pwd`
--
ALTER TABLE `solicitudes_pwd`
  ADD CONSTRAINT `id_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
