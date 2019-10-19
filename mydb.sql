-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2019 a las 02:25:05
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobro`
--

CREATE TABLE `cobro` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_sus` int(11) NOT NULL,
  `tarjeta` int(11) NOT NULL,
  `vencimiento` int(11) NOT NULL,
  `atras` int(11) NOT NULL,
  `iniciosusc` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cobro`
--

INSERT INTO `cobro` (`id`, `id_users`, `id_sus`, `tarjeta`, `vencimiento`, `atras`, `iniciosusc`) VALUES
(2, 1, 1, 123456789, 120, 123, '2019-10-16 19:38:22'),
(3, 1, 1, 987654321, 1520, 987, '2019-10-16 19:38:22'),
(4, 10, 3, 963852741, 1219, 963, '2019-10-16 19:38:22'),
(5, 11, 2, 789456123, 1420, 123, '2019-10-16 19:38:22'),
(26, 13, 2, 2147483647, 1820, 852, '0000-00-00 00:00:00'),
(27, 9, 2, 15140108, 2621, 365, '2019-10-17 17:29:14'),
(28, 11, 3, 741852963, 220, 123, '2019-10-18 18:13:43'),
(29, 11, 2, 896574123, 1821, 357, '2019-10-18 18:23:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_posts` int(11) NOT NULL,
  `Contenido` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `vecesreporte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_users`, `id_posts`, `Contenido`, `created_at`, `vecesreporte`) VALUES
