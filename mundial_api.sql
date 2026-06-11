-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2026 a las 01:17:04
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
-- Base de datos: `mundial_api`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistentes`
--

CREATE TABLE `asistentes` (
  `id` int(11) NOT NULL,
  `jugador_nombre` varchar(100) NOT NULL,
  `seleccion_id` int(11) DEFAULT NULL,
  `asistencias` int(11) DEFAULT 0,
  `anio` year(4) DEFAULT NULL,
  `escudo_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campeones`
--

CREATE TABLE `campeones` (
  `id` int(11) NOT NULL,
  `anio` year(4) NOT NULL,
  `seleccion_id` int(11) DEFAULT NULL,
  `escudo_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `campeones`
--

INSERT INTO `campeones` (`id`, `anio`, `seleccion_id`, `escudo_url`) VALUES
(3, '2022', 13, 'https://static.wikia.nocookie.net/futbol/images/0/0b/Nuevo_Escudo_Argentina.png/revision/latest?cb=20230730154016'),
(4, '1986', 13, 'https://static.wikia.nocookie.net/futbol/images/0/0b/Nuevo_Escudo_Argentina.png/revision/latest?cb=20230730154016'),
(5, '1978', 13, 'https://static.wikia.nocookie.net/futbol/images/0/0b/Nuevo_Escudo_Argentina.png/revision/latest?cb=20230730154016'),
(6, '1950', 18, 'https://w1.pngwing.com/pngs/187/665/png-transparent-football-2018-world-cup-uruguay-national-football-team-1930-fifa-world-cup-2014-fifa-world-cup-england-national-football-team-brazil-national-football-team-uruguayan-football-thumbnail.png'),
(7, '1930', 18, 'https://w1.pngwing.com/pngs/187/665/png-transparent-football-2018-world-cup-uruguay-national-football-team-1930-fifa-world-cup-2014-fifa-world-cup-england-national-football-team-brazil-national-football-team-uruguayan-football-thumbnail.png'),
(8, '1958', 14, 'https://w7.pngwing.com/pngs/249/521/png-transparent-cbf-logo-brazil-national-football-team-2018-fifa-world-cup-copa-do-brasil-coat-of-arms-of-brazil-brasil-copa-logo-fifa-world-cup-brazil-thumbnail.png'),
(9, '1962', 14, 'https://w7.pngwing.com/pngs/249/521/png-transparent-cbf-logo-brazil-national-football-team-2018-fifa-world-cup-copa-do-brasil-coat-of-arms-of-brazil-brasil-copa-logo-fifa-world-cup-brazil-thumbnail.png'),
(10, '1970', 14, 'https://w7.pngwing.com/pngs/249/521/png-transparent-cbf-logo-brazil-national-football-team-2018-fifa-world-cup-copa-do-brasil-coat-of-arms-of-brazil-brasil-copa-logo-fifa-world-cup-brazil-thumbnail.png'),
(11, '1994', 14, 'https://w7.pngwing.com/pngs/249/521/png-transparent-cbf-logo-brazil-national-football-team-2018-fifa-world-cup-copa-do-brasil-coat-of-arms-of-brazil-brasil-copa-logo-fifa-world-cup-brazil-thumbnail.png'),
(12, '2002', 14, 'https://w7.pngwing.com/pngs/249/521/png-transparent-cbf-logo-brazil-national-football-team-2018-fifa-world-cup-copa-do-brasil-coat-of-arms-of-brazil-brasil-copa-logo-fifa-world-cup-brazil-thumbnail.png'),
(13, '2018', 46, 'https://r2.thesportsdb.com/images/media/team/badge/p3n0z51726166851.png'),
(14, '1998', 46, 'https://r2.thesportsdb.com/images/media/team/badge/p3n0z51726166851.png'),
(15, '2014', 38, 'https://r2.thesportsdb.com/images/media/team/badge/1xysi51726167152.png'),
(16, '1990', 38, 'https://r2.thesportsdb.com/images/media/team/badge/1xysi51726167152.png'),
(17, '1974', 38, 'https://r2.thesportsdb.com/images/media/team/badge/1xysi51726167152.png'),
(18, '1954', 38, 'https://r2.thesportsdb.com/images/media/team/badge/1xysi51726167152.png'),
(19, '2010', 45, 'https://r2.thesportsdb.com/images/media/team/badge/ncgqyr1726166942.png/medium'),
(20, '1966', 47, 'https://r2.thesportsdb.com/images/media/team/badge/vf5ttc1726166739.png'),
(21, '2006', 53, 'https://r2.thesportsdb.com/images/media/team/badge/fxijcp1726167035.png/medium'),
(22, '1982', 53, 'https://r2.thesportsdb.com/images/media/team/badge/fxijcp1726167035.png/medium'),
(23, '1938', 53, 'https://r2.thesportsdb.com/images/media/team/badge/fxijcp1726167035.png/medium'),
(24, '1934', 53, 'https://r2.thesportsdb.com/images/media/team/badge/fxijcp1726167035.png/medium');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convocados`
--

CREATE TABLE `convocados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `seleccion_id` int(11) DEFAULT NULL,
  `posicion` varchar(30) DEFAULT NULL,
  `equipo_juega` text DEFAULT NULL,
  `escudo_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `convocados`
--

INSERT INTO `convocados` (`id`, `nombre`, `seleccion_id`, `posicion`, `equipo_juega`, `escudo_url`) VALUES
(1, 'Viktor Gyökeres ', 6, 'Delantero', 'Arsenal', 'https://img.a.transfermarkt.technology/portrait/big/325443-1737581896.jpg?lm=1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadios`
--

