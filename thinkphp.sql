/*
Navicat MySQL Data Transfer

Source Server         : 192.168.26.205
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : thinkphp

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2021-04-14 17:00:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('2', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '0', '0', null);
INSERT INTO `admin` VALUES ('3', 'root', '111111', '0', '0', null);

-- ----------------------------
-- Table structure for `articl`
-- ----------------------------
DROP TABLE IF EXISTS `articl`;
CREATE TABLE `articl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `status` tinyint(1) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articl
-- ----------------------------
INSERT INTO `articl` VALUES ('22', 'ssss', 'sssssssssssssss', '0', '14', '1618367691', '1618367691');
INSERT INTO `articl` VALUES ('2', '文章2', '内容2', '1', '2', '1618307923', '1618307923');
INSERT INTO `articl` VALUES ('19', '文章9', '内容9', '0', '11', '1618367083', '1618367083');
INSERT INTO `articl` VALUES ('11', '文章4', '内容4', '1', '4', '1618324331', '1618324331');
INSERT INTO `articl` VALUES ('12', '文章5', '内容5', '1', '5', '1618324341', '1618324341');
INSERT INTO `articl` VALUES ('20', '文章10', '内容10', '0', '12', '1618367093', '1618367093');
INSERT INTO `articl` VALUES ('14', '文章7', '内容7', '1', '7', '1618324499', '1618324499');
INSERT INTO `articl` VALUES ('21', 'ssss', 'dddsss', '0', '2', '1618367667', '1618367667');
INSERT INTO `articl` VALUES ('23', 'dddd', 'sddddddd', '1', '16', '1618367744', '1618367744');
INSERT INTO `articl` VALUES ('24', 'ssssssss', 'dddddd', '1', '16', '1618367790', '1618367790');
INSERT INTO `articl` VALUES ('26', 's', 'ssssssss', '1', '1111', '1618368706', '1618368706');
INSERT INTO `articl` VALUES ('27', 'sssss', 'ssssss', '1', '14', '1618368876', '1618368876');
INSERT INTO `articl` VALUES ('28', 'sssss', 'ssssss', '1', '33', '1618371270', '1618371270');
INSERT INTO `articl` VALUES ('29', 'dddddddd', 'ssss', '1', '55', '1618371284', '1618371284');
