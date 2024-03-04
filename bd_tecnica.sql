-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2024 a las 05:12:54
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_tecnica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_empleados`
--

CREATE TABLE `t_empleados` (
  `id` int(11) NOT NULL,
  `uid` varchar(256) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(256) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `fecha_contratacion` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `photo` varchar(256) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_empleados`
--

INSERT INTO `t_empleados` (`id`, `uid`, `nombres`, `apellidos`, `salario`, `fecha_contratacion`, `email`, `password`, `photo`, `estado`) VALUES
(23, '65e526abee6a4', 'jesus david', 'peñaranda', 1000000.00, '2024-03-12', 'jpenaranda@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'sddddd', 1),
(25, '65e526abee6a5', 'Juan', 'Pérez', 900000.00, '2024-03-12', 'juan.perez@example.com', 'hashed_password', 'photo_url', 1),
(26, '65e526abee6a6', 'María', 'González', 800000.00, '2024-03-12', 'maria.gonzalez@example.com', 'hashed_password', 'photo_url', 1),
(27, '65e526abee6a7', 'Pedro', 'López', 700000.00, '2024-03-12', 'pedro.lopez@example.com', 'hashed_password', 'photo_url', 1),
(28, '65e526abee6a8', 'Ana', 'Martínez', 600000.00, '2024-03-12', 'ana.martinez@example.com', 'hashed_password', 'photo_url', 1),
(29, '65e526abee6a9', 'Luis', 'Sánchez', 500000.00, '2024-03-12', 'luis.sanchez@example.com', 'hashed_password', 'photo_url', 1),
(30, '65e526abee6b0', 'Laura', 'Rodríguez', 400000.00, '2024-03-12', 'laura.rodriguez@example.com', 'hashed_password', 'photo_url', 1),
(31, '65e526abee6b1', 'Carlos', 'Hernández', 300000.00, '2024-03-12', 'carlos.hernandez@example.com', 'hashed_password', 'photo_url', 1),
(32, '65e526abee6b2', 'Sofía', 'Díaz', 200000.00, '2024-03-12', 'sofia.diaz@example.com', 'hashed_password', 'photo_url', 1),
(33, '65e526abee6b3', 'Fernando', 'Gómez', 150000.00, '2024-03-12', 'fernando.gomez@example.com', 'hashed_password', 'photo_url', 1),
(34, '65e526abee6b4', 'Elena', 'Vázquez', 140000.00, '2024-03-12', 'elena.vazquez@example.com', 'hashed_password', 'photo_url', 1),
(35, '65e526abee6b5', 'Diego', 'Fernández', 130000.00, '2024-03-12', 'diego.fernandez@example.com', 'hashed_password', 'photo_url', 1),
(36, '65e526abee6b6', 'Carmen', 'Martín', 120000.00, '2024-03-12', 'carmen.martin@example.com', 'hashed_password', 'photo_url', 1),
(37, '65e526abee6b7', 'Marta', 'Jiménez', 110000.00, '2024-03-12', 'marta.jimenez@example.com', 'hashed_password', 'photo_url', 1),
(38, '65e526abee6b8', 'Javier', 'Ruiz', 100000.00, '2024-03-12', 'javier.ruiz@example.com', 'hashed_password', 'photo_url', 1),
(39, '65e545ba8762a', 'juana', 'perez', 20000.00, '2024-03-04', 'admin@example.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'sddddd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_proyectos`
--

CREATE TABLE `t_proyectos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_proyectos`
--

INSERT INTO `t_proyectos` (`id`, `nombre`, `descripcion`, `fecha_inicio`, `fecha_fin`, `id_empleado`) VALUES
(9, 'proyect_1', 'proyecto', '2024-03-07', '2024-03-23', 34);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_empleados`
--
ALTER TABLE `t_empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_proyectos`
--
ALTER TABLE `t_proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_empleados`
--
ALTER TABLE `t_empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `t_proyectos`
--
ALTER TABLE `t_proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_proyectos`
--
ALTER TABLE `t_proyectos`
  ADD CONSTRAINT `t_proyectos_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `t_empleados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
