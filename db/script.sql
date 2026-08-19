-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-04-2026 a las 00:19:59
-- Versión del servidor: 9.1.0
-- Versión de PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `montefiori`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_aseguradoras`
--

DROP TABLE IF EXISTS `fb_aseguradoras`;
CREATE TABLE IF NOT EXISTS `fb_aseguradoras` (
  `idaseguradora` int NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `imgdesktop` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `orden` int NOT NULL,
  `fechapublicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`idaseguradora`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_banner`
--

DROP TABLE IF EXISTS `fb_banner`;
CREATE TABLE IF NOT EXISTS `fb_banner` (
  `idbanner` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `bajada` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `imgdesktop` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `imgmovil` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `idseccion` int NOT NULL,
  `orden` int DEFAULT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT '0',
  PRIMARY KEY (`idbanner`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `fb_banner`
--

INSERT INTO `fb_banner` (`idbanner`, `titulo`, `bajada`, `imgdesktop`, `imgmovil`, `url`, `idseccion`, `orden`, `fecharegistro`, `estado`) VALUES
(1, 'Emergencia 24/7', 'Actuamos cuando<br>cada segundo importa', 'cambio-banner-2-02-1775491306.webp', 'cambio-banner-2-mobil-1775491308.webp', '', 12, 2, '2026-04-06 16:01:49', '1'),
(2, 'Servicios Médicos<br>para un cuidado integral', 'Desde la prevención hasta atención especializada', 'portada-de-servicios11zon-1774608727.webp', 'portada-de-servicios-mobile11zon-1774608728.webp', '', 14, 2, '2026-03-27 10:52:09', '1'),
(3, 'Encuentra a tu<br>especialista', 'y agenda tu cita', 'banners-inicio-0111zon-v3-1774480971.webp', 'Banners-Inicio-Mobile-1_11zon.webp', '', 12, 1, '2026-03-30 20:00:02', '1'),
(4, 'Nuestros médicos<br>especialistas', 'Especialistas comprometidos con tu salud y bienestar integral.', 'medicos-69-1774867732.webp', 'medicos-mobile-1774867733.webp', '', 15, 2, '2026-03-30 10:48:54', '1'),
(5, 'Información para<br>nuestros pacientes', 'Todo lo que necesitas saber antes, durante y después de tu atención médica', 'informacion-para-pacientes-8311zon-1774868144.webp', 'informacion-para-pacientes-mobile11zon-1774868146.webp', '', 18, 1, '2026-03-30 16:52:48', '1'),
(6, 'Emergencia<br>24/7', 'Actuamos cuando cada segundo importa', '2-banners-inicio-0211zon-1-1774865537.webp', 'banners-inicio-mobile-0211zon-1-1774865539.webp', '', 19, 2, '2026-04-06 23:19:33', '0'),
(7, 'Tu recuperación, <br>en las mejores manos', 'Servicio hospitalario diseñado para tu bienestar y tranquilidad.', 'cambio-hospitalizacion-banner-53-1775493104.webp', 'cambio-hospitalizacion-banner-mobile-1775493105.webp', '', 20, 1, '2026-04-06 16:31:46', '1'),
(8, 'Únete a nuestro<br>equipo de profesionales', 'Mantente informado con consejos de salud y conoce a nuestros especialistas', 'trabaja-con-nosotros-6811zon-1774867523.webp', 'trabaja-con-nosotros-mobile11zon-1774867524.webp', '', 21, 1, '2026-03-30 10:45:25', '1'),
(9, 'Presupuestos Hospitalarios', '', '78554.jpg', '5424.jpg', '', 22, 1, '2026-01-16 14:16:57', '1'),
(10, 'Expertos que Inspiran', 'Mantente al día con artículos, consejos y novedades de nuestra clínica. Conoce a nuestros médicos, su experiencia y cómo trabajan para cuidar de ti y tu familia.', '78554.jpg', '5424.jpg', '', 17, 2, '2025-12-11 01:42:41', '1'),
(11, 'Especialistas en<br>salud integral', 'Medicina moderna con atención cercana y profesional.', 'cambio-especialidades-banner-6411zon-1775493280.webp', 'cambio-especialidades-banner-mobile11zon-1775493281.webp', '', 16, 1, '2026-04-06 23:10:57', '1'),
(12, 'Expertos que Inspiran', 'Mantente al día con artículos, consejos y novedades de nuestra clínica. Conoce a nuestros médicos, su experiencia y cómo trabajan para cuidar de ti y tu familia.', '78554.jpg', '5424.jpg', '', 16, 2, '2026-01-16 14:15:47', '0'),
(13, 'Expertos que Inspiran', 'Mantente al día con artículos, consejos y novedades de nuestra clínica. Conoce a nuestros médicos, su experiencia y cómo trabajan para cuidar de ti y tu familia.', '78554.jpg', '5424.jpg', '', 16, 2, '2026-01-16 14:15:56', '0'),
(14, 'Tu clínica de confianza', 'Más de 40 años<br>junto a ti', 'cambio-banner-3-03-1775491334.webp', 'cambio-banner-3-mobil-1775491336.webp', '', 12, 3, '2026-04-06 16:02:17', '1'),
(15, '', '', 'hospitalizacion-59-1774607442.webp', 'hospitalizacion-57-1774607443.webp', '', 20, 2, '2026-03-27 10:31:01', '0'),
(16, 'Diagnóstico<br>preciso y confiable', 'Tecnología avanzada para cuidar tu salud con rapidez y calidez', 'serv-auxiliares-portada11zon-1774607763.webp', 'serv-auxiliares-portada-mobile11zon-1774607765.webp', '', 23, 1, '2026-03-28 15:59:35', '1'),
(17, 'Encuentra un especialista<br>y reserva tu cita', 'Agenda tu cita médica de forma rápida y segura.', 'programa-prosalud-1775517624.webp', 'programa-prosalud-mobile-1775517626.webp', '', 19, 1, '2026-04-06 23:20:27', '1'),
(18, 'Tu clínica de<br>confianza', 'Más de 40 años junto a ti', '3-banners-inicio-0311zon-2-1774865634.webp', 'banners-inicio-mobile-0311zon-2-1774865636.webp', '', 19, 3, '2026-04-06 23:19:47', '0'),
(19, 'SCTR: Preparados', 'para atender<br>accidentes de trabajo', 'cambio-banner-4-71-1775491364.webp', 'cambio-banner-4-mobil-1775491366.webp', '', 12, 4, '2026-04-06 16:02:46', '1'),
(20, 'Encuentra un', 'especialista y<br>reserva tu cita', 'banners-inicio-0411zon-1-1774891573.webp', 'banners-inicio-04-mobile-1774891575.webp', '', 12, 1, '2026-03-30 17:27:01', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_blog`
--

DROP TABLE IF EXISTS `fb_blog`;
CREATE TABLE IF NOT EXISTS `fb_blog` (
  `idblog` int NOT NULL AUTO_INCREMENT,
  `idcategoria` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `bajada` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `detalle` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `imgdesktop` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `imgmovil` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechapublicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `destacado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `meta_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`idblog`),
  UNIQUE KEY `url` (`url`(200))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `fb_blog`
--

