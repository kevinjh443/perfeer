
/* create databse */
CREATE DATABASE IF NOT EXISTS perfeer DEFAULT CHARSET utf8 COLLATE utf8_general_ci;

/* create all tables and init all tables*/
CREATE TABLE `test_project_type` (
`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '测试类型ID' ,
`test_name`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'Antutu' COMMENT '测试项目的名称' ,
`test_type`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '测试项目类型' ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1
CHECKSUM=0
ROW_FORMAT=DYNAMIC
DELAY_KEY_WRITE=0
;


CREATE TABLE `antutu_score` (
`id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`score`  int(11) NULL DEFAULT NULL COMMENT 'antutu总分' ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1
CHECKSUM=0
ROW_FORMAT=FIXED
DELAY_KEY_WRITE=0
;


CREATE TABLE `antutu_score_3d` (
`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
`3d`  int(11) NULL DEFAULT NULL COMMENT '3D总分' ,
`3d_marooned`  int(11) NULL DEFAULT NULL COMMENT '3D Marooned' ,
`3d_garden`  int(11) NULL DEFAULT NULL COMMENT '3D Garden' ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1
CHECKSUM=0
ROW_FORMAT=FIXED
DELAY_KEY_WRITE=0
;

CREATE TABLE `antutu_score_ux` (
`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
`ux`  int(11) NULL DEFAULT NULL COMMENT 'UX score' ,
`ux_data_secure`  int(11) NULL DEFAULT NULL COMMENT 'UX Data Secure' ,
`ux_data_process`  int(11) NULL DEFAULT NULL COMMENT 'UX Data process' ,
`ux_strategy_games`  int(11) NULL DEFAULT NULL COMMENT 'UX Strategy games' ,
`ux_image_process`  int(11) NULL DEFAULT NULL COMMENT 'UX Image process' ,
`ux_io_performance`  int(11) NULL DEFAULT NULL COMMENT 'UX IO performance' ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1
CHECKSUM=0
ROW_FORMAT=FIXED
DELAY_KEY_WRITE=0
;


CREATE TABLE `antutu_score_cpu` (
`id`  int(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
`cpu`  int(11) NULL DEFAULT NULL COMMENT 'CPU score' ,
`cpu_mathematics`  int(11) NULL DEFAULT NULL COMMENT 'CPU Mathematics' ,
`cpu_multi_core`  int(11) NULL DEFAULT NULL COMMENT 'CPU Multi-Core' ,
`ram`  int(11) NULL DEFAULT NULL COMMENT 'RAM' ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1
CHECKSUM=0
ROW_FORMAT=FIXED
DELAY_KEY_WRITE=0
;


CREATE TABLE IF NOT EXISTS `antutu_score_all` (
`id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
`product` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'Flash3' COMMENT '测试项目' ,
`version_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'user' COMMENT 'user userdebug eng version' ,
`version` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '项目版本' ,
`version_time`  datetime NULL COMMENT '版本日期' ,
`test_time`  datetime NULL COMMENT '测试日期' ,
`tester_email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '测试人邮箱' ,
`review_tester_email` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '审查人邮箱' ,
`showing_valid` bit NULL DEFAULT b'0' COMMENT '是否显示, 1=ok,0=no' ,
`score`  int(11) NULL DEFAULT NULL COMMENT 'antutu总分' ,
`3d`  int(11) NULL DEFAULT NULL COMMENT '3D总分' ,
`3d_marooned`  int(11) NULL DEFAULT NULL COMMENT '3D Marooned' ,
`3d_garden`  int(11) NULL DEFAULT NULL COMMENT '3D Garden' ,
`ux`  int(11) NULL DEFAULT NULL COMMENT 'UX score' ,
`ux_data_secure`  int(11) NULL DEFAULT NULL COMMENT 'UX Data Secure' ,
`ux_data_process`  int(11) NULL DEFAULT NULL COMMENT 'UX Data process' ,
`ux_strategy_games`  int(11) NULL DEFAULT NULL COMMENT 'UX Strategy games' ,
`ux_image_process`  int(11) NULL DEFAULT NULL COMMENT 'UX Image process' ,
`ux_io_performance`  int(11) NULL DEFAULT NULL COMMENT 'UX IO performance' ,
`cpu`  int(11) NULL DEFAULT NULL COMMENT 'CPU score' ,
`cpu_mathematics`  int(11) NULL DEFAULT NULL COMMENT 'CPU Mathematics' ,
`cpu_common_use`  int(11) NULL DEFAULT NULL COMMENT 'CPU Common Use' ,
`cpu_multi_core`  int(11) NULL DEFAULT NULL COMMENT 'CPU Multi-Core' ,
`ram`  int(11) NULL DEFAULT NULL COMMENT 'RAM' ,
PRIMARY KEY (`id`)
)
ENGINE=MyISAM
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1
CHECKSUM=0
ROW_FORMAT=FIXED
DELAY_KEY_WRITE=0
;

/* for test data on antutu_score_all */
INSERT INTO `antutu_score_all` (`id`, `product`, `version_type`, `version`, `version_time`, `test_time`, `tester_email`, `review_tester_email`, `showing_valid`, `score`, `3d`, `3d_marooned`, `3d_garden`, `ux`, `ux_data_secure`, `ux_data_process`, `ux_strategy_games`, `ux_image_process`, `ux_io_performance`, `cpu`, `cpu_mathematics`, `cpu_common_use`, `cpu_multi_core`, `ram`) VALUES (1, 'Flash3', 'user', 'A61', NULL, NULL, NULL, NULL, '', 89108, 18356, 10663, 7693, 36291, 7180, 5009, 9558, 9878, 4666, 26786, 9521, 7567, 9848, 7675);
INSERT INTO `antutu_score_all` (`id`, `product`, `version_type`, `version`, `version_time`, `test_time`, `tester_email`, `review_tester_email`, `showing_valid`, `score`, `3d`, `3d_marooned`, `3d_garden`, `ux`, `ux_data_secure`, `ux_data_process`, `ux_strategy_games`, `ux_image_process`, `ux_io_performance`, `cpu`, `cpu_mathematics`, `cpu_common_use`, `cpu_multi_core`, `ram`) VALUES (2, 'Flash3', 'user', 'A62', NULL, NULL, NULL, NULL, '', 90108, 18356, 11663, 7693, 37291, 7180, 5009, 9558, 9878, 4666, 26786, 9521, 7567, 9848, 8675);
INSERT INTO `antutu_score_all` (`id`, `product`, `version_type`, `version`, `version_time`, `test_time`, `tester_email`, `review_tester_email`, `showing_valid`, `score`, `3d`, `3d_marooned`, `3d_garden`, `ux`, `ux_data_secure`, `ux_data_process`, `ux_strategy_games`, `ux_image_process`, `ux_io_performance`, `cpu`, `cpu_mathematics`, `cpu_common_use`, `cpu_multi_core`, `ram`) VALUES (3, 'Flash3', 'user', 'A63', NULL, NULL, NULL, NULL, '', 93108, 18356, 10663, 7693, 37291, 7180, 5009, 9558, 9878, 6666, 26786, 9521, 7567, 9848, 5754);
INSERT INTO `antutu_score_all` (`id`, `product`, `version_type`, `version`, `version_time`, `test_time`, `tester_email`, `review_tester_email`, `showing_valid`, `score`, `3d`, `3d_marooned`, `3d_garden`, `ux`, `ux_data_secure`, `ux_data_process`, `ux_strategy_games`, `ux_image_process`, `ux_io_performance`, `cpu`, `cpu_mathematics`, `cpu_common_use`, `cpu_multi_core`, `ram`) VALUES (4, 'Flash3', 'user', 'A64', NULL, NULL, NULL, NULL, '', 92108, 18356, 10663, 15674, 37291, 7180, 5009, 9558, 9878, 6666, 26786, 9521, 7567, 9848, 5754);

