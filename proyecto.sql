-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2022 a las 23:51:22
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
  `estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `id_cliente`, `id_doc`, `hora`, `fecha`, `estado`) VALUES
(108, 5, 2, '21:33:28', '2022-08-20', 'Perdida'),
(109, 2, 1, '21:41:35', '2022-08-21', 'Realizada'),
(111, 1, 1, '14:01:16', '2022-08-21', 'Perdida');

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
(28, 'diana', 'a', 31, 3),
(29, 'huerta', 'a', 32, 3);

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
(31, 'Diana', ' Gabriel', 'Huerta', 'diana.28@gmail.com', 22, 'F', '8687678687', 'tdgsdfe4t4'),
(32, 'Diana Gabriela', 'Castañeda', 'Huerta', 'diana.28@gmail.com', 22, 'F', '8714428495', 'SSDFF45453');

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
(347, 20, 2, 'juanii', 1, 295),
(348, 24, 1, 'juanii', 1, 295),
(349, 30, 5, 'juanii', 1, 295),
(350, 20, 5, 'Manu22', 1, 296),
(351, 24, 2, 'Manu22', 1, 296);

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
(295, '2022-08-21 01:55:56'),
(296, '2022-09-21 02:25:11'),
(297, '2022-08-21 04:48:53'),
(298, '2022-08-21 04:49:24');

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
  `unidad` varchar(30) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nom_producto`, `precio`, `formula`, `id_cat`, `descripcion`, `IMAGEN`, `unidad`, `estado`) VALUES
