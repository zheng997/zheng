/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-03-30 21:53:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('30', 'admin', 'admin', '   111111');
INSERT INTO `admin` VALUES ('33', ' 11', ' 111', ' 11');
INSERT INTO `admin` VALUES ('34', '2', '2', '2');

-- ----------------------------
-- Table structure for `album`
-- ----------------------------
DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `albumPath` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of album
-- ----------------------------
INSERT INTO `album` VALUES ('7', '4', '9503048686ff1b5b9f90ca3cde1e6eae.jpg');
INSERT INTO `album` VALUES ('8', '5', '81985d7b724ebe3727d2532640318371.jpg');
INSERT INTO `album` VALUES ('9', '6', '658bea2e67ed63e6bb04d291d57533bc.jpg');
INSERT INTO `album` VALUES ('12', '9', 'd326218e4282a9f065db6527693ada4a.png');
INSERT INTO `album` VALUES ('22', '13', 'cdabe9b4b0db0526923aea834a78eb0c.jpg');
INSERT INTO `album` VALUES ('41', '32', '4a0a77ead4e4c31856af26c922403884.jpg');
INSERT INTO `album` VALUES ('42', '33', '9233cbdf394db1bf21b93f870edf3979.jpg');
INSERT INTO `album` VALUES ('43', '34', '80f34da1531a4708dd35bbd6752e881b.jpg');
INSERT INTO `album` VALUES ('44', '34', '454a090d02b0e4624ac641eca457db52.jpg');
INSERT INTO `album` VALUES ('45', '35', '0f76b708a91dda68a2639bc559decb5c.jpg');
INSERT INTO `album` VALUES ('46', '36', 'c48b3370f4b9814f73d7de6c4566aa07.jpg');
INSERT INTO `album` VALUES ('47', '37', '2a66e7a72dcdcb69117abab230766c81.jpg');
INSERT INTO `album` VALUES ('49', '39', '70247b856d2065aac9174eb13f6da745.jpg');
INSERT INTO `album` VALUES ('50', '40', 'b61e8135e79a63e7208a27e65ea00fdc.jpg');
INSERT INTO `album` VALUES ('51', '41', '1b7dd6de55f1f02cdfa87ce9dda6f566.jpg');
INSERT INTO `album` VALUES ('52', '41', '45c7571472c1d82b92c9d1a0f0b817a7.jpg');
INSERT INTO `album` VALUES ('53', '42', 'fd813cf604c11fb2e23623aaa01de801.jpg');
INSERT INTO `album` VALUES ('54', '43', '3016987f3d256df4f9add2bc6867e265.jpg');
INSERT INTO `album` VALUES ('55', '44', '35ba250ce92dcc46356a146236cd60e2.jpg');
INSERT INTO `album` VALUES ('56', '45', '32e6baafaee413b3ee6ef90e5a5e1c51.jpg');
INSERT INTO `album` VALUES ('57', '46', '54fdc2ea161526f16715c21114a99fec.jpg');
INSERT INTO `album` VALUES ('58', '47', 'b1872c76f7a2c4faae7740de3f7e277e.jpg');
INSERT INTO `album` VALUES ('59', '48', '5aaa1a7961a1d8b6af6df9fd4f1d0842.jpg');
INSERT INTO `album` VALUES ('60', '49', '01c055c75f424d767dedf305243f55e0.jpg');
INSERT INTO `album` VALUES ('61', '50', 'f65a787d5bbb1b17c6a505c6cad3974d.jpg');
INSERT INTO `album` VALUES ('62', '51', 'b05d755894429e3d10d9d11d2d32a1bd.jpg');
INSERT INTO `album` VALUES ('63', '52', 'c5186d2ae150ba94ae3fbd6a3967a546.jpg');
INSERT INTO `album` VALUES ('64', '53', 'c7e4eef32bf72802ea140438e0e6c8cd.jpg');
INSERT INTO `album` VALUES ('65', '54', 'b3554f86af92d57cccd567303613697f.jpg');
INSERT INTO `album` VALUES ('66', '55', '4513cdc11e113dd43366b82b72b73b4a.jpg');
INSERT INTO `album` VALUES ('67', '56', '1787cfd0aed3d6326d5870ad7df4c527.jpg');
INSERT INTO `album` VALUES ('68', '57', '83508a5b33ed45ffab215abe418af164.jpg');
INSERT INTO `album` VALUES ('69', '58', 'e7a8c2bdc6466a8eb3985f450602834a.jpg');
INSERT INTO `album` VALUES ('70', '59', 'a88d5b861f69273ef0cfc00b53586298.jpg');
INSERT INTO `album` VALUES ('71', '60', '95ad7d72d1bc692f342d40fcdcf6fffc.jpg');
INSERT INTO `album` VALUES ('72', '61', 'c88d610574b94c4648c0521d13682b69.jpg');
INSERT INTO `album` VALUES ('73', '62', 'a696e0a666c54d2768492d2d45b4be82.jpg');
INSERT INTO `album` VALUES ('74', '63', '6cfaf4f1e3da782d5fe70f3f0adb2001.jpg');
INSERT INTO `album` VALUES ('75', '64', '0c6632e346d81d24f3dcb2bcf7c46bfc.jpg');
INSERT INTO `album` VALUES ('76', '65', 'c47a559901873e8dc93dfcbac4504f74.jpg');
INSERT INTO `album` VALUES ('77', '65', '52b7d0bd073c3f8059c88f65e5d78f43.jpg');
INSERT INTO `album` VALUES ('78', '66', '7885eefa1c8d2560ca5248704c6f603b.jpg');
INSERT INTO `album` VALUES ('79', '66', 'aee324a41683f4fbeb311b9e153917d2.jpg');
INSERT INTO `album` VALUES ('80', '67', '7e70a8f4773c71f52b4b7bfbb02c2fb3.jpg');
INSERT INTO `album` VALUES ('81', '68', '6a1619b61c2ac1796a1e9de96d8b71cf.jpg');
INSERT INTO `album` VALUES ('82', '70', '4c7030e382929698dbd7653fe759ee39.jpg');
INSERT INTO `album` VALUES ('83', '71', 'a0243460ab722c0912691d233cb18ab0.jpg');
INSERT INTO `album` VALUES ('84', '72', '8896a26eec268af3dcaad65ff3df153f.jpg');
INSERT INTO `album` VALUES ('85', '73', '3d14827fd5d0260163ff83258b596231.jpg');
INSERT INTO `album` VALUES ('86', '74', '41a7ea64d206e9c6d3ed586a49dc4325.jpg');
INSERT INTO `album` VALUES ('87', '75', '74210cd3b5a052e376c967d1e7f6eac4.jpg');
INSERT INTO `album` VALUES ('88', '76', 'dbaf0b311a3c14e3c8d8f5405b375073.jpg');
INSERT INTO `album` VALUES ('89', '77', '80c31765b247582a45a6a75e44a7e252.jpg');
INSERT INTO `album` VALUES ('90', '78', '04698a5a69ed169b07843758112c533d.jpg');
INSERT INTO `album` VALUES ('91', '79', '66f8ac8a61a0231cf4b61c147b9cf71e.jpg');
INSERT INTO `album` VALUES ('92', '80', 'd8717b4862611267aab315b91607d3b8.jpg');
INSERT INTO `album` VALUES ('93', '81', '59e5372942749049d163481f69c30037.jpg');
INSERT INTO `album` VALUES ('94', '82', '301b42bb87b09954d98a92a6aa167b77.jpg');
INSERT INTO `album` VALUES ('95', '83', '67d5976b7f3cf02197ca3d209fe3d6b9.jpg');
INSERT INTO `album` VALUES ('96', '84', 'ffc3f3a66f4b1cb545b8a0d17aa43f2b.jpg');
INSERT INTO `album` VALUES ('97', '85', 'e4665f0dfa773065b24955e58a94059d.jpg');
INSERT INTO `album` VALUES ('98', '86', '8f3937d9b67c837700040eaca8a7df6e.png');
INSERT INTO `album` VALUES ('99', '87', 'b4763a9583a40fcfe265818d22fbca4a.jpg');
INSERT INTO `album` VALUES ('100', '88', 'bf97d141f7b10e02a9174b4dce38af66.jpg');

