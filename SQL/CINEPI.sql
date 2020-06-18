-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2020 a las 01:56:57
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--

CREATE DATABASE `cinepi`;

-- Base de datos: `cinepi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `idPelicula` int(11) NOT NULL,
  `pais` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `genero` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `duracion` int(11) NOT NULL,
  `anEstreno` int(11) NOT NULL,
  `sinopsis` varchar(1550) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `director` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `trailer` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `cartel` varchar(222) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`idPelicula`, `pais`, `genero`, `duracion`, `anEstreno`, `sinopsis`, `titulo`, `director`, `trailer`, `cartel`) VALUES
(75, 'Estados Unidos', 'Ciencia Ficción', 132, 1977, 'Una noche, cerca de su casa, en Indiana, Roy Neary (Richard Dreyfuss) observa en el cielo unos misteriosos objetos voladores. Desde entonces vive tan obsesionado por comprender lo que ha visto que se distancia de su esposa (Teri Garr). Encuentra apoyo en Jillian Guiler (Melinda Dillon), una mujer que también ha sido testigo de los mismos hechos. Juntos intentan encontrar una respuesta al misterio que ha alterado sus vidas. ', 'Encuentros en la tercera fase', 'Steven Spielberg', 'https://www.youtube.com/embed/XAxZ0h195nc', 'https://m.media-amazon.com/images/M/MV5BMjM1NjE5NjQxN15BMl5BanBnXkFtZTgwMjYzMzQxMDE@._V1_.jpg'),
(76, 'Estados Unidos', 'Mafia', 148, 1990, 'Henry Hill, hijo de padre irlandés y madre siciliana, vive en Brooklyn y se siente fascinado por la vida que llevan los gángsters de su barrio, donde la mayoría de los vecinos son inmigrantes. Paul Cicero, el patriarca de la familia Pauline, es el protector del barrio. A los trece años, Henry decide abandonar la escuela y entrar a formar parte de la organización mafiosa como chico de los recados; muy pronto se gana la confianza de sus jefes, gracias a lo cual irá subiendo de categoría.', 'Uno de los nuestros', 'Martin Scorsese', 'https://www.youtube.com/embed/mDipxg3H37o', 'https://m.media-amazon.com/images/M/MV5BY2NkZjEzMDgtN2RjYy00YzM1LWI4ZmQtMjIwYjFjNmI3ZGEwXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_SX667_CR0,0,667,999_AL_.jpghttps://m.media-amazon.com/images/M/MV5BY2NkZjEzMDgtN2RjYy00YzM1LWI4ZmQtMj'),
(77, 'Estados Unidos', 'Western', 105, 1973, 'En 1870, un forastero (Clint Eastwood) pasa a caballo por la tumba de Jim Duncan, antiguo sheriff de la ciudad fronteriza de Lago, en el sudoeste de Estados Unidos. Los propietarios de la compañía minera, Dave Drake (Mitchell Ryan) y Morgan Allen (Jack Ging) lo contratan para que los defienda de tres pistoleros que, recién salidos de la cárcel, están a punto de llegar a la ciudad. El forastero acepta el trato a condición de hacer las cosas a su manera. ', 'Infierno de cobardes', 'Clint Eastwood', 'https://www.youtube.com/embed/Or7dae3PePY', 'https://m.media-amazon.com/images/M/MV5BM2ZmNDE5MDEtNTYxNi00MWNjLTg2NWQtMGM0YmMxZGMyYTg4L2ltYWdlXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_SY1000_CR0,0,706,1000_AL_.jpg'),
(78, 'Japón', 'Ciencia Ficción', 124, 1988, 'Año 2019. Neo-Tokyo es una ciudad construida sobre las ruinas de la antigua capital japonesa destruida tras la Tercera Guerra Mundial. Japón es un país al borde del colapso que sufre continuas crisis políticas. En secreto, un equipo de científicos ha reanudado por orden del ejército un experimento para encontrar a individuos que puedan controlar el arma definitiva: una fuerza denominada \"la energía absoluta\". Pero los habitantes de Neo-Tokyo tienen otras cosas de las que preocuparse. Uno de ellos es Kaneda, un joven pandillero líder de una banda de motoristas. ', 'Akira', 'Katsuhiro Ōtomo', 'https://www.youtube.com/embed/ooKBenGK3R4', 'https://m.media-amazon.com/images/M/MV5BM2ZiZTk1ODgtMTZkNS00NTYxLWIxZTUtNWExZGYwZTRjODViXkEyXkFqcGdeQXVyMTE2MzA3MDM@._V1_SY1000_CR0,0,675,1000_AL_.jpg'),
(79, 'Estados Unidos', 'Aventuras', 111, 1985, 'Mikey es un niño de trece años que junto con su hermano mayor y sus amigos forman un grupo que se hacen llamar \"los Goonies\". Un día deciden subir al desván de su casa, donde su padre guarda antigüedades. Allí encuentran el mapa de un tesoro perdido que data del siglo XVII, de la época de los piratas, y deciden salir a buscarlo repletos de espíritu aventurero.', 'Los goonies', 'Richard Donner', 'https://www.youtube.com/embed/VYbF0VdMGrM', 'https://m.media-amazon.com/images/M/MV5BZDY2NjcwZmUtMjc4MS00NmUxLTgxOGYtZjdhYjE0MmFkNGE0XkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_SY1000_CR0,0,666,1000_AL_.jpg'),
(80, 'Estados Unidos', 'Ciencia Ficción', 118, 1990, 'Marty McFly sigue en 1955 y su amigo Doc ha retrocedido al año 1885, la época del salvaje oeste. Éste le envía una carta donde comenta que la máquina del tiempo está averiada, y que es imposible repararla. Sin embargo no le preocupa estar atrapado en el pasado, pues allí es muy feliz trabajando de herrero aunque convive con malhechores. Pero Marty descubre una vieja tumba en la que lee que Doc murió en 1885 y, sin pensárselo dos veces, irá a rescatar a su amigo.', 'Regreso al futuro III', 'Robert Zemeckis', 'https://www.youtube.com/embed/qvsgGtivCgs', 'https://m.media-amazon.com/images/M/MV5BYjhlMGYxNmMtOWFmMi00Y2M2LWE5NWYtZTdlMDRlMGEzMDA3XkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SY1000_CR0,0,676,1000_AL_.jpg'),
(81, 'Estados Unidos', 'Ciencia Ficción', 133, 1983, 'Para ir a Tatooine y liberar a Han Solo, Luke Skywalker y la princesa Leia deben infiltrarse en la peligrosa guarida de Jabba the Hutt, el gángster más temido de la galaxia. Una vez reunidos, el equipo recluta a tribus de Ewoks para combatir a las fuerzas imperiales en los bosques de la luna de Endor. Mientras tanto, el Emperador y Darth Vader conspiran para atraer a Luke al lado oscuro, pero el joven está decidido a reavivar el espíritu del Jedi en su padre. ', 'Star Wars Episodio VI: El retorno del Jedi [3D]', 'Richard Marquand', 'https://www.youtube.com/embed/yhuKapE-Bio', 'https://m.media-amazon.com/images/M/MV5BOWZlMjFiYzgtMTUzNC00Y2IzLTk1NTMtZmNhMTczNTk0ODk1XkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_SY999_CR0,0,644,999_AL_.jpg'),
(82, 'Estados Unidos', 'Ciencia Ficción', 109, 1990, 'Futuro, año 2000. En la megalópolis de Metrópolis la sociedad se divide en dos clases, los ricos que tienen el poder y los medios de producción, rodeados de lujos, espacios amplios y jardines, y los obreros, condenados a vivir en condiciones dramáticas recluidos en un gueto subterráneo, donde se encuentra el corazón industrial de la ciudad. Un día Freder (Alfred Abel), el hijo del todoperoso Joh Fredersen (Gustav Frohlich), el hombre que controla la ciudad, descubre los duros aspectos laborales de los obreros tras enamorarse de María (Brigitte Helm), una muchacha de origen humilde, venerada por las clases bajas y que predica los buenos sentimientos y al amor. ', 'Metropolis', 'Fritz Lang', 'https://www.youtube.com/embed/gdtZv3XROnc', 'https://m.media-amazon.com/images/M/MV5BMTg5YWIyMWUtZDY5My00Zjc1LTljOTctYmI0MWRmY2M2NmRkXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecciones`
--

