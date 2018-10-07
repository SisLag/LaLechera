-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2018 a las 03:12:05
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lalechera`
--
CREATE DATABASE IF NOT EXISTS `lalechera` DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE `lalechera`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrios`
--

CREATE TABLE `barrios` (
  `IdBarrio` int(11) NOT NULL,
  `NombreBarrio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `barrios`
--

INSERT INTO `barrios` (`IdBarrio`, `NombreBarrio`) VALUES
(1, 'Los Encenillos'),
(2, 'Los García'),
(3, 'Bella Vista'),
(4, 'La Quinta'),
(5, 'Central'),
(6, 'Los Olivos'),
(7, 'El Carmelo'),
(8, 'Obrero'),
(9, 'Belén'),
(10, 'San Judas'),
(11, 'El Calvario'),
(12, 'Miraflores'),
(13, 'Guamurú'),
(14, 'El Milagro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuarentenas`
--

CREATE TABLE `cuarentenas` (
  `IdCuarentena` varchar(10) NOT NULL,
  `AnimCuarentena` varchar(10) NOT NULL,
  `FechIngresoCuarentena` date NOT NULL,
  `FechSalidaCuarentena` date NOT NULL,
  `NumAnimalCuarentena` int(11) NOT NULL,
  `MotivoIngresoCuarentena` varchar(30) NOT NULL,
  `DiagPresuntCuarentena` varchar(30) NOT NULL,
  `DesinfCuarentena` varchar(30) NOT NULL,
  `ProdDesinfecCuarentena` varchar(10) NOT NULL,
  `EncargadoCuarenten` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cuarentenas`
--

INSERT INTO `cuarentenas` (`IdCuarentena`, `AnimCuarentena`, `FechIngresoCuarentena`, `FechSalidaCuarentena`, `NumAnimalCuarentena`, `MotivoIngresoCuarentena`, `DiagPresuntCuarentena`, `DesinfCuarentena`, `ProdDesinfecCuarentena`, `EncargadoCuarenten`) VALUES
('01', '03', '2018-07-01', '0000-00-00', 0, 'sdf', 'fdsfsdf', 'No', 'PROD01', 1111111111);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosfincas`
--

CREATE TABLE `datosfincas` (
  `NombreFinca` varchar(30) NOT NULL,
  `MunicipioFinca` int(11) NOT NULL,
  `VeredaFinca` int(11) NOT NULL,
  `BarrioFinca` int(11) NOT NULL,
  `NombrePropietFinca` varchar(30) NOT NULL,
  `TelFinca1` int(11) NOT NULL,
  `NombreAdminFinca` varchar(30) NOT NULL,
  `TelFinca12` varchar(10) NOT NULL,
  `AreaTotalFinca` int(11) NOT NULL,
  `AreaPastosFinca` int(11) NOT NULL,
  `AreaLecheriaFinca` int(11) NOT NULL,
  `AreaLevanteFinca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datosfincas`
--

INSERT INTO `datosfincas` (`NombreFinca`, `MunicipioFinca`, `VeredaFinca`, `BarrioFinca`, `NombrePropietFinca`, `TelFinca1`, `NombreAdminFinca`, `TelFinca12`, `AreaTotalFinca`, `AreaPastosFinca`, `AreaLecheriaFinca`, `AreaLevanteFinca`) VALUES
('LOS ENCENILLOS', 2, 1, 1, 'asdasd', 7777777, 'fdgfdgdfgg', '9999999', 0, 50, 50, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encargados`
--

CREATE TABLE `encargados` (
  `NumeroDocumento` varchar(11) NOT NULL,
  `TipoDocumento` varchar(45) NOT NULL,
  `NombreEncargado` varchar(10) NOT NULL,
  `Apellido1Encargado` varchar(30) NOT NULL,
  `Apellido2Encargado` varchar(30) NOT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `NumeroContacto` int(11) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `UsuarioEncargado` varchar(30) NOT NULL,
  `ClaveEncargado` varchar(50) NOT NULL,
  `PerfilEncargado` varchar(11) NOT NULL,
  `status` enum('activo','bloqueado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encargados`
--

INSERT INTO `encargados` (`NumeroDocumento`, `TipoDocumento`, `NombreEncargado`, `Apellido1Encargado`, `Apellido2Encargado`, `Correo`, `NumeroContacto`, `Foto`, `UsuarioEncargado`, `ClaveEncargado`, `PerfilEncargado`, `status`) VALUES
(1111111111, 'CC', 'adminnnnnn', 'admin', 'admin', 'admin@gmail.com', 1111111, 'descarga.jpg', 'admin', 'b1b79d2c93994d3081e3a4473d3f02b3', 1, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapas`
--

CREATE TABLE `etapas` (
  `IdEtapa` int(11) NOT NULL,
  `NombreEtapa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `IdGenero` int(11) NOT NULL,
  `NombreGenero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`IdGenero`, `NombreGenero`) VALUES
(2, 'Femenino'),
(1, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojasvida`
--

CREATE TABLE `hojasvida` (
  `NroPotreroHV` varchar(11) NOT NULL,
  `LoteHV` int(11) NOT NULL,
  `AreaHV` int(11) NOT NULL,
  `FechEntradaGanadoHV` date NOT NULL,
  `FechSalidaGanadoHV` date NOT NULL,
  `NroAnimHV` int(11) NOT NULL,
  `DiasOcupPotreroHV` int(11) NOT NULL,
  `DiasDesocupPotreroHV` int(11) NOT NULL,
  `FechAbonoHV` date NOT NULL,
  `ProdAbonoHV` int(11) NOT NULL,
  `CantAbonoHV` int(11) NOT NULL,
  `TiempoCarenAbonoHV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hojasvida`
--

INSERT INTO `hojasvida` (`NroPotreroHV`, `LoteHV`, `AreaHV`, `FechEntradaGanadoHV`, `FechSalidaGanadoHV`, `NroAnimHV`, `DiasOcupPotreroHV`, `DiasDesocupPotreroHV`, `FechAbonoHV`, `ProdAbonoHV`, `CantAbonoHV`, `TiempoCarenAbonoHV`) VALUES
('', 45, 45, '2018-08-01', '2018-08-05', 45, 45, 45, '2018-08-12', 1, 14, 14),
('0', 15, 50, '2018-07-01', '2018-07-02', 1, 1, 1, '2018-07-01', 0, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `codigo` varchar(7) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio_compra` int(11) NOT NULL,
  `precio_venta` int(11) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`codigo`, `nombre`, `precio_compra`, `precio_venta`, `unidad`, `stock`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
('B000363', 'Controlip', 12, 50, 'cajas', 10, 1, '2017-07-24 21:56:58', 1, '2017-07-26 07:09:28'),
('B000364', 'Quetiazic', 25, 50, 'cajas', 20, 1, '2017-07-25 07:59:48', 1, '2018-06-27 04:30:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientosganados`
--

CREATE TABLE `movimientosganados` (
  `IdMovGanado` varchar(11) NOT NULL,
  `FechMovGanado` date NOT NULL,
  `AnimMovGanado` varchar(10) NOT NULL,
  `TransMonvGanado` varchar(30) NOT NULL,
  `ValorMGanado` int(11) NOT NULL,
  `ObservMovGanado` varchar(100) NOT NULL,
  `GuiaMovilizMovGanado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `IdMunicipio` int(11) NOT NULL,
  `NombreMunicipio` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`IdMunicipio`, `NombreMunicipio`) VALUES
(1, 'San Pedro de los Milagros'),
(2, 'Belmira ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partos`
--

CREATE TABLE `partos` (
  `IdParto` varchar(11) NOT NULL,
  `FechParto` date NOT NULL,
  `VacaParto` varchar(10) NOT NULL,
  `ToroParto` varchar(10) NOT NULL,
  `AbortoParto` varchar(4) NOT NULL,
  `NombreCriaParto` varchar(30) NOT NULL,
  `SexoCriaParto` int(11) NOT NULL,
  `ObservParto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `IdPerfil` varchar(11) NOT NULL,
  `NombrePerfil` varchar(45) NOT NULL,
  `DescripcionPerfil` varchar(100) NOT NULL,
  `PUsuarios` varchar(45) NOT NULL,
  `PSecado` varchar(45) NOT NULL,
  `PProducción` varchar(45) NOT NULL,
  `PPalpación` varchar(45) NOT NULL,
  `PTratamientos` varchar(45) NOT NULL,
  `PPerfiles` varchar(45) NOT NULL,
  `PPartos` varchar(45) NOT NULL,
  `PRefrigeracion` varchar(45) NOT NULL,
  `PDatosFinca` varchar(45) NOT NULL,
  `PReportes` varchar(45) NOT NULL,
  `PAnimales` varchar(45) NOT NULL,
  `PHojaVida` varchar(45) NOT NULL,
  `PMovimientos` varchar(45) NOT NULL,
  `PRazasEtapas` varchar(45) NOT NULL,
  `PServiciosCalores` varchar(45) NOT NULL,
  `PCuarentena` varchar(45) NOT NULL,
  `PPesaje` varchar(45) NOT NULL,
  `PProductos` varchar(45) NOT NULL,
  `PMedicamentos` varchar(45) NOT NULL,
  `PCrear` varchar(45) NOT NULL,
  `PEliminar` varchar(45) NOT NULL,
  `PActualizar` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`IdPerfil`, `NombrePerfil`, `DescripcionPerfil`, `PUsuarios`, `PSecado`, `PProducción`, `PPalpación`, `PTratamientos`, `PPerfiles`, `PPartos`, `PRefrigeracion`, `PDatosFinca`, `PReportes`, `PAnimales`, `PHojaVida`, `PMovimientos`, `PRazasEtapas`, `PServiciosCalores`, `PCuarentena`, `PPesaje`, `PProductos`, `PMedicamentos`, `PCrear`, `PEliminar`, `PActualizar`) VALUES
(1, 'Super Admin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Empleado', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Inseminador', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pesajesterneras`
--

CREATE TABLE `pesajesterneras` (
  `IdPTernera` varchar(11) NOT NULL,
  `FechPTernera` date NOT NULL,
  `AnimPTernera` varchar(10) NOT NULL,
  `PesoPTernera` int(11) NOT NULL,
  `AlzadaPTernera` int(11) NOT NULL,
  `MedPTernera` varchar(10) NOT NULL,
  `CantMedPTernera` int(11) NOT NULL,
  `ObservPTernera` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccionesdiarias`
--

CREATE TABLE `produccionesdiarias` (
  `IdPDiaria` varchar(11) NOT NULL,
  `FechProdDiaria` date NOT NULL,
  `PlantaProdDiaria` int(11) NOT NULL,
  `CriaProdDiaria` int(11) NOT NULL,
  `OtrosProdDiaria` int(11) NOT NULL,
  `TotalDiaProdDiaria` int(11) NOT NULL,
  `NroVacasOrdenoProdDiaria` int(11) NOT NULL,
  `PromLtsProdDiaria` int(11) NOT NULL,
  `TotalConcentAmProdDiaria` int(11) NOT NULL,
  `TotalConcentPmProdDiaria` int(11) NOT NULL,
  `PromConcentProdDiaria` int(11) NOT NULL,
  `RelacLecheConcentProdDiaria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `produccionesdiarias`
--

INSERT INTO `produccionesdiarias` (`IdPDiaria`, `FechProdDiaria`, `PlantaProdDiaria`, `CriaProdDiaria`, `OtrosProdDiaria`, `TotalDiaProdDiaria`, `NroVacasOrdenoProdDiaria`, `PromLtsProdDiaria`, `TotalConcentAmProdDiaria`, `TotalConcentPmProdDiaria`, `PromConcentProdDiaria`, `RelacLecheConcentProdDiaria`) VALUES
(0, '2018-07-01', 10, 2, 0, 12, 2, 12, 0, 0, 0, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccionesvacas`
--

CREATE TABLE `produccionesvacas` (
  `IdProdVaca` varchar(11) NOT NULL,
  `VacaProd` varchar(10) NOT NULL,
  `FechProdVaca` date NOT NULL,
  `LtsAmProdVaca` int(11) NOT NULL,
  `LtspmProdVaca` int(11) NOT NULL,
  `TotalLtsProdVaca` int(11) NOT NULL,
  `ConcentrProdVaca` int(11) NOT NULL,
  `CondiccCorpVacaProdVaca` varchar(50) NOT NULL,
  `ObservProdVaca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas`
--

CREATE TABLE `razas` (
  `IdRaza` varchar(10) NOT NULL,
  `NombreRaza` varchar(30) NOT NULL,
  `DescripcionRaza` varchar(100) NOT NULL,
  `Created_User` varchar(45) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_user` varchar(45) NOT NULL,
  `updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `razas`
--

INSERT INTO `razas` (`IdRaza`, `NombreRaza`, `DescripcionRaza`, `Created_User`, `created_date`, `updated_user`, `updated_date`) VALUES
('RA01', 'HOLSTEIN', '', '4', '2018-06-29 01:11:34', '4', '0000-00-00'),
('RA02', 'PARDO SUIZO', '', '4', '2018-06-29 01:11:46', '4', '0000-00-00'),
('RA03', 'JERSEY', '', '4', '2018-06-29 01:12:29', '4', '0000-00-00'),
('RA04', 'AYRSHIRE', '', '4', '2018-06-29 01:12:39', '4', '0000-00-00'),
('RA05', 'ROJO SUECO', '', '4', '2018-06-29 01:12:49', '4', '0000-00-00'),
('RA06', 'GYR', '', '4', '2018-06-29 01:12:57', '4', '0000-00-00'),
('RA07', 'ANGUS', '', '4', '2018-06-29 01:13:05', '4', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refrigeraciones`
--

CREATE TABLE `refrigeraciones` (
  `IdRefrigeracion` varchar(11) NOT NULL,
  `FechRefrigeracion` date NOT NULL,
  `HoraAmRefrigeracion` int(11) NOT NULL,
  `TempAmRefrigeracion` int(11) NOT NULL,
  `HoraPmRefrigeracion` int(11) NOT NULL,
  `TempPmRefrigeracion` int(11) NOT NULL,
  `EncargadoRefrigeracion` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrosalimentos`
--

CREATE TABLE `registrosalimentos` (
  `RegIcaAlimento` varchar(10) NOT NULL,
  `NombreAlimento` varchar(30) NOT NULL,
  `TipoAlimento` int(11) NOT NULL,
  `UnidadAlimento` varchar(30) NOT NULL,
  `NroLoteAlimento` int(11) NOT NULL,
  `EncargadoAlimento` varchar(11) NOT NULL,
  `DescAlimento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrosalimentos`
--

INSERT INTO `registrosalimentos` (`RegIcaAlimento`, `NombreAlimento`, `TipoAlimento`, `UnidadAlimento`, `NroLoteAlimento`, `EncargadoAlimento`, `DescAlimento`) VALUES
('AL01', 'SOLLALECHE', 1, 'CM', 0, 1111111111, 'asdsfsdfdg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrosanimeles`
--

CREATE TABLE `registrosanimeles` (
  `ChapetaAnimal` varchar(10) NOT NULL,
  `NombreAnimal` varchar(30) NOT NULL,
  `FechNacimAnimal` date NOT NULL,
  `MadreAnimal` varchar(10) NOT NULL,
  `PadreAnimal` varchar(10) NOT NULL,
  `RazaAnimal` varchar(10) NOT NULL,
  `ServicioAnimal` varchar(4) NOT NULL,
  `TipoAnimal` int(11) NOT NULL,
  `ObservAnimal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrosanimeles`
--

INSERT INTO `registrosanimeles` (`ChapetaAnimal`, `NombreAnimal`, `FechNacimAnimal`, `MadreAnimal`, `PadreAnimal`, `RazaAnimal`, `ServicioAnimal`, `TipoAnimal`, `ObservAnimal`) VALUES
('03', 'charmi', '2018-07-01', 'VA00', 'TO00', 'RA01', 'No', 3, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrosanimmadres`
--

CREATE TABLE `registrosanimmadres` (
  `IdVacaMadre` varchar(10) NOT NULL,
  `NombreVacaMadre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrosanimmadres`
--

INSERT INTO `registrosanimmadres` (`IdVacaMadre`, `NombreVacaMadre`) VALUES
('VA00', 'Anonimo'),
('VA01', 'Maria'),
('VA02', 'tata');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrosanimpadres`
--

CREATE TABLE `registrosanimpadres` (
  `IdToroPadre` varchar(10) NOT NULL,
  `NombreToroPadre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrosanimpadres`
--

INSERT INTO `registrosanimpadres` (`IdToroPadre`, `NombreToroPadre`) VALUES
('03', 'charmi'),
('TO00', 'Anonimo'),
('TO01', 'Torino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrosmedicamentos`
--

CREATE TABLE `registrosmedicamentos` (
  `IdRegIcaMedicamento` varchar(10) NOT NULL,
  `NombreMedicamento` varchar(30) NOT NULL,
  `TipoMedicamento` int(11) NOT NULL,
  `UnidadMedicamento` varchar(45) NOT NULL,
  `DescMedicamento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrosmedicamentos`
--

INSERT INTO `registrosmedicamentos` (`IdRegIcaMedicamento`, `NombreMedicamento`, `TipoMedicamento`, `UnidadMedicamento`, `DescMedicamento`) VALUES
('56gf', 'cvbvcb', 2, 'CM', 'vcbcvbcvbcvbc'),
('ICA001', 'ICOLO', 1, 'CM', 'ayuda a calmar el dolor del animal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrospalpaciones`
--

CREATE TABLE `registrospalpaciones` (
  `IdPalpacion` varchar(11) NOT NULL,
  `FechPalpacion` date NOT NULL,
  `VacaPalpacion` varchar(10) NOT NULL,
  `FechUltimPartoPalpacion` date NOT NULL,
  `DiasLechePalpacion` int(11) NOT NULL,
  `FechUltimServicPalpacion` date NOT NULL,
  `DiasServidaPalpacion` int(11) NOT NULL,
  `FechUltimPalpacion` date NOT NULL,
  `HallazgosPalpacion` varchar(30) NOT NULL,
  `EstadoPalpacion` varchar(30) NOT NULL,
  `EstrucOvaricasPalpacion` varchar(30) NOT NULL,
  `CCRechequeoPalpacion` varchar(30) NOT NULL,
  `ObservPalpacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrospalpaciones`
--

INSERT INTO `registrospalpaciones` (`IdPalpacion`, `FechPalpacion`, `VacaPalpacion`, `FechUltimPartoPalpacion`, `DiasLechePalpacion`, `FechUltimServicPalpacion`, `DiasServidaPalpacion`, `FechUltimPalpacion`, `HallazgosPalpacion`, `EstadoPalpacion`, `EstrucOvaricasPalpacion`, `CCRechequeoPalpacion`, `ObservPalpacion`) VALUES
('PAL01', '2018-08-05', 'VA01', '2018-08-05', 10, '2018-08-05', 12, '2018-08-05', 'fgfhgfh', 'hgfhfghfg', 'fghfhgf', 'fghfhgfhfg', 'fghgfhfghfghfgh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrosproductos`
--

CREATE TABLE `registrosproductos` (
  `RegIcaProd` varchar(10) NOT NULL,
  `NombreProd` varchar(30) NOT NULL,
  `TipoProd` int(11) NOT NULL,
  `UnidadProd` varchar(30) NOT NULL,
  `NroLoteProd` int(11) NOT NULL,
  `EncargadoProd` varchar(11) NOT NULL,
  `DescProd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrosproductos`
--

INSERT INTO `registrosproductos` (`RegIcaProd`, `NombreProd`, `TipoProd`, `UnidadProd`, `NroLoteProd`, `EncargadoProd`, `DescProd`) VALUES
('PROD01', 'asdsad', 2, 'CM', 45, 1111111111, 'dfsdfdsf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secados`
--

CREATE TABLE `secados` (
  `IdSecado` varchar(11) NOT NULL,
  `VacaSecado` varchar(10) NOT NULL,
  `FechSecado` date NOT NULL,
  `RealSecado` date NOT NULL,
  `TratamVacaSecado` varchar(11) NOT NULL,
  `VermiSecado` varchar(10) NOT NULL,
  `OtrasPracTSecado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicioscalores`
--

CREATE TABLE `servicioscalores` (
  `IdSCalores` varchar(11) NOT NULL,
  `VacaSCalores` varchar(10) NOT NULL,
  `FechSCalores` date NOT NULL,
  `ToroSCalores` varchar(10) NOT NULL,
  `ModoInseminacion` varchar(20) NOT NULL,
  `NroSCalores` int(11) NOT NULL,
  `InseminSCalores` varchar(11) NOT NULL,
  `ObservSCalores` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicioscalores`
--

INSERT INTO `servicioscalores` (`IdSCalores`, `VacaSCalores`, `FechSCalores`, `ToroSCalores`, `ModoInseminacion`, `NroSCalores`, `InseminSCalores`, `ObservSCalores`) VALUES
(1, 'VA01', '2017-12-11', 'TO01', 'MN', 2, '0', 'asdasdasdsadsadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexos`
--

CREATE TABLE `sexos` (
  `IdSexo` int(11) NOT NULL,
  `NombreSexo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sexos`
--

INSERT INTO `sexos` (`IdSexo`, `NombreSexo`) VALUES
(2, 'Hembra'),
(1, 'Macho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposalimentos`
--

CREATE TABLE `tiposalimentos` (
  `IdTAlimento` int(11) NOT NULL,
  `NombreTAlimento` varchar(45) NOT NULL,
  `DescripcionTAlimento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiposalimentos`
--

INSERT INTO `tiposalimentos` (`IdTAlimento`, `NombreTAlimento`, `DescripcionTAlimento`) VALUES
(1, 'CUIDO', 'Alimento para el ordeño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposanimales`
--

CREATE TABLE `tiposanimales` (
  `IdTipoAnimal` int(11) NOT NULL,
  `NombreTipoAnimal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiposanimales`
--

INSERT INTO `tiposanimales` (`IdTipoAnimal`, `NombreTipoAnimal`) VALUES
(2, 'Cria'),
(3, 'Toro'),
(1, 'Vaca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposdocumentos`
--

CREATE TABLE `tiposdocumentos` (
  `IdTipoDocumento` int(11) NOT NULL,
  `NombreTipoDocumento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiposdocumentos`
--

INSERT INTO `tiposdocumentos` (`IdTipoDocumento`, `NombreTipoDocumento`) VALUES
(1, 'C.C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposmedicamentos`
--

CREATE TABLE `tiposmedicamentos` (
  `IdMedicamento` int(11) NOT NULL,
  `NombreMedicamento` varchar(45) NOT NULL,
  `DescripcionMedicamento` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiposmedicamentos`
--

INSERT INTO `tiposmedicamentos` (`IdMedicamento`, `NombreMedicamento`, `DescripcionMedicamento`) VALUES
(1, 'ANTIBIOTICOS', ''),
(2, 'ANTIPARASITARIO', ''),
(3, 'ANTIFLAMATORIO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposproductos`
--

CREATE TABLE `tiposproductos` (
  `IdTProducto` int(11) NOT NULL,
  `NombreTProducto` varchar(45) NOT NULL,
  `DescripcionTProducto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiposproductos`
--

INSERT INTO `tiposproductos` (`IdTProducto`, `NombreTProducto`, `DescripcionTProducto`) VALUES
(1, 'Medicamento', 'con este item se registran todos los productos que sirven para la curacion de los animales'),
(2, 'Desinfectante', 'con este item se registraran todos losproductos que sirven como desinfectante de animales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion_medicamentos`
--

CREATE TABLE `inventario_medicamentos` (
  `codigo_inv` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `codigo` varchar(7) NOT NULL,
  `numero` int(11) NOT NULL,
  `tipo_transaccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transaccion_medicamentos`
--

INSERT INTO `transaccion_medicamentos` (`codigo_transaccion`, `fecha`, `codigo`, `numero`, `created_user`, `created_date`, `tipo_transaccion`) VALUES
('TM-2017-0000002', '2017-07-26', 'B000363', 10, 1, '2017-07-26 07:09:28', 'Entrada'),
('TM-2017-0000003', '2017-07-26', 'B000364', 5, 1, '2017-07-26 07:09:36', 'Salida'),
('TM-2018-0000004', '2018-06-27', 'B000364', 10, 4, '2018-06-27 04:30:25', 'Salida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `IdTratamiento` varchar(11) NOT NULL,
  `NombreTratamiento` varchar(30) NOT NULL,
  `AnimTratamiento` varchar(10) NOT NULL,
  `EnfermedadTratamiento` varchar(30) NOT NULL,
  `FechTratamiento` date NOT NULL,
  `TiempoRetTratamiento` int(11) NOT NULL,
  `MedTratamiento` varchar(10) NOT NULL,
  `LabTratamiento` varchar(30) NOT NULL,
  `LoteTratamiento` int(11) NOT NULL,
  `DosisTratamiento` int(11) NOT NULL,
  `ViaAplicTratamiento` varchar(30) NOT NULL,
  `EncargadoTratamiento` varchar(11) NOT NULL,
  `ObservTratamiento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`IdTratamiento`, `NombreTratamiento`, `AnimTratamiento`, `EnfermedadTratamiento`, `FechTratamiento`, `TiempoRetTratamiento`, `MedTratamiento`, `LabTratamiento`, `LoteTratamiento`, `DosisTratamiento`, `ViaAplicTratamiento`, `EncargadoTratamiento`, `ObservTratamiento`) VALUES
(0, 'aaaaaaaa', '01', 'aaaaaaaa', '2018-07-01', 14, '56gf', 'asdsadsdasd', 1560, 11, 'VO', '1111111111', 'sdfsdfsdfsdfsfcdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `permisos_acceso` enum('Super Admin','Gerente','Almacen') NOT NULL,
  `status` enum('activo','bloqueado') NOT NULL DEFAULT 'activo',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `username`, `name_user`, `password`, `email`, `telefono`, `foto`, `permisos_acceso`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Sistemas Webs', '21232f297a57a5a743894a0e4a801fc3', 'info@sist.com', '7025', 'maxresdefault.jpg', 'Super Admin', 'bloqueado', '2017-04-01 13:15:15', '2018-07-12 04:11:54'),
(2, 'juan', 'juan', 'a94652aa97c7211ba8954dd15a3cf838', 'juab@juan.com', '12000', NULL, 'Almacen', 'bloqueado', '2017-07-26 03:34:03', '2018-07-14 03:46:00'),
(3, 'Maria', 'Maria', '263bce650e68ab4e23f28263760b9fa5', NULL, NULL, NULL, 'Gerente', 'bloqueado', '2018-06-25 03:29:41', '2018-07-14 03:45:59'),
(4, 'admin', 'admin', 'b1b79d2c93994d3081e3a4473d3f02b3', '', '', 'descarga.jpg', 'Super Admin', 'activo', '2018-06-27 03:51:47', '2018-07-14 03:46:26'),
(5, 'Retiro', 'Retiro del Pueblo', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, 'Almacen', 'bloqueado', '2018-07-09 01:49:02', '2018-07-14 03:45:57'),
(6, 'pardo', 'pardo', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, 'Almacen', 'bloqueado', '2018-07-12 03:56:53', '2018-07-14 03:45:55'),
(7, 'maria', 'Maria Lozano', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, 'Super Admin', 'bloqueado', '2018-07-14 02:29:27', '2018-07-14 03:45:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veredas`
--

CREATE TABLE `veredas` (
  `IdVereda` int(11) NOT NULL,
  `NombreVereda` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `veredas`
--

INSERT INTO `veredas` (`IdVereda`, `NombreVereda`) VALUES
(1, 'La Cuchilla'),
(2, 'La Empalizada'),
(3, 'La Clarita'),
(4, 'Pantanillo'),
(5, 'Esp?ritu Santo'),
(6, 'La	Pulgarina'),
(7, 'La Lana'),
(8, 'El Tambo'),
(9, 'Cerezales'),
(10, 'Alto Medina'),
(11, 'El Espinal'),
(12, 'La Aprete'),
(13, 'San	Juan'),
(14, 'San	Francisco'),
(15, 'El Rano'),
(16, 'Santa B?rbara'),
(17, 'Zafra'),
(18, '	La	 Palma'),
(19, 'Riochico');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `barrios`
--
ALTER TABLE `barrios`
  ADD PRIMARY KEY (`IdBarrio`);

--
-- Indices de la tabla `cuarentenas`
--
ALTER TABLE `cuarentenas`
  ADD PRIMARY KEY (`IdCuarentena`),
  ADD KEY `cuarentenas_idfk_1` (`AnimCuarentena`),
  ADD KEY `cuarentenas_idfk_2` (`ProdDesinfecCuarentena`),
  ADD KEY `cuarentenas_idfk_3` (`EncargadoCuarenten`);

--
-- Indices de la tabla `datosfincas`
--
ALTER TABLE `datosfincas`
  ADD PRIMARY KEY (`NombreFinca`),
  ADD KEY `datosfincas_idfk_1` (`MunicipioFinca`),
  ADD KEY `datosfincas_idfk_2` (`VeredaFinca`),
  ADD KEY `datosfincas_idfk_3` (`BarrioFinca`);

--
-- Indices de la tabla `encargados`
--
ALTER TABLE `encargados`
  ADD PRIMARY KEY (`NumeroDocumento`),
  ADD KEY `encargados_idfk_1` (`PerfilEncargado`);

--
-- Indices de la tabla `etapas`
--
ALTER TABLE `etapas`
  ADD PRIMARY KEY (`IdEtapa`),
  ADD UNIQUE KEY `NombreEtapa` (`NombreEtapa`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`IdGenero`),
  ADD UNIQUE KEY `NombreGenero` (`NombreGenero`);

--
-- Indices de la tabla `hojasvida`
--
ALTER TABLE `hojasvida`
  ADD PRIMARY KEY (`NroPotreroHV`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indices de la tabla `movimientosganados`
--
ALTER TABLE `movimientosganados`
  ADD PRIMARY KEY (`IdMovGanado`),
  ADD KEY `movimientosganados_idfk_1` (`AnimMovGanado`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`IdMunicipio`);

--
-- Indices de la tabla `partos`
--
ALTER TABLE `partos`
  ADD PRIMARY KEY (`IdParto`),
  ADD KEY `partos_idfk_1` (`VacaParto`),
  ADD KEY `partos_idfk_2` (`ToroParto`),
  ADD KEY `partos_idfk_3` (`SexoCriaParto`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`IdPerfil`),
  ADD KEY `NombrePerfil` (`NombrePerfil`);

--
-- Indices de la tabla `pesajesterneras`
--
ALTER TABLE `pesajesterneras`
  ADD PRIMARY KEY (`IdPTernera`),
  ADD KEY `pesajesterneras_idfk_1` (`AnimPTernera`),
  ADD KEY `pesajesterneras_idfk_2` (`MedPTernera`);

--
-- Indices de la tabla `produccionesdiarias`
--
ALTER TABLE `produccionesdiarias`
  ADD PRIMARY KEY (`IdPDiaria`);

--
-- Indices de la tabla `produccionesvacas`
--
ALTER TABLE `produccionesvacas`
  ADD PRIMARY KEY (`IdProdVaca`);

--
-- Indices de la tabla `razas`
--
ALTER TABLE `razas`
  ADD PRIMARY KEY (`IdRaza`),
  ADD UNIQUE KEY `NombreRaza` (`NombreRaza`);

--
-- Indices de la tabla `refrigeraciones`
--
ALTER TABLE `refrigeraciones`
  ADD PRIMARY KEY (`IdRefrigeracion`),
  ADD KEY `refrigeraciones_idfk_1` (`EncargadoRefrigeracion`);

--
-- Indices de la tabla `registrosalimentos`
--
ALTER TABLE `registrosalimentos`
  ADD PRIMARY KEY (`RegIcaAlimento`),
  ADD UNIQUE KEY `NombreAlimento` (`NombreAlimento`),
  ADD KEY `registrosalimentos_idfk_1` (`EncargadoAlimento`),
  ADD KEY `registrosalimentos_idfk_2` (`TipoAlimento`);

--
-- Indices de la tabla `registrosanimeles`
--
ALTER TABLE `registrosanimeles`
  ADD PRIMARY KEY (`ChapetaAnimal`),
  ADD KEY `registrosanimeles_idfk_1` (`MadreAnimal`),
  ADD KEY `registrosanimeles_idfk_2` (`PadreAnimal`),
  ADD KEY `registrosanimeles_idfk_3` (`RazaAnimal`),
  ADD KEY `registrosanimeles_idfk_4` (`TipoAnimal`);

--
-- Indices de la tabla `registrosanimmadres`
--
ALTER TABLE `registrosanimmadres`
  ADD PRIMARY KEY (`IdVacaMadre`);

--
-- Indices de la tabla `registrosanimpadres`
--
ALTER TABLE `registrosanimpadres`
  ADD PRIMARY KEY (`IdToroPadre`);

--
-- Indices de la tabla `registrosmedicamentos`
--
ALTER TABLE `registrosmedicamentos`
  ADD PRIMARY KEY (`IdRegIcaMedicamento`),
  ADD UNIQUE KEY `NombreMedicamento` (`NombreMedicamento`);

--
-- Indices de la tabla `registrospalpaciones`
--
ALTER TABLE `registrospalpaciones`
  ADD PRIMARY KEY (`IdPalpacion`),
  ADD KEY `registrospalpaciones_idfk_1` (`VacaPalpacion`);

--
-- Indices de la tabla `registrosproductos`
--
ALTER TABLE `registrosproductos`
  ADD PRIMARY KEY (`RegIcaProd`),
  ADD UNIQUE KEY `NombreProd` (`NombreProd`),
  ADD KEY `registrosproductos_idfk_1` (`EncargadoProd`),
  ADD KEY `registrosproductos_idfk_2` (`TipoProd`);

--
-- Indices de la tabla `secados`
--
ALTER TABLE `secados`
  ADD PRIMARY KEY (`IdSecado`),
  ADD KEY `secados_idfk_1` (`VacaSecado`),
  ADD KEY `secados_idfk_2` (`TratamVacaSecado`),
  ADD KEY `secados_idfk_3` (`VermiSecado`);

--
-- Indices de la tabla `servicioscalores`
--
ALTER TABLE `servicioscalores`
  ADD PRIMARY KEY (`IdSCalores`),
  ADD KEY `servicioscalores_idfk_1` (`VacaSCalores`),
  ADD KEY `servicioscalores_idfk_2` (`ToroSCalores`),
  ADD KEY `servicioscalores_idfk_3` (`InseminSCalores`);

--
-- Indices de la tabla `sexos`
--
ALTER TABLE `sexos`
  ADD PRIMARY KEY (`IdSexo`),
  ADD UNIQUE KEY `NombreSexo` (`NombreSexo`);

--
-- Indices de la tabla `tiposalimentos`
--
ALTER TABLE `tiposalimentos`
  ADD PRIMARY KEY (`IdTAlimento`),
  ADD UNIQUE KEY `NombreTAlimento` (`NombreTAlimento`);

--
-- Indices de la tabla `tiposanimales`
--
ALTER TABLE `tiposanimales`
  ADD PRIMARY KEY (`IdTipoAnimal`),
  ADD UNIQUE KEY `NombreTipoAnimal` (`NombreTipoAnimal`);

--
-- Indices de la tabla `tiposdocumentos`
--
ALTER TABLE `tiposdocumentos`
  ADD PRIMARY KEY (`IdTipoDocumento`),
  ADD UNIQUE KEY `NombreTipoDocumento` (`NombreTipoDocumento`);

--
-- Indices de la tabla `tiposmedicamentos`
--
ALTER TABLE `tiposmedicamentos`
  ADD PRIMARY KEY (`IdMedicamento`),
  ADD UNIQUE KEY `NombreMedicamento` (`NombreMedicamento`);

--
-- Indices de la tabla `tiposproductos`
--
ALTER TABLE `tiposproductos`
  ADD PRIMARY KEY (`IdTProducto`),
  ADD UNIQUE KEY `NombreTProducto` (`NombreTProducto`);

--
-- Indices de la tabla `transaccion_medicamentos`
--
ALTER TABLE `transaccion_medicamentos`
  ADD PRIMARY KEY (`codigo_transaccion`),
  ADD KEY `id_barang` (`codigo`),
  ADD KEY `created_user` (`created_user`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`IdTratamiento`),
  ADD UNIQUE KEY `NombreTratamiento` (`NombreTratamiento`),
  ADD KEY `tratamientos_idfk_1` (`AnimTratamiento`),
  ADD KEY `tratamientos_idfk_2` (`MedTratamiento`),
  ADD KEY `tratamientos_idfk_3` (`EncargadoTratamiento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`permisos_acceso`);

--
-- Indices de la tabla `veredas`
--
ALTER TABLE `veredas`
  ADD PRIMARY KEY (`IdVereda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `etapas`
--
ALTER TABLE `etapas`
  MODIFY `IdEtapa` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuarentenas`
--
ALTER TABLE `cuarentenas`
  ADD CONSTRAINT `cuarentenas_idfk_1` FOREIGN KEY (`AnimCuarentena`) REFERENCES `registrosanimeles` (`ChapetaAnimal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cuarentenas_idfk_2` FOREIGN KEY (`ProdDesinfecCuarentena`) REFERENCES `registrosproductos` (`RegIcaProd`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cuarentenas_idfk_3` FOREIGN KEY (`EncargadoCuarenten`) REFERENCES `encargados` (`NumeroDocumento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `datosfincas`
--
ALTER TABLE `datosfincas`
  ADD CONSTRAINT `datosfincas_idfk_1` FOREIGN KEY (`MunicipioFinca`) REFERENCES `municipios` (`IdMunicipio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `datosfincas_idfk_2` FOREIGN KEY (`VeredaFinca`) REFERENCES `veredas` (`IdVereda`) ON UPDATE CASCADE,
  ADD CONSTRAINT `datosfincas_idfk_3` FOREIGN KEY (`BarrioFinca`) REFERENCES `barrios` (`IdBarrio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `encargados`
--
ALTER TABLE `encargados`
  ADD CONSTRAINT `encargados_idfk_1` FOREIGN KEY (`PerfilEncargado`) REFERENCES `perfiles` (`IdPerfil`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD CONSTRAINT `medicamentos_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medicamentos_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimientosganados`
--
ALTER TABLE `movimientosganados`
  ADD CONSTRAINT `movimientosganados_idfk_1` FOREIGN KEY (`AnimMovGanado`) REFERENCES `registrosanimeles` (`ChapetaAnimal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `partos`
--
ALTER TABLE `partos`
  ADD CONSTRAINT `partos_idfk_1` FOREIGN KEY (`VacaParto`) REFERENCES `registrosanimmadres` (`IdVacaMadre`) ON UPDATE CASCADE,
  ADD CONSTRAINT `partos_idfk_2` FOREIGN KEY (`ToroParto`) REFERENCES `registrosanimpadres` (`IdToroPadre`) ON UPDATE CASCADE,
  ADD CONSTRAINT `partos_idfk_3` FOREIGN KEY (`SexoCriaParto`) REFERENCES `sexos` (`IdSexo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pesajesterneras`
--
ALTER TABLE `pesajesterneras`
  ADD CONSTRAINT `pesajesterneras_idfk_1` FOREIGN KEY (`AnimPTernera`) REFERENCES `registrosanimeles` (`ChapetaAnimal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pesajesterneras_idfk_2` FOREIGN KEY (`MedPTernera`) REFERENCES `registrosmedicamentos` (`IdRegIcaMedicamento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `refrigeraciones`
--
ALTER TABLE `refrigeraciones`
  ADD CONSTRAINT `refrigeraciones_idfk_1` FOREIGN KEY (`EncargadoRefrigeracion`) REFERENCES `encargados` (`NumeroDocumento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `registrosalimentos`
--
ALTER TABLE `registrosalimentos`
  ADD CONSTRAINT `registrosalimentos_idfk_1` FOREIGN KEY (`EncargadoAlimento`) REFERENCES `encargados` (`NumeroDocumento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `registrosalimentos_idfk_2` FOREIGN KEY (`TipoAlimento`) REFERENCES `tiposalimentos` (`IdTAlimento`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `registrosanimeles`
--
ALTER TABLE `registrosanimeles`
  ADD CONSTRAINT `registrosanimeles_idfk_1` FOREIGN KEY (`MadreAnimal`) REFERENCES `registrosanimmadres` (`IdVacaMadre`) ON UPDATE CASCADE,
  ADD CONSTRAINT `registrosanimeles_idfk_2` FOREIGN KEY (`PadreAnimal`) REFERENCES `registrosanimpadres` (`IdToroPadre`) ON UPDATE CASCADE,
  ADD CONSTRAINT `registrosanimeles_idfk_3` FOREIGN KEY (`RazaAnimal`) REFERENCES `razas` (`IdRaza`) ON UPDATE CASCADE,
  ADD CONSTRAINT `registrosanimeles_idfk_4` FOREIGN KEY (`TipoAnimal`) REFERENCES `tiposanimales` (`IdTipoAnimal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `registrospalpaciones`
--
ALTER TABLE `registrospalpaciones`
  ADD CONSTRAINT `registrospalpaciones_idfk_1` FOREIGN KEY (`VacaPalpacion`) REFERENCES `registrosanimmadres` (`IdVacaMadre`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `registrosproductos`
--
ALTER TABLE `registrosproductos`
  ADD CONSTRAINT `registrosproductos_idfk_1` FOREIGN KEY (`EncargadoProd`) REFERENCES `encargados` (`NumeroDocumento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `registrosproductos_idfk_2` FOREIGN KEY (`TipoProd`) REFERENCES `tiposproductos` (`IdTProducto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `secados`
--
ALTER TABLE `secados`
  ADD CONSTRAINT `secados_idfk_1` FOREIGN KEY (`VacaSecado`) REFERENCES `registrosanimmadres` (`IdVacaMadre`) ON UPDATE CASCADE,
  ADD CONSTRAINT `secados_idfk_2` FOREIGN KEY (`TratamVacaSecado`) REFERENCES `tratamientos` (`IdTratamiento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `secados_idfk_3` FOREIGN KEY (`VermiSecado`) REFERENCES `registrosproductos` (`RegIcaProd`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `transaccion_medicamentos`
--
ALTER TABLE `transaccion_medicamentos`
  ADD CONSTRAINT `transaccion_medicamentos_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `medicamentos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaccion_medicamentos_ibfk_2` FOREIGN KEY (`created_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
