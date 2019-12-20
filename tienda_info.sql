-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2019 a las 18:44:35
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_info`
--
CREATE DATABASE IF NOT EXISTS `tienda_info` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `tienda_info`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(6, 'Monitores'),
(7, 'Teclados'),
(8, 'Mouses'),
(9, 'CPUs'),
(10, 'UPS'),
(11, 'Impresoras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_departamento`) VALUES
(1, 'Ahuachapán'),
(2, 'Cabañas'),
(3, 'Chalatenango'),
(4, 'Cuscatlán'),
(5, 'La Libertad'),
(6, 'La Paz'),
(7, 'La Unión'),
(8, 'Morazán'),
(9, 'San Miguel'),
(10, 'San Salvador'),
(11, 'San Vicente'),
(12, 'Santa Ana'),
(13, 'Sonsonate'),
(14, 'Usulután');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `sub_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_venta`, `id_producto`, `cantidad`, `sub_total`) VALUES
(7, 22, 1, 1200.99),
(7, 10, 2, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre_estado`) VALUES
(1, 'Reservado'),
(2, 'Cancelado'),
(3, 'Vendido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre_marca`) VALUES
(10, 'Lenovo'),
(11, 'Dell'),
(12, 'HP'),
(13, 'Samsung'),
(14, 'LG'),
(15, 'Epson'),
(16, 'Canon'),
(17, 'Apc'),
(18, 'Mega'),
(19, 'Forza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `especificacion` text COLLATE utf8_spanish_ci NOT NULL,
  `precio_venta` double NOT NULL,
  `precio_compra` double NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `descripcion`, `especificacion`, `precio_venta`, `precio_compra`, `stock`, `imagen`, `id_categoria`, `id_marca`, `id_proveedor`) VALUES
(1, 'CPU HP ', ' CPU 1 HP 8300 Intel i7 3770 3.4GHz 8GB Ram 250 unidad de disco duro SSD 1TB Wifi', 1000, 600, 20, 'props/img/cpu1.png', 9, 12, 2),
(2, 'CPU 2 INTEL', ' CPU 2 INTEL I7 DE OCTV GENERACION 24 GB RAM', 1200, 660, 20, 'props/img/cpu2.png', 9, 14, 3),
(3, 'CPU 3 Ryzen', 'CPU 3 Ryzen 3 3200G Ryzen 5 3400G y resto de procesadores Ryzen 3000', 1300, 700, 20, 'props/img/cpu3.png', 9, 13, 4),
(4, 'CPU 5 Intel', 'CPU 5 Intel Pentium Gold G5400  8 GB S Intel UHD Graphics 610  SSD 240 GB', 1500, 700, 20, 'props/img/cpu4.png', 9, 13, 5),
(5, 'Impresora CanoN color Negro Sencilla', 'IMPRESORA CANON Impresora multifunción 2134 110V 220V Bivolt', 100, 50, 20, 'props/img/imp1.png', 11, 16, 6),
(6, 'Impresora Color Negro Marca Canon Multifuncion', 'IMPRESORA CANON Impresora  Ink Tank 115 Conector negro Imprimir  Hasta 19 ppm', 300, 150, 20, 'props/img/imp4.png', 11, 16, 2),
(7, 'Impresora Epson Color Negro Multifunciones', 'IMPRESORA Epson Impresora multifunción  G1100 220V Imprime a color Tecnología inyección de tinta\r\nCuenta con entrada USB\r\n', 300, 150, 20, 'props/img/imp3.png', 11, 15, 3),
(8, 'Impresora Epson Color Negro 3 en 1', 'IMPRESORA EPSON Impresora Multifuncional  Smart Tank 519\r\nImpremir escanear copiar', 200, 100, 20, 'props/img/imp2.png', 11, 15, 4),
(9, 'Mouse Marca Mega color Negro con luz LED azul', 'Mouse Gamer Mega NA-631 RF Inalámbrico 1600DPI Negro', 30, 10, 20, 'props/img/mouse4.png', 8, 18, 5),
(10, 'Mouse LG LED color rojo', 'Mouse Gamer LG Óptico M5 RGB Alámbrico USB 16 000DPI Rojo AORUS M5 Tecnología de detección de movimientos', 30, 10, 18, 'props/img/mouse3.png', 8, 14, 6),
(11, 'Mouse Mega Color Negro Con case de Calabera ', 'Mouse Gamer Mega Óptico Abyssus Essential Alámbrico USB 7200DPI Negro', 25, 12, 20, 'props/img/mouse1.png', 8, 18, 5),
(12, 'Mouse Gamer LG con LED multi color Y un indio', 'Mouse Gamer LG Óptico NA-632  Mousepad Alámbrico USB 1200DPI Multicolor ', 30, 12, 20, 'props/img/mouse2.png', 8, 14, 6),
(13, 'Teclado Gamer Mega color negro con teclas rojas ', 'Teclado para pc MEGA Naceb Scorpius Jaiter negro con luz RGB Teclado para pc QWERTY Naceb Scorpius Jaiter Red español españa negro con luz RGB', 60, 30, 20, 'props/img/teclado1.png', 7, 18, 2),
(15, 'Teclado Marca Mega mecanino gamer color negro con LED multi color', 'Teclado para pc QWERTY XPG Infarex K20 Kailh Blue inglés US negro mate con luz roja naranja amarilla verde azul y púrpura', 50, 25, 20, 'props/img/teclado4.png', 7, 18, 4),
(16, 'Teclado Marca LG mecanino gamer color negro con LED multi color', 'Teclado para pc QWERTY Logitech G413 Romer G inglés US carbón con luz roja', 50, 25, 20, 'props/img/teclado3.png', 7, 14, 5),
(17, 'Forza color negro capacidad 500VA/250w', 'NT 511 Capacity  500VA 250W Topology Interactive Output VA  500 VA Outlets 6 x NEMA 5-15R Form Factor  Compact tower Waveform Simulated sine wave', 25, 15, 20, 'props/img/ups4.png', 10, 19, 2),
(18, 'Forza color negro 1000w', 'Mustek PowerMust 1000 LCD Line Int IEC  Schuko El excelente control por microprocesador garantiza una alta confiabilidad Impulse y reduzca el AVR para estabilizar el voltaje', 100, 50, 20, 'props/img/ups3.png', 10, 19, 3),
(19, 'APC color negro voltaje 230v y pantalla LED', 'APC Smart UPS SRT 1000VA RM 230V Network Card Entrada de voltaje 230V Variación de tensión de entrada para operaciones principales 50-150 40% Load 80  150V', 120, 40, 20, 'props/img/ups2.png', 10, 17, 4),
(20, 'APC color negro con pantalla LED 3000VA', 'APC Smart UPS SRT 3000VA 120V Protección de energía online de alta densidad y doble conversión con autonomía escalable', 150, 60, 20, 'props/img/ups1.png', 10, 17, 5),
(21, 'Monitor BenQ GW2280', 'Monitor BenQ GW2280 LED 21.5 negro 110V/220V (Bivolt)', 1456.95, 700.45, 20, 'props/img/pantalla1.png', 6, 11, 5),
(22, 'Monitor Dell P2319H LED 23 negro', 'Monitor Dell P2319H LED 23 negro 110V/220V (Bivolt). Tiene una resolución de 1920px-1080px. Conexiones del monitor: DisplayPort, DVI-D, HDMI.', 1200.99, 854, 19, 'props/img/pantalla2.png', 6, 11, 2),
(23, 'Monitor HP 23er de 23 pulgadas', 'El HP 23er es un monitor de 58,4 cm (23 pulgadas). Hasta 16,7 millones de colores con el uso de la tecnología FRC. 1 VGA\r\n1 HDMI', 1600, 954, 20, 'props/img/pantalla3.png', 6, 12, 2),
(24, 'Monitor LED LG Serie E42', 'Mega Contraste, Imágenes mas claras y brillantes\r\nSUPER Ahorro de Energia, un 30 porciento mas que un monitor convencional\r\nOrganizador de cables', 999.99, 754, 20, 'props/img/pantalla4.png', 6, 14, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `apellido`, `telefono`) VALUES
(2, 'Peter', 'Griffin', '2277-9896'),
(3, 'Bob', 'Burgers', '2555-4444'),
(4, 'Homero', 'Simpson', '2233-5410'),
(5, 'Pedro', 'Picapiedra', '2369-9856'),
(6, 'Don', 'Cangrejo', '2456-9874'),
(7, 'verde', 'rojo', '2222-2222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL,
  `nombre_sexo` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `nombre_sexo`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `id_tipo_pago` int(11) NOT NULL,
  `nombre_tipo_pago` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_pago`
--

INSERT INTO `tipo_pago` (`id_tipo_pago`, `nombre_tipo_pago`) VALUES
(1, 'credito'),
(2, 'contado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `id_sexo` int(11) NOT NULL,
  `id_departamento` int(11) DEFAULT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_cliente`, `nombre`, `apellido`, `correo`, `telefono`, `direccion`, `usuario`, `clave`, `id_sexo`, `id_departamento`, `id_rol`) VALUES
