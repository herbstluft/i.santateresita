-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2022 a las 09:24:25
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
-- Base de datos: `proyecto`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Admin` (IN `ADMIN` VARCHAR(100))   select usuarios.usuario from usuarios inner join tipo_usuario on usuarios.tipo_usuario = tipo_usuario.tipo 
where usuarios.usuario= ADMIN and tipo_usuario.id_tipo = 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Citas_realizadas_X_Doctor` (IN `DOCTOR` VARCHAR(100))   SELECT concat(datos_pers_user.nombre,' ',datos_pers_user.apellido_pat,' ',datos_pers_user.apellido_mat) as Doctor, CONCAT(clientes_datos_personales.nombre,' ',clientes_datos_personales.apellido_pat,' ',clientes_datos_personales.apellido_mat) as Cliente, citas.fecha as Fecha, citas.hora as Hora from citas inner JOIN doctores on citas.id_doc=doctores.id_doc INNER JOIN usuarios on usuarios.id_usuario=doctores.id_usuarios inner JOIN datos_pers_user on datos_pers_user.id_registro=usuarios.id_reg inner join clientes on citas.id_cliente=clientes.id_client INNER join clientes_datos_personales on clientes_datos_personales.id_cliente=clientes.id_reg where datos_pers_user.nombre=Doctor$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DatosXNomUsuario` (IN `NOMBRE` VARCHAR(30), IN `USUARIO` VARCHAR(20))   select * from clientes inner join clientes_datos_personales on clientes_datos_personales.id_cliente=clientes.id_client where clientes.user_clien=USUARIO or clientes_datos_personales.nombre=NOMBRE$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Doctor` (IN `DOCTOR` VARCHAR(100))   SELECT usuarios.usuario from usuarios inner join tipo_usuario on usuarios.tipo_usuario = tipo_usuario.id_tipo WHERE usuarios.usuario = DOCTOR and tipo_usuario.id_tipo = 2$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ProductosXCategoria` (IN `CATEGORIA` VARCHAR(25))   SELECT * from productos inner join categoria on productos.id_cat=categoria.id_cat where categoria.categoria=CATEGORIA$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `VentasXDeterminadoANOMES` (IN `ANO` INT(7), IN `MES` INT(5))   select RV.orden as 'Orden de venta', RV.cliente as 'Cliente', RV.compra as 'Fecha Orden', sum(RV.productosvendidos) as 'Productos vendidos', sum(RV.productosvendidos*RV.monto) as 'Total'  from 

(select orden.id_orden as orden, clientes.user_clien as cliente, orden.fecha as compra, detalle_orden.cantidad_prod as Productosvendidos,
productos.precio as monto from orden

inner join detalle_orden on detalle_orden.id_orden = orden.id_orden 
inner join productos on productos.id_producto = detalle_orden.id_producto  
inner join clientes on clientes.id_client = orden.id_cliente ) as RV 
WHERE month(RV.compra)=MES OR year(RV.compra)=ANO$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL,
  `categoria` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_cat`, `categoria`) VALUES
