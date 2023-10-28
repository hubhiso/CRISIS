/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50734 (5.7.34)
 Source Host           : localhost:3306
 Source Schema         : gisprocess

 Target Server Type    : MySQL
 Target Server Version : 50734 (5.7.34)
 File Encoding         : 65001

 Date: 06/09/2023 21:54:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for prov_geo
-- ----------------------------
DROP TABLE IF EXISTS `prov_geo`;
CREATE TABLE `prov_geo` (
  `prov_code` varchar(2) NOT NULL DEFAULT '0',
  `prov_name` varchar(50) DEFAULT NULL,
  `prov_name_en` varchar(100) DEFAULT NULL,
  `pak` varchar(2) DEFAULT NULL,
  `region` varchar(2) DEFAULT NULL,
  `thaihealth` varchar(2) DEFAULT NULL,
  `nhso` varchar(2) DEFAULT NULL,
  `moph` varchar(2) DEFAULT NULL,
  `dpc` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`prov_code`),
  KEY `prov_code` (`prov_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prov_geo
-- ----------------------------
BEGIN;
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('10', 'กรุงเทพมหานคร', 'Bangkok', '5', '10', '0', '13', '0', '1');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('11', 'สมุทรปราการ', 'Samut Prakan', '1', '1', '2', '6', '3', '3');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('12', 'นนทบุรี', 'Nonthaburi', '1', '1', '1', '4', '1', '1');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('13', 'ปทุมธานี', 'Pathum Thani', '1', '1', '1', '4', '1', '1');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('14', 'พระนครศรีอยุธยา', 'Phra Nakhon Si Ayutthaya', '1', '1', '1', '4', '1', '1');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('15', 'อ่างทอง', 'Ang Thong', '1', '1', '1', '4', '2', '2');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('16', 'ลพบุรี', 'Lop Buri', '1', '1', '1', '4', '2', '2');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('17', 'สิงห์บุรี', 'Sing Buri', '1', '1', '1', '4', '2', '2');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('18', 'ชัยนาท', 'Chai Nat', '1', '1', '1', '3', '2', '2');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('19', 'สระบุรี', 'Saraburi', '1', '1', '1', '4', '1', '2');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('20', 'ชลบุรี', 'Chon Buri', '1', '2', '2', '6', '9', '3');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('21', 'ระยอง', 'Rayong', '1', '2', '2', '6', '9', '3');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('22', 'จันทบุรี', 'Chanthaburi', '1', '2', '2', '6', '9', '3');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('23', 'ตราด', 'Trat', '1', '2', '2', '6', '9', '3');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('24', 'ฉะเชิงเทรา', 'Chachoengsao', '1', '2', '2', '6', '3', '3');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('25', 'ปราจีนบุรี', 'Prachin Buri', '1', '2', '2', '6', '3', '3');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('26', 'นครนายก', 'Nakhon Nayok', '1', '2', '1', '4', '3', '3');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('27', 'สระแก้ว', 'Sa Kaeo', '1', '2', '2', '6', '3', '3');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('30', 'นครราชสีมา', 'Nakhon Ratchasima', '2', '3', '6', '9', '14', '5');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('31', 'บุรีรัมย์', 'Buri Ram', '2', '3', '6', '9', '14', '5');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('32', 'สุรินทร์', 'Surin', '2', '3', '6', '9', '14', '5');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('33', 'ศรีสะเกษ', 'Si Sa Ket', '2', '3', '6', '10', '13', '7');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('34', 'อุบลราชธานี', 'Ubon Ratchathani', '2', '3', '6', '10', '13', '7');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('35', 'ยโสธร', 'Yasothon', '2', '3', '6', '10', '13', '7');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('36', 'ชัยภูมิ', 'Chaiyaphum', '2', '3', '6', '9', '14', '5');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('37', 'อำนาจเจริญ', 'Amnat Charoen', '2', '3', '6', '10', '13', '7');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('38', 'บึงกาฬ', 'Bueng Kan', '2', '4', '5', '8', '10', '6');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('39', 'หนองบัวลำภู', 'Nong Bua Lam Phu', '2', '4', '5', '8', '10', '6');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('40', 'ขอนแก่น', 'Khon Kaen', '2', '4', '5', '7', '12', '6');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('41', 'อุดรธานี', 'Udon Thani', '2', '4', '5', '8', '10', '6');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('42', 'เลย', 'Loei', '2', '4', '5', '8', '10', '6');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('43', 'หนองคาย', 'Nong Khai', '2', '4', '5', '8', '10', '6');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('44', 'มหาสารคาม', 'Maha Sarakham', '2', '4', '5', '7', '12', '6');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('45', 'ร้อยเอ็ด', 'Roi Et', '2', '4', '6', '7', '12', '6');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('46', 'กาฬสินธุ์', 'Kalasin', '2', '4', '5', '7', '12', '6');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('47', 'สกลนคร', 'Sakon Nakhon', '2', '4', '5', '8', '11', '7');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('48', 'นครพนม', 'Nakhon Phanom', '2', '4', '5', '8', '11', '7');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('49', 'มุกดาหาร', 'Mukdahan', '2', '4', '5', '10', '11', '7');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('50', 'เชียงใหม่', 'Chiang Mai', '3', '5', '3', '1', '15', '10');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('51', 'ลำพูน', 'Lamphun', '3', '5', '3', '1', '15', '10');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('52', 'ลำปาง', 'Lampang', '3', '5', '3', '1', '15', '10');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('53', 'อุตรดิตถ์', 'Uttaradit', '3', '5', '4', '2', '17', '9');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('54', 'แพร่', 'Phrae', '3', '5', '3', '1', '16', '10');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('55', 'น่าน', 'Nan', '3', '5', '3', '1', '16', '10');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('56', 'พะเยา', 'Phayao', '3', '5', '3', '1', '16', '10');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('57', 'เชียงราย', 'Chiang Rai', '3', '5', '3', '1', '16', '10');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('58', 'แม่ฮ่องสอน', 'Mae Hong Son', '3', '5', '3', '1', '15', '10');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('60', 'นครสวรรค์', 'Nakhon Sawan', '3', '6', '4', '3', '18', '8');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('61', 'อุทัยธานี', 'Uthai Thani', '3', '6', '4', '3', '18', '8');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('62', 'กำแพงเพชร', 'Kamphaeng Phet', '3', '6', '4', '3', '18', '8');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('63', 'ตาก', 'Tak', '3', '6', '4', '2', '17', '9');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('64', 'สุโขทัย', 'Sukhothai', '3', '6', '4', '2', '17', '9');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('65', 'พิษณุโลก', 'Phitsanulok', '3', '6', '4', '2', '17', '9');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('66', 'พิจิตร', 'Phichit', '3', '6', '4', '3', '18', '8');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('67', 'เพชรบูรณ์', 'Phetchabun', '3', '6', '4', '2', '17', '9');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('70', 'ราชบุรี', 'Ratchaburi', '1', '7', '2', '5', '4', '4');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('71', 'กาญจนบุรี', 'Kanchanaburi', '1', '7', '1', '5', '4', '4');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('72', 'สุพรรณบุรี', 'Suphan Buri', '1', '7', '1', '5', '4', '4');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('73', 'นครปฐม', 'Nakhon Pathom', '1', '7', '1', '5', '4', '4');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('74', 'สมุทรสาคร', 'Samut Sakhon', '1', '7', '2', '5', '5', '4');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('75', 'สมุทรสงคราม', 'Samut Songkhram', '1', '7', '2', '5', '5', '4');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('76', 'เพชรบุรี', 'Phetchaburi', '1', '7', '2', '5', '5', '4');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('77', 'ประจวบคีรีขันธ์', 'Prachuap Khiri Khan', '1', '7', '2', '5', '5', '4');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('80', 'นครศรีธรรมราช', 'Nakhon Si Thammarat', '4', '8', '7', '11', '6', '11');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('81', 'กระบี่', 'Krabi', '4', '8', '7', '11', '7', '11');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('82', 'พังงา', 'Phangnga', '4', '8', '7', '11', '7', '11');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('83', 'ภูเก็ต', 'Phuket', '4', '8', '7', '11', '7', '11');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('84', 'สุราษฎร์ธานี', 'Surat Thani', '4', '8', '7', '11', '6', '11');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('85', 'ระนอง', 'Ranong', '4', '8', '7', '11', '7', '11');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('86', 'ชุมพร', 'Chumphon', '4', '8', '7', '11', '6', '11');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('90', 'สงขลา', 'Songkhla', '4', '9', '7', '12', '8', '12');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('91', 'สตูล', 'Satun', '4', '9', '7', '12', '8', '12');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('92', 'ตรัง', 'Trang', '4', '9', '7', '12', '7', '12');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('93', 'พัทลุง', 'Phatthalung', '4', '9', '7', '12', '6', '12');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('94', 'ปัตตานี', 'Pattani', '4', '9', '8', '12', '8', '12');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('95', 'ยะลา', 'Yala', '4', '9', '8', '12', '8', '12');
INSERT INTO `prov_geo` (`prov_code`, `prov_name`, `prov_name_en`, `pak`, `region`, `thaihealth`, `nhso`, `moph`, `dpc`) VALUES ('96', 'นราธิวาส', 'Narathiwat', '4', '9', '8', '12', '8', '12');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