CREATE TABLE `proyecciones` (
  `idProyeccion` int(11) NOT NULL,
  `idSala` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `fechaProyeccion` date NOT NULL,
  `horaProyeccion` time NOT NULL,
  `codtarifa` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proyecciones`
--

INSERT INTO `proyecciones` (`idProyeccion`, `idSala`, `idPelicula`, `fechaProyeccion`, `horaProyeccion`, `codtarifa`) VALUES
(0, 1, 75, '2020-06-22', '22:30:00', 'NORMAL'),
(1, 1, 75, '2020-06-23', '11:30:00', 'MATINA'),
(2, 2, 75, '2020-06-24', '19:30:00', 'NORMAL'),
(3, 1, 76, '2020-06-22', '15:30:00', 'NORMAL'),
(4, 1, 76, '2020-06-28', '22:00:00', 'NORMAL'),
(5, 1, 77, '2020-06-23', '16:00:00', 'NORMAL'),
(6, 1, 77, '2020-06-24', '20:00:00', 'ESPECT'),
(7, 1, 78, '2020-06-25', '17:00:00', 'NORMAL'),
(8, 1, 78, '2020-06-26', '22:00:00', 'NORMAL'),
(9, 2, 78, '2020-06-27', '20:30:00', 'NORMAL'),
(10, 2, 79, '2020-06-24', '11:30:00', 'ESPECT'),
(11, 2, 79, '2020-06-26', '11:45:00', 'MATINA'),
(12, 2, 79, '2020-06-27', '11:35:00', 'MATINA'),
(13, 1, 80, '2020-06-22', '17:00:00', 'NORMAL'),
(14, 2, 80, '2020-06-28', '11:30:00', 'MATINA'),
(15, 3, 81, '2020-06-23', '21:45:00', 'SALA3D'),
(16, 3, 81, '2020-06-26', '19:40:00', 'SALA3D'),
(17, 3, 81, '2020-06-28', '19:30:00', 'SALA3D'),
(18, 2, 82, '2020-06-29', '20:30:00', 'NORMAL'),
(19, 2, 82, '2020-06-30', '22:40:00', 'NORMAL'),
(20, 2, 82, '2020-07-01', '23:00:00', 'ESPECT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idUsuario` int(11) NOT NULL,
  `idProyeccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `idSala` int(11) NOT NULL,
  `aforo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`idSala`, `aforo`) VALUES
