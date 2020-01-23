# Host: localhost  (Version 5.6.16)
# Date: 2016-12-19 15:21:09
# Generator: MySQL-Front 5.3  (Build 8.15)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "acl"
#

DROP TABLE IF EXISTS `acl`;
CREATE TABLE `acl` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file` varchar(200) NOT NULL,
  `action` varchar(200) DEFAULT NULL,
  `deskripsi` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `controller` (`file`,`action`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

#
# Data for table "acl"
#

INSERT INTO `acl` VALUES (1,'lokasi_kerja','insert','Insert Lokasi Kerja'),(2,'lokasi_kerja','update','Update Lokasi Kerja'),(3,'lokasi_kerja','delete','Hapus Lokasi Kerja'),(4,'field','insert','Insert Field'),(5,'field','update','Update Field'),(6,'field','delete','Hapus Field'),(7,'fkerja','insert','Insert Fungsi Kerja'),(8,'fkerja','update','Update Fungs Kerja '),(11,'fkerja','delete','Hapus Fungsi Kerja'),(12,'klasifikasi','insert','Insert Klasifikasi'),(13,'klasifikasi','update','Update Klasifikasi'),(14,'klasifikasi','delete','Hapus Klasifikasi'),(15,'linkterkait','insert','Insert Link'),(16,'linkterkait','update','Update Link'),(17,'linkterkait','delete','Hapus Link'),(18,'nopo','insert','Insert No PO'),(19,'nopo','update','Update No PO'),(20,'nopo','delete','Hapus No PO'),(21,'pekerjaan','insert','Insert Pekerjaan'),(22,'pekerjaan','update','Update Pekerjaan'),(23,'pekerjaan','delete','Hapus Pekerjaan'),(24,'pemegang_kontrak','insert','Insert Pemegang Kontrak'),(25,'pemegang_kontrak','update','Update Pemegang Kontrak'),(26,'pemegang_kontrak','delete','Hapus Pemegang Kontrak'),(27,'perusahaan','insert','Insert Perusahaan'),(28,'perusahaan','update','Update Perusahaan'),(29,'perusahaan','delete','Hapus Perusahaan'),(30,'picture','insert','Insert Gambar'),(31,'picture','update','Update Gambar'),(32,'picture','delete','Hapus Gambar'),(33,'sistemkerja','insert','Insert Shift Kerja'),(34,'sistemkerja','update','Update Shift Kerja'),(35,'sistemkerja','delete','Hapus Sistem Kerja'),(36,'slideshow','insert','Insert Slide Gambar'),(37,'slideshow','update','Update Slide Gambar'),(38,'slideshow','delete','Hapus Slide Gambar'),(39,'lokasi_kerja','view','Lihat Lokasi Kerja'),(40,'field','view','LIhat Field'),(41,'fkerja','view','Lihat Fungsi Kerja'),(42,'klasifikasi','view','Lihat Klasifikasi'),(43,'linkterkait','view','Lihat Link'),(44,'nopo','view','Lihat No PO'),(45,'pekerjaan','view','Lihat Pekerjaan'),(46,'pemegang_kontrak','view','Lihat Pemegang Kontrak'),(47,'perusahaan','view','Lihat Perusahaan'),(48,'picture','view','Lihat Gambar'),(49,'sistemkerja','view','Lihat Shift Kerja'),(50,'slideshow','view','Lihat Slide Gambar'),(51,'history','insert','Insert History'),(52,'history','update','Update History'),(53,'history','delete','Hapus History'),(54,'history','view','Lihat History'),(55,'karyawan','insert','Insert Karyawan'),(56,'karyawan','update','Update Karyawan'),(57,'karyawan','delete','Hapus Karyawan'),(58,'karyawan','view','Lihat Karyawan'),(59,'user','insert','Insert user'),(60,'user','update','Update User'),(61,'user','delete','Hapus User'),(62,'user','view','Lihat User'),(63,'karyawan','berkas_perjanjian_kerja','Lihat Perjanjian Kerja'),(64,'karyawan','cetak_id_card','Cetak Kartu'),(65,'index','view','Lihat Index'),(66,'karyawan','print_pdf','Cetak Dokumen PDF'),(67,'karyawan','print_excel','Cetak Dokumen Excel'),(68,'karyawan','detail_karyawan','Lihat Detail Karyawan'),(69,'index','notifikasi_history','Lihat Notifikasi History'),(70,'index','nav_karyawan','Menu Navigasi Karyawan'),(71,'index','nav_data','Menu Navigasi Data'),(72,'index','nav_user','Menu Navigasi User'),(73,'index','nav_history','Menu Navigasi History'),(74,'index','nav_ppjp','Menu Navigasi PPJP'),(75,'menutabel','view_nopo','Lihat No PO'),(76,'menutabel','view_perusahaan','Lihat PPJP'),(77,'menutabel','view_other_modul','Lihat Modul Lain'),(78,'karyawan','upload_berkas','Izin Upload Berkas'),(79,'karyawan','upload_perjanjian_krj','Izin Upload Perjanjian Kerja'),(80,'index','nav_gaji','Menu Navigasi Gaji'),(81,'index','nav_data_gaji','Menu Navigasi Data Gaji'),(82,'gaji_karyawan','insert','Insert Gaji Karyawan');

#
# Structure for table "acl_to_roles"
#

DROP TABLE IF EXISTS `acl_to_roles`;
CREATE TABLE `acl_to_roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `acl_id` int(10) NOT NULL,
  `role_id` tinyint(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `acl_id` (`acl_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;

#
# Data for table "acl_to_roles"
#

INSERT INTO `acl_to_roles` VALUES (1,1,1),(2,2,1),(3,3,1),(4,39,1),(5,4,1),(6,5,1),(7,6,1),(8,40,1),(9,7,1),(10,8,1),(11,11,1),(12,41,1),(13,12,1),(14,13,1),(15,14,1),(16,42,1),(17,15,1),(18,16,1),(19,17,1),(20,43,1),(21,18,1),(22,19,1),(23,20,1),(24,44,1),(25,21,1),(26,22,1),(27,23,1),(28,45,1),(29,24,1),(30,25,1),(31,26,1),(32,46,1),(33,27,1),(34,28,1),(35,29,1),(36,47,1),(37,30,1),(38,31,1),(39,32,1),(40,48,1),(41,33,1),(42,34,1),(43,35,1),(44,49,1),(45,36,1),(46,37,1),(47,38,1),(48,50,1),(49,51,1),(50,52,1),(51,53,1),(52,54,1),(53,55,1),(54,56,1),(55,57,1),(56,58,1),(57,59,1),(58,60,1),(59,61,1),(60,62,1),(61,19,2),(62,58,2),(63,19,3),(64,58,3),(65,19,5),(66,58,5),(70,63,3),(72,63,5),(73,58,6),(74,64,6),(75,65,1),(76,65,2),(77,66,1),(79,67,1),(81,68,2),(82,68,1),(83,64,1),(84,69,0),(85,69,1),(87,71,1),(88,73,1),(89,70,1),(90,74,1),(91,72,1),(94,74,2),(97,20,1),(98,18,1),(99,19,1),(103,70,6),(104,70,2),(105,71,2),(106,28,2),(107,47,2),(108,76,2),(110,77,1),(111,75,2),(112,58,5),(113,65,5),(114,68,5),(115,74,5),(116,70,5),(117,76,5),(121,66,2),(122,66,5),(123,47,5),(124,68,6),(125,66,6),(126,74,6),(127,70,3),(128,74,3),(129,58,3),(130,66,3),(131,68,3),(132,56,1),(135,78,1),(136,79,1),(137,79,3),(138,80,1),(139,81,1),(140,82,1);

#
# Structure for table "berkas_sertifikat"
#

DROP TABLE IF EXISTS `berkas_sertifikat`;
CREATE TABLE `berkas_sertifikat` (
  `id_sertifikat` int(10) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(10) NOT NULL,
  `sertifikat` varchar(200) NOT NULL,
  `tgl_upload` varchar(100) NOT NULL,
  PRIMARY KEY (`id_sertifikat`)
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

#
# Data for table "berkas_sertifikat"
#

/*!40000 ALTER TABLE `berkas_sertifikat` DISABLE KEYS */;
INSERT INTO `berkas_sertifikat` VALUES (115,2,'2014-04-28 tkjp.pdf','2014-04-28'),(116,2,'2014-04-28 undanganfinalisasisistemdataTKJP.pdf','2014-04-28'),(117,2,'2014-04-28 doc.pdf','2014-04-28'),(118,2,'2014-04-28 Pedoman_WINEPSBED_2010.pdf','2014-04-28'),(120,1,'2016-11-03 BPJS-VA0001717566917.pdf','2016-11-03'),(121,252,'2016-11-03 BPJS-VA0001717566884.pdf','2016-11-03'),(122,253,'2016-11-03 BPJS-CARD0001717566884.pdf','2016-11-03');
/*!40000 ALTER TABLE `berkas_sertifikat` ENABLE KEYS */;

#
# Structure for table "field"
#

DROP TABLE IF EXISTS `field`;
CREATE TABLE `field` (
  `id_field` int(10) NOT NULL AUTO_INCREMENT,
  `nm_field` varchar(20) NOT NULL,
  PRIMARY KEY (`id_field`),
  KEY `nm_field` (`nm_field`),
  KEY `nm_field_2` (`nm_field`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

#
# Data for table "field"
#

/*!40000 ALTER TABLE `field` DISABLE KEYS */;
INSERT INTO `field` VALUES (1,'Assistant Director'),(2,'Finance & Accounting'),(3,'HRD'),(4,'General Affair'),(5,'Production I'),(6,'Production I'),(7,'Marketing');
/*!40000 ALTER TABLE `field` ENABLE KEYS */;

#
# Structure for table "fpemegang_kontrak"
#

DROP TABLE IF EXISTS `fpemegang_kontrak`;
CREATE TABLE `fpemegang_kontrak` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `fungsi` varchar(70) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `id_3` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

#
# Data for table "fpemegang_kontrak"
#

INSERT INTO `fpemegang_kontrak` VALUES (1,'ICT Asset 3'),(2,'Surface Facilities Asset 3'),(3,'SCM & GS Asset 3'),(4,'HSSE Asset 3'),(5,'WOWS Jatibarang'),(6,'RAM Jatibarang'),(7,'Onshore Jatibarang'),(8,'Offshore Jatibarang'),(9,'HSSE Jatibarang'),(10,'WOWS Subang'),(11,'Production Operation Subang'),(12,'HSSE Subang'),(13,'RAM Subang'),(14,'PE Tambun'),(15,'SCM Tambun'),(16,'HSSE Tambun');

#
# Structure for table "fungsi_kerja"
#

DROP TABLE IF EXISTS `fungsi_kerja`;
CREATE TABLE `fungsi_kerja` (
  `id_fkerja` int(30) NOT NULL AUTO_INCREMENT,
  `fkerja` varchar(70) NOT NULL,
  PRIMARY KEY (`id_fkerja`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "fungsi_kerja"
#

INSERT INTO `fungsi_kerja` VALUES (1,'Information And Technology'),(2,'Compensation And Benefit'),(3,'Industrial Relations'),(4,'Office Maintenace'),(5,'Purchasing');

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
  `sisa_gaji` double DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `hps` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

#
# Data for table "gaji"
#

INSERT INTO `gaji` VALUES (90,1,'11',1,2500000,1900000,'2016-11-30 13:38:52',0),(91,2,'11',NULL,NULL,NULL,NULL,0),(92,2,'11',NULL,NULL,NULL,NULL,0),(93,1,'11',1,2500000,2400000,'2016-11-30 16:02:21',0),(94,2,'11',NULL,NULL,NULL,NULL,0),(95,2,'11',1,2500000,2400000,'2016-11-28 09:59:04',0),(96,0,'11',NULL,NULL,NULL,NULL,0),(97,0,'11',NULL,NULL,NULL,NULL,0),(98,2,'11',NULL,NULL,NULL,NULL,0),(99,0,'11',NULL,NULL,NULL,NULL,0),(100,2,'11',NULL,NULL,NULL,NULL,0),(101,0,'11',NULL,NULL,NULL,NULL,0),(102,0,'11',NULL,NULL,NULL,NULL,0),(103,1,'11',1,2500000,2499000,'2016-11-28 13:42:57',0),(104,1,'11',1,2500000,2260000,'2016-11-28 14:17:49',0),(105,3,'11',NULL,NULL,NULL,NULL,0),(106,3,'11',2,3000000,2700000,'2016-11-30 13:09:52',0),(107,1,'12',1,2500000,2200000,'2016-12-06 08:55:43',0),(108,0,'12',NULL,NULL,NULL,NULL,1),(109,0,'12',NULL,NULL,NULL,NULL,1),(110,0,'12',NULL,NULL,NULL,NULL,1),(111,0,'12',NULL,NULL,NULL,NULL,1),(112,0,'12',NULL,NULL,NULL,NULL,1),(113,0,'12',NULL,NULL,NULL,NULL,1),(114,0,'12',NULL,NULL,NULL,NULL,1),(115,0,'12',NULL,NULL,NULL,NULL,1),(116,3,'12',NULL,NULL,NULL,NULL,0),(117,0,'12',NULL,NULL,NULL,NULL,1),(118,0,'12',NULL,NULL,NULL,NULL,1),(119,3,'12',NULL,NULL,NULL,NULL,0),(120,2,'12',NULL,NULL,NULL,NULL,0),(121,2,'12',NULL,NULL,NULL,NULL,0),(122,2,'12',NULL,NULL,NULL,NULL,0),(123,2,'12',NULL,NULL,NULL,NULL,0),(124,0,'12',NULL,NULL,NULL,NULL,1),(125,0,'12',NULL,NULL,NULL,NULL,1),(126,0,'12',NULL,NULL,NULL,NULL,1),(127,0,'12',NULL,NULL,NULL,NULL,1),(128,1,'12',NULL,NULL,NULL,NULL,0),(129,1,'12',NULL,NULL,NULL,NULL,0),(130,2,'12',NULL,NULL,NULL,NULL,0),(131,1,'12',NULL,NULL,NULL,NULL,0);

#
# Structure for table "history"
#

DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `id_his` bigint(200) NOT NULL AUTO_INCREMENT,
  `create_date` varchar(100) NOT NULL,
  `user` varchar(200) NOT NULL,
  `modul` varchar(100) NOT NULL,
  `data_awal` text NOT NULL,
  `data_akhir` text NOT NULL,
  `link` text NOT NULL,
  `ket` varchar(100) NOT NULL,
  `status_baca` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_his`)
) ENGINE=MyISAM AUTO_INCREMENT=259 DEFAULT CHARSET=latin1;