(6, 7, 16, 'Buenas canciones', '0000-00-00 00:00:00', 5),
(7, 1, 9, 'Buen articulo', '2019-10-09 20:52:06', 2),
(8, 9, 13, 'Me gustó mucho', '2019-10-09 20:52:06', 0),
(9, 7, 9, 'No me gusto mucho', '2019-10-09 20:52:51', 7),
(10, 1, 13, 'No me gusto', '2019-10-09 20:52:51', 8);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `modartc`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `modartc` (
`Titulo` varchar(255)
,`Autor` varchar(255)
,`Contenido` text
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `modcomment`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `modcomment` (
`Usuarios` varchar(255)
,`Comentarios` varchar(255)
,`Titulo Articulo` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moderacion`
--

CREATE TABLE `moderacion` (
  `id` int(11) NOT NULL,
  `id_comment` int(11) DEFAULT NULL,
  `id_posts` int(11) DEFAULT NULL,
  `censurar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `moderacion`
--

INSERT INTO `moderacion` (`id`, `id_comment`, `id_posts`, `censurar`) VALUES
(1, NULL, 17, 1),
(2, NULL, 21, 0),
(3, 9, NULL, 1),
(4, 10, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_subtopic` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `image` blob NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `plantilla` int(11) NOT NULL,
  `premium` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `id_subtopic`, `title`, `slug`, `views`, `image`, `body`, `published`, `created_at`, `updated_at`, `plantilla`, `premium`) VALUES
(9, 1, 4, 'Nadadores olimpicos', 'Olimpiadas de natacion', 10, '', 'Olimpiadas de natacion seran en 10 dias', 1, '2019-10-14 22:34:37', '2019-10-09 20:38:26', 0, 1),
(10, 9, 5, 'Header', 'Header para html', 9, '', 'Crea un header usando html', 1, '2019-10-18 20:54:01', '2019-10-09 20:55:42', 1, 0),
(11, 7, 6, 'Baladas', 'Baladas para escuchar', 6, '', 'Listado de baladas para escuchar', 1, '2019-10-18 20:54:04', '2019-10-09 23:00:53', 2, 1),
(12, 8, 7, 'Meditacion diaria', 'Tiempo de reflexion', 8, '', 'Meditaciones para reflexionar ', 1, '2019-10-09 23:00:53', '2019-10-09 23:00:53', 0, 0),
(13, 9, 8, 'Faciales', 'Mascarillas ', 9, '', 'Mascarillas para el cuidado de la piel', 1, '2019-10-14 22:34:44', '2019-10-09 23:05:07', 0, 1),
(14, 1, 9, 'Arte abstracto', 'Inspiracion en la naturaleza', 7, '', 'Arte abstracto inspirado de la naturaleza', 1, '2019-10-09 23:05:07', '2019-10-09 23:05:07', 0, 0),
(15, 1, 4, 'Vestimenta', 'Trajes adecuados', 6, '', 'Kit de un nadador', 0, '2019-10-14 22:34:49', '2019-10-09 23:08:11', 0, 1),
(16, 9, 6, 'Top 10', 'Ultimas canciones', 4, '', 'Top diez de canciones mas escuchadas', 1, '2019-10-09 23:08:11', '2019-10-09 23:08:11', 0, 0),
(17, 7, 5, 'Nav', 'Aprende a navegar', 5, '', 'Utiliza nav para navegar en tu html', 1, '2019-10-14 22:34:52', '2019-10-09 23:09:56', 0, 1),
(18, 8, 7, 'Meditacion nocturna', 'Medita al finalizar el dia', 11, '', 'Meditaciones para antes de ir a dormir', 1, '2019-10-09 23:09:56', '2019-10-09 23:09:56', 0, 0),
(19, 1, 11, 'Insert', 'Insertar campos ', 2, '', 'Insertar campos usando php', 0, '2019-10-18 15:03:45', '2019-10-09 23:22:56', 0, 1),
(20, 9, 10, 'Mejores jugadores', 'Jugadores destacados', 10, '', 'Mejores jugadores de futbol', 1, '2019-10-09 23:22:56', '2019-10-09 23:22:56', 0, 0),
(21, 1, 10, 'Goles', 'Goles de temporada', 9, '', 'Los mejores goles de la temporada', 1, '2019-10-14 22:35:01', '2019-10-09 23:24:21', 0, 1),
(22, 9, 9, 'Picasso ', 'Mejores obras de Picasso', 5, '', 'Obras de Picasso ', 1, '2019-10-12 00:27:42', '2019-10-09 23:24:21', 0, 0),
(23, 7, 6, 'Musica latina', 'Canciones con ritmo', 12, '', 'Las mejores canciones con ritmo latino', 1, '2019-10-14 22:35:05', '2019-10-10 02:06:13', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subtopic`
--

CREATE TABLE `subtopic` (
  `id` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `plantilla` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subtopic`
--

INSERT INTO `subtopic` (`id`, `id_topic`, `nombre`, `plantilla`, `descripcion`) VALUES
(4, 4, 'Natacion', 0, 'Un deporte de agua '),
(5, 7, 'Dise&ntilde;o', 1, 'Dise&ntilde;o para web'),
(6, 2, 'Canciones', 0, 'La musica que te inspira y motiva '),
(7, 1, 'Meditaciones', 1, 'Tiempo de reflexion'),
(8, 6, 'Mujeres', 0, 'Cuidado personal femenino'),
(9, 1, 'Arte', 1, 'Expresión artística '),
(10, 4, 'Futbol', 0, 'Jugadores, partidos y los mejores goles'),
(11, 7, 'Php', 1, 'Todo en desarrollo de php'),
(12, 3, 'Ultima hora', 0, 'noticias de ultima hora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `suscripcion`
--

INSERT INTO `suscripcion` (`id`, `tipo`, `descripcion`, `costo`) VALUES
(1, 'Semestral', 'Pago cada seis meses', 250),
(2, 'Anual', 'Pago cada a&ntilde;o', 450),
(3, 'Mensual', 'Pago cada mes', 100);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `tenlast`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `tenlast` (
`title` varchar(255)
,`username` varchar(255)
,`slug` varchar(255)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `topics`
--

INSERT INTO `topics` (`id`, `name`, `slug`) VALUES
(1, 'Inspiracion', 'Busca la inspiracion necesaria en tu vida'),
(2, 'Motivacion', 'Con la motivacion adecuada todo es mejor!'),
(3, 'Diario', 'Dia a dia, como la realidad es'),
(4, 'Deportes', 'Siempre activo en el deporte, con las mejores jugadas del momento'),
(6, 'Salud', 'Para una buena salud lee los siguientes tips'),
(7, 'Web', 'Todo lo relacionado con la web');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Author','Admin','Lector','Moderador') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` longblob NOT NULL,
  `suscripcion` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `username`, `email`, `role`, `password`, `created_at`, `updated_at`, `foto`, `suscripcion`) VALUES
(1, '', '', 'Kevin', 'champs@example.com', 'Admin', '0b146c2ad5f162a04d4b48c5e1b3d26a', '2018-01-08 18:52:58', '2018-01-08 18:52:58', '', 1),
(7, '', '', 'Alex', 'alex@gmail.com', 'Admin', 'f688ae26e9cfa3ba6235477831d5122e', '2019-10-07 07:58:27', '2019-10-07 07:58:27', '', 1),
(8, 'Champs', '', 'champs', 'champs@gmail', 'Author', 'd41d8cd98f00b204e9800998ecf8427e', '2019-10-07 15:25:44', '2019-10-07 15:25:44', '', 1),
(9, 'Elisa', 'Monzon', 'elisammg', 'elisammg1@gmail.com', 'Admin', '9450476b384b32d8ad8b758e76c98a69', '2019-10-09 20:51:13', NULL, '', 1),
(10, 'Margarita', 'Monzon', 'mmonzon', 'mmonzon@gmail.com', 'Lector', '05d2881736a4d736df1f34dc83442287', '2019-10-11 17:38:12', '2019-10-11 17:38:12', '', 0),
(11, 'Mary', 'Fern', 'maryfer', 'maria@gmail.com', 'Lector', '9450476b384b32d8ad8b758e76c98a69', '2019-10-14 02:03:22', '2019-10-14 02:03:22', '', 0),
(12, 'Joselito', 'Paco', 'josepaco', 'joselitopaco@gmail.com', 'Lector', '4d186321c1a7f0f354b297e8914ab240', '2019-10-14 02:40:28', '2019-10-14 02:40:28', '', 0),
(13, 'Juanito', 'Paul', 'juanpaul', 'juan@gmail.com', 'Lector', '9450476b384b32d8ad8b758e76c98a69', '2019-10-14 04:16:15', '2019-10-14 04:16:15', '', 0),
(15, 'David', 'Juarez ', 'juarez73', 'davidjuarez98@gmail.com', 'Lector', 'ff7e7b454b3f0a543c01be496c5fed16', '2019-10-17 18:45:22', '2019-10-17 18:45:22', '', 0);

-- --------------------------------------------------------

--
-- Estructura para la vista `modartc`
--
DROP TABLE IF EXISTS `modartc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `modartc`  AS  select `posts`.`title` AS `Titulo`,`users`.`username` AS `Autor`,`posts`.`body` AS `Contenido` from (`posts` join `users` on(`posts`.`user_id` = `users`.`id`)) where `posts`.`published` = 0 order by `posts`.`created_at` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `modcomment`
--
DROP TABLE IF EXISTS `modcomment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `modcomment`  AS  select `users`.`username` AS `Usuarios`,`comentarios`.`Contenido` AS `Comentarios`,`posts`.`title` AS `Titulo Articulo` from ((`posts` join `comentarios` on(`comentarios`.`id_posts` = `posts`.`id`)) join `users` on(`users`.`id` = `comentarios`.`id_users`)) where `comentarios`.`vecesreporte` > 0 order by `comentarios`.`vecesreporte` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `tenlast`
--
DROP TABLE IF EXISTS `tenlast`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tenlast`  AS  (select `posts`.`title` AS `title`,`users`.`username` AS `username`,`posts`.`slug` AS `slug`,`posts`.`created_at` AS `created_at` from (`posts` join `users` on(`posts`.`user_id` = `users`.`id`)) where `posts`.`published` = 1 order by `posts`.`created_at` desc) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cobro`
--
ALTER TABLE `cobro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuariofk` (`id_users`),
  ADD KEY `susfk` (`id_sus`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usersfk` (`id_users`),
  ADD KEY `postsfk` (`id_posts`);

--
-- Indices de la tabla `moderacion`
--
ALTER TABLE `moderacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artcfk` (`id_posts`),
  ADD KEY `commentfk` (`id_comment`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `subtopicfk` (`id_subtopic`);

--
-- Indices de la tabla `subtopic`
--
ALTER TABLE `subtopic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topicforeink` (`id_topic`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slugUnique` (`slug`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cobro`
--
ALTER TABLE `cobro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `moderacion`
--
ALTER TABLE `moderacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `subtopic`
--
ALTER TABLE `subtopic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cobro`
--
ALTER TABLE `cobro`
  ADD CONSTRAINT `susfk` FOREIGN KEY (`id_sus`) REFERENCES `suscripcion` (`id`),
  ADD CONSTRAINT `usuariofk` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `postsfk` FOREIGN KEY (`id_posts`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `usersfk` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `moderacion`
--
ALTER TABLE `moderacion`
  ADD CONSTRAINT `artcfk` FOREIGN KEY (`id_posts`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `commentfk` FOREIGN KEY (`id_comment`) REFERENCES `comentarios` (`id`);

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `subtopicfk` FOREIGN KEY (`id_subtopic`) REFERENCES `subtopic` (`id`);

--
-- Filtros para la tabla `subtopic`
--
ALTER TABLE `subtopic`
  ADD CONSTRAINT `topicforeink` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
