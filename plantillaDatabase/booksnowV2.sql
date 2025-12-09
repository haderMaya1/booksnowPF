-- phpMyAdmin SQL Dump
-- version 5.2.0
-- Servidor: 127.0.0.1
-- Dump corregido y ordenado por ChatGPT

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
SET NAMES utf8mb4;

-- -------------------------
-- TABLA: categoria
-- -------------------------
CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estado` bit(1) DEFAULT b'1',
  PRIMARY KEY (`idcategoria`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `categoria` (`idcategoria`, `nombre`, `estado`) VALUES
(1, 'Terror', b'1'),
(2, 'Drama', b'1'),
(3, 'Humor', b'1'),
(4, 'Deporte', b'1'),
(5, 'Ficcion', b'1'),
(6, 'Videojuegos', b'1'),
(7, ' Aventuras', b'1'),
(8, 'Cuentos', b'1');

-- -------------------------
-- TABLA: articulo
-- -------------------------
CREATE TABLE `articulo` (
  `idarticulo` int(11) NOT NULL AUTO_INCREMENT,
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
  `fecha_publicacion` year(4) NOT NULL,
  PRIMARY KEY (`idarticulo`),
  KEY `fk_articulo_categoria` (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `articulo` VALUES
(1, 1, '051', 'Drácula', '50000.00', 144, 'Antes de convertirse en un vampiro...', 'https://images.cdn3.buscalibre.com/fit-in/360x360/7b/b8/7bb83825acc199623e3177d6c44b9319.jpg', 1, 'Bram Stoker', 'Espasa', 2008),
(2, 2, '162', 'A dos metros de ti', '34000.00', 52, 'Aborda un tema complicado...', 'https://libreriamorelos.mx/images/assets/portadas/9786073176828.jpg', 1, 'RACHAEL LIPPINCOTT', 'NUBE DE TINTA', 2019),
(3, 1, '142', 'Psicología Oscura', '15000.00', 16, 'Una guía esencial...', 'https://play.google.com/books/publisher/content/images/frontcover/7oSsEAAAQBAJ?fife=w240-h345', 1, 'STEVEN TURNER', '', 2019),
(4, 2, '153', 'Por amor', '40000.00', 69, 'Por amor es una novela juvenil...', 'https://4.bp.blogspot.com/-YDYgPZGKDJw/WGr5iAFjJ0I/AAAAAAAABkI/HG7UGUTtchMY-l51RrqVlUZOZmEG5vM0gCLcB/s1600/por-amor2.jpg', 0, 'Mccombie, Karen', 'Norma', 0000),
(11, 2, '812', 'Contra el tiempo', '31500.00', 12, 'Un cambio de planes...', 'https://ichef.bbci.co.uk/ace/ws/640/cpsprodpb/f4f9/live/0c944e10-e00c-11ef-bd1b-d536627785f2.jpg.webp', 0, 'Katherinne Alvarez', '', 0000),
(14, 1, '414', 'Inferno', '80000.00', 43, 'El profesor de simbología Robert Langdon...', 'https://desdeloslibros.wordpress.com/wp-content/uploads/2014/10/inferno.jpg', 1, 'Dan Brown', 'Booket', 2013);

-- -------------------------
-- TABLA: persona
-- -------------------------
CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `num_documento` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `persona` VALUES
(1, 'Roberto', 'Quintero Ochoa', 'CC', '1000000000', 'adrober@admin.com', NULL, NULL),
(2, 'Yandi', 'Blanco Naranjo', 'TI', '1000123123', 'yandi@hotmail.com', 'Dg 45 # 39-23', '3112456423'),
(3, 'Ana', 'Uribe Uribe', 'CE', '1002134598', 'ana43@hotmail.com', 'Dg 42# 32-24', '3225224563');

-- -------------------------
-- TABLA: rol
-- -------------------------
CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `rol` VALUES
(1, 'Administrador', 1),
(2, 'Cliente', 1);

-- -------------------------
-- TABLA: usuario
-- -------------------------
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `idpersona` int(11) NOT NULL,
  `idrol` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) DEFAULT 1,
  PRIMARY KEY (`idusuario`),
  KEY `idrol` (`idrol`),
  KEY `fk_usuario_persona` (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `usuario` VALUES
(1, 1, 1, 'AdRober', 'c7ad44c...', 1),
(2, 2, 2, 'YandiRol', '985f05b...', 1),
(3, 3, 2, 'anita', '40c4147...', 1);

-- -------------------------
-- TABLA: chat
-- -------------------------
CREATE TABLE `chat` (
  `idmensaje` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idrol` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`idmensaje`),
  KEY `idusuario` (`idusuario`),
  KEY `idrol` (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `chat` VALUES
(20, 1, 1, 'AdRober', 'Buenas', '2022-12-06 17:52:43'),
(21, 3, 2, 'anita', 'Hola', '2022-12-06 17:53:05'),
(22, 1, 1, 'AdRober', 'Como esta?', '2022-12-06 18:38:51');

-- -------------------------
-- TABLA: personafacturacion
-- -------------------------
CREATE TABLE `personafacturacion` (
  `idFacturacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telPrincipal` varchar(20) NOT NULL,
  `telOpcional` varchar(20) DEFAULT NULL,
  `region` varchar(50) NOT NULL,
  `barrio` varchar(50) NOT NULL,
  `postalCode` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idFacturacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `personafacturacion` VALUES
(8, 'Yandi', 'Blanco Naranjo', 'yandi@hotmail.com', 'Dg 45 # 39-23', '3112456423', '', 'Amazonas', 'Rio', ''),
(9, 'Amnda', 'Naranjo Blanco', 'Amanda@hotmail.com', 'Dg 91 # 390-00', '3002400423', '3112641263', 'Cesar', 'Salido', ''),
(10, 'Ana', 'Uribe Uribe', 'ana43@hotmail.com', 'Dg 42# 32-24', '3225224563', '', 'Amazonas', 'America', ''),
(11, 'Ana', 'Uribe Uribe', 'ana43@hotmail.com', 'Dg 42# 32-24', '3225224563', '', 'Amazonas', 'Florencia', '051051'),
(12, 'Yandi', 'Blanco Naranjo', 'yandi@hotmail.com', 'Dg 45 # 39-23', '3112456423', '', 'Amazonas', 'Rio', '');

-- -------------------------
-- TABLA: venta
-- -------------------------
CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `idpersona` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idFacturacion` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `num_comprobante` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `total` decimal(11,2) NOT NULL,
  PRIMARY KEY (`idventa`),
  KEY `FK_Persona_Venta` (`idpersona`),
  KEY `FK_Usuario_Venta` (`idusuario`),
  KEY `fk_facturacion` (`idFacturacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `venta` VALUES
(5, 2, 2, 8, 'Virtual', '5874891', '2022-12-06 04:18:22', '283500.00'),
(6, 2, 2, 9, 'Virtual', '4775622', '2022-12-06 04:23:01', '172000.00'),
(7, 3, 3, 10, 'Virtual', '8744656', '2022-12-06 10:31:09', '27000.00'),
(8, 3, 3, 11, 'Virtual', '3098768', '2022-12-06 10:33:30', '132000.00'),
(9, 2, 2, 12, 'Virtual', '4257026', '2022-12-06 08:06:32', '122000.00');

-- -------------------------
-- TABLA: detalle_venta
-- -------------------------
CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT,
  `idventa` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  PRIMARY KEY (`iddetalle_venta`),
  KEY `FK_Articulo_DetalleVenta` (`idarticulo`),
  KEY `FK_Venta_DetalleVenta` (`idventa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `detalle_venta` VALUES
(9, 5, 14, 3, '240000.00'),
(10, 5, 11, 1, '31500.00'),
(11, 6, 14, 1, '80000.00'),
(12, 6, 4, 2, '80000.00'),
(13, 7, 3, 1, '15000.00'),
(14, 8, 4, 3, '120000.00'),
(15, 9, 3, 2, '30000.00'),
(16, 9, 14, 1, '80000.00');

-- -------------------------
-- NUEVA TABLA: articulo_review
-- -------------------------
CREATE TABLE `articulo_review` (
    `idreview` INT NOT NULL AUTO_INCREMENT,
    `idarticulo` INT NOT NULL,
    `idusuario` INT NOT NULL,
    `calificacion` TINYINT NOT NULL CHECK (calificacion BETWEEN 1 AND 5),
    `comentario` TEXT,
    `fecha` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `estado_review` ENUM('pendiente', 'aprobado', 'rechazado') DEFAULT 'pendiente',
    PRIMARY KEY (`idreview`),
    FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- -------------------------
-- FOREIGN KEYS
-- -------------------------
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`);

ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`),
  ADD CONSTRAINT `fk_usuario_persona` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`);

ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`);

ALTER TABLE `venta`
  ADD CONSTRAINT `fk_persona` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`),
  ADD CONSTRAINT `Fk_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `fk_facturacion` FOREIGN KEY (`idFacturacion`) REFERENCES `personafacturacion` (`idFacturacion`);

ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `FK_Venta_DetalleVenta` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`);

COMMIT;
