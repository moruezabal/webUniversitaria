-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2020 a las 16:44:23
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web_universitaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id_carrera` int(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cant_anios` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id_carrera`, `nombre`, `cant_anios`) VALUES
(1, 'Arquitectura', 5),
(2, 'Historia', 5),
(3, 'Abogacía', 7),
(4, 'Filosofía', 3),
(5, 'Lic. en Sistemas', 5),
(6, 'Periodismo Digital', 3),
(7, 'Chef Internacional', 3),
(8, 'Enfermería', 2),
(9, 'Comercio Exterior', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `profesor` varchar(30) NOT NULL,
  `id_carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `nombre`, `profesor`, `id_carrera`) VALUES
(1, 'Comunicación', 'Alejandro Ojeda', 1),
(2, 'Matemáticas', 'Jose Santos Treviño', 1),
(3, 'Física', 'Amparo Ramirez', 1),
(4, 'Procesos Constructivos', 'Marisela Olivares', 1),
(5, 'Sociología', 'Enrique Fernandez', 2),
(6, 'Historia Argentina', 'Joel Ibañez', 2),
(7, 'Historia General', 'Noemí Rodríguez', 2),
(8, 'Prehistoria', 'Alberto Robledo', 2),
(9, 'Derecho', 'Marisol Vargas', 3),
(10, 'Historia Constitucional', 'Gerardo Cristo', 3),
(11, 'Derecho Civil', 'Yolanda Tobias', 3),
(12, 'Economía Política', 'Blanca Cuellar', 3),
(13, 'Filosofía Política', 'Jesús Cardona', 4),
(14, 'Metafísica', 'Guadalupe Carrera', 4),
(15, 'Ética', 'Leticia Sandoval', 4),
(16, 'Teoría de la Argumentación', 'Marcos Gamez', 4),
(17, 'Algoritmos', 'Maria Del Carmen Aguilar ', 5),
(18, 'Base de Datos', 'Elizerio Salazar', 5),
(19, 'Ingeniería del Sotware', 'Norma Martínez', 5),
(20, 'Orientación a Objetos', 'Roberto Garza', 5),
(21, 'Análisis discursivo', 'Luis Font', 6),
(22, 'Redacción en red', 'Roberto Ruarte', 6),
(23, 'Sistemas de medios', 'Teresa Puente', 6),
(24, 'Crónica Periodística', 'Dante Milán', 6),
(25, 'Cocina mediterránea', 'Eladio Pérez', 7),
(26, 'Francés', 'Ana Figueroa', 7),
(27, 'Salud e Higiene', 'Tadeo Imola', 7),
(28, 'Manipulación de Alipentos', 'Natalia Stein', 7),
(29, 'Primeros Auxilios', 'Romina Bazán', 8),
(30, 'Instrumentología', 'Horacio Rondón', 8),
(31, 'Protocolo Institucional', 'Renzo Juárez', 8),
(32, 'Anatomía Aplicada', 'Belén Cortez', 8),
(33, 'Microeconomía', 'Natalia Soler', 9),
(34, 'Marketing', 'Lorenzo Kwist', 9),
(35, 'Administración', 'Bruno Sosa', 9),
(36, 'Investigación del Mercado', 'Julieta Scopone', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id_carrera` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id_carrera`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
