-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `pu_alerta`;
CREATE TABLE `pu_alerta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL DEFAULT 'Sin nombre',
  `fecha` varchar(10) NOT NULL,
  `hora` varchar(5) NOT NULL DEFAULT '0',
  `asignatura` int(11) NOT NULL,
  `alerta` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pu_apunte`;
CREATE TABLE `pu_apunte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asignatura` int(11) NOT NULL,
  `apunte` varchar(300) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `nombre` varchar(70) NOT NULL DEFAULT 'Sin nombre',
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pu_asignatura`;
CREATE TABLE `pu_asignatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `codigo` varchar(7) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `creditos` int(11) NOT NULL,
  `nota` varchar(70) DEFAULT NULL,
  `publico` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pu_calificable`;
CREATE TABLE `pu_calificable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL DEFAULT 'Sin nombre',
  `porcentaje` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `asignatura` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pu_chat`;
CREATE TABLE `pu_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(1) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `nombre` varchar(70) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pu_estado_mensaje`;
CREATE TABLE `pu_estado_mensaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pu_feedback`;
CREATE TABLE `pu_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pu_horario`;
CREATE TABLE `pu_horario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asignatura` int(11) NOT NULL,
  `dia` varchar(10) NOT NULL,
  `hora` varchar(5) NOT NULL,
  `duracion` int(11) NOT NULL,
  `ubicacion` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pu_lectura`;
CREATE TABLE `pu_lectura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asignatura` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL DEFAULT 'Sin nombre',
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pu_mensaje`;
CREATE TABLE `pu_mensaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `chat` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `dato` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pu_publico_asignatura`;
CREATE TABLE `pu_publico_asignatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publico` varchar(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pu_tipo_chat`;
CREATE TABLE `pu_tipo_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pu_tipo_mensaje`;
CREATE TABLE `pu_tipo_mensaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pu_universidad`;
CREATE TABLE `pu_universidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  `verificada` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `pu_usuario`;
CREATE TABLE `pu_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `foto` varchar(20) NOT NULL DEFAULT 'glider.jpg',
  `universidad` int(11) NOT NULL DEFAULT '1',
  `descarga` int(11) NOT NULL DEFAULT '3',
  `permisos` varchar(400) NOT NULL DEFAULT '     download_asignatura,share_asignatura,add_asignatura,add_horario,add_alerta,add_lectura,add_calificable,add_apunute,del_asignatura,del_horario,del_alerta,del_lectura,del_calificable,del_apunute,,edit_asignatura,edit_horario,edit_alerta,edit_lectura,edit_calificable,edit_apunute,add_group,add_chat,change_color,change_user,change_cel,change_universidad',
  PRIMARY KEY (`id`),
  UNIQUE KEY `celular` (`celular`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `pu_usuario` (`id`, `password`, `nombre`, `celular`, `correo`, `foto`, `universidad`, `descarga`, `permisos`) VALUES
(1,	'e10adc3949ba59abbe56e057f20f883e',	'Academic Glider',	'3158241412',	'jeigl7@gmail.com',	'glider.jpg',	1,	3,	'     download_asignatura,share_asignatura,add_asignatura,add_horario,add_alerta,add_lectura,add_calificable,add_apunute,del_asignatura,del_horario,del_alerta,del_lectura,del_calificable,del_apunute,,edit_asignatura,edit_horario,edit_alerta,edit_lectura,edit_calificable,edit_apunute,add_group,add_chat,change_color,change_user,change_cel,change_universidad'),
(7,	'e10adc3949ba59abbe56e057f20f883e',	'Beta exodo 7',	'1111111111',	'betaexodo@test.co',	'glider.jpg',	2,	3,	'     download_asignatura,share_asignatura,add_asignatura,add_horario,add_alerta,add_lectura,add_calificable,add_apunute,del_asignatura,del_horario,del_alerta,del_lectura,del_calificable,del_apunute,,edit_asignatura,edit_horario,edit_alerta,edit_lectura,edit_calificable,edit_apunute,add_group,add_chat,change_color,change_user,change_cel,change_universidad'),
(8,	'e10adc3949ba59abbe56e057f20f883e',	'test tester',	'1234567890',	't@t.t',	'glider.jpg',	2,	3,	'     download_asignatura,share_asignatura,add_asignatura,add_horario,add_alerta,add_lectura,add_calificable,add_apunute,del_asignatura,del_horario,del_alerta,del_lectura,del_calificable,del_apunute,,edit_asignatura,edit_horario,edit_alerta,edit_lectura,edit_calificable,edit_apunute,add_group,add_chat,change_color,change_user,change_cel,change_universidad'),
(9,	'e10adc3949ba59abbe56e057f20f883e',	'tester levitico',	'5555555555',	'5@5.5',	'glider.jpg',	2,	3,	'     download_asignatura,share_asignatura,add_asignatura,add_horario,add_alerta,add_lectura,add_calificable,add_apunute,del_asignatura,del_horario,del_alerta,del_lectura,del_calificable,del_apunute,,edit_asignatura,edit_horario,edit_alerta,edit_lectura,edit_calificable,edit_apunute,add_group,add_chat,change_color,change_user,change_cel,change_universidad');

-- 2018-11-16 20:48:57