-- sql paracrear la bd
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-03-2024 a las 21:12:43
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
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_empleados`
--

INSERT INTO `t_empleados` (`id`, `uid`, `nombres`, `apellidos`, `salario`, `fecha_contratacion`, `email`, `estado`) VALUES
(23, '65e526abee6a4', 'jesus david', 'peñaranda', 1000000.00, '2024-03-12', 'jpenaranda@gmail.com', 1),
(25, '65e526abee6a5', 'Juan', 'Pérez', 900000.00, '2024-03-12', 'juan.perez@example.com', 1),
(26, '65e526abee6a6', 'María', 'González', 800000.00, '2024-03-12', 'maria.gonzalez@example.com', 1),


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
(9, 'proyect_1', ' proyecto', '2024-03-18', '2024-03-23', 34),
(11, 'PROYECTO-2', 'prueba', '2024-03-06', '2024-03-28', 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id` int(11) NOT NULL,
  `uid` varchar(256) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `estado` int(1) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id`, `uid`, `nombres`, `correo`, `estado`, `contraseña`, `rol`) VALUES
(4, '65e5fbbb1a46b', 'administrador', 'administrador@gmail.com', 1, '8bb0cf6eb9b17d0f7d22b456f121257dc1254e1f01665370476383ea776df414', 1),
(5, '65e5fdc112a8a', 'usuario 1', 'usuario@gmail.com', 1, '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 2),
(6, '65e6003b3b6e7', 'editor 1', 'editor@gmail.com', 1, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 3);

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
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_empleados`
--
ALTER TABLE `t_empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `t_proyectos`
--
ALTER TABLE `t_proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
