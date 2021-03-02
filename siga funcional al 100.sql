/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : 127.0.0.1:3306
 Source Schema         : siga

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 17/11/2020 11:12:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for archivos
-- ----------------------------
DROP TABLE IF EXISTS `archivos`;
CREATE TABLE `archivos`  (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_vehiculo` bigint(255) NULL DEFAULT NULL,
  `ruta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_vehiculo`(`id_vehiculo`) USING BTREE,
  CONSTRAINT `id_vehiculo` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of archivos
-- ----------------------------
INSERT INTO `archivos` VALUES (6, 4723102020, '../files/4723102020/');
INSERT INTO `archivos` VALUES (7, 4805112020, '../files/4805112020/');
INSERT INTO `archivos` VALUES (8, 4907112020, '../files/4907112020/');
INSERT INTO `archivos` VALUES (9, 4907112020, '../files/4907112020/');
INSERT INTO `archivos` VALUES (10, 4907112020, '../files/4907112020/');
INSERT INTO `archivos` VALUES (11, 4320102020, '../files/4320102020/');
INSERT INTO `archivos` VALUES (12, 2316102020, '../files/2316102020/');
INSERT INTO `archivos` VALUES (13, 2616102020, '../files/2616102020/');
INSERT INTO `archivos` VALUES (14, 3019102020, '../files/3019102020/');
INSERT INTO `archivos` VALUES (15, 3119102020, '../files/3119102020/');
INSERT INTO `archivos` VALUES (16, 3319102020, '../files/3319102020/');
INSERT INTO `archivos` VALUES (17, 5514112020, '../files/5514112020/');

-- ----------------------------
-- Table structure for aseguradoras
-- ----------------------------
DROP TABLE IF EXISTS `aseguradoras`;
CREATE TABLE `aseguradoras`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of aseguradoras
-- ----------------------------
INSERT INTO `aseguradoras` VALUES (1, 'GNP');
INSERT INTO `aseguradoras` VALUES (2, 'HDI');
INSERT INTO `aseguradoras` VALUES (3, 'Particular');
INSERT INTO `aseguradoras` VALUES (4, 'QUALITAS');

-- ----------------------------
-- Table structure for asesores
-- ----------------------------
DROP TABLE IF EXISTS `asesores`;
CREATE TABLE `asesores`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_aseguradora` int(10) NULL DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `a_paterno` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `a_materno` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_aseguradora`(`id_aseguradora`) USING BTREE,
  CONSTRAINT `id_aseguradora` FOREIGN KEY (`id_aseguradora`) REFERENCES `aseguradoras` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of asesores
-- ----------------------------
INSERT INTO `asesores` VALUES (1, 4, 'Raúl Alejandro', 'Hernandez', 'Casas');
INSERT INTO `asesores` VALUES (2, 1, 'Noel Gabriel', 'Martínez', 'Flores');
INSERT INTO `asesores` VALUES (3, 2, 'Noel Gabriel', 'Martínez', 'Flores');
INSERT INTO `asesores` VALUES (4, 3, 'Noel Gabriel', 'Martínez', 'Flores');

-- ----------------------------
-- Table structure for checklist
-- ----------------------------
DROP TABLE IF EXISTS `checklist`;
CREATE TABLE `checklist`  (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_aux_vehiculo` bigint(11) NOT NULL,
  `luces_front` int(1) NULL DEFAULT NULL,
  `cuarto_luces` int(1) NULL DEFAULT NULL,
  `direccional_izq` int(1) NULL DEFAULT NULL,
  `direccional_der` int(1) NULL DEFAULT NULL,
  `espejo_der` int(1) NULL DEFAULT NULL,
  `espejo_izq` int(1) NULL DEFAULT NULL,
  `cristales` int(1) NULL DEFAULT NULL,
  `emblema` int(1) NULL DEFAULT NULL,
  `llantas` int(1) NULL DEFAULT NULL,
  `tapon_ruedas` int(1) NULL DEFAULT NULL,
  `molduras` int(1) NULL DEFAULT NULL,
  `tapa_gasolina` int(1) NULL DEFAULT NULL,
  `stopp` int(1) NULL DEFAULT NULL,
  `luz_tras_izq` int(1) NULL DEFAULT NULL,
  `luz_tras_der` int(1) NULL DEFAULT NULL,
  `direccional_tras_izq` int(1) NULL DEFAULT NULL,
  `direccional_tras_der` int(1) NULL DEFAULT NULL,
  `luz_placa` int(1) NULL DEFAULT NULL,
  `luz_cajuela` int(1) NULL DEFAULT NULL,
  `luz_tablero` int(1) NULL DEFAULT NULL,
  `instrumentos_tablero` int(1) NULL DEFAULT NULL,
  `llaves` int(1) NULL DEFAULT NULL,
  `limpia_parabrisas_fron` int(1) NULL DEFAULT NULL,
  `limpia_parabrisas_tras` int(1) NULL DEFAULT NULL,
  `estereo` int(1) NULL DEFAULT NULL,
  `bocinas_fron` int(1) NULL DEFAULT NULL,
  `bocinas_tras` int(1) NULL DEFAULT NULL,
  `encendedor` int(1) NULL DEFAULT NULL,
  `espejo_retrovisor` int(1) NULL DEFAULT NULL,
  `cenicero` int(1) NULL DEFAULT NULL,
  `cinturones` int(1) NULL DEFAULT NULL,
  `luz_int` int(1) NULL DEFAULT NULL,
  `parasol_izq` int(1) NULL DEFAULT NULL,
  `parasol_der` int(1) NULL DEFAULT NULL,
  `vestiduras_tela` int(1) NULL DEFAULT NULL,
  `vestiduras_piel` int(1) NULL DEFAULT NULL,
  `testigos_tablero` int(1) NULL DEFAULT NULL,
  `refaccion` int(1) NULL DEFAULT NULL,
  `dado_seguridad` int(1) NULL DEFAULT NULL,
  `gato` int(1) NULL DEFAULT NULL,
  `maneral` int(1) NULL DEFAULT NULL,
  `herramientas` int(1) NULL DEFAULT NULL,
  `triangulos` int(1) NULL DEFAULT NULL,
  `botiquin` int(1) NULL DEFAULT NULL,
  `extintor` int(1) NULL DEFAULT NULL,
  `cables` int(1) NULL DEFAULT NULL,
  `claxon` int(1) NULL DEFAULT NULL,
  `tapon_aceite` int(1) NULL DEFAULT NULL,
  `tapon_gasolina` int(1) NULL DEFAULT NULL,
  `tapon_radiador` int(1) NULL DEFAULT NULL,
  `vayoneta_aceite` int(1) NULL DEFAULT NULL,
  `bateria` int(1) NULL DEFAULT NULL,
  `cambustible` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kilometraje` int(6) NULL DEFAULT NULL,
  `observaciones` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ruta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_aux_vehiculo`(`id_aux_vehiculo`) USING BTREE,
  CONSTRAINT `id_aux_vehiculo` FOREIGN KEY (`id_aux_vehiculo`) REFERENCES `vehiculo` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of checklist
-- ----------------------------
INSERT INTO `checklist` VALUES (1, 4723102020, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, '4', 123456, 'Hola Mundo!!!', NULL);
INSERT INTO `checklist` VALUES (2, 4907112020, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '3', 198745, 'El vehiculo presenta muchas preexistencias/Posibles daños ocultos en suspencion y direccion/Posibles daños ocultos en motor dado que no enciende/Pertenencias en cajuela se anexa evidencia', NULL);
INSERT INTO `checklist` VALUES (3, 5413112020, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2', 132654, 'Esta cochino/No huele bien/tiene rallones/y asi', NULL);
INSERT INTO `checklist` VALUES (4, 5514112020, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '4', 10, 'qwe/qwe/qwe/qwe', NULL);
INSERT INTO `checklist` VALUES (5, 5614112020, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '4', 78200, 'Sale aceite/mas aceite/y mucho mas aceite', NULL);

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `telefono` bigint(10) NULL DEFAULT NULL,
  `correo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES (1, 'Horacio', 2147483647, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (2, 'Jose', 798987, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (3, 'Pedro', 2147483647, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (4, 'Ernesto', 321456987, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (5, 'Juan', 12365789, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (6, 'Raúl', 1233214567, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (7, 'Maria', 2147483647, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (8, 'Esme', 1234567980, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (9, 'Horacio', 2147483647, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (10, 'qeqwe', 844119987, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (11, 'qeqwe', 844119987, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (12, 'Jose', 2147483647, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (13, 'Jose', 2147483647, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (14, 'Jose', 2147483647, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (15, 'qweqwe', 1234567899, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (16, 'Horacio GT', 2147483647, 'josehgt12@live.com.mx');
INSERT INTO `clientes` VALUES (17, 'qweqwe', 0, 'qew');
INSERT INTO `clientes` VALUES (18, 'qweqwe', 2147483647, 'josehgt12@live.com.mx');
INSERT INTO `clientes` VALUES (19, 'Marco', 2147483647, 'jose097543@gmail.com');
INSERT INTO `clientes` VALUES (20, 'Noel', 2147483647, 'josehgt12@live.com.mx');
INSERT INTO `clientes` VALUES (21, 'Josép', 2147483647, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (22, 'Josép', 2147483647, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (23, 'Jose', 2147483647, 'jose097543@gmail.com');
INSERT INTO `clientes` VALUES (24, 'PACOP', 2147483647, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (25, 'Horacio', 8441198017, 'jose097543@gmail.com');
INSERT INTO `clientes` VALUES (26, 'Horacio', 8441198017, 'jose097543@gmail.com');
INSERT INTO `clientes` VALUES (27, 'José', 8441198017, 'jose097543@gmail.com');
INSERT INTO `clientes` VALUES (28, 'Hernesto', 1234567890, 'tecallojale@gmail.com');
INSERT INTO `clientes` VALUES (29, 'Noel', 8441116581, 'josehgt12@live.com.mx');
INSERT INTO `clientes` VALUES (30, 'Pedro', 789465130, 'jose097543@gmail.com');
INSERT INTO `clientes` VALUES (31, 'Ruby', 7531598524, 'ruby@gmail.com');
INSERT INTO `clientes` VALUES (32, 'Luis', 123456789, 'luis@gmail.com');
INSERT INTO `clientes` VALUES (33, 'qwe', 0, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (34, 'Pedro', 123456789, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (35, 'qweqewqwe', 231231312, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (36, 'Maria', 1599633214, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (37, 'Raul', 1234567890, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (38, 'Pedro Infante', 1234567890, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (39, 'qwe', 0, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (40, 'Virgilio', 8441552082, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (41, 'Adrian', 7894561320, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (42, 'Claudia', 7984651320, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (43, 'Lucas', 1234567890, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (44, 'Bugs', 1234567890, 'josehgt12@live.com.mx');
INSERT INTO `clientes` VALUES (45, 'Alejandro ', 7894651320, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (46, 'qwe', 0, 'qew');
INSERT INTO `clientes` VALUES (47, 'Ruby', 8441198017, 'jose097543@gmail.com');
INSERT INTO `clientes` VALUES (48, 'Rudy', 1234567980, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (49, 'Alma', 1234567890, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (50, 'Karen', 1234567890, 'jose097543@gmail.com');
INSERT INTO `clientes` VALUES (51, 'Pedrop', 1234567890, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (52, 'Gabriel', 8441198017, 'josehgt12@live.com.mx');
INSERT INTO `clientes` VALUES (53, 'horacio', 8441198017, 'josehgt12@live.com.mx');
INSERT INTO `clientes` VALUES (54, 'Pedro', 8441198017, 'josehgt12@live.com.mx');
INSERT INTO `clientes` VALUES (55, 'Sergio', 8441198017, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (56, 'Panhc', 8441198017, 'jose097543@gmail.com');
INSERT INTO `clientes` VALUES (57, 'Jaime ', 8441198017, 'jose097543@gmail.com');
INSERT INTO `clientes` VALUES (58, 'Jhon', 8441198017, 'josehgt12@live.com.mx');
INSERT INTO `clientes` VALUES (59, 'David Sama', 8441198017, 'qwe@gmail.com');
INSERT INTO `clientes` VALUES (60, 'Pedroforo', 8441198017, 'qwe@gmail.com');

-- ----------------------------
-- Table structure for estatus
-- ----------------------------
DROP TABLE IF EXISTS `estatus`;
CREATE TABLE `estatus`  (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of estatus
-- ----------------------------
INSERT INTO `estatus` VALUES (1, 'Baja');
INSERT INTO `estatus` VALUES (2, 'Cerrado');
INSERT INTO `estatus` VALUES (3, 'Entregado');
INSERT INTO `estatus` VALUES (4, 'Factura');
INSERT INTO `estatus` VALUES (5, 'Taller');
INSERT INTO `estatus` VALUES (6, 'Transito');

-- ----------------------------
-- Table structure for modelosv
-- ----------------------------
DROP TABLE IF EXISTS `modelosv`;
CREATE TABLE `modelosv`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of modelosv
-- ----------------------------
INSERT INTO `modelosv` VALUES (1, 'Audi');
INSERT INTO `modelosv` VALUES (2, 'BMW');
INSERT INTO `modelosv` VALUES (3, 'Buick');
INSERT INTO `modelosv` VALUES (4, 'Cadillac');
INSERT INTO `modelosv` VALUES (5, 'Chevrolet');
INSERT INTO `modelosv` VALUES (6, 'Chrysler');
INSERT INTO `modelosv` VALUES (7, 'Dodge');
INSERT INTO `modelosv` VALUES (8, 'Fiat');
INSERT INTO `modelosv` VALUES (9, 'Ford');
INSERT INTO `modelosv` VALUES (10, 'GMC');
INSERT INTO `modelosv` VALUES (11, 'Honda');
INSERT INTO `modelosv` VALUES (12, 'Hyundai');
INSERT INTO `modelosv` VALUES (13, 'Jaguar');
INSERT INTO `modelosv` VALUES (14, 'Jeep');
INSERT INTO `modelosv` VALUES (15, 'KIA');
INSERT INTO `modelosv` VALUES (16, 'Lincoln');
INSERT INTO `modelosv` VALUES (17, 'Mazda');
INSERT INTO `modelosv` VALUES (18, 'Mercedes-Benz');
INSERT INTO `modelosv` VALUES (19, 'Mercury');
INSERT INTO `modelosv` VALUES (20, 'MINI');
INSERT INTO `modelosv` VALUES (21, 'Mitsubishi');
INSERT INTO `modelosv` VALUES (22, 'Nissan');
INSERT INTO `modelosv` VALUES (23, 'Peugeot');
INSERT INTO `modelosv` VALUES (24, 'Renault');
INSERT INTO `modelosv` VALUES (25, 'Seat');
INSERT INTO `modelosv` VALUES (26, 'Subaru');
INSERT INTO `modelosv` VALUES (27, 'Suzuki');
INSERT INTO `modelosv` VALUES (28, 'Toyota');
INSERT INTO `modelosv` VALUES (29, 'Volkswagen');

-- ----------------------------
-- Table structure for presupuestos
-- ----------------------------
DROP TABLE IF EXISTS `presupuestos`;
CREATE TABLE `presupuestos`  (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_vehiculo` bigint(11) NULL DEFAULT NULL,
  `op` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nivel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `concepto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `momh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `momp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `momm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tot` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `refacciones` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tmomh` int(6) NULL DEFAULT NULL,
  `tmomp` int(6) NULL DEFAULT NULL,
  `tmomm` int(6) NULL DEFAULT NULL,
  `ttot` int(6) NULL DEFAULT NULL,
  `trefacciones` int(6) NULL DEFAULT NULL,
  `subtotal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `iva` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_vehiculo|`(`id_vehiculo`) USING BTREE,
  CONSTRAINT `id_vehiculo|` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of presupuestos
-- ----------------------------
INSERT INTO `presupuestos` VALUES (1, 5413112020, 'c/c/r', 'alto/medio/bajo', NULL, 'fascia/wipers/llantas', '452.31/85/98', '7536.98/741.32/123', '206.34/759.78/7412.36', '123/123/123', 635, 8401, 8378, 10000, 0, '369.00', '27784.44', '4445.51');
INSERT INTO `presupuestos` VALUES (2, 5313112020, 'c/c/r', 'alto/bajo/medio', NULL, 'discos/duros/solidos', '758.45/852.01/759.36', '754.89/753.98/756', '231.41/123.98/657', '159/789.63/321.14', 2370, 2265, 1012, 2167, 798, '1269.77', '9084.18', '1453.47');
INSERT INTO `presupuestos` VALUES (3, 5207112020, 'c/r/c', 'alto/bajo/medio', 'retrovisor/llantas/rines', '978.25/963.36/741', '123/987.12/759', '569/742.36/75398.36', '123/123/123', '2682.61/12.32/7536.89', 1869, 76710, 369, 1962, 987, '83592.45', '13374.79', '96967.24');
INSERT INTO `presupuestos` VALUES (4, 5107112020, 'r/r/r', 'medio/bajo/alto', 'fascia/guia/trasero', '12/12/12', '13/13/13', '14/14/14', '15/15/15', '36.00', 39, 42, 45, 48, 16, '210.00', '33.60', '243.60');
INSERT INTO `presupuestos` VALUES (5, 5007112020, 'c/c/c', 'alto/alto/alto', 'qwe/rwe/gsfgd', '12/12/12', '13/13/13', '14/14/14', '15/15/15', '36.00', 39, 42, 45, 48, 16, '210.00', '33.60', '243.60');
INSERT INTO `presupuestos` VALUES (6, 4907112020, 'r/c/r', 'bajo/bajo/bajo', 'ewq/asd/zxc', '12/12/12', '13/13/13', '14/14/14', '15/15/15', '36.00', 39, 42, 45, 48, 16, '210.00', '33.60', '243.60');
INSERT INTO `presupuestos` VALUES (7, 4805112020, 'r/r/r', 'medio/bajo/alto', 'jamon/pan/leche', '12/12/12', '13/13/13', '14/14/14', '15/15/15', '16/16/16', 36, 39, 42, 45, 48, '210.00', '33.60', '243.60');
INSERT INTO `presupuestos` VALUES (8, 5514112020, 'c/c/c', 'm/m/m', 'qwe/qwe/qwe', '12/12/12', '13/13/13', '14/14/14', '15/15/15', '16/16/16', 36, 39, 42, 45, 48, '210.00', '33.60', '243.60');

-- ----------------------------
-- Table structure for submarcav
-- ----------------------------
DROP TABLE IF EXISTS `submarcav`;
CREATE TABLE `submarcav`  (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `id_marca` int(2) NOT NULL,
  `submarca` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_marca`(`id_marca`) USING BTREE,
  CONSTRAINT `id_marca` FOREIGN KEY (`id_marca`) REFERENCES `modelosv` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 151 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of submarcav
-- ----------------------------
INSERT INTO `submarcav` VALUES (1, 1, 'A1');
INSERT INTO `submarcav` VALUES (2, 1, 'A4');
INSERT INTO `submarcav` VALUES (3, 1, 'A7');
INSERT INTO `submarcav` VALUES (4, 2, '320');
INSERT INTO `submarcav` VALUES (5, 2, '3201');
INSERT INTO `submarcav` VALUES (6, 2, '325i');
INSERT INTO `submarcav` VALUES (7, 2, 'Serie 3');
INSERT INTO `submarcav` VALUES (8, 2, 'X3');
INSERT INTO `submarcav` VALUES (9, 2, 'X4');
INSERT INTO `submarcav` VALUES (10, 2, 'X5');
INSERT INTO `submarcav` VALUES (11, 3, 'Enclave');
INSERT INTO `submarcav` VALUES (12, 4, 'CTS');
INSERT INTO `submarcav` VALUES (13, 5, 'Astra');
INSERT INTO `submarcav` VALUES (14, 5, 'Aveo');
INSERT INTO `submarcav` VALUES (15, 5, 'Beat');
INSERT INTO `submarcav` VALUES (16, 5, 'Chevy');
INSERT INTO `submarcav` VALUES (17, 5, 'Cheyenne');
INSERT INTO `submarcav` VALUES (18, 5, 'Colorado');
INSERT INTO `submarcav` VALUES (19, 5, 'Corsa');
INSERT INTO `submarcav` VALUES (20, 5, 'Cruze');
INSERT INTO `submarcav` VALUES (21, 5, 'Equinox');
INSERT INTO `submarcav` VALUES (22, 5, 'Express Van');
INSERT INTO `submarcav` VALUES (23, 5, 'Malibu');
INSERT INTO `submarcav` VALUES (24, 5, 'Matiz');
INSERT INTO `submarcav` VALUES (25, 5, 'Optra');
INSERT INTO `submarcav` VALUES (26, 5, 'Ram 700');
INSERT INTO `submarcav` VALUES (27, 5, 'S10');
INSERT INTO `submarcav` VALUES (28, 5, 'Silverado');
INSERT INTO `submarcav` VALUES (29, 5, 'Sonic');
INSERT INTO `submarcav` VALUES (30, 5, 'Spark');
INSERT INTO `submarcav` VALUES (31, 5, 'Suburban');
INSERT INTO `submarcav` VALUES (32, 5, 'Tahoe');
INSERT INTO `submarcav` VALUES (33, 5, 'Tornado');
INSERT INTO `submarcav` VALUES (34, 5, 'TrailBlazer');
INSERT INTO `submarcav` VALUES (35, 5, 'Traverse');
INSERT INTO `submarcav` VALUES (36, 5, 'Trax');
INSERT INTO `submarcav` VALUES (37, 6, 'Pacifica');
INSERT INTO `submarcav` VALUES (38, 6, 'Town Country');
INSERT INTO `submarcav` VALUES (39, 6, 'Voyager');
INSERT INTO `submarcav` VALUES (40, 7, 'Attitude');
INSERT INTO `submarcav` VALUES (41, 7, 'Caliber');
INSERT INTO `submarcav` VALUES (42, 7, 'Charger');
INSERT INTO `submarcav` VALUES (43, 7, 'Dakota');
INSERT INTO `submarcav` VALUES (44, 7, 'Grand Caravan');
INSERT INTO `submarcav` VALUES (45, 7, 'Journey');
INSERT INTO `submarcav` VALUES (46, 7, 'Neon');
INSERT INTO `submarcav` VALUES (47, 7, 'Ram 2500');
INSERT INTO `submarcav` VALUES (48, 7, 'Ram');
INSERT INTO `submarcav` VALUES (49, 8, 'Uno');
INSERT INTO `submarcav` VALUES (50, 9, 'EcoSport');
INSERT INTO `submarcav` VALUES (51, 9, 'Edge');
INSERT INTO `submarcav` VALUES (52, 9, 'Escape');
INSERT INTO `submarcav` VALUES (53, 9, 'Explorer');
INSERT INTO `submarcav` VALUES (54, 9, 'F200');
INSERT INTO `submarcav` VALUES (55, 9, 'F350');
INSERT INTO `submarcav` VALUES (56, 9, 'Fiesta');
INSERT INTO `submarcav` VALUES (57, 9, 'Focus');
INSERT INTO `submarcav` VALUES (58, 9, 'Fusion');
INSERT INTO `submarcav` VALUES (59, 9, 'Lobo');
INSERT INTO `submarcav` VALUES (60, 9, 'Mustang');
INSERT INTO `submarcav` VALUES (61, 9, 'Ranger');
INSERT INTO `submarcav` VALUES (62, 10, 'Jimmy');
INSERT INTO `submarcav` VALUES (63, 10, 'Sierra');
INSERT INTO `submarcav` VALUES (64, 11, 'Accord');
INSERT INTO `submarcav` VALUES (65, 11, 'City');
INSERT INTO `submarcav` VALUES (66, 11, 'Civic');
INSERT INTO `submarcav` VALUES (67, 11, 'CR-V');
INSERT INTO `submarcav` VALUES (68, 11, 'CR-V Turbo');
INSERT INTO `submarcav` VALUES (69, 11, 'HR-V');
INSERT INTO `submarcav` VALUES (70, 11, 'Odyssey');
INSERT INTO `submarcav` VALUES (71, 12, 'Elantra');
INSERT INTO `submarcav` VALUES (72, 12, 'Grand i10');
INSERT INTO `submarcav` VALUES (73, 12, 'i10');
INSERT INTO `submarcav` VALUES (74, 13, 'F-Pace');
INSERT INTO `submarcav` VALUES (75, 14, 'Commander');
INSERT INTO `submarcav` VALUES (76, 14, 'Compass');
INSERT INTO `submarcav` VALUES (77, 14, 'Grand Cherokee');
INSERT INTO `submarcav` VALUES (78, 14, 'Liberty');
INSERT INTO `submarcav` VALUES (79, 14, 'Patriot');
INSERT INTO `submarcav` VALUES (80, 15, 'Forte');
INSERT INTO `submarcav` VALUES (81, 15, 'Rio');
INSERT INTO `submarcav` VALUES (82, 15, 'Sportage');
INSERT INTO `submarcav` VALUES (83, 16, 'Mark');
INSERT INTO `submarcav` VALUES (84, 16, 'Mark LT');
INSERT INTO `submarcav` VALUES (85, 16, 'MKZ');
INSERT INTO `submarcav` VALUES (86, 17, '3');
INSERT INTO `submarcav` VALUES (87, 17, '6');
INSERT INTO `submarcav` VALUES (88, 17, 'CX-3');
INSERT INTO `submarcav` VALUES (89, 17, 'CX-5');
INSERT INTO `submarcav` VALUES (90, 17, 'CX-9');
INSERT INTO `submarcav` VALUES (91, 18, 'CLA 200');
INSERT INTO `submarcav` VALUES (92, 18, 'GLK-6');
INSERT INTO `submarcav` VALUES (93, 18, 'SLK');
INSERT INTO `submarcav` VALUES (94, 19, 'Milan');
INSERT INTO `submarcav` VALUES (95, 20, 'Cooper');
INSERT INTO `submarcav` VALUES (96, 20, 'MINI III');
INSERT INTO `submarcav` VALUES (97, 21, 'L-200');
INSERT INTO `submarcav` VALUES (98, 21, 'Outlander');
INSERT INTO `submarcav` VALUES (99, 22, 'Altima');
INSERT INTO `submarcav` VALUES (100, 22, 'Aprio');
INSERT INTO `submarcav` VALUES (101, 22, 'D-22');
INSERT INTO `submarcav` VALUES (102, 22, 'Estaquitas');
INSERT INTO `submarcav` VALUES (103, 22, 'Frontier');
INSERT INTO `submarcav` VALUES (104, 22, 'Kicks');
INSERT INTO `submarcav` VALUES (105, 22, 'March');
INSERT INTO `submarcav` VALUES (106, 22, 'NP-300');
INSERT INTO `submarcav` VALUES (107, 22, 'NP-300 Frontier');
INSERT INTO `submarcav` VALUES (108, 22, 'NV350 Urban');
INSERT INTO `submarcav` VALUES (109, 22, 'Pathfinder');
INSERT INTO `submarcav` VALUES (110, 22, 'Pick Up');
INSERT INTO `submarcav` VALUES (111, 22, 'Platina');
INSERT INTO `submarcav` VALUES (112, 22, 'Sentra');
INSERT INTO `submarcav` VALUES (113, 22, 'Tida');
INSERT INTO `submarcav` VALUES (114, 22, 'Tsuru');
INSERT INTO `submarcav` VALUES (115, 22, 'Versa');
INSERT INTO `submarcav` VALUES (116, 22, 'X-Trail');
INSERT INTO `submarcav` VALUES (117, 23, '207');
INSERT INTO `submarcav` VALUES (118, 23, 'Partner');
INSERT INTO `submarcav` VALUES (119, 24, 'Kwid');
INSERT INTO `submarcav` VALUES (120, 25, 'Exeo');
INSERT INTO `submarcav` VALUES (121, 25, 'Ibiza');
INSERT INTO `submarcav` VALUES (122, 25, 'Leon');
INSERT INTO `submarcav` VALUES (123, 25, 'Toledo');
INSERT INTO `submarcav` VALUES (124, 26, 'WRX');
INSERT INTO `submarcav` VALUES (125, 27, 'Ciaz');
INSERT INTO `submarcav` VALUES (126, 27, 'Grand Vitara');
INSERT INTO `submarcav` VALUES (127, 27, 'Swift');
INSERT INTO `submarcav` VALUES (128, 27, 'Vitara');
INSERT INTO `submarcav` VALUES (129, 28, 'Avanza');
INSERT INTO `submarcav` VALUES (130, 28, 'Camry');
INSERT INTO `submarcav` VALUES (131, 28, 'Corolla');
INSERT INTO `submarcav` VALUES (132, 28, 'Highlander');
INSERT INTO `submarcav` VALUES (133, 28, 'Hilux');
INSERT INTO `submarcav` VALUES (134, 28, 'Matrix');
INSERT INTO `submarcav` VALUES (135, 28, 'RAV4');
INSERT INTO `submarcav` VALUES (136, 28, 'Sienna');
INSERT INTO `submarcav` VALUES (137, 28, 'Tundra');
INSERT INTO `submarcav` VALUES (138, 28, 'Yaris');
INSERT INTO `submarcav` VALUES (139, 29, 'Beetle');
INSERT INTO `submarcav` VALUES (140, 29, 'Bora');
INSERT INTO `submarcav` VALUES (141, 29, 'Derby');
INSERT INTO `submarcav` VALUES (142, 29, 'Gol');
INSERT INTO `submarcav` VALUES (143, 29, 'Golf');
INSERT INTO `submarcav` VALUES (144, 29, 'Jetta Clasico');
INSERT INTO `submarcav` VALUES (145, 29, 'Polo');
INSERT INTO `submarcav` VALUES (146, 29, 'Saveiro');
INSERT INTO `submarcav` VALUES (147, 29, 'Tiguan');
INSERT INTO `submarcav` VALUES (148, 29, 'Touareg');
INSERT INTO `submarcav` VALUES (149, 29, 'Vento');
INSERT INTO `submarcav` VALUES (150, 9, 'F250');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pswd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 'Horacio', '0192023a7bbd73250516f069df18b500', 'admin');
INSERT INTO `usuarios` VALUES (2, 'Ramon', '1a145a23d6e47aadfe2063f1f951e691', 'admin');
INSERT INTO `usuarios` VALUES (3, 'Raul', NULL, NULL);

-- ----------------------------
-- Table structure for vehiculo
-- ----------------------------
DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE `vehiculo`  (
  `id_aux` bigint(11) NOT NULL AUTO_INCREMENT,
  `id` bigint(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_asesor` int(3) NOT NULL,
  `estatus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fecha_llegada` date NULL DEFAULT NULL,
  `veinte_dias` int(255) NULL DEFAULT NULL,
  `hoy` date NULL DEFAULT NULL,
  `diferencia_veinte_dias` int(255) NULL DEFAULT NULL,
  `fecha_llegada_taller` date NULL DEFAULT NULL,
  `fecha_promesa` date NULL DEFAULT NULL,
  `fecha_salida_taller` date NULL DEFAULT NULL,
  `marca` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `linea` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `modelo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `placas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cliente` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_siniestro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `comentarios` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fecha_valuacion` date NULL DEFAULT NULL,
  `tres_dias` int(3) NULL DEFAULT NULL,
  `diferencia_tres_dias` int(3) NULL DEFAULT NULL,
  `cantidad_inicial` int(6) NULL DEFAULT NULL,
  `piezas_cambiadas_inicial` int(3) NULL DEFAULT NULL,
  `piezas_reparacion_inicial` int(3) NULL DEFAULT NULL,
  `fecha_autorizacion` date NULL DEFAULT NULL,
  `piezas_cambiadas_final` int(3) NULL DEFAULT NULL,
  `piezas_reparacion_final` int(3) NULL DEFAULT NULL,
  `cantidad_final` int(6) NULL DEFAULT NULL,
  `piezas_vendidas` int(3) NULL DEFAULT NULL,
  `importe_piezas_vendidas` int(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id_aux`) USING BTREE,
  INDEX `id`(`id`) USING BTREE,
  INDEX `id_asesores`(`id_asesor`) USING BTREE,
  INDEX `id_clientes`(`id_cliente`) USING BTREE,
  CONSTRAINT `id_asesores` FOREIGN KEY (`id_asesor`) REFERENCES `asesores` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `id_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of vehiculo
-- ----------------------------
INSERT INTO `vehiculo` VALUES (1, 102112020, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (2, 2114102020, 8, 1, NULL, '2020-10-14', NULL, NULL, NULL, NULL, NULL, NULL, 'Jeep', 'Commpass', 'Azul', '2006', '1q1q', 'HDI', '1q2w3e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (3, 2216102020, 25, 1, NULL, '2020-10-16', NULL, NULL, NULL, NULL, NULL, NULL, 'Chevrolet', 'Chevy', 'Azul Mamalon', '2006', 'nose', 'QUALITAS', 'nosex2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (4, 2316102020, 27, 1, NULL, '2020-10-16', NULL, NULL, NULL, NULL, NULL, NULL, 'Volkswagen', 'Vento', 'Cafe Mamalon', '2018', '1q2w', 'GNP', '1q2w3e|', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (5, 2416102020, 28, 2, NULL, '2020-10-16', NULL, NULL, NULL, NULL, NULL, NULL, 'Mazda', '6', 'verde', '2006', 'sapeee', 'Particular', 'sapeee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (6, 2516102020, 28, 2, NULL, '2020-10-16', NULL, NULL, NULL, NULL, NULL, NULL, 'Mercedes-Benz', 'CLA 200', 'qwe', '20014', 'qwe', 'HDI', 'qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (7, 2616102020, 30, 1, NULL, '2020-10-16', NULL, NULL, NULL, NULL, NULL, NULL, 'Seat', 'Ibiza', 'qewqwe', '7894', 'qweqweqe', 'HDI', 'qewqweqwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (8, 2719102020, 31, 1, NULL, '2020-10-19', NULL, NULL, NULL, NULL, NULL, NULL, 'Nissan', 'Tida', 'Cafe', '2005', 'C123', 'QUALITAS', '132456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (9, 2819102020, 32, 1, NULL, '2020-10-19', NULL, NULL, NULL, NULL, NULL, NULL, 'Fiat', 'Uno', 'qwe', '2020', 'qwe', 'HDI', 'qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (10, 2919102020, 33, 1, NULL, '2020-10-19', NULL, NULL, NULL, NULL, NULL, NULL, 'Mazda', '6', 'qew', '2003', 'qwe', 'GNP', 'qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (11, 3019102020, 34, 2, NULL, '2020-10-19', NULL, NULL, NULL, NULL, NULL, NULL, 'Dodge', 'Journey', 'qwer', '2016', 'qwer', 'Particular', 'qweqwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (12, 3119102020, 35, 1, NULL, '2020-10-19', NULL, NULL, NULL, NULL, NULL, NULL, 'Hyundai', 'Grand i10', 'qewqwe', '1234', 'qwe', 'Particular', 'qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (13, 3219102020, 36, 1, NULL, '2020-10-19', NULL, NULL, NULL, NULL, NULL, NULL, 'Buick', 'Enclave', 'Verde', '2001', '123qwe', 'QUALITAS', '132456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (14, 3319102020, 37, 2, NULL, '2020-10-19', NULL, NULL, NULL, NULL, NULL, NULL, 'Ford', 'Fiesta', 'Gris', '2006', '123qwe', 'Particular', '123ewq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (15, 3419102020, 38, 1, NULL, '2020-10-19', NULL, NULL, NULL, NULL, NULL, NULL, 'Chevrolet', 'Aveo', 'Rojo', '2020', '12qqwe', 'QUALITAS', '123qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (16, 3520102020, 39, 2, NULL, '2020-10-20', NULL, NULL, NULL, NULL, NULL, NULL, 'Jaguar', 'F-Pace', 'qwe', '2006', 'qwe', 'GNP', 'qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (18, 3620102020, 40, 1, NULL, '2020-10-20', NULL, NULL, NULL, NULL, NULL, NULL, 'Volkswagen', 'Vento', 'Cafe', '2018', 'sape', 'QUALITAS', 'sape', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (19, 3720102020, 41, 2, NULL, '2020-10-20', NULL, NULL, NULL, NULL, NULL, NULL, 'Mitsubishi', 'L-200', 'Rojelia', '2020', 'sapee', 'Particular', 'sapeee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (20, 3820102020, 42, 1, NULL, '2020-10-20', NULL, NULL, NULL, NULL, NULL, NULL, 'Volkswagen', 'Jetta Clasico', 'Rojelio', '2020', 'qwe', 'QUALITAS', 'qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (21, 3920102020, 43, 2, NULL, '2020-10-20', NULL, NULL, NULL, NULL, NULL, NULL, 'Lincoln', 'Mark LT', 'qwe', '2003', 'qwe', 'GNP', 'qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (22, 4020102020, 44, 2, NULL, '2020-10-20', NULL, NULL, NULL, NULL, NULL, NULL, 'Cadillac', 'CTS', 'qwe', '1234', 'qwe', 'Particular', 'qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (23, 4120102020, 44, 2, NULL, '2020-10-20', NULL, NULL, NULL, NULL, NULL, NULL, 'Volkswagen', 'Jetta Clasico', 'Verde Moco', '2001', '123qwe', 'HDI', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (24, 4220102020, 46, 1, NULL, '2020-10-20', NULL, NULL, NULL, NULL, NULL, NULL, 'Mercedes-Benz', 'GLK-6', 'qwe', 'qew', 'qwe', 'GNP', 'qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (25, 4320102020, 47, 1, 'Cerrado', '2020-10-20', NULL, NULL, NULL, NULL, NULL, NULL, 'Ford', 'Mustang', 'Mamalon', '2020', 'Mamalonas', 'QUALITAS', 'sapeeee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (26, 4420102020, 47, 1, 'Entregado', '2020-10-20', NULL, NULL, NULL, NULL, NULL, NULL, 'Toyota', 'Tundra', 'Negro Azulado', '2005', '123qwe', 'Particular', '123qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (27, 4521102020, 49, 2, 'Taller', '2020-10-21', NULL, NULL, NULL, NULL, NULL, NULL, 'KIA', 'Rio', 'verde', '2006', '123qwe', 'GNP', '123qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (28, 4621102020, 50, 2, 'Baja', '2020-10-21', NULL, NULL, NULL, NULL, NULL, NULL, 'Lincoln', 'MKZ', 'naranjoide', '2016', '123q2we', 'Particular', '123qew', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (29, 4723102020, 51, 1, 'Transito', '2020-10-23', NULL, NULL, NULL, NULL, NULL, NULL, 'Suzuki', 'Vitara', 'qafe', '7536', '123qwe', 'Particular', '123qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (30, 4805112020, 52, 1, 'Transito', '2020-11-05', NULL, NULL, NULL, NULL, NULL, NULL, 'Mercedes-Benz', 'SLK', 'cafe', '2006', '132123qwe', 'QUALITAS', '123qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (31, 4907112020, 53, 1, 'Cerrado', '2020-11-07', NULL, NULL, NULL, NULL, NULL, NULL, 'Mazda', 'CX-9', 'qwer', '2006', 'qwe', 'HDI', '123qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (32, 5007112020, 54, 1, 'Entregado', '2020-11-07', NULL, NULL, NULL, NULL, NULL, NULL, 'Mazda', 'CX-3', 'verde', '2006', '123qwe', 'HDI', '23qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (33, 5107112020, 55, 2, 'Entregado', '2020-11-07', NULL, NULL, NULL, NULL, NULL, NULL, 'Mercedes-Benz', 'GLK-6', 'cafe', '2006', '123qwe', 'HDI', '123qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (34, 5207112020, 56, 2, 'Entregado', '2020-11-07', NULL, NULL, NULL, NULL, NULL, NULL, 'Mazda', 'CX-3', '123', '123', '123', 'Particular', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (35, 5313112020, 57, 2, 'Transito', '2020-11-13', NULL, NULL, NULL, NULL, NULL, NULL, 'Mazda', 'CX-3', '123', '123', '123', 'Particular', '3123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (36, 5413112020, 58, 1, 'Transito', '2020-11-13', NULL, NULL, NULL, NULL, NULL, NULL, 'Mercury', 'Milan', 'qwe', '1234', 'qwe', 'HDI', 'qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (37, 5514112020, 59, 1, 'Transito', '2020-11-14', NULL, NULL, NULL, NULL, NULL, NULL, 'Mercedes-Benz', 'SLK', 'Azul', '2020', '123we', 'QUALITAS', 'qwe123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `vehiculo` VALUES (38, 5614112020, 60, 1, 'Transito', '2020-11-14', NULL, NULL, NULL, NULL, NULL, NULL, 'Mazda', 'CX-3', 'cafe', '7896', '123qwe', 'QUALITAS', '123qwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
