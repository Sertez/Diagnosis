-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2019 a las 21:55:14
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `diagnosiseu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bacteriologos`
--

CREATE TABLE `bacteriologos` (
  `bacteriologo_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `bacteriologos`
--

INSERT INTO `bacteriologos` (`bacteriologo_id`, `nombre`, `documento`, `fecha_nacimiento`, `direccion`, `telefono`, `email`) VALUES
(3, 'juan', 1, '0000-00-00', '', '', ''),
(4, 'carlos', 2, '0000-00-00', '', '', ''),
(5, 'marcos', 3, '0000-00-00', '', '', ''),
(6, 'alfonso', 4, '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidades`
--

CREATE TABLE `entidades` (
  `entidad_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `entidades`
--

INSERT INTO `entidades` (`entidad_id`, `nombre`) VALUES
(21, 'saludcoop'),
(22, 'medimas'),
(23, 'cafesauld'),
(24, 'asdf'),
(25, 'sadf'),
(26, 'asdfasdf'),
(27, 'retyrty'),
(28, 'retyreurej'),
(29, 'retjrtjretj'),
(30, 'ertjretjretj'),
(31, 'ertjtrjtj'),
(32, 'ertjrtjrtj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `epses`
--

CREATE TABLE `epses` (
  `eps_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `epses`
--

INSERT INTO `epses` (`eps_id`, `nombre`) VALUES
(3, 'mierda'),
(4, 'azas'),
(5, 'qwqwqw'),
(6, 'saludcoop');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE `examenes` (
  `examen_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `doc_paciente` int(11) NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`examen_id`, `paciente_id`, `doc_paciente`, `tipo`, `fecha`) VALUES
(5, 21, 1007803280, 'Parcial de Orina', '2019-11-11'),
(6, 21, 1007803280, 'Parcial de Orina', '2019-11-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `h_esp`
--

CREATE TABLE `h_esp` (
  `examen_id` int(11) NOT NULL,
  `serie_roja` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serie_blanca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serie_plaquetaria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `h_grupo`
--

CREATE TABLE `h_grupo` (
  `examen_id` int(11) NOT NULL,
  `grupo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `h_hematologia`
--

CREATE TABLE `h_hematologia` (
  `examen_id` int(11) NOT NULL,
  `hematocrito` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hemoglobina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `leucocitos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `neutrofilos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linfocitos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eosinofilos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monocitos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `basofilas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plaquetas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reticulocitos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vsg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_sangria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_coagulacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_protrombina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_p__tromboplastina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grupo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `h_hto_hb`
--

CREATE TABLE `h_hto_hb` (
  `examen_id` int(11) NOT NULL,
  `hematocrito` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hemoglobina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `h_pt_ptt`
--

CREATE TABLE `h_pt_ptt` (
  `examen_id` int(11) NOT NULL,
  `t_protrombina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_par_tromboplastina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `h_vdrl`
--

CREATE TABLE `h_vdrl` (
  `examen_id` int(11) NOT NULL,
  `vdrl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `i_gravindex`
--

CREATE TABLE `i_gravindex` (
  `examen_id` int(11) NOT NULL,
  `gravindex` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `i_inmunologia`
--

CREATE TABLE `i_inmunologia` (
  `examen_id` int(11) NOT NULL,
  `asto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pcr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ra_tes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_frotis`
--

CREATE TABLE `m_frotis` (
  `examen_id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `olor_amino` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ph` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cel_epiteliales` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacterias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `leucocitos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hematies` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pseudomicellios` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trico_vaginales` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lev_sueltas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lev_gemacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pmn` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `celulas_guias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_kb`
--

CREATE TABLE `m_kb` (
  `examen_id` int(11) NOT NULL,
  `baciloscopia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_uro_negativo`
--

CREATE TABLE `m_uro_negativo` (
  `examen_id` int(11) NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_uro_positivo`
--

CREATE TABLE `m_uro_positivo` (
  `examen_id` int(11) NOT NULL,
  `polimorfonucleares` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amikacina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gentamicina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imipenem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meropenem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cefoxitina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ceftriazona` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amoxacilina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ampicilina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cefepina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `paciente_id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identificacion` int(11) NOT NULL,
  `fechanac` date NOT NULL,
  `eps` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`paciente_id`, `nombre`, `identificacion`, `fechanac`, `eps`, `entidad`, `direccion`, `telefono`, `email`, `observaciones`, `fecha_creacion`) VALUES
(21, 'Daniel Andres Donado Avendaño', 1007803280, '2000-09-16', 'saludcoop', 'retyreurej', 'cra 42f #80-168', '+573006922088', 'danieldoav@gmail.com', 'Es muy guapo, demasiado', '2019-11-11'),
(22, 'Dulco', 1234567, '2000-12-12', 'saludcoop', 'medimas', 'Calle 75 #72-140', '30000000', 'dulco@gmail.com', 'es feo', '2019-11-11'),
(23, 'Giovanni', 987654, '2000-11-07', 'mierda', 'retyreurej', 'medallo', '6789090', 'giorno@gmail.com', 'uso', '2019-11-11'),
(24, 'Pika', 12365, '3333-04-12', 'mierda', 'saludcoop', 'ffffff', '343432', 'ffsfsdf', 'wqfqwfqwfwqef', '2019-11-11'),
(25, 'azucar', 123890, '2000-02-01', 'qwqwqw', 'medimas', 'Calle 75 #72-140', '3006922088', 'danieldoav@gmail.com', 'arroba', '2019-11-11'),
(26, 'yyyyy', 555555, '0000-00-00', 'mierda', 'saludcoop', '', '', '', '', '2019-11-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_copro`
--

CREATE TABLE `p_copro` (
  `examen_id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `consistencia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `moco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sangre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ph` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `azucares_red` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rest_alimentos` int(255) NOT NULL,
  `olor` int(255) NOT NULL,
  `leucocitos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hematies` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `almidones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fibra_muscular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fibra_vegetal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grasas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lev_sueltas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lev_gemacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pseudomicellius` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `h_ascaris` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `h_tricocefalo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `h_uncinaria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `h_oxiuro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `h_tenia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `h_himenolepis_nana` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `larva_strongiloides` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_histolytica` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_coli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_nana` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `giardia_lamblia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balantidium_coli` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chilomastix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `blostocystis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_orina`
--

CREATE TABLE `p_orina` (
  `examen_id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aspecto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ph` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `densidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `proteinas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `glucosa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cetonas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sangre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bilirrubinas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `urobilinogeno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nitritos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cel_epiteliales` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `moco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacterias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `leucocitos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `piocitos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hematies` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cristales` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cilindros` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `p_orina`
--

INSERT INTO `p_orina` (`examen_id`, `color`, `aspecto`, `ph`, `densidad`, `proteinas`, `glucosa`, `cetonas`, `sangre`, `bilirrubinas`, `urobilinogeno`, `nitritos`, `cel_epiteliales`, `moco`, `bacterias`, `leucocitos`, `piocitos`, `hematies`, `cristales`, `cilindros`, `bacteriologo`) VALUES
(3, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', 'juan'),
(5, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', 'juan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `q_ionograma`
--

CREATE TABLE `q_ionograma` (
  `examen_id` int(11) NOT NULL,
  `sodio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cloro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `potasio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `q_perfil`
--

CREATE TABLE `q_perfil` (
  `examen_id` int(11) NOT NULL,
  `glicemia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `colesterol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trigliceridos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `colesterol_hdl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `colesterol_ldl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `q_quimica`
--

CREATE TABLE `q_quimica` (
  `examen_id` int(11) NOT NULL,
  `glicemia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `colesterol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `colesterol_hdl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `colesterol_ldl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trigliceridos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acido_urico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nitrogeno_ureico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creatinina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tasa_filtracion_glomerular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fosfatasa_alcalina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alanino_aminotrans` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aspartato_aminotrans` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `q_quimica_especial`
--

CREATE TABLE `q_quimica_especial` (
  `examen_id` int(11) NOT NULL,
  `hemoglobina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `microalbuminura` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creatinuria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `albumi_creati` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vih`
--

CREATE TABLE `vih` (
  `examen_id` int(11) NOT NULL,
  `prueba` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bacteriologo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bacteriologos`
--
ALTER TABLE `bacteriologos`
  ADD PRIMARY KEY (`bacteriologo_id`),
  ADD UNIQUE KEY `cc` (`documento`);

--
-- Indices de la tabla `entidades`
--
ALTER TABLE `entidades`
  ADD PRIMARY KEY (`entidad_id`);

--
-- Indices de la tabla `epses`
--
ALTER TABLE `epses`
  ADD PRIMARY KEY (`eps_id`);

--
-- Indices de la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `h_esp`
--
ALTER TABLE `h_esp`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `h_grupo`
--
ALTER TABLE `h_grupo`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `h_hematologia`
--
ALTER TABLE `h_hematologia`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `h_hto_hb`
--
ALTER TABLE `h_hto_hb`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `h_pt_ptt`
--
ALTER TABLE `h_pt_ptt`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `h_vdrl`
--
ALTER TABLE `h_vdrl`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `i_gravindex`
--
ALTER TABLE `i_gravindex`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `i_inmunologia`
--
ALTER TABLE `i_inmunologia`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `m_frotis`
--
ALTER TABLE `m_frotis`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `m_kb`
--
ALTER TABLE `m_kb`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `m_uro_negativo`
--
ALTER TABLE `m_uro_negativo`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `m_uro_positivo`
--
ALTER TABLE `m_uro_positivo`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`paciente_id`),
  ADD UNIQUE KEY `cc` (`identificacion`);

--
-- Indices de la tabla `p_copro`
--
ALTER TABLE `p_copro`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `p_orina`
--
ALTER TABLE `p_orina`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `q_ionograma`
--
ALTER TABLE `q_ionograma`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `q_perfil`
--
ALTER TABLE `q_perfil`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `q_quimica`
--
ALTER TABLE `q_quimica`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `q_quimica_especial`
--
ALTER TABLE `q_quimica_especial`
  ADD PRIMARY KEY (`examen_id`);

--
-- Indices de la tabla `vih`
--
ALTER TABLE `vih`
  ADD PRIMARY KEY (`examen_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bacteriologos`
--
ALTER TABLE `bacteriologos`
  MODIFY `bacteriologo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `entidades`
--
ALTER TABLE `entidades`
  MODIFY `entidad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `epses`
--
ALTER TABLE `epses`
  MODIFY `eps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `examenes`
--
ALTER TABLE `examenes`
  MODIFY `examen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `paciente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
