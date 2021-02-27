-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2021 a las 17:46:03
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaestudiantil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ajustes`
--

CREATE TABLE `ajustes`
(
    `id`             int(11) NOT NULL,
    `semestre`       varchar(150) COLLATE utf8_spanish_ci NOT NULL,
    `1_fecha_inicio` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
    `1_fecha_fin`    varchar(200) COLLATE utf8_spanish_ci NOT NULL,
    `2_fecha_inicio` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
    `2_fecha_fin`    varchar(200) COLLATE utf8_spanish_ci NOT NULL,
    `examenes_i`     varchar(200) COLLATE utf8_spanish_ci NOT NULL,
    `examenes_f`     varchar(200) COLLATE utf8_spanish_ci NOT NULL,
    `materias_i`     varchar(200) COLLATE utf8_spanish_ci NOT NULL,
    `materias_f`     varchar(200) COLLATE utf8_spanish_ci NOT NULL,
    `h_materias`     int(11) NOT NULL,
    `h_examenes`     int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ajustes`
--

INSERT INTO `ajustes` (`id`, `semestre`, `1_fecha_inicio`, `1_fecha_fin`, `2_fecha_inicio`, `2_fecha_fin`, `examenes_i`,
                       `examenes_f`, `materias_i`, `materias_f`, `h_materias`, `h_examenes`)
