-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-09-2018 a las 05:03:31
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cps`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `action`
--

DROP TABLE IF EXISTS `action`;
CREATE TABLE IF NOT EXISTS `action` (
  `ac_id` int(11) NOT NULL,
  `ac_name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ac_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audit`
--

DROP TABLE IF EXISTS `audit`;
CREATE TABLE IF NOT EXISTS `audit` (
  `ad_id` int(11) NOT NULL,
  `grupo_gr_id` int(11) NOT NULL,
  `user_us_cod` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ad_date` date NOT NULL,
  `ad_hour` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `correction_co_id` int(11) NOT NULL,
  `ad_action1_cumple` int(11) NOT NULL,
  `ad_action2_cumple` int(11) NOT NULL,
  `ad_condition1_cumple` int(11) NOT NULL,
  `ad_condition2_cumple` int(11) NOT NULL,
  `ad_plan_accion_cumple` int(11) NOT NULL,
  `ad_plan_condicion_cumple` int(11) NOT NULL,
  `ad_obs` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `au_id` int(11) NOT NULL,
  `au_name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `au_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causa`
--

DROP TABLE IF EXISTS `causa`;
CREATE TABLE IF NOT EXISTS `causa` (
  `ca_id` int(11) NOT NULL,
  `ca_name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ca_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `cm_cod` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cm_name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `user_us_cod` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cm_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`cm_cod`, `cm_name`, `user_us_cod`, `cm_status`) VALUES
