-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2022 a las 23:40:43
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
-- Base de datos: `cotton`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdministrador` varchar(10) NOT NULL,
  `docType` varchar(30) NOT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `secondName` varchar(30) DEFAULT NULL,
  `surname` varchar(30) DEFAULT NULL,
  `secondSurname` varchar(30) DEFAULT NULL,
  `indicativo` varchar(4) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `pass` varchar(60) DEFAULT NULL,
  `idCiudad` varchar(3) DEFAULT NULL,
  `idEstado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `docType`, `firstName`, `secondName`, `surname`, `secondSurname`, `indicativo`, `phone`, `correo`, `pass`, `idCiudad`, `idEstado`) VALUES
('1000789390', '1', 'David', 'Santiago', 'Vargas', 'Oyola', '+57', '3053608404', 'dsvargas09@misena.edu.co', '', '01', b'1'),
('1025523017', '1', 'Carlos', 'Daniel', 'Giraldo', 'Naranjo', '+57', '3114365250', 'cdgiraldo71@misena.edu.co', '', '01', b'1'),
('1028880234', '1', 'Karol', 'Valentina', 'Avila', 'Quintero', '+57', '3502120698', 'kvavila43@misena.edu.co', '', '01', b'1'),
('1030535589', '1', 'Anibal', 'Yesith', 'Oviedo', 'Madera', '+57', '3132738038', 'ayoviedo98@misena.edu.co', '', '01', b'1'),
('1031641906', '1', 'Ana', 'Maria', 'Riaño', 'Cano', '+57', '3206882236', 'amriano6@misena.edu.co', '', '01', b'1'),
('1127024006', '1', 'Alexis', '', 'Luque', 'Orozco', '+57', '3196503655', 'aluque6@misena.edu.co', '', '01', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `idCiudad` varchar(3) NOT NULL,
  `nomCiudad` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idCiudad`, `nomCiudad`) VALUES
('01', 'Bogota'),
('02', 'Medellin'),
('03', 'Cali'),
('04', 'ValleDupar'),
('05', 'Cartagena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `idDireccion` varchar(10) NOT NULL,
  `tipoVia` varchar(20) DEFAULT NULL,
  `numVia` varchar(3) DEFAULT NULL,
  `sufijoLetra` varchar(1) DEFAULT NULL,
  `bis` varchar(10) DEFAULT NULL,
  `sufijoVia` varchar(2) DEFAULT NULL,
  `firstCuadrante` varchar(10) DEFAULT NULL,
  `sufijoNumero` varchar(3) DEFAULT NULL,
  `sufijoSecundario` varchar(1) DEFAULT NULL,
  `numComplemento` varchar(3) DEFAULT NULL,
  `cuadranteComplemento` varchar(10) DEFAULT NULL,
  `idEstado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`idDireccion`, `tipoVia`, `numVia`, `sufijoLetra`, `bis`, `sufijoVia`, `firstCuadrante`, `sufijoNumero`, `sufijoSecundario`, `numComplemento`, `cuadranteComplemento`, `idEstado`) VALUES
('D001', 'Calle', '62', 'B', 'bis', 'T', 'Norte', '84', '', '', '', b'1'),
('D002', 'Carrera', '86', 'C', 'bis', '', '', '40', 'C', '03', 'Sur', b'0'),
('D003', 'Transversal', '86', 'A', '', '', '', '83', 'A', '29', '', b'0'),
('D004', 'Avenida', '78', 'I', 'bis', '', '', '56', 'D', '34', '', b'0'),
('D005', 'Autopista', '31', 'V', '', '', '', '64', 'S', '42', 'Norte', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `docType` varchar(1) NOT NULL,
  `docName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`docType`, `docName`) VALUES
('1', 'Cedula de ciudadania'),
('2', 'Pasaporte'),
('3', 'Cedula de extranjeri');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` bit(1) NOT NULL,
  `nomEstado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `nomEstado`) VALUES
(b'0', 'Desactivad'),
(b'1', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` varchar(8) NOT NULL,
  `idUsuario` varchar(10) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `cantidad` varchar(3) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `obser` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `idUsuario`, `fecha`, `codigo`, `cantidad`, `total`, `obser`) VALUES
