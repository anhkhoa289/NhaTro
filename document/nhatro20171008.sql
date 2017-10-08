/*
 Navicat Premium Data Transfer

 Source Server         : xamp
 Source Server Type    : MySQL
 Source Server Version : 50719
 Source Host           : localhost:3306
 Source Schema         : nhatro

 Target Server Type    : MySQL
 Target Server Version : 50719
 File Encoding         : 65001

 Date: 08/10/2017 23:01:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for diaphuong
-- ----------------------------
DROP TABLE IF EXISTS `diaphuong`;
CREATE TABLE `diaphuong`  (
  `madp` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `maTinh` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `maQuan` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `maPhuong` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tenTinh` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenQuan` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `tenPhuong` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`madp`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of diaphuong
-- ----------------------------
INSERT INTO `diaphuong` VALUES ('04-01-01', '04', '01', '01', 'Đà Nẵng', 'Hải Châu', 'Hòa Cường Bắc');
INSERT INTO `diaphuong` VALUES ('04-01-02', '04', '01', '02', 'Đà Nẵng', 'Hải Châu', 'Hòa Cường Nam');
INSERT INTO `diaphuong` VALUES ('04-01-03', '04', '01', '03', 'Đà Nẵng', 'Hải Châu', 'Hòa Thuận Tây');
INSERT INTO `diaphuong` VALUES ('04-01-04', '04', '01', '04', 'Đà Nẵng', 'Hải Châu', 'Hòa Thuận Đông');
INSERT INTO `diaphuong` VALUES ('04-02-01', '04', '02', '01', 'Đà Nẵng', 'Thanh Khê', 'An Đông');
INSERT INTO `diaphuong` VALUES ('01-01-01', '01', '01', '01', 'Hà Nội', 'Ba Đình', 'Hàng Cá');

-- ----------------------------
-- Table structure for loaitaikhoan
-- ----------------------------
DROP TABLE IF EXISTS `loaitaikhoan`;
CREATE TABLE `loaitaikhoan`  (
  `loaiTK` int(255) NOT NULL AUTO_INCREMENT,
  `tenLoai` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`loaiTK`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of loaitaikhoan
-- ----------------------------
INSERT INTO `loaitaikhoan` VALUES (1, 'KhachHang');
INSERT INTO `loaitaikhoan` VALUES (2, 'CTV');
INSERT INTO `loaitaikhoan` VALUES (3, 'Admin');

-- ----------------------------
-- Table structure for taikhoan
-- ----------------------------
DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE `taikhoan`  (
  `id_TK` bigint(255) NOT NULL AUTO_INCREMENT,
  `holot` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `ten` varchar(20) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `gioiTinh` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'U',
  `ngSinh` date NOT NULL,
  `cmnd` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sdt` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `tinh` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `quan` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phuong` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diaChi` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `tinhTrangHoatDong` bit(1) NOT NULL DEFAULT b'0',
  `maKichHoat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tenDangNhap` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `matkhau` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `loaiTK` int(255) DEFAULT 1,
  `CTVHoTro` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_TK`) USING BTREE,
  UNIQUE INDEX `tenDangNhap`(`tenDangNhap`) USING BTREE,
  UNIQUE INDEX `cmnd`(`cmnd`) USING BTREE,
  INDEX `LoaiTK`(`loaiTK`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of taikhoan
-- ----------------------------
INSERT INTO `taikhoan` VALUES (1, 'Nguyễn Hữu Anh', 'Khoa', 'M', '1994-09-28', '201684535', 'anhkhoa2890@gmail.com', '01299223590', 'tp Đà Nẵng', 'Hải Châu', 'Hòa Cường Bắc', '44 Huỳnh Tấn Phát', b'1', NULL, 'anhkhoa289', '1234', 3, NULL);
INSERT INTO `taikhoan` VALUES (2, 'Nguyễn Hoàng Minh', 'Thi', 'F', '1996-03-05', '201684536', 'thihoang@gmail.com', '0122345678', 'tp Đà Nẵng', 'Hải Châu', 'Hòa Cường Bắc', 'fgfg', b'0', NULL, 'thi289', '1234', 1, NULL);
INSERT INTO `taikhoan` VALUES (3, 'huhu', 'huhu', 'F', '2017-10-11', '123456789', 'kae', '01234567892', 'huhu', 'huhu', 'huhu', 'huhu', b'0', NULL, 'anhthi', '123456', 1, NULL);

SET FOREIGN_KEY_CHECKS = 1;
