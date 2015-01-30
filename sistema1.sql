-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2015 a las 03:08:45
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistema1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estaciones`
--

CREATE TABLE IF NOT EXISTS `estaciones` (
  `id_estacion` int(11) NOT NULL AUTO_INCREMENT,
  `numero_estacion` int(11) NOT NULL,
  `nombre_estacion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo_estacion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `numero_ruta` int(11) DEFAULT NULL,
  `info_estacion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `latitud_est` decimal(10,6) DEFAULT NULL,
  `longitud_est` decimal(10,6) DEFAULT NULL,
  PRIMARY KEY (`id_estacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `estaciones`
--

INSERT INTO `estaciones` (`id_estacion`, `numero_estacion`, `nombre_estacion`, `tipo_estacion`, `numero_ruta`, `info_estacion`, `latitud_est`, `longitud_est`) VALUES
(1, 1, 'Terminal de pasajeros', 'Inicio', 1, 'Esta es la estaciÃ³n inicial de la ruta', '10.243290', '-67.587220'),
(2, 2, 'San AgustÃ­n', 'Intermedia', 1, 'EstaciÃ³n de la bomba de san agustÃ­n', '10.245701', '-67.587631'),
(3, 3, 'Parque Aragua', 'Intermedia', 1, 'Estacion del C.C. Parque aragua', '10.248490', '-67.586226'),
(4, 4, 'Colegia de Contadores', 'Intermedia', 1, 'EstaciÃ³n de Colegio de contadores.', '10.247943', '-67.583198'),
(5, 5, 'Hospital militar', 'Intermedia', 1, 'EstaciÃ³n del hospital militar', '10.246676', '-67.579251'),
(6, 6, 'IPSFA', 'Intermedia', 1, 'EstaciÃ³n del IPSFA', '10.244827', '-67.574023'),
(7, 7, 'San Jacinto', 'Final', 1, 'EstaciÃ³n Del C.C. Parque san jacinto', '10.240186', '-67.562462');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_evento` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `desc_evento` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `hora_fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `tipo_evento`, `desc_evento`, `hora_fecha`, `id_usuario`) VALUES
(1, 'InserciÃ³n', 'Datos insertados en tabla: rutas Ref.Id: 1', '2015-01-28 15:15:42', 9),
(2, 'Acceso', 'Acceso de usuario', '2015-01-28 15:40:59', 9),
(3, 'InserciÃ³n', 'Datos insertados en tabla: unidades Ref.Id: 1', '2015-01-28 15:47:37', 9),
(4, 'InserciÃ³n', 'Datos insertados en tabla: unidades Ref.Id: 2', '2015-01-28 15:49:46', 9),
(5, 'InserciÃ³n', 'Datos insertados en tabla: unidades Ref.Id: 3', '2015-01-28 15:50:39', 9),
(6, 'InserciÃ³n', 'Datos insertados en tabla: unidades Ref.Id: 4', '2015-01-28 15:53:11', 9),
(7, 'InserciÃ³n', 'Datos insertados en tabla: unidades Ref.Id: 5', '2015-01-28 15:54:19', 9),
(8, 'InserciÃ³n', 'Datos insertados en tabla: estaciones Ref.Id: 1', '2015-01-28 16:03:49', 9),
(9, 'ActualizaciÃ³n', 'Datos actualizados en tabla: estaciones Ref.Id: 1', '2015-01-28 16:10:32', 9),
(10, 'InserciÃ³n', 'Datos insertados en tabla: estaciones Ref.Id: 2', '2015-01-28 16:14:02', 9),
(11, 'InserciÃ³n', 'Datos insertados en tabla: estaciones Ref.Id: 3', '2015-01-28 16:17:53', 9),
(12, 'ActualizaciÃ³n', 'Datos actualizados en tabla: estaciones Ref.Id: 1', '2015-01-28 16:23:52', 9),
(13, 'ActualizaciÃ³n', 'Datos actualizados en tabla: estaciones Ref.Id: 2', '2015-01-28 16:26:20', 9),
(14, 'ActualizaciÃ³n', 'Datos actualizados en tabla: estaciones Ref.Id: 3', '2015-01-28 16:28:09', 9),
(15, 'InserciÃ³n', 'Datos insertados en tabla: estaciones Ref.Id: 4', '2015-01-28 16:31:40', 9),
(16, 'InserciÃ³n', 'Datos insertados en tabla: estaciones Ref.Id: 5', '2015-01-28 16:34:54', 9),
(17, 'InserciÃ³n', 'Datos insertados en tabla: estaciones Ref.Id: 6', '2015-01-28 16:38:59', 9),
(18, 'InserciÃ³n', 'Datos insertados en tabla: estaciones Ref.Id: 7', '2015-01-28 16:45:36', 9),
(19, 'Acceso', 'Acceso de usuario', '2015-01-28 16:59:44', 9),
(20, 'InserciÃ³n', 'Datos insertados en tabla: rutas Ref.Id: 2', '2015-01-28 17:11:18', 9),
(21, 'EliminaciÃ³n', 'Datos eliminados en tabla: rutas Ref.Id: 2', '2015-01-28 17:12:45', 9),
(22, 'InserciÃ³n', 'Datos insertados en tabla: rutas Ref.Id: 3', '2015-01-28 17:16:46', 9),
(23, 'Acceso', 'Acceso de usuario', '2015-01-29 08:34:02', 9),
(24, 'Acceso', 'Acceso de usuario', '2015-01-29 09:31:45', 15),
(25, 'Acceso', 'Acceso de usuario', '2015-01-29 09:49:33', 15),
(26, 'Acceso', 'Acceso de usuario', '2015-01-29 09:53:27', 15),
(27, 'Acceso', 'Acceso de usuario', '2015-01-29 09:53:55', 15),
(28, 'Acceso', 'Acceso de usuario', '2015-01-29 10:34:35', 15),
(29, 'Acceso', 'Acceso de usuario', '2015-01-29 21:14:17', 9),
(30, 'EliminaciÃ³n', 'Datos eliminados en tabla: rutas Ref.Id: ', '2015-01-29 21:15:07', 9),
(31, 'EliminaciÃ³n', 'Datos eliminados en tabla: rutas Ref.Id: 3', '2015-01-29 21:15:15', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE IF NOT EXISTS `rutas` (
  `id_ruta` int(11) NOT NULL AUTO_INCREMENT,
  `numero_ruta` int(5) NOT NULL,
  `tipo_ruta` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_ruta` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tiempo_ruta` int(11) NOT NULL,
  `info_ruta` text COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_ruta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `rutas`
--

INSERT INTO `rutas` (`id_ruta`, `numero_ruta`, `tipo_ruta`, `nombre_ruta`, `tiempo_ruta`, `info_ruta`) VALUES
(1, 1, 'Normal', 'Terminal - San Jacinto', 15, 'Este es una ruta que empieza en el terminal de pasajeros, pasa por el hospital militar y termina en san jacinto.\r\nInicia sus operaciones a las 6:30 am\r\nFinaliza a las 8:00 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE IF NOT EXISTS `unidades` (
  `id_unidad` int(11) NOT NULL AUTO_INCREMENT,
  `numero_unidad` int(11) NOT NULL,
  `nombre_unidad` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `numero_ruta` int(11) DEFAULT NULL,
  `info_unidad` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `longitud_uni` float DEFAULT NULL,
  `latitud_uni` float DEFAULT NULL,
  PRIMARY KEY (`id_unidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`id_unidad`, `numero_unidad`, `nombre_unidad`, `numero_ruta`, `info_unidad`, `longitud_uni`, `latitud_uni`) VALUES
(1, 1, 'Unidad 1', 1, 'La unidad 1 tiene una capacidad para 150 pasajeros, 30 asientos, cuenta con 2 puertas automÃ¡ticas. ', NULL, NULL),
(2, 2, 'Unidad 2', 0, 'La unidad 2 tiene una capacidad para 80 pasajeros, 20 asientos y cuenta con 1 puerta automÃ¡tica.', NULL, NULL),
(3, 3, 'Unidad 3', 0, 'La unidad 3 tiene una capacidad para 300 pasajeros, 60 asientos y cuenta con 3 puertas automÃ¡ticas.', NULL, NULL),
(4, 4, 'Unidad 4', 0, 'La unidad 4 tiene una capacidad para 50 pasajeros, 15 asientos y cuenta con 1 puerta automÃ¡tica.', NULL, NULL),
(5, 5, 'Unidad 5', 0, 'La unidad 5 tiene una capacidad para 100 pasajeros, 25 asientos y cuenta con 2 puertas automÃ¡ticas.', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `rol` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol`, `usuario`, `clave`, `nombre_usuario`, `email`) VALUES
(9, 'admin', 'moises', '1234', 'Moises Jimenez', 'correoejemplo@gmail.com'),
(10, 'user', 'user', '1234', 'Usuario del sistema', 'emailejemplo@ejemplo.com'),
(15, 'admin', 'admin', 'admin', 'Administrador del sistema', 'emailejemplo@ejemplo.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
