-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 13-02-2024 a les 16:52:57
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
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `resena` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idUsr`, `precioTotal`, `fecha`, `resena`) VALUES
(11, 1, '25.87', '2024-01-23 18:43:05', 2),
(12, 1, '11.00', '2024-01-23 18:43:43', 1),
(13, 1, '12.98', '2024-01-23 18:44:26', 10);

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
(11, 13, 1, 1, '10.99');

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
(1, 'iker', 'c', 'iker@gmail.com', '1234', 0, 289),
(5, 'iker', 'c', '123@dww', '1234', 0, 0),
(7, 'iker69', 'c', '123@dww', '123', 0, 199),
(8, 'iker3', 'c', '123@dww', '123', 0, 0),
(9, 'iker3', 'c', '123@dww', '123', 0, 0),
(10, 'iker3', 'c', '123@dww', '123', 0, 0),
(11, 'iker3', 'c', '123@dww', '123', 0, 0),
(12, 'iker3', 'c', '123@dww', '123', 0, 0),
(13, '123', 'c', '123@123', '123', 0, 296),
(15, 'iker', 'canda', 'iker@123.com', '123', 0, 0);

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
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la taula `pedidos_articulos`
--
ALTER TABLE `pedidos_articulos`
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
