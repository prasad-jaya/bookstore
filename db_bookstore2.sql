/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : db_bookstore

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 20/05/2019 16:26:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for books_details
-- ----------------------------
DROP TABLE IF EXISTS `books_details`;
CREATE TABLE `books_details`  (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `price` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `author` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `description` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image_src` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`book_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of books_details
-- ----------------------------
INSERT INTO `books_details` VALUES (45, 'Amarabandu', '1500', 'Sirisena', ':)', 'istockphoto-916972538-612x612.jpg');
INSERT INTO `books_details` VALUES (46, 'Book 2', '2000', 'ffvfv', 'fvfvfvff', 'learning-dragon_d.jpg');
INSERT INTO `books_details` VALUES (47, 'sss', 'sdssd', 'ssd', 'sdsdsd', 'astronaut-1920x1080-autumn-space-suit-hd-11460.jpg');

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT 0,
  `status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 60 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES (56, 'user5ce1a951a0ef6', 45, 'PENDING');
INSERT INTO `cart` VALUES (55, 'user5ce1a951a0ef6', 45, 'PENDING');
INSERT INTO `cart` VALUES (54, 'user5ce1a86aac16b', 45, 'PENDING');
INSERT INTO `cart` VALUES (57, 'user5ce1a951a0ef6', 45, 'PENDING');
INSERT INTO `cart` VALUES (58, 'user5ce1a951a0ef6', 45, 'PENDING');
INSERT INTO `cart` VALUES (59, 'user5ce1a951a0ef6', 45, 'PENDING');

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment`  (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL DEFAULT 0,
  `no_of_items` int(11) NOT NULL DEFAULT 0,
  `date` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`pay_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payment
-- ----------------------------
INSERT INTO `payment` VALUES (3, '1', 1344, 2, '2019/05/19');
INSERT INTO `payment` VALUES (4, '1', 1344, 2, '2019/05/19');
INSERT INTO `payment` VALUES (5, '1', 20, 1, '2019/05/19');
INSERT INTO `payment` VALUES (6, '1', 1000, 1, '2019/05/19');
INSERT INTO `payment` VALUES (7, '1', 40, 2, '2019/05/19');
INSERT INTO `payment` VALUES (8, '1', 1500, 1, '2019/05/20');
INSERT INTO `payment` VALUES (10, '0', 3000, 2, '2019/05/20');
INSERT INTO `payment` VALUES (11, '0', 4500, 3, '2019/05/20');
INSERT INTO `payment` VALUES (12, '0', 6000, 4, '2019/05/20');
INSERT INTO `payment` VALUES (13, 'user5ce1a951a0ef6', 7500, 5, '2019/05/20');
INSERT INTO `payment` VALUES (14, 'user5ce1a951a0ef6', 1500, 1, '2019/05/20');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `Mobile_Number` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`username`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('user5ce1a99927700', 'asas@asas', 'asas', 'aas', 'asas', 'asa');
INSERT INTO `users` VALUES ('user5ce1a9c2ee152', 'fsfs@fsfs', 'sfsf', 'fsf', 'sfsf', 'sfs');
INSERT INTO `users` VALUES ('user5ce1a951a0ef6', 'prasad@gmaaaail.com', 'aaxax', 'axax', 'axaxa', 'aaxax');
INSERT INTO `users` VALUES ('user5ce12f692a46d', 'prasad@gmail.com', '122323', 'pra', NULL, NULL);
INSERT INTO `users` VALUES ('user5ce1aa33a7a7a', 'qdqd@wdd', 'wdwd', 'axaqdq', 'wdwd', 'wdw');
INSERT INTO `users` VALUES ('user5ce12f91a705d', 'sdsd@dsd', '232323', 'sdsdsd', NULL, NULL);
INSERT INTO `users` VALUES ('user5ce1a8a4be0d0', 'sdsds@xcfsf', 'sfsf', 'sdsdsd', 'sfsf', 'sfsf');
INSERT INTO `users` VALUES ('user5ce1a92414133', 'xaa@dsds', 'sdsd', 'xaxax', 'sdsd', 'sdsd');
INSERT INTO `users` VALUES ('user5ce1a86aac16b', 'zxzzx@zxzx', 'ddsdsd', 'dcsc', 'sds', 'sdsdsd');

SET FOREIGN_KEY_CHECKS = 1;
