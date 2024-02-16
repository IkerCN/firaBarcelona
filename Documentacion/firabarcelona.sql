-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 16-02-2024 a les 22:37:37
-- Versió del servidor: 10.4.22-MariaDB
-- Versió de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `firabarcelona`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'Menus'),
(2, 'Individuales'),
(3, 'Entrantes'),
(4, 'Bebidas'),
(5, 'Postres');

-- --------------------------------------------------------

--
-- Estructura de la taula `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `idUsr` int(11) NOT NULL,
  `precioTotal` decimal(10,2) NOT NULL,
  `propina` varchar(4) DEFAULT NULL,
  `totalConPropina` decimal(10,2) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `resena` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idUsr`, `precioTotal`, `propina`, `totalConPropina`, `fecha`, `resena`) VALUES
(11, 1, '25.87', NULL, NULL, '2024-01-23 18:43:05', 2),
(12, 1, '11.00', NULL, NULL, '2024-01-23 18:43:43', 1),
(13, 1, '12.98', NULL, NULL, '2024-01-23 18:44:26', 10),
(14, 13, '1.99', NULL, NULL, '2024-02-13 17:06:45', NULL),
(15, 13, '1.99', NULL, NULL, '2024-02-13 17:20:55', NULL),
(21, 1, '1.99', '3%', '2.05', '2024-02-16 16:17:31', NULL),
(23, 1, '8.98', '3%', '9.25', '2024-02-16 16:44:19', NULL),
(24, 1, '1.99', '3%', '2.05', '2024-02-16 16:47:27', NULL),
(29, 1, '1.99', '3%', '2.05', '2024-02-16 17:25:26', NULL),
(30, 1, '1.99', '0%', '1.99', '2024-02-16 17:26:36', NULL),
(31, 1, '6.99', '0%', '6.99', '2024-02-16 17:28:08', NULL),
(32, 1, '1.99', '0%', '1.99', '2024-02-16 17:31:57', NULL),
(33, 1, '1.99', '3%', '2.05', '2024-02-16 17:36:21', NULL),
(34, 1, '6.99', '3%', '7.20', '2024-02-16 17:40:01', NULL),
(35, 1, '6.99', '3%', '7.20', '2024-02-16 17:40:31', NULL),
(36, 1, '6.99', '3%', '7.20', '2024-02-16 17:43:15', NULL),
(37, 1, '1.99', '3%', '2.05', '2024-02-16 17:43:43', NULL),
(38, 1, '1.99', '3%', '2.05', '2024-02-16 17:48:11', NULL),
(39, 1, '2.50', '3%', '2.58', '2024-02-16 17:50:02', NULL),
(40, 1, '1.99', '3%', '2.05', '2024-02-16 17:51:46', NULL),
(41, 1, '6.99', '3%', '7.20', '2024-02-16 17:52:05', NULL),
(42, 1, '1.99', '3%', '2.05', '2024-02-16 17:52:45', NULL),
(43, 15, '1.99', '3%', '2.05', '2024-02-16 20:38:12', NULL),
(44, 15, '1.99', '3%', '2.05', '2024-02-16 20:39:31', NULL),
(45, 15, '1.99', '3%', '2.05', '2024-02-16 20:51:16', NULL),
(46, 15, '6.99', '3%', '7.20', '2024-02-16 20:51:55', NULL),
(47, 15, '1.99', '3%', '2.05', '2024-02-16 20:56:40', NULL),
(48, 15, '1.99', '3%', '2.05', '2024-02-16 20:57:46', NULL),
(49, 15, '1.50', '3%', '1.54', '2024-02-16 21:03:11', NULL),
(50, 15, '1.99', '3%', '2.05', '2024-02-16 21:05:51', NULL),
(51, 15, '1.99', '3%', '2.05', '2024-02-16 21:06:27', NULL),
(52, 15, '1.99', '3%', '2.05', '2024-02-16 21:06:54', NULL),
(53, 15, '1.99', '3%', '2.05', '2024-02-16 21:07:57', NULL),
(54, 15, '6.99', '3%', '7.20', '2024-02-16 21:08:19', NULL),
(55, 15, '6.99', '3%', '7.20', '2024-02-16 21:17:15', NULL),
(56, 15, '6.99', '3%', '7.20', '2024-02-16 21:19:42', NULL),
(57, 15, '6.99', '3%', '7.20', '2024-02-16 21:28:35', NULL),
(58, 15, '6.99', '3%', '7.20', '2024-02-16 21:31:08', NULL),
(59, 15, '6.99', '3%', '7.20', '2024-02-16 21:34:00', NULL),
(60, 15, '6.99', '3%', '7.20', '2024-02-16 21:34:35', NULL),
(61, 15, '1.99', '3%', '2.05', '2024-02-16 21:35:19', NULL),
(62, 15, '1.99', '3%', '2.05', '2024-02-16 21:55:06', NULL),
(63, 15, '1.99', '3%', '2.05', '2024-02-16 22:02:13', NULL),
(64, 15, '1.99', '3%', '2.05', '2024-02-16 22:07:48', NULL);

