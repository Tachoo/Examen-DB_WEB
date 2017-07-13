-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2017 a las 08:53:09
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u720179037_3exam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_data`
--

CREATE TABLE `content_data` (
  `id` int(100) UNSIGNED NOT NULL,
  `page_id` int(100) NOT NULL,
  `titleclass` int(10) NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `descclass` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `subbanerclass` int(11) NOT NULL,
  `subbaner` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de contenido en el cuerpo de la pagina';

--
-- Volcado de datos para la tabla `content_data`
--

INSERT INTO `content_data` (`id`, `page_id`, `titleclass`, `title`, `descclass`, `description`, `subbanerclass`, `subbaner`) VALUES
(1, 4, 2, 'Soluciones a tus exigencias mas altas', 1, 'Solucionamos tus problemas de conectividad en un par de clicks.<br><br>', 3, '1.jpg'),
(2, 2, 1, 'TestTitleOFPage', 2, 'this desc is a desc of this page ', 1, '1.jpg'),
(3, 3, 1, '', 0, '', 1, '1.jpg'),
(4, 1, 2, 'Galery', 0, '', 0, ''),
(5, 5, 2, 'Contact US', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galery_data`
--

CREATE TABLE `galery_data` (
  `id` int(100) UNSIGNED NOT NULL,
  `titulo` varchar(64) NOT NULL,
  `imagen` varchar(64) NOT NULL,
  `descripcion` text NOT NULL,
  `page_id` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla donde albergamos los daros de imágenes';

--
-- Volcado de datos para la tabla `galery_data`
--

INSERT INTO `galery_data` (`id`, `titulo`, `imagen`, `descripcion`, `page_id`) VALUES
(1, 'titulo', '1.jpg', 'descripcion', 1),
(2, 'titulo', '2.jpg', 'descripcion', 1),
(3, 'titulo', '3.jpg', 'descripcion', 2),
(4, 'titulo', '4.jpg', 'descripcion', 3),
(5, 'titulo', '5.jpg', 'descripcion', 1),
(6, 'titulo', '6.jpg', 'descripcion', 1),
(7, 'titulo', '7.jpg', 'descripcion', 1),
(8, 'titulo', '8.jpg', 'descripcion', 1),
(9, 'titulo', '9.jpg', 'descripcion', 1),
(10, 'titulo', '10.jpg', 'descripcion', 2),
(11, 'asas', '11.jpg', 'ssdsdf', 2),
(12, 'asas', '12.jpg', 'ssdsdf', 2),
(13, 'asas', '13.jpg', 'ssdsdf', 3),
(14, 'asas', '14.jpg', 'ssdsdf', 4),
(15, 'asas', '15.jpg', 'ssdsdf', 5),
(16, 'asas', '16.jpg', 'ssdsdf', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `page_data`
--

CREATE TABLE `page_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `page_data`
--

INSERT INTO `page_data` (`id`, `title`) VALUES
(1, 'Home'),
(2, 'Aboutus'),
(3, 'Works'),
(4, 'Galery'),
(5, 'Contact'),
(7, 'test'),
(9, 'test');

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
(9, 5, 'ilovelolis');

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
  `telefono` varchar(15) NOT NULL,
  `profilepic` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='columna telefono  es un numero.';

--
-- Volcado de datos para la tabla `users_data`
--

INSERT INTO `users_data` (`id`, `email`, `nombre`, `apellido_paterno`, `apellido_materno`, `telefono`, `profilepic`) VALUES
(1, 'senao28@prodigy.net.mx', 'Tachool', 'angulo', 'rosales', '3111646067', 'kakashi.jpg'),
(2, 'senao28@icloud.com', 'Sergio', 'angulo', 'rosales', '3111646067', 'obito.jpg'),
(3, 'tachoo@tachoo.xyz', 'Uriel', 'angulo', 'rosales', '3111646067', 'hinata.jpg'),
(4, 'tachoouniat@hotmail.com', 'Rosario', 'rosales', 'quinones', '3111646067', 'boruto.jpg'),
(5, 'huerta98@prodigy.net.mx', 'Sergio', 'angulo', 'sagrero', '3111646067', 'uzumaki.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `content_data`
--
ALTER TABLE `content_data`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galery_data`
--
ALTER TABLE `galery_data`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `page_data`
--
ALTER TABLE `page_data`
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
-- AUTO_INCREMENT de la tabla `content_data`
--
ALTER TABLE `content_data`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `galery_data`
--
ALTER TABLE `galery_data`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `page_data`
--
ALTER TABLE `page_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
