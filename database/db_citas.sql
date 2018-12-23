-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-12-2018 a las 02:41:36
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-06:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_farmacia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `clientes` (
  `codigo_cliente` varchar(7) NOT NULL,
  `primerNombre` varchar(50) NOT NULL,
  `segundoNombre` varchar(50) NOT NULL,
  `primerApellido` varchar(50) NOT NULL,
  `segundoApellido` varchar(50) NOT NULL,
  `telefono` int(8) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `clientes` (`codigo_cliente`, `primerNombre`, `segundoNombre`, `primerApellido`, `segundoApellido`, `telefono`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
('C000361', 'Gina', 'Maria', 'Jerezano', 'Andino', 88546791, 1, '2018-07-24 16:43:20', 1, '2018-07-26 02:09:06'),
('C000362', 'Grazzia', 'Maria', 'Garcia', 'Mejia', 98546321, 1, '2018-07-24 16:56:58', 1, '2018-07-26 02:09:28'),
('C000363', 'Andrea', 'Celeste', 'Portillo', 'Guzman', 33815467, 1, '2018-10-01 00:12:32', 1, '2018-10-01 01:45:32'),
('C000364', 'Daniela', 'Isabel', 'Estevez', 'Gonzales', 95910341, 1, '2018-10-30 15:39:54', 1, '2018-11-27 00:30:12');

-- --------------------------------------------------------

CREATE TABLE `empleados` (
  `codigo_empleado` varchar(7) NOT NULL,
  `primerNombre_e` varchar(50) NOT NULL,
  `segundoNombre_e` varchar(50) NOT NULL,
  `primerApellido_e` varchar(50) NOT NULL,
  `segundoApellido_e` varchar(50) NOT NULL,
  `telefono_e` int(8) NOT NULL,
  `identidad` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `empleados` (`codigo_empleado`, `primerNombre_e`, `segundoNombre_e`, `primerApellido_e`, `segundoApellido_e`, `telefono_e`, `identidad`, `email`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
('E000361', 'Andrea', 'Nicolle', 'Valladares', 'Aguilar', 88546791,0801-1996-08242,'nicollev7@gmail.com', 1, '2018-07-24 16:43:20', 1, '2018-07-26 02:09:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion_medicamentos`
--

CREATE TABLE `citas` (
  `codigo_cita` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `observacion` varchar(150) NOT NULL,
  `codigo_cliente` varchar(7) NOT NULL,
  `codigo_empleado` varchar(7) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado_cita` enum('Pendiente','Atendida') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transaccion_medicamentos`
--

INSERT INTO `citas` (`codigo_cita`, `fecha`, `observacion`, `codigo_cliente`, `codigo_empleado`, `created_user`, `created_date`, `estado_cita`) VALUES
('TM-2018-0000001', '2018-07-26', 'Corte de pelo', 'C000361', 'E000361', 1, '2018-07-26 02:09:06', 'Pendiente'),
('TM-2018-0000002', '2018-07-26', 'Uñas acrilicas', 'C000362', 'E000361', 1, '2018-07-26 02:09:28', 'Atendida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `permisos_acceso` enum('Super Admin','Gerente','Empleado') NOT NULL,
  `status` enum('activo','bloqueado') NOT NULL DEFAULT 'activo',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `username`, `name_user`, `password`, `email`, `telefono`, `foto`, `permisos_acceso`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Ingeniero', '21232f297a57a5a743894a0e4a801fc3', 'info@sist.com', '216542', 'user-default.png', 'Super Admin', 'activo', '2017-04-01 08:15:15', '2018-10-01 00:11:45'),
(2, 'Gerente', 'Nicolle', 'a94652aa97c7211ba8954dd15a3cf838', 'Nicolle-Gerente@gmail.com', '23354684', NULL, 'Gerente', 'activo', '2017-07-25 22:34:03', '2018-11-06 01:18:40'),
(3, 'Empleado', 'Daniel', '21232f297a57a5a743894a0e4a801fc3', '', '', NULL, 'Empleado', 'activo', '2018-10-30 15:41:57', '2018-11-06 01:18:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codigo_cliente`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`codigo_empleado`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indices de la tabla `transaccion_medicamentos`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`codigo_cita`),
  ADD KEY `codigo_cliente` (`codigo_cliente`),
  ADD KEY `codigo_empleado` (`codigo_empleado`),
  ADD KEY `created_user` (`created_user`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`permisos_acceso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medicamentos`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `medicamentos`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `transaccion_medicamentos`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`codigo_cliente`) REFERENCES `clientes` (`codigo_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`codigo_empleado`) REFERENCES `empleados` (`codigo_empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`created_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
