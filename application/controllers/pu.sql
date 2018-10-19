-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-09-2017 a las 19:15:32
-- Versión del servidor: 5.5.50
-- Versión de PHP: 5.3.10-1ubuntu3.24

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pu_`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pu_alerta`
--

DROP TABLE IF EXISTS `pu_alerta`;
CREATE TABLE IF NOT EXISTS `pu_alerta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL DEFAULT 'Sin nombre',
  `fecha` varchar(10) NOT NULL,
  `hora` varchar(5) NOT NULL DEFAULT '0',
  `asignatura` int(11) NOT NULL,
  `alerta` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pu_apunte`
--

DROP TABLE IF EXISTS `pu_apunte`;
CREATE TABLE IF NOT EXISTS `pu_apunte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asignatura` int(11) NOT NULL,
  `apunte` varchar(300) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `nombre` varchar(70) NOT NULL DEFAULT 'Sin nombre',
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pu_asignatura`
--

DROP TABLE IF EXISTS `pu_asignatura`;
CREATE TABLE IF NOT EXISTS `pu_asignatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `codigo` varchar(7) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `creditos` int(2) NOT NULL,
  `nota` varchar(70) DEFAULT NULL,
  `publico` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pu_calificable`
--

DROP TABLE IF EXISTS `pu_calificable`;
CREATE TABLE IF NOT EXISTS `pu_calificable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL DEFAULT 'Sin nombre',
  `porcentaje` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `asignatura` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pu_chat`
--

DROP TABLE IF EXISTS `pu_chat`;
CREATE TABLE IF NOT EXISTS `pu_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(1) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `pu_chat`
--

