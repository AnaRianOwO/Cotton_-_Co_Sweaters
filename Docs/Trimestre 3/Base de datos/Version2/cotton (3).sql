-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2022 at 06:12 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cotton`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `numeroDocumento` varchar(20) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `clave` varchar(60) DEFAULT NULL,
  `idEstado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`numeroDocumento`, `nombre`, `apellido`, `correo`, `clave`, `idEstado`) VALUES
('1000789390', 'David', 'Vargas', 'dsvargas09@misena.edu.co', '$2y$10$3Uc.aRtwnqM7OWXXVktctOL/pIaLXmb7Ad9l8mc91KljOPvRjph.q', b'1'),
('1025523017', 'Carlos', 'Giraldo', 'cgiraldo71@misena.edu.co', '$2y$10$x9shkSdFdzQS9LeAukZfEeYwivcjnUbodgZDZioXFK12ZbjO2Hhg6', b'1'),
('1028880234', 'Karol', 'Ávila', 'kvavila43@misena.edu.co', '$2y$10$BbYlfqNngrKcFQPchhCEdO.Z11DwGzaVh.L7b3fMMW/UI9TTJU.5K', b'1'),
('1030535589', 'Anibal', 'Oviedo', 'ayoviedo68@misena.edu.co', '$2y$10$Ben1BUfMSYFI.I2vF3Y37e7bmsWulV6a1lRYTjmXIJEF9bbRvhV8a', b'1'),
('1031641906', 'Ana', 'Riaño', 'amriano6@misena.edu.co', '$2y$10$XLoOpkKUQIuILgzLvCcPTOJg0uNPU9kw1sTpzv1NLAZxM5.1uSPJK', b'1'),
('1127024006', 'Alexis', 'Luque', 'aluque6@misena.edu.co', '$2y$10$t6j7F3npbEol.RKywFeP3uoOMwvVJP2h7VO8oXLYuA1UFOdg51ioO', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `direccion`
--

CREATE TABLE `direccion` (
  `idDireccion` varchar(20) NOT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `estado` varchar(60) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `codigoPostal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `direccion`
--

INSERT INTO `direccion` (`idDireccion`, `pais`, `ciudad`, `estado`, `direccion`, `codigoPostal`) VALUES
('D001', 'Colombia', 'Bogotá', 'Kennedy', 'CLL 25 B bis 29# 26 norte', 111011),
('D002', 'EEUU', 'New York', '', 'Carrera 26 E bis 23# 89 norte', 10001),
('D003', 'Rusia', 'Moscú', '', 'CLL 34 I bis 76# 12 sur', 101000);

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `idEstado` bit(1) NOT NULL,
  `nombreEstado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`idEstado`, `nombreEstado`) VALUES
(b'0', 'Inactivo'),
(b'1', 'activo');

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

CREATE TABLE `factura` (
  `idFactura` varchar(11) NOT NULL,
  `cantidadProducto` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `idProducto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factura`
--

INSERT INTO `factura` (`idFactura`, `cantidadProducto`, `total`, `idProducto`) VALUES
('F00001', 2, 240000, 'P00001'),
('F00002', 1, 80000, 'P00002'),
('F00003', 1, 135000, 'P00003'),
('F00004', 1, 95000, 'P00004'),
('F00005', 3, 240000, 'P00002');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `idProducto` varchar(20) NOT NULL,
  `nombreProducto` varchar(50) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `idEstado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`idProducto`, `nombreProducto`, `precio`, `stock`, `descripcion`, `idEstado`) VALUES
('P00001', 'Saco cebra', 120000, 23, 'Saco hecho en algodon de la coleccion zafari, con rayas blancas estilo cebra', b'1'),
('P00002', 'Saco jirafa', 80000, 6, 'Saco hecho en algodon de la coleccion zafari, con manchas cafe y amarillo sol', b'1'),
('P00003', 'Saco rosa pasion', 135000, 0, 'Saco hecho en algodon, con diseño cuello tortuga', b'0'),
('P00004', 'FIT & FAT', 95000, 25, 'Saco hecho en algodon, el tono naranja y el tono mandarina es un duo explosivo y de temporada', b'1'),
('P00005', 'REF-GIRASOL', 65000, 0, 'Saco hecho en algodon, con el diseño de una flor azul', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `numeroDocumento` varchar(20) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `clave` varchar(60) DEFAULT NULL,
  `idEstado` bit(1) DEFAULT NULL,
  `idDireccion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`numeroDocumento`, `nombre`, `apellido`, `celular`, `correo`, `clave`, `idEstado`, `idDireccion`) VALUES
('U1028672086', 'Milena', 'Madera', '3106246492', 'milean@gmail.com', '', b'1', 'D002'),
('U1127024007', 'Carlos', 'Gutierrez', '3286471953', 'carlos@gmail.com', '', b'1', 'D001'),
('U1278453678', 'Jose', 'Oyola', '3110467283', 'jose@gmail.com', '', b'0', 'D003');

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE `venta` (
  `idVenta` varchar(20) NOT NULL,
  `fechaVenta` date DEFAULT NULL,
  `numeroDocumento` varchar(20) DEFAULT NULL,
  `idFactura` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`idVenta`, `fechaVenta`, `numeroDocumento`, `idFactura`) VALUES
('V00001', '2018-12-23', 'U1028672086', 'F00003'),
('V00002', '2019-09-02', 'U1278453678', 'F00001'),
('V00004', '2021-07-30', 'U1028672086', 'F00002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`numeroDocumento`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indexes for table `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idDireccion`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indexes for table `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`numeroDocumento`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `idDireccion` (`idDireccion`);

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `numeroDocumento` (`numeroDocumento`),
  ADD KEY `idFactura` (`idFactura`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`);

--
-- Constraints for table `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idDireccion`) REFERENCES `direccion` (`idDireccion`);

--
-- Constraints for table `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`numeroDocumento`) REFERENCES `usuario` (`numeroDocumento`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`idFactura`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
