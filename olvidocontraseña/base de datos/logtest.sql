-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3360
-- Tiempo de generación: 06-02-2021 a las 04:45:33
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `logtest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nit` int(11) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `dateadd` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nit`, `nombre`, `telefono`, `direccion`, `dateadd`) VALUES
(2, 74893686, 'josue', 928360950, 'av. lujan', '2021-02-04 13:36:55'),
(3, 80311427, 'Pele ', 930160524, 'av. la cultura', '2021-02-04 13:37:31'),
(4, 78945612, 'Luis Esteban Castro Zevallos', 913654782, 'av. Francisco Venegas s/n', '2021-02-04 20:47:15'),
(5, 32145678, 'Sherly Quispe Maucaylle', 957846153, 'Huayrapata', '2021-02-04 20:48:15'),
(6, 45678912, 'Yeltsin Quispe Arce', 963852741, 'Poshoccota', '2021-02-04 20:49:03'),
(7, 65478925, 'Maria Antonieta Huaraca Perez', 951623847, 'San Jeronimo', '2021-02-04 20:50:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codproducto` int(80) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` int(40) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `foto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codproducto`, `proveedor`, `descripcion`, `precio`, `cantidad`, `foto`) VALUES
(11, 3, 'usb 32 gb', 65, 10, 0x696d675f39643632323138633532393438646531623261663130376533396661643336632e6a7067),
(12, 4, 'looo', 350, 101, 0x696d675f30386539386232303230633233623930356138303232653365366234636639322e6a7067),
(13, 6, 'usb 64 gb', 36, 125, 0x696d675f37393031373862623763643234356131666533616431366234323336623138612e6a7067),
(14, 8, 'Lavador 19 kg', 1100, 11, 0x696d675f38323062623336396561343936323765313063336131343064616136383139622e6a7067),
(15, 9, 'Horno Microondas', 110, 8, 0x696d675f38333130393034343635356137323230646235396665306462666430616637352e6a7067),
(16, 8, ' Refrigeradora', 10000, 90, 0x696d675f34346339323333633561333033356537346636323366653130636638643336362e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `codproveedor` int(11) NOT NULL,
  `proveedor` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `contacto` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`codproveedor`, `proveedor`, `contacto`, `telefono`, `direccion`) VALUES
(3, 'php', 'juan carlos', 930160524, 'av.casas'),
(4, 'ACER', 'Raul Hernandez Medina', 930458963, 'av. púerto chico'),
(5, 'HYUNDAI', 'Raul Hernandez Medina', 9125478, 'av. lujan'),
(6, 'xiaomi', 'Roxana Lago Quispe', 98652147, 'av. puerto'),
(7, 'TEROS', 'Ruth Medalyd Navarro Cuaresma', 963852741, 'España'),
(8, 'LG', 'Luis Esteban Castro', 987456123, 'av. Francisco Venegas s/n'),
(9, 'BOOSCH', 'Deyvis Obed', 987321654, 'av. Francisco Venegas s/n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `forgot_pass_identity` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `forgot_pass_identity`, `created`, `modified`, `status`) VALUES
(7, 'josue', 'castro zevallos', 'josuecz990@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '928360950', 'e3d1fda3df3e22f42afbc66d103257c8', '2021-01-15 20:18:21', '2021-01-15 23:18:07', '1'),
(9, 'coshe', 'castro zevallos', 'coshe836@gmail.com', '3def184ad8f4755ff269862ea77393dd', '123', 'd7105b6790c5b9845daafb0cc95367ef', '2021-01-15 22:41:33', '2021-02-01 22:06:09', '1'),
(11, 'Josue', 'castro Zevallos', '1006620181@unajma.edu.pe', '202cb962ac59075b964b07152d234b70', '456789', 'cb9d373c716ff65590a54fe5871c75ca', '2021-01-27 23:13:19', '2021-01-27 23:20:42', '1'),
(14, 'Josue', 'Zevallos', 'abel_17_zh@hotmail.com', '202cb962ac59075b964b07152d234b70', '928360950', '', '2021-01-29 22:59:42', '2021-01-29 22:59:42', '1'),
(15, 'Josue', 'Zevallos', 'josuecz_220@hotmail.com', '202cb962ac59075b964b07152d234b70', '456789', '', '2021-01-29 23:02:40', '2021-01-29 23:02:40', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codproducto`),
  ADD KEY `proveedor` (`proveedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`codproveedor`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `codproducto` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `codproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`proveedor`) REFERENCES `proveedores` (`codproveedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