(1, 'Estomacal'),
(2, 'Dolor'),
(3, 'Fiebre'),
(4, 'Suplementos alimenticios'),
(5, 'Gripa y tos'),
(6, 'Material de curacion'),
(7, 'Vitaminas y minerales'),
(8, 'Sueros'),
(9, 'Bienestar sexual'),
(10, 'Ginecologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_doc` int(11) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `realizadas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `id_cliente`, `id_doc`, `hora`, `fecha`, `realizadas`) VALUES
(32, 2, 3, '13:53:00', '2022-08-30', 1),
(33, 1, 3, '04:48:00', '2022-08-17', 1),
(34, 1, 3, '04:48:00', '2022-08-17', 1),
(36, 4, 3, '08:01:00', '2022-09-01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_client` int(11) NOT NULL,
  `user_clien` varchar(500) DEFAULT NULL,
  `contrasena` varchar(500) DEFAULT NULL,
  `id_reg` int(11) DEFAULT NULL,
  `t_us` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_client`, `user_clien`, `contrasena`, `id_reg`, `t_us`) VALUES
(1, 'Manu22', 'sami', 1, 3),
(2, 'juanii', 'juanitoo', 2, 3),
(3, 'gemaaa', 'gemita', 3, 3),
(4, 'viktor', 'vik', 4, 3),
(5, 'dylan1', 'dyl', 5, 3),
(16, 'pepsi', 'a', NULL, 3),
(17, 'cocacola', 'a', 17, 3),
(18, 'pepito', 'a', NULL, 3),
(19, 'juanito', 'a', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_datos_personales`
--

CREATE TABLE `clientes_datos_personales` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `apellido_pat` varchar(500) DEFAULT NULL,
  `apellido_mat` varchar(500) DEFAULT NULL,
  `correo` varchar(500) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `telefono` char(10) DEFAULT NULL,
  `RFC` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes_datos_personales`
--

INSERT INTO `clientes_datos_personales` (`id_cliente`, `nombre`, `apellido_pat`, `apellido_mat`, `correo`, `edad`, `genero`, `telefono`, `RFC`) VALUES
(1, 'Manuel David', 'Hernandez', 'Morales', 'manuel@gmail.com', 21, 'M', '8715038326', NULL),
(2, 'Juan Angel', 'Castaneda', 'Chavez', 'juanl@gmail.com', 21, 'M', '8715810980', NULL),
(3, 'Gema', 'Castaneda', 'Barraza', 'gema@gmail.com', 24, 'F', '8736457897', NULL),
(4, 'Victor', 'Cabello', 'Rodriguez', 'victor@gmail.com', 20, 'M', '8712647536', NULL),
(5, 'Dylan', 'Gonzales', 'Flores', 'dylan@gmail.com', 23, 'M', '8714628710', NULL),
(16, 'pepsi', 'Castañed', 'Chavez', 'herbstluftwm.28@gmail.com', 22, 'M', '3435345435', 'tdgsdfe4t4'),
(17, 'cocacolasss', 'abc', 'ssdkdjdf', 'sjsks@gmail.con', 22, 'M', '3333337788', 'tdgsdfe4t4'),
(18, 'pepe aaaooo', 'Castañed', 'Chavez', '21170139@uttcampus.edu.mx', 22, 'M', '3435345435', 'tdgsdfe4t4'),
(19, 'pepesssdsffdsd', 'Castañed', 'Chavez', 'herbstluftwm.28@gmail.com', 22, 'M', '2222222324', 'tdgsdfe4t4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_pers_user`
--

CREATE TABLE `datos_pers_user` (
  `id_registro` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `apellido_pat` varchar(500) DEFAULT NULL,
  `apellido_mat` varchar(500) DEFAULT NULL,
  `correo` varchar(500) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `telefono` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_pers_user`
--

INSERT INTO `datos_pers_user` (`id_registro`, `nombre`, `apellido_pat`, `apellido_mat`, `correo`, `edad`, `genero`, `telefono`) VALUES
(1, 'Samantha', 'Alcantara', 'Garcia', 'sammy@gmail.com', 20, 'F', '8712657890'),
(2, 'Fernando', 'Molino', 'Villa lobos', 'fernando@gmail.com', 25, 'M', '1234567008'),
(3, 'Edwin', 'Fraire', 'Mascorro', 'edwin@gmail.com', 27, 'M', '0987654321'),
(5, 'Julia', 'Delgado', 'Molina', 'julia@gmail.com', 25, 'F', '8719896677');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `id_do` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `cliente` varchar(30) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `id_orden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_orden`
--

INSERT INTO `detalle_orden` (`id_do`, `id_producto`, `cantidad`, `cliente`, `estatus`, `id_orden`) VALUES
(209, 31, 1, 'juanii', 1, 233),
(303, 22, 4, 'juanii', 1, 275),
(304, 33, 2, 'juanii', 1, 275),
(305, 30, 2, 'juanii', 1, 275);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id_doc` int(11) NOT NULL,
  `id_usuarios` int(11) DEFAULT NULL,
  `cedula` char(10) DEFAULT NULL,
  `especialidad` varchar(500) DEFAULT NULL,
  `universidad` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id_doc`, `id_usuarios`, `cedula`, `especialidad`, `universidad`) VALUES
(1, 2, 'a1a1a1', 'Cirugano', 'Facultad De Medicina Ua De C'),
(2, 3, 'b1b1b1', 'Cardiologo', 'Facultad De Medicina UAC'),
(3, 5, 'c1c1c1', 'Pediadra', 'Universidad Autonoma De Coahuila');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id_orden` int(11) NOT NULL,
  `tiempo` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id_orden`, `tiempo`) VALUES
(126, '2022-08-17 11:29:20'),
(127, '2022-08-17 11:29:23'),
(128, '2022-08-17 11:34:16'),
(129, '2022-08-17 11:34:20'),
(130, '2022-08-17 11:34:24'),
(131, '2022-08-17 11:41:49'),
(132, '2022-08-17 11:41:54'),
(133, '2022-08-17 11:41:57'),
(134, '2022-08-17 11:42:00'),
(135, '2022-08-17 11:42:05'),
(136, '2022-08-17 05:02:47'),
(137, '2022-08-17 05:02:49'),
(138, '2022-08-17 05:02:51'),
(139, '2022-08-17 05:11:27'),
(140, '2022-08-17 05:12:50'),
(141, '2022-08-17 05:12:53'),
(142, '2022-08-17 05:12:53'),
(143, '2022-08-17 05:12:57'),
(144, '2022-08-17 05:13:06'),
(145, '2022-08-17 05:13:18'),
(146, '2022-08-17 05:13:18'),
(147, '2022-08-17 05:13:29'),
(148, '2022-08-17 05:15:24'),
(149, '2022-08-17 05:23:32'),
(150, '2022-08-17 05:29:48'),
(151, '2022-08-17 05:30:03'),
(152, '2022-08-17 05:30:06'),
(153, '2022-08-17 05:35:32'),
(154, '2022-08-17 05:36:08'),
(155, '2022-08-17 05:36:36'),
(156, '2022-08-17 05:37:44'),
(157, '2022-08-17 05:43:35'),
(158, '0000-00-00 00:00:00'),
(159, '0000-00-00 00:00:00'),
(160, '0000-00-00 00:00:00'),
(161, '0000-00-00 00:00:00'),
(162, '0000-00-00 00:00:00'),
(163, '0000-00-00 00:00:00'),
(164, '0000-00-00 00:00:00'),
(165, '2022-08-17 06:19:46'),
(166, '2022-08-17 06:19:50'),
(167, '2022-08-17 06:19:53'),
(168, '2022-08-17 06:20:31'),
(169, '2022-08-17 06:20:35'),
(170, '2022-08-18 06:22:13'),
(171, '2022-08-18 06:29:48'),
(172, '2022-08-18 06:52:01'),
(173, '2022-08-18 06:52:11'),
(174, '2022-08-18 06:52:49'),
(175, '2022-08-18 06:52:51'),
(176, '2022-08-18 06:52:52'),
(177, '2022-08-18 06:53:11'),
(178, '2022-08-18 07:43:28'),
(179, '2022-08-18 07:43:36'),
(180, '2022-08-18 07:45:43'),
(181, '2022-08-18 04:46:36'),
(182, '2022-08-18 05:09:49'),
(183, '2022-08-18 05:11:36'),
(184, '2022-08-18 05:11:40'),
(185, '2022-08-18 05:12:31'),
(186, '2022-08-18 05:48:18'),
(187, '2022-08-18 05:51:01'),
(188, '2022-08-18 05:55:27'),
(189, '2022-08-18 05:55:30'),
(190, '2022-08-18 05:55:47'),
(191, '2022-08-18 05:55:50'),
(192, '2022-08-18 05:55:52'),
(193, '2022-08-18 05:55:52'),
(194, '2022-08-18 05:56:43'),
(195, '2022-08-18 06:00:47'),
(196, '2022-08-18 06:21:36'),
(197, '2022-08-18 06:22:58'),
(198, '2022-08-18 06:23:28'),
(199, '2022-08-18 09:17:57'),
(200, '2022-08-18 09:28:32'),
(201, '2022-08-18 09:28:48'),
(202, '2022-08-18 09:29:25'),
(203, '2022-08-18 09:30:03'),
(204, '2022-08-18 09:30:04'),
(205, '2022-08-18 09:30:29'),
(206, '2022-08-18 09:30:42'),
(207, '2022-08-18 09:30:53'),
(208, '2022-08-18 09:31:00'),
(209, '2022-08-18 09:31:04'),
(210, '2022-08-18 09:31:08'),
(211, '2022-08-18 09:43:25'),
(212, '2022-08-18 09:43:34'),
(213, '2022-08-18 09:43:46'),
(214, '2022-08-18 09:43:52'),
(215, '2022-08-18 09:44:23'),
(216, '2022-08-18 09:45:04'),
(217, '2022-08-18 09:45:30'),
(218, '2022-08-18 09:45:43'),
(219, '2022-08-18 09:55:34'),
(220, '2022-08-18 09:55:46'),
(221, '2022-08-18 10:00:08'),
(222, '2022-08-18 10:00:27'),
(223, '2022-08-18 10:14:24'),
(224, '2022-08-18 10:14:29'),
(225, '2022-08-18 10:14:46'),
(226, '2022-08-18 10:17:29'),
(227, '2022-08-18 10:17:58'),
(228, '2022-08-18 10:18:26'),
(229, '2022-08-18 10:18:36'),
(230, '2022-08-18 10:18:54'),
(231, '2022-08-18 10:30:39'),
(232, '2022-08-18 11:35:14'),
(233, '2022-08-18 11:35:43'),
(234, '2022-08-18 11:38:10'),
(235, '2022-08-19 01:15:46'),
(236, '2022-08-19 01:52:31'),
(237, '2022-08-19 01:52:55'),
(238, '2022-08-19 01:53:39'),
(239, '2022-08-19 01:58:05'),
(240, '2022-08-19 01:58:07'),
(241, '2022-08-19 01:58:39'),
(242, '2022-08-19 02:00:41'),
(243, '2022-08-19 02:00:55'),
(244, '2022-08-19 02:00:55'),
(245, '2022-08-19 02:01:11'),
(246, '2022-08-19 02:01:14'),
(247, '2022-08-19 02:05:34'),
(248, '2022-08-19 02:05:37'),
(249, '2022-08-19 02:06:22'),
(250, '2022-08-19 02:06:24'),
(251, '2022-08-19 02:07:00'),
(252, '2022-08-19 02:07:07'),
(253, '2022-08-19 02:07:10'),
(254, '2022-08-19 02:07:15'),
(255, '2022-08-19 02:07:19'),
(256, '2022-08-19 02:07:25'),
(257, '2022-08-19 02:08:04'),
(258, '2022-08-19 02:08:07'),
(259, '2022-08-19 02:16:27'),
(260, '2022-08-19 02:16:30'),
(261, '2022-08-19 02:16:34'),
(262, '2022-08-19 02:16:44'),
(263, '2022-08-19 02:16:53'),
(264, '2022-08-19 02:17:16'),
(265, '2022-08-19 02:17:30'),
(266, '2022-08-19 02:17:37'),
(267, '2022-08-19 02:17:45'),
(268, '2022-08-19 02:17:48'),
(269, '2022-08-19 02:17:51'),
(270, '2022-08-19 02:18:39'),
(271, '2022-08-19 02:18:46'),
(272, '2022-08-19 02:21:31'),
(273, '2022-08-19 02:24:14'),
(274, '2022-08-19 06:43:09'),
(275, '2022-08-19 07:53:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nom_producto` varchar(500) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `formula` varchar(600) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `IMAGEN` varchar(1000) DEFAULT NULL,
  `unidad` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nom_producto`, `precio`, `formula`, `id_cat`, `descripcion`, `IMAGEN`, `unidad`) VALUES
(20, 'Cafiaspirina', 120, 'C10H9NO2', 3, 'RÃ¡pido y efectivo alivia el dolor De cabeza', 'Cafiaspirina.jfif', 'Caja'),
(22, 'Gelocatil', 120, 'C10H9NO2', 3, 'RÃ¡pido y efectivo alivia el dolor De cabeza', 'gelocatil.jfif', 'Caja'),
(24, 'Advil', 110, 'C13H18O2', 3, 'RÃ¡pido y efectivo alivia el dolor De cabeza', 'advil.jfif', 'Caja'),
(30, 'Casec', 510, 'Alto en ProteÃ­na en Polvo, sin azÃºcar aÃ±adida.', 4, 'ProteÃ­na de alta calidad para adicionar alimentos', 'descarga.webp', 'Caja'),
(31, 'Emergen-c', 99, 'Vitamia C Vitamina B y antioxidantes', 7, 'Suplemento alimenticio efervescente sabor limÃ³n', '1283057_A_168_AL.jpg', 'Caja'),
(33, 'Centrum', 296, 'Vitamia C Vitamina A', 7, 'Tables centrum multivitaminico silver ', '1054961_A_168_AL.jpg', 'Caja'),
(34, 'Vivioptal', 199, '4 vitaminas, 4 minerales, 5 oligoelementos', 7, 'Formula de antioxidante mas importantes ', '1123467_A_168_AL.jpg', 'Caja'),
(35, 'Nature Bounty', 200, 'ColÃ¡geno Hidrolizado Vitamina C', 7, 'Aporta nutrientes importantes para la piel', '1313037_A_168_AL.jpg', 'Caja'),
(36, 'Neurobion', 219, 'Vitamina B12. Vitamina B6. Vitamina B1', 7, 'combinan tres vitaminas escenciales para el SN', '1192191_A_168_AL.jpg', 'Caja'),
(39, 'Centrum', 296, 'Vitamia C Vitamina A', 7, 'Tables centrum multivitaminico silver ', '1054961_A_168_AL.jpg', 'Caja'),
(40, 'Suerox de manzana ', 22, 'Agua purificada, cloruro de sodio, Ã¡cido lÃ¡ctico', 8, 'Bebida hidratante sin azÃºcar', 'descarga.jfif', 'Pieza'),
(43, 'Ensure', 249, 'calcio, zinc, magnesio y Vitamina C', 4, 'Apoyan la recuperaciÃ³n de la masa muscular.', 'ensure.jfif', 'Pieza'),
(44, 'Pediasure', 300, 'Sacarosa, almidÃ³n hidrolizado de maÃ­z', 4, 'Ayuda a los niÃ±os a crecer', 'pediasure.jfif', 'Pieza'),
(45, 'Boost', 210, '27 vitaminas y minerales, Calcio y Vitamina D', 4, 'Suplemento Alimenticio con 27 vitaminas y mineral', 'boost.jfif', 'Pieza'),
(47, 'Gatorade en polvo', 5400, 'hidratos de carbono, sodio, potasio y electrolitos', 4, 'Bebida energÃ©tica para atletas', 'gatorade.jfif', 'Pieza'),
(48, 'Electrolit de Coco', 22, 'Agua purificada, cloruro de sodio, Ã¡cido lÃ¡ctico', 8, 'Bebida hidratante sin azÃºcar', 'coco.jfif', 'Pieza'),
(49, 'Electrolit de uva', 22, 'Agua purificada, cloruro de sodio, Ã¡cido lÃ¡ctico', 8, 'Bebida hidratante sin azÃºcar', 'uva.jfif', 'Pieza'),
(50, 'Suerox de aloe vera', 22, 'Agua purificada, cloruro de sodio, Ã¡cido lÃ¡ctico', 8, 'Bebida hidratante sin azÃºcar', 'aloe vera.jfif', 'Pieza'),
(52, 'Suerox de limÃ³n', 22, 'Agua purificada, cloruro de sodio, Ã¡cido lÃ¡ctico', 8, 'Bebida hidratante sin azÃºcar', 'limon.jfif', 'Pieza'),
(53, 'Canescalm', 119, 'Glicina, avena, mentol', 10, 'Alivia Molestias Ãntimas como ComezÃ³n e IrritaciÃ³n', 'canascalm.jfif', 'Caja'),
(54, 'Condones sin latex sico', 91, 'Latex, agua y jabon', 9, 'EstÃ¡n lubricados con silicona ayuda a estimulacion', 'condones.png', 'Paquete'),
(55, 'Gel lubricante K-Y ', 198, ' Agua, silicona o aceite', 9, 'Desarrollado para incrementar la lubricaciÃ³n FEM', 'lubricante.jfif', 'Pieza'),
(56, 'SIco mutual climax', 221, 'Latex, agua y jabon', 9, 'Desarrollado para retardar el clÃ­max masculino.', 'sico fem.jfif', 'Paquete'),
(57, 'Condones Playboy', 230, ' Latex, agua y jabon', 9, '24 condones texty anatimico lub de latex 7050.', 'playboy.jfif', 'Pieza'),
(58, 'Buscapina', 145, 'Butilbromuro, bromuro ', 1, 'Contienen 10 mg de butilhioscina y 250 mg de Mtm', 'buscapina.jfif', 'Caja'),
(59, 'Picot sal de uvas', 36, 'Bicarbonato de Sodio, Ã¡cido tartÃ¡rico', 1, 'Es un polvo efervescente con efecto antiÃ¡cido', 'sal de uvas.jfif', 'Paquete'),
(60, 'Alka-setzer', 35, 'Bicarbonato de sodio', 1, 'Se utiliza para tratar Ãºlceras estomacales y otras', 'alkasetser.jfif', 'Caja'),
(62, 'Losec A-20', 76, 'Acido metacrÃ­lico-acrilato de etilo, hipromelosa.', 1, 'Alivia los sÃ­ntomas de gastritis y dolor abdominal', 'losec.jfif', 'Caja'),
(64, 'Voltaren', 108, 'Diclofenaco dietilamonio 2.32 g', 2, 'Alivia el dolor de dolor de cuello y espalda', 'voltaren.png', 'Caja'),
(65, 'Pomada de la campana', 100, 'Diclofenaco dietilamonio 2.32 g', 2, 'Alivia el dolor muscular localizada', 'campana.jfif', 'Pieza'),
(66, 'Excedrin', 120, 'AcetaminofÃ©n, cafeÃ­na', 2, 'Alivio del dolor severo y dolores de cabeza', 'excedrin.jfif', 'Caja'),
(67, 'Ultra Bengue', 163, 'Naproxeno 10.0 g Clorhidrato de lidocaÃ­na 2.0 g', 2, 'Tratamiento en gel para la inflamaciÃ³n y dolor', 'ultra bengue.jfif', 'Pieza'),
(68, 'Bio Electro', 87, 'Paracetamol 250 mg ,Ãcido acetilsalicÃ­lico 250 mg, CafeÃ­na', 2, 'Especialista en migraÃ±a y dolor de cabeza', 'bioelectro.jfif', 'Caja'),
(69, 'Tabcin Active', 58, 'Clorfenamina, paracetamol,Fenilefrina', 5, 'Te ayuda a aliviar tus sÃ­ntomas de gripe', 'tabcin act.jfif', 'Caja'),
(70, 'Tabcin Noche', 69, 'Clorfenamina, paracetamol,Fenilefrina', 5, 'Te ayuda a aliviar tus sÃ­ntomas de gripe', 'tabcin noche.jfif', 'Caja'),
(71, 'XL-3', 55, 'Paracetamol,Fenilefrina,Clorfenamina', 5, 'Para el alivio de las molestia del resfriado comÃºn', 'xl3.jfif', 'Caja'),
(72, 'Theraflu ', 119, ' Paracetamol, Dextrometorfano, Fenilefrina.', 5, 'Alivio de los sÃ­ntomas de resfriado severo y tos', 'thera.jfif', 'Pieza'),
(73, 'Tabcin', 119, 'Paracetamol, Dextrometorfano, Fenilefrina.', 5, 'Alivio de los sÃ­ntomas de resfriado severo y tos.', 'tabcin.jfif', 'Caja'),
(74, 'Guante Curapack', 32, 'Latex', 6, 'Guante Curapack Multiusos Mediano 10pzas', 'guantes.jfif', 'Paquete'),
(75, 'Guante desechable', 3, 'Latex', 6, ' Este producto es efectivo como barrera biolÃ³gica ', 'ambiderm.jfif', 'Paquete'),
(77, 'Guante dalux ', 43, 'Latex', 6, 'Guante Dalux LÃ¡tex Mediano 10pzas', 'dalux.jfif', 'Paquete'),
(78, 'Sonda foley', 48, 'LÃ¡tex de caucho natural', 6, 'Sonda de Foley Bardia de 2 vÃ­as, estÃ©ril, calibre ', 'sonda.jfif', 'Pieza'),
(79, 'Aceite suavisante', 19, 'Aceite de almendras', 6, 'Protege la piel de factores externos ', 'aceite.jfif', 'Pieza'),
(95, 'diegito', 4, 'fddfddsfdfsfsdfdfsdfds', 1, 'dsdadassaddgsdggsgdfdfsdfdsfff', 'WhatsApp Image 2022-08-17 at 10.59.08 PM.jpeg', 'Pieza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `tipo`) VALUES
(1, 'administrador'),
(2, 'doctor'),
(3, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(500) DEFAULT NULL,
  `contrasena` varchar(500) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `id_reg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `contrasena`, `tipo_usuario`, `id_reg`) VALUES
(1, 'sami', 'abc', 1, 1),
(2, 'fernando', 'abc', 2, 2),
(3, 'edwin', 'abc', 2, 3),
(5, 'julia', 'abc', 2, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `fk_cli` (`id_cliente`),
  ADD KEY `fk_doct` (`id_doc`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `fk_usclien` (`id_reg`),
  ADD KEY `fk_tucl` (`t_us`);

--
-- Indices de la tabla `clientes_datos_personales`
--
ALTER TABLE `clientes_datos_personales`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `datos_pers_user`
--
ALTER TABLE `datos_pers_user`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`id_do`),
  ADD KEY `fk_dord` (`id_orden`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id_doc`),
  ADD KEY `fk_docuser` (`id_usuarios`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id_orden`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_cat` (`id_cat`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_tipo` (`tipo_usuario`),
  ADD KEY `fk_dtuser` (`id_reg`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `clientes_datos_personales`
--
ALTER TABLE `clientes_datos_personales`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `datos_pers_user`
--
ALTER TABLE `datos_pers_user`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id_do` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_cli` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_client`),
  ADD CONSTRAINT `fk_doct` FOREIGN KEY (`id_doc`) REFERENCES `doctores` (`id_doc`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_tucl` FOREIGN KEY (`t_us`) REFERENCES `tipo_usuario` (`id_tipo`),
  ADD CONSTRAINT `fk_usclien` FOREIGN KEY (`id_reg`) REFERENCES `clientes_datos_personales` (`id_cliente`);

--
-- Filtros para la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `fk_dord` FOREIGN KEY (`id_orden`) REFERENCES `orden` (`id_orden`);

--
-- Filtros para la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD CONSTRAINT `fk_docuser` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_dtuser` FOREIGN KEY (`id_reg`) REFERENCES `datos_pers_user` (`id_registro`),
  ADD CONSTRAINT `fk_tipo` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
