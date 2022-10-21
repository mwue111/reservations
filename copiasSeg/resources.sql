-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: mariadb:3306
-- Tiempo de generación: 17-10-2022 a las 09:39:27
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
(9, 'carrito ordenador', 'Carrito para transportar ordenadores', 'Aula 21', 'images/carrito.jpg'),
(12, 'prueba', 'prueba', 'prueba', 'images/ordenador.jfif');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
