-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2018 a las 05:21:37
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5
CREATE DATABASE db_escuela;

USE db_escuela;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_escuela`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETE_ALUMNO` (IN `idpar` INT)  NO SQL
DELETE FROM tbl_alumnos WHERE AlumnoID = idpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETE_ASIGNACION`(IN `idpar` INT) NO SQL
DELETE FROM tbl_aulas_asignaturas WHERE RelacionID = idpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETE_ASIGNATURA` (IN `AsignaturaIDpar` INT)  NO SQL
DELETE FROM tbl_asignaturas WHERE AsignaturaID = AsignaturaIDpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETE_AULA` (IN `idpar` INT)  NO SQL
DELETE FROM tbl_aulas WHERE AulaID = idpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETE_HORARIO` (IN `idpar` INT)  NO SQL
DELETE FROM tbl_horarios WHERE HorarioID = idpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DELETE_PROFESOR` (IN `idpar` INT)  NO SQL
DELETE FROM tbl_profesores WHERE ProfesorID = idpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_ALUMNO` (IN `Nombrepar` VARCHAR(50), IN `Apellidopar` VARCHAR(50), IN `Generopar` INT(1), IN `FechaNacimientopar` DATE, IN `Telefonopar` VARCHAR(9), IN `FechaRegistropar` DATE, IN `Estadopar` TINYINT(1))  NO SQL
INSERT INTO tbl_alumnos (Nombre, Apellido, Genero, FechaNacimiento, Telefono, FechaRegistro, Estado) VALUES (Nombrepar, Apellidopar, Generopar, FechaNacimientopar, Telefonopar, FechaRegistropar, Estadopar)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_ASIGNACION`(IN `idhorapar` INT, IN `idasignaturapar` INT, IN `idaulapar` INT)
    NO SQL
INSERT INTO tbl_aulas_asignaturas (AulaID, AsignaturaID, HorarioID) VALUES (idaulapar, idasignaturapar, idhorapar)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_ASIGNATURA` (IN `Asignaturapar` VARCHAR(25), IN `UVpar` INT)  NO SQL
INSERT INTO tbl_asignaturas (Asignatura, UV) 												VALUES 	(Asignaturapar, UVpar)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_AULA` (IN `Aulapar` VARCHAR(25), IN `Capacidadpar` INT(3))  NO SQL
INSERT INTO tbl_aulas (Aula, Capacidad) VALUES (Aulapar, Capacidadpar)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_HORARIO` (IN `Diapar` INT(1), IN `Hora_iniciopar` TIME, IN `Hora_finpar` TIME)  NO SQL
INSERT INTO tbl_horarios (Dia, Hora_inicio, Hora_fin) VALUES (Diapar, Hora_iniciopar, Hora_finpar)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_PROFESOR` (IN `Nombrepar` VARCHAR(50), IN `Apellidopar` VARCHAR(50), IN `Duipar` VARCHAR(10), IN `Telefonopar` VARCHAR(9), IN `Estadopar` TINYINT(1))  NO SQL
INSERT INTO tbl_profesores (Nombre, Apellido, Dui, Telefono, Estado) VALUES(Nombrepar, Apellidopar, Duipar, Telefonopar, Estadopar)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LOGIN` (IN `puser` VARCHAR(50), IN `ppass` VARCHAR(500), IN `pope` INT, OUT `presult` INT)  NO SQL
IF pope >0 THEN
SELECT count(*) INTO presult FROM tbl_usuarios
WHERE Usuario = puser AND Pass = ppass;
ELSE
SELECT count(*) INTO presult FROM tbl_usuarios
WHERE Usuario = puser;
END IF$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `READ_ALUMNO` ()  NO SQL
SELECT * FROM tbl_alumnos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `READ_ALUMNO_ID` (IN `idpar` INT)  NO SQL
SELECT * FROM tbl_alumnos WHERE AlumnoID = idpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `READ_ASIGNACION`()
    NO SQL
SELECT au.Aula, asi.Asignatura, ho.Hora_inicio, ho.Hora_fin FROM tbl_aulas_asignaturas 
INNER JOIN tbl_aulas AS au ON tbl_aulas_asignaturas.AulaID = au.AulaID
INNER JOIN tbl_asignaturas AS asi ON tbl_aulas_asignaturas.AsignaturaID = asi.AsignaturaID
inner JOIN tbl_horarios AS ho ON tbl_aulas_asignaturas.HorarioID = ho.HorarioID$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `READ_ASIGNACION_ID`(IN `idrelacionpar` INT)
    NO SQL
