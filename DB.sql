-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2017 a las 01:48:13
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_web_4_test`
--
CREATE DATABASE IF NOT EXISTS `db_web_4_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_web_4_test`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `page`
--

CREATE TABLE `page` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `page`
--

INSERT INTO `page` (`id`, `title`) VALUES
(1, 'Home'),
(2, 'Aboutus'),
(3, 'contact'),
(4, 'Login'),
(5, 'Register');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_data`
--

CREATE TABLE `password_data` (
  `id` int(100) UNSIGNED NOT NULL,
  `id_user` int(100) UNSIGNED NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='id_user es  al usuario al que pertenece el registro';

--
-- Volcado de datos para la tabla `password_data`
--

INSERT INTO `password_data` (`id`, `id_user`, `password`) VALUES
(1, 1, '123'),
(2, 1, '1234'),
(3, 1, 'tachotl'),
(4, 1, 'ninoyuki20'),
(5, 1, 'SergioAnastacio20'),
(6, 2, 'yudit22'),
(7, 2, 'kahuates'),
(8, 2, 'pistaches'),
(9, 2, 'ilovelolis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_data`
--

CREATE TABLE `users_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(64) NOT NULL,
  `nombre` varchar(24) NOT NULL,
  `apellido_paterno` varchar(12) NOT NULL,
  `apellido_materno` varchar(12) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='columna telefono  es un numero.';

--
-- Volcado de datos para la tabla `users_data`
--

INSERT INTO `users_data` (`id`, `email`, `nombre`, `apellido_paterno`, `apellido_materno`, `telefono`) VALUES
(1, 'senao28@prodigy.net.mx', 'Tachool', 'angulo', 'rosales', '3111646067'),
(2, 'senao28@icloud.com', 'Sergio', 'angulo', 'rosales', '3111646067'),
(3, 'tachoo@tachoo.xyz', 'Uriel', 'angulo', 'rosales', '3111646067'),
(4, 'tachoouniat@hotmail.com', 'Rosario', 'rosales', 'quinones', '3111646067'),
(5, 'huerta98@prodigy.net.mx', 'Sergio', 'angulo', 'sagrero', '3111646067');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_data`
--
ALTER TABLE `password_data`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `page`
--
ALTER TABLE `page`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `password_data`
--
ALTER TABLE `password_data`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
