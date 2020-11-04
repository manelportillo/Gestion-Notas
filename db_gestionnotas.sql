-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2020 a las 23:35:32
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_gestionnotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_administrador`
--

CREATE TABLE `tbl_administrador` (
  `id_administrador` int(10) NOT NULL,
  `email_administrador` varchar(250) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Passwd_administrador` varchar(250) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_administrador`
--

INSERT INTO `tbl_administrador` (`id_administrador`, `email_administrador`, `Passwd_administrador`) VALUES
(1, 'admin@gmail.es', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_alumnos`
--

CREATE TABLE `tbl_alumnos` (
  `id_alumno` int(5) NOT NULL,
  `nombre_alumno` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidoprin_alumno` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidosec_alumno` varchar(30) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `grupo_alumno` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email_alumno` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `passwd_alumno` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_alumnos`
--

INSERT INTO `tbl_alumnos` (`id_alumno`, `nombre_alumno`, `apellidoprin_alumno`, `apellidosec_alumno`, `grupo_alumno`, `email_alumno`, `passwd_alumno`) VALUES
(7, 'Pablo', 'Soriano', 'Antón', 'Daw', 'pablosoriano@gmail.com', '1234'),
(21, 'Toni', 'Maestre', 'Bayo', 'DAw', 'tonimaestre@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_nota`
--

CREATE TABLE `tbl_nota` (
  `id_nota` int(5) NOT NULL,
  `Nombre_asignatura` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_alumno` int(5) NOT NULL,
  `Nota_alumno` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `tbl_nota`
--

INSERT INTO `tbl_nota` (`id_nota`, `Nombre_asignatura`, `id_alumno`, `Nota_alumno`) VALUES
(3, 'Mates', 7, 7),
(4, 'Fisica', 7, 10),
(5, 'Programación', 7, 9),
(7, 'Mates', 21, 10),
(8, 'Fisica', 21, 2),
(9, 'Programacion', 21, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_administrador`
--
ALTER TABLE `tbl_administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `tbl_alumnos`
--
ALTER TABLE `tbl_alumnos`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `tbl_nota`
--
ALTER TABLE `tbl_nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `FK_nota_alumno` (`id_alumno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_administrador`
--
ALTER TABLE `tbl_administrador`
  MODIFY `id_administrador` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_alumnos`
--
ALTER TABLE `tbl_alumnos`
  MODIFY `id_alumno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tbl_nota`
--
ALTER TABLE `tbl_nota`
  MODIFY `id_nota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_nota`
--
ALTER TABLE `tbl_nota`
  ADD CONSTRAINT `FK_nota_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `tbl_alumnos` (`id_alumno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