(1, 52),
(2, 60),
(3, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `codTarifa` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `precio` double(10,0) NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`codTarifa`, `nombre`, `precio`, `descripcion`) VALUES
('ESPECT', 'Día del espectador', 6, 'Todos los miércoles disfruta de tus películas favoritas a un precio de risa.'),
('MATINA', 'Matinal', 6, 'En nuestro cine podrás disfrutar de un precio especial si nos visitas por las mañanas.'),
('NORMAL', 'Entrada normal', 10, 'El precio estándar de nuestras películas. No somos los más baratos, pero sí somos los mejores.'),
('PAREJA', 'Día de la pareja', 4, 'Si vienes acompañado este día, por solo 8 euros disfrutarás de dos entradas.'),
('SALA3D', 'Sala 3D', 13, 'Siéntete dentro de la película disfrutando de nuestras salas 3D.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `mail`, `pass`, `admin`) VALUES
(24, 'Admin', 'admin@cinespi.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(25, 'Usuario', 'usuario@usuario.com', 'f8032d5cae3de20fcec887f395ec9a6a', 0),
(54, 'jose0', 'joselq_88@hotmail.com', '2c4b58312079fbf000d193cce6ce3c8d', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `idUsuario` int(11) NOT NULL,
  `idPelicula` int(11) NOT NULL,
  `valoracion` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`idPelicula`);

--
-- Indices de la tabla `proyecciones`
--
ALTER TABLE `proyecciones`
  ADD PRIMARY KEY (`idProyeccion`) USING BTREE,
  ADD KEY `idSala` (`idSala`,`idPelicula`),
  ADD KEY `codtarifa` (`codtarifa`),
  ADD KEY `idPelicula` (`idPelicula`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idProyeccion` (`idProyeccion`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`idSala`);

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`codTarifa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `idPelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proyecciones`
--
ALTER TABLE `proyecciones`
  ADD CONSTRAINT `proyecciones_ibfk_1` FOREIGN KEY (`idSala`) REFERENCES `salas` (`idSala`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `proyecciones_ibfk_2` FOREIGN KEY (`codtarifa`) REFERENCES `tarifas` (`codTarifa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `proyecciones_ibfk_3` FOREIGN KEY (`idPelicula`) REFERENCES `pelicula` (`idPelicula`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`idProyeccion`) REFERENCES `proyecciones` (`idProyeccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
