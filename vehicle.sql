/*
Navicat MySQL Data Transfer

Source Server         : Micho
Source Server Version : 50520
Source Host           : 127.0.0.1:3306
Source Database       : vehicle

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2015-11-24 06:42:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `name` varchar(27) CHARACTER SET utf8 NOT NULL COMMENT '管理员名字',
  `pass` varchar(32) CHARACTER SET utf8 NOT NULL COMMENT '登陆密码',
  `level` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '1' COMMENT '管理员级别 0为超级管理员 1为普通管理员',
  `status` enum('1','0') CHARACTER SET utf8 NOT NULL DEFAULT '1' COMMENT '管理员状态 1为可用 0为废弃',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for area_code
-- ----------------------------
DROP TABLE IF EXISTS `area_code`;
CREATE TABLE `area_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '地区id',
  `code` char(2) DEFAULT NULL COMMENT '地区编号',
  `parent_code` varchar(10) DEFAULT NULL COMMENT '父类代码',
  `status` enum('1','0') DEFAULT '1' COMMENT '状态是否可用 1为可用 0为不可用',
  `sort` int(10) unsigned DEFAULT '1' COMMENT '排序规则',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of area_code
-- ----------------------------
INSERT INTO `area_code` VALUES ('1', 'K', 'jin', '1', '0');
INSERT INTO `area_code` VALUES ('2', 'A', 'jin', '1', '1');
INSERT INTO `area_code` VALUES ('3', 'B', 'jin', '1', '2');
INSERT INTO `area_code` VALUES ('4', 'A', 'jing', '1', '1');
INSERT INTO `area_code` VALUES ('5', 'B', 'jing', '1', '2');
INSERT INTO `area_code` VALUES ('6', 'C', 'jing', '1', '3');
INSERT INTO `area_code` VALUES ('7', 'A', 'shan', '1', '1');
INSERT INTO `area_code` VALUES ('8', 'B', 'shan', '1', '2');
INSERT INTO `area_code` VALUES ('9', null, null, '1', '1');

-- ----------------------------
-- Table structure for dictionary
-- ----------------------------
DROP TABLE IF EXISTS `dictionary`;
CREATE TABLE `dictionary` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '字典项目id',
  `type` varchar(24) CHARACTER SET utf8 DEFAULT NULL COMMENT '项目类型',
  `code` varchar(21) CHARACTER SET utf8 DEFAULT NULL COMMENT '项目代码',
  `name` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '项目名称',
  `status` enum('1','0') CHARACTER SET utf8 DEFAULT '1' COMMENT '项目状态 1为正常 0为废弃',
  `sort` tinyint(4) DEFAULT NULL COMMENT '排序规则',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dictionary
-- ----------------------------
INSERT INTO `dictionary` VALUES ('1', 'PROVINCE_CARID', 'jin', '晋', '1', '1');
INSERT INTO `dictionary` VALUES ('2', 'PROVINCE_CARID', 'jing', '京', '1', '2');
INSERT INTO `dictionary` VALUES ('3', 'PROVINCE_CARID', 'shan', '陕', '1', '3');
INSERT INTO `dictionary` VALUES ('4', 'AREA_CARID', 'K', 'K', '1', '1');
INSERT INTO `dictionary` VALUES ('5', 'AREA_CARID', 'A', 'A', '1', '2');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `time` datetime DEFAULT NULL,
  `vehicle` int(11) DEFAULT NULL,
  `person` varchar(45) DEFAULT NULL,
  `telephone` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for order_item
-- ----------------------------
DROP TABLE IF EXISTS `order_item`;
CREATE TABLE `order_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '服务项id',
  `name` varchar(90) DEFAULT NULL COMMENT '服务内容',
  `unit` varchar(30) DEFAULT NULL COMMENT '单位（桶、个等）',
  `quantity` int(11) DEFAULT NULL COMMENT '数量',
  `type` varchar(20) DEFAULT NULL COMMENT '服务类型',
  `price` decimal(10,0) DEFAULT NULL COMMENT '单价',
  `content` text COMMENT '服务说明',
  `order_id` int(11) DEFAULT NULL COMMENT '对应订单id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_item
-- ----------------------------

-- ----------------------------
-- Table structure for telephone
-- ----------------------------
DROP TABLE IF EXISTS `telephone`;
CREATE TABLE `telephone` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '电话号码id',
  `phone` varchar(11) CHARACTER SET utf8 NOT NULL COMMENT '电话号码',
  `userId` int(10) unsigned NOT NULL COMMENT '对应用户id',
  `status` tinyint(4) DEFAULT '1' COMMENT '状态 1为在用，0为删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of telephone
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `name` varchar(27) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户称呼',
  `content` text CHARACTER SET utf8 COMMENT '注释',
  `sex` enum('2','0','1') CHARACTER SET utf8 DEFAULT '2' COMMENT '用户性别 0，女士1，男士 2， 保密',
  `company` varchar(90) CHARACTER SET utf8 DEFAULT NULL COMMENT '所属单位',
  `pinyin` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户拼音',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '佘佩刚', '', '1', '', 'peigang');

-- ----------------------------
-- Table structure for vehicle
-- ----------------------------
DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE `vehicle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '车辆id',
  `vin` varchar(17) CHARACTER SET utf8 DEFAULT NULL COMMENT '车辆识别码',
  `licence_province` char(3) CHARACTER SET utf8 NOT NULL COMMENT '车牌照-省份信息',
  `licence_area` char(2) CHARACTER SET utf8 NOT NULL COMMENT '车牌号码地区码',
  `licence_number` char(5) CHARACTER SET utf8 NOT NULL COMMENT '车牌号-号码部分',
  `brand` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '车辆品牌',
  `series` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '车型',
  `userId` int(10) unsigned DEFAULT NULL COMMENT '车主id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vehicle
-- ----------------------------
INSERT INTO `vehicle` VALUES ('3', null, 'jin', 'K', '00521', null, null, '1');

-- ----------------------------
-- Table structure for vehicle_info
-- ----------------------------
DROP TABLE IF EXISTS `vehicle_info`;
CREATE TABLE `vehicle_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '详情id',
  `car_id` int(11) unsigned NOT NULL COMMENT '对应车辆id',
  `machine_oil` date DEFAULT NULL COMMENT '上次更换机油时间',
  `air_filter` date DEFAULT NULL COMMENT '上次更换空滤时间',
  `oil_filter` date DEFAULT NULL COMMENT '上次汽油滤清器更换时间',
  `mailage` float unsigned DEFAULT NULL,
  `last_fix` date DEFAULT NULL COMMENT '上次维修时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vehicle_info
-- ----------------------------