-- ----------------------------
-- Table structure for `cate`
-- ----------------------------
DROP TABLE IF EXISTS `cate`;
CREATE TABLE `cate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cName` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cate
-- ----------------------------
INSERT INTO `cate` VALUES ('1', '补水');
INSERT INTO `cate` VALUES ('2', '美白');
INSERT INTO `cate` VALUES ('3', '保湿');
INSERT INTO `cate` VALUES ('4', '深度清洁');

-- ----------------------------
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `oid` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `linkMan` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `totalPrice` int(20) NOT NULL,
  `date` int(20) NOT NULL,
  `orderState` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('19', '1677', '11', '1', '1', '1', '0', '1502554896', '0');
INSERT INTO `order` VALUES ('20', '3685', '11', '1', '1', '1', '0', '1502554932', '0');
INSERT INTO `order` VALUES ('21', '9854', '11', '1', '1', '1', '0', '1502554955', '0');
INSERT INTO `order` VALUES ('22', '8833', '11', '1', '1', '1', '0', '1502555161', '0');
INSERT INTO `order` VALUES ('23', '3104', '11', '1', '1', '1', '0', '1502555171', '0');
INSERT INTO `order` VALUES ('24', '9054', '11', '1', '1', '1', '0', '1502555180', '0');
INSERT INTO `order` VALUES ('25', '6549', '11', '1', '1', '1', '0', '1503640901', '0');
INSERT INTO `order` VALUES ('26', '1966', '11', '1', '1', '1', '0', '1511624041', '0');
INSERT INTO `order` VALUES ('27', '9698', '123', '123', '123', '123', '0', '1511699005', '0');
INSERT INTO `order` VALUES ('28', '4148', '11', '1', '1', '1', '4300', '1512233457', '0');