VALUES (1, '1er semestre', '2021-02-06', '2021-06-15', '2021-07-03', '2021-11-15', '2021-06-05', '2021-06-12',
        '2021-06-26', '2021-07-01', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras`
(
    `id`     int(11) NOT NULL,
    `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`)
VALUES (0, 'Sin carrera'),
       (6, 'Ingeniería en Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificados`
--

CREATE TABLE `certificados`
(
    `id`        int(11) NOT NULL,
    `id_alumno` int(11) NOT NULL,
    `tipo`      text COLLATE utf8_spanish_ci NOT NULL,
    `estado`    text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `certificados`
--

INSERT INTO `certificados` (`id`, `id_alumno`, `tipo`, `estado`)
VALUES (1, 21, 'alumno', 'Impreso'),
       (2, 21, 'materias', 'Impreso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comisiones`
--

CREATE TABLE `comisiones`
(
    `id`         int(11) NOT NULL,
    `id_materia` int(11) NOT NULL,
    `c_maxima`   int(11) NOT NULL,
    `horario`    varchar(200) COLLATE utf8_spanish_ci NOT NULL,
    `numero`     int(11) NOT NULL,
    `dias`       text COLLATE utf8_spanish_ci         NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comisiones`
--

INSERT INTO `comisiones` (`id`, `id_materia`, `c_maxima`, `horario`, `numero`, `dias`)
VALUES (1, 1, 20, '7:00 a 9:00', 1, 'Sábado'),
       (2, 2, 20, '9:05 a 11:00', 2, 'Sábado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes`
(
    `id`         int(11) NOT NULL,
    `estado`     int(11) NOT NULL,
    `id_carrera` int(11) NOT NULL,
    `id_materia` int(11) NOT NULL,
    `aula`       varchar(200) COLLATE utf8_spanish_ci NOT NULL,
    `profesor`   varchar(200) COLLATE utf8_spanish_ci NOT NULL,
    `hora`       text COLLATE utf8_spanish_ci         NOT NULL,
    `fecha`      date                                 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`id`, `estado`, `id_carrera`, `id_materia`, `aula`, `profesor`, `hora`, `fecha`)
VALUES (1, 1, 6, 1, 'A', 'Carlos Motta', '12:00 PM', '2021-04-29'),
       (2, 1, 6, 2, 'A', 'Carlos Motta', '12:00 PM', '2021-03-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insc_examenes`
--

CREATE TABLE `insc_examenes`
(
    `id`        int(11) NOT NULL,
    `id_alumno` int(11) NOT NULL,
    `id_examen` int(11) NOT NULL,
    `libreta`   varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `insc_examenes`
--

INSERT INTO `insc_examenes` (`id`, `id_alumno`, `id_examen`, `libreta`)
VALUES (1, 21, 1, 'user'),
       (2, 21, 2, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insc_materias`
--

CREATE TABLE `insc_materias`
(
    `id`          int(11) NOT NULL,
    `id_materia`  int(11) NOT NULL,
    `id_alumno`   int(11) NOT NULL,
    `id_comision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `insc_materias`
--

INSERT INTO `insc_materias` (`id`, `id_materia`, `id_alumno`, `id_comision`)
VALUES (1, 1, 21, 1),
       (2, 2, 21, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias`
(
    `id`         int(11) NOT NULL,
    `id_carrera` int(11) NOT NULL,
    `codigo`     varchar(150) COLLATE utf8_spanish_ci NOT NULL,
    `nombre`     varchar(150) COLLATE utf8_spanish_ci NOT NULL,
    `grado`      int(11) NOT NULL,
    `tipo`       varchar(150) COLLATE utf8_spanish_ci NOT NULL,
    `programa`   varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `id_carrera`, `codigo`, `nombre`, `grado`, `tipo`, `programa`)
VALUES (1, 6, '1220', 'Estadistica ll', 1, '1er semestre', 'Views/programs/84.pdf'),
       (2, 6, '2332', 'Programación Web', 1, '1er semestre', 'Views/programs/773.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas`
(
    `id`         int(11) NOT NULL,
    `id_alumno`  int(11) NOT NULL,
    `libreta`    varchar(150) COLLATE utf8_spanish_ci NOT NULL,
    `id_materia` int(11) NOT NULL,
    `fecha`      date                                 NOT NULL,
    `profesor`   varchar(200) COLLATE utf8_spanish_ci NOT NULL,
    `nota_final` float                                NOT NULL,
    `estado`     varchar(50) COLLATE utf8_spanish_ci  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `id_alumno`, `libreta`, `id_materia`, `fecha`, `profesor`, `nota_final`, `estado`)
VALUES (1, 21, 'user', 1, '2021-02-27', 'Carlos Motta', 10, 'Aprobado'),
       (2, 21, 'user', 2, '2021-02-27', 'Carlos Motta', 8, 'Regular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios`
(
    `id`           int(11) NOT NULL,
    `id_carrera`   int(11) NOT NULL,
    `libreta`      varchar(150) COLLATE utf8_spanish_ci NOT NULL,
    `clave`        varchar(200) COLLATE utf8_spanish_ci NOT NULL,
    `nombre`       varchar(200) COLLATE utf8_spanish_ci NOT NULL,
    `apellido`     varchar(200) COLLATE utf8_spanish_ci NOT NULL,
    `fechanac`     date                                 DEFAULT NULL,
    `direccion`    text COLLATE utf8_spanish_ci         DEFAULT NULL,
    `telefono`     int(255) DEFAULT NULL,
    `correo`       varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
    `pais`         varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
    `preparatoria` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
    `rol`          varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_carrera`, `libreta`, `clave`, `nombre`, `apellido`, `fechanac`, `direccion`,
                        `telefono`, `correo`, `pais`, `preparatoria`, `rol`)
VALUES (1, 0, 'admin', '1234', 'Otto Javier', 'Solís Pérez', '2000-06-17', 'Colobia Bilbao', 47542114,
        'javsolis908@gmail.com', 'Guatemala', 'Mariano Gálvez ', 'Administrador'),
       (21, 6, 'user', '123', 'Estudiante nombre', 'Estudiante prueba', NULL, NULL, NULL, NULL, NULL, NULL,
        'Estudiante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ajustes`
--
ALTER TABLE `ajustes`
    ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
    ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `certificados`
--
ALTER TABLE `certificados`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_certificados_alumnos` (`id_alumno`);

--
-- Indices de la tabla `comisiones`
--
ALTER TABLE `comisiones`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_materia_comisiones` (`id_materia`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_carrera_examenes` (`id_carrera`),
  ADD KEY `fk_id_materia_examenes` (`id_materia`);

--
-- Indices de la tabla `insc_examenes`
--
ALTER TABLE `insc_examenes`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_alumno_insc` (`id_alumno`),
  ADD KEY `fk_examen_insc` (`id_examen`),
  ADD KEY `libreta` (`libreta`);

--
-- Indices de la tabla `insc_materias`
--
ALTER TABLE `insc_materias`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_insc_materias_materia` (`id_materia`),
  ADD KEY `fk_insc_materias_comision` (`id_comision`),
  ADD KEY `fk_insc_materias_alumno` (`id_alumno`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carrera` (`id_carrera`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
    ADD PRIMARY KEY (`id`),
  ADD KEY `fk_alumno_noota` (`id_alumno`),
  ADD KEY `fk_materia_nota` (`id_materia`),
  ADD KEY `fk_libreta_nota` (`libreta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_correo` (`correo`),
  ADD KEY `fk_usuarios_carrera` (`id_carrera`),
  ADD KEY `libreta` (`libreta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ajustes`
--
ALTER TABLE `ajustes`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `certificados`
--
ALTER TABLE `certificados`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `comisiones`
--
ALTER TABLE `comisiones`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `insc_examenes`
--
ALTER TABLE `insc_examenes`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `insc_materias`
--
ALTER TABLE `insc_materias`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `certificados`
--
ALTER TABLE `certificados`
    ADD CONSTRAINT `fk_certificados_alumnos` FOREIGN KEY (`id_alumno`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `comisiones`
--
ALTER TABLE `comisiones`
    ADD CONSTRAINT `fk_materia_comisiones` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`);

--
-- Filtros para la tabla `examenes`
--
ALTER TABLE `examenes`
    ADD CONSTRAINT `fk_id_carrera_examenes` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id`),
  ADD CONSTRAINT `fk_id_materia_examenes` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`);

--
-- Filtros para la tabla `insc_examenes`
--
ALTER TABLE `insc_examenes`
    ADD CONSTRAINT `fk_alumno_insc` FOREIGN KEY (`id_alumno`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_examen_insc` FOREIGN KEY (`id_examen`) REFERENCES `examenes` (`id`),
  ADD CONSTRAINT `insc_examenes_ibfk_1` FOREIGN KEY (`libreta`) REFERENCES `usuarios` (`libreta`);

--
-- Filtros para la tabla `insc_materias`
--
ALTER TABLE `insc_materias`
    ADD CONSTRAINT `fk_insc_materias_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_insc_materias_comision` FOREIGN KEY (`id_comision`) REFERENCES `comisiones` (`id`),
  ADD CONSTRAINT `fk_insc_materias_materia` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`);

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
    ADD CONSTRAINT `fk_carrera` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
    ADD CONSTRAINT `fk_alumno_noota` FOREIGN KEY (`id_alumno`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_libreta_nota` FOREIGN KEY (`libreta`) REFERENCES `usuarios` (`libreta`),
  ADD CONSTRAINT `fk_materia_nota` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
    ADD CONSTRAINT `fk_usuarios_carrera` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
