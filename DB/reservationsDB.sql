-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: mariadb:3306
-- Tiempo de generación: 07-11-2022 a las 11:23:32
-- Versión del servidor: 10.6.10-MariaDB
-- Versión de PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservationsDB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservations`
--

CREATE TABLE `reservations` (
  `id_resource` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_time_slot` int(11) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `reservations`
--

INSERT INTO `reservations` (`id_resource`, `id_user`, `id_time_slot`, `date`, `remarks`) VALUES
(12, 7, 1, '2022-11-07', 'mío'),
(12, 6, 5, '2023-01-16', ''),
(12, 6, 12, '2022-12-14', ''),
(12, 6, 18, '2022-11-10', 'reservado'),
(12, 6, 19, '2022-11-18', 'cambio'),
(12, 6, 19, '2022-12-09', '   cambio'),
(19, 6, 19, '2022-11-18', 'me lo pido'),
(35, 7, 5, '2022-12-19', 'cambio'),
(35, 6, 19, '2022-11-11', 'cambio'),
(36, 7, 18, '2023-01-26', 'Me lo pidooo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `location` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `resources`
--

INSERT INTO `resources` (`id`, `name`, `description`, `location`, `image`) VALUES
(12, 'Ordenador portátil', 'Ordenador portátil de más de 100 años', 'aula 21', 'images/portatil.jpg'),
(17, 'Salón de actos', 'Salón de actos', 'salón de actos', 'images/salonActos.jfif'),
(19, 'Laboratorio', 'laboratorio ', 'laboratorio', 'images/laboratorio.jpg'),
(35, 'Carrito para Ordenador', 'Carro para llevar ordenadores', 'Aula 21', 'images/carrito.jpg'),
(36, 'Aula TIC', 'anteriormente conocida como biblioteca', 'aula 9', 'images/biblioteca.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `time_slots`
--

CREATE TABLE `time_slots` (
  `id` int(11) NOT NULL,
  `day_of_week` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `time_slots`
--

INSERT INTO `time_slots` (`id`, `day_of_week`, `start_time`, `end_time`) VALUES
(1, 1, '08:05:00', '09:05:00'),
(2, 1, '09:05:00', '10:05:00'),
(3, 1, '10:05:00', '11:05:00'),
(4, 1, '11:35:00', '12:35:00'),
(5, 1, '12:35:00', '13:35:00'),
(6, 1, '13:35:00', '14:35:00'),
(9, 2, '08:05:00', '09:05:00'),
(10, 2, '09:05:00', '10:05:00'),
(11, 2, '10:05:00', '11:05:00'),
(12, 3, '15:30:00', '16:30:00'),
(18, 4, '08:05:00', '09:05:00'),
(19, 5, '08:05:00', '09:05:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `realname` varchar(1000) NOT NULL,
  `type` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `realname`, `type`) VALUES
(6, 'Admin', 'contraseña', 'María Mireya Acebedo Manríquez', 'admin'),
(7, 'user', 'contraseña', 'Verónica Álvarez Martínez', 'user'),
(8, 'user2', 'contraseña', 'María de Lourdes Campos Campos', 'user'),
(14, 'user3', '407adb22f4716a6eda52d76d8cc79219', 'Delia Espinosa Hernández', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_resource`,`id_time_slot`,`date`);

--
-- Indices de la tabla `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `time_slots`
--
ALTER TABLE `time_slots`
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
-- AUTO_INCREMENT de la tabla `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `time_slots`
--
ALTER TABLE `time_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