CREATE TABLE `estadios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `capacidad` int(110) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadios`
--

INSERT INTO `estadios` (`id`, `nombre`, `ciudad`, `capacidad`) VALUES
(3, 'Estadio Toronto', 'Toronto, Ontario, Canadá', 45),
(4, 'Estadio BC Place Vancouver', 'Vancouver, Columbia británica, Canadá', 54),
(5, 'Estadio Ciudad de México', 'Tlalpan, Ciudad de México, México', 83),
(6, 'Estadio Guadalajara', 'Zapopan, Jalisco, México', 48),
(7, 'Estadio Monterrey', 'Guadalupe, Nuevo León, México', 53),
(9, 'Estadio Boston', 'Foxborough, Massachusetts, Estados Unidos', 65),
(10, 'Estadio Dallas', 'Arlington, Texas, Estados Unidos', 94),
(11, 'Estadio Houston', ' Houston, Texas, Estados Unidos', 72),
(12, 'Estadio Kansas City', ' Kansas City, Missouri, Estados Unidos', 73),
(13, 'Estadio Los Ángeles﻿', ' Inglewood, California, Estados Unidos', 70),
(14, 'Estadio Miami', 'Miami Gardens, Florida, Estados Unidos', 65),
(15, 'Estadio Nueva York Nueva Jersey﻿', ' East Rutherford, Nueva Jersey, Estados Unidos', 82),
(16, 'Estadio Filadelfia﻿', 'Philadelphia, Pennsylvania, Estados Unidos', 69),
(17, 'Estadio Bahía de San Francisco', 'Santa Clara, California, Estados Unidos', 71),
(18, 'Estadio Seattle', 'Seattle, Washington, Estados Unidos', 69),
(19, 'Estadio Atlanta', 'Atlanta, Georgia, Estados Unidos', 75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goleadores`
--

CREATE TABLE `goleadores` (
  `id` int(11) NOT NULL,
  `jugador_nombre` varchar(100) NOT NULL,
  `seleccion_id` int(11) DEFAULT NULL,
  `goles` int(11) DEFAULT 0,
  `anio` year(4) DEFAULT NULL,
  `escudo_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `grupo_nombre` varchar(5) NOT NULL,
  `seleccion_id` int(11) DEFAULT NULL,
  `puntos` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `grupo_nombre`, `seleccion_id`, `puntos`) VALUES
