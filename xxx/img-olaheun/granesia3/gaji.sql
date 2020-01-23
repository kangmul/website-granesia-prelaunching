# Host: localhost  (Version 5.6.16)
# Date: 2016-11-15 08:43:04
# Generator: MySQL-Front 5.3  (Build 8.15)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "gaji"
#

DROP TABLE IF EXISTS `gaji`;
CREATE TABLE `gaji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) DEFAULT NULL,
  `periode` varchar(25) DEFAULT NULL,
  `golongan` int(11) DEFAULT NULL,
  `gapok` double DEFAULT NULL,
  `nm_pot1` int(11) DEFAULT NULL,
  `pot_1` double DEFAULT NULL,
  `nm_pot2` int(11) DEFAULT NULL,
  `pot_2` double DEFAULT NULL,
  `nm_pot3` int(11) DEFAULT NULL,
  `pot_3` double DEFAULT NULL,
  `sisa_gaji` double DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `hps` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "gaji"
#

INSERT INTO `gaji` VALUES (1,1,'11',1,2500000,1,10000,2,100000,0,0,2390000,'2016-11-08 15:40:51',0),(3,3,'11',2,3000000,1,10000,2,100000,3,100000,2790000,'2016-11-08 16:21:32',0),(4,2,'11',1,2500000,1,10000,1,100000,3,100000,2290000,'2016-11-08 16:46:54',0),(5,1,'12',1,2500000,1,150000,0,0,3,200000,2150000,'2016-11-09 11:01:13',0);
