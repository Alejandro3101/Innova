-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2019 a las 06:04:00
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `innova3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL,
  `nombre_actividad` varchar(200) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` enum('Planeada','Ejecutada','Finalizada','Cancelada') DEFAULT NULL,
  `id_proyecto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `nombre_actividad`, `descripcion`, `estado`, `id_proyecto`) VALUES
(2, 'Revision', 'Revisar Documentos', 'Ejecutada', 15),
(3, 'Actividad 2', 'hh', 'Planeada', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `tipo_documento` varchar(60) DEFAULT NULL,
  `documento` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id_autor`, `nombres`, `apellidos`, `tipo_documento`, `documento`, `email`, `celular`, `id_proyecto`) VALUES
(2, 'carlos', 'ASAS', 'Cédula de ciudadanía', '2132', 'XZXXZ', '23223', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo_formato`
--

CREATE TABLE `codigo_formato` (
  `id_codigo_formato` int(11) NOT NULL,
  `codigo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `codigo_formato`
--

INSERT INTO `codigo_formato` (`id_codigo_formato`, `codigo`, `nombre`) VALUES
(2, 'F002', 'Gestion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `nombre_empresa` varchar(50) DEFAULT NULL,
  `tipo_empresa` varchar(60) DEFAULT NULL,
  `nit` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `encargado` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `sector` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nombre_empresa`, `tipo_empresa`, `nit`, `direccion`, `telefono`, `encargado`, `celular`, `sector`) VALUES
(1, 'sdad', 'Pequeña', '51515', 'sdsdas', '20202002', 'sds', '23223', 'Industria'),
(4, 'SENNOVA', 'Microempresa', '23456', 'DuitamaCiudadela', '3114569408', 'yiber', '3114569408', 'Ganaderia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evidencias`
--

CREATE TABLE `evidencias` (
  `id_evidencia` int(11) NOT NULL,
  `tipo` enum('Imagen','Video','Archivo') DEFAULT NULL,
  `evidencias` text DEFAULT NULL,
  `id_tarea` int(11) DEFAULT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato`
--

CREATE TABLE `formato` (
  `id_formato` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `archivo` text COLLATE utf8_spanish2_ci NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `id_codigo_formato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `formato`
--

INSERT INTO `formato` (`id_formato`, `fecha`, `archivo`, `id_proyecto`, `id_codigo_formato`) VALUES
(19, '2019-12-02', '/vistas/documents/AGA/F002 Gestion G001_2019.java', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id_gasto` int(11) NOT NULL,
  `concepto` varchar(45) DEFAULT NULL,
  `valor_gasto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id_gasto`, `concepto`, `valor_gasto`) VALUES
(1, 'carlos2', '3000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes`
--

CREATE TABLE `integrantes` (
  `id_integrante` int(11) NOT NULL,
  `rol` varchar(60) DEFAULT NULL,
  `estado_integrante` varchar(60) DEFAULT NULL,
  `id_persona` int(11) NOT NULL,
  `id_proyecto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `integrantes`
--

INSERT INTO `integrantes` (`id_integrante`, `rol`, `estado_integrante`, `id_persona`, `id_proyecto`) VALUES
(2, 'Instructor Lider', 'Inactivo', 1, 3),
(3, 'Aprendiz Lider', 'Activo', 5, 15),
(4, 'Aprendiz', 'Activo', 8, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `tipo_documento` varchar(50) DEFAULT NULL,
  `documento` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `profesion` varchar(45) DEFAULT NULL,
  `tipo_vinculacion` varchar(70) DEFAULT NULL,
  `cvlac` varchar(45) DEFAULT NULL,
  `cargo` varchar(70) DEFAULT NULL,
  `ficha` varchar(45) DEFAULT NULL,
  `fecha_vinculacion` varchar(70) DEFAULT NULL,
  `fecha_desvinculacion` varchar(70) DEFAULT NULL,
  `estado_vinculacion` varchar(60) DEFAULT NULL,
  `contrasena` varchar(30) DEFAULT NULL,
  `id_programa` int(11) DEFAULT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `nombres`, `apellidos`, `tipo_documento`, `documento`, `celular`, `email`, `profesion`, `tipo_vinculacion`, `cvlac`, `cargo`, `ficha`, `fecha_vinculacion`, `fecha_desvinculacion`, `estado_vinculacion`, `contrasena`, `id_programa`, `id_rol`) VALUES
(1, 'Carlos', 'Daza', '', '1002772342', '3185290241', 'daza@gmail.com', '', '', '', 'Monitor', '', '2019-11-14', '2019-11-14', 'Activo', 'admin', 1, 1),
(5, 'Yiber Eulices', 'Lopez Choconta', 'Cedula de ciudadania', '1002772342', '3114569408', '', '', '', '', 'Apoyo de sostenimiento', '', '2019-11-16', '2019-11-14', 'Inactivo', '$2a$07$asxx54ahjppf45sd87a5auQ', 4, 1),
(7, 'Doris Yasmin', 'Lopez Choconta', 'Cedula de ciudadania', '1002772342', '3114569408', 'doris@misena.edu.co', '', 'Planta', '', '', '', '2019-11-11', '2019-11-06', 'Activo', '', NULL, 2),
(8, 'Rosmary', 'Barrera Archagua', 'Cedula de ciudadania', '1118776514', '3118624830', 'rbarrera23@misena.edu.co', '', '', '', 'Apoyo de sostenimiento', '1834605', '2019-12-02', '2019-12-21', 'Activo', '776514', 1, 1),
(9, 'yiber', 'eulices3', 'Cedula de ciudadania', '100245', '3114569408', 'yelopez24@mm', '', '', '', 'Monitor', '1692797', '2019-12-18', '2019-12-19', 'Activo', 're', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id_programa` int(11) NOT NULL,
  `nombre_programa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id_programa`, `nombre_programa`) VALUES
(1, 'Análisis y Desarrollo de Sistemas de Información'),
(4, 'Telecomunicaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id_proyecto` int(11) NOT NULL,
  `nombre_proyecto` varchar(45) DEFAULT NULL,
  `tipo_proyecto` varchar(50) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `linea_programatica` varchar(100) DEFAULT NULL,
  `clasificacion` varchar(60) DEFAULT NULL,
  `estado_proyecto` varchar(60) DEFAULT NULL,
  `fecha_cierre` varchar(60) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id_proyecto`, `nombre_proyecto`, `tipo_proyecto`, `codigo`, `linea_programatica`, `clasificacion`, `estado_proyecto`, `fecha_cierre`, `id_empresa`) VALUES
(2, 'AGA', 'Sin Recursos', 'G001_2019', 'Linea de Modernizacion', 'Formativo', 'Cancelado', '2019-11-07', 1),
(3, 'CORPOBOYACA', 'Con Recursos', 'YL-09', 'Linea de Modernizacion', 'Formativo', 'Terminado', '2019-11-06', 1),
(15, 'INNOVA', 'Con Recursos', 'YL-08', 'Linea de Modernizacion', 'Formativo', 'Terminado', '2019-11-13', 1),
(16, 'CARGANDO', 'Sin Recursos', 'G003_2019', 'Linea de Modernizacion', 'Formativo', 'Terminado', '2019-11-13', 1),
(17, 'GAGA1', 'Con Recursos', 'YL001', 'Linea de Modernizacion', 'Formativo', 'Activo', '2019-12-18', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_autor`
--

CREATE TABLE `proyecto_autor` (
  `id_proyecto_autor` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_integrante`
--

CREATE TABLE `proyecto_integrante` (
  `idproyecto_integrante` int(11) NOT NULL,
  `id_proyecto` int(11) DEFAULT NULL,
  `id_integrante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_programa`
--

CREATE TABLE `proyecto_programa` (
  `id_proyecto_programa` int(11) NOT NULL,
  `id_programa` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos`
--

CREATE TABLE `recursos` (
  `id_recurso` int(11) NOT NULL,
  `rubro` varchar(200) DEFAULT NULL,
  `concepto` varchar(45) DEFAULT NULL,
  `valor_rubro` varchar(45) DEFAULT NULL,
  `valor_proyecto` varchar(45) DEFAULT NULL,
  `id_proyecto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recursos`
--

INSERT INTO `recursos` (`id_recurso`, `rubro`, `concepto`, `valor_rubro`, `valor_proyecto`, `id_proyecto`) VALUES
(2, 'yiber', 'dfghjk', 'dfghj', 'dsfghjk', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso_proyecto`
--

CREATE TABLE `recurso_proyecto` (
  `idrecurso_proyecto` int(11) NOT NULL,
  `id_recurso` int(11) DEFAULT NULL,
  `id_proyecto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`, `codigo`) VALUES
(1, 'Aprendiz', 'xcxxc5151'),
(2, 'Instructor', NULL),
(3, 'Rc', NULL),
(4, 'Administrador', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id_tarea` int(11) NOT NULL,
  `nombre_tarea` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` enum('Por Hacer','En Proceso','En Revision','Hecho') DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `id_integrante` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_limite` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id_tarea`, `nombre_tarea`, `descripcion`, `estado`, `id_actividad`, `id_integrante`, `fecha_inicio`, `fecha_limite`) VALUES
(12, 'Revisar', 'Revision', 'Por Hacer', 2, 2, '2019-12-18', '2019-12-26'),
(13, 'hecho', 'hecho', 'Por Hacer', 2, 2, '2019-12-20', '2019-12-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_integrante`
--

CREATE TABLE `tarea_integrante` (
  `id_tarea_integrante` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL,
  `id_integrante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tarea_integrante`
--

INSERT INTO `tarea_integrante` (`id_tarea_integrante`, `id_tarea`, `id_integrante`) VALUES
(11, 12, 3),
(13, 12, 4),
(15, 13, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `fk_actividades_proyectos1_idx` (`id_proyecto`);

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`),
  ADD KEY `fk_autores_proyectos1_idx` (`id_proyecto`);

--
-- Indices de la tabla `codigo_formato`
--
ALTER TABLE `codigo_formato`
  ADD PRIMARY KEY (`id_codigo_formato`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `evidencias`
--
ALTER TABLE `evidencias`
  ADD PRIMARY KEY (`id_evidencia`),
  ADD KEY `fk_Evidencias_tareas1_idx` (`id_tarea`),
  ADD KEY `fk_Evidencias_proyectos1_idx` (`id_proyecto`);

--
-- Indices de la tabla `formato`
--
ALTER TABLE `formato`
  ADD PRIMARY KEY (`id_formato`),
  ADD KEY `IdProyecto` (`id_proyecto`),
  ADD KEY `id_codigo_formato` (`id_codigo_formato`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id_gasto`);

--
-- Indices de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD PRIMARY KEY (`id_integrante`),
  ADD KEY `fk_integrantes_persona1_idx` (`id_persona`),
  ADD KEY `fk_integrantes_proyectos1_idx` (`id_proyecto`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `fk_persona_programa1_idx` (`id_programa`),
  ADD KEY `fk_persona_rol1_idx` (`id_rol`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id_programa`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD KEY `fk_proyectos_empresas1_idx` (`id_empresa`);

--
-- Indices de la tabla `proyecto_autor`
--
ALTER TABLE `proyecto_autor`
  ADD PRIMARY KEY (`id_proyecto_autor`),
  ADD KEY `fk_proyecto_autor_autores1_idx` (`id_autor`),
  ADD KEY `fk_proyecto_autor_proyectos1_idx` (`id_proyecto`);

--
-- Indices de la tabla `proyecto_integrante`
--
ALTER TABLE `proyecto_integrante`
  ADD PRIMARY KEY (`idproyecto_integrante`),
  ADD KEY `fk_proyecto_integrante_proyectos1_idx` (`id_proyecto`),
  ADD KEY `fk_proyecto_integrante_integrantes1_idx` (`id_integrante`);

--
-- Indices de la tabla `proyecto_programa`
--
ALTER TABLE `proyecto_programa`
  ADD PRIMARY KEY (`id_proyecto_programa`),
  ADD KEY `fk_proyecto_programa_programa1_idx` (`id_programa`),
  ADD KEY `fk_proyecto_programa_proyectos1_idx` (`id_proyecto`);

--
-- Indices de la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id_recurso`),
  ADD KEY `fk_recursos_proyectos1_idx` (`id_proyecto`);

--
-- Indices de la tabla `recurso_proyecto`
--
ALTER TABLE `recurso_proyecto`
  ADD PRIMARY KEY (`idrecurso_proyecto`),
  ADD KEY `fk_recurso_proyecto_recursos1_idx` (`id_recurso`),
  ADD KEY `fk_recurso_proyecto_proyectos1_idx` (`id_proyecto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id_tarea`),
  ADD KEY `fk_tareas_actividades1_idx` (`id_actividad`),
  ADD KEY `fk_tareas_integrantes1_idx` (`id_integrante`);

--
-- Indices de la tabla `tarea_integrante`
--
ALTER TABLE `tarea_integrante`
  ADD PRIMARY KEY (`id_tarea_integrante`),
  ADD KEY `id_tarea` (`id_tarea`),
  ADD KEY `id_integrante` (`id_integrante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `codigo_formato`
--
ALTER TABLE `codigo_formato`
  MODIFY `id_codigo_formato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `evidencias`
--
ALTER TABLE `evidencias`
  MODIFY `id_evidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `formato`
--
ALTER TABLE `formato`
  MODIFY `id_formato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  MODIFY `id_integrante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `proyecto_autor`
--
ALTER TABLE `proyecto_autor`
  MODIFY `id_proyecto_autor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyecto_integrante`
--
ALTER TABLE `proyecto_integrante`
  MODIFY `idproyecto_integrante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyecto_programa`
--
ALTER TABLE `proyecto_programa`
  MODIFY `id_proyecto_programa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `recurso_proyecto`
--
ALTER TABLE `recurso_proyecto`
  MODIFY `idrecurso_proyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id_tarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tarea_integrante`
--
ALTER TABLE `tarea_integrante`
  MODIFY `id_tarea_integrante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `fk_actividades_proyectos1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `autores`
--
ALTER TABLE `autores`
  ADD CONSTRAINT `fk_autores_proyectos1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evidencias`
--
ALTER TABLE `evidencias`
  ADD CONSTRAINT `fk_Evidencias_proyectos1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Evidencias_tareas1` FOREIGN KEY (`id_tarea`) REFERENCES `tareas` (`id_tarea`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `formato`
--
ALTER TABLE `formato`
  ADD CONSTRAINT `formato_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`),
  ADD CONSTRAINT `formato_ibfk_2` FOREIGN KEY (`id_codigo_formato`) REFERENCES `codigo_formato` (`id_codigo_formato`);

--
-- Filtros para la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD CONSTRAINT `fk_integrantes_persona1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_integrantes_proyectos1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_persona_programa1` FOREIGN KEY (`id_programa`) REFERENCES `programa` (`id_programa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_persona_rol1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `fk_proyectos_empresas1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyecto_autor`
--
ALTER TABLE `proyecto_autor`
  ADD CONSTRAINT `fk_proyecto_autor_autores1` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id_autor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proyecto_autor_proyectos1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyecto_integrante`
--
ALTER TABLE `proyecto_integrante`
  ADD CONSTRAINT `fk_proyecto_integrante_integrantes1` FOREIGN KEY (`id_integrante`) REFERENCES `integrantes` (`id_integrante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proyecto_integrante_proyectos1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyecto_programa`
--
ALTER TABLE `proyecto_programa`
  ADD CONSTRAINT `fk_proyecto_programa_programa1` FOREIGN KEY (`id_programa`) REFERENCES `programa` (`id_programa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_proyecto_programa_proyectos1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recursos`
--
ALTER TABLE `recursos`
  ADD CONSTRAINT `fk_recursos_proyectos1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recurso_proyecto`
--
ALTER TABLE `recurso_proyecto`
  ADD CONSTRAINT `fk_recurso_proyecto_proyectos1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyectos` (`id_proyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recurso_proyecto_recursos1` FOREIGN KEY (`id_recurso`) REFERENCES `recursos` (`id_recurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `fk_tareas_actividades1` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tareas_integrantes1` FOREIGN KEY (`id_integrante`) REFERENCES `integrantes` (`id_integrante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tarea_integrante`
--
ALTER TABLE `tarea_integrante`
  ADD CONSTRAINT `tarea_integrante_ibfk_1` FOREIGN KEY (`id_tarea`) REFERENCES `tareas` (`id_tarea`),
  ADD CONSTRAINT `tarea_integrante_ibfk_2` FOREIGN KEY (`id_integrante`) REFERENCES `integrantes` (`id_integrante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