#
# Data for table "history"
#

/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (241,'2015-05-29','Admin HR Asset 3','PJP','--','PJP dengan nama :ABDUL  DJABIDI telah dirubah','http://localhost/granesia2/index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_update&index=229','Update PJP','N'),(242,'2015-05-31','Admin SDM','PJP','--','PJP dengan nama :AAS ASKURIH telah dirubah','http://localhost/granesia2/index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_update&index=70','Update PJP','N'),(243,'2015-06-01','Admin SDM','PJP','--','PJP dengan nama :Dadang S telah dirubah','http://localhost/granesia2/index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_update&index=452','Update PJP','N'),(244,'2016-11-01','Admin SDM','fungsi kerja','','fungsi kerja : Information And Technology','http://localhost/granesia2/index.php?tab=datatabel&folder=fungsi_kerja&file=fkerja_form_insert','insert data','N'),(245,'2016-11-01','Admin SDM','fungsi kerja','','fungsi kerja : Compensation And Benefit','http://localhost/granesia2/index.php?tab=datatabel&folder=fungsi_kerja&file=fkerja_form_insert','insert data','N'),(246,'2016-11-01','Admin SDM','fungsi kerja','','fungsi kerja : Industrial Relations','http://localhost/granesia2/index.php?tab=datatabel&folder=fungsi_kerja&file=fkerja_act_insert','insert data','N'),(247,'2016-11-01','Admin SDM','fungsi kerja','','fungsi kerja : Office Maintenace','http://localhost/granesia2/index.php?tab=datatabel&folder=fungsi_kerja&file=fkerja_act_insert','insert data','N'),(248,'2016-11-01','Admin SDM','fungsi kerja','','fungsi kerja : Purchasing','http://localhost/granesia2/index.php?tab=datatabel&folder=fungsi_kerja&file=fkerja_act_insert','insert data','N'),(249,'2016-11-02','Admin SDM','PJP','','Nama PJP : Yopi Rahman','http://localhost/granesia2/index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_insert','insert data','N'),(250,'2016-11-03','Admin SDM','PJP','--','PJP dengan nama :Yopi Rahman telah dirubah','http://localhost/granesia2/index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_update&index=1','Update PJP','N'),(251,'2016-11-03','Admin SDM','PJP','--','PJP dengan nama :Yopi Rahman telah dirubah','http://localhost/granesia2/index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_update&index=1','Update PJP','N'),(252,'2016-11-03','Admin SDM','PJP','','Nama PJP : Dian Berlina','http://localhost/granesia2/index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_insert','insert data','N'),(253,'2016-11-03','Admin SDM','PJP','','Nama PJP : Hendra Darmawan','http://localhost/granesia2/index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_insert','insert data','N'),(254,'2016-11-03','Admin SDM','PJP','--','PJP dengan nama :Yopi Rahman telah dirubah','http://localhost/granesia2/index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_update&index=1','Update PJP','N'),(255,'2016-11-07','Admin SDM','PJP','--','PJP dengan nama :Yopi Rahman telah dirubah','http://localhost/granesia2/index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_update&index=1','Update PJP','N'),(256,'2016-11-07','Admin SDM','PJP','--','PJP dengan nama :Yopi Rahman telah dirubah','http://localhost/granesia2/index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_update&index=1','Update PJP','N'),(257,'2016-11-08','Admin SDM','PJP','--','PJP dengan nama :Hendra Darmawan telah dirubah','http://localhost/granesia2/index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_update&index=3','Update PJP','N'),(258,'2016-11-08','Admin SDM','PJP','--','PJP dengan nama :Dian Berlina telah dirubah','http://localhost/granesia2/index.php?tab=datakaryawan&folder=karyawan&file=karyawan_form_update&index=2','Update PJP','N');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;

