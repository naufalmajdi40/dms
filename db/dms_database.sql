/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100131
Source Host           : localhost:3306
Source Database       : dms_database

Target Server Type    : MYSQL
Target Server Version : 100131
File Encoding         : 65001

Date: 2023-12-04 14:22:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bot
-- ----------------------------
DROP TABLE IF EXISTS `bot`;
CREATE TABLE `bot` (
  `id` int(11) NOT NULL,
  `bot_name` varchar(255) DEFAULT NULL,
  `bot_username` varchar(255) DEFAULT NULL,
  `bot_token` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of bot
-- ----------------------------
INSERT INTO `bot` VALUES ('1', 'DMS_bot', '@dms2014_bot', '1869021911:AAExd2uIUA_9QNRTrBBcB9bCSFI9I6z7cZQ', '0');
INSERT INTO `bot` VALUES ('2', 'DMS_test', '@dmsmel_bot', '5095490998:AAFKxXFVfsvniUiB1RBW930RfjCBWy_PDUY', '1');

-- ----------------------------
-- Table structure for data
-- ----------------------------
DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `machine_code` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `port_type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `relay_id` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `tanggal` varchar(50) DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `tgl_kirim` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`no`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of data
-- ----------------------------
INSERT INTO `data` VALUES ('11', '0001', 'SEL 849', '1', '192.168.2.100', '2', 'GI WARU', 'TRIP', 'RELAY Disturbance.000', '2023-09-20', '13:29:23', '0', '20/09/2023');
INSERT INTO `data` VALUES ('12', '0001', 'SEL 849', '1', '192.168.2.100', '2', 'GI WARU', 'TRIP', 'RELAY Disturbance.000', '2023-09-20', '13:47:52', '0', '20/09/2023');
INSERT INTO `data` VALUES ('13', '0001', 'SEL 849', '1', '192.168.2.100', '2', 'GI WARU', 'TRIP', 'RELAY Disturbance.000', '2023-09-20', '13:47:54', '0', '20/09/2023');
INSERT INTO `data` VALUES ('14', '0001', 'MICOM P123', '0', '0', '1', 'GI Waru,1', 'alarm tahap3 non blocking', '11.06.2023 13.28.24 Disturbance.000', '2023-11-06', '13:32:57', '0', '06/11/2023');
INSERT INTO `data` VALUES ('15', '0001', 'MICOM P123', '0', '0', '1', 'GI Waru,1', 'alarm tahap3 non blocking', '11.06.2023 13.34.31 Disturbance.000', '2023-11-06', '13:39:07', '0', '06/11/2023');

-- ----------------------------
-- Table structure for data_event
-- ----------------------------
DROP TABLE IF EXISTS `data_event`;
CREATE TABLE `data_event` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `machine_code` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `port_type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `relay_id` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `tanggal` varchar(50) DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `tgl_kirim` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`no`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of data_event
-- ----------------------------
INSERT INTO `data_event` VALUES ('11', '0001', 'SEL 849', '1', '192.168.2.100', '2', 'GI WARU', 'TRIP', 'RELAY Disturbance.000', '2023-09-20', '13:29:23', '0', '20/09/2023');
INSERT INTO `data_event` VALUES ('12', '0001', 'SEL 849', '1', '192.168.2.100', '2', 'GI WARU', 'TRIP', 'RELAY Disturbance.000', '2023-09-20', '13:47:52', '0', '20/09/2023');
INSERT INTO `data_event` VALUES ('13', '0001', 'SEL 849', '1', '192.168.2.100', '2', 'GI WARU', 'TRIP', 'RELAY Disturbance.000', '2023-09-20', '13:47:54', '0', '20/09/2023');

-- ----------------------------
-- Table structure for device_list
-- ----------------------------
DROP TABLE IF EXISTS `device_list`;
CREATE TABLE `device_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `machine_code` varchar(11) DEFAULT NULL,
  `device_name` varchar(255) DEFAULT NULL,
  `status_device` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `gi_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of device_list
-- ----------------------------
INSERT INTO `device_list` VALUES ('1', null, '0001', 'DMS Waru', '1', '-7.2840228', '111.1514343', 'Sidoarjo', 'Waru');
INSERT INTO `device_list` VALUES ('3', null, '16050', 'DMS Mojokerto', '1', '-7.462893337141634', '112.42326626828576', 'Mojokerto', 'Mojokerto');
INSERT INTO `device_list` VALUES ('4', null, '16051', 'DMS Lamongan', '1', '-7.1193549131197935', '112.41563822751078', 'Lamongan', 'Lamongan');

-- ----------------------------
-- Table structure for device_list_copy
-- ----------------------------
DROP TABLE IF EXISTS `device_list_copy`;
CREATE TABLE `device_list_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `machine_code` varchar(11) DEFAULT NULL,
  `device_name` varchar(255) DEFAULT NULL,
  `status_device` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `gi_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of device_list_copy
-- ----------------------------
INSERT INTO `device_list_copy` VALUES ('1', null, '16049', 'DMS Waru', '1', '-7.346028', '112.746333', 'Sidoarjo', 'Waru');
INSERT INTO `device_list_copy` VALUES ('3', null, '16050', 'DMS Mojokerto', '1', '-7.462893337141634', '112.42326626828576', 'Mojokerto', null);
INSERT INTO `device_list_copy` VALUES ('4', null, '16051', 'DMS Lamongan', '1', '-7.1193549131197935', '112.41563822751078', 'Lamongan', null);
INSERT INTO `device_list_copy` VALUES ('5', null, '0001', 'DMS Madiun', '1', '-7.6307410549621215', '111.52650561519845', 'Madiun', null);

-- ----------------------------
-- Table structure for device_list_perdevice
-- ----------------------------
DROP TABLE IF EXISTS `device_list_perdevice`;
CREATE TABLE `device_list_perdevice` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `machine_code` varchar(255) DEFAULT NULL,
  `id_device` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `port_type` varchar(50) DEFAULT NULL,
  `port_number` varchar(50) DEFAULT NULL,
  `port_address` varchar(50) DEFAULT NULL,
  `rack_location` varchar(50) DEFAULT NULL,
  `baudrate` varchar(50) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `dns` varchar(255) DEFAULT NULL,
  `netmask` varchar(255) DEFAULT NULL,
  `gateway` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `stop_bits` varchar(255) DEFAULT NULL,
  `parity` varchar(255) DEFAULT NULL,
  `byte_size` varchar(10) DEFAULT NULL,
  `kondisi` varchar(50) DEFAULT NULL,
  `tanggal` varchar(50) DEFAULT NULL,
  `mode` varchar(255) DEFAULT NULL,
  `protocol` varchar(255) DEFAULT NULL,
  `pos` int(3) DEFAULT NULL,
  PRIMARY KEY (`no`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=413 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of device_list_perdevice
-- ----------------------------
INSERT INTO `device_list_perdevice` VALUES ('411', '0001', '1', 'MICOM P123', '0', null, null, 'Waru', null, null, null, null, null, null, null, null, null, null, null, null, '1');
INSERT INTO `device_list_perdevice` VALUES ('412', '0001', '2', 'SEL849', '2', null, null, 'Krian ', null, null, null, null, null, null, null, null, null, null, null, null, '0');

-- ----------------------------
-- Table structure for device_user
-- ----------------------------
DROP TABLE IF EXISTS `device_user`;
CREATE TABLE `device_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `machine_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of device_user
-- ----------------------------
INSERT INTO `device_user` VALUES ('1', '0001', '0001');
INSERT INTO `device_user` VALUES ('3', '0002', '0001');

-- ----------------------------
-- Table structure for even
-- ----------------------------
DROP TABLE IF EXISTS `even`;
CREATE TABLE `even` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `machine_code` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `port_type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `relay_id` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `tanggal` varchar(50) DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `tgl_kirim` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`no`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of even
-- ----------------------------
INSERT INTO `even` VALUES ('13', '0003', 'MICOM P123', '0', '1', '1', 'GI Waru_ Rak 01xxx', 'healthy', '01.12.2022 20.20.55.642000 Disturbance.000', '2022-01-12', '20:15', '1', '12/01/2022');
INSERT INTO `even` VALUES ('14', '0003', 'MICOM P123', '0', '1', '1', 'GI Waru_ Rak 01', 'healthy', '01.12.2022 20.26.49.642000 Disturbance.000', '2022-01-12', '20:21', '1', '12/01/2022');
INSERT INTO `even` VALUES ('18', '0003', 'MICOM P123', '0', null, '1', 'GI Waru,1', '0', '07.27.2023 23.46.04', '07/27/2023', '23:46', '0', '07/27/2023');
INSERT INTO `even` VALUES ('19', '0003', 'MICOM P123', '0', null, '1', 'GI Waru,1', 'alarm tahap3 non blocking', '07.28.2023 00.07.56', '07/28/2023', '00:07', '0', '07/28/2023');
INSERT INTO `even` VALUES ('20', '0003', 'MICOM P123', '0', null, '1', 'GI Waru,1', 'alarm tahap3 non blocking', '07.28.2023 00.23.05', '07/28/2023', '00:23', '0', '07/28/2023');
INSERT INTO `even` VALUES ('21', '0003', 'MICOM P123', '0', null, '1', 'GI Waru,1', 'alarm tahap3 non blocking', '07.28.2023 00.33.00', '2023-07-28', '00:33', '0', '2023-07-28');
INSERT INTO `even` VALUES ('22', '0003', 'MICOM P123', '0', null, '1', 'GI Waru,1', 'alarm tahap3 non blocking', '07.28.2023 00.42.19', '2023-07-28', '00:42', '0', '2023-07-28');
INSERT INTO `even` VALUES ('23', '0003', 'MICOM P123', '0', null, '1', 'GI Waru,1', '0', '07.28.2023 00.51.04', '2023-07-28', '00:51', '0', '2023-07-28');
INSERT INTO `even` VALUES ('24', '0003', 'MICOM P123', '0', null, '1', 'GI Waru,1', 'alarm tahap3 non blocking', '07.28.2023 00.54.17', '2023-07-28', '00:54', '0', '2023-07-28');
INSERT INTO `even` VALUES ('25', '0003', 'MICOM P123', '0', null, '1', 'GI Waru,1', 'alarm tahap3 non blocking', '07.27.2023 15.42.02', '2023-07-27', '15:42', '0', '2023-07-27');
INSERT INTO `even` VALUES ('26', '0003', 'MICOM P123', '0', null, '1', 'GI Waru,1', 'alarm tahap1 non blocking', '07.27.2023 15.45.38', '2023-07-27', '15:45', '0', '2023-07-27');
INSERT INTO `even` VALUES ('27', '0003', 'MICOM P123', '0', null, '1', 'GI Waru,1', 'alarm tahap3 non blocking', '07.28.2023 15.18.41', '2023-07-28', '15:18', '0', '2023-07-28');
INSERT INTO `even` VALUES ('28', '0003', 'OTHER', '0', null, '2', 'GI Waru,pojok kanan atas', 'alarm tahap3 non blocking', '09.05.2023 16.39.52', '2023-09-05', '16:39', '0', '2023-09-05');
INSERT INTO `even` VALUES ('29', '0003', 'OTHER', '0', null, '2', 'GI Waru,pojok kanan atas', 'alarm tahap3 non blocking', '09.05.2023 16.49.28', '2023-09-05', '16:49', '0', '2023-09-05');
INSERT INTO `even` VALUES ('30', '0003', 'OTHER', '0', null, '2', 'GI Waru,pojok kanan atas', 'alarm tahap3 non blocking', '09.05.2023 16.52.33', '2023-09-05', '16:52', '0', '2023-09-05');
INSERT INTO `even` VALUES ('31', '0003', 'OTHER', '0', null, '2', 'GI Waru,pojok kanan atas', 'alarm tahap3 non blocking', '09.05.2023 16.57.30', '2023-09-05', '16:57', '0', '2023-09-05');

-- ----------------------------
-- Table structure for im_com
-- ----------------------------
DROP TABLE IF EXISTS `im_com`;
CREATE TABLE `im_com` (
  `id` int(11) NOT NULL,
  `id_com` int(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of im_com
-- ----------------------------
INSERT INTO `im_com` VALUES ('1', '1', 'IEC61850');
INSERT INTO `im_com` VALUES ('2', '2', 'IEC60870-104');

-- ----------------------------
-- Table structure for im_com_type
-- ----------------------------
DROP TABLE IF EXISTS `im_com_type`;
CREATE TABLE `im_com_type` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_type` int(255) DEFAULT NULL,
  `type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of im_com_type
-- ----------------------------
INSERT INTO `im_com_type` VALUES ('1', '1', null);

-- ----------------------------
-- Table structure for im_config
-- ----------------------------
DROP TABLE IF EXISTS `im_config`;
CREATE TABLE `im_config` (
  `id` int(11) NOT NULL,
  `com` int(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of im_config
-- ----------------------------
INSERT INTO `im_config` VALUES ('0', '2', 'Nodata');

-- ----------------------------
-- Table structure for im_mon
-- ----------------------------
DROP TABLE IF EXISTS `im_mon`;
CREATE TABLE `im_mon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_id` varchar(255) DEFAULT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `active` int(1) DEFAULT '0',
  `id_device` varchar(11) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `machine_code` varchar(255) DEFAULT NULL,
  `register` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `port_type` varchar(255) DEFAULT NULL,
  `data_type` varchar(20) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `pos_all` int(5) DEFAULT NULL,
  `max_value` float(10,2) DEFAULT NULL,
  `min_value` float(10,3) DEFAULT NULL,
  `treshold` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1276 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of im_mon
-- ----------------------------
INSERT INTO `im_mon` VALUES ('1257', 'IA', 'IA', '1', '1', null, 'IA', 'phaseA', '0001', null, null, 'MICOM P123', '0', 'float', '1', null, '999.00', null, null);
INSERT INTO `im_mon` VALUES ('1258', 'IB', 'IB', '1', '1', null, 'IB', 'phase B', '0001', null, null, 'MICOM P123', '0', 'float', '2', null, '999.00', null, null);
INSERT INTO `im_mon` VALUES ('1259', 'IC', 'IC', '1', '1', null, 'IC', 'phase C', '0001', null, null, 'MICOM P123', '0', 'float', '3', null, '999.00', null, null);
INSERT INTO `im_mon` VALUES ('1260', 'IN', 'IN', '1', '1', null, 'IN', 'phase N', '0001', null, null, 'MICOM P123', '0', 'float', '4', null, '999.00', null, null);
INSERT INTO `im_mon` VALUES ('1261', 'TRIP', 'TRIP', '1', '1', null, 'TRIP', 'TRIP', '0001', null, null, 'MICOM P123', '0', 'boolean', '0', null, '999.00', null, null);
INSERT INTO `im_mon` VALUES ('1262', 'TEMPLATEMET', 'METMMXU1$MX$A$phsA$instCVal$mag$f', '1', '2', null, 'A1', 'phase A', '0001', null, null, 'SEL849', '2', 'boolean', '9', null, '1.17', null, null);
INSERT INTO `im_mon` VALUES ('1263', 'TEMPLATEMET', 'RMSMMXU2$MX$A$phsA$instCVal$mag$f', '1', '2', null, 'A2', 'phase A2', '0001', null, null, 'SEL849', '2', 'float', '1', null, '1.00', null, null);
INSERT INTO `im_mon` VALUES ('1264', 'TEMPLATEMET', 'RMSMMXU2$MX$A$phsB$instCVal$mag$f', '1', '2', null, 'B2', 'phase B2', '0001', null, null, 'SEL849', '2', 'float', '5', null, '1.00', null, null);
INSERT INTO `im_mon` VALUES ('1265', 'TEMPLATEMET', 'RMSMMXU2$MX$A$phsC$instCVal$mag$f', '1', '2', null, 'C2', 'phase C2', '0001', null, null, 'SEL849', '2', 'float', '10', null, '1.00', null, null);
INSERT INTO `im_mon` VALUES ('1266', 'TEMPLATEMET', 'RMSMMXU2$MX$A$neut$instCVal$mag$f', '1', '2', null, 'n2', 'netral2', '0001', null, null, 'SEL849', '2', 'float', '2', null, '1.00', null, null);
INSERT INTO `im_mon` VALUES ('1267', 'TEMPLATEMET', 'METMMXU1$MX$TotW$instMag$f', '1', '2', null, 'totW', 'totW', '0001', null, null, 'SEL849', '2', 'float', '6', null, '999.00', null, null);
INSERT INTO `im_mon` VALUES ('1268', 'TEMPLATEMET', 'METMMXU1$MX$TotVAr$instMag$f', '1', '2', null, 'totVAR', 'totVAR', '0001', null, null, 'SEL849', '2', 'float', '11', null, '10.00', null, null);
INSERT INTO `im_mon` VALUES ('1269', 'TEMPLATEMET', 'METMMXU1$MX$TotVA$instMag$f', '1', '2', null, 'totVA', 'totVA', '0001', null, null, 'SEL849', '2', 'float', '0', null, '999.00', null, null);
INSERT INTO `im_mon` VALUES ('1270', 'TEMPLATEMET', 'METMMXU1$MX$TotPF$instMag$f', '1', '2', null, 'totPF', 'tot PF', '0001', null, null, 'SEL849', '2', 'float', '7', null, '1.00', null, null);
INSERT INTO `im_mon` VALUES ('1271', 'TEMPLATEMET', 'METMMXU1$MX$Hz$instMag$f', '1', '2', null, 'freq', 'freq', '0001', null, null, 'SEL849', '2', 'float', '12', null, '60.00', null, null);
INSERT INTO `im_mon` VALUES ('1272', 'TEMPLATEMET', 'METMMXU1$MX$A$phsA$instCVal$mag$f', '1', '2', null, 'A1', 'phase A1', '0001', null, null, 'SEL849', '2', 'float', '3', null, '999.00', null, null);
INSERT INTO `im_mon` VALUES ('1273', 'TEMPLATEMET', 'METMMXU1$MX$A$phsB$instCVal$mag$f', '1', '2', null, 'B1', 'phase B1', '0001', null, null, 'SEL849', '2', 'float', '8', null, '999.00', null, null);
INSERT INTO `im_mon` VALUES ('1274', 'TEMPLATEMET', 'METMMXU1$MX$A$phsC$instCVal$mag$f', '1', '2', null, 'C1', 'phase C1', '0001', null, null, 'SEL849', '2', 'float', '13', null, '999.00', null, null);
INSERT INTO `im_mon` VALUES ('1275', 'TEMPLATEMET', 'METMMXU1$MX$A$neut$instCVal$mag$f', '1', '2', null, 'n1', 'netral1', '0001', null, null, 'SEL849', '2', 'float', '4', null, '999.00', null, null);

-- ----------------------------
-- Table structure for it_mon_com
-- ----------------------------
DROP TABLE IF EXISTS `it_mon_com`;
CREATE TABLE `it_mon_com` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_id` varchar(255) DEFAULT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `active` int(1) DEFAULT '0',
  `id_device` varchar(11) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `machine_code` varchar(255) DEFAULT NULL,
  `register` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `com_type` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of it_mon_com
-- ----------------------------

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `main_menu` varchar(11) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`no`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '0', 'Menu Utama', '#', '', '0', 'admin');
INSERT INTO `menu` VALUES ('3', '12', 'Dashboard', 'beranda', 'fa fa-angle-right', '12', 'user');
INSERT INTO `menu` VALUES ('4', '20', 'Monitoring data', 'mon/dashboardmon', 'fa fa-angle-right', '12', 'user');
INSERT INTO `menu` VALUES ('5', '9', 'Device List', 'device/device_list', 'fa fa-square', '13', 'user');
INSERT INTO `menu` VALUES ('7', '6', 'Disturbance Record', 'data', 'fa fa-angle-right', '12', 'user');
INSERT INTO `menu` VALUES ('13', '12', 'MENU', '#', 'fa fa-th', '0', 'admin');
INSERT INTO `menu` VALUES ('14', '13', 'SETING', '#', 'fa fa-gear', '0', 'admin');
INSERT INTO `menu` VALUES ('17', '16', 'Telegram Users', 'notification', 'fa fa-bell', '13', 'user');
INSERT INTO `menu` VALUES ('18', '10', 'Akun', 'users', 'fa fa-user', '13', 'user');
INSERT INTO `menu` VALUES ('19', '17', 'Event Record', 'event', 'fa fa-angle-right', '12', 'user');

-- ----------------------------
-- Table structure for notif
-- ----------------------------
DROP TABLE IF EXISTS `notif`;
CREATE TABLE `notif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_id` varchar(15) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `machine_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of notif
-- ----------------------------
INSERT INTO `notif` VALUES ('39', '1027787224', 'Amin Rusydi', '0003');
INSERT INTO `notif` VALUES ('44', '495884772', 'Izzudin Wahid', '0002');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kebun` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user',
  `blokir` enum('N','Y') NOT NULL DEFAULT 'N',
  `id_sessions` varchar(50) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '0002', 'PLN ', 'GIS MADIUN', 'fcd04e26e900e94b9ed6dd604fed2b64', 'aminrusydii@gmail.com', 'user', 'Y', 'fcd04e26e900e94b9ed6dd604fed2b64');
INSERT INTO `users` VALUES ('2', '0001', 'PLN ', 'GIS DRIYOREJO', '25bbdcd06c32d477f7fa1c3e4a91b032', 'aminrusydii@gmail.com', 'user', 'N', '25bbdcd06c32d477f7fa1c3e4a91b032');
SET FOREIGN_KEY_CHECKS=1;
