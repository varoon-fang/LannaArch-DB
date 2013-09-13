#
# TABLE STRUCTURE FOR: 3d
#

DROP TABLE IF EXISTS 3d;

CREATE TABLE `3d` (
  `3d_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `3d_title` varchar(255) DEFAULT '',
  `3d_detail` text,
  `3d_date` datetime DEFAULT NULL,
  PRIMARY KEY (`3d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: 3d_album
#

DROP TABLE IF EXISTS 3d_album;

CREATE TABLE `3d_album` (
  `3d_album_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `3d_album_name` varchar(255) DEFAULT '',
  `3d_album_num` int(3) DEFAULT NULL,
  `3d_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`3d_album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

INSERT INTO 3d_album (`3d_album_id`, `3d_album_name`, `3d_album_num`, `3d_id`) VALUES (49, '1e853c5e2c689ed05002e66b48360d66.jpg', 1, 13);
INSERT INTO 3d_album (`3d_album_id`, `3d_album_name`, `3d_album_num`, `3d_id`) VALUES (50, '5d7640285d979215ecf8b9d32a31c751.jpg', 2, 13);
INSERT INTO 3d_album (`3d_album_id`, `3d_album_name`, `3d_album_num`, `3d_id`) VALUES (51, '9ddf28ac74597dc347ccf5a3a2b3a116.jpg', 3, 13);
INSERT INTO 3d_album (`3d_album_id`, `3d_album_name`, `3d_album_num`, `3d_id`) VALUES (52, 'a69bdfc39669a1c94f13b3c0a54919bd.jpg', 4, 13);
INSERT INTO 3d_album (`3d_album_id`, `3d_album_name`, `3d_album_num`, `3d_id`) VALUES (53, '658fd9cc5dea262e6e68335973cbfa28.jpg', 5, 13);
INSERT INTO 3d_album (`3d_album_id`, `3d_album_name`, `3d_album_num`, `3d_id`) VALUES (54, '0d5571adce047c8869180383f47afade.jpg', 6, 13);
INSERT INTO 3d_album (`3d_album_id`, `3d_album_name`, `3d_album_num`, `3d_id`) VALUES (55, '62293fbff3960c5e6b2e2598b1a955bd.jpg', 1, 14);
INSERT INTO 3d_album (`3d_album_id`, `3d_album_name`, `3d_album_num`, `3d_id`) VALUES (56, '7d6904e85382e2258fbea513e3c1460c.png', 2, 14);
INSERT INTO 3d_album (`3d_album_id`, `3d_album_name`, `3d_album_num`, `3d_id`) VALUES (57, '30d670e052bf427b115a2172b53eb2d4.jpg', 1, 15);
INSERT INTO 3d_album (`3d_album_id`, `3d_album_name`, `3d_album_num`, `3d_id`) VALUES (58, 'a6881aa1c0335a76f5851299272b749b.png', 1, 16);


#
# TABLE STRUCTURE FOR: activity
#

DROP TABLE IF EXISTS activity;

CREATE TABLE `activity` (
  `activity_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `activity_group` int(5) DEFAULT NULL,
  `activity_title` varchar(255) DEFAULT NULL,
  `activity_detail` text,
  `activity_date` datetime DEFAULT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO activity (`activity_id`, `activity_group`, `activity_title`, `activity_detail`, `activity_date`) VALUES (1, 15, 'Nullam', '<p>Nullam quis risus eget urna mollis ornare vel eu leo. Sed posuere consectetur est at lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\n', '2013-09-12 14:35:02');
INSERT INTO activity (`activity_id`, `activity_group`, `activity_title`, `activity_detail`, `activity_date`) VALUES (2, 14, 'Condimentum Consectetur', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>\n', '2013-09-13 21:38:16');


#
# TABLE STRUCTURE FOR: activity_album
#

DROP TABLE IF EXISTS activity_album;

CREATE TABLE `activity_album` (
  `activity_album_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `activity_album_name` varchar(255) DEFAULT '',
  `activity_album_num` int(3) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`activity_album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

INSERT INTO activity_album (`activity_album_id`, `activity_album_name`, `activity_album_num`, `activity_id`) VALUES (32, '5d6f93e2e82be19d324e4b05cce4d18b.png', 1, 1);
INSERT INTO activity_album (`activity_album_id`, `activity_album_name`, `activity_album_num`, `activity_id`) VALUES (33, '2874fe4ad46ec7f802980c3e78f59407.png', 2, 1);
INSERT INTO activity_album (`activity_album_id`, `activity_album_name`, `activity_album_num`, `activity_id`) VALUES (34, '8cf4ba2d3c60780afe737b494bda5ae2.jpg', 1, 2);
INSERT INTO activity_album (`activity_album_id`, `activity_album_name`, `activity_album_num`, `activity_id`) VALUES (35, '403308c501254331e6990f61fc2431a4.jpg', 2, 2);
INSERT INTO activity_album (`activity_album_id`, `activity_album_name`, `activity_album_num`, `activity_id`) VALUES (36, '222d05152fde2882e936dc25c64e8477.jpg', 3, 2);
INSERT INTO activity_album (`activity_album_id`, `activity_album_name`, `activity_album_num`, `activity_id`) VALUES (37, '7e5b9aff08f301240140abd0d6050598.jpg', 4, 2);


#
# TABLE STRUCTURE FOR: activity_group
#

DROP TABLE IF EXISTS activity_group;

CREATE TABLE `activity_group` (
  `activity_group_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `activity_group_name` varchar(255) DEFAULT '',
  PRIMARY KEY (`activity_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO activity_group (`activity_group_id`, `activity_group_name`) VALUES (14, 'กิจกรรมกลางแจ้ง');
INSERT INTO activity_group (`activity_group_id`, `activity_group_name`) VALUES (15, 'กิจกรรมนันทนาการ');


#
# TABLE STRUCTURE FOR: admin
#

DROP TABLE IF EXISTS admin;

CREATE TABLE `admin` (
  `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(255) DEFAULT NULL,
  `admin_pass` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_type` enum('admin','user') DEFAULT 'user',
  `admin_status` enum('yes','no') DEFAULT 'no',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO admin (`admin_id`, `admin_user`, `admin_pass`, `admin_email`, `admin_type`, `admin_status`) VALUES (1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'vrn.fang@gmail.com', 'admin', 'yes');
INSERT INTO admin (`admin_id`, `admin_user`, `admin_pass`, `admin_email`, `admin_type`, `admin_status`) VALUES (2, 'varoon', '0b527ad35a7983fa5c9abdf31825c3cb', 'fang@rgb7.com', 'user', 'yes');


#
# TABLE STRUCTURE FOR: arch
#

DROP TABLE IF EXISTS arch;

CREATE TABLE `arch` (
  `arch_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `arch_title` varchar(255) DEFAULT '',
  `arch_detail` text,
  `arch_writer` varchar(255) DEFAULT '',
  `arch_date` datetime DEFAULT NULL,
  PRIMARY KEY (`arch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: banner_head
#

DROP TABLE IF EXISTS banner_head;

CREATE TABLE `banner_head` (
  `banner_head_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_head_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`banner_head_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO banner_head (`banner_head_id`, `banner_head_name`) VALUES (4, '781d6301f5b811d3f157b0b59e6b8422.jpg');
INSERT INTO banner_head (`banner_head_id`, `banner_head_name`) VALUES (5, '33d9f938a995263e03ccc6f2b601fadd.jpg');
INSERT INTO banner_head (`banner_head_id`, `banner_head_name`) VALUES (6, 'd082d855477f6adceffb4068d9119c7d.jpg');


#
# TABLE STRUCTURE FOR: ebook
#

DROP TABLE IF EXISTS ebook;

CREATE TABLE `ebook` (
  `ebook_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ebook_group` int(5) DEFAULT NULL,
  `ebook_title` varchar(255) DEFAULT '',
  `ebook_major` varchar(255) DEFAULT '',
  `ebook_researcher` varchar(255) DEFAULT '',
  `ebook_research_year` varchar(255) DEFAULT '',
  `ebook_example` varchar(255) DEFAULT NULL,
  `ebook_pdf` varchar(255) DEFAULT '',
  `ebook_date` datetime DEFAULT NULL,
  PRIMARY KEY (`ebook_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO ebook (`ebook_id`, `ebook_group`, `ebook_title`, `ebook_major`, `ebook_researcher`, `ebook_research_year`, `ebook_example`, `ebook_pdf`, `ebook_date`) VALUES (1, 4, 'Ornare Cursus', 'Ornare Cursus', 'Ornare Cursus', '2012', 'f95259b856681bd8a7ca26890360a06e.pdf', 'd3f038085a593128a82d96f618715153.pdf', '2013-09-13 21:41:23');
INSERT INTO ebook (`ebook_id`, `ebook_group`, `ebook_title`, `ebook_major`, `ebook_researcher`, `ebook_research_year`, `ebook_example`, `ebook_pdf`, `ebook_date`) VALUES (2, 3, 'Egestas Mattis', 'Egestas Mattis', 'Egestas Mattis', '2011', '7bb55f2a86222d938d4d0178adf8fc21.pdf', 'c82c2db4fd26c0a02ce55c0499644145.pdf', '2013-09-13 21:43:13');


#
# TABLE STRUCTURE FOR: ebook_album
#

DROP TABLE IF EXISTS ebook_album;

CREATE TABLE `ebook_album` (
  `ebook_album_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ebook_album_name` varchar(255) DEFAULT NULL,
  `ebook_album_num` int(3) DEFAULT NULL,
  `ebook_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ebook_album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (1, '8446f102c909c65eea6fcea14d14f1f6.jpg', 1, 1);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (2, 'ca26dd029cf9811fe42371420aa86641.jpg', 2, 1);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (3, 'c7e1d5c9e9f70a7162c6c0ade8a0dea5.jpg', 3, 1);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (4, 'd4bd7010f64ad89cc472f47bf127c9b0.jpg', 4, 1);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (5, 'f9245fa74632e1faeb4f2c2478899d23.jpg', 5, 1);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (6, '492f7d4cee69c2ec2c39246155384a1d.jpg', 6, 1);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (7, '73ef2da867c1f2dd43e2230cc4829e14.jpg', 7, 1);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (8, '3638365a52ea181fac2451ec025a9bd4.jpg', 8, 1);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (9, 'f2f63766e7d3d9d2ceff3e8b518f9a1b.jpg', 9, 1);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (10, 'a5c35f0bab27a0820e83163766b5eb20.jpg', 10, 1);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (11, '75201dfc1ad87000acbc4c272048ff6e.jpg', 1, 2);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (12, '2e84106169c239be09978962d9e78f78.jpg', 2, 2);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (13, 'a36635e662c46d046e4c01a08eb295b3.jpg', 3, 2);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (14, 'c4768876ef442960e6d29e23042d892f.jpg', 4, 2);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (15, '201399cf391fca276ac2d46fab5711ff.jpg', 5, 2);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (16, '61e7cff0631cfbd4565f38f14771c50d.jpg', 6, 2);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (17, '0eaf32c13dd98e1413aa527c47924dca.jpg', 7, 2);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (18, 'd040db5de16e9c578c7b570d473cf3eb.jpg', 8, 2);
INSERT INTO ebook_album (`ebook_album_id`, `ebook_album_name`, `ebook_album_num`, `ebook_id`) VALUES (19, '3b6c76bafdfe46f94730084f77d6c97f.jpg', 9, 2);


#
# TABLE STRUCTURE FOR: ebook_group
#

DROP TABLE IF EXISTS ebook_group;

CREATE TABLE `ebook_group` (
  `ebook_group_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ebook_group_name` varchar(255) DEFAULT '',
  PRIMARY KEY (`ebook_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO ebook_group (`ebook_group_id`, `ebook_group_name`) VALUES (3, 'หนังสือทั่วไป');
INSERT INTO ebook_group (`ebook_group_id`, `ebook_group_name`) VALUES (4, 'หนังสือวิจัย');


#
# TABLE STRUCTURE FOR: gallery
#

DROP TABLE IF EXISTS gallery;

CREATE TABLE `gallery` (
  `gallery_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_group` int(5) DEFAULT NULL,
  `gallery_title` varchar(255) DEFAULT '',
  `gallery_from` varchar(255) DEFAULT NULL,
  `gallery_date` datetime DEFAULT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO gallery (`gallery_id`, `gallery_group`, `gallery_title`, `gallery_from`, `gallery_date`) VALUES (1, 3, 'Consectetur', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla. Nullam quis risus eget urna mollis ornare vel eu leo. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.', '2013-09-13 21:38:56');
INSERT INTO gallery (`gallery_id`, `gallery_group`, `gallery_title`, `gallery_from`, `gallery_date`) VALUES (2, 4, 'Condimentum Consectetur', 'Curabitur blandit tempus porttitor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Aenean lacinia bibendum nulla sed consectetur. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam id dolo', '2013-09-13 21:39:22');
INSERT INTO gallery (`gallery_id`, `gallery_group`, `gallery_title`, `gallery_from`, `gallery_date`) VALUES (3, 3, 'Etiam porta sem malesuada magna mollis euismod.', 'Etiam porta sem malesuada magna mollis euismod.', '2013-09-13 21:39:51');


#
# TABLE STRUCTURE FOR: gallery_album
#

DROP TABLE IF EXISTS gallery_album;

CREATE TABLE `gallery_album` (
  `gallery_album_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_album_name` varchar(255) DEFAULT NULL,
  `gallery_album_num` int(3) DEFAULT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`gallery_album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

INSERT INTO gallery_album (`gallery_album_id`, `gallery_album_name`, `gallery_album_num`, `gallery_id`) VALUES (7, '743242f5627e05f93394e0ba8c4ead77.jpg', 5, 5);
INSERT INTO gallery_album (`gallery_album_id`, `gallery_album_name`, `gallery_album_num`, `gallery_id`) VALUES (8, '5805ef16b0d714a688ae3715a2b0101a.jpg', 6, 5);
INSERT INTO gallery_album (`gallery_album_id`, `gallery_album_name`, `gallery_album_num`, `gallery_id`) VALUES (9, '4e6c61eb4380d43004be50a03a6a95de.jpg', 7, 5);
INSERT INTO gallery_album (`gallery_album_id`, `gallery_album_name`, `gallery_album_num`, `gallery_id`) VALUES (10, NULL, NULL, 0);
INSERT INTO gallery_album (`gallery_album_id`, `gallery_album_name`, `gallery_album_num`, `gallery_id`) VALUES (11, NULL, NULL, 0);
INSERT INTO gallery_album (`gallery_album_id`, `gallery_album_name`, `gallery_album_num`, `gallery_id`) VALUES (12, NULL, NULL, 0);
INSERT INTO gallery_album (`gallery_album_id`, `gallery_album_name`, `gallery_album_num`, `gallery_id`) VALUES (13, NULL, NULL, 0);
INSERT INTO gallery_album (`gallery_album_id`, `gallery_album_name`, `gallery_album_num`, `gallery_id`) VALUES (14, '23eb243ffcf1c6d6624c2242f4075d10.png', 1, 6);
INSERT INTO gallery_album (`gallery_album_id`, `gallery_album_name`, `gallery_album_num`, `gallery_id`) VALUES (15, 'df157c944b83c08af7b03070d4ec431a.png', 2, 6);
INSERT INTO gallery_album (`gallery_album_id`, `gallery_album_name`, `gallery_album_num`, `gallery_id`) VALUES (16, '93fb0e040a6cc65c2353eb6a8f7c567a.jpg', 1, 1);
INSERT INTO gallery_album (`gallery_album_id`, `gallery_album_name`, `gallery_album_num`, `gallery_id`) VALUES (17, '455c1f8605c626be337e6cd9716929c9.jpg', 2, 1);
INSERT INTO gallery_album (`gallery_album_id`, `gallery_album_name`, `gallery_album_num`, `gallery_id`) VALUES (18, '802b4ce501ef2a6e40e8b2f1cfcf1d83.JPG', 3, 1);
INSERT INTO gallery_album (`gallery_album_id`, `gallery_album_name`, `gallery_album_num`, `gallery_id`) VALUES (19, '11fb7d091e47de2be9fb494c7d7bdff9.jpg', 1, 2);
INSERT INTO gallery_album (`gallery_album_id`, `gallery_album_name`, `gallery_album_num`, `gallery_id`) VALUES (20, 'ea8ccc1fef3ba800135962044978f413.jpg', 2, 2);
INSERT INTO gallery_album (`gallery_album_id`, `gallery_album_name`, `gallery_album_num`, `gallery_id`) VALUES (22, 'aca6379c4c619af0dcbf26b920b6218b.jpg', 2, 3);
INSERT INTO gallery_album (`gallery_album_id`, `gallery_album_name`, `gallery_album_num`, `gallery_id`) VALUES (23, '7063c20fc6c3f0764e197064b816b1b8.jpg', 3, 3);


#
# TABLE STRUCTURE FOR: gallery_group
#

DROP TABLE IF EXISTS gallery_group;

CREATE TABLE `gallery_group` (
  `gallery_group_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_group_name` varchar(255) DEFAULT '',
  PRIMARY KEY (`gallery_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO gallery_group (`gallery_group_id`, `gallery_group_name`) VALUES (3, 'ห้องภาพทั่วไป');
INSERT INTO gallery_group (`gallery_group_id`, `gallery_group_name`) VALUES (4, 'ห้องภาพสถาปัตยกรรม');


#
# TABLE STRUCTURE FOR: information
#

DROP TABLE IF EXISTS information;

CREATE TABLE `information` (
  `information_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `information_group` int(5) DEFAULT NULL,
  `information_title` varchar(255) DEFAULT NULL,
  `information_detail` text,
  `information_date` datetime DEFAULT NULL,
  PRIMARY KEY (`information_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: information_album
#

DROP TABLE IF EXISTS information_album;

CREATE TABLE `information_album` (
  `information_album_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `information_album_name` varchar(255) DEFAULT NULL,
  `information_album_num` int(3) DEFAULT NULL,
  `information_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`information_album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO information_album (`information_album_id`, `information_album_name`, `information_album_num`, `information_id`) VALUES (5, '148c4936b3096d21d92e3939817bb79b.png', 1, 4);
INSERT INTO information_album (`information_album_id`, `information_album_name`, `information_album_num`, `information_id`) VALUES (6, 'feb8c48ee4a2ed0a8b0d8e9013573d54.png', 2, 4);


#
# TABLE STRUCTURE FOR: information_group
#

DROP TABLE IF EXISTS information_group;

CREATE TABLE `information_group` (
  `information_group_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `information_group_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`information_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO information_group (`information_group_id`, `information_group_name`) VALUES (1, 'ข้อมูลทั่วไป 11');
INSERT INTO information_group (`information_group_id`, `information_group_name`) VALUES (3, 'ข้อมูลทั่วไป 12');


#
# TABLE STRUCTURE FOR: layout_album
#

DROP TABLE IF EXISTS layout_album;

CREATE TABLE `layout_album` (
  `layout_album_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `layout_album_name` varchar(255) DEFAULT NULL,
  `layout_album_num` int(3) DEFAULT NULL,
  `layout_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`layout_album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO layout_album (`layout_album_id`, `layout_album_name`, `layout_album_num`, `layout_id`) VALUES (5, '34dda8d3344e5fc5f347ae8979225c9f.jpg', 1, 4);


#
# TABLE STRUCTURE FOR: layout_arch
#

DROP TABLE IF EXISTS layout_arch;

CREATE TABLE `layout_arch` (
  `layout_id` int(11) NOT NULL AUTO_INCREMENT,
  `layout_group` int(5) DEFAULT NULL,
  `layout_title` varchar(255) DEFAULT NULL,
  `layout_detail` text,
  `layout_writer` varchar(255) DEFAULT NULL,
  `layout_date` datetime DEFAULT NULL,
  PRIMARY KEY (`layout_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: layout_group
#

DROP TABLE IF EXISTS layout_group;

CREATE TABLE `layout_group` (
  `layout_group_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `layout_group_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`layout_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO layout_group (`layout_group_id`, `layout_group_name`) VALUES (1, 'แบบ 11');
INSERT INTO layout_group (`layout_group_id`, `layout_group_name`) VALUES (2, 'แบบ 12');


#
# TABLE STRUCTURE FOR: logfile
#

DROP TABLE IF EXISTS logfile;

CREATE TABLE `logfile` (
  `log_activity` varchar(255) DEFAULT NULL,
  `log_detail` text,
  `log_ip` varchar(255) DEFAULT NULL,
  `log_date` datetime DEFAULT NULL,
  `log_member` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1376897711', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-19 09:35:11', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1376897950', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-19 09:39:10', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1376899549', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-19 10:05:49', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1376901435', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-19 10:37:15', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1376920310', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-19 15:51:50', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1376922109', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-19 16:21:49', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1376922139', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-19 16:22:19', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1376970107', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-20 05:41:47', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1376970324', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-20 05:45:24', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1376980489', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-20 08:34:49', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1377075548', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-21 10:59:08', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1377078604', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-21 11:50:04', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1377078694', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-21 11:51:34', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1377078717', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-21 11:51:57', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1377078810', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-21 11:53:30', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1377078825', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-21 11:53:45', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1377165819', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-22 12:03:39', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1377608240', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-27 14:57:20', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1377610325', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-27 15:32:05', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1377660039', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-28 05:20:39', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1377679493', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-28 10:44:53', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1377758404', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-29 08:40:04', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1377836123', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-30 06:15:23', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1377837344', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-30 06:35:44', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1377844222', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-30 08:30:22', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1377929235', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-08-31 08:07:15', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378095625', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-02 06:20:25', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378095964', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-02 06:26:04', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378096067', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-02 06:27:47', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378097256', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-02 06:47:36', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378097299', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-02 06:48:19', 'varoon');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378101566', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-02 07:59:26', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378102051', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36', '::1', '2013-09-02 08:07:31', 'varoon');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378102664', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36', '::1', '2013-09-02 08:17:44', 'varoon');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378102835', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36', '::1', '2013-09-02 08:20:35', 'varoon');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378103077', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36', '::1', '2013-09-02 08:24:37', 'varoon');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378178464', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-03 10:21:04', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378189229', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/536.30.1 (KHTML, like Gecko) Version/6.0.5 Safari/536.30.1', '::1', '2013-09-03 13:20:29', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378195346', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-03 15:02:26', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378286814', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-04 16:26:54', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378288339', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36', '::1', '2013-09-04 16:52:19', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378789165', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-10 11:59:25', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378880783', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-11 13:26:23', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378967047', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-12 13:24:07', 'fang');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1378971282', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-12 14:34:42', 'admin');
INSERT INTO logfile (`log_activity`, `log_detail`, `log_ip`, `log_date`, `log_member`) VALUES ('1379083014', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:23.0) Gecko/20100101 Firefox/23.0', '::1', '2013-09-13 21:36:54', 'admin');


#
# TABLE STRUCTURE FOR: models
#

DROP TABLE IF EXISTS models;

CREATE TABLE `models` (
  `models_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `models_title` varchar(255) DEFAULT NULL,
  `models_detail` text,
  `models_date` datetime DEFAULT NULL,
  PRIMARY KEY (`models_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: models_album
#

DROP TABLE IF EXISTS models_album;

CREATE TABLE `models_album` (
  `models_album_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `models_album_name` varchar(255) DEFAULT NULL,
  `models_album_num` int(3) DEFAULT NULL,
  `models_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`models_album_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO models_album (`models_album_id`, `models_album_name`, `models_album_num`, `models_id`) VALUES (1, '2feaac14200eab2c4254960bcd6f4e1d.jpg', 1, 1);
INSERT INTO models_album (`models_album_id`, `models_album_name`, `models_album_num`, `models_id`) VALUES (2, '24bbfb384b6ba5736e33c6898dddd3fb.jpg', 2, 1);
INSERT INTO models_album (`models_album_id`, `models_album_name`, `models_album_num`, `models_id`) VALUES (4, '3522393fe085e886e254b47579acdb18.jpg', 1, 2);
INSERT INTO models_album (`models_album_id`, `models_album_name`, `models_album_num`, `models_id`) VALUES (5, '40ad457805956b81126acb7fcd642c32.jpg', 1, 3);
INSERT INTO models_album (`models_album_id`, `models_album_name`, `models_album_num`, `models_id`) VALUES (6, '8d5221b7dbf9b1bcb979e426a174164b.png', 1, 4);
INSERT INTO models_album (`models_album_id`, `models_album_name`, `models_album_num`, `models_id`) VALUES (7, '3855631c67ebf8af0037da8970367366.jpg', 1, 5);


#
# TABLE STRUCTURE FOR: template
#

DROP TABLE IF EXISTS template;

CREATE TABLE `template` (
  `temp_id` int(11) NOT NULL AUTO_INCREMENT,
  `temp_name` varchar(255) DEFAULT NULL,
  `temp_img` varchar(255) DEFAULT NULL,
  `temp_status` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`temp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO template (`temp_id`, `temp_name`, `temp_img`, `temp_status`) VALUES (1, 'lanna-1.css', 'lanna-1.jpg', 'no');
INSERT INTO template (`temp_id`, `temp_name`, `temp_img`, `temp_status`) VALUES (2, 'lanna-2.css', 'lanna-2.jpg', 'yes');
INSERT INTO template (`temp_id`, `temp_name`, `temp_img`, `temp_status`) VALUES (3, 'lanna-3.css', 'lanna-3.jpg', 'no');
INSERT INTO template (`temp_id`, `temp_name`, `temp_img`, `temp_status`) VALUES (4, 'lanna-4.jpg', 'lanna-4.jpg', 'no');