(20, 'Cafiaspirina', 120, 'C10H9NO2', 3, 'RÃ¡pido y efectivo alivia el dolor De cabeza', 'Cafiaspirina.jfif', 'Caja', 0),
(22, 'Gelocatil', 120, 'C10H9NO2', 3, 'RÃ¡pido y efectivo alivia el dolor De cabeza', 'gelocatil.jfif', 'Caja', 1),
(24, 'Advil', 110, 'C13H18O2', 3, 'RÃ¡pido y efectivo alivia el dolor De cabeza', 'advil.jfif', 'Caja', 0),
(30, 'Casec', 510, 'Alto en ProteÃ­na en Polvo, sin azÃºcar aÃ±adida.', 4, 'ProteÃ­na de alta calidad para adicionar alimentos', 'descarga.webp', 'Caja', 0),
(31, 'Emergen-c', 99, 'Vitamia C Vitamina B y antioxidantes', 7, 'Suplemento alimenticio efervescente sabor limÃ³n', '1283057_A_168_AL.jpg', 'Caja', 0),
(33, 'Centrum', 296, 'Vitamia C Vitamina A', 7, 'Tables centrum multivitaminico silver ', '1054961_A_168_AL.jpg', 'Caja', 0),
(34, 'Vivioptal', 199, '4 vitaminas, 4 minerales, 5 oligoelementos', 7, 'Formula de antioxidante mas importantes ', '1123467_A_168_AL.jpg', 'Caja', 0),
(35, 'Nature Bounty', 200, 'ColÃ¡geno Hidrolizado Vitamina C', 7, 'Aporta nutrientes importantes para la piel', '1313037_A_168_AL.jpg', 'Caja', 0),
(36, 'Neurobion', 219, 'Vitamina B12. Vitamina B6. Vitamina B1', 7, 'combinan tres vitaminas escenciales para el SN', '1192191_A_168_AL.jpg', 'Caja', 0),
(39, 'Centrum', 296, 'Vitamia C Vitamina A', 7, 'Tables centrum multivitaminico silver ', '1054961_A_168_AL.jpg', 'Caja', 0),
(40, 'Suerox de manzana ', 22, 'Agua purificada, cloruro de sodio, Ã¡cido lÃ¡ctico', 8, 'Bebida hidratante sin azÃºcar', 'descarga.jfif', 'Pieza', 0),
(43, 'Ensure', 249, 'calcio, zinc, magnesio y Vitamina C', 4, 'Apoyan la recuperaciÃ³n de la masa muscular.', 'ensure.jfif', 'Pieza', 0),
(44, 'Pediasure', 300, 'Sacarosa, almidÃ³n hidrolizado de maÃ­z', 4, 'Ayuda a los niÃ±os a crecer', 'pediasure.jfif', 'Pieza', 0),
(45, 'Boost', 210, '27 vitaminas y minerales, Calcio y Vitamina D', 4, 'Suplemento Alimenticio con 27 vitaminas y mineral', 'boost.jfif', 'Pieza', 0),
(47, 'Gatorade en polvo', 5400, 'hidratos de carbono, sodio, potasio y electrolitos', 4, 'Bebida energÃ©tica para atletas', 'gatorade.jfif', 'Pieza', 0),
(48, 'Electrolit de Coco', 22, 'Agua purificada, cloruro de sodio, Ã¡cido lÃ¡ctico', 8, 'Bebida hidratante sin azÃºcar', 'coco.jfif', 'Pieza', 0),
(49, 'Electrolit de uva', 22, 'Agua purificada, cloruro de sodio, Ã¡cido lÃ¡ctico', 8, 'Bebida hidratante sin azÃºcar', 'uva.jfif', 'Pieza', 0),
(50, 'Suerox de aloe vera', 22, 'Agua purificada, cloruro de sodio, Ã¡cido lÃ¡ctico', 8, 'Bebida hidratante sin azÃºcar', 'aloe vera.jfif', 'Pieza', 0),
(52, 'Suerox de limÃ³n', 22, 'Agua purificada, cloruro de sodio, Ã¡cido lÃ¡ctico', 8, 'Bebida hidratante sin azÃºcar', 'limon.jfif', 'Pieza', 0),
(53, 'Canescalm', 119, 'Glicina, avena, mentol', 10, 'Alivia Molestias Ãntimas como ComezÃ³n e IrritaciÃ³n', 'canascalm.jfif', 'Caja', 0),
(54, 'Condones sin latex sico', 91, 'Latex, agua y jabon', 9, 'EstÃ¡n lubricados con silicona ayuda a estimulacion', 'condones.png', 'Paquete', 1),
(55, 'Gel lubricante K-Y ', 198, ' Agua, silicona o aceite', 9, 'Desarrollado para incrementar la lubricaciÃ³n FEM', 'lubricante.jfif', 'Pieza', 0),
(56, 'SIco mutual climax', 221, 'Latex, agua y jabon', 9, 'Desarrollado para retardar el clÃ­max masculino.', 'sico fem.jfif', 'Paquete', 0),
(57, 'Condones Playboy', 230, ' Latex, agua y jabon', 9, '24 condones texty anatimico lub de latex 7050.', 'playboy.jfif', 'Pieza', 0),
(58, 'Buscapina', 145, 'Butilbromuro, bromuro ', 1, 'Contienen 10 mg de butilhioscina y 250 mg de Mtm', 'buscapina.jfif', 'Caja', 0),
(59, 'Picot sal de uvas', 36, 'Bicarbonato de Sodio, Ã¡cido tartÃ¡rico', 1, 'Es un polvo efervescente con efecto antiÃ¡cido', 'sal de uvas.jfif', 'Paquete', 0),
(60, 'Alka-setzer', 35, 'Bicarbonato de sodio', 1, 'Se utiliza para tratar Ãºlceras estomacales y otras', 'alkasetser.jfif', 'Caja', 0),
(62, 'Losec A-20', 76, 'Acido metacrÃ­lico-acrilato de etilo, hipromelosa.', 1, 'Alivia los sÃ­ntomas de gastritis y dolor abdominal', 'losec.jfif', 'Caja', 0),
(64, 'Voltaren', 108, 'Diclofenaco dietilamonio 2.32 g', 2, 'Alivia el dolor de dolor de cuello y espalda', 'voltaren.png', 'Caja', 0),
(65, 'Pomada de la campana', 100, 'Diclofenaco dietilamonio 2.32 g', 2, 'Alivia el dolor muscular localizada', 'campana.jfif', 'Pieza', 0),
(66, 'Excedrin', 120, 'AcetaminofÃ©n, cafeÃ­na', 2, 'Alivio del dolor severo y dolores de cabeza', 'excedrin.jfif', 'Caja', 0),
(67, 'Ultra Bengue', 163, 'Naproxeno 10.0 g Clorhidrato de lidocaÃ­na 2.0 g', 2, 'Tratamiento en gel para la inflamaciÃ³n y dolor', 'ultra bengue.jfif', 'Pieza', 0),
(68, 'Bio Electro', 87, 'Paracetamol 250 mg ,Ãcido acetilsalicÃ­lico 250 mg, CafeÃ­na', 2, 'Especialista en migraÃ±a y dolor de cabeza', 'bioelectro.jfif', 'Caja', 1),
(69, 'Tabcin Active', 58, 'Clorfenamina, paracetamol,Fenilefrina', 5, 'Te ayuda a aliviar tus sÃ­ntomas de gripe', 'tabcin act.jfif', 'Caja', 0),
(70, 'Tabcin Noche', 69, 'Clorfenamina, paracetamol,Fenilefrina', 5, 'Te ayuda a aliviar tus sÃ­ntomas de gripe', 'tabcin noche.jfif', 'Caja', 0),
(71, 'XL-3', 55, 'Paracetamol,Fenilefrina,Clorfenamina', 5, 'Para el alivio de las molestia del resfriado comÃºn', 'xl3.jfif', 'Caja', 0),
(72, 'Theraflu ', 119, ' Paracetamol, Dextrometorfano, Fenilefrina.', 5, 'Alivio de los sÃ­ntomas de resfriado severo y tos', 'thera.jfif', 'Pieza', 0),
(73, 'Tabcin', 119, 'Paracetamol, Dextrometorfano, Fenilefrina.', 5, 'Alivio de los sÃ­ntomas de resfriado severo y tos.', 'tabcin.jfif', 'Caja', 0),
(74, 'Guante Curapack', 32, 'Latex', 6, 'Guante Curapack Multiusos Mediano 10pzas', 'guantes.jfif', 'Paquete', 0),
(75, 'Guante desechable', 3, 'Latex', 6, ' Este producto es efectivo como barrera biolÃ³gica ', 'ambiderm.jfif', 'Paquete', 0),
(77, 'Guante dalux ', 43, 'Latex', 6, 'Guante Dalux LÃ¡tex Mediano 10pzas', 'dalux.jfif', 'Paquete', 0),
(78, 'Sonda foley', 48, 'LÃ¡tex de caucho natural', 6, 'Sonda de Foley Bardia de 2 vÃ­as, estÃ©ril, calibre ', 'sonda.jfif', 'Pieza', 0),
(79, 'Aceite suavisante', 19, 'Aceite de almendras', 6, 'Protege la piel de factores externos ', 'aceite.jfif', 'Pieza', 0);

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
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `clientes_datos_personales`
--
ALTER TABLE `clientes_datos_personales`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `datos_pers_user`
--
ALTER TABLE `datos_pers_user`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id_do` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