INSERT INTO `fb_blog` (`idblog`, `idcategoria`, `titulo`, `bajada`, `detalle`, `imgdesktop`, `imgmovil`, `url`, `fechapublicacion`, `destacado`, `fecharegistro`, `meta_title`, `meta_description`, `meta_keywords`, `estado`) VALUES
(1, '1', 'Clínica Montefiori presenta su nueva página web: más moderna, accesible y enfocada en el paciente', 'La Clínica Montefiori ha dado un importante paso en su proceso de transformación digital con el lanzamiento de su nueva página web, una plataforma completamente renovada que busca brindar a los pacientes una experiencia más ágil, intuitiva y cercana.', '<p data-start=\"219\" data-end=\"471\">La Cl&iacute;nica Montefiori ha dado un importante paso en su proceso de transformaci&oacute;n digital con el lanzamiento de su nueva p&aacute;gina web, una plataforma completamente renovada que busca brindar a los pacientes una experiencia m&aacute;s &aacute;gil, intuitiva y cercana.</p>\r\n<p data-start=\"219\" data-end=\"471\">&nbsp;</p>\r\n<p style=\"padding-left: 40px;\" data-start=\"473\" data-end=\"853\">El redise&ntilde;o incorpora una estructura visual m&aacute;s limpia, moderna y adaptable a cualquier dispositivo, permitiendo que los usuarios encuentren lo que necesitan de manera r&aacute;pida y sencilla. Desde informaci&oacute;n sobre especialidades, m&eacute;dicos y servicios, hasta la posibilidad de gestionar citas en l&iacute;nea, el nuevo sitio web fue creado pensando en mejorar cada interacci&oacute;n con la cl&iacute;nica.</p>\r\n<p style=\"padding-left: 40px;\" data-start=\"473\" data-end=\"853\">&nbsp;</p>\r\n<p data-start=\"855\" data-end=\"1177\">Uno de los principales objetivos de esta actualizaci&oacute;n es ofrecer herramientas digitales claras y eficientes. La navegaci&oacute;n ha sido optimizada para que los visitantes puedan acceder de inmediato a secciones clave como atenci&oacute;n por especialidades, horarios, sedes, promoci&oacute;n de campa&ntilde;as de salud y noticias institucionales.</p>\r\n<p data-start=\"855\" data-end=\"1177\">&nbsp;</p>\r\n<p data-start=\"1179\" data-end=\"1379\">Adem&aacute;s, la nueva web incluye contenido educativo orientado al bienestar integral, fortaleciendo el compromiso de la Cl&iacute;nica Montefiori de acompa&ntilde;ar a sus pacientes m&aacute;s all&aacute; de una consulta presencial.</p>\r\n<p data-start=\"1179\" data-end=\"1379\">&nbsp;</p>\r\n<p data-start=\"1381\" data-end=\"1608\">Con esta renovaci&oacute;n, la Cl&iacute;nica Montefiori reafirma su apuesta por la innovaci&oacute;n y la mejora continua de sus servicios, impulsando un ecosistema digital que facilite el acceso a la salud y mejore la experiencia de cada usuario.</p>', 'Proyecto nuevo.webp', 'Proyecto nuevo.webp', 'clinica-montefiori-presenta-su-nueva-pagina-web-mas-moderna-accesible-y-enfocada-en-el-paciente', '2026-03-28 15:33:16', 'on', '2025-12-01 09:43:38', 'SEO Nueva web de la Clínica Montefiori: innovadora, moderna y centrada en el paciente', 'SEO  La Clínica Montefiori lanza su nueva página web con un diseño moderno, navegación intuitiva y servicios digitales mejorados. Conoce sus especialidades, médicos, horarios y gestiona tus citas en línea de manera rápida y segura.', '', '1'),
(2, '1,2,3,5,6,8', 'Gestión de Seguridad y Salud en el Trabajo', 'Gestión de Seguridad y Salud en el Trabajo', '<p>Gesti&oacute;n de Seguridad y Salud en el Trabajo</p>', '78554.jpg', '5424.jpg', 'gestion-de-seguridad-y-salud-en-el-trabajo', '2025-12-11 00:51:19', '', '2025-12-10 04:48:36', 'Demo Gestión de Seguridad y Salud en el Trabajo', 'Gestión de demo', '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_categoria`
--

DROP TABLE IF EXISTS `fb_categoria`;
CREATE TABLE IF NOT EXISTS `fb_categoria` (
  `idcategoria` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fb_categoria`
--

INSERT INTO `fb_categoria` (`idcategoria`, `nombre`, `estado`, `fecharegistro`) VALUES
(1, 'Ejercicio', '1', '2025-12-10 05:44:51'),
(2, 'Tips de Salud', '1', '2025-12-10 05:43:07'),
(3, 'Salud', '1', '2025-12-10 05:44:03'),
(4, 'Bienestar', '1', '2025-12-10 05:44:20'),
(5, 'Hábitos saludables', '1', '2025-12-10 05:44:30'),
(6, 'Nutrición', '1', '2025-12-10 05:44:38'),
(7, 'Medicina preventiva', '1', '2025-12-10 05:44:59'),
(8, 'Salud mental', '1', '2025-12-10 05:45:06'),
(9, 'Consejos de salud', '1', '2025-12-10 05:45:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_contactanos`
--

DROP TABLE IF EXISTS `fb_contactanos`;
CREATE TABLE IF NOT EXISTS `fb_contactanos` (
  `idcontactanos` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `mensaje` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcontactanos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_convenios`
--

DROP TABLE IF EXISTS `fb_convenios`;
CREATE TABLE IF NOT EXISTS `fb_convenios` (
  `idconvenio` int NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `imgdesktop` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `imgmovil` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `orden` int NOT NULL,
  `fechapublicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`idconvenio`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `fb_convenios`
--

INSERT INTO `fb_convenios` (`idconvenio`, `nombre`, `imgdesktop`, `imgmovil`, `orden`, `fechapublicacion`, `estado`) VALUES
(1, 'La Positiva', '01.png', 'logo_lapositiva.webp', 1, '2026-03-17 17:31:22', '1'),
(2, 'Pacifico', '02.png', 'logo_pacifico.webp', 2, '2026-03-17 17:31:34', '1'),
(3, 'Rimac', '03.png', 'logo_rimac.webp', 3, '2026-03-17 17:22:36', '1'),
(4, 'Mapfre', '04.png', 'logo_mafre.webp', 4, '2026-03-17 17:23:04', '1'),
(5, 'Sanitas', '05.png', 'logo_sanitas.webp', 5, '2026-03-17 17:34:28', '1'),
(6, 'Interseguro', '06.png', 'logo_interseguro.webp', 6, '2026-03-17 17:23:26', '1'),
(8, 'Qualitas', 'qualitas.webp', 'logo_qualitas.webp', 0, '2026-03-17 17:33:01', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_especialidades`
--

DROP TABLE IF EXISTS `fb_especialidades`;
CREATE TABLE IF NOT EXISTS `fb_especialidades` (
  `idEspecialidad` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `imgdesktop` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL,
  KEY `idEspecialidad` (`idEspecialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_form_web`
--

DROP TABLE IF EXISTS `fb_form_web`;
CREATE TABLE IF NOT EXISTS `fb_form_web` (
  `idform` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `edad` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo` varchar(150) NOT NULL,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`idform`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fb_form_web`
--

INSERT INTO `fb_form_web` (`idform`, `nombre`, `apellidos`, `telefono`, `email`, `dni`, `edad`, `fecharegistro`, `tipo`, `estado`) VALUES
(1, 'alejo', 'alejo', '988998989', 'demo@demo.com', '65454545', '54', '2026-02-10 20:01:19', 'PROSALUD', '1'),
(2, 'demo', 'dmeo', '998989898', 'sistemas@agallas.com.pe', '54454554', '45', '2026-02-10 20:06:31', 'PROSALUD', '1'),
(3, 'demoito', 'demo', '989898989', '454554@hotmail.com', '54454545', '5', '2026-02-10 21:52:36', 'MATERNO', '1'),
(4, 'alejo', 'custodio', '989898989', 'demo@demo.com', '54545454', '9', '2026-02-10 22:00:02', 'MATERNO', '1'),
(5, 'demo', 'demo', '988989899', 'demo@democom.com', '54545454', '9', '2026-02-10 22:03:09', 'MATERNO', '1'),
(6, 'demo', 'demo', '8899898', 'pepe@pepe.com', '54454545', '88', '2026-02-10 22:04:57', 'PROSALUD', '1'),
(7, 'Sistemas', 'Agallas', '984357111', 'sistemas@agallas.com.pe', '54454545', '45', '2026-02-10 22:28:54', 'PROSALUD', '1'),
(8, 'demo', 'demo', '998989898', 'sistemas@agallas.com.pe', '98978789', '98', '2026-02-10 23:59:40', 'PROSALUD', '1'),
(9, 'Sistemas', 'Agallas', '998989898', 'sistemas@agallas.com.pe', '54454545', '45', '2026-02-11 00:03:29', 'PROSALUD', '1'),
(10, 'demo', 'demo', '989898989', 'demo@demo.com', '98899898', '99', '2026-02-11 00:05:11', 'PROSALUD', '1'),
(11, 'demo', 'demo', '998989898', 'sistemas@agallas.com.pe', '54545454', '55', '2026-02-11 00:07:34', 'PROSALUD', '1'),
(12, 'demo', 'deni', '998989898', '87787878@demo.com', '54455454', '87', '2026-02-11 00:12:07', 'MATERNO', '1'),
(13, 'demo', 'demo', '989898989', 'dedded@demo.com', '54455445', '98', '2026-02-11 00:17:52', 'MATERNO', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_landing`
--

DROP TABLE IF EXISTS `fb_landing`;
CREATE TABLE IF NOT EXISTS `fb_landing` (
  `idlanding` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `edad` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `servicios` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '1',
  `utm_id` varchar(200) DEFAULT NULL,
  `utm_source` varchar(200) DEFAULT NULL,
  `utm_medium` varchar(200) DEFAULT NULL,
  `utm_campaign` varchar(200) DEFAULT NULL,
  `utm_term` varchar(200) DEFAULT NULL,
  `utm_content` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idlanding`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_pagina`
--

DROP TABLE IF EXISTS `fb_pagina`;
CREATE TABLE IF NOT EXISTS `fb_pagina` (
  `idpagina` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `detalle` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `imgdesktop` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imgmovil` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meta_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechapublicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idpagina`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fb_pagina`
--

INSERT INTO `fb_pagina` (`idpagina`, `titulo`, `detalle`, `imgdesktop`, `imgmovil`, `url`, `estado`, `meta_title`, `meta_description`, `meta_keywords`, `fecharegistro`, `fechapublicacion`) VALUES
(2, 'Derechos de las Personas Usuarias de los Servicios de Salud', '<h1 style=\"text-align: center;\"><strong>Derechos y Responsabilidades</strong></h1>\r\n<p>&nbsp;</p>\r\n<p><strong>Derecho al acceso a los servicios de salud</strong></p>\r\n<p style=\"padding-left: 40px;\">&nbsp;</p>\r\n<p style=\"padding-left: 40px;\">a) A recibir atenci&oacute;n de emergencia m&eacute;dica, quir&uacute;rgica y psiqui&aacute;trica en cualquier establecimiento de salud p&uacute;blico o privado.<br />b) A elegir libremente al m&eacute;dico o el establecimiento de salud, seg&uacute;n disponibilidad y estructura de &eacute;ste, con excepci&oacute;n de los servicios de emergencia.<br />c) A recibir atenci&oacute;n de los m&eacute;dicos con libertad para realizar juicios cl&iacute;nicos.<br />d) A solicitar la opini&oacute;n de otro m&eacute;dico, distinto a los que la instituci&oacute;n ofrece, en cualquier momento o etapa de su atenci&oacute;n o tratamiento, sin que afecte el presupuesto de la instituci&oacute;n, bajo responsabilidad del usuario y con conocimiento de su m&eacute;dico tratante.<br />e) A obtener servicios, medicamentos y productos sanitarios adecuados y necesarios para prevenir, promover, conservar o restablecer su salud, seg&uacute;n lo requiera la salud del usuario, garantizando su acceso en forma oportuna y equitativa.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Derecho al acceso a la informaci&oacute;n</strong></p>\r\n<p>&nbsp;</p>\r\n<p style=\"padding-left: 40px;\">a) A ser informado adecuada y oportunamente de los derechos que tiene en su calidad de paciente y de c&oacute;mo &nbsp; ejercerlos.<br />b) A conocer el nombre del m&eacute;dico responsable de su tratamiento, as&iacute; como el de las personas a cargo de la &nbsp; realizaci&oacute;n de los procedimientos cl&iacute;nicos. En caso de que se encuentre disconforme con la atenci&oacute;n, el usuario debe informar del hecho al superior jer&aacute;rquico.<br />c) A recibir informaci&oacute;n necesaria sobre los servicios de salud a los que puede acceder y los requisitos necesarios para su uso, previo al sometimiento a procedimientos diagn&oacute;sticos o terap&eacute;uticos, con excepci&oacute;n de las situaciones de emergencia en que se requiera aplicar dichos procedimientos.<br />d) A recibir informaci&oacute;n completa de las razones que justifican su traslado dentro o fuera del establecimiento de salud, otorg&aacute;ndole las facilidades para tal fin, minimizando los riesgos. El paciente tiene derecho a no ser trasladado sin su consentimiento, salvo raz&oacute;n justificada del responsable del establecimiento. Si no est&aacute; en condiciones de expresarlo, lo asume el llamado por ley o su representante legal.<br />e) A tener acceso al conocimiento preciso y oportuno de las normas, reglamentos y condiciones administrativas del establecimiento de salud.<br />f) A recibir en t&eacute;rminos comprensibles informaci&oacute;n completa, oportuna y continuada sobre su enfermedad, incluyendo el diagn&oacute;stico, pron&oacute;stico y alternativas de tratamiento; as&iacute; como sobre los riesgos, contraindicaciones precauciones y advertencias de las intervenciones, tratamientos y medicamentos que se prescriban y administren. Tiene derecho a recibir informaci&oacute;n de sus necesidades de atenci&oacute;n y tratamiento al ser dado de alta.<br />g) A ser informada sobre su derecho a negarse a recibir o continuar el tratamiento y a que se le explique las consecuencias de esa negativa. La negativa a recibir el tratamiento puede expresarse anticipadamente, una vez conocido el plan terap&eacute;utico contra la enfermedad.<br />h) A ser informada sobre la condici&oacute;n experimental de la aplicaci&oacute;n de medicamentos o tratamientos, as&iacute; como de los riesgos y efectos secundarios de &eacute;stos.<br />i) A conocer en forma veraz, completa y oportuna las caracter&iacute;sticas del servicio, los costos resultantes del cuidado m&eacute;dico, los horarios de consulta, los profesionales de la medicina y dem&aacute;s t&eacute;rminos y condiciones del servicio.</p>\r\n<p><br /><strong>Derecho a la atenci&oacute;n y recuperaci&oacute;n de la salud</strong></p>\r\n<p>&nbsp;</p>\r\n<p style=\"padding-left: 40px;\">a) A ser atendido con pleno respeto a su dignidad e intimidad sin discriminaci&oacute;n por acci&oacute;n u omisi&oacute;n de ning&uacute;n tipo.<br />b) A recibir tratamientos cuya eficacia o mecanismos de acci&oacute;n hayan sido cient&iacute;ficamente comprobados o cuyas reacciones adversas y efectos colaterales le hayan sido advertidos.<br />c) A su seguridad personal y a no ser perturbada o puesta en peligro por personas ajenas al establecimiento y a ella.<br />d) A autorizar la presencia, en el momento del examen m&eacute;dico o intervenci&oacute;n quir&uacute;rgica, de quienes no est&aacute;n directamente implicados en la atenci&oacute;n m&eacute;dica, previa indicaci&oacute;n del m&eacute;dico tratante.<br />e) A que se respete el proceso natural de su muerte como consecuencia del estado terminal de la enfermedad.<br />f) A ser escuchada y recibir respuesta por la instancia correspondiente cuando se encuentre disconforme con la atenci&oacute;n recibida, para estos efectos la Ley proveer&aacute; de mecanismos alternativos y previos al proceso judicial para la soluci&oacute;n de conflictos en los servicios de salud.<br />g) A recibir tratamiento inmediato y reparaci&oacute;n por los da&ntilde;os causados en el establecimiento de salud o servicios m&eacute;dicos de apoyo, de acuerdo con la normativa vigente.<br />h) A ser atendida por profesionales de la salud que est&eacute;n debidamente capacitados, certificados y recertificados, de acuerdo con las necesidades de salud, el avance cient&iacute;fico y las caracter&iacute;sticas de la atenci&oacute;n, y que cuenten con antecedentes satisfactorios en su ejercicio profesional y no hayan sido sancionados o &nbsp; inhabilitados para dicho ejercicio, de acuerdo a la normativa vigente. Para tal efecto, se crear&aacute; el registro &nbsp;correspondiente.</p>\r\n<p><br /><strong>Derecho al consentimiento informado</strong></p>\r\n<p>&nbsp;</p>\r\n<p style=\"padding-left: 40px;\">a) A otorgar su consentimiento informado, libre y voluntario, sin que medie ning&uacute;n mecanismo que vicie su voluntad, para el procedimiento o tratamiento de salud, en especial en las siguientes situaciones:<br />a.1) En la oportunidad previa a la aplicaci&oacute;n de cualquier procedimiento o tratamiento as&iacute; como su interrupci&oacute;n. Quedan exceptuadas del consentimiento informado las situaciones de emergencia, de riesgo debidamente comprobado para la salud de terceros o de grave riesgo para la salud p&uacute;blica. a.2) Cuando se trate de pruebas riesgosas, intervenciones quir&uacute;rgicas, anticoncepci&oacute;n quir&uacute;rgica o procedimientos que puedan afectar la integridad de la persona, supuesto en el cual el consentimiento informado debe constar por escrito en un documento oficial que visibilice el proceso de informaci&oacute;n y decisi&oacute;n. Si la persona no supiere firmar, imprimir&aacute; su huella digital. a.3) Cuando se trate de exploraci&oacute;n, tratamiento o exhibici&oacute;n con fines docentes, el consentimiento informado debe constar por escrito en un documento oficial que visibilice el proceso de informaci&oacute;n y decisi&oacute;n. Si la persona no supiere firmar, imprimir&aacute; su huella digital. b) A que su consentimiento conste por escrito cuando sea objeto de experimentaci&oacute;n para la aplicaci&oacute;n de medicamentos o tratamientos. El consentimiento informado debe constar por escrito en un documento oficial que visibilice el proceso de informaci&oacute;n y decisi&oacute;n. Si la persona no supiere firmar, imprimir&aacute; su huella digital.</p>\r\n<p style=\"padding-left: 40px;\">&nbsp;</p>\r\n<p><strong>Protecci&oacute;n de derechos</strong></p>\r\n<p>&nbsp;</p>\r\n<p style=\"padding-left: 40px;\">a)A tener acceso a la historia cl&iacute;nica y epicrisis.<br />b)Al car&aacute;cter reservado de la informaci&oacute;n contenida en la historia.</p>', '3-banners-inicio-0311zon-2-1774882272.webp', 'banners-inicio-mobile-0311zon-2-1774882275.webp', 'derechos-de-las-personas-usuarias-de-los-servicios-de-salud', '1', 'Derechos del Paciente | Montefiori Salud', 'Conoce los derechos de las personas usuarias de servicios de salud, acceso a atención médica, información clínica y consentimiento informado.', '', '2025-12-01 14:39:28', '2026-04-06 23:14:06'),
(3, 'Términos y Condiciones', '<h1 class=\"footer-popup-title\" style=\"text-align: center;\"><strong>TERMINOS Y CONDICIONES</strong></h1>\r\n<p>&nbsp;</p>\r\n<div class=\"footer-popup-info\">\r\n<p><strong>Derecho al acceso a los servicios de salud</strong></p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li>a) A recibir atenci&oacute;n de emergencia m&eacute;dica, quir&uacute;rgica y psiqui&aacute;trica en cualquier establecimiento de salud p&uacute;blico o privado.</li>\r\n<li>b) A elegir libremente al m&eacute;dico o el establecimiento de salud, seg&uacute;n disponibilidad y estructura de &eacute;ste, con excepci&oacute;n de los servicios de emergencia.</li>\r\n<li>c) A recibir atenci&oacute;n de los m&eacute;dicos con libertad para realizar juicios cl&iacute;nicos.</li>\r\n<li>d) A solicitar la opini&oacute;n de otro m&eacute;dico, distinto a los que la instituci&oacute;n ofrece, en cualquier momento o etapa de su atenci&oacute;n o tratamiento, sin que afecte el presupuesto de la instituci&oacute;n, bajo responsabilidad del usuario y con conocimiento de su m&eacute;dico tratante.</li>\r\n<li>e) A obtener servicios, medicamentos y productos sanitarios adecuados y necesarios para prevenir, promover, conservar o restablecer su salud, seg&uacute;n lo requiera la salud del usuario, garantizando su acceso en forma oportuna y equitativa.</li>\r\n</ol>\r\n<p><strong>Derecho al acceso a la informaci&oacute;n</strong></p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li>a) A ser informado adecuada y oportunamente de los derechos que tiene en su calidad de paciente y de c&oacute;mo&nbsp; &nbsp;ejercerlos.</li>\r\n<li>b) A conocer el nombre del m&eacute;dico responsable de su tratamiento, as&iacute; como el de las personas a cargo de la&nbsp; &nbsp;realizaci&oacute;n de los procedimientos cl&iacute;nicos. En caso de que se encuentre disconforme con la atenci&oacute;n, el usuario debe informar del hecho al superior jer&aacute;rquico.</li>\r\n<li>c) A recibir informaci&oacute;n necesaria sobre los servicios de salud a los que puede acceder y los requisitos necesarios para su uso, previo al sometimiento a procedimientos diagn&oacute;sticos o terap&eacute;uticos, con excepci&oacute;n de las situaciones de emergencia en que se requiera aplicar dichos procedimientos.</li>\r\n<li>d) A recibir informaci&oacute;n completa de las razones que justifican su traslado dentro o fuera del establecimiento de salud, otorg&aacute;ndole las facilidades para tal fin, minimizando los riesgos. El paciente tiene derecho a no ser trasladado sin su consentimiento, salvo raz&oacute;n justificada del responsable del establecimiento. Si no est&aacute; en condiciones de expresarlo, lo asume el llamado por ley o su representante legal.</li>\r\n<li>e) A tener acceso al conocimiento preciso y oportuno de las normas, reglamentos y condiciones administrativas del establecimiento de salud.</li>\r\n<li>f) A recibir en t&eacute;rminos comprensibles informaci&oacute;n completa, oportuna y continuada sobre su enfermedad, incluyendo el diagn&oacute;stico, pron&oacute;stico y alternativas de tratamiento; as&iacute; como sobre los riesgos, contraindicaciones precauciones y advertencias de las intervenciones, tratamientos y medicamentos que se prescriban y administren. Tiene derecho a recibir informaci&oacute;n de sus necesidades de atenci&oacute;n y tratamiento al ser dado de alta.</li>\r\n<li>g) A ser informada sobre su derecho a negarse a recibir o continuar el tratamiento y a que se le explique las consecuencias de esa negativa. La negativa a recibir el tratamiento puede expresarse anticipadamente, una vez conocido el plan terap&eacute;utico contra la enfermedad.</li>\r\n<li>h) A ser informada sobre la condici&oacute;n experimental de la aplicaci&oacute;n de medicamentos o tratamientos, as&iacute; como de los riesgos y efectos secundarios de &eacute;stos.</li>\r\n<li>i) A conocer en forma veraz, completa y oportuna las caracter&iacute;sticas del servicio, los costos resultantes del cuidado m&eacute;dico, los horarios de consulta, los profesionales de la medicina y dem&aacute;s t&eacute;rminos y condiciones del servicio.</li>\r\n</ol>\r\n<p><strong>Derecho a la atenci&oacute;n y recuperaci&oacute;n de la salud</strong></p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li>a) A ser atendido con pleno respeto a su dignidad e intimidad sin discriminaci&oacute;n por acci&oacute;n u omisi&oacute;n de ning&uacute;n tipo.</li>\r\n<li>b) A recibir tratamientos cuya eficacia o mecanismos de acci&oacute;n hayan sido cient&iacute;ficamente comprobados o&nbsp;cuyas reacciones adversas y efectos colaterales le hayan sido advertidos.</li>\r\n<li>c) A su seguridad personal y a no ser perturbada o puesta en peligro por personas ajenas al establecimiento y a ella.</li>\r\n<li>d) A autorizar la presencia, en el momento del examen m&eacute;dico o intervenci&oacute;n quir&uacute;rgica, de quienes no est&aacute;n directamente implicados en la atenci&oacute;n m&eacute;dica, previa indicaci&oacute;n del m&eacute;dico tratante.</li>\r\n<li>e) A que se respete el proceso natural de su muerte como consecuencia del estado terminal de la enfermedad.</li>\r\n<li>f) A ser escuchada y recibir respuesta por la instancia correspondiente cuando se encuentre disconforme con la atenci&oacute;n recibida, para estos efectos la Ley proveer&aacute; de mecanismos alternativos y previos al proceso judicial para la soluci&oacute;n de conflictos en los servicios de salud.</li>\r\n<li>g) A recibir tratamiento inmediato y reparaci&oacute;n por los da&ntilde;os causados en el establecimiento de salud o servicios m&eacute;dicos de apoyo, de acuerdo con la normativa vigente.</li>\r\n<li>h) A ser atendida por profesionales de la salud que est&eacute;n debidamente capacitados, certificados y recertificados, de acuerdo con las necesidades de salud, el avance cient&iacute;fico y las caracter&iacute;sticas de la atenci&oacute;n, y que cuenten con antecedentes satisfactorios en su ejercicio profesional y no hayan sido sancionados o&nbsp; &nbsp;inhabilitados para dicho ejercicio, de acuerdo a la normativa vigente. Para tal efecto, se crear&aacute; el registro&nbsp; correspondiente.</li>\r\n</ol>\r\n<p><strong>Derecho al consentimiento informado</strong></p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li>a) A otorgar su consentimiento informado, libre y voluntario, sin que medie ning&uacute;n mecanismo que vicie su voluntad, para el procedimiento o tratamiento de salud, en especial en las siguientes situaciones:</li>\r\n</ol>\r\n<p>a.1) En la oportunidad previa a la aplicaci&oacute;n de cualquier procedimiento o tratamiento as&iacute; como su interrupci&oacute;n. Quedan exceptuadas del consentimiento informado las situaciones de emergencia, de riesgo debidamente comprobado para la salud de terceros o de grave riesgo para la salud p&uacute;blica. a.2) Cuando se trate de pruebas riesgosas, intervenciones quir&uacute;rgicas, anticoncepci&oacute;n quir&uacute;rgica o procedimientos que puedan afectar la integridad de la persona, supuesto en el cual el consentimiento informado debe constar por escrito en un documento oficial que visibilice el proceso de informaci&oacute;n y decisi&oacute;n. Si la persona no supiere firmar, imprimir&aacute; su huella digital. a.3) Cuando se trate de exploraci&oacute;n, tratamiento o exhibici&oacute;n con fines docentes, el consentimiento informado debe constar por escrito en un documento oficial que visibilice el proceso de informaci&oacute;n y decisi&oacute;n. Si la persona no supiere firmar, imprimir&aacute; su huella digital. b) A que su consentimiento conste por escrito cuando sea objeto de experimentaci&oacute;n para la aplicaci&oacute;n de medicamentos o tratamientos. El consentimiento informado debe constar por escrito en un documento oficial&nbsp;que visibilice el proceso de informaci&oacute;n y decisi&oacute;n. Si la persona no supiere firmar, imprimir&aacute; su huella digital.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Protecci&oacute;n de derechos</strong></p>\r\n<p>a)A tener acceso a la historia cl&iacute;nica y epicrisis.<br />b)Al car&aacute;cter reservado de la informaci&oacute;n contenida en la historia.</p>\r\n</div>', '3-banners-inicio-0311zon-2-1774882389.webp', 'banners-inicio-mobile-0311zon-2-1774882391.webp', 'terminos-y-condiciones', '1', 'Términos y Condiciones – Servicios de Salud', 'Conoce los derechos del paciente, acceso a atención médica, consentimiento informado y condiciones de los servicios de salud brindados.', '', '2025-12-01 14:42:37', '2026-03-30 14:53:12'),
(4, 'Políticas de Cookies', '<h1 style=\"text-align: center;\"><strong>Pol&iacute;ticas de Cookies</strong></h1>\r\n<p><br />SERVICIOS DE SALUD MONTEFIORI SAC informa acerca del uso de las cookies en su p&aacute;gina <a href=\"webhttps://www.montefiori.com.pe/\">webhttps://www.montefiori.com.pe/</a><br /><br /></p>\r\n<p>&iquest;Qu&eacute; son las cookies? Las cookies son archivos que se pueden descargar en su equipo a trav&eacute;s de las p&aacute;ginas web. Son herramientas que tienen un papel esencial para la prestaci&oacute;n de numerosos servicios de la sociedad de la informaci&oacute;n. Entre otros, permiten a una p&aacute;gina web almacenar y recuperar informaci&oacute;n sobre los h&aacute;bitos de navegaci&oacute;n de un usuario o de su equipo y, dependiendo de la informaci&oacute;n obtenida, se pueden utilizar para reconocer al usuario y mejorar el servicio ofrecido. Tipos de cookies Seg&uacute;n quien sea la entidad que gestione el dominio desde donde se env&iacute;an las cookies y trate los datos que se obtengan se pueden distinguir dos tipos:<br /><br /></p>\r\n<ul style=\"list-style-type: square; margin-left: 20px;\">\r\n<li>Cookies propias: aqu&eacute;llas que se env&iacute;an al equipo terminal del usuario desde un equipo o dominio gestionado por el propio editor y desde el que se presta el servicio solicitado por el usuario.</li>\r\n<li>Cookies de terceros: aqu&eacute;llas que se env&iacute;an al equipo terminal del usuario desde un equipo o dominio que no es gestionado por el editor, sino por otra entidad que trata los datos obtenidos trav&eacute;s de las cookies. En el caso de que las cookies sean instaladas desde un equipo o dominio gestionado por el propio editor, pero la informaci&oacute;n que se recoja mediante &eacute;stas sea gestionada por un tercero, no pueden ser consideradas como cookies propias. Existe tambi&eacute;n una segunda clasificaci&oacute;n seg&uacute;n el plazo de tiempo que permanecen almacenadas en el navegador del cliente, pudiendo tratarse de:</li>\r\n<li>Cookies de sesi&oacute;n: dise&ntilde;adas para recabar y almacenar datos mientras el usuario accede a una p&aacute;gina web. Se suelen emplear para almacenar informaci&oacute;n que solo interesa conservar para la prestaci&oacute;n del servicio solicitado por el usuario en una sola ocasi&oacute;n (p.e. una lista de productos adquiridos).</li>\r\n<li>Cookies persistentes: los datos siguen almacenados en el terminal y pueden ser accedidos y tratados durante un periodo definido por el responsable de la cookie, y que puede ir de unos minutos a varios a&ntilde;os. Por &uacute;ltimo, existe otra clasificaci&oacute;n con cinco tipos de cookies seg&uacute;n la finalidad para la que se traten los datos obtenidos:</li>\r\n<li>Cookies t&eacute;cnicas: aquellas que permiten al usuario la navegaci&oacute;n a trav&eacute;s de una p&aacute;gina web, plataforma o aplicaci&oacute;n y la utilizaci&oacute;n de las diferentes opciones o servicios que en ella existan como, por ejemplo, controlar el tr&aacute;fico y la comunicaci&oacute;n de datos, identificar la sesi&oacute;n, acceder a partes de acceso restringido, recordar los elementos que integran un pedido, realizar el proceso de compra de un pedido, realizar la solicitud de inscripci&oacute;n o participaci&oacute;n en un evento, utilizar elementos de seguridad durante la navegaci&oacute;n, almacenar contenidos para la difusi&oacute;n de v&iacute;deos o sonido o compartir contenidos a trav&eacute;s de redes sociales.</li>\r\n<li>Cookies de personalizaci&oacute;n: permiten al usuario acceder al servicio con algunas caracter&iacute;sticas de car&aacute;cter general predefinidas en funci&oacute;n de una serie de criterios en el terminal del usuario como por ejemplo serian el idioma, el tipo de navegador a trav&eacute;s del cual accede al servicio, la configuraci&oacute;n regional desde donde accede al servicio, etc.</li>\r\n<li>Cookies de an&aacute;lisis: permiten al responsable de las mismas, el seguimiento y an&aacute;lisis del comportamiento de los usuarios de los sitios web a los que est&aacute;n vinculadas. La informaci&oacute;n recogida mediante este tipo de cookies se utiliza en la medici&oacute;n de la actividad de los sitios web, aplicaci&oacute;n o plataforma y para la elaboraci&oacute;n de perfiles de navegaci&oacute;n de los usuarios de dichos sitios, aplicaciones y plataformas, con el fin de introducir mejoras en funci&oacute;n del an&aacute;lisis de los datos de uso que hacen los usuarios del servicio.</li>\r\n<li>Cookies publicitarias: permiten la gesti&oacute;n, de la forma m&aacute;s eficaz posible, de los espacios publicitarios.</li>\r\n<li>Cookies de publicidad comportamental: almacenan informaci&oacute;n del comportamiento de los usuarios obtenida a trav&eacute;s de la observaci&oacute;n continuada de sus h&aacute;bitos de navegaci&oacute;n, lo que permite desarrollar un perfil espec&iacute;fico para mostrar publicidad en funci&oacute;n del mismo.</li>\r\n<li>Cookies de redes sociales externas: se utilizan para que los visitantes puedan interactuar con el contenido de diferentes plataformas sociales (facebook, youtube, twitter, linkedIn, etc..) y que se generen &uacute;nicamente para los usuarios de dichas redes sociales. Las condiciones de utilizaci&oacute;n de estas cookies y la informaci&oacute;n recopilada se regula por la pol&iacute;tica de privacidad de la plataforma social correspondiente. Desactivaci&oacute;n y eliminaci&oacute;n de cookies Tienes la opci&oacute;n de permitir, bloquear o eliminar las cookies instaladas en tu equipo mediante la configuraci&oacute;n de las opciones del navegador instalado en su equipo. Al desactivar cookies, algunos de los servicios disponibles podr&iacute;an dejar de estar operativos. La forma de deshabilitar las cookies es diferente para cada navegador, pero normalmente puede hacerse desde el men&uacute; Herramientas u Opciones. Tambi&eacute;n puede consultarse el men&uacute; de Ayuda del navegador d&oacute;nde puedes encontrar instrucciones. El usuario podr&aacute; en cualquier momento elegir qu&eacute; cookies quiere que funcionen en este sitio web. Puede usted permitir, bloquear o eliminar las cookies instaladas en su equipo mediante la configuraci&oacute;n de las opciones del navegador instalado en su ordenador:</li>\r\n<li>Microsoft Internet Explorer o Microsoft Edge: <a href=\"http://windows.microsoft.com/es-es/windows-vista/Block-or-allow-cookies\">http://windows.microsoft.com/es-es/windows-vista/Block-or-allow-cookies</a></li>\r\n<li>Mozilla Firefox: <a href=\"http://support.mozilla.org/es/kb/impedir-que-los-sitios-web-guarden-sus-preferencia\">http://support.mozilla.org/es/kb/impedir-que-los-sitios-web-guarden-sus-preferencia</a></li>\r\n<li>Chrome: <a href=\"https://support.google.com/accounts/answer/61416?hl=es\">https://support.google.com/accounts/answer/61416?hl=es</a></li>\r\n<li>Safari: <a href=\"http://safari.helpmax.net/es/privacidad-y-seguridad/como-gestionar-las-cookies/\">http://safari.helpmax.net/es/privacidad-y-seguridad/como-gestionar-las-cookies/</a></li>\r\n<li>Opera: http://help.opera.com/Linux/10.60/es-ES/cookies.html Adem&aacute;s, tambi&eacute;n puede gestionar el almac&eacute;n de cookies en su navegador a trav&eacute;s de herramientas como las siguientes &bull; Ghostery: <a href=\"http://www.ghostery.com/\">www.ghostery.com/</a></li>\r\n<li>Your online https://www.montefiori.com.pe/ Cookies utilizadas enhttps://www.montefiori.com.pe/A continuaci&oacute;n, se identifican las cookies que est&aacute;n siendo utilizadas en este portal, as&iacute; como su tipolog&iacute;a y funci&oacute;n: Aceptaci&oacute;n de la Pol&iacute;tica de cookieshttps://www.montefiori.com.pe/asume que usted acepta el uso de cookies. No obstante, muestra informaci&oacute;n sobre su Pol&iacute;tica de cookies en la parte inferior o superior de cualquier p&aacute;gina del portal con cada inicio de sesi&oacute;n con el objeto de que usted sea consciente. Ante esta informaci&oacute;n es posible llevar a cabo las siguientes acciones:</li>\r\n<li>Aceptar cookies. No se volver&aacute; a visualizar este aviso al acceder a cualquier p&aacute;gina del portal durante la presente sesi&oacute;n.</li>\r\n<li>Cerrar. Se oculta el aviso en la presente p&aacute;gina.</li>\r\n<li>Modificar su configuraci&oacute;n. Podr&aacute; obtener m&aacute;s informaci&oacute;n sobre qu&eacute; son las cookies, conocer la Pol&iacute;tica de cookies dehttps://www.montefiori.com.pe/y modificar la configuraci&oacute;n de su navegador.</li>\r\n</ul>', '3-banners-inicio-0311zon-2-1774882204.webp', 'banners-inicio-mobile-0311zon-2-1774882206.webp', 'politicas-de-cookies', '1', 'Política de Cookies – Montefiori Salud', 'Información sobre el uso de cookies, tipos, finalidades y cómo gestionarlas o desactivarlas en el sitio web de Servicios de Salud Montefiori.', '', '2025-12-01 14:43:23', '2026-03-30 14:50:07'),
(5, 'Política de Privacidad', '<h1 style=\"text-align: center;\"><strong>Pol&iacute;tica de Privacidad de la Cl&iacute;nica Montefiori</strong></h1>\r\n<p style=\"text-align: center;\">Fecha de &uacute;ltima actualizaci&oacute;n: [21 de setiembre 2023]</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p>En Servicios de Salud Montefiori S.A.C., identificada con RUC 20461665820, domiciliada en Avenida Separadora Industrial 1820 Urbanizaci&oacute;n Los Cactus, La Molina (en adelante, \" Cl&iacute;nica Montefiori\"), estamos comprometidos con la protecci&oacute;n y privacidad de sus datos personales. Esta Pol&iacute;tica de Privacidad explica c&oacute;mo recopilamos, utilizamos y protegemos la informaci&oacute;n que obtenemos de nuestros pacientes y usuarios de nuestra p&aacute;gina web, de conformidad con lo establecido en la Ley de Protecci&oacute;n de Datos Personales Ley 29733 y su Reglamento aprobado por D.S. 003-2013-JUS, espec&iacute;ficamente, lo referido al cumplimiento con lo dispuesto en el art&iacute;culo 18 de la Ley 29733. Para ello, agradecemos leer esta Pol&iacute;tica de Privacidad antes de proporcionarnos sus datos personales de manera facultativa y, si est&aacute; de acuerdo, marcar el (los) recuadro(s) de aceptaci&oacute;n. Estos datos son necesarios para cumplir con las finalidades descritas en la presente Pol&iacute;tica de Privacidad, por lo que, al no permitir su tratamiento, impedir&iacute;a estar en condiciones para cumplir las mismas.</p>\r\n<h4><strong>1. Datos Personales Recopilados</strong></h4>\r\n<p>Responsable de la Protecci&oacute;n de Datos Personales<br />La Cl&iacute;nica Montefiori ha inscrito en el Registro Nacional de Protecci&oacute;n de Datos Personales el Banco de Datos Personales &ldquo;Pacientes&rdquo; C&oacute;digo RNPDP-PJP N&deg; 16210, seg&uacute;n Resoluci&oacute;n Directoral 1332-2019-JUS/DGTAIPD-DPDP y el Banco de Datos Personales &ldquo;Usuarios de la P&aacute;gina Web&rdquo; C&oacute;digo RNPDP-PJP N&deg; 16208, mediante Resoluci&oacute;n Directoral 1330-2019-JUS/DGTAIPD-DPDP, de los cuales es titular Servicios de Salud Montefiori S.A.C. identificada con RUC 20461665820 y con domicilio en Av. Separadora Industrial N&deg; 1820 Urbanizaci&oacute;n Los Cactus &ndash; La Molina, como el responsable de la protecci&oacute;n de datos personales.</p>\r\n<p>Importante destacar que del banco de datos &ldquo;Usuarios de la P&aacute;gina Web&rdquo; ni de los otros bancos da datos inscritos, no se han realizado ni se efect&uacute;a flujo transfronterizo de datos al extranjero.</p>\r\n<p>Resguardo de la informaci&oacute;n del Usuario<br />La Cl&iacute;nica Montefiori adopta las medidas de seguridad necesarias para garantizar la protecci&oacute;n de la informaci&oacute;n del titular de datos personales o usuario a fin de evitar su alteraci&oacute;n, p&eacute;rdida, tratamiento y/o acceso no autorizado, tomando en consideraci&oacute;n la naturaleza de la informaci&oacute;n y los riesgos a los que se encuentran expuestos. Para proteger los Datos Personales del Usuario, cumplimos estrictamente con lo establecido en la Ley 29733 y su Reglamento.</p>\r\n<div>\r\n<h4><strong>2. Finalidades del Tratamiento de Datos</strong></h4>\r\n<span class=\"text-justify\">Los datos personales recopilados se tratan para diversas finalidades, entre las que se incluyen:</span><br />\r\n<ul>\r\n<li>Prestaci&oacute;n de servicios m&eacute;dicos y atenci&oacute;n al paciente.</li>\r\n<li>Gesti&oacute;n administrativa y financiera.</li>\r\n<li>Comunicaci&oacute;n con nuestros pacientes y usuarios.</li>\r\n<li>Mejora de nuestros servicios y atenci&oacute;n al cliente.</li>\r\n<li>Cumplimiento de obligaciones legales y regulatorias.</li>\r\n</ul>\r\n</div>\r\n<div>\r\n<h4>3. Transferencia, conservaci&oacute;n y divulgaci&oacute;n de Datos Personales</h4>\r\n<p>De acuerdo con las normas de protecci&oacute;n de datos personales, en la &ldquo;Cl&iacute;nica Montefiori&rdquo; estamos legalmente autorizados para usar los datos personales de los usuarios, con la finalidad de ejecutar la relaci&oacute;n contractual que mantienen con nosotros. Tambi&eacute;n podemos usar y compartir los datos personales, incluyendo las vinculadas al sistema de prevenci&oacute;n de lavado de activos y normas prudenciales. La Cl&iacute;nica Montefiori, conforme a lo previsto en la Ley N&deg; 29733 y su reglamento, podr&aacute; conservar y utilizar la Informaci&oacute;n mientras se mantenga la relaci&oacute;n contractual con el Usuario y hasta por un plazo de diez (10) a&ntilde;os despu&eacute;s de que finalice dicho v&iacute;nculo o relaci&oacute;n comercial.</p>\r\n<p>La Cl&iacute;nica Montefiori se compromete a no divulgar o compartir los Datos Personales del Usuario, sin que haya prestado el debido consentimiento para ello, con excepci&oacute;n de las autoridades y terceros autorizados por la ley con la finalidad de cumplir con las obligaciones se&ntilde;aladas en las normas peruanas o internacionales, como en los siguientes casos:</p>\r\n<ul>\r\n<li>Solicitudes de informaci&oacute;n de autoridades p&uacute;blicas en ejercicio de sus funciones y el &aacute;mbito de sus competencias.</li>\r\n<li>Solicitudes de informaci&oacute;n referidas a la prevenci&oacute;n de lavado de activos y financiamiento del terrorismo.</li>\r\n<li>Solicitudes de informaci&oacute;n en virtud de &oacute;rdenes judiciales.</li>\r\n<li>Solicitudes de informaci&oacute;n en virtud de disposiciones legales.</li>\r\n</ul>\r\n</div>\r\n<div>\r\n<h4><strong>4. Derechos de los Titulares de Datos Personales</strong></h4>\r\n<p>Los titulares de datos personales tienen derechos reconocidos por la Ley de Protecci&oacute;n de Datos Personales de Per&uacute;. Entre estos derechos se incluyen el derecho de acceso, rectificaci&oacute;n, cancelaci&oacute;n y oposici&oacute;n (derechos ARCO), los mismos que se detallan a continuaci&oacute;n:</p>\r\n<p>Los derechos que ostenta el titular de datos personales o usuario son los siguientes:</p>\r\n<ul class=\"text-justify\">\r\n<li>Derecho de acceso: El Usuario tiene derecho a obtener la informaci&oacute;n que sobre s&iacute; mismo sea objeto de tratamiento en bancos de datos de administraci&oacute;n p&uacute;blica o privada, la forma en que sus datos fueron recopilados, las razones que motivaron su recopilaci&oacute;n y a solicitud de qui&eacute;n se realiz&oacute; la recopilaci&oacute;n, as&iacute; como las transferencias realizadas o que se prev&eacute;n hacer de ellos.</li>\r\n<li>Derecho de rectificaci&oacute;n (actualizaci&oacute;n, inclusi&oacute;n): El Usuario tiene derecho que se modifiquen los datos que resulten ser parcial o totalmente inexactos, incompletos, err&oacute;neos o falsos.</li>\r\n<li>Derecho de cancelaci&oacute;n (supresi&oacute;n): El Usuario podr&aacute; solicitar la supresi&oacute;n o cancelaci&oacute;n de sus datos personales de un banco de datos personales cuando estos hayan dejado de ser necesarios o pertinentes para la finalidad para la cual hayan sido recopilados; hubiere vencido el plazo establecido para su tratamiento; se ha revocado su consentimiento para el tratamiento y en los dem&aacute;s casos en los que no est&aacute;n siendo tratados conforme a la Ley y al Reglamento.</li>\r\n<li>Derecho de oposici&oacute;n: El Usuario tiene derecho a oponerse por un motivo leg&iacute;timo y fundado, referido a una situaci&oacute;n personal concreta, a figurar en un banco de datos o al tratamiento de sus Datos Personales, siempre que por una ley no se disponga lo contrario.</li>\r\n<li>Derecho de revocaci&oacute;n: El Usuario podr&aacute; revocar su consentimiento para el tratamiento de sus Datos Personales en cualquier momento, sin justificaci&oacute;n previa y sin que le atribuyan efectos retroactivos.</li>\r\n</ul>\r\n<p>Si usted es paciente de la Cl&iacute;nica Montefiori o un usuario de nuestra p&aacute;gina web, puede ejercer estos derechos. Para hacerlo, p&oacute;ngase en contacto con nosotros por los siguientes medios:<br />Direcci&oacute;n: Av. Separadora Industrial N&deg; 1820 &ndash; Urb. Los Cactus &ndash; La Molina.<br />Correo Electr&oacute;nico: atencionalusuariomontefiori.com.pe.<br />Central Telef&oacute;nica: 437-5151.</p>\r\n</div>\r\n<div>\r\n<h4><strong>5. Uso de cookies</strong></h4>\r\n<p>Este sitio web utiliza cookies que son peque&ntilde;os archivos que se almacenan en las computadoras y que nos permiten recordar caracter&iacute;sticas o preferencias de la navegaci&oacute;n que tiene en nuestra web. Gracias a esto podemos personalizar los ingresos a la web en futuras visitas, hacer m&aacute;s segura la navegaci&oacute;n y conocer sus preferencias para ofrecerle informaci&oacute;n de su inter&eacute;s.<br />Puede configurar su navegador para aceptar o rechazar la instalaci&oacute;n de cookies o suprimirlos una vez que haya finalizado la navegaci&oacute;n en nuestro sitio web. &ldquo;La Cl&iacute;nica&rdquo; no se responsabiliza de que la desactivaci&oacute;n de las cookies pueda impedir el buen funcionamiento de nuestra web.</p>\r\n</div>\r\n<div>\r\n<h4><strong>6. Declaraci&oacute;n de mayor&iacute;a de edad</strong></h4>\r\n<p>Al brindar sus datos personales a la Cl&iacute;nica Montefiori, el Usuario declara tener al menos dieciocho a&ntilde;os de edad o ser titular de la patria potestad o tutor del menor de edad respecto de quien se otorga el consentimiento para el tratamiento de datos personales, de forma v&aacute;lida de acuerdo a la Ley; excepcionalmente, los adolescentes entre 14 y 18 a&ntilde;os que no se encuentren bajo patria potestad ni cuenten con tutor, podr&aacute;n otorgar el consentimiento para el tratamiento de sus datos personales.</p>\r\n<p>En el supuesto que se tome conocimiento que los Datos Personales recogidos corresponden a un menor de edad sin autorizaci&oacute;n de su representante legal o tutor, se adoptar&aacute;n las medidas oportunas para eliminarlos.</p>\r\n</div>\r\n<div>\r\n<h4><strong>7. Actualizaci&oacute;n de la Pol&iacute;tica de Privacidad</strong></h4>\r\n<p>La Cl&iacute;nica Montefiori se reserva el derecho de modificar esta Pol&iacute;tica de Privacidad en cualquier momento y sin previo aviso. Toda modificaci&oacute;n entrar&aacute; en vigencia y tendr&aacute; efectos desde su publicaci&oacute;n en este sitio web. Le recomendamos revisar regularmente esta pol&iacute;tica para estar al tanto de cualquier cambio.</p>\r\n<p>Si tiene alguna pregunta o inquietud relacionada con nuestra Pol&iacute;tica de Privacidad o el tratamiento de sus datos personales, no dude en ponerse en contacto con nosotros.</p>\r\n<p>&nbsp;</p>\r\n<p>Fecha de &uacute;ltima actualizaci&oacute;n: [21 de setiembre 2023]</p>\r\n</div>', '3-banners-inicio-0311zon-2-1774882241.webp', 'banners-inicio-mobile-0311zon-2-1774882244.webp', 'politica-de-privacidad', '1', 'Política de Privacidad', 'Información sobre el tratamiento y protección de datos personales de nuestros pacientes según la normativa vigente en Perú.', '', '2026-03-28 15:34:22', '2026-03-30 14:50:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_popup`
--

DROP TABLE IF EXISTS `fb_popup`;
CREATE TABLE IF NOT EXISTS `fb_popup` (
  `idpopup` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechapublicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `imgdesktop` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `imgmovil` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`idpopup`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `fb_popup`
--

INSERT INTO `fb_popup` (`idpopup`, `titulo`, `fecharegistro`, `fechapublicacion`, `url`, `estado`, `imgdesktop`, `imgmovil`) VALUES
(1, 'Promoción', '2025-12-02 04:07:43', '2026-04-06 18:09:39', '', '1', 'pop-promocion-consultas-1775498979.webp', 'pop-promocion-consultas-1775498979.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_roles`
--

DROP TABLE IF EXISTS `fb_roles`;
CREATE TABLE IF NOT EXISTS `fb_roles` (
  `idrol` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `page` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `fb_roles`
--

INSERT INTO `fb_roles` (`idrol`, `nombre`, `page`, `fecharegistro`, `estado`) VALUES
(1, 'SUPERADMIN', 'Secciones,Secciones-add,Slider,Slider-add,Popup,Popup-add,Usuarios,Usuarios-add,Blog,Blog-add,Convenios,Convenios-add,Página,Página-add,Roles,Roles-add,Trabaja con nosotros,Contacto,Solicite Presupuesto,Médicos,Especialidades,Especialidades-add,Testimonios,Testimonios-add,Categoria,Categoria-add,Redes,Redes-add,Aseguradoras,Aseguradoras-add', '2026-02-20 02:51:19', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_rrss`
--

DROP TABLE IF EXISTS `fb_rrss`;
CREATE TABLE IF NOT EXISTS `fb_rrss` (
  `idrs` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `imgdesktop` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `icono` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `orden` int DEFAULT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT '0',
  PRIMARY KEY (`idrs`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fb_rrss`
--

INSERT INTO `fb_rrss` (`idrs`, `titulo`, `imgdesktop`, `icono`, `url`, `orden`, `fecharegistro`, `estado`) VALUES
(1, 'Facebook', '', '', 'https://www.facebook.com/ClinicaMontefiori?mibextid=LQQJ4d', 1, '2025-11-27 12:59:29', '1'),
(2, 'Instagram', '', '', 'https://www.instagram.com/clinicamontefiori.pe/?igshid=MzRlODBiNWFlZA%3D%3D', 2, '2025-11-27 12:59:42', '1'),
(3, 'Linkedin', '', '', 'https://www.linkedin.com/company/clinica-montefiori/', 3, '2025-11-27 12:59:59', '1'),
(4, 'Youtube', '', '', 'https://www.youtube.com/@clinicamontefiori8164', 4, '2025-11-27 13:00:16', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_secciones`
--

DROP TABLE IF EXISTS `fb_secciones`;
CREATE TABLE IF NOT EXISTS `fb_secciones` (
  `idseccion` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `meta_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`idseccion`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `fb_secciones`
--

INSERT INTO `fb_secciones` (`idseccion`, `nombre`, `meta_title`, `meta_description`, `meta_keywords`, `fecharegistro`, `estado`) VALUES
(12, 'Home', 'Clínica Montefiori', '40 años brindando salud en Lima Este con Cordialidad, Confianza y Rapidez. Tu bienestar es nuestra prioridad desde 1983.', '', '2026-03-27 11:00:48', '1'),
(13, 'Nosotros', 'Clínica Montefiori: Nuestra Historia y Cultura CCR', 'Conoce nuestra trayectoria desde 1983 en Lima Este. Basamos nuestra atención en la Cordialidad, Confianza y Rapidez para el bienestar de tu familia.', '', '2026-03-27 11:01:06', '1'),
(14, 'Servicios', 'Servicios Médicos Integrales en La Molina', 'Ofrecemos una amplia gama de servicios: emergencias 24h, consultas, hospitalización y diagnósticos con alta tecnología y trato humano.', '', '2026-03-27 11:01:20', '1'),
(15, 'Medicos', 'Staff Médico: Especialistas de Confianza', 'Encuentra al profesional ideal para tu salud. Más de 150 médicos altamente calificados y comprometidos con tu bienestar integral.', '', '2026-03-27 11:06:10', '1'),
(16, 'Especialidades', 'Más de 35 Especialidades Médicas', 'Conoce nuestra amplia oferta médica. Desde Cardiología hasta Traumatología, contamos con especialistas listos para cuidar de ti.', '', '2026-03-17 20:25:30', '1'),
(17, 'Blog', 'demito de blog', 'demito de blog', 'demito de blog', '2025-12-11 00:53:32', '1'),
(18, 'Información para pacientes', 'Guía e Información para el Paciente', 'Todo lo que necesitas saber: preparación para exámenes, descarga de resultados, horarios y consejos para tu atención en Clínica Montefiori.', '', '2026-03-27 11:06:31', '1'),
(19, 'Programa Salud', 'Plan de Salud PROSALUD', 'Accede a tarifas preferenciales en consultas y servicios médicos sin necesidad de un seguro tradicional.', '', '2026-03-27 11:06:47', '1'),
(20, 'Servicio Hospitalización', 'Hospitalización y Cirugía', 'Habitaciones individuales, centro quirúrgico moderno y UCI las 24 horas para una recuperación segura y humana.', '', '2026-03-27 11:05:27', '1'),
(21, 'Trabaja con nosotros', 'Oportunidades Laborales', 'Forma parte de nuestro equipo de salud. Envía tu CV y crece profesionalmente en Clínica Montefiori.', '', '2026-03-27 11:12:40', '1'),
(22, 'Solicita Presupuesto', 'Presupuestos Quirúrgicos y Médicos', 'Solicita el presupuesto para tu procedimiento o cirugía de forma ágil vía correo o WhatsApp.', '', '2026-03-27 11:12:21', '1'),
(23, 'Servicio Auxiliares', 'Diagnóstico, Laboratorio y Farmacia', 'Contamos con laboratorio clínico, diagnóstico por imágenes y farmacia las 24 horas para tu atención integral.', '', '2026-03-27 11:05:55', '1'),
(24, 'Servicio Emergencia Adulto', 'Emergencia Adultos 24 Horas', 'Atención inmediata y segura las 24 horas, los 365 días del año. Contamos con 15 boxes y Unidad de Trauma Shock.', '', '2026-03-28 15:11:42', '1'),
(25, 'Servicio Emergencia Pediatrica', 'Emergencia Pediátrica 24 Horas', 'Cuidado especializado para niños las 24 horas. Staff altamente capacitado, 9 boxes y equipos modernos en Lima Este.', '', '2026-03-28 15:11:51', '1'),
(26, 'Servicio Consultas Ambulatorias', 'Consultas Médicas y Especialidades', 'Atención integral con más de 35 especialidades y 150 especialistas. Citas con disponibilidad inmediata en La Molina.', '', '2026-03-27 11:14:41', '1'),
(27, 'servicio Paquete Materno', 'Programa Materno Integral', 'Te acompañamos en cada etapa: pre-natal, parto y post-parto. Incluye ecografía 4D al 100% y facilidades de pago.', '', '2026-03-27 11:11:51', '1'),
(28, 'Preparacion para Procedimientos', 'Guía de Preparación para Procedimientos Médicos', 'Recomendaciones para tu cirugía, endoscopía o colonoscopía. Asegura una atención segura siguiendo nuestras pautas de ayuno, documentación y acompañamiento.', '', '2026-03-27 11:13:21', '1'),
(29, 'Terminos y condiciones', 'Términos y Condiciones – Servicios de Salud', 'Conoce los derechos del paciente, acceso a atención médica, consentimiento informado y condiciones de los servicios de salud brindados.', '', '2026-03-27 11:22:45', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_solicite_presupuesto`
--

DROP TABLE IF EXISTS `fb_solicite_presupuesto`;
CREATE TABLE IF NOT EXISTS `fb_solicite_presupuesto` (
  `idpresupuesto` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `paterno` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `materno` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `sexo` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `orden_medica` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `adjunta_archivo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`idpresupuesto`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `fb_solicite_presupuesto`
--

INSERT INTO `fb_solicite_presupuesto` (`idpresupuesto`, `nombre`, `paterno`, `materno`, `dni`, `sexo`, `telefono`, `email`, `fecha`, `orden_medica`, `adjunta_archivo`, `fecharegistro`, `estado`) VALUES
(1, 'demo', 'demo', 'demo', '09999999', 'F', '988988988', 'demo@demo.com', NULL, '1770750799_logo_silvia2.png', '1770750799_seguridad-ia-02.jpg', '2026-02-10 19:13:19', '1'),
(2, 'demo', 'demo', 'demo', '48484844', 'F', '989899898', 'alejj20@gmail.com', NULL, '1770751086_showfile.pdf', '1770751086_showfile.pdf', '2026-02-10 19:18:14', '1'),
(3, 'demo', 'demo', 'demo', '48484844', 'F', '989899898', 'sistemas@agallas.com.pe', NULL, '1770751098_showfile.pdf', '1770751098_showfile.pdf', '2026-02-10 19:18:27', '1'),
(4, 'demo', 'demo', 'demo', '48484844', 'F', '989899898', 'sistemas@agallas.com.pe', NULL, '1770751104_showfile.pdf', '1770751104_showfile.pdf', '2026-02-10 19:18:31', '1'),
(5, 'demo', 'demo', 'demo', '48484844', 'F', '989899898', 'sistemas@agallas.com.pe', NULL, '1770751180_showfile.pdf', '1770751180_showfile.pdf', '2026-02-10 19:19:40', '1'),
(6, 'demo', 'demo', 'demo', '48484844', 'F', '989899898', 'sistemas@agallas.com.pe', NULL, '1770751206_showfile.pdf', '1770751206_showfile.pdf', '2026-02-10 19:20:06', '1'),
(7, 'demo', 'demo', 'demo', '48484844', 'F', '989899898', 'sistemas@agallas.com.pe', NULL, '1770751268_showfile.pdf', '1770751268_showfile.pdf', '2026-02-10 19:21:16', '1'),
(8, 'demo', 'demo', 'demo', '41904653', 'M', '989989898', 'hola@eni.com', NULL, '1770751348_logo_silvia__1_.png', '1770751348_seguridad-ia-02.jpg', '2026-02-10 19:22:36', '1'),
(9, 'demo', 'demo', 'demo', '41904653', 'M', '989989898', 'hola@eni.com', NULL, '1770751559_logo_silvia__1_.png', '1770751559_seguridad-ia-02.jpg', '2026-02-10 19:26:05', '1'),
(10, 'agallas', 'agallas', 'agallas', '98989989', 'M', '989898989', 'agallas@agallas.com', NULL, '1770751741_WIN-Ronald-pacora-.jpg', '1770751741_remax-silvia.png', '2026-02-10 19:29:09', '1'),
(11, 'alejo', 'demo', 'demo', '41414141', 'F', '989989898', 'demo@demo.com', NULL, '1770752121_Arquitecturas_Self_Healing-1.jpg', '1770752121_735c1dd0-18f0-48e4-ae31-da51d0b14ef3.jpg', '2026-02-10 19:35:21', '1'),
(12, 'demo', 'agallas', 'demoafalllas', '41904653', 'M', '984357117', 'sistemas@agallas.com.pe', NULL, '', '', '2026-02-10 19:43:24', '1'),
(13, 'adjuntomail', 'adjuntomail', 'adjuntomail', '41545454', 'F', '998989898', 'adjuntomail@mail.com', NULL, '1770752685_logo_silvia__1_.png', '1770752685_dd5162b0-7ba4-4bd3-9794-cf4245e72ea0.jpg', '2026-02-10 19:44:45', '1'),
(14, 'alejandro', 'demode', 'demo', '54454545', 'M', '989898989', 'sistemas@agallas.com.pe', NULL, '', '', '2026-02-10 21:36:20', '1'),
(15, 'demofinal', 'finaldemo', 'finaldemo', '54454554', 'M', '989898989', 'sistemas@agallas.com.pe', NULL, '', '', '2026-02-10 21:39:42', '1'),
(16, 'deemo', 'sdadasdasd', 'asdasdasd', '65564455', 'M', '984357117', 'sistemas@agallas.com.pe', NULL, '', '', '2026-02-10 21:40:54', '1'),
(17, 'demo', 'demo', 'demo', '45454545', 'M', '999999999', 'sistemas@agallas.com.pe', NULL, '1770767048_seguridad-ia-02.jpg', '1770767048_MotivatorWorksheet.pdf', '2026-02-10 23:44:08', '1'),
(18, 'demo', 'demo', 'demo', '55445454', 'M', '989898989', 'demo@demo.com', NULL, '1770767390_seguridad-ia-02.jpg', '1770767390_MotivatorWorksheet.pdf', '2026-02-10 23:49:50', '1'),
(19, 'alejo', 'demo', 'demo', '64554545', 'F', '998989898', 'sistemas@agallas.com.pe', NULL, '1770767537_seguridad-ia-02.jpg', '1770767537_remax-silvia.png', '2026-02-10 23:52:17', '1'),
(20, 'alejandro', 'Cuatodio', 'ALbino', '41904653', 'M', '984357117', 'alejj20@gmail.com', NULL, '1773071791_CAR__TULA_FOLDER_TALLERES_2DO_GRADO.pdf', '1773071791_CARATULAS_CUADERNOS_2DO_GRADO.pdf', '2026-03-09 15:56:31', '1'),
(21, 'Sistemas', 'demo', 'Agallas', '41904653', 'F', '999999999', 'sistemas@agallas.com.pe', NULL, '', '', '2026-03-19 22:57:51', '1'),
(22, 'demo', 'demo', 'demo', '99595955', 'F', '988998987', 'demo@deomc.com', NULL, '', '', '2026-03-24 16:51:21', '1'),
(23, 'marcionado', 'marcionado', 'marcionado', '87887878', 'M', '989898989', 'marcionado@marcionado.com', NULL, '1774371175_marzo-belen.png', '1774371175_e2f31bfd-4075-42e7-879f-d25001356611.jpg', '2026-03-24 16:52:55', '1'),
(24, 'ters', 'ters', 'ters', '99878787', 'F', '987878545', 'ters@ters.com', NULL, '', '', '2026-03-24 16:55:28', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_testimonios`
--

DROP TABLE IF EXISTS `fb_testimonios`;
CREATE TABLE IF NOT EXISTS `fb_testimonios` (
  `idtestimonio` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `bajada` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `imgdesktop` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `orden` int DEFAULT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT '0',
  PRIMARY KEY (`idtestimonio`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fb_testimonios`
--

INSERT INTO `fb_testimonios` (`idtestimonio`, `titulo`, `bajada`, `imgdesktop`, `youtube`, `orden`, `fecharegistro`, `estado`) VALUES
(9, 'Elizabeth Callupe', 'La operación salió muy bien y fue una enorme alegría para mí y para todos los que me rodeaban. Ver también la alegría del doctor me dio mucha tranquilidad; sentí que era una respuesta de Dios. Fue realmente un gran alivio.', 'Elizabeth Callupe.png', 'DM2p-z8M9Vg', 1, '2026-03-29 00:08:07', '1'),
(10, 'Rosa Vite', 'Las obstetras me acompañaron en cada momento, dándome la información y la confianza que necesitaba para vivir plenamente este momento tan especial.', 'Rosa Vite.webp', '4EsbaDRL_v4', 2, '2026-03-29 00:08:16', '1'),
(11, 'Romina Rojas', 'Conocí el programa gracias a la recomendación de mi cuñada, quien tuvo una muy buena experiencia en la clínica. Fue así como llegué y descubrí todos los beneficios que ofrecen, con un equipo altamente calificado y una atención realmente personalizada.', 'Romina Rojas.webp', 'dP1W0SsPCX8', 3, '2026-03-29 00:08:12', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_trabaja_nosotros`
--

DROP TABLE IF EXISTS `fb_trabaja_nosotros`;
CREATE TABLE IF NOT EXISTS `fb_trabaja_nosotros` (
  `idtrabaja` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `adjunta_archivo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`idtrabaja`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `fb_trabaja_nosotros`
--

INSERT INTO `fb_trabaja_nosotros` (`idtrabaja`, `nombre`, `apellidos`, `telefono`, `email`, `adjunta_archivo`, `fecharegistro`, `estado`) VALUES
(1, 'demo', 'demodemo', '984357117', 'sistemas@agallas.com.pe', '1770762983_103-A-2026026380_Carta-R_SBP_COO_AF_1_de_1.pdf', '2026-02-10 22:36:23', '1'),
(2, 'demo', 'demodemo', '984357117', 'sistemas@agallas.com.pe', '1770763146_103-A-2026026380_Carta-R_SBP_COO_AF_1_de_1.pdf', '2026-02-10 22:39:06', '1'),
(3, 'demo', 'demo', '887988798', 'dedede@ded.com', '1770765438_103-A-2026026380_Carta-R_SBP_COO_AF_1_de_1.pdf', '2026-02-10 23:17:18', '1'),
(4, 'demo', 'demo', '989898989', 'demo@demo.com', '1770765551_103-A-2026026380_Carta-R_SBP_COO_AF_1_de_1.pdf', '2026-02-10 23:19:11', '1'),
(5, 'demo', 'demo', '989898989', '8998989898@asdasd.com', '1770765673_103-A-2026026380_Carta-R_SBP_COO_AF_1_de_1.pdf', '2026-02-10 23:21:13', '1'),
(6, 'demo', 'ono de conta', '989898989', '98989898@demo.com', '1770765852_MotivatorWorksheet.pdf', '2026-02-10 23:24:12', '1'),
(7, 'demo', 'demo', '989898989', 'demo@demo.com', '1770765895_MotivatorWorksheet.pdf', '2026-02-10 23:24:55', '1'),
(8, 'demo', 'demo', '989899898', 'demo@demo.com', '1770766249_dd5162b0-7ba4-4bd3-9794-cf4245e72ea0.jpg', '2026-02-10 23:30:49', '1'),
(9, 'demo', 'demo', '989898989', 'demo@demo.com', '1770766313_dd5162b0-7ba4-4bd3-9794-cf4245e72ea0.jpg', '2026-02-10 23:31:53', '1'),
(10, 'holitas', 'adiosito', '989989898', 'demo@demo.com', '1770766618_MotivatorWorksheet.pdf', '2026-02-10 23:36:58', '1'),
(11, 'demo', 'demo', '989898989', 'demo@demo.com', '1770766652_MotivatorWorksheet.pdf', '2026-02-10 23:37:32', '1'),
(12, 'demo', 'demo', '989898989', '98demo@demo.com', '1770767576_logo_silvia2.png', '2026-02-10 23:52:56', '1'),
(13, 'demo', 'demo', '989898989', 'demo@demo.com', '1774366449_marzo-belen.png', '2026-03-24 15:34:09', '1'),
(14, 'demo', 'demo', '998989898', 'demo@demo.com', '1774366503_marzo-belen.png', '2026-03-24 15:35:03', '1'),
(15, 'demo', 'demo', '984357117', 'demo@demo.com', '1774366621_marzo-belen.png', '2026-03-24 15:37:01', '1'),
(16, 'demo', 'demo', '989898989', 'demo@demo.com', '1774366656_marzo-belen.png', '2026-03-24 15:37:36', '1'),
(17, 'demo', 'demo', '989898989', 'demo@demo.com', '1774366861_marzo-belen.png', '2026-03-24 15:41:01', '1'),
(18, 'test', 'test', '984357117', 'test@test.com', '1774367638_marzo-belen.png', '2026-03-24 15:53:58', '1'),
(19, 'demo', 'demo', '984357117', 'demo@demo.com', '1774369347_marzo-belen.png', '2026-03-24 16:22:27', '1'),
(20, 'alejo', 'alejo', '984357117', 'alejo@demo.com', '1774369409_marzo-belen.png', '2026-03-24 16:23:29', '1'),
(21, 'mio', 'mio', '999999999', 'miop@demo.com', '1774369457_logo_rimac.jpg', '2026-03-24 16:24:17', '1'),
(22, 'bmito', 'bmito', '999999999', 'bmito@demo.com', '1774370493_marzo-belen.png', '2026-03-24 16:41:33', '1'),
(23, 'testito', 'testito', '988877777', 'testito@demebemo.com', '1774370542_marzo-belen.png', '2026-03-24 16:42:22', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fb_usuarios`
--

DROP TABLE IF EXISTS `fb_usuarios`;
CREATE TABLE IF NOT EXISTS `fb_usuarios` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `idrol` int NOT NULL,
  `usuario` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `token_reco_pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `google2fa_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `google2fa` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `fb_usuarios`
--

INSERT INTO `fb_usuarios` (`idusuario`, `idrol`, `usuario`, `password`, `token_reco_pass`, `email`, `fecharegistro`, `estado`, `google2fa_key`, `google2fa`) VALUES
(1, 1, 'admin', '$2y$10$oWR3s27mHLtdz8CFHJBmiOpxcMkW9pzCQclKIE6SUG4cC6IqoC2pm', NULL, 'admin@admin.com', '2025-11-27 14:41:30', '1', 'KPPJA5QO2ANGUN6E', 'on'),
(2, 1, 'webmaster', '$2y$10$K72jniuiXuyEyjUpotIkXuzV8tT1bgYuL4aUP58flut0bUrsscSka', NULL, 'webmaster@webmaster.com', '2026-04-06 17:19:31', '1', 'LMASOTXUX7DYM5OL', 'on'),
(3, 1, 'agallas', '$2y$10$vc1OvOQuiB6MNzfCVoFww.TZTVbiZbxK5e6ip...nvWI3eYO9mYQ6', NULL, 'agallas@agallas.com', '2025-11-27 14:32:46', '1', NULL, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
