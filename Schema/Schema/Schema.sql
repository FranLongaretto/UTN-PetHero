-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2022 a las 00:48:44
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pethero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

CREATE TABLE `book` (
  `id` int(10) NOT NULL,
  `idKeeper` int(10) NOT NULL,
  `idOwner` int(10) NOT NULL,
  `idKeeperBook` int(10) NOT NULL,
  `dateStart` date NOT NULL,
  `dateEnd` date NOT NULL,
  `bookPrice` int(50) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`id`, `idKeeper`, `idOwner`, `idKeeperBook`, `dateStart`, `dateEnd`, `bookPrice`, `status`) VALUES
(13, 31, 32, 12, '2022-11-06', '2022-11-09', 1800, 'confirmed');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `keeper`
--

CREATE TABLE `keeper` (
  `id` int(11) NOT NULL,
  `idKeeper` int(10) NOT NULL,
  `typePet` varchar(100) NOT NULL,
  `size` varchar(50) NOT NULL,
  `salary` float NOT NULL,
  `available` varchar(10) NOT NULL,
  `dateStart` date NOT NULL,
  `dateEnd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `keeper`
--

INSERT INTO `keeper` (`id`, `idKeeper`, `typePet`, `size`, `salary`, `available`, `dateStart`, `dateEnd`) VALUES
(11, 31, 'cat', 'small', 400, 'true', '2022-11-06', '2022-11-10'),
(12, 31, 'cat', 'big', 600, 'true', '2022-11-06', '2022-11-11'),
(13, 31, 'dog', 'medium', 600, 'true', '2022-11-06', '2022-11-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pet`
--

CREATE TABLE `pet` (
  `id` int(10) NOT NULL,
  `idUser` int(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `race` varchar(25) NOT NULL,
  `size` varchar(25) NOT NULL,
  `vaccination` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pet`
--

INSERT INTO `pet` (`id`, `idUser`, `type`, `race`, `size`, `vaccination`, `description`, `image`) VALUES
(37, 30, 'Cat', 'naranja', 'small', 'vacunacionCollie.jpg', 'ta re loco', 'gato-naranja-sentado-redes.jpg'),
(38, 32, 'Dog', 'Snoop', 'medium', 'recetas.jpg', 'Doggy Dog', 'snoop.jpg'),
(39, 32, 'Cat', 'Siames', 'small', 'recetas.jpg', 'Ponchi', 'siames.jpg'),
(40, 32, 'Dog', 'Pastor Aleman', 'big', 'recetas.jpg', 'Perro amigable y le gusta jugar', 'pastor.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL,
  `firstName` varchar(250) NOT NULL,
  `lastName` varchar(250) NOT NULL,
  `dni` varchar(250) NOT NULL,
  `phoneNumber` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `firstName`, `lastName`, `dni`, `phoneNumber`) VALUES
(29, 'user@myapp.com', '$2y$10$06N2QpId4i7BcONIbG8JpOklcBZM5NJ2sS0NjIXBbp2buxm/B6y/q', 'Owner', 'carlos', 'lopez', '36384624', '2223322'),
(30, 'germa@gmail.com', '$2y$10$tf0KE/jVWnqLDxLxKalzrO8APsKVSepwPcQWDgBqSTmgS7mXo9t2.', 'Owner', 'german', 'oyarzo', '36363950', '2223322'),
(31, 'fran@gmail.com', '$2y$10$vTaC1p500BhObqY5lBWiE.xKiqB0Le7pgsLP9xxM97nKe3vFMG/qO', 'Keeper', 'fran', 'logaretto', '36384623334', '2223322'),
(32, 'franlongaretto@gmail.com', '$2y$10$qYkOJISBoTEQ.M2S5Us.b.f1YzWXxshTn7ZNLJHOMLD4oDeaG191O', 'Owner', 'Franco', 'Longaretto', '123654', '222333444');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `keeper`
--
ALTER TABLE `keeper`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `book`
--
ALTER TABLE `book`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `keeper`
--
ALTER TABLE `keeper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
