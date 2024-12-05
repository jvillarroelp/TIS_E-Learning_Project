-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2024 a las 04:02:25
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
-- Base de datos: `elearning_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesoria`
--

CREATE TABLE `asesoria` (
  `ID_ASESORIA` int(11) NOT NULL,
  `COD_CURSO` int(11) NOT NULL,
  `RUT_USUARIO` int(11) NOT NULL,
  `DOC_RUT_USUARIO` int(11) NOT NULL,
  `FECHA_ASESORIA` date DEFAULT NULL,
  `ESTADO` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificado`
--

CREATE TABLE `certificado` (
  `COD_CERTIFICADO` int(11) NOT NULL,
  `COD_CURSO` int(11) NOT NULL,
  `RUT_USUARIO` int(11) NOT NULL,
  `DESCRIPCION_CERTIFICADO` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `ID_CONTENIDO` int(11) NOT NULL,
  `ID_LECCION` int(11) NOT NULL,
  `TITULO_CONTENIDO` varchar(50) DEFAULT NULL,
  `SUB_TITULO` varchar(100) DEFAULT NULL,
  `CUERPO_CONTENIDO` text DEFAULT NULL,
  `CREACION_CONTENIDO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `COD_CURSO` int(11) NOT NULL,
  `NOMBRE_CURSO` varchar(50) DEFAULT NULL,
  `FECHA_INICIO` date DEFAULT NULL,
  `FECHA_FIN` date DEFAULT NULL,
  `ESTADO` varchar(10) DEFAULT NULL,
  `DESCRIPCION_CURSO` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `RUT_USUARIO` int(11) NOT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `CORREO` varchar(30) DEFAULT NULL,
  `CONTRASENIA` char(10) DEFAULT NULL,
  `COMUNA` varchar(20) DEFAULT NULL,
  `REGION` varchar(20) DEFAULT NULL,
  `ESPECIALIDAD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `RUT_USUARIO` int(11) NOT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `CORREO` varchar(30) DEFAULT NULL,
  `CONTRASENIA` char(10) DEFAULT NULL,
  `COMUNA` varchar(20) DEFAULT NULL,
  `REGION` varchar(20) DEFAULT NULL,
  `N_MATRICULA` int(11) DEFAULT NULL,
  `APELLIDO` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `COD_EVALUACION` int(11) NOT NULL,
  `COD_CURSO` int(11) NOT NULL,
  `RUT_USUARIO` int(11) NOT NULL,
  `FECHA_DIAGNOSTICO` date DEFAULT NULL,
  `DESCRIPCION_EVALUACION` text DEFAULT NULL,
  `NOMBRE_EVALUACION` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imparte`
--

CREATE TABLE `imparte` (
  `RUT_USUARIO` int(11) NOT NULL,
  `COD_CURSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `leccion`
--

CREATE TABLE `leccion` (
  `ID_LECCION` int(11) NOT NULL,
  `ID_MODULO` int(11) NOT NULL,
  `NOMBRE_LECCION` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `ID_MODULO` int(11) NOT NULL,
  `COD_CURSO` int(11) NOT NULL,
  `NOMBRE_MODULO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `FOLIO` int(11) NOT NULL,
  `ID_ASESORIA` int(11) NOT NULL,
  `RUT_USUARIO` int(11) NOT NULL,
  `METODO_PAGO` varchar(20) DEFAULT NULL,
  `MONTO` int(11) DEFAULT NULL,
  `FECHA_PAGO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_evaluacion`
--

CREATE TABLE `preguntas_evaluacion` (
  `ID_PREGUNTA` int(11) NOT NULL,
  `COD_EVALUACION` int(11) NOT NULL,
  `RUT_USUARIO` int(11) NOT NULL,
  `PREGUNTA` text DEFAULT NULL,
  `COMENTARIO` text DEFAULT NULL,
  `TIPO_PREGUNTA` text DEFAULT NULL,
  `RESPUESTA_CORRECTA` text DEFAULT NULL,
  `ALTERNATIVA` text DEFAULT NULL,
  `FECHA_PREGUNTA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presenta`
--

CREATE TABLE `presenta` (
  `RUT_USUARIO` int(11) NOT NULL,
  `COD_EVALUACION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `realiza`
--

CREATE TABLE `realiza` (
  `RUT_USUARIO` int(11) NOT NULL,
  `COD_CURSO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `COD_RECURSO` int(11) NOT NULL,
  `NOMBRE_RECURSO` varchar(50) DEFAULT NULL,
  `TIPO_RECURSO` varchar(50) DEFAULT NULL,
  `DESCRIPCION_RECURSO` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relationship_13`
--

CREATE TABLE `relationship_13` (
  `COD_RECURSO` int(11) NOT NULL,
  `ID_LECCION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_evaluacion`
--

CREATE TABLE `respuesta_evaluacion` (
  `ID_RESPUESTA` int(11) NOT NULL,
  `ID_PREGUNTA` int(11) NOT NULL,
  `COD_EVALUACION` int(11) NOT NULL,
  `RUT_USUARIO` int(11) NOT NULL,
  `FECHA_RESPUESTA` date DEFAULT NULL,
  `RESPUESTA` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `NOMBRE` varchar(30) DEFAULT NULL,
  `CORREO` varchar(30) DEFAULT NULL,
  `CONTRASENIA` varchar(255) DEFAULT NULL,
  `RUT_USUARIO` int(11) NOT NULL,
  `COMUNA` varchar(20) DEFAULT NULL,
  `REGION` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`NOMBRE`, `CORREO`, `CONTRASENIA`, `RUT_USUARIO`, `COMUNA`, `REGION`) VALUES
('Other', 'email@correo.com', '0', 11345678, 'Camarones', '0'),
('Prueba', 'correoprueba@gmail.com', '123', 12345345, 'Iquique', '0'),
('Testeo Dos', 'correotest@correo.com', '321', 12345543, 'Iquique', '0'),
('Test', 'test@correo.com', '12345', 12345677, 'Iquique', '0'),
('Javier', 'ejemplo@correo.com', '12345', 12345678, 'Iquique', 'Tarapacá'),
('ssss', 'correodos@correo.com', '0', 20345678, 'Camarones', '0'),
('Testeotres', 'educatest@correo.com', '0', 23345666, 'Camiña', '0'),
('TercerTest', 'Tercercorreo@correo.com', '$2y$10$M4owhuZ80ey1T8GmDaasgu1EjmGA1i1BBzLIBlINcnuqf31ITbKpW', 122323336, 'Alto Hospicio', 'Tarapacá'),
('Cuartotest', 'cuartocorreo@correo.com', '$2y$10$YYA5Fw3bJpGa8iXgv7f7O.xS8zeTkSnW7fC/VL5Tz/vMIFCH/yZbm', 122323667, 'Lautaro', 'Araucanía'),
('QuintoTest', 'quintocorreo@correo.com', '$2y$10$qrpQJ2hr2NM8cRqbEorruuIj5KTvlmaQ3OQBIkAseT7toQUqS/BAa', 124536657, 'Iquique', 'Tarapacá'),
('Sextotest', 'sextocorreo@correo.com', '$2y$10$HbgIXVFiEDjsqEJlHaFXG.V/KC9tIG8n9QGkMxFL7NaV1cmHAzYfS', 125652326, 'Arica', 'Arica y Parinacota'),
('Simon', 'simon@correo.com', '$2y$10$fxlJjK57UM/f6D7IYWvcT.qKj2x87jyQOm8DNxqb.Mhzn5VxMlp.i', 172346749, 'Colchane', 'Tarapacá'),
('Qwerty', 'emailqwer@correo.com', '$2y$10$NeXfeWDFH5TD067ef4snQejHVmJeQ.dhS9nIqA6.Mfs3jQuw5QEZS', 192323435, 'Independencia', 'Metropolitana'),
('nueevotest', 'nuevocorreo@correo.com', '$2y$10$/9QR4NuM1LggIcdTlk1Ea.jbHyMNadRM6r47Df7Kfa5v67Yuyg0QW', 212323345, 'Iquique', 'Tarapacá'),
('TestJavier', 'emailcorreo@correo.com', '$2y$10$S95lCFQoQrngPxP2tA6RrOABqSK15uLVVYbieRxKeJh5dtmSb1yuW', 212324547, 'Iquique', 'Tarapacá'),
('Segundotest', 'Segundocorreo@correo.com', '$2y$10$b2DOMG9BxNFwIydB/B1b5u.Yw4P65BwYr0TGRDdMFl.aEyHzI9fyy', 233534647, 'Mejillones', 'Antofagasta'),
('Testeo Cuatro', 'cuatrocorreo@correo.com', '$2y$10$ExIFuQGhRPUFQk9WYTRxd.iRUUDLS6C82oGSHKRw3yElzosVpVUUC', 234542167, 'Alto Hospicio', 'Tarapacá');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesoria`
--
ALTER TABLE `asesoria`
  ADD PRIMARY KEY (`ID_ASESORIA`),
  ADD KEY `FK_BRINDA` (`DOC_RUT_USUARIO`),
  ADD KEY `FK_REQUIERE` (`COD_CURSO`),
  ADD KEY `FK_SOLICITA` (`RUT_USUARIO`);

--
-- Indices de la tabla `certificado`
--
ALTER TABLE `certificado`
  ADD PRIMARY KEY (`COD_CERTIFICADO`),
  ADD KEY `FK_EMITE` (`COD_CURSO`),
  ADD KEY `FK_OBTIENE` (`RUT_USUARIO`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`ID_CONTENIDO`),
  ADD KEY `FK_TIENE` (`ID_LECCION`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`COD_CURSO`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`RUT_USUARIO`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`RUT_USUARIO`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`COD_EVALUACION`),
  ADD KEY `FK_ASIGNA` (`COD_CURSO`),
  ADD KEY `FK_DESARROLLA` (`RUT_USUARIO`);

--
-- Indices de la tabla `imparte`
--
ALTER TABLE `imparte`
  ADD PRIMARY KEY (`RUT_USUARIO`,`COD_CURSO`);

--
-- Indices de la tabla `leccion`
--
ALTER TABLE `leccion`
  ADD PRIMARY KEY (`ID_LECCION`),
  ADD KEY `FK_DIVIDE` (`ID_MODULO`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`ID_MODULO`),
  ADD KEY `FK_PERTENECE` (`COD_CURSO`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`FOLIO`),
  ADD KEY `FK_EFECTUA` (`RUT_USUARIO`);

--
-- Indices de la tabla `preguntas_evaluacion`
--
ALTER TABLE `preguntas_evaluacion`
  ADD PRIMARY KEY (`ID_PREGUNTA`);

--
-- Indices de la tabla `presenta`
--
ALTER TABLE `presenta`
  ADD PRIMARY KEY (`RUT_USUARIO`,`COD_EVALUACION`);

--
-- Indices de la tabla `realiza`
--
ALTER TABLE `realiza`
  ADD PRIMARY KEY (`RUT_USUARIO`,`COD_CURSO`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`COD_RECURSO`);

--
-- Indices de la tabla `relationship_13`
--
ALTER TABLE `relationship_13`
  ADD PRIMARY KEY (`COD_RECURSO`,`ID_LECCION`);

--
-- Indices de la tabla `respuesta_evaluacion`
--
ALTER TABLE `respuesta_evaluacion`
  ADD PRIMARY KEY (`ID_RESPUESTA`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`RUT_USUARIO`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asesoria`
--
ALTER TABLE `asesoria`
  ADD CONSTRAINT `FK_BRINDA` FOREIGN KEY (`DOC_RUT_USUARIO`) REFERENCES `docente` (`RUT_USUARIO`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_REQUIERE` FOREIGN KEY (`COD_CURSO`) REFERENCES `curso` (`COD_CURSO`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SOLICITA` FOREIGN KEY (`RUT_USUARIO`) REFERENCES `estudiante` (`RUT_USUARIO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `certificado`
--
ALTER TABLE `certificado`
  ADD CONSTRAINT `FK_EMITE` FOREIGN KEY (`COD_CURSO`) REFERENCES `curso` (`COD_CURSO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_OBTIENE` FOREIGN KEY (`RUT_USUARIO`) REFERENCES `estudiante` (`RUT_USUARIO`);

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `FK_TIENE` FOREIGN KEY (`ID_LECCION`) REFERENCES `leccion` (`ID_LECCION`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `FK_INHERITANCE_2` FOREIGN KEY (`RUT_USUARIO`) REFERENCES `usuario` (`RUT_USUARIO`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `FK_INHERITANCE_1` FOREIGN KEY (`RUT_USUARIO`) REFERENCES `usuario` (`RUT_USUARIO`);

--
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `FK_ASIGNA` FOREIGN KEY (`COD_CURSO`) REFERENCES `curso` (`COD_CURSO`),
  ADD CONSTRAINT `FK_DESARROLLA` FOREIGN KEY (`RUT_USUARIO`) REFERENCES `docente` (`RUT_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `leccion`
--
ALTER TABLE `leccion`
  ADD CONSTRAINT `FK_DIVIDE` FOREIGN KEY (`ID_MODULO`) REFERENCES `modulos` (`ID_MODULO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `FK_PERTENECE` FOREIGN KEY (`COD_CURSO`) REFERENCES `curso` (`COD_CURSO`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `FK_EFECTUA` FOREIGN KEY (`RUT_USUARIO`) REFERENCES `estudiante` (`RUT_USUARIO`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