#
# Structure for table "klasifikasi"
#

DROP TABLE IF EXISTS `klasifikasi`;
CREATE TABLE `klasifikasi` (
  `id_klasifikasi` int(20) NOT NULL AUTO_INCREMENT,
  `klasifikasi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_klasifikasi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "klasifikasi"
#

INSERT INTO `klasifikasi` VALUES (1,'Pegawai Tetap'),(2,'Pegawai Kontrak'),(3,'Pegawai Outsourching');

#
# Structure for table "lembur"
#

DROP TABLE IF EXISTS `lembur`;
CREATE TABLE `lembur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) DEFAULT NULL,
  `periode` varchar(25) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `hps` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "lembur"
#

INSERT INTO `lembur` VALUES (1,1,'12','2016-12-06 09:52:22',0);

#
# Structure for table "link_terkait"
#

DROP TABLE IF EXISTS `link_terkait`;
CREATE TABLE `link_terkait` (
  `id_link` int(20) NOT NULL AUTO_INCREMENT,
  `tag_link` varchar(200) NOT NULL,
  `nama_link` varchar(50) NOT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

#
# Data for table "link_terkait"
#

/*!40000 ALTER TABLE `link_terkait` DISABLE KEYS */;
INSERT INTO `link_terkait` VALUES (4,'http://www.pertamina.com','Pertamina Pusat'),(11,'http://www.pertamina-ep.com','Pertamina EP');
/*!40000 ALTER TABLE `link_terkait` ENABLE KEYS */;

#
# Structure for table "lokasi_kerja"
#

DROP TABLE IF EXISTS `lokasi_kerja`;
CREATE TABLE `lokasi_kerja` (
  `id_lokasi` int(20) NOT NULL AUTO_INCREMENT,
  `lokasi` varchar(60) NOT NULL,
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "lokasi_kerja"
#

INSERT INTO `lokasi_kerja` VALUES (1,'Kantor Pusat (Soekarno Hatta)'),(2,'Kantor Cabang (Sekelimus)');

#
# Structure for table "no_po"
#

DROP TABLE IF EXISTS `no_po`;
CREATE TABLE `no_po` (
  `id_no_po` int(11) NOT NULL AUTO_INCREMENT,
  `no_po` varchar(200) NOT NULL,
  `judul_kontrak` varchar(500) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `id_fpemegang_kontrak` int(50) NOT NULL,
  `awal_kontrak` varchar(200) NOT NULL,
  `ahir_kontrak` varchar(200) NOT NULL,
  PRIMARY KEY (`id_no_po`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

#
# Data for table "no_po"
#

/*!40000 ALTER TABLE `no_po` DISABLE KEYS */;
INSERT INTO `no_po` VALUES (1,'3900205007','',2,4,'',''),(2,'1','',2,4,'',''),(3,'3900166657','',11,1,'',''),(4,'3900225223','',22,3,'',''),(5,'3900201090','',26,14,'',''),(6,'4650004161','',27,15,'',''),(7,'3900195411','',21,6,'',''),(8,'3900184797','',16,11,'',''),(9,'3900154034','',16,7,'',''),(10,'3900155842','',18,7,'',''),(11,'3900166819','',17,7,'',''),(12,'3900137907','',35,12,'',''),(13,'3900186164','',35,11,'',''),(14,'3900186583','',23,14,'',''),(15,'3900166915','',10,2,'',''),(16,'3900169169','',8,3,'',''),(17,'3900097806','',20,6,'',''),(18,'3900161927','',7,10,'',''),(19,'3900214798','',7,3,'',''),(20,'3900182263','',7,13,'',''),(21,'3900225222','',6,3,'',''),(22,'3900156642','',19,6,'',''),(23,'4650004075','',9,8,'',''),(24,'3900155832','',9,5,'',''),(25,'3900074303','',9,3,'',''),(26,'3900214309','',22,8,'',''),(27,'4650043424','',1,4,'',''),(28,'3900160010','',13,12,'',''),(29,'4650003927','',13,12,'',''),(30,'3900154045','',13,9,'',''),(31,'3900162144','',5,7,'',''),(32,'3900111850','',5,3,'',''),(33,'3900166236','',24,16,'',''),(34,'3900201397','',4,1,'',''),(35,'3900152269','',4,6,'',''),(36,'3900140262','',4,3,'',''),(37,'3900201432','',28,15,'',''),(38,'3900141843','',12,9,'','');
/*!40000 ALTER TABLE `no_po` ENABLE KEYS */;

#
# Structure for table "pdk_non_formal"
#

DROP TABLE IF EXISTS `pdk_non_formal`;
CREATE TABLE `pdk_non_formal` (
  `idp_non` int(10) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(10) NOT NULL,
  `t_pdk_non` varchar(50) NOT NULL,
  `d_pdk_non` text NOT NULL,
  PRIMARY KEY (`idp_non`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "pdk_non_formal"
#

INSERT INTO `pdk_non_formal` VALUES (1,1,'2000-2001','les b. inggris');

#
# Structure for table "pekerjaan"
#

DROP TABLE IF EXISTS `pekerjaan`;
CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(20) NOT NULL AUTO_INCREMENT,
  `nm_pekerjaan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "pekerjaan"
#


#
# Structure for table "pendidikan"
#

DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE `pendidikan` (
  `idp` int(4) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(20) NOT NULL,
  `t_pdk` varchar(20) NOT NULL,
  `d_pdk` text NOT NULL,
  PRIMARY KEY (`idp`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Data for table "pendidikan"
#

/*!40000 ALTER TABLE `pendidikan` DISABLE KEYS */;
INSERT INTO `pendidikan` VALUES (7,1,'2000-2006','sd tikukur3'),(9,2,'2006-2009','22222222222'),(10,2,'2000-2006','dddddddddddd'),(11,229,'1998-2004','sd tikukur');
/*!40000 ALTER TABLE `pendidikan` ENABLE KEYS */;

#
# Structure for table "penugasan"
#

DROP TABLE IF EXISTS `penugasan`;
CREATE TABLE `penugasan` (
  `id_penugasan` int(10) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(20) NOT NULL,
  `t_penugasan` varchar(20) NOT NULL,
  `d_penugasan` text NOT NULL,
  PRIMARY KEY (`id_penugasan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "penugasan"
#

INSERT INTO `penugasan` VALUES (1,229,'2000-2002','Sekelimus');

#
# Structure for table "perusahaan"
#

DROP TABLE IF EXISTS `perusahaan`;
CREATE TABLE `perusahaan` (
  `id_perusahaan` int(20) NOT NULL AUTO_INCREMENT,
  `nm_perusahaan` varchar(100) NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  PRIMARY KEY (`id_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

#
# Data for table "perusahaan"
#

INSERT INTO `perusahaan` VALUES (1,'PT. NUSAKURA3 STANDARINDO JO PT. RADIANT UTAMA INTERINSCO','Telp 6221 79181441 Fax +62217918144 JO 0231 - 224','nustar@nusakura.com JO finance-cirebon@radiant.co','MUTIARA BUILDING LT. 1 R 101 JL. MAMPANG PRAPATAN RAYA KAV 10 RT.003 MAMPANG PRAPATAN, Jakarta JO Jl. Raya Gunungjati 49/64 Cirebon'),(2,'PT G4S SECURITY SOLUTION SERVICES JO PT. G4S SECURITY SERVICES','08121088923','paulus.supino@id.g4s.com','Jl. Cilandak Commercial Estate Jakarta'),(4,'PT. TRIDAYA NUSANTARA','0818239311','nurwahidn@yahoo.o.id','Jl. Puri Kemuning Kav. E-49 Cirebon'),(5,'PT. RUNA CIREBON','0231 - 2512687','runacirebon@yahoo.com','Jl. Patra Raya Klayan Cirebon'),(6,'PT. KWARTA TEKNIK GEMILANG','0231 - 205803','kwarta_teknik@yahoo.com','Jl. Saputra II No. 27 Tuparev Cirebon'),(7,'PT. KRISNA DWIPA','0231 - 242137','krisna_dwipa_pt@yahoo.co.id','JL. Serbaguna Desa Adidarma No. 421 Cirebon'),(8,'PT. Insan Bhakti Lestari','081312255128','pt.insanbhakti@mail.com','Jl. Pilang Sari Endah A.36 Cirebon'),(9,'PT. METERINDO','0231 - 207319','metrindocirebon@yahoo.com','JL. YOS SUDARSO NO.19 CIREBON'),(10,'PT. GITA PERTIWI JO CV. AYUK MANDIRI','0231 - 242137','gita_pertiwi_pt@yahoo.co.id','Jl. Raya Balongan No. 11 Indramayu'),(11,'PT Malia Sari','0231 - 207319','maliasari@ymail.com','Jl. DR. Cipto Mangunkusumo No. 22 Cirebon'),(12,' PT. WITA JAYA SEMPURNA','0231 - 237895','witajayasempurna_pt@yahoo.com','Jl. Inspeksi PJKA No. 45/23 Cirebon'),(13,'PT. RADIANT UTAMA INTERINSCO','0231 - 224850','finance-cirebon@radiant.com','Jl. Raya Gunungjati 49/64 Cirebon'),(14,'PT.G4S Security Solution Services','08121088923','paulus.supino@id.g4s.com','Jl. Cilandak Commercial Estate Jakarta'),(16,'PT. Cipta Anugrah Sejahtera','0231 - 200053','pt_cipta_anugrah_sejahtera@yahoo.id','Kompl. Puri Celancang Blok C.1 No.1 Cirebon'),(17,'PT. DWI TUNGGAL PATRA PERSADA','0231 - 208901','dtpatrapersada@yahoo.com','JL. Prakarsa Muda No. 125 RT. 07 RW. 06 Cirebon'),(18,'PT. DIAN CITRA','085295563111','diancitra60@gmail.com','Pilangsari Endah Blok A 11, RT. 01 Cirebon'),(19,'PT. MEKAR SEMPURNA','0231 - 209469','ptmekar_sempurna@yahoo.co.id','JL. Raya Gunung Jati No. 04 Cirebon'),(20,'PT. KEMUNING','081222161001','ptkemuning@yahoo.co.id','Jl. Mahoni Raya L-14 GSP Cirebon'),(21,'PT Adikarya Utama Putra','0231 - 208175','adikaryautamaputra@yahoo.com','JL. DR. Cipto Mangunkusumo GG. Teratai No. 130 Cirebon'),(22,'PT. MIKAYO JAYA','0231 - 200053','mikayo_jaya@yahoo.co.id','Jl. Setrayasa 1 Blok B No.12 Cirebon'),(23,'PT. GITA PERTIWI','0231 - 242137','gita_pertiwi_pt@yahoo.co.id','Jl. Raya Balongan No. 11 Indramayu'),(24,'PT. Sucofindo','0231 - 242284','hermandj@sucofindo.co.id','Jl. Dr. Sudarsono No. 46 Cirebon'),(26,'PT RAFI FAMILI','0231 - 205803','rafi_famili@yahoo.com','Jl. Garuda No. 24 Tuparev Cirebon'),(27,'PT Surya Darma Perkasa (SDP)','021 - 56977708','operation@hartonorentcar.com','Jl. Daan Mogot KM 9 Jakarta'),(28,'PT. TUNAS LESTARI','0231 - 221599','pt_tunas_lestari@yahoo.co.id','Jl. Sutra Timur V Blok R V No. 5 Komplek Bukepin Cirebon'),(32,'PT. ANGGADA PERKASA ABADI','+622312512383;+62023','apa_crbn11@yahoo.co.id','JL. PATRA RAYA KLAYAN'),(33,'PT. Multikom Sarana Utama','Fax. +622188851217','msaku@indosat.net.id','Jl. Hibrida Raya 3 Blok CC-28 No. 9-10 Bekasi - 17'),(34,'PT. PRAMESTY WIJAYA MANDIRI','0231 8492882','pt.pramestywijaya@yahoo.co.id','PURI TAMAN SARIE E 116 RT.006/006 KARYAMULYA - KES'),(35,'PT. Dwika Parahyangan','-','-','-');

#
# Structure for table "picture"
#

DROP TABLE IF EXISTS `picture`;
CREATE TABLE `picture` (
  `id_gallery` int(3) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

#
# Data for table "picture"
#

/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
INSERT INTO `picture` VALUES (11,'20080606110529.jpg','2011-01-24','Pelatihan 2001'),(12,'computer_training_class.jpg','2011-01-24','Pelatihan 2002'),(13,'images.jpg','2011-01-24','Pelatihan 2003'),(14,'images.jpg','2011-01-24','Pelatihan 2004'),(15,'ppm1.jpg','2011-01-24','Pelatihan 2005'),(16,'pelatihan.jpeg','2011-01-24','Pelatihan 2006'),(17,'IMG_3008.jpg','2011-01-24','Pelatihan 2006'),(18,'mukteachingtmccbig.jpg','2011-01-24','Pelatihan 2007'),(20,'IMG_0126.jpg','2011-01-24','Pelatihan 2009'),(21,'pertamina2jpg.jpg','2014-01-10','Pertamina_gudang'),(23,'Logopertamina.jpg','2013-10-10','Logo Pertamina'),(24,'pertamina1.jpg','2014-02-11','Baksos'),(26,'pertamina1.jpg','2013-10-10','Bakti Sosial'),(27,'Pertamina2Asset3.jpg','2014-02-11','Fun Bike'),(28,'Pertamina4Asset3.jpg','2013-10-10','Logo Pertamina EP');
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;

#
# Structure for table "roles"
#

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "roles"
#

INSERT INTO `roles` VALUES (1,'Superadmin HR Pusat '),(2,'Admin 1'),(3,'Admin 2'),(5,'Admin 3'),(6,'Admin 4');

#
# Structure for table "sistem_kerja"
#

DROP TABLE IF EXISTS `sistem_kerja`;
CREATE TABLE `sistem_kerja` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `waktu` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "sistem_kerja"
#

INSERT INTO `sistem_kerja` VALUES (1,'Harian2'),(2,'shift'),(3,'Shift 2:1'),(4,'Shift 2:2');

#
# Structure for table "status_karyawan"
#

DROP TABLE IF EXISTS `status_karyawan`;
CREATE TABLE `status_karyawan` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(20) NOT NULL,
  `t_status` varchar(20) NOT NULL,
  `d_status` text NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "status_karyawan"
#

INSERT INTO `status_karyawan` VALUES (1,229,'1989-1999','Pegawai Kontrak');

#
# Structure for table "t_gapok"
#

DROP TABLE IF EXISTS `t_gapok`;
CREATE TABLE `t_gapok` (
  `id_gapok` int(11) NOT NULL AUTO_INCREMENT,
  `id_gol` int(11) DEFAULT NULL,
  `gapok` double DEFAULT NULL,
  PRIMARY KEY (`id_gapok`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "t_gapok"
#

INSERT INTO `t_gapok` VALUES (1,1,2500000),(2,2,3000000),(3,3,3500000);

#
# Structure for table "t_golongan"
#

DROP TABLE IF EXISTS `t_golongan`;
CREATE TABLE `t_golongan` (
  `id_gol` int(9) NOT NULL AUTO_INCREMENT,
  `nama_gol` varchar(25) NOT NULL,
  `jenis_gol` varchar(25) NOT NULL,
  PRIMARY KEY (`id_gol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "t_golongan"
#

INSERT INTO `t_golongan` VALUES (1,'Madya','II-A'),(2,'Madya Utama','II-B'),(3,'Madya Utama 2','II-C');

#
# Structure for table "t_jabatan"
#

DROP TABLE IF EXISTS `t_jabatan`;
CREATE TABLE `t_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_jabatan` varchar(50) DEFAULT NULL,
  `tunjab` double DEFAULT NULL,
  `tunkom` double DEFAULT NULL,
  `tuntak` double DEFAULT NULL,
  `tunkor` double DEFAULT NULL,
  `tum` double DEFAULT NULL,
  `tut` double DEFAULT NULL,
  `tun_lain` double DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "t_jabatan"
#

INSERT INTO `t_jabatan` VALUES (1,'Staff',0,0,0,50000,15000,10000,0),(2,'Supervisor',600000,100000,0,75000,20000,15000,0),(3,'Manager',1500000,150000,750000,150000,25000,20000,0);

#
# Structure for table "t_lem_karyawan"
#

DROP TABLE IF EXISTS `t_lem_karyawan`;
CREATE TABLE `t_lem_karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_gaji` int(11) DEFAULT NULL,
  `id_lembur` int(11) DEFAULT NULL,
  `jam_lembur` varchar(255) DEFAULT NULL,
  `nilai_lembur` double DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "t_lem_karyawan"
#


#
# Structure for table "t_lembur"
#

DROP TABLE IF EXISTS `t_lembur`;
CREATE TABLE `t_lembur` (
  `id_lembur` int(11) NOT NULL AUTO_INCREMENT,
  `nm_lembur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_lembur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "t_lembur"
#

INSERT INTO `t_lembur` VALUES (1,'Lembur Proyek Buku Kurtilas');

#
# Structure for table "t_pot_karyawan"
#

DROP TABLE IF EXISTS `t_pot_karyawan`;
CREATE TABLE `t_pot_karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_gaji` int(11) DEFAULT NULL,
  `id_potongan` int(11) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

#
# Data for table "t_pot_karyawan"
#

INSERT INTO `t_pot_karyawan` VALUES (19,79,1,200000,NULL),(20,79,2,200000,NULL),(21,79,3,200000,NULL),(22,79,4,200000,NULL),(23,79,2,200000,NULL),(24,79,1,200000,NULL),(25,79,4,200000,NULL),(26,80,1,100000,NULL),(28,80,1,100000,NULL),(29,80,3,100000,NULL),(30,80,4,100000,'hutang 1'),(31,81,1,100000,'test'),(32,81,2,200000,'test'),(37,81,3,100000,'test'),(38,82,1,100000,'lklk'),(39,83,1,500000,'testing'),(40,84,2,100000,'rrrrr'),(41,86,4,100000,'test 1'),(42,86,3,100000,'test 2'),(43,92,1,100000,'tes 1'),(44,92,2,100000,'tes 2'),(45,93,3,100000,'uhhuhu'),(46,94,2,100000,'tttt'),(47,95,1,100000,'gggggg'),(49,103,2,1000,'tttt'),(52,104,1,20000,'uiuiuiuiu'),(53,104,2,10000,'vbvbvbvbvb'),(54,104,3,210000,'vbvbvbvbvb'),(55,106,1,100000,'ukukukuk'),(56,106,2,200000,'ffffff'),(57,90,1,100000,'bbbnnnnnn'),(58,90,4,500000,'hhhhhh'),(59,107,2,100000,'tset'),(60,107,1,200000,'tset 3'),(61,131,1,100000,'test'),(85,131,3,100000,'jkjkj'),(86,131,3,100000,'jkjkj'),(87,128,3,100000,'mnmnmnmn'),(88,129,3,90000,'nknknknkn');

#
# Structure for table "t_potongan"
#

DROP TABLE IF EXISTS `t_potongan`;
CREATE TABLE `t_potongan` (
  `id_potongan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_potongan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_potongan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "t_potongan"
#

INSERT INTO `t_potongan` VALUES (1,'BPJS'),(2,'KOPKAR'),(3,'BANK'),(4,'Pinjaman Pribadi');

#
# Structure for table "t_tun_karyawan"
#

DROP TABLE IF EXISTS `t_tun_karyawan`;
CREATE TABLE `t_tun_karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_gaji` int(11) DEFAULT NULL,
  `id_tunjangan` int(11) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "t_tun_karyawan"
#

INSERT INTO `t_tun_karyawan` VALUES (1,116,1,90000,'test'),(2,116,4,100000,'yyy'),(3,107,3,300000,'Tum'),(4,107,4,200000,'Tut'),(5,128,3,500000,'tes'),(6,128,4,100000,'kkkmkm'),(7,129,3,200000,'kkkmkmkm');

#
# Structure for table "t_tunjangan"
#

DROP TABLE IF EXISTS `t_tunjangan`;
CREATE TABLE `t_tunjangan` (
  `id_tunjangan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tunjangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_tunjangan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "t_tunjangan"
#

INSERT INTO `t_tunjangan` VALUES (1,'Tunjangan Jabatan'),(2,'Tunjangan Komunikasi'),(3,'Tunjangan Uang Makan'),(4,'Tunjangan Transportasi'),(5,'Tunjangan Koran'),(6,'Tunjangan Lainnya');

#
# Structure for table "tb_pend_akhir"
#

DROP TABLE IF EXISTS `tb_pend_akhir`;
CREATE TABLE `tb_pend_akhir` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `pend_akhir` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "tb_pend_akhir"
#

INSERT INTO `tb_pend_akhir` VALUES (1,'S2'),(2,'S1'),(3,'D3'),(4,'D1'),(5,'SMK / SMA'),(6,'SMP / SLTP'),(7,'SD');

#
# Structure for table "tkjp"
#

DROP TABLE IF EXISTS `tkjp`;
CREATE TABLE `tkjp` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(200) NOT NULL,
  `nm_lengkap` varchar(150) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `no_ktp` varchar(180) NOT NULL,
  `no_npwp` varchar(180) NOT NULL,
  `no_jamsostek` varchar(180) NOT NULL,
  `bank_payroll` varchar(200) NOT NULL,
  `no_rek_payroll` varchar(180) NOT NULL,
  `tmp_lahir` varchar(130) NOT NULL,
  `tgl_lahir` varchar(100) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `nm_pekerjaan` varchar(180) NOT NULL DEFAULT '',
  `id_jabatan` int(11) NOT NULL DEFAULT '0',
  `id_gol` int(11) NOT NULL DEFAULT '0',
  `id_gapok` int(11) NOT NULL DEFAULT '0',
  `id_klasifikasi` int(100) NOT NULL,
  `id_fkerja` int(100) NOT NULL,
  `id_field` int(100) NOT NULL,
  `id_lks_kerja` int(100) NOT NULL,
  `id_sistem_kerja` int(100) NOT NULL,
  `tmt` varchar(200) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `tanggal_dibuat` varchar(200) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "tkjp"
#

INSERT INTO `tkjp` VALUES (1,'160010011','Yopi Rahman','2016-11-03-Chrysanthemum.jpg','32722200010022','0977777777','099888888','BRI 3','09991888','Bandung','1988-11-21','Cibeunying I no 33','Staff IT 3',1,1,1,1,1,1,1,1,'2014-01-01','aktif','Admin SDM','2016-11-02'),(2,'900909090','Dian Berlina','noimage.jpg','89898989898','909090909','8989898989','BRI','909090909','Banjar','1989-01-01','Banjar','Sekertaris Direksi',1,1,1,2,2,1,1,1,'2014-01-01','aktif','Admin SDM','2016-11-03'),(3,'17671676','Hendra Darmawan','2016-11-03-Koala.jpg','176176176','176176176','1761761','BRI','87878787','Bandung','1978-07-18','Kopo','Legal',1,2,2,1,5,1,1,1,'2014-01-01','aktif','Admin SDM','2016-11-03');

#
# Structure for table "tools_gallery"
#

DROP TABLE IF EXISTS `tools_gallery`;
CREATE TABLE `tools_gallery` (
  `id_gallery` int(3) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(200) NOT NULL,
  `bullets` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;

#
# Data for table "tools_gallery"
#

/*!40000 ALTER TABLE `tools_gallery` DISABLE KEYS */;
INSERT INTO `tools_gallery` VALUES (109,'Pertamina4Asset3.jpg','','Logo Pertamina EP'),(110,'Pertamina5Asset3.jpg','','Pintu Gerbang Pertamina EP Asset 3 Cirebon'),(111,'Alatberat.jpg','','Alat Berat'),(112,'Alatberat2.jpg','','Alat Berat 2'),(113,'CleaningService.jpg','','Cleaning Service'),(114,'CustomerService.jpg','','Customer Service'),(115,'Driver.jpg','','Driver'),(116,'Driver2.jpg','','Driver 2'),(117,'PetugasKeamanan.jpg','','Petugas Keamanan');
/*!40000 ALTER TABLE `tools_gallery` ENABLE KEYS */;

#
# Structure for table "tunjangan"
#

DROP TABLE IF EXISTS `tunjangan`;
CREATE TABLE `tunjangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) DEFAULT NULL,
  `periode` varchar(25) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `hps` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

#
# Data for table "tunjangan"
#

INSERT INTO `tunjangan` VALUES (1,0,'12',NULL,0),(2,0,'12',NULL,0),(3,0,'12',NULL,1),(4,0,'12',NULL,1),(5,0,'12',NULL,0),(6,0,'12',NULL,0),(7,0,'12',NULL,0),(8,0,'12',NULL,0),(9,0,'12',NULL,0),(10,0,'12',NULL,0),(11,0,'12',NULL,0),(12,3,'12',NULL,1),(13,0,'12',NULL,0),(14,0,'12',NULL,0),(15,0,'12',NULL,0),(16,0,'12',NULL,0),(17,0,'12',NULL,0),(18,0,'12',NULL,1),(19,3,'12',NULL,0),(107,1,'12','2016-12-06 09:52:22',0);

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `no` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `level` enum('superadmin','user') NOT NULL,
  `jenis_kelamin` enum('laki - laki','perempuan') NOT NULL,
  `email` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `no_kontak` varchar(150) NOT NULL,
  `tgl_lahir` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `oleh` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (81,'admin','ee11cbb19052e40b07aac0ca060c23ee',1,'Admin SDM','SDM','superadmin','laki - laki','','','','','','E_it Solutions','2014-04-14','','aktif'),(87,'adminbaru','dbcddd2b55ec5b104a2a1a64b8707d4a',3,'coba admin','HR','superadmin','laki - laki','','','','','','Admin HRD Pusat','2014-04-23','noimage.jpg','aktif'),(89,'dimas@gmail.com','827ccb0eea8a706c4c34a16891f84e7b',2,'Dimas Setio','Senior HR','superadmin','laki - laki','dimas.setio@gmail.com','klayan cirebon','08989879898','1988-05-04','Bandung','Admin HR Asset 3','2014-05-04','noimage.jpg','aktif'),(90,'budi@gmail.com','827ccb0eea8a706c4c34a16891f84e7b',5,'Budiman','Senior Keuangan','superadmin','laki - laki','budiman@gmail.com','klayan cirebon','08979898988','1987-05-04','bandung','Admin HR Asset 3','2014-05-04','noimage.jpg','aktif');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
