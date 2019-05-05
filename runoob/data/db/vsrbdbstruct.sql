/*
 Navicat Premium Data Transfer

 Source Server         : root 1234
 Source Server Type    : MySQL
 Source Server Version : 50722
 Source Host           : localhost:3306
 Source Schema         : runoob

 Target Server Type    : MySQL
 Target Server Version : 50722
 File Encoding         : 65001

 Date: 05/05/2019 12:42:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for book 1-7table
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book`  (
  `idbk` int(11) NOT NULL AUTO_INCREMENT,
  `bkname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idsf` int(11) NOT NULL,
  `bksnum` int(11) NOT NULL,
  `bkintro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bkicon` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '链接的网址',
  PRIMARY KEY (`idbk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '用来存储第二个层级' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for chapter 2-7table
-- ----------------------------
DROP TABLE IF EXISTS `chapter`;
CREATE TABLE `chapter`  (
  `idcp` int(11) NOT NULL AUTO_INCREMENT,
  `cpname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idbk` int(11) NOT NULL,
  `cpsnum` int(11) NOT NULL,
  PRIMARY KEY (`idcp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '指向与序列号之间的关系' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for htmlpage 3-7table
-- ----------------------------
DROP TABLE IF EXISTS `htmlpage`;
CREATE TABLE `htmlpage`  (
  `link` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '正文的指向',
  `htmlpage` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`link`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '存储正文的链接和内容' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for section 4-7table
-- ----------------------------
DROP TABLE IF EXISTS `section`;
CREATE TABLE `section`  (
  `idsc` int(11) NOT NULL AUTO_INCREMENT,
  `scname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idcp` int(11) NOT NULL,
  `link` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `scnum` int(11) NOT NULL,
  PRIMARY KEY (`idsc`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '表示节' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for shelf 5-7table
-- ----------------------------
DROP TABLE IF EXISTS `shelf`;
CREATE TABLE `shelf`  (
  `idsf` int(11) NOT NULL AUTO_INCREMENT,
  `sfname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '名称',
  `idfr` int(11) NOT NULL COMMENT 'floor 的id',
  `sfsnum` int(11) NOT NULL COMMENT '排序序号',
  PRIMARY KEY (`idsf`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '把数据库当成图书馆，这个代表楼层，每一floor层楼放不同类型的知识，每一层有若干的shelf' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for syslog 6-7table
-- ----------------------------
DROP TABLE IF EXISTS `syslog`;
CREATE TABLE `syslog`  (
  `idlog` int(11) NOT NULL AUTO_INCREMENT,
  `mtime` datetime(0) NOT NULL,
  `sql` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idlog`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '系统日志' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for try 7-7table
-- ----------------------------
DROP TABLE IF EXISTS `try`;
CREATE TABLE `try`  (
  `codename` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `code` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`codename`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '测试代码' ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;