('17665703-0', 'Softdirex S.A.', '17665703-0', 1),
('78737472-4', 'APR Las Lomas', '28272727-2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion`
--

DROP TABLE IF EXISTS `condicion`;
CREATE TABLE IF NOT EXISTS `condicion` (
  `cn_id` int(11) NOT NULL,
  `cn_name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cn_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correction`
--

DROP TABLE IF EXISTS `correction`;
CREATE TABLE IF NOT EXISTS `correction` (
  `co_id` int(11) NOT NULL,
  `evaluacion_ev_id` int(11) NOT NULL,
  `treatment_tr_id` int(11) NOT NULL,
  `action1_ac_id` int(11) NOT NULL,
  `authoract1_au_id` int(11) NOT NULL,
  `action2_ac_id` int(11) NOT NULL,
  `authoract2_au_id` int(11) NOT NULL,
  `condicion1_cn_id` int(11) NOT NULL,
  `authorcond1_au_id` int(11) NOT NULL,
  `condicion2_cn_id` int(11) NOT NULL,
  `authorcond2_au_id` int(11) NOT NULL,
  `co_plan_action` text COLLATE utf8_spanish_ci NOT NULL,
  `co_plan_condicion` text COLLATE utf8_spanish_ci NOT NULL,
  `user_us_cod` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `co_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

DROP TABLE IF EXISTS `correos`;
CREATE TABLE IF NOT EXISTS `correos` (
  `corr_correo` varchar(45) NOT NULL,
  `corr_estado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `correos`
--

INSERT INTO `correos` (`corr_correo`, `corr_estado`) VALUES
('', 1),
('jorgeleiva.17@gmail.com', 1),
('roberto@sdx.cl', 1),
('jorge.leiva@softdirex.cl', 1),
('jperez@sdx.cl', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
CREATE TABLE IF NOT EXISTS `evaluacion` (
  `ev_id` int(11) NOT NULL,
  `ev_object` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ev_zone` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_riesgo_tp_id` int(11) NOT NULL,
  `causa_ca_id` int(11) NOT NULL,
  `result_re_id` int(11) NOT NULL,
  `ev_atract` int(11) NOT NULL,
  `ev_exp` int(11) NOT NULL,
  `ev_deb` int(11) NOT NULL,
  `place_pl_id` int(11) NOT NULL,
  `ev_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_place`
--

DROP TABLE IF EXISTS `evaluacion_place`;
CREATE TABLE IF NOT EXISTS `evaluacion_place` (
  `ep_id` int(11) NOT NULL,
  `place_pl_id` int(11) NOT NULL,
  `evaluacion_ev_id` int(11) NOT NULL,
  `ep_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE IF NOT EXISTS `grupo` (
  `gp_id` int(11) NOT NULL,
  `gp_date` date NOT NULL,
  `place_pl_id` int(11) NOT NULL,
  `gp_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `place`
--

DROP TABLE IF EXISTS `place`;
CREATE TABLE IF NOT EXISTS `place` (
  `pl_id` int(11) NOT NULL,
  `pl_name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `pl_desc` text COLLATE utf8_spanish_ci NOT NULL,
  `company_cm_cod` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `pl_phone1` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `pl_phone2` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `pl_mail` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `pl_web` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `pl_address` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `pl_city` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `pl_province` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `pl_country` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cliente_us_cod` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `auditor_us_cod` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `pl_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `place`
--

INSERT INTO `place` (`pl_id`, `pl_name`, `pl_desc`, `company_cm_cod`, `pl_phone1`, `pl_phone2`, `pl_mail`, `pl_web`, `pl_address`, `pl_city`, `pl_province`, `pl_country`, `cliente_us_cod`, `auditor_us_cod`, `pl_status`) VALUES
(1, 'Oficina La Serena', 'Se agrega oficina para la ciudad de la serena', '17665703-0', '998672957', '228250113', 'jorgeleiva.17@sdx.com', 'www.sdx.cl', 'Calle las bugambilias 123', 'La Serena', 'El Elqui', 'Chile', '17665703-0', '28272727-2', 1),
(2, 'Oficina santiago', 'oficina santiago', '17665703-0', '998672957', '228250113', 'jorgeleiva.17@gmail.com', 'www.sdx.cl', 'jorge.leiva@softdirex.cl', 'Santiago', 'Maipo', 'Chile', '17665703-0', '28272727-2', 1),
(3, 'Oficina santiago 2', 'oficina santiago', '17665703-0', '998672957', '228250113', 'jorgeleiva.17@gmail.com', 'www.sdx.cl', 'jorge.leiva@softdirex.cl', 'Santiago', 'Maipo', 'Chile', '17665703-0', '28272727-2', 1),
(4, 'Paine', 'sede en paine', '17665703-0', '', '', 'jorgeleiva.17@gmail.com', 'www.softdirex.cl', 'Calle uno norte 130', 'Paine', 'Maipo', 'Chile', '17665703-0', '28272727-2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `re_id` int(11) NOT NULL,
  `re_name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `re_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_riesgo`
--

DROP TABLE IF EXISTS `tipo_riesgo`;
CREATE TABLE IF NOT EXISTS `tipo_riesgo` (
  `tp_id` int(11) NOT NULL,
  `tp_name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tp_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `treatment`
--

DROP TABLE IF EXISTS `treatment`;
CREATE TABLE IF NOT EXISTS `treatment` (
  `tr_id` int(11) NOT NULL,
  `tr_name` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `tr_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `us_cod` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `us_name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `us_pass` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `us_tipo` int(11) NOT NULL,
  `us_phone1` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `us_phone2` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `us_mail` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `us_web` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `us_address` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `us_city` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `us_province` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `us_country` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `us_avatar` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `us_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`us_cod`, `us_name`, `us_pass`, `us_tipo`, `us_phone1`, `us_phone2`, `us_mail`, `us_web`, `us_address`, `us_city`, `us_province`, `us_country`, `us_avatar`, `us_status`) VALUES
('28272727-2', 'Juan Perez', '$2y$10$wLaT8V1Dor8id7MuRuaSQeNPXaY/bM5B7foIluIEBUo7Cx.TDeGxK', 3, '99222333', '223848222', 'jperez@sdx.cl', 'www.sdx.cl', 'Las bugambilias', 'Serena', 'El Elqui', 'Chile', 'images/faces-clipart/pic-1.png', 1),
('17665703-0', 'Jorge Leiva', '$2y$10$ii.62.9xYX/ZHjx6zBxKpeypDrZHwmoHv3e9yE1Okpo42AVMUSUkO', 2, '998672957', '', 'jorgeleiva.17@gmail.com', 'www.softdirex.cl', 'Calle uno norte 130', 'Paine', 'Maipo', 'Chile', 'images/faces-clipart/pic-1.png', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
