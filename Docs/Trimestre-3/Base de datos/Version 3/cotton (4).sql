-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 07:15 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `ciudad`
--

CREATE TABLE `ciudad` (
  `idCiudad` varchar(3) NOT NULL,
  `nomCiudad` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ciudad`
--

INSERT INTO `ciudad` (`idCiudad`, `nomCiudad`) VALUES
('01', 'Bogota'),
('02', 'Medellin'),
('03', 'Cali'),
('04', 'ValleDupar'),
('05', 'Cartagena');

-- --------------------------------------------------------

--
-- Table structure for table `direccion`
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
-- Dumping data for table `direccion`
--

INSERT INTO `direccion` (`idDireccion`, `tipoVia`, `numVia`, `sufijoLetra`, `bis`, `sufijoVia`, `firstCuadrante`, `sufijoNumero`, `sufijoSecundario`, `numComplemento`, `cuadranteComplemento`, `idEstado`) VALUES
('D001', 'Calle', '62', 'B', 'bis', 'T', 'Norte', '84', '', '', '', b'1'),
('D003', 'Transversal', '86', 'A', '', '', '', '83', 'A', '29', '', b'0'),
('D004', 'Avenida', '78', 'I', 'bis', '', '', '56', 'D', '34', '', b'0'),
('D005', 'Autopista', '31', 'V', '', '', '', '64', 'S', '42', 'Norte', b'0'),
('D2', 'Carrera', '86', 'C', 'bis', '', '', '40', 'C', '03', 'Sur', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `idEstado` bit(1) NOT NULL,
  `nomEstado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`idEstado`, `nomEstado`) VALUES
(b'0', 'Inactivo'),
(b'1', 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `factura`
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

-- --------------------------------------------------------

--
-- Table structure for table `producto`
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

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
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
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `docType`, `firstName`, `secondName`, `surname`, `secondSurname`, `indicativo`, `phone`, `correo`, `pass`, `idDireccion`, `idCiudad`, `idEstado`) VALUES
('122', '1', 'Alexis ', '', 'Luque', 'Orozco', '+57', '3196503655', 'aluque6@misena.edu.co', 'alexis123', 'D2', '01', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`,`docType`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `idCiudad` (`idCiudad`);

--
-- Indexes for table `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idCiudad`);

--
-- Indexes for table `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idDireccion`),
  ADD KEY `idEstado` (`idEstado`);

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
  ADD KEY `codigo` (`codigo`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`,`docType`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `idDireccion` (`idDireccion`),
  ADD KEY `idCiudad` (`idCiudad`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`),
  ADD CONSTRAINT `administrador_ibfk_2` FOREIGN KEY (`idCiudad`) REFERENCES `ciudad` (`idCiudad`);

--
-- Constraints for table `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`);

--
-- Constraints for table `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `producto` (`codigo`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

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
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idDireccion`) REFERENCES `direccion` (`idDireccion`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`idCiudad`) REFERENCES `ciudad` (`idCiudad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
