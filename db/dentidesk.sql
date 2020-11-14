/*
 Navicat Premium Data Transfer

 Source Server         : local_mysql_5.6
 Source Server Type    : MySQL
 Source Server Version : 50731
 Source Host           : localhost:3306
 Source Schema         : dentidesk

 Target Server Type    : MySQL
 Target Server Version : 50731
 File Encoding         : 65001

 Date: 14/11/2020 04:05:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for profiles
-- ----------------------------
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles`  (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `profile` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`profile_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profiles
-- ----------------------------
INSERT INTO `profiles` VALUES (1, 'Administrador', '2020-11-13');
INSERT INTO `profiles` VALUES (2, 'Gestor', '2020-11-13');
INSERT INTO `profiles` VALUES (3, 'Observador', '2020-11-13');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `profile_id` int(11) NOT NULL DEFAULT 2,
  `creator` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` date NULL DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Administrador', 'admin@dentidesk.com', '+56965529251', 'dentidesk', 1, 'Administrador', '2020-11-13', 1);
INSERT INTO `users` VALUES (2, 'Martin Gonzalez', 'mgonzalez@dentidesk.com', '+56978457859', 'dentidesk', 2, 'Administrador', '2020-11-14', 1);
INSERT INTO `users` VALUES (3, 'Maria Donoso', 'mdonoso@dentidesk.com', '+56978458965', 'dentidesk', 3, 'Administrador', '2020-11-14', 1);
INSERT INTO `users` VALUES (4, 'Pablo Sanchez', 'psan@dentidesk.com', '+56965845785', 'dentidesk', 3, 'Martin Gonzalez', '2020-11-14', 1);
INSERT INTO `users` VALUES (5, 'alejandro perez', 'aperez@dentidesk.com', '+56965845785', 'dentidesk', 3, 'Martin Gonzalez', '2020-11-14', 1);

SET FOREIGN_KEY_CHECKS = 1;
