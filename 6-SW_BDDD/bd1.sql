-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2021 a las 13:24:08
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquilercoche`
--

CREATE TABLE `alquilercoche` (
  `IdPersona` int(11) NOT NULL,
  `Matricula` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alquilercoche`
--

INSERT INTO `alquilercoche` (`IdPersona`, `Matricula`) VALUES
(2, '300C'),
(4, '400D'),
(2, '100A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacionrolpersona`
--

CREATE TABLE `asignacionrolpersona` (
  `IdPersona` int(11) NOT NULL,
  `IdRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignacionrolpersona`
--

INSERT INTO `asignacionrolpersona` (`IdPersona`, `IdRol`) VALUES
(1, 2),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 2),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `Matricula` varchar(10) NOT NULL,
  `Marca` varchar(20) NOT NULL,
  `Modelo` varchar(20) NOT NULL,
  `Disponible` int(11) NOT NULL,
  `Historico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`Matricula`, `Marca`, `Modelo`, `Disponible`, `Historico`) VALUES
('100A', 'Citroen', 'C3', 1, 13),
('200B', 'Citroen', 'C5', 0, 2),
('300C', 'Peugeot', '205', 1, 1),
('400D', 'Peugeot', '405', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `IdPersona` int(11) NOT NULL,
  `DNI` varchar(20) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Ciudad` varchar(100) NOT NULL,
  `Activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`IdPersona`, `DNI`, `Pass`, `Email`, `Nombre`, `Apellidos`, `Ciudad`, `Activo`) VALUES
(1, '16945098D', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'joseantonio.cornejo@villarreal.es', 'Manuela', 'Olivera', 'El Vanegas', 1),
(2, '58311018S', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'achavez@latinmail.com', 'Berta', 'Vergara', 'O Rentería del Vallès', 1),
(3, '08349639H', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'marc27@live.com', 'Diego', 'Barraza', 'El Pineda', 0),
(4, '35549127M', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'gil.erik@salas.es', 'Gonzalo', 'Merino', 'Vall Romo', 1),
(5, '71638026H', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'luisa86@salcido.com.es', 'María Ángeles', 'Millán', 'Crespo del Puerto', 0),
(6, '29143885X', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'cmora@live.com', 'Alexandra', 'Lemus', 'L\' Gómez de la Sierra', 0),
(7, '47260613Y', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'belizondo@mayorga.org', 'Luisa', 'Marín', 'Ceja del Mirador', 1),
(8, '55912285K', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'hinojosa.berta@aguirre.com.es', 'Lola', 'Manzanares', 'Puig Alta', 0),
(9, '86889365B', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'hsolorzano@soria.es', 'Naiara', 'Figueroa', 'San Bueno', 0),
(10, '75099495X', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'sandoval.andres@hotmail.es', 'Alba', 'Escalante', 'A Ríos', 0),
(11, '84965415B', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'fernando.costa@madera.org', 'Daniela', 'Burgos', 'Sandoval Baja', 0),
(12, '28335962P', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'cristian93@hispavista.com', 'Carlota', 'Soliz', 'Las Barreto', 0),
(13, '19263005E', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'daniel42@gmail.com', 'Julia', 'Gurule', 'Feliciano de las Torres', 1),
(14, '28862142V', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'pol.garcia@cuellar.com', 'Cristina', 'Vallejo', 'El Guillen', 0),
(15, '34140698G', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'eric47@quezada.com', 'Adam', 'Serrato', 'La Haro', 0),
(16, '23304105E', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'daponte@latinmail.com', 'Rosario', 'Meza', 'El Huerta del Pozo', 0),
(17, '36143635D', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'adrian90@yahoo.es', 'Bruno', 'Valverde', 'Los Villanueva Baja', 0),
(18, '60808881D', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'escobar.beatriz@hotmail.com', 'Álvaro', 'Calero', 'A Hinojosa del Penedès', 0),
(19, '10808513P', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'pablo19@lebron.com', 'Jan', 'Hidalguillo', 'Antón Alta', 0),
(20, '37910958N', 'eccb65165b7a4aafdd69cb8dfa564fbd', 'lcolunga@yahoo.es', 'Nil', 'Baeza', 'Martínez del Bages', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `IdRol` int(11) NOT NULL,
  `Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`IdRol`, `Descripcion`) VALUES
(1, 'Usuario estándar'),
(2, 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquilercoche`
--
ALTER TABLE `alquilercoche`
  ADD KEY `fk_alqper` (`IdPersona`),
  ADD KEY `fk_alqcoc` (`Matricula`);

--
-- Indices de la tabla `asignacionrolpersona`
--
ALTER TABLE `asignacionrolpersona`
  ADD KEY `fk_rol` (`IdRol`),
  ADD KEY `IdPersona` (`IdPersona`);

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`Matricula`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`IdPersona`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `IdPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquilercoche`
--
ALTER TABLE `alquilercoche`
  ADD CONSTRAINT `fk_alqcoc` FOREIGN KEY (`Matricula`) REFERENCES `coches` (`Matricula`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_alqper` FOREIGN KEY (`IdPersona`) REFERENCES `personas` (`IdPersona`) ON DELETE CASCADE;

--
-- Filtros para la tabla `asignacionrolpersona`
--
ALTER TABLE `asignacionrolpersona`
  ADD CONSTRAINT `asignacionrolpersona_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `personas` (`IdPersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`IdRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
