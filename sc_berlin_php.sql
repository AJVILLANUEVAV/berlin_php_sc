-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2024 a las 01:10:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sc_berlin_php`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudores`
--

CREATE TABLE `deudores` (
  `id` int(11) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `provincia` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `registro_deuda` bigint(20) DEFAULT NULL,
  `registro_pago` bigint(20) DEFAULT NULL,
  `registro_movimiento` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `deudores`
--

INSERT INTO `deudores` (`id`, `apellidos`, `correo`, `direccion`, `nombres`, `provincia`, `telefono`, `registro_deuda`, `registro_pago`, `registro_movimiento`) VALUES
(6, 'Villanueva Paravicino', 'ali.paravilla@gmail.com', 'Jr Trujillo 158', 'Ali Jason', 'Lima', '939340392', NULL, NULL, NULL),
(7, 'Garcia García', 'agarcia@apra.com', 'Jr xasdasd', 'Alan Raul', 'Lima', '9584758695', NULL, NULL, NULL),
(8, 'Chuquizuta Aragon', 'r.aragon@gmail.com', 'Jr Del valle 158', 'Ronald', 'Huancayo, Perú', '958457589', NULL, NULL, NULL),
(9, 'Tinco Santiago', 'r.tinco@gmail.com', 'Jr Los Andes 156', 'Rebeca', 'Huamanga, Ayacucho', '9586457859', NULL, NULL, NULL),
(10, 'Paravicino', 'aparavicinol@gmail.com', 'Jr. Nazarenas 125b', 'Alberto', 'Ayacucho Peru', '945256984', NULL, NULL, NULL),
(11, 'Paravicino Lira', 'irmapl_69@gmail.com', 'Jr. Magadelana 165', 'Irma', 'Lima, Peru', '925698458', NULL, NULL, NULL),
(12, 'Guzman Valle', 'aguzmanv123@gmail.com', 'Jr Chiclayo 156', 'Antonio', 'Lima, Perú', '945897452', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_deuda`
--

CREATE TABLE `registro_deuda` (
  `id` bigint(20) NOT NULL,
  `adelanto` decimal(19,0) NOT NULL,
  `documento_transferencia` varchar(255) NOT NULL,
  `fecha_deuda` date NOT NULL,
  `nombre_deudor` varchar(255) NOT NULL,
  `numero_boleta` varchar(255) NOT NULL,
  `numero_serie` varchar(255) NOT NULL,
  `saldo_deuda` decimal(19,0) NOT NULL,
  `tipo_pago` varchar(255) NOT NULL,
  `total_pago` decimal(19,0) NOT NULL,
  `total_deuda` decimal(19,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `registro_deuda`
--

INSERT INTO `registro_deuda` (`id`, `adelanto`, `documento_transferencia`, `fecha_deuda`, `nombre_deudor`, `numero_boleta`, `numero_serie`, `saldo_deuda`, `tipo_pago`, `total_pago`, `total_deuda`) VALUES
(1, 800, '', '2024-11-02', 'Ali', '001', '152', 700, 'Yape', 0, 1500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_movimiento`
--

CREATE TABLE `registro_movimiento` (
  `id_registro_movimientos` bigint(20) NOT NULL,
  `adelanto` decimal(19,0) NOT NULL,
  `fecha_registro` date NOT NULL,
  `pago` decimal(19,0) NOT NULL,
  `resumen` varchar(255) NOT NULL,
  `saldo` decimal(19,0) NOT NULL,
  `saldo_total` decimal(19,0) NOT NULL,
  `tipo_movimiento` varchar(255) NOT NULL,
  `id_deudor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `registro_movimiento`
--

INSERT INTO `registro_movimiento` (`id_registro_movimientos`, `adelanto`, `fecha_registro`, `pago`, `resumen`, `saldo`, `saldo_total`, `tipo_movimiento`, `id_deudor`) VALUES
(1, 800, '2024-11-03', 0, '001', 1700, 1700, 'Deuda', 6),
(4, 200, '2024-12-01', 0, '001', 2300, 2300, 'Deuda', 10),
(5, 0, '2024-12-01', 300, 'Pago registrado para el deudor con ID 10', 0, 2000, 'Pago', 10),
(6, 800, '2024-12-01', 0, '001', 2700, 2700, 'Deuda', 11),
(7, 0, '2024-12-01', 1700, 'Pago registrado para el deudor con ID 11', 0, -1700, 'Pago', 11),
(8, 450, '2024-12-01', 0, '001', 1050, 1050, 'Deuda', 11),
(9, 800, '2024-12-01', 0, '001', 3700, 3700, 'Deuda', 8),
(10, 0, '2024-12-01', 1700, 'Pago registrado para el deudor con ID 8', 0, -1700, 'Pago', 8),
(11, 900, '2024-12-01', 0, '001', 3600, 3600, 'Deuda', 12),
(12, 0, '2024-12-01', 700, 'Pago registrado para el deudor con ID 12', 0, -700, 'Pago', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_pago`
--

CREATE TABLE `registro_pago` (
  `id_registro_pago` bigint(20) NOT NULL,
  `boleta` varchar(255) NOT NULL,
  `documento_transferencia` varchar(255) DEFAULT NULL,
  `fecha_pago` date NOT NULL,
  `monto_pago` decimal(19,0) NOT NULL,
  `serie` varchar(255) NOT NULL,
  `tipo_pago` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `registro_pago`
--

INSERT INTO `registro_pago` (`id_registro_pago`, `boleta`, `documento_transferencia`, `fecha_pago`, `monto_pago`, `serie`, `tipo_pago`) VALUES
(1, '001', NULL, '2024-11-02', 200, '152', 'Yape'),
(2, '001', NULL, '2024-11-03', 500, '152', 'Efectivo'),
(3, '001', NULL, '2024-11-03', 500, '152', 'Efectivo'),
(4, '001', NULL, '2024-11-03', 500, '152', 'Efectivo'),
(5, '001', NULL, '2024-11-26', 300, '152', 'Yape'),
(6, '001', NULL, '2024-11-27', 1700, '102', 'Efectivo'),
(7, '001', NULL, '2024-11-29', 1700, '122', 'Efectivo'),
(8, '001', NULL, '2024-11-27', 700, '150', 'Yape');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Supervisor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`, `id_rol`, `id_estado`) VALUES
(2, 'Jason Villanueva', 'jason.villanueva@berlin.com', 'password123', 1, 1),
(3, 'Ali Paravicino', 'ali.paravicino@berlin.com', 'password123', 2, 1),
(4, 'Carlos Diaz', 'carlos.diaz@berlin.com', 'password123', 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `deudores`
--
ALTER TABLE `deudores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registro_deuda` (`registro_deuda`),
  ADD KEY `registro_pago` (`registro_pago`),
  ADD KEY `registro_movimiento` (`registro_movimiento`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `registro_deuda`
--
ALTER TABLE `registro_deuda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_movimiento`
--
ALTER TABLE `registro_movimiento`
  ADD PRIMARY KEY (`id_registro_movimientos`),
  ADD KEY `fk_deudor` (`id_deudor`);

--
-- Indices de la tabla `registro_pago`
--
ALTER TABLE `registro_pago`
  ADD PRIMARY KEY (`id_registro_pago`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_estado` (`id_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `deudores`
--
ALTER TABLE `deudores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registro_deuda`
--
ALTER TABLE `registro_deuda`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registro_movimiento`
--
ALTER TABLE `registro_movimiento`
  MODIFY `id_registro_movimientos` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `registro_pago`
--
ALTER TABLE `registro_pago`
  MODIFY `id_registro_pago` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `deudores`
--
ALTER TABLE `deudores`
  ADD CONSTRAINT `deudores_ibfk_1` FOREIGN KEY (`registro_deuda`) REFERENCES `registro_deuda` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `deudores_ibfk_2` FOREIGN KEY (`registro_pago`) REFERENCES `registro_pago` (`id_registro_pago`) ON UPDATE CASCADE,
  ADD CONSTRAINT `deudores_ibfk_3` FOREIGN KEY (`registro_movimiento`) REFERENCES `registro_movimiento` (`id_registro_movimientos`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_movimiento`
--
ALTER TABLE `registro_movimiento`
  ADD CONSTRAINT `fk_deudor` FOREIGN KEY (`id_deudor`) REFERENCES `deudores` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