SELECT au.Aula, asi.Asignatura, ho.Hora_inicio, ho.Hora_fin FROM tbl_aulas_asignaturas 
INNER JOIN tbl_aulas AS au ON tbl_aulas_asignaturas.AulaID = au.AulaID
INNER JOIN tbl_asignaturas AS asi ON tbl_aulas_asignaturas.AsignaturaID = asi.AsignaturaID
inner JOIN tbl_horarios AS ho ON tbl_aulas_asignaturas.HorarioID = ho.HorarioID
WHERE RelacionID = idrelacionpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `READ_ASIGNATURA` ()  NO SQL
SELECT * FROM tbl_asignaturas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `READ_ASIGNATURA_ID` (IN `idpar` INT)  NO SQL
SELECT * FROM tbl_asignaturas WHERE AsignaturaID = idpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `READ_AULA` ()  NO SQL
SELECT * FROM tbl_aulas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `READ_AULA_ID` (IN `idpar` INT)  NO SQL
SELECT * FROM tbl_aulas WHERE AulaID = idpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `READ_HORARIO` ()  NO SQL
SELECT * FROM tbl_horarios$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `READ_HORARIO_ID` (IN `idpar` INT)  NO SQL
SELECT * FROM tbl_horarios WHERE HorarioID = idpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `READ_PROFESOR` ()  NO SQL
SELECT * FROM tbl_profesores$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `READ_PROFESOR_ID` (IN `idpar` INT)  NO SQL
SELECT * FROM tbl_profesores WHERE ProfesorID =idpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `READ_ROLES` ()  NO SQL
SELECT * FROM tbl_roles$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_ALUMNO` (IN `Nombrepar` VARCHAR(50), IN `Apellidopar` VARCHAR(50), IN `Generopar` INT(1), IN `FechaNacimientopar` DATE, IN `Telefonopar` VARCHAR(9), IN `FechaRegistropar` DATE, IN `Estadopar` TINYINT(1), IN `idpar` INT)  NO SQL
UPDATE tbl_alumnos SET	Nombre = Nombrepar, 
						Apellido = Apellidopar,
                        Genero = Generopár,
                        FechaNacimiento = FechaNacimientopar,
                        Telefono = Telefonopar,
                        FechaRegistro = FechaRegistropar,
                        Estado = Estadopar
                            WHERE AlumnoID = idpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_ASIGNACION`(IN `aulaidpar` INT, IN `asiganturaidpar` INT, IN `horarioidpar` INT, IN `relacionidpar` INT)
    NO SQL
UPDATE tbl_aulas_asignaturas SET	AulaID = aulaidpar, 
						AsignaturaID = asiganturaidpar,
                        HorarioID = horarioidpar
                            WHERE RelacionID = relacionidpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_ASIGNATURA` (IN `Asignaturapar` VARCHAR(25), IN `UVpar` INT, IN `AsignaturaIDpar` INT)  NO SQL
UPDATE tbl_asignaturas SET	Asignatura = Asignaturapar, 
							UV = UVpar
                            WHERE AsignaturaID = AsignaturaIDpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_AULA` (IN `Aulapar` VARCHAR(25), IN `Capacidadpar` INT(3), IN `idpar` INT)  NO SQL
UPDATE tbl_aulas SET	Aula = Aulapar, 
						Capacidad = Capacidadpar
                            WHERE AulaID = idpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_HORARIO` (IN `Diapar` INT(1), IN `Hora_iniciopar` TIME, IN `Hora_finpar` TIME, IN `idpar` INT)  NO SQL
UPDATE tbl_horarios SET Dia = Diapar, 
						Hora_inicio = Hora_iniciopar, 
                        Hora_fin = Hora_finpar
                        WHERE HorarioID  = idpar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UPDATE_PROFESOR` (IN `Nombrepar` VARCHAR(50), IN `Apellidopar` VARCHAR(50), IN `Duipar` VARCHAR(10), IN `Telefonopar` VARCHAR(9), IN `Estadopar` INT(1), IN `idpar` INT)  NO SQL
UPDATE tbl_profesores SET	Nombre = Nombrepar, 
						Apellido = Apellidopar,
                        Dui = Duipar,
                        Telefono = Telefonopar,
                        Estado = Estadopar
                            WHERE ProfesorID = idpar$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_alumnos`
--

CREATE TABLE `tbl_alumnos` (
  `AlumnoID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Genero` int(1) NOT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Telefono` varchar(9) DEFAULT NULL,
  `FechaRegistro` date DEFAULT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_alumnos`
--

INSERT INTO `tbl_alumnos` (`AlumnoID`, `Nombre`, `Apellido`, `Genero`, `FechaNacimiento`, `Telefono`, `FechaRegistro`, `Estado`) VALUES
(1, 'Pablo', 'Castillo', 1, '0000-00-00', '2222-2222', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_asignaturas`
--

