-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2023 a las 03:30:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eggrut`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nombre`, `correo`, `telefono`, `password`, `fecha`, `rol`) VALUES
(3, 'Maria', 'user@gmail.com', '9900258789', '12345', '2022-06-11 18:30:47', 2),
(12, 'Tomas', 'tomas.res.ald@gmail.com', '3122911443', '12345678', '2023-11-24 02:21:44', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_admin_permisos`
--

CREATE TABLE `tbl_admin_permisos` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tbl_admin_permisos`
--

INSERT INTO `tbl_admin_permisos` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Lector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_auditoria`
--

CREATE TABLE `tbl_auditoria` (
  `id_auditoria` int(11) NOT NULL,
  `operacion` varchar(90) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `nuevo_nombre` varchar(20) DEFAULT NULL,
  `nuevo_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ayudante_camion`
--

CREATE TABLE `tbl_ayudante_camion` (
  `id_ayudante` varchar(20) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_camion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_camiones`
--

CREATE TABLE `tbl_camiones` (
  `id_camion` varchar(20) NOT NULL,
  `tipo_camion` varchar(50) DEFAULT NULL,
  `capacidad_camion` bigint(20) DEFAULT NULL,
  `dia_recolecta` date DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_conductor_camion`
--

CREATE TABLE `tbl_conductor_camion` (
  `id_conductor` varchar(20) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_camion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_configuracion`
--

CREATE TABLE `tbl_configuracion` (
  `id_configuracion` varchar(50) NOT NULL,
  `idioma` varchar(30) DEFAULT NULL,
  `tipo_moneda` varchar(30) DEFAULT NULL,
  `tipo_impresion` varchar(30) DEFAULT NULL,
  `iva` varchar(10) DEFAULT NULL,
  `numero_dias_password` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_finca`
--

CREATE TABLE `tbl_finca` (
  `id_campesino` varchar(20) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `cantidad_huevos` bigint(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `numero_galpones` smallint(6) DEFAULT NULL,
  `tipo_granja` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_huevos`
--

CREATE TABLE `tbl_huevos` (
  `id_huevo` varchar(20) NOT NULL,
  `tipo_huevo` varchar(30) DEFAULT NULL,
  `stock_maximo` bigint(20) DEFAULT NULL,
  `stock_minimo` varchar(5) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `cantidad_huevos` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_huevos_ventas`
--

CREATE TABLE `tbl_huevos_ventas` (
  `id_huevo` varchar(20) NOT NULL,
  `id_ventas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_intecciones`
--

CREATE TABLE `tbl_intecciones` (
  `id_interacciones` int(11) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `cantidad_compras` int(11) DEFAULT NULL,
  `fecha_compras` date DEFAULT NULL,
  `tiempo_navegacion` time DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_produccion`
--

CREATE TABLE `tbl_produccion` (
  `id_produccion` int(11) NOT NULL,
  `fecha_recolecta` datetime DEFAULT NULL,
  `precio_kg` int(11) DEFAULT NULL,
  `costo_flete` bigint(20) DEFAULT NULL,
  `huevos_recolectados` bigint(20) DEFAULT NULL,
  `peso_recolecta` bigint(20) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_camion` varchar(20) NOT NULL,
  `id_campesino` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_produccion_huevos`
--

CREATE TABLE `tbl_produccion_huevos` (
  `id_produccion` int(11) DEFAULT NULL,
  `id_huevo` varchar(20) NOT NULL,
  `precio_venta` int(11) DEFAULT NULL,
  `costo_produccion` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `contraseña` varchar(101) NOT NULL,
  `confirmar_contraseña` varchar(101) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ventas`
--

CREATE TABLE `tbl_ventas` (
  `id_ventas` int(11) NOT NULL,
  `calificacion` smallint(6) DEFAULT NULL,
  `valor_compra` bigint(20) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permisos` (`rol`);

--
-- Indices de la tabla `tbl_admin_permisos`
--
ALTER TABLE `tbl_admin_permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_auditoria`
--
ALTER TABLE `tbl_auditoria`
  ADD PRIMARY KEY (`id_auditoria`);

--
-- Indices de la tabla `tbl_ayudante_camion`
--
ALTER TABLE `tbl_ayudante_camion`
  ADD PRIMARY KEY (`id_ayudante`),
  ADD KEY `id_camion` (`id_camion`);

--
-- Indices de la tabla `tbl_camiones`
--
ALTER TABLE `tbl_camiones`
  ADD PRIMARY KEY (`id_camion`);

--
-- Indices de la tabla `tbl_conductor_camion`
--
ALTER TABLE `tbl_conductor_camion`
  ADD PRIMARY KEY (`id_conductor`),
  ADD KEY `id_camion` (`id_camion`);

--
-- Indices de la tabla `tbl_configuracion`
--
ALTER TABLE `tbl_configuracion`
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tbl_finca`
--
ALTER TABLE `tbl_finca`
  ADD PRIMARY KEY (`id_campesino`);

--
-- Indices de la tabla `tbl_huevos`
--
ALTER TABLE `tbl_huevos`
  ADD PRIMARY KEY (`id_huevo`);

--
-- Indices de la tabla `tbl_huevos_ventas`
--
ALTER TABLE `tbl_huevos_ventas`
  ADD KEY `id_huevo` (`id_huevo`),
  ADD KEY `id_ventas` (`id_ventas`);

--
-- Indices de la tabla `tbl_intecciones`
--
ALTER TABLE `tbl_intecciones`
  ADD PRIMARY KEY (`id_interacciones`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tbl_produccion`
--
ALTER TABLE `tbl_produccion`
  ADD PRIMARY KEY (`id_produccion`),
  ADD KEY `id_camion` (`id_camion`),
  ADD KEY `id_campesino` (`id_campesino`);

--
-- Indices de la tabla `tbl_produccion_huevos`
--
ALTER TABLE `tbl_produccion_huevos`
  ADD KEY `id_produccion` (`id_produccion`),
  ADD KEY `id_huevo` (`id_huevo`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `tbl_ventas`
--
ALTER TABLE `tbl_ventas`
  ADD PRIMARY KEY (`id_ventas`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_admin_permisos`
--
ALTER TABLE `tbl_admin_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_auditoria`
--
ALTER TABLE `tbl_auditoria`
  MODIFY `id_auditoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_intecciones`
--
ALTER TABLE `tbl_intecciones`
  MODIFY `id_interacciones` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_produccion`
--
ALTER TABLE `tbl_produccion`
  MODIFY `id_produccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_ventas`
--
ALTER TABLE `tbl_ventas`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `permisos` FOREIGN KEY (`rol`) REFERENCES `tbl_admin_permisos` (`id`);

--
-- Filtros para la tabla `tbl_ayudante_camion`
--
ALTER TABLE `tbl_ayudante_camion`
  ADD CONSTRAINT `tbl_ayudante_camion_ibfk_1` FOREIGN KEY (`id_camion`) REFERENCES `tbl_camiones` (`id_camion`);

--
-- Filtros para la tabla `tbl_conductor_camion`
--
ALTER TABLE `tbl_conductor_camion`
  ADD CONSTRAINT `tbl_conductor_camion_ibfk_1` FOREIGN KEY (`id_camion`) REFERENCES `tbl_camiones` (`id_camion`);

--
-- Filtros para la tabla `tbl_configuracion`
--
ALTER TABLE `tbl_configuracion`
  ADD CONSTRAINT `tbl_configuracion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`);

--
-- Filtros para la tabla `tbl_huevos_ventas`
--
ALTER TABLE `tbl_huevos_ventas`
  ADD CONSTRAINT `tbl_huevos_ventas_ibfk_1` FOREIGN KEY (`id_huevo`) REFERENCES `tbl_huevos` (`id_huevo`),
  ADD CONSTRAINT `tbl_huevos_ventas_ibfk_2` FOREIGN KEY (`id_ventas`) REFERENCES `tbl_ventas` (`id_ventas`);

--
-- Filtros para la tabla `tbl_intecciones`
--
ALTER TABLE `tbl_intecciones`
  ADD CONSTRAINT `tbl_intecciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`);

--
-- Filtros para la tabla `tbl_produccion`
--
ALTER TABLE `tbl_produccion`
  ADD CONSTRAINT `tbl_produccion_ibfk_1` FOREIGN KEY (`id_camion`) REFERENCES `tbl_camiones` (`id_camion`),
  ADD CONSTRAINT `tbl_produccion_ibfk_2` FOREIGN KEY (`id_campesino`) REFERENCES `tbl_finca` (`id_campesino`);

--
-- Filtros para la tabla `tbl_produccion_huevos`
--
ALTER TABLE `tbl_produccion_huevos`
  ADD CONSTRAINT `tbl_produccion_huevos_ibfk_1` FOREIGN KEY (`id_produccion`) REFERENCES `tbl_produccion` (`id_produccion`),
  ADD CONSTRAINT `tbl_produccion_huevos_ibfk_2` FOREIGN KEY (`id_huevo`) REFERENCES `tbl_huevos` (`id_huevo`);

--
-- Filtros para la tabla `tbl_ventas`
--
ALTER TABLE `tbl_ventas`
  ADD CONSTRAINT `tbl_ventas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
