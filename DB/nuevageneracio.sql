-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2017 a las 19:14:07
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nuevageneracio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clipchado`
--

CREATE TABLE `clipchado` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspeccion`
--

CREATE TABLE `inspeccion` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2017_04_15_165507_add_planeacion_table', 2),
(20, '2017_04_15_171425_add_inspeccion_table', 2),
(21, '2017_04_15_171455_add_tinturada_table', 2),
(22, '2017_04_15_171520_add_planchado_table', 2),
(23, '2017_04_15_171557_add_referenciado_table', 2),
(24, '2017_04_15_171620_add_clipchado_table', 2),
(25, '2017_04_15_171747_add_prealistamient2_table', 2),
(26, '2017_04_15_204341_add_planeacion1_table', 3),
(27, '2017_04_19_131206_update_planeacion_table', 4),
(28, '2017_04_22_212441_add_proceso_general1_table', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planchado`
--

CREATE TABLE `planchado` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planeacion`
--

CREATE TABLE `planeacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero_op` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referencia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cuero_color` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suelo_color` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tallas` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad_tallas_producir` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cantidad_pares` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cliente_nombre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `salida_prealistamiento` timestamp NULL DEFAULT NULL,
  `prealistamiento_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `planeacion`
--

INSERT INTO `planeacion` (`id`, `numero_op`, `referencia`, `cuero_color`, `suelo_color`, `tallas`, `cantidad_tallas_producir`, `cantidad_pares`, `cliente_nombre`, `estado`, `created_at`, `salida_prealistamiento`, `prealistamiento_id`, `user_id`) VALUES
(1, '900', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '80', 'andres', 'salidaPre', '2017-04-25 16:51:25', '2017-04-25 17:08:52', NULL, 1),
(2, '901', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '70', 'angel', 'salidaPre', '2017-04-25 16:51:25', '2017-04-25 17:08:52', NULL, 1),
(3, '902', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '50', 'mauricio', 'salidaPre', '2017-04-25 16:51:25', '2017-04-25 17:08:52', NULL, 1),
(4, '903', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '23', 'mauricio', 'salidaPre', '2017-04-25 16:51:25', '2017-04-25 17:08:52', NULL, 1),
(5, '904', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '12', 'mauricio', 'IN', '2017-04-25 16:51:25', NULL, NULL, 1),
(6, '905', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '14', 'mauricio', 'IN', '2017-04-25 16:51:25', NULL, NULL, 1),
(7, '906', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '26', 'mauricio', 'IN', '2017-04-25 16:51:25', NULL, NULL, 1),
(8, '907', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '70', 'mauricio', 'IN', '2017-04-25 16:51:25', NULL, NULL, 1),
(9, '908', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '90', 'mauricio', 'IN', '2017-04-25 16:51:25', NULL, NULL, 1),
(10, '909', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '100', 'mauricio', 'IN', '2017-04-25 16:51:25', NULL, NULL, 1),
(11, '910', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '200', 'mauricio', 'IN', '2017-04-25 16:51:25', NULL, NULL, 1),
(12, '911', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '13', 'mauricio', 'IN', '2017-04-25 16:51:25', NULL, NULL, 1),
(13, '912', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '14', 'mauricio', 'IN', '2017-04-25 16:51:25', NULL, NULL, 1),
(14, '913', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '16', 'mauricio', 'IN', '2017-04-25 16:51:25', NULL, NULL, 1),
(15, '914', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '18', 'mauricio', 'IN', '2017-04-25 16:51:25', NULL, NULL, 1),
(16, '915', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '19', 'mauricio', 'IN', '2017-04-25 16:51:25', NULL, NULL, 1),
(17, '916', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '20', 'mauricio', 'IN', '2017-04-25 16:51:25', NULL, NULL, 1),
(18, '917', 'sw-242', 'negro', 'negro', '33-41', '33-32-33-34', '22', 'mauricio', 'IN', '2017-04-25 16:51:25', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prealistamientos`
--

CREATE TABLE `prealistamientos` (
  `id` int(10) UNSIGNED NOT NULL,
  `op` int(10) DEFAULT NULL,
  `cantidad` bigint(20) DEFAULT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `prealistamientos`
--

INSERT INTO `prealistamientos` (`id`, `op`, `cantidad`, `fecha_ingreso`, `fecha_salida`, `estado`) VALUES
(1, 1, 80, '2017-04-25 12:08:52', NULL, 'IN'),
(2, 2, 70, '2017-04-25 12:08:52', NULL, 'IN'),
(3, 3, 50, '2017-04-25 12:08:52', NULL, 'IN'),
(4, 4, 23, '2017-04-25 12:08:52', NULL, 'IN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_general`
--

CREATE TABLE `proceso_general` (
  `id` int(10) UNSIGNED NOT NULL,
  `prealistamiento_id` int(11) DEFAULT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referenciado`
--

CREATE TABLE `referenciado` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tinturada`
--

CREATE TABLE `tinturada` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@hotmail.com', '$2y$10$ZVjPxU4dW8t8kt79u4a7Aen/Skke90dxv1PG1UvfpYhakNIomMvIS', 'CnCrMP9Jc0XsX0O9lcOq56k4JyOs5Z2DyMuiSUBZcUkyx0NNpqm42pNts7bP', '2017-04-16 00:01:37', '2017-04-21 05:52:26'),
(2, 'admin1', 'admin1@hotmail.com', '$2y$10$.3IFtNSemNnMLWZSDie4Nu15f4BVH6yWEE/XImxGEYnYtZzXrx0cG', NULL, '2017-04-21 06:49:21', '2017-04-21 06:49:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clipchado`
--
ALTER TABLE `clipchado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inspeccion`
--
ALTER TABLE `inspeccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `planchado`
--
ALTER TABLE `planchado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planeacion`
--
ALTER TABLE `planeacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prealistamientos`
--
ALTER TABLE `prealistamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proceso_general`
--
ALTER TABLE `proceso_general`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `referenciado`
--
ALTER TABLE `referenciado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tinturada`
--
ALTER TABLE `tinturada`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clipchado`
--
ALTER TABLE `clipchado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inspeccion`
--
ALTER TABLE `inspeccion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `planchado`
--
ALTER TABLE `planchado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `planeacion`
--
ALTER TABLE `planeacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `prealistamientos`
--
ALTER TABLE `prealistamientos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `proceso_general`
--
ALTER TABLE `proceso_general`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `referenciado`
--
ALTER TABLE `referenciado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tinturada`
--
ALTER TABLE `tinturada`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
