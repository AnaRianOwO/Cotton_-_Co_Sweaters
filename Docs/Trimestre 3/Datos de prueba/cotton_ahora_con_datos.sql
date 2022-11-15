-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2022 a las 18:22:58
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

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
USE cotton;
CREATE TABLE `administrador` (
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `numeroDocumento` varchar(20) NOT NULL,
  `idTipoDocumento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`nombre`, `apellido`, `correo`, `clave`, `numeroDocumento`, `idTipoDocumento`) VALUES
('Pedro', 'Perez', 'pedroprz0526@gmail.com', '15236987', '54869325', 1),
('Samuel', 'vargas', 'samvrgs4567@gmail.com', 'samuel6985', '2569874125', 1),
('Ana', 'samudio', 'amsamudio@gmail.com', '2561478222', '521489635', 3),
('Carlos', 'marin', 'carman45@gmail.com', 'cot56789', '5698522222', 1),
('Pedro', 'Paredes', 'paredesdepedro@gmail.com', 'noconstruyoparedes.porfavorparen', '2345678043', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `idDetalleVenta` int(11) NOT NULL,
  `cantidadProductos` int(11) DEFAULT NULL,
  `subtotalDetalleVenta` double DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`idDetalleVenta`, `cantidadProductos`, `subtotalDetalleVenta`, `idProducto`) VALUES
(11, 3, 510000, 2),
(12, 1, 55000, 1),
(13, 5, 60000, 9),
(14, 5, 325000, 4),
(15, 1, 75000, 1),
(16, 2, 150000, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `idDireccion` int(11) NOT NULL,
  `localidad` varchar(45) DEFAULT NULL,
  `barrio` varchar(45) DEFAULT NULL,
  `tipoCalle` varchar(45) DEFAULT NULL,
  `numeroCalle` varchar(45) DEFAULT NULL,
  `codigoPostal` varchar(45) DEFAULT NULL,
  `numeroVivienda` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`idDireccion`, `localidad`, `barrio`, `tipoCalle`, `numeroCalle`, `codigoPostal`, `numeroVivienda`) VALUES
(11, 'Bosa', 'Estación', 'Tv', '98', '001', '54'),
(12, 'Engativá', 'Los cerezos', 'Tv', '86', '111', '29'),
(13, 'Bosa', 'Santa fe', 'Cll', '98', '9870', '02'),
(14, 'Kennedy', 'Patio bonito', 'Kr', '80', '3456', '07'),
(15, 'Teusaquillo', 'Quirigua', 'Tv', '06', '9650', '26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `idVenta` int(11) DEFAULT NULL,
  `valorTotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `idVenta`, `valorTotal`) VALUES
(11, 1, 5656565465),
(12, 5, 34000000),
(13, 3, 450000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` varchar(20) NOT NULL,
  `nombreProducto` varchar(50) DEFAULT NULL,
  `precioProducto` double DEFAULT NULL,
  `stockProducto` int(11) DEFAULT NULL,
  `descripcionProducto` varchar(100) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombreProducto`, `precioProducto`, `stockProducto`, `descripcionProducto`, `estado`) VALUES
('KJGI36', 'Zebra', 55000, 40, 'Saco de lana con patrón de Zebra', 1),
('OBR987', 'Tata', 70000, 39, 'Saco en lana, con patron colorido.', 1),
('FIFKG005', 'Luciana', 75000, 13, 'Saco de lana en perfecto estado\r\n', 1),
('JFIHF8356', 'Marian', 65000, 46, 'Saco de lana con patrón de estrellas luminosas.', 1),
('GK5632', 'luna', 80000, 39, 'luna lunera, cascabelera, cinco pollitos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `idTipoDocumento` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`idTipoDocumento`, `nombre`) VALUES
(11, 'Cédula de ciudadanía'),
(12, 'Tarjeta de identidad'),
(13, 'Cédula de extranjería'),
(14, 'Pasaporte'),
(15, 'Registro civil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `idTipoDocumento` int(11) DEFAULT NULL,
  `numeroDocumento` varchar(20) NOT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `direccion` int(11) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `apellido`, `idTipoDocumento`, `numeroDocumento`, `celular`, `fechaNacimiento`, `direccion`, `correo`, `clave`, `estado`) VALUES
('Paula', 'marin', 1, '1052698705', '3321569874', '1995-06-08', 1, 'paulamarin65@gmail.com', 'paula123456789', 1),
('Maria', 'ramirez', 3, '2569874553', '250158965', '2002-06-05', 2, 'mariaramirez345@gmail.com', '4598laur25', 1),
('Paula', 'marin', 1, '1052698745', '3321569874', '2003-06-06', 1, 'paulamarin65@gmail.com', 'paula123456789', 1),
('Maria', 'ramirez', 3, '2569874563', '250158965', '2022-06-01', 2, 'mariaramirez345@gmail.com', '4598laur25', 1),
('David', 'Vargas', 1, '3476434', '236784596', '2002-06-04', 4, 'dsvargas09@misena.edu.co', 'tumamaentanga1234', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL,
  `numeroDocumento` int(11) DEFAULT NULL,
  `idDetalleVenta` int(11) DEFAULT NULL,
  `fechaVenta` date DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVenta`, `numeroDocumento`, `idDetalleVenta`, `fechaVenta`, `estado`) VALUES
(11, 1052698705, 3, '2022-05-12', 1),
(12, 1052698745, 5, '2022-06-21', 1),
(13, 2569874553, 7, '2022-06-23', 1),
(14, 3476434, 8, '2022-06-21', 1),
(15, 2569874563, 8, '2022-02-17', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`numeroDocumento`),
  ADD KEY `idTipoDocumento` (`idTipoDocumento`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`idDetalleVenta`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idDireccion`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `idVenta` (`idVenta`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`idTipoDocumento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`numeroDocumento`),
  ADD KEY `idTipoDocumento` (`idTipoDocumento`),
  ADD KEY `direccion` (`direccion`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `numeroDocumento` (`numeroDocumento`),
  ADD KEY `idDetalleVenta` (`idDetalleVenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `idDetalleVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `idDireccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `idTipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