CREATE TABLE `tbl_asignaturas` (
  `AsignaturaID` int(11) NOT NULL,
  `Asignatura` varchar(25) NOT NULL,
  `UV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_asignaturas`
--

INSERT INTO `tbl_asignaturas` (`AsignaturaID`, `Asignatura`, `UV`) VALUES
(1, 'Lenguaje', 0),
(2, 'Matematica', 0),
(3, 'Sociales', 0),
(4, 'Ciencia', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_aulas`
--

CREATE TABLE `tbl_aulas` (
  `AulaID` int(11) NOT NULL,
  `Aula` varchar(25) NOT NULL,
  `Capacidad` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_aulas`
--

INSERT INTO `tbl_aulas` (`AulaID`, `Aula`, `Capacidad`) VALUES
(1, 'Seccion A', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_aulas_asignaturas`
--

CREATE TABLE `tbl_aulas_asignaturas` (
  `RelacionID` int(11) NOT NULL,
  `AulaID` int(11) DEFAULT NULL,
  `AsignaturaID` int(11) DEFAULT NULL,
  `HorarioID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_horarios`
--

CREATE TABLE `tbl_horarios` (
  `HorarioID` int(11) NOT NULL,
  `Dia` int(1) DEFAULT NULL,
  `Hora_inicio` time DEFAULT NULL,
  `Hora_fin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_horarios`
--

INSERT INTO `tbl_horarios` (`HorarioID`, `Dia`, `Hora_inicio`, `Hora_fin`) VALUES
(1, 2, '10:20:00', '12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_profesores`
--

CREATE TABLE `tbl_profesores` (
  `ProfesorID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Dui` varchar(10) NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_profesores`
--

INSERT INTO `tbl_profesores` (`ProfesorID`, `Nombre`, `Apellido`, `Dui`, `Telefono`, `Estado`) VALUES
(2, 'Pablo', 'Lopéz', '22224444-5', '5555-5555', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `idrol` int(11) NOT NULL,
  `Nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_roles`
--

INSERT INTO `tbl_roles` (`idrol`, `Nombre`) VALUES
(1, 'Admin'),
(2, 'Invitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `usuarioID` int(11) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Pass` varchar(500) NOT NULL,
  `idrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`usuarioID`, `Usuario`, `Pass`, `idrol`) VALUES
(5, 'admin', 'admin', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_alumnos`
--
ALTER TABLE `tbl_alumnos`
  ADD PRIMARY KEY (`AlumnoID`);

--
-- Indices de la tabla `tbl_asignaturas`
--
ALTER TABLE `tbl_asignaturas`
  ADD PRIMARY KEY (`AsignaturaID`);

--
-- Indices de la tabla `tbl_aulas`
--
ALTER TABLE `tbl_aulas`
  ADD PRIMARY KEY (`AulaID`);

--
-- Indices de la tabla `tbl_aulas_asignaturas`
--
ALTER TABLE `tbl_aulas_asignaturas`
  ADD PRIMARY KEY (`RelacionID`),
  ADD KEY `AulaID` (`AulaID`),
  ADD KEY `AsignaturaID` (`AsignaturaID`),
  ADD KEY `HorarioID` (`HorarioID`);

--
-- Indices de la tabla `tbl_horarios`
--
ALTER TABLE `tbl_horarios`
  ADD PRIMARY KEY (`HorarioID`);

--
-- Indices de la tabla `tbl_profesores`
--
ALTER TABLE `tbl_profesores`
  ADD PRIMARY KEY (`ProfesorID`);

--
-- Indices de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`usuarioID`),
  ADD KEY `idrol` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_alumnos`
--
ALTER TABLE `tbl_alumnos`
  MODIFY `AlumnoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_asignaturas`
--
ALTER TABLE `tbl_asignaturas`
  MODIFY `AsignaturaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_aulas`
--
ALTER TABLE `tbl_aulas`
  MODIFY `AulaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_horarios`
--
ALTER TABLE `tbl_horarios`
  MODIFY `HorarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_profesores`
--
ALTER TABLE `tbl_profesores`
  MODIFY `ProfesorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `usuarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_aulas_asignaturas`
--
ALTER TABLE `tbl_aulas_asignaturas`
  ADD CONSTRAINT `FK_ASIGNATURA` FOREIGN KEY (`AsignaturaID`) REFERENCES `tbl_asignaturas` (`AsignaturaID`),
  ADD CONSTRAINT `FK_AULA` FOREIGN KEY (`AulaID`) REFERENCES `tbl_aulas` (`AulaID`),
  ADD CONSTRAINT `FK_HORARIO` FOREIGN KEY (`HorarioID`) REFERENCES `tbl_horarios` (`HorarioID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