INSERT INTO `pu_chat` (`id`, `tipo`, `descripcion`, `nombre`, `usuario`) VALUES
(1, 1, '', '_9999999999_9999999999_', 2),
(2, 1, '', '_9999999999_3158414498_', 1),
(3, 0, 'test 2', 'first group', 1),
(4, 1, '', '_9999999999_1111111111_', 3),
(5, 1, '', '_1234567890_1111111111_', 4),
(6, 1, '', '_3158414498_1111111111_', 1),
(7, 1, '', '_9999999999_1234567890_', 2),
(8, 1, '', '_9999999999_2000000000_', 2),
(9, 0, 'testing''s', 'Group t', 6),
(10, 1, '', '_3158414498_1234567890_', 1),
(11, 1, '', '_3158414498_2000000000_', 1),
(12, 1, '', '_2000000000_1234567890_', 4),
(13, 0, 'test', 'Test', 1),
(14, 0, 'group', 'me group', 1),
(15, 0, '...', 'RITMO', 1),
(16, 0, '', 'Times where', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pu_estado_mensaje`
--

DROP TABLE IF EXISTS `pu_estado_mensaje`;
CREATE TABLE IF NOT EXISTS `pu_estado_mensaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `pu_estado_mensaje`
--

INSERT INTO `pu_estado_mensaje` (`id`, `estado`) VALUES
(-1, 'eliminado'),
(0, 'nuevo'),
(1, 'notificado'),
(2, 'leido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pu_feedback`
--

DROP TABLE IF EXISTS `pu_feedback`;
CREATE TABLE IF NOT EXISTS `pu_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pu_horario`
--

DROP TABLE IF EXISTS `pu_horario`;
CREATE TABLE IF NOT EXISTS `pu_horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asignatura` int(11) NOT NULL,
  `dia` varchar(10) NOT NULL,
  `hora` varchar(5) NOT NULL,
  `duracion` int(1) NOT NULL,
  `ubicacion` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pu_lectura`
--

DROP TABLE IF EXISTS `pu_lectura`;
CREATE TABLE IF NOT EXISTS `pu_lectura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asignatura` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL DEFAULT 'Sin nombre',
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pu_mensaje`
--

DROP TABLE IF EXISTS `pu_mensaje`;
CREATE TABLE IF NOT EXISTS `pu_mensaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `chat` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `dato` text NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Volcado de datos para la tabla `pu_mensaje`
--

INSERT INTO `pu_mensaje` (`id`, `usuario`, `chat`, `tipo`, `dato`, `estado`, `fecha`) VALUES
(1, 2, 1, 'inicio', '', 0, '2017-08-23 17:06:13'),
(2, 2, 1, 'inicio', '', 0, '2017-08-23 17:06:13'),
(3, 1, 2, 'inicio', '', 1, '2017-08-23 17:08:02'),
(4, 2, 2, 'inicio', '', 2, '2017-08-23 17:08:02'),
(5, 2, 2, 'mensaje', 'Hola?', 2, '2017-08-23 17:08:16'),
(6, 2, 2, 'inicio', '', 2, '2017-08-23 17:10:19'),
(7, 1, 2, 'inicio', '', 1, '2017-08-23 17:10:19'),
(8, 1, 2, 'mensaje', 'why not recive messages?', 1, '2017-08-23 17:11:13'),
(9, 2, 2, 'mensaje', 'ok, send! is anything', 1, '2017-08-23 17:11:59'),
(10, 2, 2, 'mensaje', 'yes is anything.', 1, '2017-08-23 17:12:31'),
(11, 1, 3, 'mensaje', 'Grupo iniciado', 2, '2017-08-23 17:13:35'),
(12, 2, 3, 'inicio', '9999999999 fue agregado', 2, '2017-08-23 17:13:50'),
(13, 1, 3, 'mensaje', 'hi!', 2, '2017-08-23 17:14:24'),
(14, 2, 3, 'mensaje', 'this group is not registering messages', 2, '2017-08-23 17:15:12'),
(15, 2, 3, 'mensaje', 'ho yeah!', 2, '2017-08-23 17:16:05'),
(16, 2, 3, 'mensaje', 'yes is registering', 2, '2017-08-23 17:16:17'),
(17, 2, 3, 'mensaje', 'is strange', 2, '2017-08-23 17:16:50'),
(18, 1, 3, 'mensaje', 'good that more give', 2, '2017-08-23 17:17:24'),
(19, 1, 3, 'edicion', 'Datos del grupo, cambiados\nNombre anterior: first group\nDescripcion anterior: test\nNuevo nombre: first group\nNueva descripcion: test 2', 2, '2017-08-23 17:18:17'),
(20, 2, 3, 'asignatura', '{"id":"4408","usuario":"2","codigo":"204001M","nombre":"ESPA\\u00d1OL","creditos":"3","nota":"Academic Glider","publico":"2"}', 2, '2017-08-23 17:20:16'),
(21, 2, 3, 'asignatura', '{"id":"4410","usuario":"2","codigo":"204140M","nombre":"LECTURA TEXTOS ACAD\\u00c9MICOS EN INGL\\u00c9S III","creditos":"3","nota":"Academic Glider","publico":"2"}', 0, '2017-08-23 17:20:57'),
(22, 3, 4, 'inicio', '', 1, '2017-08-23 17:25:19'),
(23, 2, 4, 'inicio', '', 1, '2017-08-23 17:25:19'),
(24, 2, 4, 'mensaje', 'Hola como estas?', 1, '2017-08-23 17:25:36'),
(25, 3, 4, 'mensaje', 'Bien y tu?', 1, '2017-08-23 17:25:55'),
(26, 2, 4, 'mensaje', 'Bien tambien gracias a Dios', 1, '2017-08-23 17:26:26'),
(27, 2, 4, 'mensaje', '....', 1, '2017-08-23 17:26:34'),
(28, 2, 4, 'asignatura', '{"id":"4412","usuario":"2","codigo":"204001M","nombre":"ESPA\\u00d1OL","creditos":"3","nota":"Academic Glider","publico":"2"}', 1, '2017-08-23 18:42:37'),
(29, 4, 5, 'inicio', 'Inicio chat', 1, '2017-08-23 19:02:23'),
(30, 3, 5, 'inicio', 'Inicio chat', 1, '2017-08-23 19:02:23'),
(31, 3, 5, 'mensaje', 'Hola, como estas?', 1, '2017-08-23 19:03:01'),
(32, 4, 5, 'mensaje', 'Hola, bien y tu?', 1, '2017-08-23 19:03:21'),
(33, 3, 5, 'mensaje', 'vastante bien gracias a Dios', 1, '2017-08-23 19:04:10'),
(34, 3, 5, 'mensaje', 'y que te cuentas?', 1, '2017-08-23 19:04:22'),
(35, 4, 5, 'mensaje', 'pues no mucho la verdad, mejor dime, tu que?', 1, '2017-08-23 19:05:10'),
(36, 4, 5, 'mensaje', 'cuentate algo', 1, '2017-08-23 19:05:40'),
(37, 4, 5, 'mensaje', '????????', 1, '2017-08-23 19:08:45'),
(38, 1, 6, 'inicio', 'Inicio chat', 1, '2017-08-23 20:27:20'),
(39, 3, 6, 'inicio', 'Inicio chat', 0, '2017-08-23 20:27:20'),
(40, 3, 6, 'mensaje', 'Hola como estas?', 0, '2017-08-23 20:27:35'),
(41, 3, 5, 'mensaje', 'Hola?', 1, '2017-08-23 20:28:39'),
(42, 2, 7, 'inicio', 'Inicio chat', 2, '2017-08-23 20:35:08'),
(43, 4, 7, 'inicio', 'Inicio chat', 1, '2017-08-23 20:35:08'),
(44, 4, 7, 'mensaje', 'hola?', 1, '2017-08-23 20:35:57'),
(45, 2, 7, 'mensaje', 'como estas?', 1, '2017-08-23 20:36:19'),
(46, 4, 7, 'mensaje', 'bien y tu?', 1, '2017-08-23 20:36:37'),
(47, 2, 7, 'mensaje', ':P', 1, '2017-08-23 20:36:51'),
(48, 4, 7, 'mensaje', '...', 1, '2017-08-23 20:37:32'),
(49, 2, 7, 'mensaje', ',,,', 1, '2017-08-23 20:37:41'),
(50, 1, 2, 'inicio', 'Inicio chat', 1, '2017-08-24 21:09:56'),
(51, 2, 2, 'inicio', 'Inicio chat', 1, '2017-08-24 21:09:56'),
(52, 2, 2, 'mensaje', 'what is now?', 1, '2017-08-24 21:11:02'),
(53, 1, 2, 'mensaje', 'hi?', 1, '2017-08-24 21:12:16'),
(54, 2, 2, 'asignatura', '{"id":"4417","usuario":"2","codigo":"405067M","nombre":"GEOMETR\\u00cdA ANAL\\u00cdTICA Y VECTORIAL","creditos":"4","nota":"Academic Glider","publico":"2"}', 1, '2017-08-24 21:12:26'),
(55, 2, 8, 'inicio', 'Inicio chat', 2, '2017-08-26 07:25:03'),
(56, 6, 8, 'inicio', 'Inicio chat', 0, '2017-08-26 07:25:03'),
(57, 6, 8, 'mensaje', 'Hola?', 0, '2017-08-26 07:25:25'),
(58, 6, 8, 'mensaje', 'Hooola!?', 0, '2017-08-26 07:26:02'),
(59, 6, 8, 'mensaje', '...', 0, '2017-08-26 07:26:47'),
(60, 6, 9, 'mensaje', 'Grupo iniciado', 2, '2017-08-26 07:27:56'),
(61, 1, 9, 'inicio', '3158414498 fue agregado', 2, '2017-08-26 07:28:09'),
(62, 4, 9, 'inicio', '1234567890 fue agregado', -1, '2017-08-26 07:28:09'),
(63, 2, 9, 'inicio', '9999999999 fue agregado', 2, '2017-08-26 07:28:09'),
(64, 3, 9, 'inicio', '1111111111 fue agregado', 2, '2017-08-26 07:28:09'),
(65, 6, 9, 'mensaje', 'Ready! Group made', 2, '2017-08-26 07:28:48'),
(66, 4, 7, 'inicio', 'Inicio chat', 0, '2017-08-26 07:29:39'),
(67, 2, 7, 'inicio', 'Inicio chat', 0, '2017-08-26 07:29:39'),
(68, 6, 9, 'asignatura', '{"id":"4421","usuario":"6","codigo":"204101M","nombre":"LECTURA DE TEXTOS ACAD\\u00c9MICOS EN INGL\\u00c9S I","creditos":"3","nota":"Academic Glider","publico":"2"}', 2, '2017-08-26 07:32:23'),
(69, 1, 10, 'inicio', 'Inicio chat', 1, '2017-08-26 07:33:36'),
(70, 4, 10, 'inicio', 'Inicio chat', 1, '2017-08-26 07:33:36'),
(71, 4, 10, 'mensaje', 'that wave?', 1, '2017-08-26 07:34:12'),
(72, 1, 10, 'mensaje', 'hola', 1, '2017-08-26 07:34:47'),
(73, 1, 9, 'mensaje', '...', 2, '2017-08-26 07:35:06'),
(74, 4, 9, 'asignatura', '{"id":"4422","usuario":"4","codigo":"111050M","nombre":"C\\u00c1LCULO I","creditos":"4","nota":"Academic Glider","publico":"2"}', -1, '2017-08-26 07:36:34'),
(75, 4, 9, 'mensaje', 'si? y que mas?', -1, '2017-08-26 07:37:01'),
(76, 4, 9, 'mensaje', 'jajajaja', -1, '2017-08-26 07:37:10'),
(77, 6, 9, 'mensaje', 'now?', 2, '2017-08-26 07:37:50'),
(78, 1, 11, 'inicio', 'Inicio chat', 1, '2017-08-26 07:38:18'),
(79, 6, 11, 'inicio', 'Inicio chat', 1, '2017-08-26 07:38:18'),
(80, 6, 11, 'mensaje', 'sent no group', 1, '2017-08-26 07:38:42'),
(81, 1, 11, 'mensaje', 'before the some time like not stand how work these chat me', 1, '2017-08-26 07:40:25'),
(82, 6, 11, 'asignatura', '{"id":"4423","usuario":"6","codigo":"111050M","nombre":"C\\u00c1LCULO I","creditos":"4","nota":"Academic Glider","publico":"2"}', 1, '2017-08-26 07:43:23'),
(83, 1, 11, 'mensaje', 'sent no groupsent no group', 1, '2017-08-26 07:44:30'),
(84, 6, 11, 'mensaje', 'hhh', 1, '2017-08-26 07:44:36'),
(85, 6, 11, 'asignatura', '{"id":"4424","usuario":"6","codigo":"111050M","nombre":"C\\u00c1LCULO I","creditos":"4","nota":"Academic Glider","publico":"2"}', 1, '2017-08-26 07:44:44'),
(86, 1, 9, 'mensaje', 'hola?', 2, '2017-08-28 06:40:46'),
(87, 4, 12, 'inicio', 'Inicio chat', 2, '2017-08-28 06:41:17'),
(88, 6, 12, 'inicio', 'Inicio chat', 0, '2017-08-28 06:41:17'),
(89, 6, 12, 'mensaje', 'como estas?', 0, '2017-08-28 06:41:31'),
(90, 1, 10, 'inicio', 'Inicio chat', 2, '2017-08-28 06:42:28'),
(91, 4, 10, 'inicio', 'Inicio chat', 1, '2017-08-28 06:42:28'),
(92, 4, 10, 'mensaje', 'y tu q te dices?', 1, '2017-08-28 06:42:58'),
(93, 1, 11, 'mensaje', '.....', 1, '2017-08-28 06:43:24'),
(94, 6, 11, 'mensaje', 'seguro?', 1, '2017-08-28 06:43:58'),
(95, 6, 11, 'mensaje', 'ok', 1, '2017-08-28 06:44:11'),
(96, 1, 9, 'mensaje', 'el lio es lo del grupo', 2, '2017-08-28 06:44:51'),
(97, 4, 9, 'mensaje', 'ok y ahora', -1, '2017-08-28 06:45:28'),
(98, 6, 9, 'mensaje', 'parece estar bien en todos', 2, '2017-08-28 06:45:47'),
(99, 1, 9, 'mensaje', 'bueno casi', 2, '2017-08-28 06:46:23'),
(100, 6, 9, 'mensaje', 'bu...', 2, '2017-08-28 06:47:25'),
(101, 4, 9, 'salir', '1234567890 salío del grupo', -1, '2017-08-28 06:48:49'),
(102, 6, 9, 'mensaje', 'ok aun llegan?', 2, '2017-08-28 06:49:19'),
(103, 4, 9, 'mensaje', 'si. y uan envia :)', -1, '2017-08-28 06:49:46'),
(104, 4, 9, 'salir', '1234567890 salío del grupo', 0, '2017-08-28 06:49:55'),
(105, 4, 9, 'mensaje', 'aun...', 0, '2017-08-28 06:50:12'),
(106, 2, 2, 'inicio', 'Inicio chat', 2, '2017-08-29 20:30:36'),
(107, 14, 2, 'inicio', 'Inicio chat', 1, '2017-08-29 20:30:36'),
(108, 14, 2, 'mensaje', 'public function index()\n	{	redirect("https://drive.google.com/file/d/0Bw7-14BZUCcvTThrMkZWbmlNVGM/view?usp=sharing");	}', 1, '2017-08-29 20:30:51'),
(109, 1, 13, 'mensaje', 'Grupo iniciado', 0, '2017-08-30 22:01:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pu_publico_asignatura`
--

DROP TABLE IF EXISTS `pu_publico_asignatura`;
CREATE TABLE IF NOT EXISTS `pu_publico_asignatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publico` varchar(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pu_publico_asignatura`
--

INSERT INTO `pu_publico_asignatura` (`id`, `publico`) VALUES
(0, 'privado'),
(1, 'comunidad'),
(2, 'chat'),
(3, 'archivado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pu_tipo_chat`
--

DROP TABLE IF EXISTS `pu_tipo_chat`;
CREATE TABLE IF NOT EXISTS `pu_tipo_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pu_tipo_chat`
--

INSERT INTO `pu_tipo_chat` (`id`, `tipo`) VALUES
(0, 'grupo'),
(1, 'uno a uno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pu_tipo_mensaje`
--

DROP TABLE IF EXISTS `pu_tipo_mensaje`;
CREATE TABLE IF NOT EXISTS `pu_tipo_mensaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pu_tipo_mensaje`
--

INSERT INTO `pu_tipo_mensaje` (`id`, `tipo`) VALUES
(1, 'inicio'),
(2, 'mensaje'),
(3, 'asignatura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pu_universidad`
--

DROP TABLE IF EXISTS `pu_universidad`;
CREATE TABLE IF NOT EXISTS `pu_universidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  `verificada` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pu_universidad`
--

INSERT INTO `pu_universidad` (`id`, `nombre`, `verificada`) VALUES
(1, 'Universidad del Valle', 0),
(2, 'Univallee', 0),
(3, 'TESTING', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pu_usuario`
--

DROP TABLE IF EXISTS `pu_usuario`;
CREATE TABLE IF NOT EXISTS `pu_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `foto` varchar(20) NOT NULL DEFAULT 'glider.jpg',
  `universidad` int(11) NOT NULL,
  `descarga` int(1) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`),
  UNIQUE KEY `celular` (`celular`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `pu_usuario`
--

INSERT INTO `pu_usuario` (`id`, `password`, `nombre`, `celular`, `correo`, `foto`, `universidad`, `descarga`) VALUES
(1, 'e10adc3949ba59abbe56e057f20f883e', 'Jhordy Abonia', '3158414498', 'jeigl7@', 'glider.jpg', 1, 3),
(2, 'e10adc3949ba59abbe56e057f20f883e', 'Test none', '9999999999', 'test@test.com', 'glider.jpg', 2, 3),
(3, 'e10adc3949ba59abbe56e057f20f883e', 'test one', '1111111111', 'test@test.', 'glider.jpg', 2, 3),
(4, 'e10adc3949ba59abbe56e057f20f883e', 'Testing Aglider', '1234567890', 'test@test', 'glider.jpg', 2, 3),
(5, 'e10adc3949ba59abbe56e057f20f883e', 'Testing one', '1000000000', 'test', 'glider.jpg', 2, 3),
(6, 'e10adc3949ba59abbe56e057f20f883e', 'Testing twoth', '2000000000', 'test@test', 'glider.jpg', 2, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