('F001', '47271265', '0000-00-00', 'P0003', '3', 0, ''),
('F002', '184646486', '0000-00-00', 'P0002', '2', 0, ''),
('F003', '196356978', '0000-00-00', 'P0004', '3', 0, ''),
('F004', '146767674', '0000-00-00', 'P0005', '5', 0, ''),
('F005', '124557865', '0000-00-00', 'P0001', '1', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` varchar(10) NOT NULL,
  `nomProducto` varchar(30) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `stock` int(10) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `talla` varchar(2) DEFAULT NULL,
  `imagen` longblob DEFAULT NULL,
  `idEstado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `nomProducto`, `precio`, `stock`, `descripcion`, `talla`, `imagen`, `idEstado`) VALUES
('P0001', 'refgirasol', 0, 0, 'Girasol detallado con color azul y fondo blanco', 'S-', '', b'1'),
('P0002', 'chaleco star', 0, 0, 'Estrella detallada con color azul y fondo blanco', 'S-', '', b'1'),
('P0003', 'chaleco azar', 0, 0, 'Chaleco negro con corazones', 'S-', '', b'1'),
('P0004', 'saco gummi', 0, 0, 'Saco gris  a base de lana', 'S-', '', b'1'),
('P0005', 'saco desagudo', 0, 0, 'Saco verde con contorno y forma de hojas', 'S-', '', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` varchar(10) NOT NULL,
  `docType` varchar(30) NOT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `secondName` varchar(30) DEFAULT NULL,
  `surname` varchar(30) DEFAULT NULL,
  `secondSurname` varchar(30) DEFAULT NULL,
  `indicativo` varchar(4) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `pass` varchar(60) DEFAULT NULL,
  `idDireccion` varchar(10) DEFAULT NULL,
  `idCiudad` varchar(3) DEFAULT NULL,
  `idEstado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `docType`, `firstName`, `secondName`, `surname`, `secondSurname`, `indicativo`, `phone`, `correo`, `pass`, `idDireccion`, `idCiudad`, `idEstado`) VALUES
('124557865', '1', 'Maria', 'Alexandra', 'Castillo', 'Parra', '+57', '3058696374', 'malecastillo305@gmail.com', '', 'D005', '05', b'1'),
('146767674', '1', 'Juan', 'Felipe', 'Gonzales', 'Sarmiento', '+57', '3159635467', 'juangonzales96@gmail.com', '', 'D004', '04', b'1'),
('184646486', '1', 'Laura', 'Andrea', 'Quiroga', 'Perez', '+57', '3559634563', 'andruquirr@hotmail.com', '', 'D002', '02', b'1'),
('196356978', '1', 'Vannesa', '', 'Martinez', 'Almeida', '+57', '3014889630', 'vannemati96@gmail.com', '', 'D003', '03', b'1'),
('47271265', '2', 'Cristian', 'Andres', 'Gamboa', 'Torres', '+56', '4235855452', 'crisgambototo@gmail.cl', '', 'D001', '01', b'1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`,`docType`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `idCiudad` (`idCiudad`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idCiudad`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idDireccion`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`docType`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `codigo` (`codigo`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`,`docType`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `idDireccion` (`idDireccion`),
  ADD KEY `idCiudad` (`idCiudad`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`),
  ADD CONSTRAINT `administrador_ibfk_2` FOREIGN KEY (`idCiudad`) REFERENCES `ciudad` (`idCiudad`);

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `producto` (`codigo`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idDireccion`) REFERENCES `direccion` (`idDireccion`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`idCiudad`) REFERENCES `ciudad` (`idCiudad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
