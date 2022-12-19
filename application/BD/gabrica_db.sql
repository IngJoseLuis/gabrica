-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2022 a las 15:59:10
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gabrica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leads`
--

CREATE TABLE `leads` (
  `id` int(11) UNSIGNED NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `nit` varchar(10) NOT NULL,
  `place` varchar(100) NOT NULL,
  `team` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `promotor` varchar(100) NOT NULL,
  `RTC` int(100) NOT NULL,
  `captain` varchar(100) NOT NULL,
  `terms` tinyint(1) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `leads`
--

INSERT INTO `leads` (`id`, `client_name`, `nit`, `place`, `team`, `city`, `promotor`, `RTC`, `captain`, `terms`, `ip`, `reg_date`) VALUES
(4, 'Julian Gomez', '346 5656 6', 'Jacks', 'Timber', 'Medellin', 'El poblado', 2334090, 'Daniel Franco', 1, '186.82.26.218', '2022-12-15 09:16:28'),
(5, 'Janeth Gallardo', '346 5656 6', 'Jacks', 'Timber', 'Medellin', 'El poblado', 2334090, 'Daniel Franco', 1, '186.82.26.218', '2022-12-05 09:16:28'),
(6, 'Raquel Cifuentes', '45678923', 'Galerias', 'HYM', 'Bogota', 'HYM', 1256456, 'Carlos Salgado', 1, '186.82.26.218', '2022-12-16 09:09:27'),
(9, 'Camila Fuentes', '45678923', 'Galerias', 'HYM', 'Bogota', 'HYM', 1256456, 'Carlos Salgado', 1, '186.82.26.218', '2022-12-17 09:09:27'),
(10, 'Gabriel Llanos', '562389 985', 'Calle 100', 'SEVEN', 'Bogota', 'SEVEN Y SEVEN', 34568565, 'Frank Hortua', 1, '186.82.26.218', '2022-12-17 09:13:18'),
(11, 'Juan Bernal', '346 5656 6', 'Jacks', 'Timber', 'Medellin', 'El poblado', 2334090, 'Daniel Franco', 1, '186.82.26.218', '2022-12-17 09:52:42'),
(12, 'Vanessa Giraldo', '3412312334', 'Jacks', 'KOK', 'Cali', 'HYM', 3123123, 'Camilo Duran', 1, '186.82.26.218', '2022-12-17 09:17:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `email`) VALUES
(1, 'Josiah', '$2y$10$9bQ9qCQQ/SJ2Iz.kP38WYOqam/.4dWYWAHxcPuYuTk6hzld5TPk5a', 'josiah@gmail.com'),
(2, 'jose', '$2y$10$vIJLS4OJb18D6oiC5/ZS2uTOVHVcn..HN1J/QWDuaIElp7iuYuOBK', 'jose@gmail.com'),
(3, 'Carlos', '$2y$10$Bc/dh80jfikKNVY/grmhr.iylFRUGmAScT/8TzLzBWqtL9Lvu70kS', 'carlos@gmail.com'),
(4, 'Winy', '$2y$10$TE/RYdSGh5MXcLhIhDFKKOqFqlxUyAZD6tb94MU8bQ3C8rggHdczu', 'winy@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
