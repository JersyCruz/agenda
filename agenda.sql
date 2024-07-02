-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2024 a las 00:01:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda_jersy`
--

CREATE TABLE `agenda_jersy` (
  `id` int(11) NOT NULL,
  `tarea` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_termino` date DEFAULT NULL,
  `estado` enum('terminada','incompleta','a_medias') NOT NULL DEFAULT 'incompleta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `agenda_jersy`
--

INSERT INTO `agenda_jersy` (`id`, `tarea`, `descripcion`, `fecha_inicio`, `fecha_termino`, `estado`) VALUES
(1, 'Realizar el papelo para titulación - ISPHDE', 'tengo identificado los papeles, solo faltaría la respuesta de LEE', '2024-07-04', '2024-07-17', 'incompleta'),
(2, 'Realizar el papelo para titulación - ISPHDE', 'tengo identificado los papeles, solo faltaría la respuesta de LEE', '2024-07-02', '2024-07-17', 'incompleta'),
(3, 'Realizar el papelo para titulación - ISPHDE', 'tengo identificado los papeles, solo faltaría la respuesta de LEE', '2024-07-02', '2024-07-17', 'incompleta'),
(4, 'Realizar el papelo para titulación - ISPHDE', 'tengo identificado los papeles, solo faltaría la respuesta de LEE', '2024-07-02', '2024-07-17', 'incompleta'),
(5, 'Realizar el papelo para titulación - ISPHDE', 'tengo identificado los papeles, solo faltaría la respuesta de LEE', '2024-07-02', '2024-07-17', 'incompleta'),
(6, 'Realizar el papelo para titulación - ISPHDE', 'Tengo los papeles necesarios, pero la espera de los del Sr. Richard es de 1 semana', '2024-07-02', '2024-07-17', 'incompleta'),
(7, 'Ordnear Cuarto', 'Se ordenan y se ubica los dispositivos eléctricos', '2024-07-02', '2024-07-03', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda_jersy`
--
ALTER TABLE `agenda_jersy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda_jersy`
--
ALTER TABLE `agenda_jersy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