(1, 'Michael', 'Jackson', 'mjackson_1@hotmail.com', '7945-6213', 'pasaje san cristobal #2546', 'mike', 'f43b530bdce2a6fc55d7c0372d0fc5d0', 1, 1, 3),
(5, 'Yamileth', 'Chavarria', 'yamy503@gmail.com', '7823-4456', 'Residecia Via Olimpica', 'yami', '7cf59a34c69c2d85a07dbde0689db0be', 2, 4, 3),
(6, 'Javier', 'Henriquez', 'javier@gmail.com', '7121-0006', 'por ahi', 'javier', '0a88df971c6a632af7d1dbc5fe4ec932', 1, 1, 3),
(12, 'Erika', 'Galdamez', 'gabrielahello96@gmail.com', '2323-3456', 'Apopa', 'erika', '18fc943039d22650081597024ed6b7b4', 2, 1, 1),
(13, 'Luis', 'Gomez', 'luis@gmail.com', '2323-3445', 'San Salvador', 'luis', '0b8ed8824647fd013a99a734ca44393f', 1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `n_factura` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_tipo_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `n_factura`, `fecha`, `id_estado`, `id_cliente`, `id_tipo_pago`) VALUES
(7, 4303, '2019-12-16', 3, 5, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD KEY `detalle_venta_producto` (`id_producto`),
  ADD KEY `detalle_venta_venta` (`id_venta`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `producto_categoria` (`id_categoria`),
  ADD KEY `producto_marca` (`id_marca`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`id_tipo_pago`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `cliente_pais` (`id_departamento`) USING BTREE,
  ADD KEY `cliente_rol` (`id_rol`) USING BTREE,
  ADD KEY `id_sexo` (`id_sexo`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `venta_cliente` (`id_cliente`) USING BTREE,
  ADD KEY `venta_estado` (`id_estado`),
  ADD KEY `venta_pago` (`id_tipo_pago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  MODIFY `id_tipo_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`),
  ADD CONSTRAINT `producto_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`),
  ADD CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_tipo_pago`) REFERENCES `tipo_pago` (`id_tipo_pago`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