(2, 'G', 12, 0),
(3, 'B', 8, 5),
(4, 'A', 5, 3),
(5, 'D', 7, 1),
(6, 'E', 9, 0),
(7, 'C', 10, 0),
(8, 'L', 11, 0),
(9, 'F', 6, 0),
(10, 'J', 13, 0),
(11, 'C', 14, 0),
(12, 'K', 15, 7),
(13, 'E', 16, 0),
(14, 'D', 17, 5),
(15, 'H', 18, 0),
(16, 'H', 19, 0),
(17, 'D', 20, 0),
(18, 'B', 21, 0),
(19, 'I', 22, 0),
(20, 'F', 23, 0),
(21, 'J', 24, 0),
(22, 'A', 25, 1),
(23, 'G', 26, 0),
(24, 'K', 27, 3),
(25, 'J', 28, 0),
(26, 'E', 29, 0),
(27, 'G', 30, 0),
(28, 'L', 31, 0),
(29, 'H', 37, 0),
(30, 'C', 32, 0),
(31, 'K', 36, 0),
(32, 'I', 35, 0),
(33, 'A', 34, 1),
(34, 'F', 33, 0),
(35, 'E', 38, 0),
(36, 'J', 39, 0),
(37, 'G', 40, 0),
(38, 'B', 41, 2),
(39, 'A', 42, 3),
(40, 'L', 43, 0),
(41, 'C', 44, 0),
(42, 'H', 45, 0),
(43, 'I', 46, 0),
(44, 'L', 47, 0),
(45, 'I', 48, 0),
(46, 'F', 49, 0),
(47, 'K', 50, 7),
(48, 'B', 51, 0),
(49, 'D', 52, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE `participantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `confederacion` varchar(10) DEFAULT NULL,
  `escudo_url` varchar(255) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`id`, `nombre`, `confederacion`, `escudo_url`, `fecha_creacion`) VALUES
(5, 'Selección de fútbol de México', ' Concacaf', 'https://r2.thesportsdb.com/images/media/team/badge/3rmosi1748525208.png/medium', '2026-05-14 04:52:27'),
(6, 'Selección de fútbol de Suecia', 'UEFA', 'https://e00-especiales-marca.uecdn.es/eurocopa/images/escudos/sue.png', '2026-05-14 04:54:23'),
(7, 'Selección de fútbol de los Estados Unidos', 'Concacaf', 'https://a.espncdn.com/photo/2022/0331/r993396_1000x1000_1-1.png', '2026-05-15 04:13:19'),
(8, 'Selección de fútbol de Canadá', 'Concacaf', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRySJNllj2HZXLcDUBCLvEfiANAh1j5hmbPTQ&s', '2026-05-15 04:15:02'),
(9, 'Selección de fútbol de Curazao ', 'Concacaf', 'https://a.espncdn.com/photo/2025/1119/r1577730_2_1000x1000_1-1.png', '2026-05-15 04:16:11'),
(10, 'Selección de fútbol de Haití', 'Concacaf', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0m488kZXKrgflvKZGOlJ3ro_0WcaqNgOvfg&s', '2026-05-15 04:17:36'),
(11, 'Selección de fútbol de Panamá', 'Concacaf', 'https://tmssl.akamaized.net//images/wappen/big/3577.png?lm=1716532950', '2026-05-15 04:18:30'),
(12, 'Selección de fútbol de Nueva Zelanda ', 'OFC', 'https://r2.thesportsdb.com/images/media/team/badge/91xpk81742982935.png/medium', '2026-05-15 04:19:53'),
(13, 'Selección de fútbol de Argentina', 'CONMEBOL', 'https://static.wikia.nocookie.net/futbol/images/0/0b/Nuevo_Escudo_Argentina.png/revision/latest?cb=20230730154016', '2026-05-15 04:26:33'),
(14, 'Selección de fútbol de Brasil', 'CONMEBOL', 'https://w7.pngwing.com/pngs/249/521/png-transparent-cbf-logo-brazil-national-football-team-2018-fifa-world-cup-copa-do-brasil-coat-of-arms-of-brazil-brasil-copa-logo-fifa-world-cup-brazil-thumbnail.png', '2026-05-15 04:27:21'),
(15, 'Selección de fútbol de Colombia ', 'CONMEBOL', 'https://escudosfc.com.br/images/col.png', '2026-05-15 04:29:23'),
(16, 'Selección de fútbol de Ecuador', 'CONMEBOL', 'https://ih1.redbubble.net/image.4548667866.6404/st,small,507x507-pad,600x600,f8f8f8.jpg', '2026-05-15 04:30:59'),
(17, 'Selección de fútbol de Paraguay', 'CONMEBOL', 'https://e7.pngegg.com/pngimages/379/240/png-clipart-paraguay-national-football-team-paraguayan-primera-division-south-american-youth-football-championship-argentina-national-football-team-football-emblem-logo.png', '2026-05-15 04:31:58'),
(18, 'Selección de fútbol de Uruguay', 'CONMEBOL', 'https://w1.pngwing.com/pngs/187/665/png-transparent-football-2018-world-cup-uruguay-national-football-team-1930-fifa-world-cup-2014-fifa-world-cup-england-national-football-team-brazil-national-football-team-uruguayan-football-thumbnail.png', '2026-05-15 04:32:56'),
(19, 'Selección de fútbol de Arabia Saudita ', 'AFC', 'https://a.espncdn.com/photo/2022/0708/r1033871_536x536_1-1.png', '2026-05-15 13:05:10'),
(20, 'Selección de fútbol de Australia', 'AFC', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Australia_national_football_team_badge.svg/250px-Australia_national_football_team_badge.svg.png', '2026-05-15 13:06:11'),
(21, 'Selección de fútbol de Catar', 'AFC', 'https://r2.thesportsdb.com/images/media/team/badge/rs3ir31642708685.png/medium', '2026-05-15 13:08:37'),
(22, 'Selección de fútbol de Irak', 'AFC', 'https://r2.thesportsdb.com/images/media/team/badge/aqidfn1742100110.png/medium', '2026-05-15 13:09:34'),
(23, 'Selección de fútbol de Japón', 'AFC', 'https://r2.thesportsdb.com/images/media/team/badge/ffsyxz1591989843.png/medium', '2026-05-15 13:10:48'),
(24, 'Selección de fútbol de Jordania', 'AFC', 'https://r2.thesportsdb.com/images/media/team/badge/59fo2s1742100034.png/medium', '2026-05-15 13:11:45'),
(25, 'Selección de fútbol de Corea del Sur', 'AFC', 'https://r2.thesportsdb.com/images/media/team/badge/a8nqfs1589564916.png/medium', '2026-05-15 13:12:42'),
(26, 'Selección de fútbol de Irán', 'AFC', 'https://r2.thesportsdb.com/images/media/team/badge/uttpvw1455465617.png/medium', '2026-05-15 13:14:05'),
(27, 'Selección de fútbol de Uzbekistán', 'AFC', 'https://r2.thesportsdb.com/images/media/team/badge/u5bgze1597943605.png/medium', '2026-05-15 13:14:55'),
(28, 'Selección de fútbol de Argelia', 'CAF', 'https://r2.thesportsdb.com/images/media/team/badge/rrwpry1455460218.png/medium', '2026-05-15 13:21:21'),
(29, 'Selección de fútbol de Costa de Marfil', 'CAF', 'https://r2.thesportsdb.com/images/media/team/badge/rwxuuu1455465643.png/medium', '2026-05-15 13:23:07'),
(30, 'Selección de fútbol de Egipto', 'CAF', 'https://r2.thesportsdb.com/images/media/team/badge/uheyzo1742102234.png', '2026-05-15 13:24:04'),
(31, 'Selección de fútbol de Ghana', 'CAF', 'https://r2.thesportsdb.com/images/media/team/badge/j589xw1751526124.png', '2026-05-15 13:25:04'),
(32, 'Selección de fútbol de Marruecos', 'CAF', 'https://r2.thesportsdb.com/images/media/team/badge/hbmwkj1731791275.png', '2026-05-15 13:26:03'),
(33, 'Selección de fútbol de Tunez', 'CAF', 'https://r2.thesportsdb.com/images/media/team/badge/7r89rg1526727277.png', '2026-05-15 13:27:12'),
(34, 'Selección de fútbol de Sudafrica', 'CAF', 'https://r2.thesportsdb.com/images/media/team/badge/xjz9j91553368824.png', '2026-05-15 13:28:22'),
(35, 'Selección de fútbol de Senegal', 'CAF', 'https://r2.thesportsdb.com/images/media/team/badge/wh8dya1526727459.png', '2026-05-15 13:29:09'),
(36, 'Selección de fútbol de la República Democrática del Congo', 'CAF', 'https://r2.thesportsdb.com/images/media/team/badge/s85jjw1728749022.png', '2026-05-15 13:30:18'),
(37, 'Selección de fútbol de Cabo Verde', 'CAF', 'https://r2.thesportsdb.com/images/media/team/badge/5jn0o71593280376.png', '2026-05-15 13:31:16'),
(38, 'Selección de fútbol de Alemania', 'UEFA', 'https://r2.thesportsdb.com/images/media/team/badge/1xysi51726167152.png', '2026-05-15 17:31:26'),
(39, 'Selección de fútbol de Austria', 'UEFA', 'https://r2.thesportsdb.com/images/media/team/badge/874p631628721400.png', '2026-05-15 17:32:15'),
(40, 'Selección de fútbol de Bélgica', 'UEFA', 'https://r2.thesportsdb.com/images/media/team/badge/8xlvxv1592062265.png', '2026-05-15 17:33:06'),
(41, 'Selección de fútbol de Bosnia y Herzegovina', 'UEFA', 'https://r2.thesportsdb.com/images/media/team/badge/wtqqst1455463120.png', '2026-05-15 17:33:52'),
(42, 'Selección de fútbol de la República Checa', 'UEFA', 'https://r2.thesportsdb.com/images/media/team/badge/1o0cx31654205806.png', '2026-05-15 17:36:15'),
(43, 'Selección de fútbol de Croacia', 'UEFA', 'https://r2.thesportsdb.com/images/media/team/badge/vvtsyu1455465317.png', '2026-05-15 17:37:01'),
(44, 'Selección de fútbol de Escocia', 'UEFA', 'https://r2.thesportsdb.com/images/media/team/badge/3691i11552945146.png', '2026-05-15 17:38:35'),
(45, 'Selección de fútbol de España', 'UEFA', 'https://r2.thesportsdb.com/images/media/team/badge/ncgqyr1726166942.png/medium', '2026-05-15 17:41:40'),
(46, 'Selección de fútbol de Francia', 'UEFA', 'https://r2.thesportsdb.com/images/media/team/badge/p3n0z51726166851.png', '2026-05-15 17:42:52'),
(47, 'Selección de fútbol de Inglaterra ', 'UEFA', 'https://r2.thesportsdb.com/images/media/team/badge/vf5ttc1726166739.png', '2026-05-15 17:44:05'),
(48, 'Selección de fútbol de Noruega', 'UEFA', 'https://r2.thesportsdb.com/images/media/team/badge/gyfn811591973155.png/medium', '2026-05-15 17:47:36'),
(49, 'Selección de fútbol de Países Bajos', 'UEFA', 'https://r2.thesportsdb.com/images/media/team/badge/1p0hr41593787110.png/medium', '2026-05-15 17:49:19'),
(50, ' Selección de fútbol de Portugal', 'UEFA', 'https://r2.thesportsdb.com/images/media/team/badge/swqvpy1455466083.png/medium', '2026-05-15 17:54:42'),
(51, 'Selección de fútbol de Suiza', 'UEFA', 'https://r2.thesportsdb.com/images/media/team/badge/mb7yqe1717365808.png/medium', '2026-05-15 17:56:28'),
(52, 'Selección de fútbol de Turquía', 'UEFA', 'https://r2.thesportsdb.com/images/media/team/badge/70c4oo1591982459.png/medium', '2026-05-15 17:58:30'),
(53, 'Selección de fútbol de Italia', 'UEFA', 'https://r2.thesportsdb.com/images/media/team/badge/fxijcp1726167035.png/medium', '2026-05-15 22:48:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `id` int(11) NOT NULL,
  `equipo_local_id` int(11) DEFAULT NULL,
  `equipo_visitante_id` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estadio_id` int(11) DEFAULT NULL,
  `fase` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id`, `equipo_local_id`, `equipo_visitante_id`, `fecha`, `hora`, `estadio_id`, `fase`) VALUES
(4, 25, 42, '2026-06-11', '20:00:00', 6, 'GRUPOS'),
(6, 7, 17, '2026-06-12', '22:00:00', 13, 'GRUPOS'),
(7, 8, 41, '2026-06-12', '14:00:00', 3, 'GRUPOS'),
(8, 31, 11, '2026-06-17', '19:00:00', 3, 'GRUPOS'),
(9, 38, 29, '2026-06-20', '13:00:00', 3, 'GRUPOS'),
(10, 11, 43, '2026-06-23', '19:00:00', 3, 'GRUPOS'),
(11, 35, 22, '2026-06-26', '14:00:00', 3, 'GRUPOS'),
(12, 20, 52, '2026-06-13', '22:00:00', 4, 'GRUPOS'),
(13, 8, 21, '2026-06-18', '17:00:00', 4, 'GRUPOS'),
(14, 12, 30, '2026-06-21', '22:00:00', 4, 'GRUPOS'),
(15, 51, 8, '2026-06-24', '14:00:00', 4, 'GRUPOS'),
(16, 12, 40, '2026-06-26', '21:00:00', 4, 'GRUPOS'),
(17, 6, 33, '2026-06-14', '20:00:00', 7, 'GRUPOS'),
(18, 33, 23, '2026-06-20', '21:00:00', 7, 'GRUPOS'),
(19, 34, 25, '2026-06-24', '20:00:00', 7, 'GRUPOS'),
(20, 5, 34, '2026-06-11', '14:00:00', 5, 'GRUPOS'),
(21, 27, 15, '2026-06-17', '21:00:00', 5, 'GRUPOS'),
(22, 42, 5, '2026-06-24', '20:00:00', 5, 'GRUPOS'),
(23, 25, 42, '2026-06-11', '20:00:00', 6, 'GRUPOS'),
(24, 5, 25, '2026-06-18', '20:00:00', 6, 'GRUPOS'),
(25, 15, 36, '2026-06-23', '20:00:00', 6, 'GRUPOS'),
(26, 18, 45, '2026-06-26', '19:00:00', 6, 'GRUPOS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistentes`
--
ALTER TABLE `asistentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seleccion_id` (`seleccion_id`);

--
-- Indices de la tabla `campeones`
--
ALTER TABLE `campeones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seleccion_id` (`seleccion_id`);

--
-- Indices de la tabla `convocados`
--
ALTER TABLE `convocados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seleccion_id` (`seleccion_id`);

--
-- Indices de la tabla `estadios`
--
ALTER TABLE `estadios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `goleadores`
--
ALTER TABLE `goleadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seleccion_id` (`seleccion_id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seleccion_id` (`seleccion_id`);

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipo_local_id` (`equipo_local_id`),
  ADD KEY `equipo_visitante_id` (`equipo_visitante_id`),
  ADD KEY `estadio_id` (`estadio_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistentes`
--
ALTER TABLE `asistentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `campeones`
--
ALTER TABLE `campeones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `convocados`
--
ALTER TABLE `convocados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estadios`
--
ALTER TABLE `estadios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `goleadores`
--
ALTER TABLE `goleadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistentes`
--
ALTER TABLE `asistentes`
  ADD CONSTRAINT `asistentes_ibfk_1` FOREIGN KEY (`seleccion_id`) REFERENCES `participantes` (`id`);

--
-- Filtros para la tabla `campeones`
--
ALTER TABLE `campeones`
  ADD CONSTRAINT `campeones_ibfk_1` FOREIGN KEY (`seleccion_id`) REFERENCES `participantes` (`id`);

--
-- Filtros para la tabla `convocados`
--
ALTER TABLE `convocados`
  ADD CONSTRAINT `convocados_ibfk_1` FOREIGN KEY (`seleccion_id`) REFERENCES `participantes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `goleadores`
--
ALTER TABLE `goleadores`
  ADD CONSTRAINT `goleadores_ibfk_1` FOREIGN KEY (`seleccion_id`) REFERENCES `participantes` (`id`);

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`seleccion_id`) REFERENCES `participantes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `partidos_ibfk_1` FOREIGN KEY (`equipo_local_id`) REFERENCES `participantes` (`id`),
  ADD CONSTRAINT `partidos_ibfk_2` FOREIGN KEY (`equipo_visitante_id`) REFERENCES `participantes` (`id`),
  ADD CONSTRAINT `partidos_ibfk_3` FOREIGN KEY (`estadio_id`) REFERENCES `estadios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
