/*
Navicat MySQL Data Transfer

Source Server         : web_Che
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-03-15 18:59:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `category_id`
-- ----------------------------
DROP TABLE IF EXISTS `category_id`;
CREATE TABLE `category_id` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `names` varchar(50) NOT NULL,
  `pid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category_id
-- ----------------------------
INSERT INTO `category_id` VALUES ('1', '水果', '1');
INSERT INTO `category_id` VALUES ('2', '蔬菜', '2');
INSERT INTO `category_id` VALUES ('0', '', '');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `fuel` varchar(50) NOT NULL,
  `zhuang` enum('下架','上架') NOT NULL,
  `category_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('2', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '下架', '1');
INSERT INTO `news` VALUES ('3', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '1');
INSERT INTO `news` VALUES ('4', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '2');
INSERT INTO `news` VALUES ('6', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '2');
INSERT INTO `news` VALUES ('7', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '1');
INSERT INTO `news` VALUES ('8', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '2');
INSERT INTO `news` VALUES ('9', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '1');
INSERT INTO `news` VALUES ('10', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '2');
INSERT INTO `news` VALUES ('11', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '2');
INSERT INTO `news` VALUES ('12', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '2');
INSERT INTO `news` VALUES ('13', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '2');
INSERT INTO `news` VALUES ('14', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '2');
INSERT INTO `news` VALUES ('15', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '1');
INSERT INTO `news` VALUES ('16', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '2');
INSERT INTO `news` VALUES ('17', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '1');
INSERT INTO `news` VALUES ('18', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '1');
INSERT INTO `news` VALUES ('19', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '2');
INSERT INTO `news` VALUES ('20', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '下架', '3');
INSERT INTO `news` VALUES ('21', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '上架', '2');
INSERT INTO `news` VALUES ('22', './public/images/list_033.jpg', '人生果', '100.00￥', '100.00￥', '下架', '2');
INSERT INTO `news` VALUES ('23', './public/images/15524747816984.jpg', '人生果', '100.00', '100.00', '下架', '2');
INSERT INTO `news` VALUES ('57', './public/images/15526205069216.jpg', '白菜', '100.00', '100.10', '下架', '1');
INSERT INTO `news` VALUES ('41', './public/images/15525550981202.jpg', '西瓜', '100.00', '100.10', '上架', '1');
INSERT INTO `news` VALUES ('42', './public/images/list_033.jpg', '苹果', '100', '100', '上架', '2');
INSERT INTO `news` VALUES ('43', './public/images/list_033.jpg', '苹果', '100', '100', '上架', '2');
INSERT INTO `news` VALUES ('44', './public/images/list_033.jpg', '苹果', '100', '100', '上架', '2');
INSERT INTO `news` VALUES ('45', './public/images/list_033.jpg', '苹果', '100', '100', '上架', '2');
INSERT INTO `news` VALUES ('46', './public/images/list_033.jpg', '苹果', '100', '100', '上架', '2');
INSERT INTO `news` VALUES ('47', './public/images/list_033.jpg', '苹果', '100', '100', '上架', '2');
INSERT INTO `news` VALUES ('48', './public/images/list_033.jpg', '苹果', '100', '100', '上架', '2');
INSERT INTO `news` VALUES ('49', './public/images/list_033.jpg', '苹果', '100', '100', '上架', '2');
INSERT INTO `news` VALUES ('50', './public/images/list_033.jpg', '苹果', '100', '100', '上架', '2');
INSERT INTO `news` VALUES ('51', './public/images/list_033.jpg', '苹果', '100', '100', '下架', '2');
INSERT INTO `news` VALUES ('52', './public/images/list_033.jpg', '苹果', '100', '100', '上架', '2');
INSERT INTO `news` VALUES ('53', './public/images/list_033.jpg', '苹果', '100', '100', '上架', '2');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'admin', '3-13');
INSERT INTO `user` VALUES ('2', '车志强', '123456', '3-13');
