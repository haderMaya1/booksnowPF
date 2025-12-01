-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2022 a las 16:45:58
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
-- Base de datos: `booksnow`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `idarticulo` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) DEFAULT NULL,
  `autor` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `editorial` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_publicacion` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idarticulo`, `idcategoria`, `codigo`, `nombre`, `precio_venta`, `stock`, `descripcion`, `imagen`, `estado`, `autor`, `editorial`, `fecha_publicacion`) VALUES
(1, 1, '051', 'Drácula', '50000.00', 144, 'Antes de convertirse en un vampiro, el conde Drácula era el príncipe Vlad que, al enterarse de la muerte de su amada, vendió su alma al diablo. Cuatro siglos más tarde, Jonathan Harker, un joven abogado que viaja a un castillo perdido en el este de Europa, acaba siendo capturado por el conde Drácula.', 'https://images.cdn3.buscalibre.com/fit-in/360x360/7b/b8/7bb83825acc199623e3177d6c44b9319.jpg', 1, 'Bram Stoker', 'Espasa', 2008),
(2, 2, '162', 'A dos metros de ti', '34000.00', 52, 'Aborda un tema complicado, lacrimógeno, al estilo de la novela “Bajo La Misma Estrella” de John Green. Stella (Haley Lu Richardson), enferma de fibrosis quística, conoce a Will Newman (Cole Prouse). En principio chocan. Ella es ordenada, controladora, disciplinada, entusiasta.', 'https://libreriamorelos.mx/images/assets/portadas/9786073176828.jpg', 1, 'RACHAEL LIPPINCOTT', '\r\nNUBE DE TINTA', 2019),
(3, 1, '142', 'Psicología Oscura', '15000.00', 16, 'Una guía esencial de persuasión, manipulación, engaño, control mental, negociación, conducta humana, PNL y guerra psicológica', 'https://imgv2-2-f.scribdassets.com/img/audiobook/450219284/original/6572c92df9/1594420221?v=1', 1, 'STEVEN TURNER\r\n', '', 2019),
(4, 2, '153', 'Por amor', '40000.00', 69, 'Por amor es una novela juvenil escrita por Karen McCombie, donde relata con un lenguaje sencillo la manera en que Alice de 16 años vive su primera experiencia de amor con Kiran, con las drogas y sus consecuencias. ¿Cuántas veces te has enamorado? ¿Nunca hiciste nada de lo que te arrepentirías después? ¿Y si te arrepientes? ¿Volverías a intentarlo?', 'https://4.bp.blogspot.com/-YDYgPZGKDJw/WGr5iAFjJ0I/AAAAAAAABkI/HG7UGUTtchMY-l51RrqVlUZOZmEG5vM0gCLcB/s1600/por-amor2.jpg', 0, 'Mccombie, Karen ', 'Norma', 0000),
(11, 2, '812', 'Contra el tiempo', '31500.00', 12, 'Un cambio de planes en las vacaciones de Sughey, la llevaran a conocer un paraíso terrenal. Una hacienda que será testigo de cómo su interior poco a poco se irá transformando tras conocer al causante y provocador de una conmoción que cimbrará todos los sentimientos resguardados en su corazón. Flores, árboles y un bello atardecer la conducirán de la mano de Daniel un chico sureño y atractivo, a vivir experiencias que ni en su más loca idea hubiese siquiera imaginado presenciar, vivir. ¿Tendrá por fin un fortuito amor de verano?', 'https://th.bing.com/th/id/OIP.V_5q8RcBX_y7paSyoGwLyAAAAA?pid=ImgDet&w=115.2&h=180&c=7&dpr=1,3', 0, 'Katherinne Alvarez', '', 0000),
(14, 1, '414', 'Inferno', '80000.00', 43, 'El profesor de simbología Robert Langdon se despierta en un hospital en mitad de la noche, desorientado y con una herida en la cabeza. No recuerda nada de las últimas treinta y seis horas.\r\n\r\nNi cómo ha llegado hasta allí, ni el origen del macabro objeto que los médicos descubren entre sus pertenencias. El mundo de Langdon pronto se convierte en un caos y se ve obligado a huir por las calles de Florencia junto con una inteligente joven, Sienna Brooks, cuyas hábiles maniobras le salvan la vida. Langdon no tarda en darse cuenta de que se encuentra en posesión de una serie de inquietantes códigos creados por un brillante científico; un genio cuya obsesión con el fin del mundo sólo es equiparable a lapasión que siente por una de las obras maestras más influyentes jamás escritas: Inferno, el oscuro poema épico de Dante Alighieri.', 'https://th.bing.com/th/id/R.14e81d182b5b9403b32f4c7eefdd6027?rik=SXWnFS%2be%2bw%2brEw&pid=ImgRaw&r=0', 1, 'Dan Brown', 'Booket', 2013);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `estado`) VALUES
(1, 'Terror', b'1'),
(2, 'Drama', b'1'),
(3, 'Humor', b'1'),
(4, 'Deporte', b'1'),
(5, 'Ficcion', b'1'),
(6, 'Videojuegos', b'1'),
(7, ' Aventuras', b'1'),
(8, 'Cuentos', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `idmensaje` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idrol` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`idmensaje`, `idusuario`, `idrol`, `nombre`, `mensaje`, `fecha`) VALUES
(20, 1, 1, 'AdRober', 'Buenas', '2022-12-06 17:52:43'),
(21, 3, 2, 'anita', 'Hola', '2022-12-06 17:53:05'),
(22, 1, 1, 'AdRober', 'Como esta?', '2022-12-06 18:38:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`iddetalle_venta`, `idventa`, `idarticulo`, `cantidad`, `precio`) VALUES
(9, 5, 14, 3, '240000.00'),
(10, 5, 11, 1, '31500.00'),
(11, 6, 14, 1, '80000.00'),
(12, 6, 4, 2, '80000.00'),
(13, 7, 3, 1, '15000.00'),
(14, 8, 4, 3, '120000.00'),
(15, 9, 3, 2, '30000.00'),
(16, 9, 14, 1, '80000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `num_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombre`, `apellido`, `tipo_documento`, `num_documento`, `email`, `direccion`, `telefono`) VALUES
(1, 'Roberto', 'Quintero Ochoa', 'CC', '1000000000', 'adrober@admin.com', NULL, NULL),
(2, 'Yandi', 'Blanco Naranjo', 'TI', '1000123123', 'yandi@hotmail.com', 'Dg 45 # 39-23', '3112456423'),
(3, 'Ana', 'Uribe Uribe', 'CE', '1002134598', 'ana43@hotmail.com', 'Dg 42# 32-24', '3225224563');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personafacturacion`
--

CREATE TABLE `personafacturacion` (
  `idFacturacion` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telPrincipal` varchar(20) NOT NULL,
  `telOpcional` varchar(20) DEFAULT NULL,
  `region` varchar(50) NOT NULL,
  `barrio` varchar(50) NOT NULL,
  `postalCode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personafacturacion`
--

INSERT INTO `personafacturacion` (`idFacturacion`, `nombre`, `apellido`, `email`, `direccion`, `telPrincipal`, `telOpcional`, `region`, `barrio`, `postalCode`) VALUES
(8, 'Yandi', 'Blanco Naranjo', 'yandi@hotmail.com', 'Dg 45 # 39-23', '3112456423', '', 'Amazonas', 'Rio', ''),
(9, 'Amnda', 'Naranjo Blanco', 'Amanda@hotmail.com', 'Dg 91 # 390-00', '3002400423', '3112641263', 'Cesar', 'Salido', ''),
(10, 'Ana', 'Uribe Uribe', 'ana43@hotmail.com', 'Dg 42# 32-24', '3225224563', '', 'Amazonas', 'America', ''),
(11, 'Ana', 'Uribe Uribe', 'ana43@hotmail.com', 'Dg 42# 32-24', '3225224563', '', 'Amazonas', 'Florencia', '051051'),
(12, 'Yandi', 'Blanco Naranjo', 'yandi@hotmail.com', 'Dg 45 # 39-23', '3112456423', '', 'Amazonas', 'Rio', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombre`, `estado`) VALUES
(1, 'Administrador', 1),
(2, 'Cliente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `idrol` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `idpersona`, `idrol`, `nombre`, `password`, `estado`) VALUES
(1, 1, 1, 'AdRober', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 1),
(2, 2, 2, 'YandiRol', '985f05bd1a773e363760163195029b8d3bbd35849aafd6d511914a54dba806aee18e4252ee4d445107f9910f3b1316cc60807cb631321e237d67db618dc53f99', 1),
(3, 3, 2, 'anita', '40c41475561375aa28d4d035445525f0e8f6bfaba1fdb4bc0c30dec2de112d7c7df168bdced38b4d87326b4c3f226c2ba1a09f4384451b0bc5f9c108c1c1df32', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `idpersona` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idFacturacion` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `num_comprobante` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `total` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `idpersona`, `idusuario`, `idFacturacion`, `tipo_comprobante`, `num_comprobante`, `fecha_hora`, `total`) VALUES
(5, 2, 2, 8, 'Virtual', '5874891', '2022-12-06 04:18:22', '283500.00'),
(6, 2, 2, 9, 'Virtual', '4775622', '2022-12-06 04:23:01', '172000.00'),
(7, 3, 3, 10, 'Virtual', '8744656', '2022-12-06 10:31:09', '27000.00'),
(8, 3, 3, 11, 'Virtual', '3098768', '2022-12-06 10:33:30', '132000.00'),
(9, 2, 2, 12, 'Virtual', '4257026', '2022-12-06 08:06:32', '122000.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idarticulo`),
  ADD KEY `fk_articulo_categoria` (`idcategoria`) USING BTREE;

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`idmensaje`),
  ADD KEY `idrol` (`idrol`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `FK_Articulo_DetalleVenta` (`idarticulo`) USING BTREE,
  ADD KEY `FK_Venta_DetalleVenta` (`idventa`) USING BTREE;

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `personafacturacion`
--
ALTER TABLE `personafacturacion`
  ADD PRIMARY KEY (`idFacturacion`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idrol` (`idrol`),
  ADD KEY `fk_usuario_persona` (`idpersona`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `FK_Persona_Venta` (`idpersona`) USING BTREE,
  ADD KEY `FK_Usuario_Venta` (`idusuario`) USING BTREE,
  ADD KEY `fk_facturacion` (`idFacturacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `idmensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personafacturacion`
--
ALTER TABLE `personafacturacion`
  MODIFY `idFacturacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`);

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `FK_Venta_DetalleVenta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_persona` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`),
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `Fk_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `fk_facturacion` FOREIGN KEY (`idFacturacion`) REFERENCES `personafacturacion` (`idFacturacion`),
  ADD CONSTRAINT `fk_persona` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
