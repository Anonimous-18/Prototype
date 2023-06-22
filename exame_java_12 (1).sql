-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2023 a las 15:08:33
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `exame_java_12`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crearempleado`
--

CREATE TABLE `crearempleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `puesto` varchar(40) DEFAULT NULL,
  `departamento` varchar(45) DEFAULT NULL,
  `proyecto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `crearempleado`
--

INSERT INTO `crearempleado` (`id`, `nombre`, `apellido`, `descripcion`, `puesto`, `departamento`, `proyecto`) VALUES
(1076817779, 'vale', '11', 'anonimous18', 'negocio', 'ggg', 'kkk');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crearpuesto`
--

CREATE TABLE `crearpuesto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `iddepartamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `crearpuesto`
--

INSERT INTO `crearpuesto` (`id`, `nombre`, `descripcion`, `iddepartamento`) VALUES
(0, '', '', 0),
(88, 'yyyyyyyyyy', 'ytuytuytuty', 2),
(667, 'eheh', 'HOLA', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `de_id` int(11) NOT NULL,
  `de_nombre` varchar(45) DEFAULT NULL,
  `de_descripcion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`de_id`, `de_nombre`, `de_descripcion`) VALUES
(1001, 'Finanzas', 'Administra los aspectos financieros de la empresa'),
(1002, 'Marketing', 'Diseña y ejecuta estrategias de marketing para promocionar los productos a los clientes'),
(1003, 'Ventas', 'Se encarga de gestionar y cerrar acuerdos comerciales con los clientess'),
(1004, 'Operaciones', 'Supervisa las operaciones diarias de la empresa'),
(1005, 'Desarrollo de Productos', 'Se dedica a la investigación, el diseño y el desarrollo de nuevos productos'),
(1006, 'Servicio al Cliente', 'Brinda asistencia y soporte a los clientes, '),
(1007, 'Tecnología de la Información', 'Gestiona los sistemas informáticos, la infraestructura tecnológica y el soporte técnico'),
(1008, 'Logística', 'Se encarga de la gestión de inventario, el transporte y la distribución'),
(1009, 'Calidad', 'Establece y garantiza el cumplimiento de los estándares de calidad en los productos'),
(1010, 'Legal', 'Proporciona asesoría legal a la empresa en asuntos relacionados con contratos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentocrear`
--

CREATE TABLE `departamentocrear` (
  `id` int(11) NOT NULL,
  `departamento` varchar(45) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamentocrear`
--

INSERT INTO `departamentocrear` (`id`, `departamento`, `descripcion`) VALUES
(0, '23', '23'),
(1840, '', ''),
(9999999, 'gg', 'gg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `em_id` int(11) NOT NULL,
  `em_nombre` varchar(45) DEFAULT NULL,
  `em_apellido` varchar(45) DEFAULT NULL,
  `em_descripcion` varchar(250) DEFAULT NULL,
  `de_id` int(11) DEFAULT NULL,
  `pu_id` int(11) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`em_id`, `em_nombre`, `em_apellido`, `em_descripcion`, `de_id`, `pu_id`, `pro_id`) VALUES
(1001, 'brayan', 'gomez', 'trabaja con sql', 1001, 7001, 4001),
(1002, 'sergio', 'giraldo', 'trabaja con php', 1002, 7002, 4002),
(1003, 'valeria', 'perez', 'trabaja con html', 1003, 71003, 4003),
(1004, 'valeria', 'giraldo', 'trabaja con c#', 1004, 10074, 4004),
(1005, 'mateo', 'ocampo', 'trabaja con c++', 1005, 10075, 4005),
(1006, 'tomas', 'velez', 'trabaja con python', 1006, 17006, 4006),
(1007, 'ricardo', 'ospina', 'trabaja con javaScrip', 1007, 10707, 4007),
(1008, 'juan camilo', 'arango', 'trabaja consql', 1008, 10708, 4008),
(1009, 'julian', 'marolanda', 'trabaja con sql', 1009, 17009, 4009),
(1010, 'santiago', 'quintero', 'trabaja consql', 1010, 17010, 4010),
(10011, 'fredy', 'chica', 'trabaja con sql', 1001, 10701, 5006),
(10012, 'alejandra', 'gonzales', 'trabaja consql', 1002, 10702, 5007),
(10013, 'leonardo', 'cajamarca', 'trabaja consql', 1003, 10703, 5008),
(10014, 'ximena', 'giraldo', 'trabaja con', 1004, 10704, 5009),
(10115, 'sergio', 'giraldo', 'trabaja con', 1005, 10705, 5010);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_proyecto`
--

CREATE TABLE `empleado_proyecto` (
  `pro_id` int(11) DEFAULT NULL,
  `em_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `eva_id` int(11) NOT NULL,
  `eva_fecha` date DEFAULT NULL,
  `eva_descripcion` varchar(250) DEFAULT NULL,
  `em_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacionescrear`
--

CREATE TABLE `evaluacionescrear` (
  `id` int(11) NOT NULL,
  `departamento` varchar(59) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idempleado` int(11) DEFAULT NULL,
  `nombreempleado` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evaluacionescrear`
--

INSERT INTO `evaluacionescrear` (`id`, `departamento`, `descripcion`, `fecha`, `idempleado`, `nombreempleado`) VALUES
(22, 'manizals', 'holabro', '3008-06-12', 82, 'anuel'),
(455, '44', 'cvbcvb', '0005-03-06', 4, 'fdgfg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `pro_id` int(11) NOT NULL,
  `pro_nombre` varchar(45) DEFAULT NULL,
  `pro_descripcion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`pro_id`, `pro_nombre`, `pro_descripcion`) VALUES
(4001, 'inicio de sesion', 'trabaja con sql'),
(4002, 'sergio', 'trabaja con php'),
(4003, 'valeria', 'trabaja con html'),
(4004, 'valeria', 'trabaja con c#'),
(4005, 'mateo', 'trabaja con c++'),
(4006, 'tomas', 'trabaja con python'),
(4007, 'ricardo', 'trabaja con javaScrip'),
(4008, 'juan camilo', 'trabaja consql'),
(4009, 'julian', 'trabaja con sql'),
(4010, 'santiago', 'trabaja consql'),
(5006, 'fredy', 'trabaja con sql'),
(5007, 'alejandra', 'trabaja consql'),
(5008, 'leonardo', 'trabaja consql'),
(5009, 'ximena', 'trabaja con sql'),
(5010, 'sergio', 'trabaja html');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectocrear`
--

CREATE TABLE `proyectocrear` (
  `id` int(11) NOT NULL,
  `departamento` varchar(70) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyectocrear`
--

INSERT INTO `proyectocrear` (`id`, `departamento`, `descripcion`) VALUES
(88, 'mmmmm', 'mmmmm'),
(455, 'ggg', 'dd'),
(5556, 'musculosO', 'HOLA'),
(88393, 'sfgsdgsdf', 'yyy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `pu_id` int(11) NOT NULL,
  `pu_nombre` varchar(45) DEFAULT NULL,
  `pu_descripcion` varchar(250) DEFAULT NULL,
  `de_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`pu_id`, `pu_nombre`, `pu_descripcion`, `de_id`) VALUES
(7001, 'operario', 'trabaja con sql', 1001),
(7002, 'supervisor', 'trabaja con php', 1002),
(10074, 'empleada', 'trabaja con c#', 1004),
(10075, 'operario', 'trabaja con c++', 1005),
(10701, 'sub jefe programador', 'trabaja con sql', 1006),
(10702, 'supervisor', 'trabaja consql', 1007),
(10703, 'empleada', 'trabaja consql', 1008),
(10704, 'operario', 'trabaja con css', 1009),
(10705, 'supervisor', 'trabaja con c++', 1010),
(10707, 'operario', 'trabaja con javaScrip', 1007),
(10708, 'supervisor', 'trabaja consql', 1008),
(17006, 'jefe programador ', 'trabaja con python', 1006),
(17009, 'secretaria', 'trabaja con sql', 1009),
(17010, 'empleada', 'trabaja consql', 1010),
(71003, 'secretaria', 'trabaja con html', 1003);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `user` varchar(40) DEFAULT NULL,
  `pass` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `user`, `pass`) VALUES
(1, 'prueba', 'prueba'),
(3, 'prueba3', 'prueba3'),
(4, '2', '2'),
(5, '3', '3'),
(6, 'eee', 'eee'),
(7, 'leo', 'leo'),
(8, 'hola', 'hola'),
(9, '6787687886', 'ttt'),
(10, 'ttt', '12'),
(11, 'ttt', '11'),
(12, 'chechi', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `crearempleado`
--
ALTER TABLE `crearempleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `crearpuesto`
--
ALTER TABLE `crearpuesto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`de_id`);

--
-- Indices de la tabla `departamentocrear`
--
ALTER TABLE `departamentocrear`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`em_id`),
  ADD KEY `de_id` (`de_id`),
  ADD KEY `pu_id` (`pu_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indices de la tabla `empleado_proyecto`
--
ALTER TABLE `empleado_proyecto`
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `em_id` (`em_id`);

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`eva_id`),
  ADD KEY `em_id` (`em_id`);

--
-- Indices de la tabla `evaluacionescrear`
--
ALTER TABLE `evaluacionescrear`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indices de la tabla `proyectocrear`
--
ALTER TABLE `proyectocrear`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`pu_id`),
  ADD KEY `de_id` (`de_id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`de_id`) REFERENCES `departamento` (`de_id`),
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`pu_id`) REFERENCES `puesto` (`pu_id`),
  ADD CONSTRAINT `empleado_ibfk_3` FOREIGN KEY (`pro_id`) REFERENCES `proyecto` (`pro_id`);

--
-- Filtros para la tabla `empleado_proyecto`
--
ALTER TABLE `empleado_proyecto`
  ADD CONSTRAINT `empleado_proyecto_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `proyecto` (`pro_id`),
  ADD CONSTRAINT `empleado_proyecto_ibfk_2` FOREIGN KEY (`em_id`) REFERENCES `empleado` (`em_id`);

--
-- Filtros para la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD CONSTRAINT `evaluaciones_ibfk_1` FOREIGN KEY (`em_id`) REFERENCES `empleado` (`em_id`);

--
-- Filtros para la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD CONSTRAINT `puesto_ibfk_1` FOREIGN KEY (`de_id`) REFERENCES `departamento` (`de_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
