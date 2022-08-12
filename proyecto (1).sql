-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2022 a las 00:30:04
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
) ;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `id_cliente`, `id_doc`, `hora`, `fecha`, `realizadas`) VALUES
(1, 5, 1, '13:00:00', '2021-04-02', NULL),
(2, 2, 2, '11:00:00', '2022-03-04', NULL);

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
(2, 'Juanii', 'juanitoo', 2, 3),
(3, 'gemaaa', 'gemita', 3, 3),
(4, 'viktor', 'vik', 4, 3),
(5, 'dylan1', 'dyl', 5, 3),
(11, 'julio', '$2y$10$UWsVttIrn5xtVuYo/VbQmOy/HRYlYwXStQ.Kb6.CjeXgbH0ULpxL.', NULL, 3);

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
(11, 'julio', 'Castañeda', 'Chavez', 'julio.28@gmail.com', 24, 'M', '7878978998', 'GGHHHFF556');

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
(2, 'Ricardo', 'Cabello', 'Rodriguez', 'rick@gmail.com', 20, 'M', '1234567008'),
(3, 'Nicole', 'Cabello', 'Rodriguez', 'nicole@gmail.com', 22, 'F', '0987654321'),
(5, 'Eduardo ', 'Tapia', 'Marquez', 'tapia@gmail.com', 19, 'M', '8719896677');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `id_orden` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad_prod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_orden`
--

INSERT INTO `detalle_orden` (`id_orden`, `id_producto`, `cantidad_prod`) VALUES
(1, 2, 4),
(1, 1, 1),
(2, 3, 5),
(2, 1, 4),
(2, 2, 1),
(3, 2, 1),
(3, 3, 5),
(3, 1, 2);

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
  `id_cliente` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `direccion` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id_orden`, `id_cliente`, `fecha`, `direccion`) VALUES
(1, 2, '0000-00-00', 'CALZ. DE LA CANDELA'),
(2, 4, '2022-02-05', 'Valle Verde'),
(3, 3, '2022-03-12', 'SAN SALVADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nom_producto` varchar(500) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `formula` varchar(600) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `IMAGEN` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nom_producto`, `precio`, `fecha_vencimiento`, `formula`, `id_cat`, `descripcion`, `IMAGEN`) VALUES
(1, 'Gomitas tropical punch', 250, '2022-02-02', 'Carbonato de calcio', 1, 'Gomitas tropicales farmaceuticos', 'imagen.jpg'),
(2, 'Pepto bismol', 490, '2022-05-03', 'Carbonato de calcio', 2, 'Producto farmaceutico de la farmacia', 'imagen.jpg'),
(3, 'Aspirinas', 49, '2022-07-03', 'Carbonato de calcio', 3, 'Producto farmaceutico de la farmacia', 'imagen.jpg');

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
(2, 'jose', 'abc', 2, 2),
(3, 'fabian', 'abc', 2, 3),
(5, 'tapia', 'abc', 2, 5);

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
  ADD KEY `fk_orden` (`id_orden`),
  ADD KEY `fk_prod` (`id_producto`);

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
  ADD PRIMARY KEY (`id_orden`),
  ADD KEY `fk_cliente` (`id_cliente`);

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
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `clientes_datos_personales`
--
ALTER TABLE `clientes_datos_personales`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `datos_pers_user`
--
ALTER TABLE `datos_pers_user`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `fk_orden` FOREIGN KEY (`id_orden`) REFERENCES `orden` (`id_orden`),
  ADD CONSTRAINT `fk_prod` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD CONSTRAINT `fk_docuser` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_client`);

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