-- --------------------------------------------------------

--
-- Estructura de la taula `pedidos_articulos`
--

CREATE TABLE `pedidos_articulos` (
  `idArticulo` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioUnidad` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `pedidos_articulos`
--

INSERT INTO `pedidos_articulos` (`idArticulo`, `idPedido`, `idProducto`, `cantidad`, `precioUnidad`) VALUES
(6, 11, 15, 13, '25.87'),
(7, 12, 4, 2, '3.00'),
(8, 12, 2, 2, '3.00'),
(9, 12, 3, 2, '5.00'),
(10, 13, 10, 1, '1.99'),
(11, 13, 1, 1, '10.99'),
(12, 14, 15, 1, '1.99'),
(13, 15, 15, 1, '1.99'),
(16, 23, 15, 1, '1.99'),
(17, 23, 13, 1, '6.99'),
(18, 24, 15, 1, '1.99'),
(23, 29, 15, 1, '1.99'),
(24, 30, 15, 1, '1.99'),
(25, 31, 13, 1, '6.99'),
(26, 32, 15, 1, '1.99'),
(27, 33, 10, 1, '1.99'),
(28, 34, 13, 1, '6.99'),
(29, 35, 13, 1, '6.99'),
(30, 36, 13, 1, '6.99'),
(31, 37, 15, 1, '1.99'),
(32, 38, 15, 1, '1.99'),
(33, 39, 3, 1, '2.50'),
(34, 40, 15, 1, '1.99'),
(35, 41, 13, 1, '6.99'),
(36, 42, 15, 1, '1.99'),
(37, 43, 15, 1, '1.99'),
(38, 44, 15, 1, '1.99'),
(39, 45, 15, 1, '1.99'),
(40, 46, 13, 1, '6.99'),
(41, 47, 15, 1, '1.99'),
(42, 48, 10, 1, '1.99'),
(43, 49, 2, 1, '1.50'),
(44, 50, 15, 1, '1.99'),
(45, 51, 15, 1, '1.99'),
(46, 52, 15, 1, '1.99'),
(47, 53, 15, 1, '1.99'),
(48, 54, 13, 1, '6.99'),
(49, 55, 13, 1, '6.99'),
(50, 56, 13, 1, '6.99'),
(51, 57, 13, 1, '6.99'),
(52, 58, 13, 1, '6.99'),
(53, 59, 13, 1, '6.99'),
(54, 60, 13, 1, '6.99'),
(55, 61, 15, 1, '1.99'),
(56, 62, 15, 1, '1.99'),
(57, 63, 15, 1, '1.99'),
(58, 64, 15, 1, '1.99');

-- --------------------------------------------------------

--
-- Estructura de la taula `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `precio` double(10,2) NOT NULL,
  `imgProducto` varchar(30) DEFAULT NULL,
  `conAlcohol` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `productos`
--

INSERT INTO `productos` (`idProducto`, `nombre`, `idCategoria`, `precio`, `imgProducto`, `conAlcohol`) VALUES
(1, 'Menú pizza', 1, 10.99, 'menu-pizza.jpg', 0),
(2, 'Galletas con chocolate', 5, 1.50, 'galletas.jpg', 0),
(3, 'Montadito de Tortilla', 3, 2.50, 'montadito-tortilla.jpg', 0),
(4, 'Refresco de cola', 4, 1.50, 'cocacola.jpg', 0),
(5, 'Bocata de jamón y queso', 2, 4.99, 'bocata-jamon.jpg', 0),
(6, 'Menú alitas', 1, 8.99, 'menu-alitas.jpg', 0),
(7, 'Menú desayuno', 1, 4.50, 'menu-desayuno.jpg', 0),
(8, 'Hamburguesa de vaca', 2, 4.50, 'hamburgesa-vaca.jpg', 0),
(9, 'Burrito de pollo con verduras', 2, 3.99, 'burrito.jpg', 0),
(10, 'Ensalada de pepino y tomate', 3, 1.99, 'ensalada.jpg', 0),
(11, 'Menú hamburguesa', 1, 10.50, 'menu-hamburgesa.jpg', 0),
(13, 'Menú warp', 1, 6.99, 'menu-warp.jpg', 0),
(15, 'Cerveza', 4, 1.99, 'cerveza.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `resenas`
--

CREATE TABLE `resenas` (
  `idResena` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `idUsr` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `txtResena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `resenas`
--

INSERT INTO `resenas` (`idResena`, `idPedido`, `idUsr`, `nota`, `txtResena`) VALUES
(1, 12, 1, 3, 'Iba a hacer una cena romántica, pero a la chica con la que quede no le hizo gracia que llevara la cena a donde quedamos (se pensó que íbamos a un restaurante xD).\r\n\r\nLa comida estaba bien.'),
(2, 11, 1, 5, 'Noche de tranquis en verdad compramos mas pero fue culpa de que lo calculamos mal, suerte que el amigo con el que quedé tenia contactos.'),
(10, 13, 1, 4, 'Estaba muy bueno que ganas de otra feria pronto');

-- --------------------------------------------------------

--
-- Estructura de la taula `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsr` int(100) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(25) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `usuarios`
--

INSERT INTO `usuarios` (`idUsr`, `nombre`, `apellido`, `email`, `password`, `admin`, `puntos`) VALUES
(1, 'iker', 'c', 'iker@gmail.com', '1234', 0, 199),
(5, 'iker', 'c', '123@dww', '1234', 0, 0),
(7, 'iker69', 'c', '123@dww', '123', 0, 199),
(8, 'iker3', 'c', '123@dww', '123', 0, 0),
(9, 'iker3', 'c', '123@dww', '123', 0, 0),
(10, 'iker3', 'c', '123@dww', '123', 0, 0),
(11, 'iker3', 'c', '123@dww', '123', 0, 0),
(12, 'iker3', 'c', '123@dww', '123', 0, 0),
(13, '123', 'c', '123@123', '123', 0, 398),
(15, 'iker', 'canda', 'iker@123.com', '123', 0, 696);

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índexs per a la taula `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

--
-- Índexs per a la taula `pedidos_articulos`
--
ALTER TABLE `pedidos_articulos`
  ADD PRIMARY KEY (`idArticulo`),
  ADD KEY `FKidPedidosPDBpedidos_articulos` (`idPedido`),
  ADD KEY `FKidProductoPDBpedidos_articulos` (`idProducto`);

--
-- Índexs per a la taula `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `FKidCategoriaDBproductos` (`idCategoria`);

--
-- Índexs per a la taula `resenas`
--
ALTER TABLE `resenas`
  ADD PRIMARY KEY (`idResena`);

--
-- Índexs per a la taula `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsr`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la taula `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT per la taula `pedidos_articulos`
--
ALTER TABLE `pedidos_articulos`
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT per la taula `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la taula `resenas`
--
ALTER TABLE `resenas`
  MODIFY `idResena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la taula `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsr` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `FKidUsrDBusuarios` FOREIGN KEY (`idUsr`) REFERENCES `usuarios` (`idUsr`);

--
-- Restriccions per a la taula `pedidos_articulos`
--
ALTER TABLE `pedidos_articulos`
  ADD CONSTRAINT `FKidPedidosPDBpedidos_articulos` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`idPedido`),
  ADD CONSTRAINT `FKidProductoPDBpedidos_articulos` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`);

--
-- Restriccions per a la taula `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `FKidCategoriaDBproductos` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
