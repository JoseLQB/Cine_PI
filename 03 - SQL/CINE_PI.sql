-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2020 a las 20:23:15
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
-- Base de datos: `cinepi`
--
CREATE DATABASE `cinepi`;
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
  `notaMedia` double NOT NULL DEFAULT 5,
  `sinopsis` varchar(1550) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `director` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `trailer` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `cartel` varchar(222) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`idPelicula`, `pais`, `genero`, `duracion`, `anEstreno`, `notaMedia`, `sinopsis`, `titulo`, `director`, `trailer`, `cartel`) VALUES
(1, 'Estados Unidos', 'Comedia', 99, 2020, 5, 'Sonic, el descarado erizo azul basado en la famosa serie de videojuegos de Sega, vivirá aventuras y desventuras cuando conoce a su amigo humano y policía, Tom Wachowski (James Marsden). Sonic y Tom unirán sus fuerzas para tratar de detener los planes del malvado Dr. Robotnik (Jim Carrey), que intenta atrapar a Sonic con el fin de emplear sus inmensos poderes para dominar el mundo. ', 'Sonic the Hedgehog', 'Jeff Fowler', 'https://www.youtube.com/watch?v=mIgGCaIwdXU', 'https://m.guiadelocio.com/var/guiadelocio.com/storage/images/cine/archivo-peliculas/sonic-la-pelicula/37474353-10-esl-ES/sonic-la-pelicula.jpg'),
(2, 'Estados Unidos', 'Comedia', 104, 2019, 5, 'Cuando el gran detective privado Harry Goodman desaparece misteriosamente; Tim, su hijo de 21 años, debe averiguar qué sucedió. En la investigación lo ayuda el antiguo compañero Pokémon de Harry, el Detective Pikachu: un super detective adorable y ocurrente que se asombra incluso a sí mismo. Tim y Pikachu se dan cuenta que increíblemente pueden comunicarse, y unen fuerzas en una aventura para develar el misterio enmarañado. Mientras buscan pistas en las calles resplandecientes de Ryme City, una vasta metrópolis moderna donde los humanos y los Pokémon comparten un mundo real hiperrealista, encuentran distintos personajes Pokémon y descubren un complot impactante que podría destruir la convivencia pacífica y amenazar a todo el universo Pokémon.', 'Pokémon: Detective Pikachu', 'Rob Letterman', 'https://www.youtube.com/watch?v=8PvyIAEfPgE', 'https://es.web.img3.acsta.net/pictures/19/02/28/14/24/3080465.jpg'),
(3, 'Japón', 'Aventuras', 103, 2019, 5, '\r\nLuca sigue los pasos de su padre para rescatar a su madre del malvado obispo Ladja. Su única esperanza es dar con el héroe celestial que esgrime la Espada de los Cielos. Película de animación 3D basada en videojuego de Square Enix \"Dragon Quest V: Hand of the Heavenly Bride\".', 'Dragon Quest: Your History', 'Takashi Yamazaki', 'https://www.youtube.com/watch?v=ANB1TBs6RRA', 'https://ramenparados.com/wp-content/uploads/2019/06/dragon-quest-your-story-poster.jpg');

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
(111, 1, 1, '2020-04-30', '12:16:00', 'NORMAL'),
(222, 3, 3, '2020-04-30', '19:16:00', 'ESPECT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idUsuario` int(11) NOT NULL,
  `idProyeccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idUsuario`, `idProyeccion`) VALUES
(3, 222);

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
  `precio` double(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`codTarifa`, `nombre`, `precio`) VALUES
('ESPECT', 'Día del espectador', 6),
('MATINA', 'Matinal', 6),
('NORMAL', 'Entrada normal', 10),
('PAREJA', 'Día de la pareja', 4),
('SALA3D', 'Sala 3D', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(222) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `mail`, `pass`, `admin`) VALUES
(1, 'Jose', 'joselq_88@hotmail.com', 'MCDS2341', 1),
(3, 'Maria', 'maria21@gmail.com', 'MASDE321', 0);

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
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`idUsuario`, `idPelicula`, `valoracion`) VALUES
(1, 1, 5);

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
  ADD PRIMARY KEY (`idProyeccion`),
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
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD KEY `idUsuario` (`idUsuario`,`idPelicula`),
  ADD KEY `idPelicula` (`idPelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `idPelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `valoracion_ibfk_1` FOREIGN KEY (`idPelicula`) REFERENCES `pelicula` (`idPelicula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `valoracion_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
