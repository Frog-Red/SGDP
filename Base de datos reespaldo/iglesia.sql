-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para iglesia
CREATE DATABASE IF NOT EXISTS `iglesia` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `iglesia`;

-- Volcando estructura para tabla iglesia.diaconos
CREATE TABLE IF NOT EXISTS `diaconos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Rut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EstadoVigencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `FechaOrdenacion` date NOT NULL,
  `LugarOrdenacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NombreObispoOrdeno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProfesionOficio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ParroquiaAsignada` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `VicariaAmbientalAsignada` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DireccionParticular` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TelefonoCelular` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TelefonoFijo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CorreoElectronico` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IndicadorDefuncion` tinyint NOT NULL DEFAULT '0',
  `FechaDefuncion` date DEFAULT NULL,
  `EstadoCivil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NombreEsposa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RutEsposa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FechaNacimientoEsposa` date DEFAULT NULL,
  `FechaMatrimonio` date DEFAULT NULL,
  `FechaDefuncionEsposa` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `diaconos_rut_unique` (`Rut`),
  KEY `FK_diaconos_parroquia` (`ParroquiaAsignada`),
  KEY `FK_diaconos_vicaria_ambiental` (`VicariaAmbientalAsignada`),
  CONSTRAINT `FK_diaconos_parroquia` FOREIGN KEY (`ParroquiaAsignada`) REFERENCES `parroquia` (`NombreParroquia`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_diaconos_vicaria_ambiental` FOREIGN KEY (`VicariaAmbientalAsignada`) REFERENCES `vicaria_ambiental` (`NombreVicariaAmbiental`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla iglesia.diaconos: ~3 rows (aproximadamente)
INSERT INTO `diaconos` (`id`, `Nombre`, `Rut`, `EstadoVigencia`, `FechaNacimiento`, `FechaOrdenacion`, `LugarOrdenacion`, `NombreObispoOrdeno`, `ProfesionOficio`, `ParroquiaAsignada`, `VicariaAmbientalAsignada`, `DireccionParticular`, `TelefonoCelular`, `TelefonoFijo`, `CorreoElectronico`, `IndicadorDefuncion`, `FechaDefuncion`, `EstadoCivil`, `NombreEsposa`, `RutEsposa`, `FechaNacimientoEsposa`, `FechaMatrimonio`, `FechaDefuncionEsposa`, `created_at`, `updated_at`) VALUES
	(18, 'Prueba', '54.254.365-5', 'Fallecido', '2020-05-09', '2023-11-08', 'Casablanca', 'Francisco Javier', 'Panadero', 'Gabriela Masi', 'Vicaria de la izquierda', 'carlos davila', '123123', '123123', 'asd@prueba.com', 0, NULL, 'soltero', 'maria', 'no', '2023-11-14', '2023-11-08', '2023-11-14', '2023-11-25 05:37:55', '2024-05-10 17:21:10'),
	(38, 'Felipe Ignacio Jerez Alvare', '20.108.293-5', 'Activo', '2023-11-22', '2023-11-08', 'Iglesia san Pedro', 'Francisco Javier', 'Informatico', 'San Sebastian', 'VIcaria del Centro', 'carlos davila 8478', '+569 6320 6993', '2 5478 1254', 'fjerez@utem.cl', 0, NULL, 'soltero', NULL, NULL, NULL, NULL, NULL, '2023-11-26 11:53:31', '2023-11-26 15:46:02'),
	(40, 'Fabian', '87.548.326-6', 'Activo', '2023-05-10', '2023-12-20', 'Casablanca', 'Francisco Javier', 'asd', 'Gabriela Masi', 'Vicaria de la izquierda', 'carlos davila', '123456789', '123456789', 'asd@prueba.com', 0, '2023-12-05', 'casado', 'Carla', '59-987-654-3', '2023-12-18', '2023-12-13', NULL, '2023-12-04 19:08:34', '2024-05-10 17:14:58');

-- Volcando estructura para tabla iglesia.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla iglesia.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla iglesia.hijos
CREATE TABLE IF NOT EXISTS `hijos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `RutDiáconoPadre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RutHijo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SexoHijo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NombreHijo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FechaNacimientoHijo` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hijos_ruthijo_unique` (`RutHijo`),
  KEY `FK_hijos_diaconos` (`RutDiáconoPadre`),
  CONSTRAINT `FK_hijos_diaconos` FOREIGN KEY (`RutDiáconoPadre`) REFERENCES `diaconos` (`Rut`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla iglesia.hijos: ~2 rows (aproximadamente)
INSERT INTO `hijos` (`id`, `RutDiáconoPadre`, `RutHijo`, `SexoHijo`, `NombreHijo`, `FechaNacimientoHijo`, `created_at`, `updated_at`) VALUES
	(4, '54.254.365-5', '20.108.239-87', 'Femenino', 'Juan', '2023-11-09', '2023-11-26 12:10:50', '2023-11-26 13:02:56'),
	(10, '54.254.365-5', 'sdfsdf', 'Masculino', 'sdfsdf', '2023-11-22', '2023-11-28 02:19:54', '2023-11-28 02:19:54');

-- Volcando estructura para tabla iglesia.historial_diacono
CREATE TABLE IF NOT EXISTS `historial_diacono` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `RutDiacono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NumeroSecuenciaEvento` int NOT NULL,
  `CodigoTipoEvento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FechaEvento` date NOT NULL,
  `ComentariosEvento` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `CodigoUsuarioRegistro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_historial_diacono_tipo_evento` (`CodigoTipoEvento`),
  KEY `FK_historial_diacono_diaconos` (`RutDiacono`),
  CONSTRAINT `FK_historial_diacono_diaconos` FOREIGN KEY (`RutDiacono`) REFERENCES `diaconos` (`Rut`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_historial_diacono_tipo_evento` FOREIGN KEY (`CodigoTipoEvento`) REFERENCES `tipo_evento` (`NombreTipoEvento`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla iglesia.historial_diacono: ~4 rows (aproximadamente)
INSERT INTO `historial_diacono` (`id`, `RutDiacono`, `NumeroSecuenciaEvento`, `CodigoTipoEvento`, `FechaEvento`, `ComentariosEvento`, `CodigoUsuarioRegistro`, `created_at`, `updated_at`) VALUES
	(22, '20.108.293-5', 18, 'Asignacion de Rol', '2023-12-04', 'Se asignó el rol Vendedor', '1', '2023-12-04 19:14:30', '2023-12-04 19:14:30'),
	(24, '20.108.293-5', 19, 'Asignacion de Rol', '2023-12-04', 'Se asignó el rol Delantero', '1', '2023-12-04 19:15:02', '2023-12-04 19:15:02'),
	(26, '54.254.365-5', 20, 'Asignacion de Rol', '2023-12-04', 'Se asignó el rol Editor', '1', '2023-12-04 19:16:52', '2023-12-04 19:16:52'),
	(27, '20.108.293-5', 19, 'Eliminacion de Rol', '2023-12-04', 'Se elimino el rol Delantero', '1', '2023-12-04 19:17:33', '2023-12-04 19:17:33'),
	(28, '87.548.326-6', 21, 'Asignacion de Rol', '2023-12-15', 'Se asignó el rol Editor', '1', '2023-12-15 18:34:32', '2023-12-15 18:34:32'),
	(29, '87.548.326-6', 22, 'Asignacion de Rol', '2024-05-10', 'Se asignó el rol Vendedor', '1', '2024-05-10 17:22:38', '2024-05-10 17:22:38');

-- Volcando estructura para tabla iglesia.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla iglesia.menus: ~0 rows (aproximadamente)
INSERT INTO `menus` (`id`, `name`, `route`, `roles`, `created_at`, `updated_at`) VALUES
	(1, 'Diaconos', 'diaconos.index', '["4", "1", "2"]', NULL, NULL);

-- Volcando estructura para tabla iglesia.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla iglesia.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2023_11_23_032709_create_diaconos_table', 1),
	(5, '2023_11_23_032725_create_hijos_table', 1),
	(6, '2023_11_23_032822_create_parroquia_table', 1),
	(7, '2023_11_23_032849_create_vicaria_zonal_table', 1),
	(8, '2023_11_23_032903_create_vicaria_ambiental_table', 1),
	(9, '2023_11_23_032927_create_rol_pastoral_table', 1),
	(10, '2023_11_23_032956_create_tipo_evento_table', 1),
	(11, '2023_11_23_033012_create_historial_diacono_table', 1),
	(12, '2023_11_23_033027_create_rol_diacono_table', 1),
	(13, '2023_11_25_044059_add_foreign_keys_to_hijos_table', 2),
	(14, '2023_11_27_141348_create_roles_table', 3),
	(15, '2023_11_27_154409_create_menus_table', 4),
	(16, '2023_11_27_181514_create_role_users_table', 5);

-- Volcando estructura para tabla iglesia.parroquia
CREATE TABLE IF NOT EXISTS `parroquia` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `CodigoParroquia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NombreParroquia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DireccionParroquia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TelefonoParroquia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CorreoElectronicoParroquia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VicariaZonalPertenece` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `NombreParroco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NombreParroquia` (`NombreParroquia`),
  KEY `FK_parroquia_vicaria_zonal` (`VicariaZonalPertenece`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla iglesia.parroquia: ~2 rows (aproximadamente)
INSERT INTO `parroquia` (`id`, `CodigoParroquia`, `NombreParroquia`, `DireccionParroquia`, `TelefonoParroquia`, `CorreoElectronicoParroquia`, `VicariaZonalPertenece`, `NombreParroco`, `created_at`, `updated_at`) VALUES
	(1, '123 test', 'San Sebastian', 'carlos davila 7321', '569 6993', 'parroquia@iglesia.com', 'Vicaria Santiago', 'Juan pozo edit', '2023-11-24 00:17:34', '2023-11-26 15:47:02'),
	(3, '2', 'Gabriela Masi', 'san luis 4325', '2 6547 5469', 'sanluis@iglesia.cl', 'Prueba Vicaria Zonal', 'Ruben Doblas', '2023-11-26 14:07:03', '2024-05-10 02:46:19'),
	(9, 'test', 'test', 'test', 'test', 'test@sdfs', 'TEST', 'sdfs', '2024-05-10 03:44:24', '2024-05-10 03:44:24');

-- Volcando estructura para tabla iglesia.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla iglesia.password_resets: ~2 rows (aproximadamente)
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('fjerez@utem.cl', '$2y$10$.yqojAkQkLKKHWOdNaeWnuIbaITTx1KapXFvk28yKIrRcdAG6XqJa', '2023-11-24 10:19:03'),
	('felipe.sniper14@gmail.com', '$2y$10$/VCWhkFh7CrkDv9Zj8gUB.AjHAdqbtojuTO3/xCFJkKfuDW0rpkKC', '2023-11-24 10:20:42');

-- Volcando estructura para tabla iglesia.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla iglesia.roles: ~3 rows (aproximadamente)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'administrador', '2023-11-27 11:17:18', '2023-11-27 11:17:19'),
	(2, 'mantenedor', '2023-11-27 11:17:18', '2023-11-27 11:17:19'),
	(3, 'usuario_general', '2023-11-27 11:17:18', '2023-11-27 11:17:19');

-- Volcando estructura para tabla iglesia.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `role_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla iglesia.role_user: ~9 rows (aproximadamente)
INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(4, 9, 1, '2023-11-27 15:18:17', '2023-11-27 15:18:17'),
	(5, 8, 2, '2023-11-27 15:18:17', '2023-11-27 15:18:17'),
	(6, 7, 3, '2023-11-27 15:18:17', '2023-11-27 15:18:17'),
	(46, 1, 1, NULL, NULL),
	(48, 1, 2, NULL, NULL),
	(49, 1, 3, NULL, NULL),
	(50, NULL, 1, NULL, NULL),
	(51, NULL, 2, NULL, NULL),
	(52, NULL, 3, NULL, NULL);

-- Volcando estructura para tabla iglesia.rol_diacono
CREATE TABLE IF NOT EXISTS `rol_diacono` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `RutDiacono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CodigoRol` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FechaAsignacionRol` date NOT NULL,
  `ComentarioAsignacionRol` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `NombreAsignadorRol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CodigoUsuarioRegistro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_rol_diacono_rol_pastoral` (`CodigoRol`),
  KEY `FK_rol_diacono_diaconos` (`RutDiacono`),
  CONSTRAINT `FK_rol_diacono_diaconos` FOREIGN KEY (`RutDiacono`) REFERENCES `diaconos` (`Rut`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_rol_diacono_rol_pastoral` FOREIGN KEY (`CodigoRol`) REFERENCES `rol_pastoral` (`NombreRol`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla iglesia.rol_diacono: ~4 rows (aproximadamente)
INSERT INTO `rol_diacono` (`id`, `RutDiacono`, `CodigoRol`, `FechaAsignacionRol`, `ComentarioAsignacionRol`, `NombreAsignadorRol`, `CodigoUsuarioRegistro`, `created_at`, `updated_at`) VALUES
	(18, '20.108.293-5', 'Vendedor', '2023-12-04', 'asd', 'asd', 'asd', '2023-12-04 19:14:30', '2023-12-04 19:14:30'),
	(20, '54.254.365-5', 'Editor', '2023-12-04', 'asd', 'asd', 'asd', '2023-12-04 19:16:52', '2023-12-04 19:16:52'),
	(21, '87.548.326-6', 'Editor', '2023-12-15', 'Rol editor', 'Felipe', '12', '2023-12-15 18:34:32', '2023-12-15 18:34:32'),
	(22, '87.548.326-6', 'Vendedor', '2024-05-10', 'a', 'a', 'a', '2024-05-10 17:22:38', '2024-05-10 17:22:38');

-- Volcando estructura para tabla iglesia.rol_pastoral
CREATE TABLE IF NOT EXISTS `rol_pastoral` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `CodigoRolPastoral` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NombreRol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DescripcionRol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rol_pastoral_NombreRol_unique` (`NombreRol`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla iglesia.rol_pastoral: ~5 rows (aproximadamente)
INSERT INTO `rol_pastoral` (`id`, `CodigoRolPastoral`, `NombreRol`, `DescripcionRol`, `created_at`, `updated_at`) VALUES
	(1, '2', 'Barredor', 'el que barre', '2023-11-24 00:18:11', '2023-11-27 20:35:47'),
	(2, '1', 'Editor', 'sdfs', '2023-11-24 05:41:16', '2023-11-26 14:46:29'),
	(3, '3', 'Vendedor', 'El que vende', '2023-11-26 14:19:37', '2023-11-26 14:19:37'),
	(4, '123456', 'Portero', 'el portero', '2023-11-28 01:08:30', '2023-11-28 01:08:30'),
	(5, '12312', 'Delantero', 'El que tanquea', '2023-11-28 01:08:41', '2023-12-04 19:13:36');

-- Volcando estructura para tabla iglesia.tipo_evento
CREATE TABLE IF NOT EXISTS `tipo_evento` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `CodigoTipoEvento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NombreTipoEvento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DescripcionTipoEvento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tipo_evento_historial_diacono` (`NombreTipoEvento`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla iglesia.tipo_evento: ~5 rows (aproximadamente)
INSERT INTO `tipo_evento` (`id`, `CodigoTipoEvento`, `NombreTipoEvento`, `DescripcionTipoEvento`, `created_at`, `updated_at`) VALUES
	(1, '1', 'suspencion', 'Se suspende al Diacono', '2023-11-24 00:18:24', '2023-11-26 14:56:38'),
	(2, '3', 'Fiesta Sorpresa', 'Se hace una fiesta al Diacono por X motivo', '2023-11-24 05:43:46', '2023-11-26 14:57:39'),
	(3, '2', 'Bonos', 'Se le da un bono al Diacono', '2023-11-26 14:56:27', '2023-11-26 15:10:50'),
	(4, '4', 'Asignacion de Rol', 'Se asigna un Rol a un Diacono', '2023-11-26 18:21:57', '2023-11-26 18:21:57'),
	(5, '5', 'Eliminacion de Rol', 'Se quita un Rol a un Diacono', '2023-11-26 18:22:28', '2023-11-26 18:22:28');

-- Volcando estructura para tabla iglesia.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla iglesia.users: ~4 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'pipe', 'fjerez@utem.cl', NULL, '$2y$10$K5mKKj4UYKWygmfS5w/7AeLkAsJUXKds3sgaTKB/92D5zAnc3.O6e', 'IAFBMN34DHk4pm6KlDHCDjUhwQlUxyKabpioCnJbGRicE8Zjjh0jb4PZGWJp', '2023-11-24 09:05:53', '2023-11-28 07:29:01'),
	(7, 'user', 'usuario@usuario.cl', NULL, '$2y$10$m7QdjiUOXGIEDeP/lwV0muRK1nsiJeWjlK29pn1WBnFDGNV1FPYga', NULL, '2023-11-27 18:05:25', '2023-11-27 18:05:25'),
	(8, 'mantenedor', 'mantenedor@mantenedor.cl', NULL, '$2y$10$s4nDaUk.MiPvHpBTJxvF.ewLtMhtp6Wlxi9v2XT2Dp1bxlb3w324W', NULL, '2023-11-27 19:44:13', '2023-11-27 19:44:13'),
	(9, 'administrador', 'administrador@administrador.cl', NULL, '$2y$10$1ribN5bVRb9wZEAog9EDieF0YYlLzrc4ETe4yo.JN.18bOLDFaqg.', NULL, '2023-11-27 19:47:29', '2023-11-27 19:47:29');

-- Volcando estructura para tabla iglesia.vicaria_ambiental
CREATE TABLE IF NOT EXISTS `vicaria_ambiental` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `CodigoVicariaAmbiental` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NombreVicariaAmbiental` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DireccionVicariaAmbiental` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TelefonoVicariaAmbiental` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CorreoElectronicoVicariaAmbiental` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NombreVicario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NombreVicariaAmbiental` (`NombreVicariaAmbiental`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla iglesia.vicaria_ambiental: ~2 rows (aproximadamente)
INSERT INTO `vicaria_ambiental` (`id`, `CodigoVicariaAmbiental`, `NombreVicariaAmbiental`, `DireccionVicariaAmbiental`, `TelefonoVicariaAmbiental`, `CorreoElectronicoVicariaAmbiental`, `NombreVicario`, `created_at`, `updated_at`) VALUES
	(1, '4564', 'VIcaria del Centro', 'san juan 2547', '6320 6993', 'vicariaambiental@gmail.com', 'felipe jerez pruebita', '2023-11-24 00:18:46', '2023-11-26 15:17:48'),
	(2, 'asd', 'Vicaria de la izquierda', 'asd', 'asd', 'asd@test.com', 'asd', '2023-11-24 05:46:49', '2023-11-26 15:46:45');

-- Volcando estructura para tabla iglesia.vicaria_zonal
CREATE TABLE IF NOT EXISTS `vicaria_zonal` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `CodigoVicariaZonal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NombreVicariaZonal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DireccionVicariaZonal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TelefonoVicariaZonal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CorreoElectronicoVicariaZonal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NombreVicarioZonal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NombreVicariaZonal` (`NombreVicariaZonal`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla iglesia.vicaria_zonal: ~2 rows (aproximadamente)
INSERT INTO `vicaria_zonal` (`id`, `CodigoVicariaZonal`, `NombreVicariaZonal`, `DireccionVicariaZonal`, `TelefonoVicariaZonal`, `CorreoElectronicoVicariaZonal`, `NombreVicarioZonal`, `created_at`, `updated_at`) VALUES
	(1, '1', 'Prueba Vicaria Zonal', 'valparaiso 2134', '2 45267936', 'vicariazonal@gmail.com', 'miguel ohara', '2023-11-24 00:19:19', '2023-11-26 15:53:06'),
	(3, '2', 'Vicaria Santiago', 'san miguel 7362', '2 5478 9856', 'vicariazonalsantiago@gmail.com', 'Pedro Pascal', '2023-11-26 15:52:45', '2023-11-26 15:52:45'),
	(6, 'TEST', 'TEST', 'TEST', '999999', 'test@php.om', 'juan', '2024-05-10 02:33:27', '2024-05-10 02:33:27');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