-- ----------------------------
-- Table structure for `order_details`
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `oid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `pName` varchar(50) NOT NULL,
  `iPrice` varchar(50) NOT NULL,
  `num` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES ('1', '1', '1', '1', '1', '1');
INSERT INTO `order_details` VALUES ('2', '3685', '7', '11111', '0', '1');
INSERT INTO `order_details` VALUES ('3', '9854', '7', '11111', '0', '1');
INSERT INTO `order_details` VALUES ('4', '8833', '7', '11111', '0', '1');
INSERT INTO `order_details` VALUES ('5', '3104', '7', '11111', '0', '1');
INSERT INTO `order_details` VALUES ('6', '9054', '7', '11111', '0', '1');
INSERT INTO `order_details` VALUES ('7', '6549', '7', '11111', '0', '1');
INSERT INTO `order_details` VALUES ('8', '1966', '8', '444', '0', '1');
INSERT INTO `order_details` VALUES ('9', '1966', '7', '11111', '0', '1');
INSERT INTO `order_details` VALUES ('10', '9698', '7', '11111', '0', '1');

-- ----------------------------
-- Table structure for `pro`
-- ----------------------------
DROP TABLE IF EXISTS `pro`;
CREATE TABLE `pro` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `pName` varchar(255) NOT NULL,
  `cId` int(10) unsigned NOT NULL,
  `pSn` varchar(50) NOT NULL,
  `pNum` int(10) unsigned NOT NULL DEFAULT '0',
  `mPrice` decimal(10,0) NOT NULL,
  `iPrice` decimal(10,0) NOT NULL,
  `pDesc` mediumtext,
  `pubTime` int(10) unsigned NOT NULL,
  `isShow` tinyint(1) NOT NULL,
  `isHot` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pro
-- ----------------------------
INSERT INTO `pro` VALUES ('65', '补水一号', '4', '001', '10', '1000', '800', '', '1522415971', '0', '0');
INSERT INTO `pro` VALUES ('66', '美白一号', '2', '100', '100', '10000', '8000', '', '1522416004', '0', '0');
INSERT INTO `pro` VALUES ('67', '保湿一号', '3', '001', '100', '100', '80', '&nbsp;&nbsp;&nbsp;&nbsp;', '1522416030', '0', '0');
INSERT INTO `pro` VALUES ('68', '清洁', '4', '005', '100', '800', '700', '', '1522416049', '0', '0');
INSERT INTO `pro` VALUES ('69', '', '0', '', '0', '0', '0', null, '0', '0', '0');
INSERT INTO `pro` VALUES ('70', 'test', '1', '100', '0', '100', '100', '', '1522416151', '0', '0');
INSERT INTO `pro` VALUES ('71', '111', '1', '11', '11', '11', '11', '', '1522416171', '0', '0');
INSERT INTO `pro` VALUES ('72', '11', '1', '11', '11', '11', '11', '', '1522416184', '0', '0');
INSERT INTO `pro` VALUES ('73', '11', '1', '11', '11', '11', '11', '1', '1522416201', '0', '0');
INSERT INTO `pro` VALUES ('74', '1', '2', '1', '1', '1', '1', '1', '1522416377', '0', '0');
INSERT INTO `pro` VALUES ('75', '11', '2', '11', '11', '11', '111', '', '1522416391', '0', '0');
INSERT INTO `pro` VALUES ('76', '11', '2', '11', '11', '11', '111', '', '1522416405', '0', '0');
INSERT INTO `pro` VALUES ('77', '11', '1', '11', '11', '11', '11', '', '1522416416', '0', '0');
INSERT INTO `pro` VALUES ('78', '11', '1', '11', '11', '11', '11', '', '1522416417', '0', '0');
INSERT INTO `pro` VALUES ('79', '11', '2', '11', '11', '11', '11', '', '1522416438', '0', '0');
INSERT INTO `pro` VALUES ('80', '11', '2', '11', '11', '11', '11', '', '1522416450', '0', '0');
INSERT INTO `pro` VALUES ('81', '11', '3', '11', '11', '11', '11', '', '1522416474', '0', '0');
INSERT INTO `pro` VALUES ('82', '11', '3', '11', '11', '11', '11', '', '1522416486', '0', '0');
INSERT INTO `pro` VALUES ('83', '111', '3', '11', '11', '11', '11', '', '1522416497', '0', '0');
INSERT INTO `pro` VALUES ('84', '11', '3', '11', '11', '11', '11', '', '1522416511', '0', '0');
INSERT INTO `pro` VALUES ('85', '111', '3', '11', '11', '11', '11', '', '1522416525', '0', '0');
INSERT INTO `pro` VALUES ('86', '11', '4', '11', '11', '11', '11', '', '1522416550', '0', '0');
INSERT INTO `pro` VALUES ('87', '11', '4', '11', '11', '11', '11', '', '1522416564', '0', '0');
INSERT INTO `pro` VALUES ('88', '11', '4', '11', '11', '11', '11', '', '1522416576', '0', '0');

-- ----------------------------
-- Table structure for `shopping`
-- ----------------------------
DROP TABLE IF EXISTS `shopping`;
CREATE TABLE `shopping` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pCount` varchar(50) NOT NULL,
  `date` int(50) NOT NULL,
  `pName` varchar(50) NOT NULL,
  `iPrice` varchar(50) NOT NULL,
  `oid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shopping
-- ----------------------------
INSERT INTO `shopping` VALUES ('26', '19', '', '0', '1502129399', '111', '0', '5666');
INSERT INTO `shopping` VALUES ('27', '18', '', '0', '1511541424', '2', '0', '9094');
INSERT INTO `shopping` VALUES ('29', '29', '', '0', '1511541466', '3', '0', '3924');
INSERT INTO `shopping` VALUES ('30', '7', '123', '0', '1511784562', '11111', '0', '4106');
INSERT INTO `shopping` VALUES ('31', '39', '11', '999', '1513001093', '程序猿员hello world卫衣', '999', '7625');
INSERT INTO `shopping` VALUES ('32', '65', '', '800', '1522416342', '补水一号', '800', '3917');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `sex` enum('男','女') NOT NULL,
  `email` varchar(60) NOT NULL,
  `regTime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '11', '1', '男', '253@qq.com', '1501706757');
INSERT INTO `user` VALUES ('3', '1', '1', '男', '1', '1501711804');
INSERT INTO `user` VALUES ('4', '1', '1', '男', '', '0');
INSERT INTO `user` VALUES ('5', '123', '123', '女', '123@qq.com', '1511611486');
INSERT INTO `user` VALUES ('6', '123', '123', '女', '123@qq.com', '1511611539');
INSERT INTO `user` VALUES ('7', '123', '123', '女', '123@qq.com', '1511611624');
INSERT INTO `user` VALUES ('8', '456', '456', '女', '456@qq.com', '1511611650');
