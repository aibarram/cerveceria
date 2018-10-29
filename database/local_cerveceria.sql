-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-10-2018 a las 11:12:58
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `local_cerveceria`
--
CREATE DATABASE IF NOT EXISTS `local_cerveceria` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `local_cerveceria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beer`
--

DROP TABLE IF EXISTS `beer`;
CREATE TABLE IF NOT EXISTS `beer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Descripcion de la cerveza',
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la cerveza',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Esta activo?',
  `cervceria` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`id`),
  KEY `index_cervceria` (`cervceria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brewery`
--

DROP TABLE IF EXISTS `brewery`;
CREATE TABLE IF NOT EXISTS `brewery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la cervecería',
  `description` varchar(128) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Descripción de la cervecería',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Esta activa?',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
CREATE TABLE IF NOT EXISTS `ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del ingrediente',
  `name` varchar(32) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del ingrediente',
  `description` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Descripcion del ingrediente',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Esta activo?',
  UNIQUE KEY `unique_id` (`id`),
  UNIQUE KEY `unique_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `qualification`
--

DROP TABLE IF EXISTS `qualification`;
CREATE TABLE IF NOT EXISTS `qualification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Descripcion de la categoría',
  `active` tinyint(1) NOT NULL,
  UNIQUE KEY `unique_id` (`id`),
  UNIQUE KEY `unique_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beer` int(11) NOT NULL,
  UNIQUE KEY `unique_id` (`id`),
  KEY `index_beer` (`beer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scale`
--

DROP TABLE IF EXISTS `scale`;
CREATE TABLE IF NOT EXISTS `scale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del valor de la escala',
  `description` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Descripcion del valor de la escala',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Esta activo?',
  UNIQUE KEY `unique_id` (`id`),
  KEY `index_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_spanish_ci NOT NULL COMMENT 'nombre del tipo',
  `description` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Descripcion del tipo',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Esta activo?',
  UNIQUE KEY `unique_name` (`name`),
  UNIQUE KEY `unique_id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
